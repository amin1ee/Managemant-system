<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 30px;
            background-color: #f9f9f9;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        header img {
            max-width: 150px;
        }

        header h2 {
            font-size: 24px;
            color: #4a5568;
        }

        h4 {
            margin-bottom: 5px;
            font-size: 16px;
            color: #4a5568;
        }

        .addresses {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .addresses div {
            width: 45%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        table th {
            background-color: #f3f4f6;
            color: #4a5568;
            font-weight: 600;
        }

        table tr:nth-child(even) {
            background-color: #f9fafb;
        }

        .total {
            text-align: right;
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;
        }

        .footer {
            text-align: center;
            font-size: 14px;
            color: #777;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <div>
                <img src="{{ public_path('assets/invoice.png') }}" alt="Logo">
            </div>
            <div>
                <h2>Invoice ID: {{ strtoupper(Str::random(8)) }}</h2>
            </div>
        </header>

        <div class="addresses">
            <div>
                <h4>To:</h4>
                <div>{{ $reorder->product->supplier->company ?? 'N/A' }}</div>
                <div>{{ $reorder->product->supplier->name ?? 'N/A' }}</div>
                <div>{{ $reorder->product->supplier->email ?? 'N/A' }}</div>
            </div>
            <div>
                <h4>From:</h4>
                <div>Mennous Company</div>
                <div>Groningen</div>
                <div>info@mennous.com</div>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Qty</th>
                    <th>Description</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $reorder->requested_quantity }}</td>
                    <td>{{ $reorder->product->name }}</td>
                    <td>€145.00</td>
                </tr>
            </tbody>
        </table>

        <div class="total">
            Total: €145.00
        </div>

        <div class="footer">
            <div>Thank you for your business!</div>
            <div>&copy; {{ date('Y') }} Mennous Company</div>
        </div>
    </div>
</body>

</html>