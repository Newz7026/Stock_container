@extends('layouts.app', ['activePage' => 'container-manage', 'title' => 'container management', 'navName' => 'CONTAINER
MANAGEMENT', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                @include('alerts.success')

                <div class="col-md-12">
                    <form action="{{ route('container-manage-search') }}" method="get">
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
                </div>
                <div class="col-md-12">
                    <div class="row mb-2">
                        <div class="col-10">

                        </div>
                        <div class="col-2 d-grid gap-2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                </div>

                <table class="table table-responsive mt-2" id="datatable">
                    <thead class="table-dark">
                        <th>#</th>
                        <th>Agent</th>
                        <th>Container No.</th>
                        <th>Size</th>
                        <th>Grade</th>
                        <th>Date In</th>
                        <th>Long Stay</th>
                        <th>Shipper In</th>
                        <th>Get out</th>
                        <th>manage</th>
                    </thead>
                    <tbody >
                        @php
                            $count = 0;
                            $today = \Carbon\Carbon::now();
                        @endphp
                        @if (is_array($in_data) || is_object($in_data))
                            @foreach ($in_data as $item)
                                @php
                                    $diffdays = Carbon\Carbon::parse($item->manage_in_date)->diffInDays(Carbon\Carbon::parse(date('d-m-Y', strtotime($today))));
                                @endphp
                                <tr>
                                    <th>{{ $count += 1 }}</th>
                                    <td><span class="d-inline-block text-truncate"
                                            style="max-width: 100px;">{{ $item->enterprise_name }}</span></td>
                                    <td>{{ $item->container_number }}</td>
                                    <td>{{ $item->container_type }}</td>
                                    <td>{{ $item->container_grade_name }}</td>

                                    <td>{{ date('d/m/Y', strtotime($item->manage_in_date)) }}</td>
                                    <td>{{ $diffdays }}</td>
                                    <td>{{ $item->manage_in_driver_enterprise }}</td>
                                    <td>
                                        <div class="d-grid gap-2">
                                            <button class="btn btn-secondary btn-expose" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop-expose"
                                                data-id="{{ $item->container_id }}"
                                                data-agent="{{ $item->enterprise_id }}"
                                                data-no="{{ $item->container_number }}"
                                                data-type="{{ $item->container_type }}"
                                                data-grade="{{ $item->container_grade_name }}"
                                                data-status="{{ $item->status }}"
                                                data-date="{{ $item->manage_in_date }}"
                                                data-name="{{ $item->manage_in_driver_name }}"
                                                data-tel="{{ $item->manage_in_driver_tel }}"
                                                data-car="{{ $item->manage_in_car_registration }}"
                                                data-prise="{{ $item->manage_in_driver_enterprise }}">
                                                <i class="fas fa-sign-out-alt "></i></i></button>
                                        </div>
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
                                                data-prise="{{ $item->manage_in_driver_enterprise }}">
                                                <i class="fas fa-search text-dark "></i></button>


                                            <button class="btn btn-warning mr-1 btn-update " data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop-update"
                                                data-id="{{ $item->container_id }}"
                                                data-agent="{{ $item->enterprise_id }}"
                                                data-no="{{ $item->container_number }}"
                                                data-type="{{ $item->container_type_id }}"
                                                data-grade="{{ $item->container_grade_id }}"
                                                data-status="{{ $item->status }}"
                                                data-date="{{ $item->manage_in_date }}"
                                                data-name="{{ $item->manage_in_driver_name }}"
                                                data-tel="{{ $item->manage_in_driver_tel }}"
                                                data-car="{{ $item->manage_in_car_registration }}"
                                                data-prise="{{ $item->manage_in_driver_enterprise }}">
                                                <i class="far fa-edit text-dark"></i></button>

                                            <button class="btn btn-danger btn-delete" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop-delete"
                                                data-id="{{ $item->container_id }}"
                                                data-no="{{ $item->container_number }}">
                                                <i class="fas fa-trash-alt "></i></button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    @include('pages.container-management.stock-container-management.script')
    @include('pages.container-management.stock-container-management.management.view')
    @include('pages.container-management.stock-container-management.management.insert')
    @include('pages.container-management.stock-container-management.management.update')
    @include('pages.container-management.stock-container-management.management.delete')
    @include('pages.container-management.stock-container-management.management.expose')


@endsection
