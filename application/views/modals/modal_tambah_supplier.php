<div class="col-md-offset-3 col-md-6 col-md-offset-3 well">
  <div class="form-msg"></div>
  <form enctype="multipart/form-data" id="form-tambah-supplier" method="POST">
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
        <label for="position">Fax</label>
        <input type="text" class="form-control" placeholder="Fax" name="fax" aria-describedby="sizing-addon2">
      </div>
      <div class="form-group">
        <label for="position">City</label>
        <input type="text" class="form-control" placeholder="City" name="city" aria-describedby="sizing-addon2">
      </div>
      <div class="form-group">
        <label for="position">Country</label>
        <input type="text" class="form-control" placeholder="Country" name="country" aria-describedby="sizing-addon2">
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