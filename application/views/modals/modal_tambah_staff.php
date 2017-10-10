<div class="col-md-offset-3 col-md-6 col-md-offset-3 well">
  <div class="form-msg"></div>
  <form enctype="multipart/form-data" id="form-tambah-staff" method="POST">
    <div>
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" placeholder="Name" name="name" aria-describedby="sizing-addon2">
      </div>    
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" placeholder="Email" name="email" aria-describedby="sizing-addon2">
      </div> 
      <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" placeholder="Phone" name="phone" aria-describedby="sizing-addon2">
      </div>
      <div class="form-group">
        <label for="position">Position</label>
        <input type="text" class="form-control" placeholder="Position" name="position" aria-describedby="sizing-addon2">
      </div>
      <div class="form-group">
        <label for="location">Location</label>
        <input type="text" class="form-control" placeholder="Location" name="location" aria-describedby="sizing-addon2">
      </div>
      <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control" name="status" aria-describedby="sizing-addon2">
          <option value="Active">Active</option>
          <option value="Non Active">Non Active</option>
        </select>
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