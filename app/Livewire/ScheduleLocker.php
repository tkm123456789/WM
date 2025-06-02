<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Appointment;
use App\Models\Locker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class ScheduleLocker extends Component
{
    public $locker_size = '';
    public $location = '';
    public $duration = '';
    public $available_sizes = [];
    public $selected_locker_id = null;

    protected $rules = [
        'locker_size' => 'required',
        'location' => 'required',
        'duration' => 'required',
    ];

    public function updatedLocation($value)
    {
        if ($value) {
            $this->available_sizes = Locker::where('location', $value)
                ->where('status', 'available')
                ->select('locker_size')
                ->distinct()
                ->pluck('locker_size')
                ->toArray();
            
            // Reset locker size when location changes
            $this->locker_size = '';
            $this->selected_locker_id = null;
        } else {
            $this->available_sizes = [];
            $this->locker_size = '';
            $this->selected_locker_id = null;
        }
    }

    public function updatedLockerSize($value)
    {
        if ($value && $this->location) {
            $locker = Locker::where('location', $this->location)
                ->where('locker_size', $value)
                ->where('status', 'available')
                ->first();
            
            if ($locker) {
                $this->selected_locker_id = $locker->id;
            }
        } else {
            $this->selected_locker_id = null;
        }
    }

    public function schedule()
    {
        $this->validate();

        if (!$this->selected_locker_id) {
            session()->flash('error', 'No available locker found for the selected size and location.');
            return;
        }

        try {
            DB::beginTransaction();

            $appt = Appointment::create([
                'locker_size' => $this->locker_size,
                'location' => $this->location,
                'duration' => $this->duration,
                'user_id' => Auth::id()
            ]);

            // Update the locker status
            $locker = Locker::find($this->selected_locker_id);
            if ($locker) {
                $locker->update(['status' => 'unavailable']);
            }

            DB::commit();

            session()->flash('message', 'Locker scheduled successfully!');
            $this->reset();
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Failed to schedule locker: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.schedule-locker');
    }
}
