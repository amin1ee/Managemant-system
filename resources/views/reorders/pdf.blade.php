<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f8fafc;
            color: #0f172a;
        }

        .container {
            max-width: 820px;
            margin: 30px auto;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            box-shadow: 0 18px 45px rgba(15, 23, 42, 0.08);
            overflow: hidden;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 28px 32px;
            background: linear-gradient(135deg, #0f172a, #1d4ed8);
            color: #fff;
        }

        header img {
            max-width: 150px;
            filter: brightness(0) invert(1);
        }

        header h2 {
            margin: 0;
            font-size: 22px;
            font-weight: 700;
        }

        .content {
            padding: 32px;
        }

        .addresses {
            display: flex;
            justify-content: space-between;
            gap: 24px;
            margin-bottom: 28px;
        }

        .addresses > div {
            width: 48%;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 18px 20px;
        }

        h4 {
            margin: 0 0 12px;
            font-size: 13px;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: #64748b;
        }

        .addresses div div {
            margin-bottom: 6px;
            color: #334155;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 24px;
            border-radius: 14px;
            overflow: hidden;
        }

        table th,
        table td {
            border: 1px solid #e2e8f0;
            padding: 14px 12px;
            text-align: left;
        }

        table th {
            background: #f1f5f9;
            color: #475569;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.12em;
        }

        table tr:nth-child(even) {
            background: #fafafa;
        }

        .total {
            text-align: right;
            font-size: 20px;
            font-weight: 700;
            color: #0f172a;
            margin-top: 8px;
        }

        .footer {
            text-align: center;
            font-size: 14px;
            color: #64748b;
            padding: 26px 20px 30px;
            border-top: 1px solid #e2e8f0;
            margin-top: 28px;
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

        <div class="content">
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

            <div class="total">Total: €145.00</div>
        </div>

        <div class="footer">
            <div>Thank you for your business!</div>
            <div>&copy; {{ date('Y') }} Mennous Company</div>
        </div>
    </div>
</body>

</html>