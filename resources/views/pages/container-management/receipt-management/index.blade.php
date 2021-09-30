@extends('layouts.app', ['activePage' => 'receipt-manage', 'title' => 'receipt management', 'navName' => 'RECEIPT
MANAGEMENT', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                @include('alerts.success')
                <div class="col-8">

                </div>

                <div class="col-4">
                    <form action="{{ route('export-pdf') }}" method="get">
                        @csrf
                        <div class="row">
                            <div class="col-9">
                                <select class="form-select" id="inputGroupSelect04"
                                    aria-label="Example select with button addon" name="id_export" id="id_export">

                                    <option selected>Choose...</option>
                                    @foreach ($agent_data as $item)
                                        <option value="{{ $item->enterprise_id }}">{{ $item->enterprise_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <button class="btn btn-warning" type="submit"><i class="far fa-file-pdf"></i> EXPORT</button>
                            </div>
                        </div>
                    </form>

                </div>

                <div class="card-body  table-responsive">
                    <table class="table table-hover" id="datatable">
                        <thead class="table-dark">
                            <th class="fw-bold" scope="col">#</th>
                            <th class="fw-bold" scope="col">ID</th>
                            <th class="fw-bold" scope="col">Agent</th>
                            <th class="fw-bold" scope="col">Container No.</th>
                            <th class="fw-bold" scope="col">Size</th>
                            <th class="fw-bold" scope="col">Date In</th>
                            <th class="fw-bold" scope="col">Date Out</th>
                            <th class="fw-bold" scope="col">Long Stay</th>
                            <th class="fw-bold" scope="col">expenses</th>
                            <th class="fw-bold" scope="col">Print</th>
                            <th class="fw-bold" scope="col">Management</th>

                        </thead>
                        <tbody>
                            @php
                                $count = 0;

                            @endphp
                            @foreach ($in_data as $item)
                                @php
                                    $diffdays = Carbon\Carbon::parse($item->manage_in_date)->diffInDays(Carbon\Carbon::parse(date('d-m-Y', strtotime($item->manage_out_date))));
                                @endphp
                                <tr>
                                    <td>{{ $count += 1 }}</td>
                                    <td>00{{ $item->container_id }}</td>
                                    <td>{{ $item->enterprise_name }}</td>
                                    <td>{{ $item->container_number }}</td>
                                    <td>{{ $item->container_type }}</td>
                                    <td>{{ date('d/m/Y', strtotime($item->manage_in_date)) }}</td>
                                    <td>
                                        @if ($item->manage_out_date != '')
                                            {{ date('d/m/Y', strtotime($item->manage_out_date)) }}
                                        @else
                                            {{ '-' }}

                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->manage_out_date != '')
                                            {{ $diffdays }}
                                        @else
                                            {{ '-' }}

                                        @endif
                                    </td>
                                    <td>
                                        @if ($diffdays > 5 && $item->manage_out_date != '')
                                            @if ($item->container_type == '20DC')
                                                {{ $diffdays * 20 }}
                                            @elseif ($item->container_type == '45HC')
                                                {{ $diffdays * 60 }}
                                            @else
                                                {{ $diffdays * 40 }}
                                            @endif
                                        @else
                                            {{ 0 }}



                                        @endif
                                    </td>

                                    <td>
                                        <a class="btn btn-dark"
                                            href="{{ route('pdf', ['id' => $item->container_id]) }}"><i
                                                class="fas fa-print"></i></a>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-info mr-1 btn-view" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop-view"
                                                data-agent="{{ $item->enterprise_name }}"
                                                data-no="{{ $item->container_number }}"
                                                data-type="{{ $item->container_type }}"
                                                data-grade="{{ $item->container_grade_name }}"
                                                data-status="{{ $item->status }}"
                                                data-date="{{ $item->manage_in_date }}"
                                                data-name="{{ $item->manage_in_driver_name }}"
                                                data-tel="{{ $item->manage_in_driver_tel }}"
                                                data-car="{{ $item->manage_in_car_registration }}"
                                                data-prise="{{ $item->manage_in_driver_enterprise }}"
                                                data-date-out="{{ $item->manage_out_date }}"
                                                data-name-out="{{ $item->manage_out_driver_name }}"
                                                data-tel-out="{{ $item->manage_out_driver_tel }}"
                                                data-car-out="{{ $item->manage_out_car_registration }}"
                                                data-prise-out="{{ $item->manage_out_driver_enterprise }}">
                                                <i class="fas fa-search text-dark "></i></button>
                                            <button class="btn btn-danger btn-delete" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop-delete"
                                                data-id="{{ $item->container_id }}"
                                                data-no="{{ $item->container_number }}">
                                                <i class="fas fa-trash-alt "></i></button>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('pages.container-management.record-management.management.view')
    @include('pages.container-management.record-management.management.delete')
    @include('pages.container-management.record-management.script')
@endsection
