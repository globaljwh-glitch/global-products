<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title>
        Invoice #{{ $order->order_number }}
    </title>

    <style>

        body{
            font-family: Arial, sans-serif;
            font-size:14px;
            color:#333;
            margin:40px;
        }

        .invoice-header{
            display:flex;
            justify-content:space-between;
            margin-bottom:30px;
        }

        .company-name{
            font-size:24px;
            font-weight:bold;
        }

        .invoice-title{
            font-size:30px;
            font-weight:bold;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:20px;
        }

        table th,
        table td{
            border:1px solid #ddd;
            padding:10px;
        }

        table th{
            background:#f5f5f5;
            text-align:left;
        }

        .text-right{
            text-align:right;
        }

        .totals{
            margin-top:20px;
            width:350px;
            margin-left:auto;
        }

        .totals table{
            margin-top:0;
        }

        .footer{
            margin-top:50px;
            text-align:center;
            color:#777;
        }

        .print-btn{
            margin-bottom:20px;
        }

        @media print{
            .print-btn{
                display:none;
            }
        }

    </style>
</head>

<body>

<div class="print-btn">
    <button onclick="window.print()">
        Print Invoice
    </button>
</div>

<div class="invoice-header">

    <div>
        <div class="company-name">
            <img src="/images/logo.jpg" />
        </div>

        <p>
            Your Company Address<br>
            City, State, ZIP<br>
            support@example.com
        </p>
    </div>

    <div class="text-right">

        <div class="invoice-title">
            INVOICE
        </div>

        <p>
            Invoice #: {{ $order->order_number }}<br>
            Date: {{ $order->created_at->format('d M Y') }}
        </p>

    </div>

</div>

<hr>

<h3>Customer Information</h3>

<p>
    <strong>Name:</strong>
    {{ auth()->user()->name }}
    <br>

    <strong>Email:</strong>
    {{ auth()->user()->email }}
</p>

<hr>

<h3>Order Items</h3>

<table>

    <thead>
        <tr>
            <th>Product</th>
            <th width="120">Qty</th>
            <th width="120">Price</th>
            <th width="150">Total</th>
        </tr>
    </thead>

    <tbody>

        @foreach($order->items as $item)

            <tr>

                <td>
                    {{ $item->product_name }}
                </td>

                <td>
                    {{ $item->quantity }}
                </td>

                <td>
                    ${{ number_format($item->price,2) }}
                </td>

                <td>
                    ${{ number_format($item->total,2) }}
                </td>

            </tr>

        @endforeach

    </tbody>

</table>

<div class="totals">

    <table>

        <tr>
            <td>Subtotal</td>
            <td class="text-right">
                ${{ number_format($order->subtotal,2) }}
            </td>
        </tr>

        <tr>
            <td>Discount</td>
            <td class="text-right">
                -${{ number_format($order->discount ?? 0,2) }}
            </td>
        </tr>

        <tr>
            <td>Shipping</td>
            <td class="text-right">
                ${{ number_format($order->shipping_charge ?? 0,2) }}
            </td>
        </tr>

        <tr>
            <td>Tax</td>
            <td class="text-right">
                ${{ number_format($order->tax ?? 0,2) }}
            </td>
        </tr>

        <tr>
            <th>Total Paid</th>
            <th class="text-right">
                ${{ number_format($order->grand_total,2) }}
            </th>
        </tr>

    </table>

</div>

<div class="footer">

    <p>
        Thank you for your business.
    </p>

</div>

</body>
</html>