<?php

namespace App\Livewire\User;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class UserDashboard extends Component
{
    public $user;

    public function mount()
    {
        $user = Auth::user();

    }


    #[Layout('layouts.app')]
    #[Title('Dashboard')]
    public function render()
    {
        $cartCount = 0;

        if (auth()->check()) {
            $cartCount = Cart::where('user_id', auth()->id())->count();
        }
        return view('livewire.user.user-dashboard', [
        'cartCount' => $cartCount
    ]);
    }
}
