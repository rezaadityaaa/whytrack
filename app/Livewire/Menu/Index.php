<?php

namespace App\Livewire\Menu;

use Livewire\Component;
use App\Models\Menu;

class Index extends Component
{
    public function render()
    {
        $menus = Menu::all();
        return view('livewire.menu.index', compact('menus'));
    }
}
