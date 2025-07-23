<div
    style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size:15px; max-width:600px; margin: 1rem auto; padding-top: 1rem;">
    <div style="background-color:white; padding: 20px 40px; border: 1px solid rgba(0, 0, 0, 0.1);">

        <!-- Logo -->
        <div style="text-align: center; padding-bottom: 20px;">
            <img style="height:70px;" src="{{ asset('assets/logo.png') }}" alt="Idowucouture Logo">
        </div>

        <!-- Email Title -->
        <div style="text-align: center;" class="border">
            <p
                style="padding:10px; background-color:white; color: black; display: inline-block; font-size: 20px; font-weight:bold;">
                Thank you for your order, {{ $order->user->firstname }}!
            </p>
        </div>

        <!-- Message Body -->
        <p style="margin-bottom: 20px;">Your order <strong>#{{ $order->reference }}</strong> was placed successfully.</p>
        </p>

        <!-- Contact Details Table -->
        <div style="width:100%; border-collapse: collapse;">
            <p><strong>Order Total:</strong> ₦{{ number_format($order->amount, 2) }}</p>
            <p><strong>Status:</strong> {{ $order->status }}</p>

            <p>We will update you once it’s being processed.</p>

            <p>Thank you for shopping with us!</p>
        </div>

    </div>

</div>
