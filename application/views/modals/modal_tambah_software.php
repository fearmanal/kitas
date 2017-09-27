<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <form enctype="multipart/form-data" id="form-tambah-software" method="POST">
  <div class="general-form">
    <div class="line-form col-md-4">
      <div class="form-group">        
        <label for="name">Name</label>
        <input type="text" class="form-control" placeholder="Name" name="name" aria-describedby="sizing-addon2">
      </div>
      <div class="form-group">
        <label for="manufacturer">Manufacturer</label>
        <input type="text" class="form-control" placeholder="Manufacturer" name="manufacturer" aria-describedby="sizing-addon2">
      </div>
      <div class="form-group">
        <label for="version">Version</label>
        <input type="text" class="form-control" placeholder="Version" name="version" aria-describedby="sizing-addon2">
      </div>
      <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control" placeholder="Price" name="price" aria-describedby="sizing-addon2">
      </div>
    </div>
    
    <div class="line-form col-md-4">
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
        <label for="purchase_date">Purchase Date</label>
        <input id="purchase_date" type="text" class="form-control" placeholder="Purchase Date" name="purchase_date" aria-describedby="sizing-addon2" data-date-format="yyyy-mm-dd">
      </div>
      <div class="form-group">
        <label for="license_start_date">License Start Date</label>
        <input id="license_start_date" type="text" class="form-control" placeholder="License Start Date" name="license_start_date" aria-describedby="sizing-addon2" data-date-format="yyyy-mm-dd">
      </div>
      <div class="form-group">
        <label for="license_end_date">License End Date</label>
        <input id="license_end_date" type="text" class="form-control" placeholder="License End Date" name="license_end_date" aria-describedby="sizing-addon2" data-date-format="yyyy-mm-dd">
      </div>   
    </div>

    <div class="line-form col-md-4">
      <div class="form-group">
        <label for="license_qty">License Quantity</label>
        <input type="text" class="form-control" placeholder="License Quantity" name="license_qty" aria-describedby="sizing-addon2">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" style="height: 182px;">
        </textarea> 
      </div>
    </div>
  </div>   
       
    <div class="form-group">
      <div class="col-md-8">          
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
      <div class="col-md-4">
        <button type="button" class="form-control btn btn-danger" data-dismiss="modal" aria-label="Close"><i class="glyphicon glyphicon-remove-sign"></i> Cancel</button>
      </div>
    </div>
  </form>
</div>