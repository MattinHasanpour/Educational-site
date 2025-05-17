<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    #[Layout('admin.master')]
    #[Title("لیست کاربران")]
    public $name;
    public $email;
    public $mobile;
    public $password;
    public $image;
    public $search;
    public $sortId=true;

    public $editUserIndex = null;

    public function editRow($user_id)
    {
        $user = User::query()->find($user_id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->mobile = $user->mobile;
        $this->validate([
            'name' => 'required|min:3|max:15',
            'email' => 'required|unique:users,email,' . $user_id,
            'mobile' => 'required|unique:users,mobile,' . $user_id,
        ]);
    }

    public function UpdateRow($user_id)
    {
        $this->editUserIndex = $user_id;
        $user = User::query()->find($user_id);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
        ]);

        $this->dispatch('closeModal', userId: $user_id);
        session()->flash('message', 'کاربر ویرایش شد.');
    }

    // #[On('cser-created')]
    public function render()
    {
        $users = User::query()->orderBy('id',$this->sortId ?"ASC" :"DESC")
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orWhere('mobile', 'like', '%' . $this->search . '%')
            ->paginate(10);
        return view('livewire.admin.user.user-list', compact('users'));
    }
}
