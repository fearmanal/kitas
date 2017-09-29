<?php
  foreach ($dataDevices as $devices) {
    
    ?>
    <tr>
      <td><?php echo $devices->label; ?></td>
      <td><?php echo $devices->manufacturer; ?></td>
      <td><?php echo $devices->series; ?></td>
      <td><a class="detail-dataUser" data-id="<?php echo $devices->id_staff ?>"><?php foreach ($listUser as $user) { if ($devices->id_staff == $user->id_staff) echo $user->name; } ?></a></td>
      <td><?php echo $devices->location; ?></td>
      <td><?php echo $devices->condition; ?></td>
      <td class="text-center">
        <?php if($userdata->role == 'administrator' || $userdata->role == 'management') { ?>
                <button class="btn btn-primary update-dataDevices" data-id="<?php echo $devices->id_hardware; ?>"><i class="fa fa-pencil"></i></button>
                <button class="btn btn-danger konfirmasiHapus-devices" data-id="<?php echo $devices->id_hardware; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="fa fa-trash"></i></button>
        <?php } else if($userdata->role == 'guest') { ?>
                <button class="btn btn-primary update-dataDevices" data-id="<?php echo $devices->id_hardware; ?>"><i class="fa fa-external-link"></i></button>
        <?php } ?>
      </td>
    </tr>
    <?php
    
  }
?>