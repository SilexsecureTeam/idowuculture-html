<?php

namespace App\Livewire\User;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class UserDashboard extends Component
{
    public $user;
    public $selectedOrderId = null;
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public function mount()
    {
        $user = Auth::user();
    }

    public function viewOrderDetails($orderId)
    {
        $this->selectedOrderId = $orderId;
    }

    public function closeModal()
    {
        $this->selectedOrderId = null;
    }


    #[Layout('layouts.app')]
    #[Title('Dashboard')]
    public function render()
    {
        $orders = 0;
        $order_items = collect();
        $orderDetails = collect();

        if (auth()->check()) {
            $orders = Order::where('user_id', auth()->id())
                ->count();

            $userOrders = Order::where('user_id', auth()->id())
                ->pluck('id');
            $order_items = OrderItem::whereIn('order_id', $userOrders)
                ->with('product')
                ->get();
            $orderDetails = Order::where('user_id', auth()->id())
                ->with('items')
                ->latest()
                ->paginate(5);

            // dd($order_items);
        }

        // dd($orderDetails);
        return view('livewire.user.user-dashboard', [
            'orders' => $orders,
            'order_items' => $order_items,
            'orderDetails' => $orderDetails,
        ]);
    }
}
