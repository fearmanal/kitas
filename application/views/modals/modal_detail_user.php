<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;"><i class="fa fa-location-arrow"></i> Detail User <b><?php echo $dataUser->name; ?></b></h3>
  <form id="form-detail-user" method="POST">
    <div>
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" placeholder="Name" name="name" aria-describedby="sizing-addon2" value="<?php echo $dataUser->name; ?>" disabled>
      </div>    
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" placeholder="Email" name="email" aria-describedby="sizing-addon2" value="<?php echo $dataUser->email; ?>" disabled>
      </div> 
      <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" placeholder="Phone" name="phone" aria-describedby="sizing-addon2" value="<?php echo $dataUser->phone; ?>" disabled>
      </div>
      <div class="form-group">
        <label for="position">Position</label>
        <input type="text" class="form-control" placeholder="Position" name="position" aria-describedby="sizing-addon2" value="<?php echo $dataUser->position; ?>" disabled>
      </div>
      <div class="form-group">
        <label for="status">Status</label>
        <input type="text" class="form-control" placeholder="Status" name="status" aria-describedby="sizing-addon2" value="<?php echo $dataUser->status; ?>" disabled>
      </div>
    </div>
  </form>

  <div class="text-right">
    <button class="btn btn-danger" data-dismiss="modal"> Close</button>
  </div>
</div>