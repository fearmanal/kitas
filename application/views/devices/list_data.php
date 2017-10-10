<?php
  foreach ($dataDevices as $devices) {
    
    ?>
    <tr>
      <td><?php echo $devices->name; ?></td>
      <td><?php echo $devices->label; ?></td>
      <td><?php echo $devices->manufacturer; ?></td>
      <td><?php echo $devices->series; ?></td>
      <td><a class="detail-dataUser" data-id="<?php echo $devices->id_staff ?>"><?php foreach ($listUser as $user) { if ($devices->id_staff == $user->id_staff) echo $user->name; } ?></a></td>
      <td><?php echo $devices->location; ?></td>
      <td><?php echo $devices->condition; ?></td>
      <td class="text-center" style="letter-spacing: 2px;">
        <?php if($userdata->role == 'administrator' || $userdata->role == 'management') { ?>
                <a href="#" class="update-dataDevices" data-id="<?php echo $devices->id_hardware; ?>"><i class="fa fa-pencil"></i></a>
                <a href="#" class="konfirmasiHapus-devices" data-id="<?php echo $devices->id_hardware; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="fa fa-trash"></i></a>
        <?php } else if($userdata->role == 'guest') { ?>
                <a href="#" class="update-dataDevices" data-id="<?php echo $devices->id_hardware; ?>"><i class="fa fa-external-link"></i></a>
        <?php } ?>
      </td>
    </tr>
    <?php
    
  }
?>