@extends('layouts.app', ['activePage' => 'record-manage', 'title' => 'record management', 'navName' => 'RECORD
MANAGEMENT', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                @include('alerts.success')
                <div class="col-md-12">
                    <form action="{{ route('record-manage-search') }}" method="get">
                        <div class="row ">
                            <div class="row">

                            </div>
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
                    <div class="row mb-2">
                        <div class="col-10">
                        </div>
                        <div class="col-2 d-grid gap-2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop-add"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                </div>

                <div class="card-body  table-responsive">
                    <table class="table table-hover" id="datatable">
                        <thead class="table-dark">
                            <th class="fw-bold" scope="col">#</th>
                            <th class="fw-bold" scope="col">Agent</th>
                            <th class="fw-bold" scope="col">Container No.</th>
                            <th class="fw-bold" scope="col">Size</th>
                            <th class="fw-bold" scope="col">Grade</th>
                            <th class="fw-bold" scope="col">Date Out</th>
                            <th class="fw-bold" scope="col">Shipper Out</th>
                            <th class="fw-bold" scope="col">Get Out by</th>
                            <th class="fw-bold" scope="col">Management</th>
                        </thead>
                        <tbody>
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($in_data as $item)
                                <tr>
                                    <td>{{ $count += 1 }}</td>
                                    <td><span class="d-inline-block text-truncate" style="max-width: 100px;">{{ $item->enterprise_name }}</span></td>
                                    <td>{{ $item->container_number }}</td>
                                    <td>{{ $item->container_type }}</td>
                                    <td>{{ $item->container_grade_name }}</td>
                                    <td>{{  date('d/m/Y', strtotime($item->manage_out_date));}}</td>
                                    <td>{{  $item->manage_out_driver_enterprise}}</td>
                                    <td>{{  $item->manage_out_driver_name}}</td>

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
                                                data-prise="{{ $item->manage_in_driver_enterprise }}"
                                                data-date-out="{{ $item->manage_out_date }}"
                                                data-name-out="{{ $item->manage_out_driver_name }}"
                                                data-tel-out="{{ $item->manage_out_driver_tel }}"
                                                data-car-out="{{ $item->manage_out_car_registration }}"
                                                data-prise-out="{{ $item->manage_out_driver_enterprise }}">
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('pages.container-management.record-management.management.insert')
    @include('pages.container-management.record-management.management.update')
    @include('pages.container-management.record-management.management.view')
    @include('pages.container-management.record-management.management.delete')
    @include('pages.container-management.record-management.script')
@endsection
