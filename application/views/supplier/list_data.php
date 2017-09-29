<?php
  foreach ($dataSupplier as $supplier) {
    ?>
    <tr>
      <td><?php echo $supplier->name; ?></td>
      <td><?php echo $supplier->email; ?></td>
      <td><?php echo $supplier->phone; ?></td>
      <td><?php echo $supplier->fax; ?></td>
      <td><?php echo $supplier->city; ?></td>
      <td><?php echo $supplier->country; ?></td>
      <td class="text-center">
        <button class="btn btn-info detail-dataSuppHw" data-id="<?php echo $supplier->id_supplier; ?>"><i class="fa fa-laptop"></i></button>
        <button class="btn btn-info detail-dataSuppSw" data-id="<?php echo $supplier->id_supplier; ?>"><i class="fa fa-windows"></i></button>
      <?php if($userdata->role == 'administrator' || $userdata->role == 'management') { ?>
        <button class="btn btn-primary update-dataSupplier" data-id="<?php echo $supplier->id_supplier; ?>"><i class="fa fa-pencil"></i></button>
        <button class="btn btn-danger konfirmasiHapus-supplier" data-id="<?php echo $supplier->id_supplier; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="fa fa-trash"></i></button>
      <?php } else if($userdata->role == 'guest') { ?>
        <button class="btn btn-primary update-dataSupplier" data-id="<?php echo $supplier->id_supplier; ?>"><i class="fa fa-external-link"></i></button>        
      <?php } ?>
      </td>
    </tr>
    <?php
  }
?>