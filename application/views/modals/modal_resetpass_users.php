<?php if($userdata->role == 'administrator') { ?>

<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Reset Password</h3>

  <form id="form-resetpass-users" method="POST">
    <div>    
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" placeholder="Password" name="password" aria-describedby="sizing-addon2">
      </div> 
      <div class="form-group">
        <label for="password_confirm">Confirm Password</label>
        <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirm" aria-describedby="sizing-addon2">
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-8">          
          <input type="hidden" name="id" value="<?php echo $dataUsers->id; ?>">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Reset Password</button>
      </div>
      <div class="col-md-4">
        <button type="button" class="form-control btn btn-danger" data-dismiss="modal" aria-label="Close"><i class="glyphicon glyphicon-remove-sign"></i> Cancel</button>
      </div>
    </div>
  </form>
</div>

<?php } ?>