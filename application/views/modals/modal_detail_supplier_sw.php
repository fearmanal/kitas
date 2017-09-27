<div class="col-md-12 well">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;"><i class="fa fa-location-arrow"></i> software by <b><?php echo $supplier->name; ?></b></h3>

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
            <th>Manufacturer</th>
            <th>Name</th>
            <th>Version</th>
            <th>Quantity</th>
            <th>Start Date</th>
            <th>End Date</th>
          </tr>
        </thead>
        <tbody id="data-software">
          <?php
            foreach ($dataSuppSw as $software) {
              ?>
              <tr>
                <td><?php echo $software->manufacturer; ?></td>
                <td><?php echo $software->name; ?></td>
                <td><?php echo $software->version; ?></td>
                <td><?php echo $software->license_qty; ?></td>
                <td><?php echo $software->license_start_date; ?></td>
                <td><?php echo $software->license_end_date; ?></td>
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