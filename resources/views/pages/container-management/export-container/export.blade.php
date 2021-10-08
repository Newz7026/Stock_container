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
    <h5 class="card-title" style="font-size: 18pt;"> Export =
        @if ($name_agent)
            {{ $name_agent[0]->enterprise_name }}
        @else
            {{ $name_agent }}

        @endif
    </h5>
    <h5 class="card-title" style="font-size: 14pt;">
        Day Export =
        @if ($today[0] != '')
            {{ $today }}

        @else
            {{ '-' }}

        @endif

    </h5>
    <table border="0.1" cellpadding="2">
        <thead class="info">
            <tr bgcolor="#dddddd">
                <th width="20px;" scope="col">#</th>
                <th width="100px;" scope="col">Container No.</th>
                <th scope="col">Size</th>
                <th width="60px;" scope="col">Date In</th>
                <th scope="col">Import By</th>
                <th width="60px;" scope="col">Tel.</th>
                <th scope="col">TRUCK NO.</th>
                <th scope="col">Agent</th>
                <th width="60px;" scope="col">Date Out</th>
                <th scope="col">Export By</th>
                <th width="60px;" scope="col">Tel.</th>
                <th scope="col">TRUCK NO.</th>
                <th scope="col">Agent</th>
                <th scope="col">Long Stay</th>
                <th scope="col">expenses</th>
            </tr>
        </thead>
        <tbody>
            @php
                $count = 0;
                $sum_long_stay = 0;
                $sum_expenses = 0;
            @endphp
            @foreach ($cntr as $container_data)
                @php
                    $expenses = 0;
                    if ($container_data->manage_out_date != '') {
                        $diffdays = Carbon\Carbon::parse($container_data->manage_in_date)->diffInDays(Carbon\Carbon::parse(date('d-m-Y', strtotime($container_data->manage_out_date))));
                    } else {
                        $diffdays = 0;
                    }
                    if ($diffdays > 5 && $container_data->manage_out_date != '') {
                        if ($container_data->container_type == '20DC') {
                            $expenses = $diffdays * 20;
                        } elseif ($container_data->container_type == '45HC') {
                            $expenses = $diffdays * 60;
                        } else {
                            $expenses = $diffdays * 40;
                        }
                    } else {
                        0;
                    }
                    $sum_long_stay = (int) $sum_long_stay + $diffdays;
                    $sum_expenses = (int) $expenses + $sum_expenses;
                @endphp
                <tr parser-repeat="[data_list]" id="row_{record_number}">
                    <td width="20px;">{{ $count += 1 }}</td>
                    <td width="100px;">{{ $container_data->container_number }}</td>
                    <td>{{ $container_data->container_type }}</td>
                    <td width="60px;">{{ date('d/m/Y', strtotime($container_data->manage_in_date)) }}</td>
                    <td>{{ $container_data->manage_in_driver_name }}</td>
                    <td width="60px;">{{ $container_data->manage_in_driver_tel }}</td>
                    <td>{{ $container_data->manage_in_car_registration }}</td>
                    <td>{{ $container_data->manage_in_driver_enterprise }}</td>
                    <td>
                        @if ($container_data->manage_out_date != '')
                            {{ date('d/m/Y', strtotime($container_data->manage_out_date)) }}
                        @else
                            {{ '-' }}
                        @endif
                    </td>
                    <td>{{ $container_data->manage_out_driver_name }}</td>
                    <td width="60px;">{{ $container_data->manage_out_driver_tel }}</td>
                    <td>{{ $container_data->manage_out_car_registration }}</td>
                    <td>{{ $container_data->manage_out_driver_enterprise }}</td>
                    <td>
                        @if ($container_data->manage_out_date != '')
                            {{ $diffdays }}
                        @else
                            {{ '-' }}
                        @endif
                    </td>
                    <td>
                        {{ $expenses }}

                    </td>
                </tr>
            @endforeach
            <tr parser-repeat="[data_list]" id="row_{record_number}">
                <td width="20px;"></td>
                <td width="100px;">Total -> </td>
                <td></td>
                <td width="60px;"></td>
                <td></td>
                <td width="60px;"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td width="60px;"></td>
                <td>{{ $sum_long_stay }}</td>
                <td>{{ $sum_expenses }}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>
