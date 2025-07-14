<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class UserDashboard extends Component
{
    public $user;

    public function mount()
    {
        $this->user = Auth::user();
    }


    #[Layout('layouts.app')]
    #[Title('Dashboard')]
    public function render()
    {
        return view('livewire.user.user-dashboard');
    }
}
