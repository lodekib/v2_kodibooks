<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{ $fileName }}</title>
    <style type="text/css" media="all">
        * {
            font-family: DejaVu Sans, sans-serif !important;
        }

        html {
            width: 100%;
        }

        table {
            width: 100%;
            margin-top:3.5cm;
            border-collapse: collapse;
            border-spacing: 0;
            border-radius: 10px 10px 10px 10px;
        }

        table td,
        th {
            border-color: #ededed;
            border-style: solid;
            border-width: 1px;
            font-size: 14px;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
        }

        table th {
            font-weight: normal;
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 3cm;
            text-align: center;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 3cm;
        }
    </style>
</head>

<body>


    <table>
        <tr>
            @foreach ($columns as $column)
            <th>
                {{ $column->getLabel() }}
            </th>
            @endforeach
        </tr>
        @foreach ($rows as $row)
        <tr>
            @foreach ($columns as $column)
            <td>
                {{ $row[$column->getName()] }}
            </td>
            @endforeach
        </tr>
        @endforeach
    </table>
    <header>
        <img src="{{ public_path('assets/header.png') }}" height="100%" width="50%" />
    </header>
    <footer>
        <img src="{{ public_path('assets/footer.png') }}" width="100%" height="50px" />
    </footer>
</body>

</html>