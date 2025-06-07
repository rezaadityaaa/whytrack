<?php

namespace App\Livewire\Staff;

use Livewire\Component;
use App\Models\User;

class Edit extends Component
{
    public $staff;

    public function mount($staff)
    {
        $this->staff = User::findOrFail($staff);
    }

    public function render()
    {
        return view('livewire.staff.edit', [
            'staff' => $this->staff
        ]);
    }
}
