@extends('layouts.app', ['activePage' => 'receipt-manage', 'title' => 'receipt management', 'navName' => 'RECEIPT
MANAGEMENT', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                @include('alerts.success')
                    <form action="{{ route('recript-manage-search') }}" method="get">
                        <div class="row ">
                            <div class="col-6">
                                <h4>List Container</h4>
                            </div>

                            <div class="col-2">
                                <select class="form-select" aria-label="Default select example" name="agent_search">
                                    <option value="" selected>------Select Agent------</option>
                                    @if (is_array($agent_data) || is_object($agent_data))
                                        @foreach ($agent_data as $agent)
                                            <option value="{{ $agent->enterprise_id }}">{{ $agent->enterprise_name }}
                                            </option>
                                        @endforeach

                                    @endif

                                </select>


                            </div>
                            <div class="col-2">
                                <select class="form-select" aria-label="Default select example" name="type_search">
                                    <option value="" selected>------Select Size------</option>
                                    @if (is_array($type_data) || is_object($type_data))
                                        @foreach ($type_data as $type)
                                            <option value="{{ $type->container_type_id }}">{{ $type->container_type }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-2 d-grid gap-2">
                                <button type="submit" class="btn btn-secondary"><i
                                        class="fas fa-hourglass-start"></i></button>
                            </div>
                        </div>
                    </form>
                    <div class="row ">
                        <div class="col-2">
                             <a type="button" class="btn btn-warning" href="{{url('expenses')}}" >
                                <i class="fas fa-file-signature"></i>Edit expenses
                            </a>
                        </div>
                        <div class="col-10 d-md-flex justify-content-md-end">
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <button type="button" class="btn btn-primary    " data-bs-toggle="modal"
                                    data-bs-target="#report">
                                    <i class="fas fa-file-export"></i> Report
                                </button>
                                <button type="button" class="btn btn-dark  " data-bs-toggle="modal"
                                data-bs-target="#export">
                                <i class="far fa-file-pdf"></i> Export
                            </button>

                              </div>


                        </div>

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
                            <th class="fw-bold" scope="col">Deposit</th>
                            <th class="fw-bold" scope="col">Lifting</th>
                            {{-- <th class="fw-bold" scope="col">Print</th> --}}
                            <th class="fw-bold" scope="col">Management</th>

                        </thead>
                        <tbody>
                            @php
                                $count = 0;
                                $sum_long_stay = 0;
                                $sum_expenses = 0;
                                $today = \Carbon\Carbon::now();
                                $sum_lifting=0;
                            @endphp

                            @foreach ($in_data as $item)
                                @php
                                    $expenses = 0;
                                    $lifting_count = $item->lifting;
                                    if ($item->manage_out_date != '') {
                                        $diffdays = Carbon\Carbon::parse($item->manage_in_date)->diffInDays(Carbon\Carbon::parse(date('d-m-Y', strtotime($item->manage_out_date))));
                                    } else {
                                        $diffdays = Carbon\Carbon::parse($item->manage_in_date)->diffInDays(Carbon\Carbon::parse(date('d-m-Y', strtotime($today))));
                                    }
                                    if ($diffdays > 5 ) {
                                        $expenses = $diffdays * $item->price;
                                    } else {
                                        0;
                                    }
                                    $sum_lifting += $lifting_count;
                                    $sum_long_stay = (int) $sum_long_stay + $diffdays;
                                    $sum_expenses = (int) $expenses + $sum_expenses;
                                @endphp
                                <tr>
                                    <td>{{ $count += 1 }}</td>
                                    <td>{{ $item->container_id }}</td>
                                    <td>{{ $item->enterprise_name }}</td>
                                    <td>{{ $item->container_number }}</td>
                                    <td>{{ $item->container_type }}</td>
                                    <td>{{ date('d/m/Y', strtotime($item->manage_in_date)) }}</td>
                                    <td>
                                        @if ($item->manage_out_date != '')
                                            {{ date('d/m/Y', strtotime($item->manage_out_date)) }}
                                        @else
                                        <div class="badge bg-primary text-wrap">{{ 'In Stock' }}</div>

                                        @endif

                                    </td>
                                    <td>
                                            {{ $diffdays }}
                                    </td>
                                    <td>
                                        {{ $expenses }}
                                    </td>
                                    <td>
                                        {{$lifting_count}}
                                    </td>

                                    {{-- <td>
                                        <a class="btn btn-dark"
                                            href="{{ route('pdf', ['id'=>$item->container_id]) }}"><i
                                                class="fas fa-print"></i></a>
                                    </td> --}}
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
                                            {{-- <button class="btn btn-danger btn-delete" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop-delete"
                                                data-id="{{ $item->container_id }}"
                                                data-no="{{ $item->container_number }}">
                                                <i class="fas fa-trash-alt "></i></button> --}}
                                        </div>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="8" class="text-center"> ---- TOTAL ---- </td>

                                <td>{{ $sum_expenses }}</td>
                                <td>{{$sum_lifting}}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('pages.container-management.receipt-management.management.report')
    @include('pages.container-management.receipt-management.management.export')
    @include('pages.container-management.record-management.management.view')
    @include('pages.container-management.record-management.management.delete')
    @include('pages.container-management.record-management.script')
@endsection
