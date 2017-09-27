<div class="box">
  <div class="box-header">
    <div class="msg col-md-10" style="display:none;">
      <?php echo @$this->session->flashdata('msg'); ?>
    </div>
    <div class="col-md-2 add-button" style="padding: 0;">
        <a href="<?php echo base_url('devices/export/category/'.@$devcat); ?>" class="grid-nav btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i></a>
        <?php if($userdata->role == 'administrator' || $userdata->role == 'management') { ?>
          <button class="grid-nav btn btn-primary" data-toggle="modal" data-target="#tambah-devices"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add New</button>        
        <?php } ?>
    </div>
    <!--    
    <div class="col-md-3">
        <button class="form-control btn btn-default" data-toggle="modal" data-target="#import-devices"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Import Data Excel</button>
    </div>
    -->
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Label</th>          
          <th>Brand</th>
          <th>Series</th>
          <th>Device User</th>
          <th>Location</th>
          <th>Condition</th>
          <th style="text-align: center;">&nbsp;&nbsp;&nbsp;</th>
        </tr>
      </thead>
      <tbody id="data-devices">
        
      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_devices; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataDevices', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'devices';
  $data['url'] = 'devices/import';
  echo show_my_modal('modals/modal_import', 'import-devices', $data);
?>