@extends('layouts.app', ['activePage' => 'Expenses', 'title' => 'Expenses management', 'navName' => 'EXPENSES
MANAGEMENT', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-6 ">
                    <table
                        class="table table-bordered table-responsive-sm justify-content-center shadow-sm p-3 mb-5 bg-body rounded text-center">
                        <thead>
                            <tr class="table-dark ">
                                <th scope="col">
                                    <h5 class="text-center">#</h5>
                                </th>
                                <th scope="col">
                                    <h5 class="text-center">Type</h5>
                                </th>
                                <th scope="col">
                                    <h5 class="text-center">Price</h5>
                                </th>
                                <th scope="col">
                                    <h5 class="text-center">managemant</h5>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($data_type as $data_types)
                                <form action="{{ url('expense/action') }}" method="POST">
                                    @csrf
                                    <tr>
                                        <th scope="row">{{ $count += 1 }}<input type="hidden" name="id" value="{{ $data_types->container_type_id }}"></th>

                                        <td><fieldset disabled><input type="text" class="form-control text-center"  name="name" id="input-name"
                                            value="{{ $data_types->container_type }}"></fieldset>
                                            </td>
                                        <td><input type="text" class="form-control text-center" name="price" id="price"
                                                value="{{ $data_types->price }}"></td>
                                        <td colspan="2">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="submit" name="action" value="update" class="btn btn-warning"><i
                                                        class="far fa-edit"></i></button>
                                                {{-- <button type="submit"  name="action" value="delete" class="btn btn-danger"><i
                                                        class="far fa-trash-alt"></i></button> --}}
                                            </div>
                                        </td>
                                    </tr>

                                </form>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-4"></div>
            </div>
        </div>
    </div>
@endsection
