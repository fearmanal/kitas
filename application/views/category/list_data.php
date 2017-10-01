<?php
  foreach ($dataCategory as $category) {
    ?>
    <tr>
      <td><a href="<?php echo base_url('devices/index/category/'.$category->name); ?>"><?php echo $category->name; ?></a></td>
      <td><?php echo $category->label; ?></td>
      <td><?php echo $category->options; ?></td>
      <td><?php echo $category->status; ?></td>
      <td class="text-center" style="letter-spacing: 2px;">
      <?php if($userdata->role == 'administrator' || $userdata->role == 'management') { ?>
        <a href="#" class="update-dataCategory" data-id="<?php echo $category->id_category; ?>"><i class="fa fa-pencil"></i></a>
        <a href="#" class="konfirmasiHapus-category" data-id="<?php echo $category->id_category; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="fa fa-trash"></i></a>
      <?php } ?>
      </td>
    </tr>
    <?php
  }
?>