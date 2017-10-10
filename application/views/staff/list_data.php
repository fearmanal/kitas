<?php
  foreach ($dataStaff as $staff) {
    ?>
    <tr>
      <td><?php echo $staff->name; ?></td>
      <td><?php echo $staff->email; ?></td>
      <td><?php echo $staff->position; ?></td>
      <td><?php echo $staff->location; ?></td>
      <td><?php echo $staff->status; ?></td>
      <td class="text-center" style="letter-spacing: 2px;">
        <a href="#" class="detail-dataHw" data-id="<?php echo $staff->id_staff; ?>"><i class="fa fa-laptop"></i></a>
      
      <?php if($userdata->role == 'administrator' || $userdata->role == 'management') { ?>
        <a href="#" class="update-dataStaff" data-id="<?php echo $staff->id_staff; ?>"><i class="fa fa-pencil"></i></a>
        <a href="#" class="konfirmasiHapus-staff" data-id="<?php echo $staff->id_staff; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="fa fa-trash"></i></a>
      <?php } else if($userdata->role == 'guest') { ?>
        <a href="#" class="update-dataStaff" data-id="<?php echo $staff->id_staff; ?>"><i class="fa fa-external-link"></i></a>
      <?php } ?>
      </td>
    </tr>
    <?php
  }
?>