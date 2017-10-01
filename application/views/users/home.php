<div class="box box-table">
  <div class="box-header">
    <div class="msg col-md-10" style="display:none;">
      <?php echo @$this->session->flashdata('msg'); ?>
    </div>
    <div class="col-md-2 add-button" style="padding: 0;">
        <a href="#" class="grid-nav btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i></a>
        <?php if($userdata->role == 'administrator') { ?>
          <button class="grid-nav btn btn-primary" data-toggle="modal" data-target="#tambah-users"><i class="fa fa-pencil-square-o"></i>&nbsp;&nbsp;Add New</button>
        <?php } ?>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Email</th>
          <th>Username</th>
          <th>Name</th>
          <th>Role</th>
          <th style="text-align: center;">&nbsp;&nbsp;&nbsp;</th>
        </tr>
      </thead>
      <tbody id="data-users">
        
      </tbody>
    </table>
  </div>
</div>

<!-- Start Mobile Mode -->
<?php foreach ($dataUsers as $users) { ?>
        <div class="card-post">
          <div class="row">
            <div class="post-content col-xs-12">
              <div class="post-title"><?php echo $users->nama; ?></div>
              <div class="post-subtitle"><i>Role : <?php echo $users->role; ?></i></div>
              <div class="post-text">
                  Username : <?php echo $users->username; ?><br/>
                  Email : <?php echo $users->email; ?><br/>
              </div>
              <div class="post-action">
                <?php if($userdata->role == 'administrator') { ?>
                  <a href="#" class="resetpass-dataUsers" data-id="<?php echo $users->id; ?>"><i class="fa fa-key"></i></a>
                  <a href="#" class="update-dataUsers" data-id="<?php echo $users->id; ?>"><i class="fa fa-pencil"></i></a>        
                  <a href="#" class="konfirmasiHapus-users" data-id="<?php echo $users->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="fa fa-trash"></i></a>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
<?php } ?>

  <div class="floater fab-mobile">
    <ul class="floater__list">
      <li class="floater__list-item">
          <a href="<?php echo base_url('users/export/category/'.@$devcat); ?>" class="fab-child"><i class="glyphicon glyphicon glyphicon-floppy-save"></i></a>
          <div class="floater__list-item-label">Export Excel</div>
      </li>
      <?php if($userdata->role == 'administrator' || $userdata->role == 'management') { ?>
        <li class="floater__list-item">
            <a href="#" data-toggle="modal" data-target="#tambah-users" class="fab-child"><i class="fa fa-pencil-square-o"></i></a>
            <div class="floater__list-item-label">Add New</div>
        </li>
      <?php } ?>
    </ul>

    <div class="floater__btn">      
      <svg class="floater__btn-icon floater__btn-icon-plus" width="16px" height="16px" viewBox="672 53 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
          <!-- Generator: Sketch 41 (35326) - http://www.bohemiancoding.com/sketch -->
          <defs></defs>
          <path d="M687,62 L687,54.0006946 C687,53.4474692 686.556414,53 686.009222,53 L681.990778,53 C681.450975,53 681,53.4480262 681,54.0006946 L681,62 L673.000695,62 C672.447469,62 672,62.4435864 672,62.990778 L672,67.009222 C672,67.5490248 672.448026,68 673.000695,68 L681,68 L681,75.9993054 C681,76.5525308 681.443586,77 681.990778,77 L686.009222,77 C686.549025,77 687,76.5519738 687,75.9993054 L687,68 L694.999305,68 C695.552531,68 696,67.5564136 696,67.009222 L696,62.990778 C696,62.4509752 695.551974,62 694.999305,62 L687,62 Z" id="Combined-Shape" stroke="none" fill="#FFFFFF" fill-rule="evenodd"></path>
      </svg>
    </div>
  </div>

<!-- End Mobile Mode -->

<?php echo $modal_tambah_users; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataUsers', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'users';
  $data['url'] = 'users/import';
  echo show_my_modal('modals/modal_import', 'import-users', $data);
?>