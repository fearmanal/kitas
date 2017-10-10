<?php if($userdata->role == 'administrator' || $userdata->role == 'management') { ?>

<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Staff</h3>

  <form id="form-update-staff" method="POST">
    <div>
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" placeholder="Name" name="name" aria-describedby="sizing-addon2" value="<?php echo $dataStaff->name; ?>">
      </div>    
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" placeholder="Email" name="email" aria-describedby="sizing-addon2" value="<?php echo $dataStaff->email; ?>">
      </div> 
      <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" placeholder="Phone" name="phone" aria-describedby="sizing-addon2" value="<?php echo $dataStaff->phone; ?>">
      </div>
      <div class="form-group">
        <label for="position">Position</label>
        <input type="text" class="form-control" placeholder="Position" name="position" aria-describedby="sizing-addon2" value="<?php echo $dataStaff->position; ?>">
      </div>
      <div class="form-group">
        <label for="location">Location</label>
        <input type="text" class="form-control" placeholder="Location" name="location" aria-describedby="sizing-addon2" value="<?php echo $dataStaff->location; ?>">
      </div>
      <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control" name="status" aria-describedby="sizing-addon2">
          <option value="Active" <?php if ($dataStaff->status == 'Active') echo "selected"; ?>>Active</option>
          <option value="Non Active" <?php if ($dataStaff->status == 'Non Active') echo "selected"; ?>>Non Active</option>
        </select>
      </div>
    </div> 

    <div class="form-group">
      <div class="col-md-8">          
          <input type="hidden" name="id_staff" value="<?php echo $dataStaff->id_staff; ?>">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
      <div class="col-md-4">
        <button type="button" class="form-control btn btn-danger" data-dismiss="modal" aria-label="Close"><i class="glyphicon glyphicon-remove-sign"></i> Cancel</button>
      </div>
    </div>
  </form>
</div>

<?php } else if($userdata->role == 'guest') { ?>

<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Staff</h3>

  <form id="form-update-staff" method="POST">
    <div>
      <div class="form-group">
        <label for="name">Name</label>
        <input disabled style="cursor: default;" type="text" class="form-control" placeholder="Name" name="name" aria-describedby="sizing-addon2" value="<?php echo $dataStaff->name; ?>">
      </div>    
      <div class="form-group">
        <label for="email">Email</label>
        <input disabled style="cursor: default;" type="text" class="form-control" placeholder="Email" name="email" aria-describedby="sizing-addon2" value="<?php echo $dataStaff->email; ?>">
      </div> 
      <div class="form-group">
        <label for="phone">Phone</label>
        <input disabled style="cursor: default;" type="text" class="form-control" placeholder="Phone" name="phone" aria-describedby="sizing-addon2" value="<?php echo $dataStaff->phone; ?>">
      </div>
      <div class="form-group">
        <label for="position">Position</label>
        <input disabled style="cursor: default;" type="text" class="form-control" placeholder="Position" name="position" aria-describedby="sizing-addon2" value="<?php echo $dataStaff->position; ?>">
      </div>
      <div class="form-group">
        <label for="status">Status</label>
        <select disabled style="cursor: default;" class="form-control" name="status" aria-describedby="sizing-addon2">
          <option value="Active" <?php if ($dataStaff->status == 'Active') echo "selected"; ?>>Active</option>
          <option value="Non Active" <?php if ($dataStaff->status == 'Non Active') echo "selected"; ?>>Non Active</option>
        </select>
      </div>
    </div> 

    <div class="form-group">
      <div>
        <button type="button" class="form-control btn btn-danger" data-dismiss="modal" aria-label="Close"><i class="glyphicon glyphicon-remove-sign"></i> Close</button>
      </div>
    </div>
  </form>
</div>

<?php } ?>