<?php if($userdata->role == 'administrator' || $userdata->role == 'management') { ?>

<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Supplier</h3>

  <form id="form-update-supplier" method="POST">
    <div>
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" placeholder="Name" name="name" aria-describedby="sizing-addon2" value="<?php echo $dataSupplier->name; ?>">
      </div>    
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" placeholder="Email" name="email" aria-describedby="sizing-addon2" value="<?php echo $dataSupplier->email; ?>">
      </div> 
      <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" placeholder="Phone" name="phone" aria-describedby="sizing-addon2" value="<?php echo $dataSupplier->phone; ?>">
      </div>
      <div class="form-group">
        <label for="position">Fax</label>
        <input type="text" class="form-control" placeholder="Fax" name="fax" aria-describedby="sizing-addon2" value="<?php echo $dataSupplier->fax; ?>">
      </div>
      <div class="form-group">
        <label for="position">City</label>
        <input type="text" class="form-control" placeholder="City" name="city" aria-describedby="sizing-addon2" value="<?php echo $dataSupplier->city; ?>">
      </div>
      <div class="form-group">
        <label for="position">Country</label>
        <input type="text" class="form-control" placeholder="Country" name="country" aria-describedby="sizing-addon2" value="<?php echo $dataSupplier->country; ?>">
      </div>
    </div> 

    <div class="form-group">
      <div class="col-md-8">          
          <input type="hidden" name="id_supplier" value="<?php echo $dataSupplier->id_supplier; ?>">
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
  <h3 style="display:block; text-align:center;">Update Data Supplier</h3>

  <form id="form-update-supplier" method="POST">
    <div>
      <div class="form-group">
        <label for="name">Name</label>
        <input disabled style="cursor: default;" type="text" class="form-control" placeholder="Name" name="name" aria-describedby="sizing-addon2" value="<?php echo $dataSupplier->name; ?>">
      </div>    
      <div class="form-group">
        <label for="email">Email</label>
        <input disabled style="cursor: default;" type="text" class="form-control" placeholder="Email" name="email" aria-describedby="sizing-addon2" value="<?php echo $dataSupplier->email; ?>">
      </div> 
      <div class="form-group">
        <label for="phone">Phone</label>
        <input disabled style="cursor: default;" type="text" class="form-control" placeholder="Phone" name="phone" aria-describedby="sizing-addon2" value="<?php echo $dataSupplier->phone; ?>">
      </div>
      <div class="form-group">
        <label for="position">Fax</label>
        <input disabled style="cursor: default;" type="text" class="form-control" placeholder="Fax" name="fax" aria-describedby="sizing-addon2" value="<?php echo $dataSupplier->fax; ?>">
      </div>
      <div class="form-group">
        <label for="position">City</label>
        <input disabled style="cursor: default;" type="text" class="form-control" placeholder="City" name="city" aria-describedby="sizing-addon2" value="<?php echo $dataSupplier->city; ?>">
      </div>
      <div class="form-group">
        <label for="position">Country</label>
        <input disabled style="cursor: default;" type="text" class="form-control" placeholder="Country" name="country" aria-describedby="sizing-addon2" value="<?php echo $dataSupplier->country; ?>">
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