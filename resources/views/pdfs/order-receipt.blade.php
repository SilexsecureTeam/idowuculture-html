<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Receipt - {{ $order->reference }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            line-height: 1.6;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 25px;
        }
        .header img {
            width: 120px;
            margin-bottom: 10px;
        }
        .section-title {
            font-size: 16px;
            margin-bottom: 5px;
            font-weight: bold;
            border-bottom: 1px solid #ccc;
            padding-bottom: 3px;
        }
        .section {
            margin-bottom: 15px;
        }
        .details-table {
            width: 100%;
            border-collapse: collapse;
        }
        .details-table th,
        .details-table td {
            padding: 6px;
            border: 1px solid #ccc;
        }
        .text-right {
            text-align: right;
        }
        .footer {
            text-align: center;
            font-size: 10px;
            margin-top: 40px;
            color: #888;
        }
    </style>
</head>
<body>

    <div class="header">
        <img src="{{ asset('assets/logo.png') }}" alt="Company Logo">
        <h1>Transaction Receipt</h1>
        <p>Order Reference: <strong>{{ $order->reference }}</strong></p>
    </div>

    <div class="section">
        <div class="section-title">Customer Details</div>
        <p><strong>Username:</strong> {{ $order->user->name ?? 'N/A' }}</p>
        <p><strong>Email:</strong> {{ $order->user->email ?? 'N/A' }}</p>
        <p><strong>Phone:</strong> {{ $order->user->phone ?? 'N/A' }}</p>
    </div>

    <div class="section">
        <div class="section-title">Delivery Address</div>
        <p>{{ $order->address->full_address ?? 'N/A' }}</p>
    </div>

    <div class="section">
        <div class="section-title">Order Summary</div>
        <p><strong>Date Placed:</strong> {{ $order->created_at->format('M d, Y H:i A') }}</p>

        <table class="details-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Size</th>
                    <th class="text-right">Price (₦)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $item)
                    <tr>
                        <td>{{ $item->product->title ?? 'N/A' }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->size ?? '-' }}</td>
                        <td class="text-right">{{ number_format($item->price, 2) }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3"><strong>Delivery Fee</strong></td>
                    <td class="text-right"><strong>₦{{ number_format($order->delivery_fee, 2) }}</strong></td>
                </tr>
                <tr>
                    <td colspan="3"><strong>Total</strong></td>
                    <td class="text-right">
                        <strong>
                            ₦{{ number_format($order->items->sum(fn($item) => $item->price) + $order->delivery_fee, 2) }}
                        </strong>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    @php
        $transaction = $order->transaction;
    @endphp

    <div class="section">
        <div class="section-title">Transaction Details</div>
        @if ($transaction)
            <p><strong>Channel:</strong> {{ ucfirst($transaction->channel) }}</p>
            <p><strong>Currency:</strong> {{ $transaction->currency }}</p>
            <p><strong>Amount Paid:</strong> ₦{{ number_format($transaction->amount, 2) }}</p>
            <p><strong>Status:</strong> {{ ucfirst($transaction->status) }}</p>
            <p><strong>Payment Date:</strong> {{ \Carbon\Carbon::parse($transaction->paid_at)->format('M d, Y H:i A') }}</p>
        @else
            <p>No transaction record found.</p>
        @endif
    </div>

    <div class="footer">
        &copy; {{ now()->year }} Idowucouture. This is an automatically generated receipt.
    </div>

</body>
</html>
