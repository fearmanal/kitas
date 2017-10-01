<?php
  foreach ($dataUsers as $users) {
    ?>
    <tr>
      <td><?php echo $users->email; ?></td>
      <td><?php echo $users->username; ?></td>
      <td><?php echo $users->nama; ?></td>
      <td><?php echo $users->role; ?></td>
      <td class="text-center" style="letter-spacing: 2px;">
      <?php if($userdata->role == 'administrator') { ?>
        <a href="#" class="resetpass-dataUsers" data-id="<?php echo $users->id; ?>"><i class="fa fa-key"></i></a>
        <a href="#" class="update-dataUsers" data-id="<?php echo $users->id; ?>"><i class="fa fa-pencil"></i></a>        
        <a href="#" class="konfirmasiHapus-users" data-id="<?php echo $users->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="fa fa-trash"></i></a>
      <?php } ?>
      </td>
    </tr>
    <?php
  }
?>