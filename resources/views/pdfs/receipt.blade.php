<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Receipt</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            border: 1px solid #ddd;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }


        .logo {
            max-width: 150px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .total {
            margin-top: 20px;
            text-align: right;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="header">
            <img src="{{ public_path('assets/header.png') }}" alt="Logo" class="logo">
            <h2>Payment Receipt</h2>
            <h4>{{ $tenant->full_names }}</h4>
            <h5>{{ $tenant->id_number }} </h5>
        </div>

        <table>
            <tr>
                <th>Date</th>
                <td>{{ $record->paid_date }}</td>
            </tr>
            <tr>
                <th>Receipt Number</th>
                <td>{{ $record->receipt_number }}</td>
            </tr>
            <tr>
                <th>Reference Number</th>
                <td>{{ $record->reference_number }}</td>
            </tr>
            <tr>
                <th>Mode of Payment</th>
                <td> {{ $record->mode_of_payment }}</td>
            </tr>
            <tr>
                <th>Amount</th>
                <td>KES {{ number_format($record->amount) }}</td>
            </tr>
            <!-- Add more details as needed -->
        </table>

        <div class="total">
            <p><strong>Total Amount:</strong> KES {{ number_format($record->amount) }}</p>
        </div>
    </div>

</body>

</html>