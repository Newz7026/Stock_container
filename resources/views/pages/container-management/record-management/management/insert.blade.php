<!-- Modal -->
<div class="modal fade" id="staticBackdrop-add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ url('record-manage/insert-container') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bolder" id="staticBackdropLabel">Container Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body fw-bolder">
                    <div class="row justify-content-center">

                        <div class="col-4 mb-3">
                            <label for="exampleInputEmail1" class="form-label">Date Get In</label>
                            <input type="date" onload="getDate()" name="date_in" class="form-control"
                                id="">
                        </div>
                        <div class="col-4 text-center">
                            <div class="display-4"><i class="fas fa-angle-double-right"></i></div>
                        </div>
                        <div class="col-4">
                            <label for="exampleInputEmail1" class="form-label">Date Get Out</label>
                            <input type="date" onload="getDate()" class="form-control" id="" name="date_out">
                        </div>
                        <div class="col-12 mb-2">
                            <label for="exampleInputEmail1" class="form-label">Agent</label>
                            <select class="form-select" id="" name="enterprise_id">
                                <option>------</option>
                                @foreach ($agent_data as $item)
                                    <option value="{{ $item->enterprise_id }}">{{ $item->enterprise_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 mb-2">
                            <label for="exampleInputEmail1" class="form-label">Container Number</label>
                            <input type="text" class="form-control" id="" name="container_no"
                                aria-describedby="emailHelp">
                        </div>

                        <div class="col-6 mb-2">
                            <label for="exampleInputPassword1" class="form-label">Size</label>
                            <select class="form-select" id="" name="container_type_id">
                                <option value="" selected>----</option>
                                @foreach ($type_data as $item)
                                    <option value="{{ $item->container_type_id }}">{{ $item->container_type }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6 mb-2">
                            <label for="exampleInputPassword1" class="form-label">Grade</label>
                            <select class="form-select" id="" name="container_grade_id">
                                <option value="" selected>----</option>
                                @foreach ($grade_data as $item)
                                    <option value="{{ $item->container_grade_id }}">
                                        {{ $item->container_grade_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 mb-2">
                            <label for="exampleInputPassword1" class="form-label">Status</label>

                            <textarea type="text" class="form-control" id=""
                                name="container_status"></textarea>
                        </div>

                        <div class="alert alert-success  row">
                            <label for="" class="form-label fs-4">Get In</label>

                            <div class="col-3 ">
                                <label for="exampleInputPassword1" class="form-label">Driver Name</label>
                                <input type="text" class="form-control" id="" name="get_in_name">
                            </div>
                            <div class="col-3 ">
                                <label for="exampleInputPassword1" class="form-label">Driver Tel.</label>
                                <input type="text" class="form-control" id="" name="get_in_tel">
                            </div>
                            <div class="col-3">
                                <label for="exampleInputPassword1" class="form-label">Registration</label>
                                <input type="text" class="form-control" id="" name="get_in_car">
                            </div>
                            <div class="col-3">
                                <label for="exampleInputPassword1" class="form-label">Enterprise</label>
                                <input type="text" class="form-control" id="" name="get_in_prise">
                            </div>
                        </div>
                        <div class="alert alert-danger row">
                            <label for="" class="form-label fs-4">Get Out</label>

                            <div class="col-3 ">
                                <label for="exampleInputPassword1" class="form-label">Driver Name</label>
                                <input type="text" class="form-control" id="" name="get_out_name">
                            </div>
                            <div class="col-3">
                                <label for="exampleInputPassword1" class="form-label">Driver Tel.</label>
                                <input type="text" class="form-control" id="" name="get_out_tel">
                            </div>
                            <div class="col-3 ">
                                <label for="exampleInputPassword1" class="form-label">Registration</label>
                                <input type="text" class="form-control" id="" name="get_out_car">
                            </div>
                            <div class="col-3 ">
                                <label for="exampleInputPassword1" class="form-label">Enterprise</label>
                                <input type="text" class="form-control" id="" name="get_out_prise">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </div>

        </form>

    </div>
</div>
