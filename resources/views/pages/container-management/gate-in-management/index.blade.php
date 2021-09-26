@extends('layouts.app', ['activePage' => 'gate-in-management', 'title' => 'GATE IN MANAGE', 'navName' => 'GATE IN
MANAGE', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                @include('alerts.success')
                <div class="col-10 ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">MANAGEMENT</h4>
                            <p class="card-category">Input Data Container</p>
                        </div>
                        <div class="card-body">
                            <form action="{{url('/container-manage/insert-container')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-9">
                                        <label for="exampleFormControlInput1" class="form-label">Agent</label>

                                        <select class="form-select" aria-label="Default select example" name="enterprise_id" id="enterprise_id">
                                            <option value="" selected>----</option>
                                            @foreach ($agent_data as $item)
                                            <option value="{{ $item->enterprise_id }}">{{ $item->enterprise_name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-3">
                                        <label for="exampleFormControlInput1" class="form-label">Date</label>
                                        <input type="date" onload="getDate()" class="form-control" id="date" name="date" >
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-6">
                                        <label for="exampleFormControlInput1" class="form-label">Number Container</label>
                                        <input type="text" class="form-control" id="container_no" name="container_no"
                                            placeholder="Number Container">
                                    </div>
                                    <div class="col-2">
                                        <label for="exampleFormControlInput1" class="form-label">Size</label>
                                        <select class="form-select" aria-label="Default select example" name="container_type_id" id="container_type_id">
                                            <option value="" selected>----</option>
                                            @foreach ($type_data as $item)
                                            <option value="{{ $item->container_type_id }}">{{ $item->container_type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <label for="exampleFormControlInput1" class="form-label">Grade</label>
                                        <select class="form-select" aria-label="Default select example" name="container_grade_id" id="container_grade_id">
                                            <option value="" selected>----</option>
                                            @foreach ($grade_data as $item)
                                            <option value="{{ $item->container_grade_id }}">{{ $item->container_grade_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <label for="exampleFormControlInput1" class="form-label">Remark</label>
                                        <textarea class="form-control" id="remark" name="remark" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-3">
                                        <label for="exampleFormControlInput1" class="form-label">Driver Name</label>
                                        <input type="text" class="form-control" id="dri_in_name" name="dri_in_name"
                                            placeholder="Driver Name">
                                    </div>
                                    <div class="col-3">
                                        <label for="exampleFormControlInput1" class="form-label">Driver Tel.</label>
                                        <input type="text" class="form-control" id="dri_in_tel" name="dri_in_tel"
                                            placeholder="Driver Tel.">
                                    </div>
                                    <div class="col-3">
                                        <label for="exampleFormControlInput1" class="form-label">Registration</label>
                                        <input type="text" class="form-control" id="dri_in_regis" name="dri_in_regis"
                                            placeholder="Registration">
                                    </div>
                                    <div class="col-3">
                                        <label for="exampleFormControlInput1" class="form-label">Enterprise</label>
                                        <input type="text" class="form-control" id="dri_in_prise" name="dri_in_prise"
                                            placeholder="Enterprise">
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-1">
                                        <button type="reset" class="btn btn-warning">Reset</button>
                                    </div>
                                    <div class="col-xxl-10 col-sm-9">
                                    </div>

                                    <div class="col-1">
                                        <button type="submit" class="btn btn-success">Confirm</button>
                                    </div>


                                </div>

                            </form>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
