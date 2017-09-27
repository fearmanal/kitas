<?php if($userdata->role == 'administrator') { ?>

<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Users</h3>

  <form id="form-update-users" method="POST">
    <div>    
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" placeholder="Email" name="email" aria-describedby="sizing-addon2" value="<?php echo $dataUsers->email; ?>">
      </div> 
      <div class="form-group">
        <label for="nama">Name</label>
        <input type="text" class="form-control" placeholder="Name" name="nama" aria-describedby="sizing-addon2" value="<?php echo $dataUsers->nama; ?>">
      </div>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" placeholder="Username" name="username" aria-describedby="sizing-addon2" value="<?php echo $dataUsers->username; ?>">
      </div>
      <div class="form-group">
        <label for="role">Role</label>
        <select class="form-control" name="role" aria-describedby="sizing-addon2">
          <option value="guest" <?php if ($dataUsers->role == 'guest') echo "selected"; ?>>Guest</option>
          <option value="management" <?php if ($dataUsers->role == 'management') echo "selected"; ?>>Management</option>
          <option value="administrator" <?php if ($dataUsers->role == 'administrator') echo "selected"; ?>>Administrator</option>
        </select>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-8">          
          <input type="hidden" name="id" value="<?php echo $dataUsers->id; ?>">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
      <div class="col-md-4">
        <button type="button" class="form-control btn btn-danger" data-dismiss="modal" aria-label="Close"><i class="glyphicon glyphicon-remove-sign"></i> Cancel</button>
      </div>
    </div>
  </form>
</div>

<?php } ?>