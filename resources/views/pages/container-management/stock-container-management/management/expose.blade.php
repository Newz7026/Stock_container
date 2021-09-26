<!-- Modal -->
<div class="modal fade" id="staticBackdrop-expose" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{url('/container-manage/expose-container')}}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Container Manage out</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">

                        <div class="col-6">
                            <label for="exampleInputEmail1" class="form-label">Date Get Out</label>

                            <input type="date" onload="getDate()" name="expose_date" class="form-control" id="">
                        </div>
                        <div class="col-12 mb-2">
                            <input type="hidden" class="form-control" id="hidden_id_expose" name="id_expose">
                            <label for="exampleInputEmail1" class="form-label">Agent</label>
                            <select class="form-select" id="expose_agent" name="expose_agent">
                                <option>-----------</option>
                                @foreach ($agent_data as $item)
                                    <option value="{{ $item->enterprise_id }}">{{ $item->enterprise_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 mb-2">
                            <label for="exampleInputEmail1" class="form-label">Container Number</label>
                            <input type="text" class="form-control" id="expose_no" disabled>
                        </div>

                        <div class="col-6 mb-2">
                            <label for="exampleInputPassword1" class="form-label">Size</label>
                            <input type="text" class="form-control" id="expose_type" name="expose_type" disabled>
                        </div>
                        <div class="col-6 mb-2">
                            <label for="exampleInputPassword1" class="form-label">Grade</label>
                            <input type="text" class="form-control" id="expose_grade" name="expose_grade" disabled>
                        </div>
                        <div class="col-12 mb-2">
                            <label for="exampleInputPassword1" class="form-label">Status</label>

                            <textarea type="text" class="form-control" id="expose_status" name="expose_status"></textarea>
                        </div>

                        <div class="col mb-2">
                            <label for="exampleInputPassword1" class="form-label">Driver Name</label>
                            <input type="text" class="form-control" name="expose_name">
                        </div>
                        <div class="col mb-2">
                            <label for="exampleInputPassword1" class="form-label">Driver Tel.</label>
                            <input type="text" class="form-control" name="expose_tel">
                        </div>
                        <div class="col mb-2">
                            <label for="exampleInputPassword1" class="form-label">Registration</label>
                            <input type="text" class="form-control"  name="expose_car">
                        </div>
                        <div class="col mb-2">
                            <label for="exampleInputPassword1" class="form-label">Enterprise</label>
                            <input type="text" class="form-control"  name="expose_prise">
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
