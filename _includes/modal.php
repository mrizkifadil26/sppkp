<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="logout.php">Logout</a>
      </div>
    </div>
  </div>
</div>

<!-- Logout Modal End -->

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete User?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Are you sure want to delete this user?</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button type="submit" name="deleteData" class="btn btn-danger" href="">Delete</button>
      </div>
    </div>
  </div>
</div>

<!-- Delete Modal End -->

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel"><i class="fa fa-pencil-alt"></i> Edit User</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" role="form">
        <div class="form-group row">
          <label for="editUsername" class="col-sm-3 col-form-label">Username</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="editUsername" value="<?= $username; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="editOldPassword" class="col-sm-3 col-form-label">Old Password</label>
          <div class="col-sm-9">
            <input type="password" class="form-control" id="editOldPassword">
          </div>
        </div>
        <div class="form-group row">
          <label for="editNewPassword" class="col-sm-3 col-form-label">New Password</label>
          <div class="col-sm-9">
            <input type="password" class="form-control" id="editNewPassword">
          </div>
        </div>
        <div class="form-group row">
          <label for="editRole" class="col-sm-3 col-form-label">Role</label>
          <div class="col-sm-9">
            <select name="" id="editRole" class="form-control">
              <option value="<?php ($role == 'admin') ? "selected" : ""; ?>">Admin</option>
              <option value="<?php ($role == 'operator') ? "selected" : ""; ?>">Operator</option>
              <option value="<?php ($role == 'surveyor') ? "selected" : ""; ?>">Surveyor</option>
            </select>
          </div>
        </div>
      </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button type="submit" name="editData" class="btn btn-primary" href="">Update</button>
      </div>
    </div>
  </div>
</div>
<!-- Edit Modal End -->