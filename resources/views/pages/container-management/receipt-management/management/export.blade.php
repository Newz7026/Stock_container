<!-- Modal -->
<div class="modal fade" id="export" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <br />
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Dowload Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('export-pdf') }}" method="get">
                @csrf
                <div class="modal-body">

                    <div class="row mb-2">
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Agent</label>
                            <select class="form-select" id="inputGroupSelect04"
                                aria-label="Example select with button addon" name="id_export" id="id_export">

                                <option selected>Choose...</option>
                                @foreach ($agent_data as $item)
                                    <option value="{{ $item->enterprise_id }}">{{ $item->enterprise_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class='col'>
                            <label for="exampleInputEmail1" class="form-label">Month</label>
                            <input type="month" class="form-control" id="start" name="start" min="2020-03" value="">
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Download</button>
                </div>
            </form>
        </div>
    </div>
</div>
