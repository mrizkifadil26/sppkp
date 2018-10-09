<!-- Delete Modal -->
<div class="modal fade" id="deleteModal<?= $userid; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete User?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Are you sure want to delete this user?
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a type="submit" name="delete" class="btn btn-danger" href="?delete=<?= $userid; ?>">Delete</a>
      </div>
    </div>
  </div>
</div>

<!-- Delete Modal End -->

<!-- Edit Modal -->
<div class="modal fade editModal" id="editModal<?= $userid; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel"><i class="fa fa-pencil-alt"></i> Edit User</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="?edit=<?= $userid; ?>" role="form" method="post" id="editFormUser">
        <div class="form-group row">
          <!-- <label for="editUserId" class="col-sm-3 col-form-label">Id</label> -->
          <div class="col-sm-9">
            <input type="hidden" class="form-control" id="editUserId" value="<?= $userid ?>" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="editUsername" class="col-sm-3 col-form-label">Username</label>
          <div class="col-sm-9">
            <input type="text" name="editUsername" class="form-control" id="editUsername" value="<?= $username; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="editRole" class="col-sm-3 col-form-label">Role</label>
          <div class="col-sm-9">
            <select name="editRole" id="editRole" class="form-control">
              <option value="admin" <?= ($role == 'admin') ? 'selected' : ''; ?>>Admin</option>
              <option value="operator" <?= ($role == 'operator') ? 'selected' : ''; ?>>Operator</option>
              <option value="surveyor" <?= ($role == 'surveyor') ? 'selected' : ''; ?>>Surveyor</option>
            </select>
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