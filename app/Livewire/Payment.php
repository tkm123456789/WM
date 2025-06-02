<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Payment extends Component
{
    public $amount = '';
    public $recipient_email = '';

    protected $rules = [
        'amount' => 'required|numeric|min:1',
        'recipient_email' => 'required|email|exists:users,email',
    ];

    public function sendPayment()
    {
        $this->validate();

        $sender = Auth::user();
        $recipient = \App\Models\User::where('email', $this->recipient_email)->first();

        try {
            DB::beginTransaction();

            // Create transaction record with pending status
            \App\Models\Transaction::create([
                'sender_id' => $sender->id,
                'recipient_id' => $recipient->id,
                'value' => $this->amount,
                'status' => 'pending'
            ]);

            DB::commit();

            session()->flash('message', 'Payment request sent successfully!');
            $this->reset(['recipient_email', 'amount']);
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Payment failed: ' . $e->getMessage());
        }
    }

    public function confirmReceived($transactionId)
    {
        $transaction = \App\Models\Transaction::findOrFail($transactionId);
        
        // Verify that the authenticated user is the sender
        if ($transaction->sender_id != Auth::id()) {
            session()->flash('error', 'Unauthorized action.');
            return;
        }

        try {
            DB::beginTransaction();
            
            $transaction->update(['status' => 'completed']);
            
            DB::commit();
            
            session()->flash('message', 'Transaction marked as completed!');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Failed to update transaction: ' . $e->getMessage());
        }
    }

    public function render()
    {
        $user = Auth::user();
        $transactions = \App\Models\Transaction::where(function($query) use ($user) {
                $query->where('sender_id', $user->id)
                    ->orWhere('recipient_id', $user->id);
            })
            ->with(['sender', 'recipient'])
            ->latest()
            ->take(5)
            ->get();

        return view('livewire.payment', [
            'transactions' => $transactions
        ]);
    }
}
