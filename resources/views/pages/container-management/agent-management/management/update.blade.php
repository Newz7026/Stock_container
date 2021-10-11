<div class="modal fade" id="staticBackdrop-update" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{url('/agent/update-agent')}}" method="POST">
            @csrf
            <div class="modal-content  text-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Agents</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <label for="exampleFormControlInput1" class="form-label">Name Agent</label>
                            <input type="text" name="edit_id" id="edit_id" hidden>
                            <input type="text" class="form-control" id="edit_name" name="edit_name">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <label for="exampleFormControlInput1" class="form-label">Address </label>
                            <textarea class="form-control" id="edit_add" name="edit_add" rows="3"></textarea>
                        </div>

                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <label for="exampleFormControlInput1" class="form-label">Tax ID.</label>
                            <input type="text" class="form-control" id="edit_phone" name="edit_phone" maxlength="13">
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <label for="exampleFormControlInput1" class="form-label">Tel.</label>
                            <input type="text" class="form-control" id="edit_fax" name="edit_fax">
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1" class="form-label">Fax</label>
                            <input type="text" class="form-control" id="edit_tax" name="edit_tax">
                        </div>
                    </div>

                </div>
                <div class="modal-footer mt-4">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </div>

        </form>

    </div>
</div>
