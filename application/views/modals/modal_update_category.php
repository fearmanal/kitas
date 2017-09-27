<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data category</h3>

  <form id="form-update-category" method="POST">
    <div>
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" placeholder="Name" name="name" aria-describedby="sizing-addon2" value="<?php echo $dataCategory->name; ?>">
      </div> 
      <div class="form-group">
        <label for="label">Label</label>
        <input type="text" class="form-control" placeholder="Label" name="label" aria-describedby="sizing-addon2" value="<?php echo $dataCategory->label; ?>">
      </div>      
      <div class="form-group">
        <label for="options">Options</label>
        <input type="text" class="form-control" placeholder="Options" name="options" aria-describedby="sizing-addon2" value="<?php echo $dataCategory->options; ?>">
      </div>
      <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control" name="status" aria-describedby="sizing-addon2">
          <option value="Enable" <?php if ($dataCategory->status == 'Enable') echo "selected"; ?>>Enable</option>
          <option value="Disable" <?php if ($dataCategory->status == 'Disable') echo "selected"; ?>>Disable</option>
        </select>
      </div>
    </div> 

    <div class="form-group">
      <div class="col-md-8">          
          <input type="hidden" name="id_category" value="<?php echo $dataCategory->id_category; ?>">
          <input type="hidden" name="used_for" value="<?php echo $dataCategory->used_for; ?>">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
      <div class="col-md-4">
        <button type="button" class="form-control btn btn-danger" data-dismiss="modal" aria-label="Close"><i class="glyphicon glyphicon-remove-sign"></i> Cancel</button>
      </div>
    </div>
  </form>
</div>