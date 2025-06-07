<?php

namespace App\Livewire\Staff;

use Livewire\Component;
use App\Models\User;

class Index extends Component
{
    public function render()
    {
        return view('livewire.staff.index', [
            'staffs' => User::where('role', 'staff')->get()
        ]);
    }
}
