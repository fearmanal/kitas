<?php if($userdata->role == 'administrator' || $userdata->role == 'management') { ?>

<div class="col-md-12 well">
  <div class="form-msg"></div>

  <form id="form-update-devices" method="POST">
<div class="general-form">
    <div class="line-form col-md-4">
      <div class="form-group">        
        <label for="name">Devices</label>
        <select class="form-control" name="name" aria-describedby="sizing-addon2">
          <?php 
              foreach ($category_hw as $menu_hw) { 
                if($menu_hw->name == @$devcat) {
                  $options_hw = explode(',', $menu_hw->options);
                  foreach ($options_hw as $key => $value) {
          ?>
                    <option value="<?php echo $value; ?>" <?php if ($dataDevices->name == $value) echo "selected"; ?>><?php echo $value; ?></option>          
          <?php
                  }
                }
              }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="manufacturer">Manufacturer</label>
        <input type="text" class="form-control" placeholder="Manufacturer" name="manufacturer" aria-describedby="sizing-addon2" value="<?php echo $dataDevices->manufacturer; ?>">
      </div>
      <div class="form-group">
        <label for="series">Series</label>
        <input type="text" class="form-control" placeholder="Series" name="series" aria-describedby="sizing-addon2" value="<?php echo $dataDevices->series; ?>">
      </div>
    </div>
    
    <div class="line-form col-md-4">
      <div class="form-group">
        <label for="id_supplier">Supplier</label>
        <select class="form-control" name="id_supplier" aria-describedby="sizing-addon2">
          <option value="">- Select Supplier -</option>
          <?php foreach ($listSupplier as $supplier) { ?>        
              <option value="<?php echo $supplier->id_supplier; ?>" <?php if ($dataDevices->id_supplier == $supplier->id_supplier) echo "selected"; ?>><?php echo $supplier->name; ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control" placeholder="Price" name="price" aria-describedby="sizing-addon2" value="<?php echo $dataDevices->price; ?>">
      </div>
      <div class="form-group">
        <label for="purchase_date">Purchase Date</label>
        <input id="purchase_date" type="text" class="form-control" placeholder="YYYY-MM-DD" name="purchase_date" aria-describedby="sizing-addon2" data-date-format="yyyy-mm-dd" value="<?php echo $dataDevices->purchase_date; ?>">
      </div>     
    </div>

    <div class="line-form col-md-4">
      <div class="form-group">
        <label for="warranty">Warranty</label>
        <select class="form-control" name="warranty" aria-describedby="sizing-addon2">
          <option value="">- Select Warranty -</option>
          <option value="1" <?php if ($dataDevices->warranty == 1) echo "selected"; ?>>1 Month</option>
          <option value="3" <?php if ($dataDevices->warranty == 3) echo "selected"; ?>>3 Month</option>
          <option value="6" <?php if ($dataDevices->warranty == 6) echo "selected"; ?>>6 Month</option>
          <option value="9" <?php if ($dataDevices->warranty == 9) echo "selected"; ?>>9 Month</option>
          <option value="12" <?php if ($dataDevices->warranty == 12) echo "selected"; ?>>1 Year</option>
          <option value="24" <?php if ($dataDevices->warranty == 24) echo "selected"; ?>>2 Year</option>
          <option value="36" <?php if ($dataDevices->warranty == 36) echo "selected"; ?>>3 Year</option>
          <option value="48" <?php if ($dataDevices->warranty == 48) echo "selected"; ?>>4 Year</option>
          <option value="60" <?php if ($dataDevices->warranty == 60) echo "selected"; ?>>5 Year</option>
        </select>
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" style="height: 108px;"><?php echo trim($dataDevices->description); ?></textarea> 
      </div>
    </div>
  </div>


  <div class="company-form">
    <div class="no-pad-left col-md-6">
      <div class="form-group">
        <label for="label">Label</label>
        <input type="text" class="form-control" placeholder="Label" name="label" aria-describedby="sizing-addon2" value="<?php echo $dataDevices->label; ?>">
      </div>
    </div>
    <div class="no-pad-right col-md-6">
      <div class="form-group">
        <label for="condition">Condition</label>
        <select class="form-control" name="condition" aria-describedby="sizing-addon2">
          <option value="Good" <?php if ($dataDevices->condition == 'Good') echo "selected"; ?>>Good</option>
          <option value="In Service" <?php if ($dataDevices->condition == 'In Service') echo "selected"; ?>>In Service</option>
          <option value="Bad" <?php if ($dataDevices->condition == 'Bad') echo "selected"; ?>>Bad</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="id_staff">User</label>
      <select class="form-control" name="id_staff" aria-describedby="sizing-addon2">
        <option value="">- Select User- </option>
        <?php foreach ($listUser as $user) { ?>        
            <option value="<?php echo $user->id_staff; ?>" <?php if ($dataDevices->id_staff == $user->id_staff) echo "selected"; ?>><?php echo $user->name; ?></option>
        <?php } ?>
      </select>
    </div>    
    <div class="form-group">
      <label for="location">Location</label>
      <select class="form-control" name="location" aria-describedby="sizing-addon2">
        <option value="Jakarta Office" <?php if ($dataDevices->location == 'Jakarta Office') echo "selected"; ?>>Jakarta Office</option>
        <option value="Bandung Office" <?php if ($dataDevices->location == 'Bandung Office') echo "selected"; ?>>Bandung Office</option>
      </select>
    </div>
       
  </div>

    <div class="form-group">
      <div class="col-md-8">          
          <input type="hidden" name="id_hardware" value="<?php echo $dataDevices->id_hardware; ?>">
          <input type="hidden" name="category" value="<?php echo $dataDevices->category; ?>">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
      <div class="col-md-4">
        <button type="button" class="form-control btn btn-danger" data-dismiss="modal" aria-label="Close"><i class="glyphicon glyphicon-remove-sign"></i> Cancel</button>
      </div>
    </div>
  </form>
</div>

<?php } else if($userdata->role == 'guest') { ?>

<div class="col-md-12 well">
  <div class="form-msg"></div>

  <form id="form-update-devices" method="POST">
<div class="general-form">
    <div class="line-form col-md-4">
      <div class="form-group">        
        <label for="name">Devices</label>
        <select disabled style="cursor: default;" class="form-control" name="name" aria-describedby="sizing-addon2">
          <?php 
              foreach ($category_hw as $menu_hw) { 
                if($menu_hw->name == @$devcat) {
                  $options_hw = explode(',', $menu_hw->options);
                  foreach ($options_hw as $key => $value) {
          ?>
                    <option value="<?php echo $value; ?>" <?php if ($dataDevices->name == $value) echo "selected"; ?>><?php echo $value; ?></option>          
          <?php
                  }
                }
              }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="manufacturer">Manufacturer</label>
        <input disabled style="cursor: default;" type="text" class="form-control" placeholder="Manufacturer" name="manufacturer" aria-describedby="sizing-addon2" value="<?php echo $dataDevices->manufacturer; ?>">
      </div>
      <div class="form-group">
        <label for="series">Series</label>
        <input disabled style="cursor: default;" type="text" class="form-control" placeholder="Series" name="series" aria-describedby="sizing-addon2" value="<?php echo $dataDevices->series; ?>">
      </div>
    </div>
    
    <div class="line-form col-md-4">
      <div class="form-group">
        <label for="id_supplier">Supplier</label>
        <select disabled style="cursor: default;" class="form-control" name="id_supplier" aria-describedby="sizing-addon2">
          <option value="">- Select Supplier -</option>
          <?php foreach ($listSupplier as $supplier) { ?>        
              <option value="<?php echo $supplier->id_supplier; ?>" <?php if ($dataDevices->id_supplier == $supplier->id_supplier) echo "selected"; ?>><?php echo $supplier->name; ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label for="price">Price</label>
        <input disabled style="cursor: default;" type="text" class="form-control" placeholder="Price" name="price" aria-describedby="sizing-addon2" value="<?php echo $dataDevices->price; ?>">
      </div>
      <div class="form-group">
        <label for="purchase_date">Purchase Date</label>
        <input disabled style="cursor: default;" id="purchase_date" type="text" class="form-control" placeholder="YYYY-MM-DD" name="purchase_date" aria-describedby="sizing-addon2" data-date-format="yyyy-mm-dd" value="<?php echo $dataDevices->purchase_date; ?>">
      </div>     
    </div>

    <div class="line-form col-md-4">
      <div class="form-group">
        <label for="warranty">Warranty</label>
        <select disabled style="cursor: default;" class="form-control" name="warranty" aria-describedby="sizing-addon2">
          <option value="">- Select Warranty -</option>
          <option value="1" <?php if ($dataDevices->warranty == 1) echo "selected"; ?>>1 Month</option>
          <option value="3" <?php if ($dataDevices->warranty == 3) echo "selected"; ?>>3 Month</option>
          <option value="6" <?php if ($dataDevices->warranty == 6) echo "selected"; ?>>6 Month</option>
          <option value="9" <?php if ($dataDevices->warranty == 9) echo "selected"; ?>>9 Month</option>
          <option value="12" <?php if ($dataDevices->warranty == 12) echo "selected"; ?>>1 Year</option>
          <option value="24" <?php if ($dataDevices->warranty == 24) echo "selected"; ?>>2 Year</option>
          <option value="36" <?php if ($dataDevices->warranty == 36) echo "selected"; ?>>3 Year</option>
          <option value="48" <?php if ($dataDevices->warranty == 48) echo "selected"; ?>>4 Year</option>
          <option value="60" <?php if ($dataDevices->warranty == 60) echo "selected"; ?>>5 Year</option>
        </select>
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea disabled style="cursor: default;" class="form-control" name="description" style="height: 108px;"><?php echo trim($dataDevices->description); ?></textarea> 
      </div>
    </div>
  </div>


  <div class="company-form">
    <div class="no-pad-left col-md-6">
      <div class="form-group">
        <label for="label">Label</label>
        <input disabled style="cursor: default;" type="text" class="form-control" placeholder="Label" name="label" aria-describedby="sizing-addon2" value="<?php echo $dataDevices->label; ?>">
      </div>
    </div>
    <div class="no-pad-right col-md-6">
      <div class="form-group">
        <label for="condition">Condition</label>
        <select disabled style="cursor: default;" class="form-control" name="condition" aria-describedby="sizing-addon2">
          <option value="Good" <?php if ($dataDevices->condition == 'Good') echo "selected"; ?>>Good</option>
          <option value="In Service" <?php if ($dataDevices->condition == 'In Service') echo "selected"; ?>>In Service</option>
          <option value="Bad" <?php if ($dataDevices->condition == 'Bad') echo "selected"; ?>>Bad</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="id_staff">User</label>
      <select disabled style="cursor: default;" class="form-control" name="id_staff" aria-describedby="sizing-addon2">
        <option value="">- Select User- </option>
        <?php foreach ($listUser as $user) { ?>        
            <option value="<?php echo $user->id_staff; ?>" <?php if ($dataDevices->id_staff == $user->id_staff) echo "selected"; ?>><?php echo $user->name; ?></option>
        <?php } ?>
      </select>
    </div>    
    <div class="form-group">
      <label for="location">Location</label>
      <select disabled style="cursor: default;" class="form-control" name="location" aria-describedby="sizing-addon2">
        <option value="Jakarta Office" <?php if ($dataDevices->location == 'Jakarta Office') echo "selected"; ?>>Jakarta Office</option>
        <option value="Bandung Office" <?php if ($dataDevices->location == 'Bandung Office') echo "selected"; ?>>Bandung Office</option>
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