<?php
  foreach ($dataCategory as $category) {
    ?>
    <tr>
      <td><a href="<?php echo base_url('devices/index/category/'.$category->name); ?>"><?php echo $category->name; ?></a></td>
      <td><?php echo $category->label; ?></td>
      <td><?php echo $category->options; ?></td>
      <td><?php echo $category->status; ?></td>
      <td class="text-center">
      <?php if($userdata->role == 'administrator' || $userdata->role == 'management') { ?>
        <button class="btn btn-warning update-dataCategory" data-id="<?php echo $category->id_category; ?>"><i class="fa fa-pencil"></i></button>
        <button class="btn btn-danger konfirmasiHapus-category" data-id="<?php echo $category->id_category; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="fa fa-trash"></i></button>
      <?php } ?>
      </td>
    </tr>
    <?php
  }
?>