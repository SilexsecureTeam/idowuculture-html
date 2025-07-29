<?php

namespace App\Livewire\User;

use App\Models\Order;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ViewOrder extends Component
{
    public Order $order;

    public function mount(Order $order)
    {
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }
        $this->order = $order->load('items.product');
    }

    #[Layout('layouts.app')]
    #[Title('Order Details')]
    public function render()
    {
        return view('livewire.user.view-order');
    }
}
