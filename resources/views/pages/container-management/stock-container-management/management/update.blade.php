<!-- Modal -->
<div class="modal fade" id="staticBackdrop-update" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{url('/container-manage/update-container')}}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Container Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">

                        <div class="col-6">
                            <label for="exampleInputEmail1" class="form-label">Date Get In</label>
                            <input type="hidden" class="form-control" id="hidden_id_update" name="hidden_id_update" aria-describedby="emailHelp">
                            <input type="date" onload="getDate()" name="update_date" class="form-control" id="update_date">
                        </div>
                        <div class="col-12 mb-2">
                            <label for="exampleInputEmail1" class="form-label">Agent</label>
                            <select class="form-select" id="update_agent" name="update_agent">
                                <option>------</option>
                                @foreach ($agent_data as $item)
                                    <option value="{{ $item->enterprise_id }}">{{ $item->enterprise_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 mb-2">
                            <label for="exampleInputEmail1" class="form-label">Container Number</label>
                            <input type="text" class="form-control" id="update_no" name="update_no" aria-describedby="emailHelp">
                        </div>

                        <div class="col-6 mb-2">
                            <label for="exampleInputPassword1" class="form-label">Size</label>
                            <select class="form-select" id="update_type" name="update_type">
                                <option value="" selected>----</option>
                                @foreach ($type_data as $item)
                                    <option value="{{ $item->container_type_id }}">{{ $item->container_type }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6 mb-2">
                            <label for="exampleInputPassword1" class="form-label">Grade</label>
                            <select class="form-select" id="update_grade" name="update_grade">
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

                            <textarea type="text" class="form-control" id="update_status" name="update_status"></textarea>
                        </div>

                        <div class="col-6 mb-2">
                            <label for="exampleInputPassword1" class="form-label">Driver Name</label>
                            <input type="text" class="form-control" id="update_name" name="update_name">
                        </div>
                        <div class="col-6 mb-2">
                            <label for="exampleInputPassword1" class="form-label">Driver Tel.</label>
                            <input type="text" class="form-control" id="update_tel" name="update_tel">
                        </div>
                        <div class="col-6 mb-2">
                            <label for="exampleInputPassword1" class="form-label">Registration</label>
                            <input type="text" class="form-control" id="update_car" name="update_car">
                        </div>
                        <div class="col-6 mb-2">
                            <label for="exampleInputPassword1" class="form-label">Enterprise</label>
                            <input type="text" class="form-control" id="update_prise" name="update_prise">
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
