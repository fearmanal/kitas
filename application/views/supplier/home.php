<div class="box">
  <div class="box-header">
    <div class="msg col-md-10" style="display:none;">
      <?php echo @$this->session->flashdata('msg'); ?>
    </div>
    <div class="col-md-2 add-button" style="padding: 0;">
        <a href="<?php echo base_url('supplier/export'); ?>" class="grid-nav btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i></a>
        <?php if($userdata->role == 'administrator' || $userdata->role == 'management') { ?>
          <button class="grid-nav l btn btn-primary" data-toggle="modal" data-target="#tambah-supplier"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add New</button>
        <?php } ?>
    </div>
    <!--
    <div class="col-md-3">
        <a href="<?php echo base_url('supplier/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
    </div>
    <div class="col-md-3">
        <button class="form-control btn btn-default" data-toggle="modal" data-target="#import-supplier"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Import Data Excel</button>
    </div>
    -->
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Fax</th>
          <th>City</th>
          <th>Country</th>
          <th style="width:168px;">&nbsp;&nbsp;&nbsp;&nbsp;</th>
        </tr>
      </thead>
      <tbody id="data-supplier">
        
      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_supplier; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataSupplier', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'supplier';
  $data['url'] = 'supplier/import';
  echo show_my_modal('modals/modal_import', 'import-supplier', $data);
?>