<div class="modal fade" id="staticBackdrop-delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{url('/agent/delete-agent')}}" method="POST">
            @csrf
            <div class="modal-content bg-danger text-white">

                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Delete Agents</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <div class="row">
                        <div class="col">
                            <input type="text" name="delete_id" id="delete_id" hidden>
                            <input type="text" class="form-control" id="delete_name" name="delete_name" disabled>
                        </div>
                    </div>
                </div>
                <div class="modal-footer mt-4">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning">Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>
