<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add New Supplier</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="supplier_add.php">
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                </div>
                <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Address</label>
                  <div class="col-sm-9">
                    <textarea id="editor2" name="address" rows="5" cols="60"></textarea>
                  </div>
                  
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Contact Number</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="contact_number" name="contact_number" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Edit Supplier</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="supplier_edit.php">
                <input type="hidden" class="supplier_id" name="id">
                <div class="form-group">
                    <label for="edit_name" class="col-sm-3 control-label">Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_name" name="name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_name" class="col-sm-3 control-label">Address</label>
                    <div class="col-sm-9">
                        <textarea id="editor2" class="edit_address" name="address" rows="5" cols="60"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_name" class="col-sm-3 control-label">Contact Number</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_contact_number" name="contact_number">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="supplier_delete.php">
                <input type="hidden" class="supplier_id" name="id">
                <div class="text-center">
                    <p>DELETE SUPPPLER</p>
                    <h2 class="bold catname"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>
