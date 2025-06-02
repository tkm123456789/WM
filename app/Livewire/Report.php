<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Report extends Component
{
    public $title = '';
    public $complaint = '';

    protected $rules = [
        'title' => 'required|min:3',
        'complaint' => 'required|min:10',
    ];

    public function submitReport()
    {
        $this->validate();

        // Just show success message without storing
        session()->flash('message', 'Thank you for your report. We will review it shortly.');
        
        // Reset form
        $this->reset(['title', 'complaint']);
    }

    public function render()
    {
        return view('livewire.report');
    }
}
