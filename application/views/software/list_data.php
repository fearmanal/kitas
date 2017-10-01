<?php
  foreach ($dataSoftware as $software) {
    
    ?>
    <tr>
      <td><?php echo $software->name; ?></td>
      <td><?php echo $software->manufacturer; ?></td>
      <td><?php echo $software->license_qty; ?></td>
      <td><?php echo $software->license_start_date; ?></td>
      <td><?php echo $software->license_end_date; ?></td>
      <td class="text-center" style="letter-spacing: 2px;">
        <?php if($userdata->role == 'administrator' || $userdata->role == 'management') { ?>
                <a href="#" class="update-dataSoftware" data-id="<?php echo $software->id_software; ?>"><i class="fa fa-pencil"></i></a>
                <a href="#" class="konfirmasiHapus-software" data-id="<?php echo $software->id_software; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="fa fa-trash"></i></a>
        <?php } else if($userdata->role == 'guest') { ?>
                <a href="#" class="update-dataSoftware" data-id="<?php echo $software->id_software; ?>"><i class="fa fa-external-link"></i></a>
        <?php } ?>
      </td>
    </tr>
    <?php
    
  }
?>