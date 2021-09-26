  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop-delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog ">
          <div class="modal-content bg-danger text-white">
              <form action="{{url('/container-manage/delete-container')}}" method="POST">
                @csrf
                  <div class="modal-header">
                      <h5 class="modal-title" id="staticBackdropLabel">Delete</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <input type="text" name="delete_id" id="delete_id" hidden>
                      <input type="text" class="form-control"  id="delete_number"
                          name="delete_number" disabled>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
                      <button type="submit" class="btn btn-warning">Delete</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
