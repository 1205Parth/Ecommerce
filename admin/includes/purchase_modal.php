<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add New Purchase</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="purchase_add.php">
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Supplier</label>

                    <div class="col-sm-9">
                        <select class="form-control supplier_list" name="supplier_id" required>
                            <option value="" selected>- Select Supplier -</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Raw Material</label>

                    <div class="col-sm-9">
                        <select class="form-control raw_material_list" name="raw_material_id" required>
                            <option value="" selected>- Select Material -</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Quantity</label>
                  <div class="col-sm-9">
                    <input type="number" name="quantity" class="form-control"  placeholder="Quantity in meter" required/>
                  </div>
                  
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Price</label>

                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="price" name="price" required>
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
              <form class="form-horizontal" method="POST" action="purchase_edit.php">
                <input type="hidden" class="purchase_id" name="id">
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Supplier</label>

                    <div class="col-sm-9">
                        <select class="form-control supplier_list" name="supplier_id" required>
                            <option value="" selected>- Select Supplier -</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Raw Material</label>

                    <div class="col-sm-9">
                        <select class="form-control raw_material_list" name="raw_material_id" required>
                            <option value="" selected>- Select Material -</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Quantity</label>
                  <div class="col-sm-9">
                    <input type="number" name="quantity" class="form-control" id="edit_quantity" placeholder="Quantity in meter" required/>
                  </div>
                  
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Price</label>

                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="edit_price" name="price" required>
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
              <form class="form-horizontal" method="POST" action="purchase_delete.php">
                <input type="hidden" class="purchase_id" name="id">
                <div class="text-center">
                    <p>DELETE Purchase</p>
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
