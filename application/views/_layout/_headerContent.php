<section class="content-header">
	<h1>
	  <?php echo @$judul; ?> Page
	  <!-- <small><?php echo @$deskripsi; ?></small> -->
	</h1>
	<ol class="breadcrumb">		
	  <?php
	  	for ($i=0; $i<count($this->session->flashdata('segment')); $i++) { 
	  		if ($i == 0) {
	  			if($this->session->flashdata('segment')[$i] !== 'home') {  			
	  		?>
	  			<li><i class="fa fa-dashboard"></i> Home</li>
				<li> <?php echo $this->session->flashdata('segment')[$i]; ?></li>
	  		<?php
	  			}
	  		} elseif ($i == (count($this->session->flashdata('segment'))-1)) {
  			?>
				<li class="active"> <?php echo $this->session->flashdata('segment')[$i]; ?> </li>
	  		<?php
	  		} 
	  	}
	  ?>
	</ol>
</section>