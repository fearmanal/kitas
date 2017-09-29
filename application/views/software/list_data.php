<?php
  foreach ($dataSoftware as $software) {
    
    ?>
    <tr>
      <td><?php echo $software->name; ?></td>
      <td><?php echo $software->manufacturer; ?></td>
      <td><?php echo $software->license_qty; ?></td>
      <td><?php echo $software->license_start_date; ?></td>
      <td><?php echo $software->license_end_date; ?></td>
      <td class="text-center">
        <?php if($userdata->role == 'administrator' || $userdata->role == 'management') { ?>
                <button class="btn btn-primary update-dataSoftware" data-id="<?php echo $software->id_software; ?>"><i class="fa fa-pencil"></i></button>
                <button class="btn btn-danger konfirmasiHapus-software" data-id="<?php echo $software->id_software; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="fa fa-trash"></i></button>
        <?php } else if($userdata->role == 'guest') { ?>
                <button class="btn btn-primary update-dataSoftware" data-id="<?php echo $software->id_software; ?>"><i class="fa fa-external-link"></i></button>
        <?php } ?>
      </td>
    </tr>
    <?php
    
  }
?>