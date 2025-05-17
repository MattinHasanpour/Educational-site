<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Js;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class UserCreate extends Component
{
    use WithPagination, WithFileUploads;

    public $name;
    public $email;
    public $mobile;
    public $password;
    public $image;

    #[Layout('admin.master')]
    #[Title('ثبت کاربر جدید')]
    public function saveUser()
    {
        $this->validate([
            'name' => 'required|min:3|max:15',
            'email' => 'required|unique:users,email',
            'mobile' => 'required|unique:users,mobile',
            'password' => 'required|min:8|max:18',
        ]);
        if ($this->image != null) {
            $name = time() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('photos', $name, 'public');
        } else {
            $name = null;
        }
        User::query()->create([
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'password' => Hash::make($this->password),
            'image' => $this->image,
        ]);
        $this->reset('name', 'email', 'mobile', 'password', 'image');
        session()->flash('message', 'کاربر جدید ایجاد شد.');
        $this->dispatch('user-created');
    }

    #[Js]
    public function resetCreate()
    {
        session()->flash('message', 'فیلدها پاک شدند.');
        return <<<'JS'
            $wire.name ="";
            $wire.email ="";
            $wire.mobile ="";
            $wire.password ="";
            $wire.image ="";
        JS;

    }

    public function render()
    {
        return view('livewire.admin.user.user-create');
    }
}
