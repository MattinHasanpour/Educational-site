<?php

namespace App\Livewire\Admin\User;

use Livewire\Attributes\Layout;
use Livewire\Component;

class UserList extends Component
{
    #[Layout('admin.master')]
    public function render()
    {
        return view('livewire.admin.user.user-list');
    }
}
