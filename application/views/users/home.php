<div class="box">
  <div class="box-header">
    <div class="msg col-md-10" style="display:none;">
      <?php echo @$this->session->flashdata('msg'); ?>
    </div>
    <div class="col-md-2 add-button" style="padding: 0;">
        <a href="#" class="grid-nav btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i></a>
        <?php if($userdata->role == 'administrator') { ?>
          <button class="grid-nav btn btn-primary" data-toggle="modal" data-target="#tambah-users"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add New</button>
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

<?php echo $modal_tambah_users; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataUsers', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'users';
  $data['url'] = 'users/import';
  echo show_my_modal('modals/modal_import', 'import-users', $data);
?>