<?php if($userdata->role == 'administrator' || $userdata->role == 'management') { ?>

<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

  <form id="form-update-software" method="POST">
<div class="general-form">
    <div class="line-form col-md-4">
      <div class="form-group">        
        <label for="name">Name</label>
        <input type="text" class="form-control" placeholder="Name" name="name" aria-describedby="sizing-addon2" value="<?php echo $dataSoftware->name; ?>">
      </div>
      <div class="form-group">
        <label for="manufacturer">Manufacturer</label>
        <input type="text" class="form-control" placeholder="Manufacturer" name="manufacturer" aria-describedby="sizing-addon2" value="<?php echo $dataSoftware->manufacturer; ?>">
      </div>
      <div class="form-group">
        <label for="version">Version</label>
        <input type="text" class="form-control" placeholder="Version" name="version" aria-describedby="sizing-addon2" value="<?php echo $dataSoftware->version; ?>">
      </div>
      <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control" placeholder="Price" name="price" aria-describedby="sizing-addon2" value="<?php echo $dataSoftware->price; ?>">
      </div>
    </div>
    
    <div class="line-form col-md-4">
      <div class="form-group">
        <label for="id_supplier">Supplier</label>
        <select class="form-control" name="id_supplier" aria-describedby="sizing-addon2">
          <option value="">- Select Supplier -</option>
          <?php foreach ($listSupplier as $supplier) { ?>        
              <option value="<?php echo $supplier->id_supplier; ?>" <?php if ($dataSoftware->id_supplier == $supplier->id_supplier) echo "selected"; ?>><?php echo $supplier->name; ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label for="purchase_date">Purchase Date</label>
        <input id="purchase_date" type="text" class="form-control" placeholder="YYYY-MM-DD" name="purchase_date" aria-describedby="sizing-addon2" data-date-format="yyyy-mm-dd" value="<?php echo $dataSoftware->purchase_date; ?>">
      </div>
      <div class="form-group">
        <label for="license_start_date">License Start Date</label>
        <input id="license_start_date" type="text" class="form-control" placeholder="YYYY-MM-DD" name="license_start_date" aria-describedby="sizing-addon2" data-date-format="yyyy-mm-dd" value="<?php echo $dataSoftware->license_start_date; ?>">
      </div>
      <div class="form-group">
        <label for="license_end_date">License End Date</label>
        <input id="license_end_date" type="text" class="form-control" placeholder="YYYY-MM-DD" name="license_end_date" aria-describedby="sizing-addon2" data-date-format="yyyy-mm-dd" value="<?php echo $dataSoftware->license_end_date; ?>">
      </div>
    </div>

    <div class="line-form col-md-4">
      <div class="form-group">
        <label for="license_qty">License Quantity</label>
        <input type="text" class="form-control" placeholder="License Quantity" name="license_qty" aria-describedby="sizing-addon2" value="<?php echo $dataSoftware->license_qty; ?>">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" style="height: 182px;"><?php echo trim($dataSoftware->description); ?></textarea> 
      </div>
    </div>
  </div>

    <div class="form-group">
      <div class="col-md-8">          
          <input type="hidden" name="id_software" value="<?php echo $dataSoftware->id_software; ?>">
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

  <form id="form-update-software" method="POST">
<div class="general-form">
    <div class="line-form col-md-4">
      <div class="form-group">        
        <label for="name">Name</label>
        <input disabled style="cursor: default;" type="text" class="form-control" placeholder="Name" name="name" aria-describedby="sizing-addon2" value="<?php echo $dataSoftware->name; ?>">
      </div>
      <div class="form-group">
        <label for="manufacturer">Manufacturer</label>
        <input disabled style="cursor: default;" type="text" class="form-control" placeholder="Manufacturer" name="manufacturer" aria-describedby="sizing-addon2" value="<?php echo $dataSoftware->manufacturer; ?>">
      </div>
      <div class="form-group">
        <label for="version">Version</label>
        <input disabled style="cursor: default;" type="text" class="form-control" placeholder="Version" name="version" aria-describedby="sizing-addon2" value="<?php echo $dataSoftware->version; ?>">
      </div>
      <div class="form-group">
        <label for="price">Price</label>
        <input disabled style="cursor: default;" type="text" class="form-control" placeholder="Price" name="price" aria-describedby="sizing-addon2" value="<?php echo $dataSoftware->price; ?>">
      </div>
    </div>
    
    <div class="line-form col-md-4">
      <div class="form-group">
        <label for="id_supplier">Supplier</label>
        <select disabled style="cursor: default;" class="form-control" name="id_supplier" aria-describedby="sizing-addon2">
          <option value="">- Select Supplier -</option>
          <?php foreach ($listSupplier as $supplier) { ?>        
              <option value="<?php echo $supplier->id_supplier; ?>" <?php if ($dataSoftware->id_supplier == $supplier->id_supplier) echo "selected"; ?>><?php echo $supplier->name; ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label for="purchase_date">Purchase Date</label>
        <input disabled style="cursor: default;" id="purchase_date" type="text" class="form-control" placeholder="YYYY-MM-DD" name="purchase_date" aria-describedby="sizing-addon2" data-date-format="yyyy-mm-dd" value="<?php echo $dataSoftware->purchase_date; ?>">
      </div>
      <div class="form-group">
        <label for="license_start_date">License Start Date</label>
        <input disabled style="cursor: default;" id="license_start_date" type="text" class="form-control" placeholder="YYYY-MM-DD" name="license_start_date" aria-describedby="sizing-addon2" data-date-format="yyyy-mm-dd" value="<?php echo $dataSoftware->license_start_date; ?>">
      </div>
      <div class="form-group">
        <label for="license_end_date">License End Date</label>
        <input disabled style="cursor: default;" id="license_end_date" type="text" class="form-control" placeholder="YYYY-MM-DD" name="license_end_date" aria-describedby="sizing-addon2" data-date-format="yyyy-mm-dd" value="<?php echo $dataSoftware->license_end_date; ?>">
      </div>
    </div>

    <div class="line-form col-md-4">
      <div class="form-group">
        <label for="license_qty">License Quantity</label>
        <input disabled style="cursor: default;" type="text" class="form-control" placeholder="License Quantity" name="license_qty" aria-describedby="sizing-addon2" value="<?php echo $dataSoftware->license_qty; ?>">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea disabled style="cursor: default;" class="form-control" name="description" style="height: 182px;"><?php echo trim($dataSoftware->description); ?></textarea> 
      </div>
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