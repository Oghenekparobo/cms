<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-sm p-4 mb-4" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">confirm</h4>
      </div>
      <div class="modal-body">
        <p>are you sure, you want to delete</p>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary modal_delete_link" data-dismiss="modal">okay</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>