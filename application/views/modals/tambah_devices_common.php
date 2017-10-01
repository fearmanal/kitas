<div class="col-md-12 well">
  <div class="form-msg"></div>
  <form enctype="multipart/form-data" id="form-tambah-devices" method="POST">
  <div class="general-form">
    <div class="line-form col-md-6">
      <div class="form-group">        
        <label for="name">Devices</label>
        <select class="form-control" name="name" aria-describedby="sizing-addon2">
          <?php 
              foreach ($category_hw as $menu_hw) { 
                if($menu_hw->name == @$devcat) {
                  $options_hw = explode(',', $menu_hw->options);
                  foreach ($options_hw as $key => $value) {
          ?>
                    <option value="<?php echo $value; ?>"><?php echo $value; ?></option>          
          <?php
                  }
                }
              }
          ?> 
        </select>
      </div>
      <div class="form-group">
        <label for="manufacturer">Manufacturer</label>
        <input type="text" class="form-control" placeholder="Manufacturer" name="manufacturer" aria-describedby="sizing-addon2">
      </div>
      <div class="form-group">
        <label for="series">Series</label>
        <input type="text" class="form-control" placeholder="Series" name="series" aria-describedby="sizing-addon2">
      </div>
	  
	  <div>
		<div class="no-pad-left col-md-6">
		  <div class="form-group">
			<label for="label">Label</label>
			<input type="text" class="form-control" placeholder="Label" name="label" aria-describedby="sizing-addon2">
		  </div>
		</div>
		<div class="no-pad-right col-md-6">
		  <div class="form-group">
			<label for="condition">Condition</label>
			<select class="form-control" name="condition" aria-describedby="sizing-addon2">
			  <option value="Good">Good</option>
			  <option value="Bad">Bad</option>
			</select>
		  </div>
		</div>
		<div class="form-group">
		  <label for="id_staff">User</label>
		  <select class="form-control" name="id_staff" aria-describedby="sizing-addon2">
			<option value="">- Select User -</option>
			<?php foreach ($listUser as $user) { ?>        
				<option value="<?php echo $user->id_staff; ?>"><?php echo $user->name; ?></option>
			<?php } ?>
		  </select>
		</div>    
		<div class="form-group">
		  <label for="location">Location</label>
		  <select class="form-control" name="location" aria-describedby="sizing-addon2">
			<option value="Jakarta Office">Jakarta Office</option>
			<option value="Bandung Office">Bandung Office</option>
		  </select>
		</div>		   
	  </div>
    </div>
    
    <div class="line-form col-md-6">
      <div class="form-group">
        <label for="id_supplier">Supplier</label>
        <select class="form-control" name="id_supplier" aria-describedby="sizing-addon2">
          <option value="">- Select Supplier -</option>
          <?php foreach ($listSupplier as $supplier) { ?>        
              <option value="<?php echo $supplier->id_supplier; ?>"><?php echo $supplier->name; ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control" placeholder="Price" name="price" aria-describedby="sizing-addon2">
      </div>
      <div class="form-group">
        <label for="purchase_date">Purchase Date</label>
        <input id="purchase_date" type="text" class="form-control" placeholder="Purchase Date" name="purchase_date" aria-describedby="sizing-addon2" data-date-format="yyyy-mm-dd">
      </div>
	  <div class="form-group">
        <label for="warranty">Warranty</label>
        <select class="form-control" name="warranty" aria-describedby="sizing-addon2">
          <option value="">- Select Warranty -</option>
          <option value="1">1 Month</option>
          <option value="3">3 Month</option>
          <option value="6">6 Month</option>
          <option value="9">9 Month</option>
          <option value="12">1 Year</option>
          <option value="24">2 Year</option>
          <option value="36">3 Year</option>
          <option value="48">4 Year</option>
          <option value="60">5 Year</option>
        </select>
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" style="height: 108px;">
        </textarea> 
      </div>	  
    </div>
  </div>



  <div class="form-group">
    <input type="hidden" name="category" value="<?php echo @$devcat; ?>">
    <div class="col-md-8">          
        <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
    </div>
    <div class="col-md-4">
      <button type="button" class="form-control btn btn-danger" data-dismiss="modal" aria-label="Close"><i class="glyphicon glyphicon-remove-sign"></i> Cancel</button>
    </div>
  </div>
  </form>
</div>