<?php
namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

class UserProfile extends Component
{
    public $firstname, $lastname, $email, $phone, $password, $password_confirmation;

    public function mount()
    {
        $user = Auth::user();
        $this->firstname = $user->firstname;
        $this->lastname = $user->lastname;
        $this->email = $user->email;
        $this->phone = $user->phone ?? '';
    }

    protected function rules()
    {
        return [
            'firstname' => 'required|string|min:3',
            'lastname' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|min:7',
            'password' => 'nullable|min:6|same:password_confirmation',
        ];
    }

    public function updateProfile()
    {
        $this->validate();

        $user = Auth::user();
        $user->firstname = $this->firstname;
        $user->lastname = $this->lastname;
        $user->email = $this->email;
        $user->phone = $this->phone;

        if ($this->password) {
            $user->password = Hash::make($this->password);
        }

        $user->save();

        session()->flash('success', 'Profile updated successfully!');
    }

    #[Layout('layouts.app')]
    #[Title('User Profile')]
    public function render()
    {
        return view('livewire.user.profile');
    }
}
