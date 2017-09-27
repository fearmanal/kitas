<div class="col-md-offset-3 col-md-6 col-md-offset-3 well">
  <div class="form-msg"></div>
  <form enctype="multipart/form-data" id="form-tambah-category" method="POST">
    <div>
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" placeholder="Name" name="name" aria-describedby="sizing-addon2">
      </div>
      <div class="form-group">
        <label for="label">Label</label>
        <input type="text" class="form-control" placeholder="Label" name="label" aria-describedby="sizing-addon2">
      </div>     
      <div class="form-group">
        <label for="options">Options</label>
        <input type="text" class="form-control" placeholder="Options" name="options" aria-describedby="sizing-addon2">
      </div>
      <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control" name="status" aria-describedby="sizing-addon2">
          <option value="Enable">Enable</option>
          <option value="Disable">Disable</option>
        </select>
      </div>
    </div> 

    <div class="form-group">
      <div class="col-md-8"> 
          <input type="hidden" name="used_for" value="<?php echo @$usage; ?>">         
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
      <div class="col-md-4">
        <button type="button" class="form-control btn btn-danger" data-dismiss="modal" aria-label="Close"><i class="glyphicon glyphicon-remove-sign"></i> Cancel</button>
      </div>
    </div>
  </form>
</div>