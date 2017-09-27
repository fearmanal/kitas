<div class="col-md-offset-3 col-md-6 col-md-offset-3 well">
  <div class="form-msg"></div>
  <form enctype="multipart/form-data" id="form-tambah-users" method="POST">
    <div>    
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" placeholder="Email" name="email" aria-describedby="sizing-addon2">
      </div> 
      <div class="form-group">
        <label for="nama">Name</label>
        <input type="text" class="form-control" placeholder="Name" name="nama" aria-describedby="sizing-addon2">
      </div>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" placeholder="Username" name="username" aria-describedby="sizing-addon2">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" placeholder="Password" name="password" aria-describedby="sizing-addon2">
      </div>
      <div class="form-group">
        <label for="role">Role</label>
        <select class="form-control" name="role" aria-describedby="sizing-addon2">
          <option value="guest">Guest</option>
          <option value="management">Management</option>
          <option value="administrator">Administrator</option>
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