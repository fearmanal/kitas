<?php
  foreach ($dataUsers as $users) {
    ?>
    <tr>
      <td><?php echo $users->email; ?></td>
      <td><?php echo $users->username; ?></td>
      <td><?php echo $users->nama; ?></td>
      <td><?php echo $users->role; ?></td>
      <td class="text-center">
      <?php if($userdata->role == 'administrator') { ?>
        <button class="btn btn-primary update-dataUsers" data-id="<?php echo $users->id; ?>"><i class="fa fa-pencil"></i></button>
        <button class="btn btn-primary resetpass-dataUsers" data-id="<?php echo $users->id; ?>"><i class="fa fa-key"></i></button>
        <button class="btn btn-danger konfirmasiHapus-users" data-id="<?php echo $users->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="fa fa-trash"></i></button>
      <?php } ?>
      </td>
    </tr>
    <?php
  }
?>