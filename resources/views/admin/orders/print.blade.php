<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $order->id }}</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        body { background: white; padding: 30px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .invoice-box { max-width: 800px; margin: auto; }
        .invoice-header { border-bottom: 2px solid #eee; padding-bottom: 20px; margin-bottom: 20px; }
        .table thead th { background: #f8f9fa; border-top: none; }
        .bundle-item { font-size: 0.85rem; color: #666; margin-left: 15px; }
        @media print {
            .no-print { display: none; }
            body { padding: 0; }
            .invoice-box { max-width: 100%; }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="invoice-box">
        <div class="no-print mb-4">
            <button onclick="window.print()" class="btn btn-primary">Print Invoice</button>
            <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-outline-secondary">Back to Order</a>
        </div>

        <div class="invoice-header d-flex justify-content-between align-items-center">
            <div>
                <img src="{{ asset('images/main-logo.png') }}" alt="Logo" style="max-height: 60px; mix-blend-mode: multiply;">
                <h2 class="mt-2">INVOICE</h2>
            </div>
            <div class="text-end">
                <h4 class="mb-1">Order #{{ $order->id }}</h4>
                <p class="mb-0 text-muted">Date: {{ $order->created_at->format('M d, Y') }}</p>
                <p class="mb-0"><span class="badge bg-{{ $order->status == 'completed' ? 'success' : 'warning' }} text-uppercase">{{ $order->status }}</span></p>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-6">
                <h6 class="text-muted text-uppercase small fw-bold">Billed To:</h6>
                <p class="mb-0"><strong>{{ $order->customer_name }}</strong></p>
                <p class="mb-0">{{ $order->customer_email }}</p>
                <p class="mb-0">{{ $order->customer_phone }}</p>
            </div>
            <div class="col-6 text-end">
                <h6 class="text-muted text-uppercase small fw-bold">Shipping Address:</h6>
                <p class="mb-0">{{ $order->shipping_address }}</p>
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Item Description</th>
                    <th class="text-center" style="width: 100px;">Price</th>
                    <th class="text-center" style="width: 80px;">Qty</th>
                    <th class="text-end" style="width: 120px;">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                <tr>
                    <td>
                        @if($item->deal_id)
                            <strong>{{ $item->deal->name }} (Bundle)</strong>
                            <div class="mt-1">
                                @foreach($item->deal->products as $p)
                                    <div class="bundle-item">• {{ $p->name }}</div>
                                @endforeach
                            </div>
                        @else
                            {{ $item->product->name }}
                        @endif
                    </td>
                    <td class="text-center">Rs. {{ number_format($item->unit_price, 2) }}</td>
                    <td class="text-center">{{ $item->quantity }}</td>
                    <td class="text-end">Rs. {{ number_format($item->total_price, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot class="fw-bold">
                <tr>
                    <td colspan="3" class="text-end">Grand Total</td>
                    <td class="text-end">Rs. {{ number_format($order->total_amount, 2) }}</td>
                </tr>
            </tfoot>
        </table>

        <div class="mt-5 text-center text-muted small">
            <p>Thank you for shopping with Octal Traders!</p>
            <p>If you have any questions, please contact us at support@octaltraders.com</p>
        </div>
    </div>
</body>
</html>
