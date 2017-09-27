<div class="col-md-12 well">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;"><i class="fa fa-location-arrow"></i> Devices Used by <b><?php echo $staff->name; ?></b></h3>

  <div class="box box-body">
    <!--
    <?php 
      echo "<pre>";
      print_r($dataHw);
    ?>
    -->
      <table id="tabel-detail" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Devices</th>
            <th>Label</th>
            <th>Brand</th>
            <th>Series</th>
            <th>Location</th>
            <th>Condition</th>
          </tr>
        </thead>
        <tbody id="data-hardware">
          <?php
            foreach ($dataHw as $hardware) {
              ?>
              <tr>
                <td><?php echo $hardware->name; ?></td>
                <td><?php echo $hardware->label; ?></td>
                <td><?php echo $hardware->manufacturer; ?></td>
                <td><?php echo $hardware->series; ?></td>
                <td><?php echo $hardware->location; ?></td>
                <td><?php echo $hardware->condition; ?></td>
              </tr>
              <?php
            }
          ?>
        </tbody>
      </table>
  </div>

  <div class="text-right">
    <button class="btn btn-danger" data-dismiss="modal"> Close</button>
  </div>
</div>