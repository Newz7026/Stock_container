<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    @LaravelDompdfThaiFont
    <style>
        body {
            font-family: 'THSarabunNew';

            margin: 0px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10pt;
        }

        table {
            page-break-inside: auto;
        }

        th {
            background-color: lightgrey;
            text-align: center;
        }

        td {
            text-align: center;
        }

    </style>
</head>

<body>
    <h3 class="card-title" style="font-size: 16pt;"> Export =
        @if ($name_agent)
            {{ $name_agent[0]->enterprise_name }}
        @else
            {{ $name_agent }}

        @endif
           ( {{ $today }} )
    </h3>
    <table border="0.1" cellpadding="2">
        <thead class="info">
            <tr bgcolor="#dddddd">
                <th scope="col" scope="col">#</th>
                <th scope="col" scope="col">Container No.</th>
                <th scope="col">Size</th>
                <th scope="col" scope="col">Date In</th>
                <th scope="col">Import By</th>
                <th scope="col" scope="col">Tel.</th>
                <th scope="col">TRUCK NO.</th>
                <th scope="col">Agent</th>
                <th scope="col" scope="col">Date Out</th>
                <th scope="col">Export By</th>
                <th scope="col" scope="col">Tel.</th>
                <th scope="col">TRUCK NO.</th>
                <th scope="col">Agent</th>
                <th scope="col">Long Stay</th>
                <th scope="col">Expenses</th>
                <th scope="col">Lifting</th>
            </tr>
        </thead>
        <tbody>
            @php
                $count = 0;
                $sum_long_stay = 0;
                $sum_expenses = 0;
                $sum_lifting = 0;
                $today = \Carbon\Carbon::now();
            @endphp
            @foreach ($cntr as $container_data)
                @php
                    $expenses = 0;
                    $lifting_count = $container_data->lifting;
                    if ($container_data->manage_out_date != '') {
                        $diffdays = Carbon\Carbon::parse($container_data->manage_in_date)->diffInDays(Carbon\Carbon::parse(date('d-m-Y', strtotime($container_data->manage_out_date))));
                    } else {
                        $diffdays = Carbon\Carbon::parse($container_data->manage_in_date)->diffInDays(Carbon\Carbon::parse(date('d-m-Y', strtotime($today))));
                    }
                    if ($diffdays > 5) {
                        $expenses = $diffdays * $container_data->price;
                    } else {
                        0;
                    }
                    $sum_lifting += $lifting_count;
                    $sum_long_stay = (int) $sum_long_stay + $diffdays;
                    $sum_expenses = (int) $expenses + $sum_expenses;
                @endphp
                <tr parser-repeat="[data_list]" id="row_{record_number}">
                    <td width="20px;">{{ $count += 1 }}</td>
                    <td width="80px;">{{ $container_data->container_number }}</td>
                    <td>{{ $container_data->container_type }}</td>
                    <td width="50px;">{{ date('d/m/Y', strtotime($container_data->manage_in_date)) }}</td>
                    <td>{{ $container_data->manage_in_driver_name }}</td>
                    <td width="40px;">{{ $container_data->manage_in_driver_tel }}</td>
                    <td>{{ $container_data->manage_in_car_registration }}</td>
                    <td>{{ $container_data->manage_in_driver_enterprise }}</td>
                    <td>
                        @if ($container_data->manage_out_date != '')
                            {{ date('d/m/Y', strtotime($container_data->manage_out_date)) }}
                        @else
                            <b>{{ 'IN STOCK' }}</b>
                        @endif
                    </td>
                    <td>{{ $container_data->manage_out_driver_name }}</td>
                    <td>{{ $container_data->manage_out_driver_tel }}</td>
                    <td>{{ $container_data->manage_out_car_registration }}</td>
                    <td>{{ $container_data->manage_out_driver_enterprise }}</td>
                    <td>
                        {{ $diffdays }}
                    </td>
                    <td>
                        {{ $expenses }}

                    </td>
                    <td>
                        {{ $lifting_count }}

                    </td>
                </tr>
            @endforeach
            <tr parser-repeat="[data_list]" id="row_{record_number}">
                <td colspan="14">Total</td>
                <td>{{ $sum_expenses }}</td>
                <td>{{ $sum_lifting }}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>
