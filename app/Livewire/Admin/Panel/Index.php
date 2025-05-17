<?php

namespace App\Livewire\Admin\Panel;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;

class Index extends Component
{
    #[Layout('admin.master')]
    #[On('user-created')]
    #[Title('داشبورد')]

    public function render()
    {
        $users = User::count();
        return view('livewire.admin.panel.index',compact('users'));
    }
}
