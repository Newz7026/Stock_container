@extends('layouts.app', ['activePage' => 'container-manage', 'title' => 'container management', 'navName' => 'CONTAINER
MANAGEMENT', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                @include('alerts.success')
                <div class="col-md-12">
                    <div class="row mb-4">
                        <div class="col-10">
                            <h4>List Container</h4>
                        </div>
                        <div class="col-2 d-grid gap-2">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                </div>

                <table class="table table-responsive mt-2" id="datatable">
                    <thead class="table-dark">
                        <th>#</th>
                        <th>ID</th>
                        <th>Agent</th>
                        <th>Container No.</th>
                        <th>Size</th>
                        <th>Grade</th>
                        <th>Date In</th>
                        <th>imported by</th>
                        <th>Get out</th>
                        <th>manage</th>
                    </thead>
                    <tbody>
                        @php
                            $count = 0;
                        @endphp
                        @foreach ($in_data as $item)
                            <tr>
                                <th>{{ $count += 1 }}</th>
                                <td>00{{ $item->container_id }}</td>
                                <td>{{ $item->enterprise_name }}</td>
                                <td>{{ $item->container_number }}</td>
                                <td>{{ $item->container_type }}</td>
                                <td>{{ $item->container_grade_name }}</td>
                                <td>{{  date('d/m/Y', strtotime($item->manage_in_date));}}</td>
                                <td>{{ $item->manage_in_driver_name }}</td>
                                <td>
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-primary btn-expose" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop-expose" data-id="{{ $item->container_id }}"
                                            data-agent="{{ $item->enterprise_id }}"
                                            data-no="{{ $item->container_number }}"
                                            data-type="{{ $item->container_type }}"
                                            data-grade="{{ $item->container_grade_name }}"
                                            data-status="{{ $item->status }}" data-date="{{ $item->manage_in_date }}"
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
                                            data-status="{{ $item->status }}" data-date="{{ $item->manage_in_date }}"
                                            data-name="{{ $item->manage_in_driver_name }}"
                                            data-tel="{{ $item->manage_in_driver_tel }}"
                                            data-car="{{ $item->manage_in_car_registration }}"
                                            data-prise="{{ $item->manage_in_driver_enterprise }}">
                                            <i class="fas fa-search text-dark "></i></button>


                                        <button class="btn btn-warning mr-1 btn-update " data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop-update" data-id="{{ $item->container_id }}"
                                            data-agent="{{ $item->enterprise_id }}"
                                            data-no="{{ $item->container_number }}"
                                            data-type="{{ $item->container_type_id }}"
                                            data-grade="{{ $item->container_grade_id }}"
                                            data-status="{{ $item->status }}" data-date="{{ $item->manage_in_date }}"
                                            data-name="{{ $item->manage_in_driver_name }}"
                                            data-tel="{{ $item->manage_in_driver_tel }}"
                                            data-car="{{ $item->manage_in_car_registration }}"
                                            data-prise="{{ $item->manage_in_driver_enterprise }}">
                                            <i class="far fa-edit text-dark"></i></button>

                                        <button class="btn btn-danger btn-delete" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop-delete" data-id="{{ $item->container_id }}"
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
    @include('pages.container-management.stock-container-management.script')
    @include('pages.container-management.stock-container-management.management.view')
    @include('pages.container-management.stock-container-management.management.insert')
    @include('pages.container-management.stock-container-management.management.update')
    @include('pages.container-management.stock-container-management.management.delete')
    @include('pages.container-management.stock-container-management.management.expose')


@endsection
