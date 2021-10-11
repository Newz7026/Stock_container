@extends('layouts.app', ['activePage' => 'agent-manage', 'title' => 'Agent manage', 'navName' => 'Agent management',
'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                @include('alerts.success')
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-10">

                        </div>
                        <div class="col-2 d-grid gap-2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop-insert"><i class="fas fa-user-plus"></i></button>
                        </div>
                    </div>

                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover table-dark table-striped" id="datatable">
                        <thead class="row-12">
                            <th class="col-1">#</th>
                            <th class="col-2">Name</th>
                            <th class="col-4">Address</th>
                            <th class="col-2">Phone</th>
                            <th class="col-2">Fax</th>
                            <th class="col-3">Taxpayer</th>
                            <th class="col-1">Edit</th>
                            <th class="col-8">Delete</th>
                        </thead>
                        <tbody>

                            @php
                                $count = 0;
                            @endphp
                            @foreach ($agent_data as $item)
                                <tr class="row-12">
                                    <td class="col-1">{{ $count += 1 }}</td>
                                    <td class="col-2"><span class="d-inline-block text-truncate" style="max-width: 100px;">{{ $item->enterprise_name }}</span></td>
                                    <td class="col-4">{{ $item->enterprise_add }}</td>
                                    <td class="col-2">{{ $item->enterprise_phone }}</td>
                                    <td class="col-2">{{ $item->enterprise_fax }}</td>
                                    <td class="col-3">{{ $item->enterprise_taxpayer }}</td>
                                    <td class="col-1">

                                        <button class="btn btn-warning  btn-update" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop-update" data-id="{{ $item->enterprise_id }}"
                                            data-name="{{ $item->enterprise_name }}"
                                            data-add="{{ $item->enterprise_add }}"
                                            data-phone="{{ $item->enterprise_phone }}"
                                            data-fax="{{ $item->enterprise_fax }}"
                                            data-taxpayer="{{ $item->enterprise_taxpayer }}"><i
                                                class="far fa-edit text-dark"></i></button>
                                    </td>
                                    <td class="col-8">

                                        <button class="btn btn-danger ml-2 btn-delete" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop-delete" data-id="{{ $item->enterprise_id }}"
                                            data-name="{{ $item->enterprise_name }}"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('pages.container-management.agent-management.script')
    @include('pages.container-management.agent-management.management.insert')
    @include('pages.container-management.agent-management.management.update')
    @include('pages.container-management.agent-management.management.delete')
@endsection
