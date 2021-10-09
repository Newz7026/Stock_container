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
    <h3 class="card-title" style="font-size: 15pt;">Report ->
        @if ($name_agent)
            {{ $name_agent[0]->enterprise_name }}
        @else
            {{ $name_agent }}

        @endif
    </h3>
    <h5 class="card-title" style="font-size: 14pt;">
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
            </tr>
        </thead>
        <tbody>
            @php
                $count = 0;
            @endphp
            @foreach ($cntr as $container_data)
                @php
                    $diffdays = Carbon\Carbon::parse($container_data->manage_in_date)->diffInDays(Carbon\Carbon::parse(date('d-m-Y', strtotime($container_data->manage_out_date))));
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
                </tr>
            @endforeach

        </tbody>
    </table>
</body>

</html>
