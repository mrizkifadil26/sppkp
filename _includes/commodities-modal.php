<!-- Delete Modal -->
<div class="modal fade" id="deleteModal<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete Commodities?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Are you sure want to delete this?
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a type="submit" name="delete" class="btn btn-danger" href="?delete=<?= $id; ?>">Delete</a>
      </div>
    </div>
  </div>
</div>

<!-- Delete Modal End -->

<!-- Edit Modal -->
<div class="modal fade editModal" id="editModal<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel"><i class="fa fa-pencil-alt"></i> Edit Commodities</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="?edit=<?= $id; ?>" role="form" method="post" id="editFormKomoditi">
        <div class="form-group row">
          <!-- <label for="editCommoditiesId" class="col-sm-3 col-form-label">Id</label> -->
          <div class="col-sm-9">
            <input type="hidden" class="form-control" id="editCommoditiesId" value="<?= $id ?>" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="editCommodities" class="col-sm-3 col-form-label">Komoditi</label>
          <div class="col-sm-9">
            <input type="text" name="editKomoditi" class="form-control" id="editCommodities" value="<?= $komoditi; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="editSatuan" class="col-sm-3 col-form-label">Satuan</label>
          <div class="col-sm-9">
            <input type="text" name="editSatuan" class="form-control" id="editSatuan" value="<?= $satuan; ?>">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Update</a>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Edit Modal End -->