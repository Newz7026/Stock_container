<div class="modal fade" id="staticBackdrop-insert" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    @include('alerts.success')
    <div class="modal-dialog">
        <form action="{{url('/agent/insert-agent')}}" class="needs-validation" method="POST" novalidate>
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Insert Agents</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <label for="exampleFormControlInput1" class="form-label">Name Agent</label>
                            <input type="text" class="form-control" id="name_agent" name="name_agent"
                                placeholder="Name Agent">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <label for="exampleFormControlInput1" class="form-label">Address </label>
                            <textarea class="form-control" id="add_agent" name="add_agent"
                                placeholder="address" >
                               </textarea>
                        </div>

                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <label for="exampleFormControlInput1" class="form-label">Tax ID.</label>
                            <input type="text" class="form-control" id="tax_agent" name="tax_agent" maxlength="13"
                                placeholder="tax id">
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <label for="exampleFormControlInput1" class="form-label">Tel.</label>
                            <input type="text" class="form-control" id="tel_agent" name="tel_agent"
                                placeholder="Tel.">
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1" class="form-label">Fax</label>
                            <input type="text" class="form-control" id="fax_agent" name="fax_agent"
                                placeholder="Fax">
                        </div>
                    </div>

                </div>
                <div class="modal-footer mt-4">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                    <button type="reset" class="btn btn-warning">Reset</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </div>


        </form>

    </div>
</div>
