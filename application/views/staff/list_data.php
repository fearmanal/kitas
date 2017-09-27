<?php
  foreach ($dataStaff as $staff) {
    ?>
    <tr>
      <td><?php echo $staff->name; ?></td>
      <td><?php echo $staff->email; ?></td>
      <td><?php echo $staff->position; ?></td>
      <td><?php echo $staff->status; ?></td>
      <td class="text-center">
        <button class="btn btn-info detail-dataHw" data-id="<?php echo $staff->id_staff; ?>"><i class="fa fa-laptop"></i></button>
      
      <?php if($userdata->role == 'administrator' || $userdata->role == 'management') { ?>
        <button class="btn btn-warning update-dataStaff" data-id="<?php echo $staff->id_staff; ?>"><i class="fa fa-pencil"></i></button>
        <button class="btn btn-danger konfirmasiHapus-staff" data-id="<?php echo $staff->id_staff; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="fa fa-trash"></i></button>
      <?php } else if($userdata->role == 'guest') { ?>
        <button class="btn btn-warning update-dataStaff" data-id="<?php echo $staff->id_staff; ?>"><i class="fa fa-external-link"></i></button>
      <?php } ?>
      </td>
    </tr>
    <?php
  }
?>