<script type="text/javascript">
	var MyTable = $('#list-data').dataTable({
		  "paging": true,
		  "lengthChange": true,
		  "searching": true,
		  "ordering": true,
		  "info": true,
		  "autoWidth": false
		});

	window.onload = function() {
		tampilStaff();
		tampilSupplier();
		tampilDevices();
		tampilSoftware();
		tampilCategory();
		tampilUsers();
		<?php
			if ($this->session->flashdata('msg') != '') {
				echo "effect_msg();";
			}
		?>
	}

	function refresh() {
		MyTable = $('#list-data').dataTable();
	}

	function effect_msg_form() {
		// $('.form-msg').hide();
		$('.form-msg').show(1000);
		setTimeout(function() { $('.form-msg').fadeOut(1000); }, 3000);
	}

	function effect_msg() {
		// $('.msg').hide();
		$('.msg').show(1000);
		setTimeout(function() { $('.msg').fadeOut(1000); }, 3000);
	}

	//devices
	function tampilDevices() {
		$.get('<?php echo base_url('devices/tampil/category/'.@$devcat); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-devices').html(data);
			refresh();
		});
	}

	var id_devices;
	$(document).on("click", ".konfirmasiHapus-devices", function() {
		id_devices = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataDevices", function() {
		var id = id_devices;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('devices/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilDevices();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataDevices", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('devices/update/category/'.@$devcat); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-devices').modal('show');
		})
	})

	$(document).on("click", ".detail-dataUser", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('devices/detailUser'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-devices').modal('show');
		})
	})

	$('#form-tambah-devices').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('devices/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilDevices();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-devices").reset();
				$('#tambah-devices').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-devices', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('devices/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilDevices();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-devices").reset();
				$('#update-devices').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-devices').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-devices').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//software
	function tampilSoftware() {
		$.get('<?php echo base_url('software/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-software').html(data);
			refresh();
		});
	}

	var id_software;
	$(document).on("click", ".konfirmasiHapus-software", function() {
		id_software = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataSoftware", function() {
		var id = id_software;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('software/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilSoftware();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataSoftware", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('software/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-software').modal('show');
		})
	})

	$('#form-tambah-software').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('software/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilSoftware();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-software").reset();
				$('#tambah-software').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-software', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('software/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilSoftware();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-software").reset();
				$('#update-software').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-software').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-software').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	
	//staff
	function tampilStaff() {
		$.get('<?php echo base_url('staff/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-staff').html(data);
			refresh();
		});
	}

	var id_staff;
	$(document).on("click", ".konfirmasiHapus-staff", function() {
		id_staff = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataStaff", function() {
		var id = id_staff;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('staff/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilStaff();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataStaff", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('staff/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-staff').modal('show');
		})
	})

	$(document).on("click", ".detail-dataHw", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('staff/detailHw'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-staff').modal('show');
		})
	})

	$('#form-tambah-staff').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('staff/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilStaff();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-staff").reset();
				$('#tambah-staff').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-staff', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('staff/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilStaff();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-staff").reset();
				$('#update-staff').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-staff').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-staff').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//supplier
	function tampilSupplier() {
		$.get('<?php echo base_url('supplier/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-supplier').html(data);
			refresh();
		});
	}

	var id_supplier;
	$(document).on("click", ".konfirmasiHapus-supplier", function() {
		id_supplier = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataSupplier", function() {
		var id = id_supplier;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('supplier/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilSupplier();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataSupplier", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('supplier/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-supplier').modal('show');
		})
	})

	$(document).on("click", ".detail-dataSuppHw", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('supplier/detailSuppHw'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-supplier').modal('show');
		})
	})

	$(document).on("click", ".detail-dataSuppSw", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('supplier/detailSuppSw'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-supplier').modal('show');
		})
	})

	$('#form-tambah-supplier').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('supplier/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilSupplier();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-supplier").reset();
				$('#tambah-supplier').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-supplier', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('supplier/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilSupplier();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-supplier").reset();
				$('#update-supplier').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-supplier').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-supplier').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//category
	function tampilCategory() {
		$.get('<?php echo base_url('category/tampil/usage/'.@$usage); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-category').html(data);
			refresh();
		});
	}

	var id_category;
	$(document).on("click", ".konfirmasiHapus-category", function() {
		id_category = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataCategory", function() {
		var id = id_category;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('category/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilCategory();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataCategory", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('category/update/usage/'.@$usage); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-category').modal('show');
		})
	})

	$('#form-tambah-category').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('category/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilCategory();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-category").reset();
				$('#tambah-category').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-category', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('category/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilCategory();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-category").reset();
				$('#update-category').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-category').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-category').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})


		//users
	function tampilUsers() {
		$.get('<?php echo base_url('users/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-users').html(data);
			refresh();
		});
	}

	var id_users;
	$(document).on("click", ".konfirmasiHapus-users", function() {
		id_users = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataUsers", function() {
		var id = id_users;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('users/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilUsers();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataUsers", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('users/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-users').modal('show');
		})
	})

	$(document).on("click", ".resetpass-dataUsers", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('users/resetpass'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#resetpass-users').modal('show');
		})
	})

	$('#form-tambah-users').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('users/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilUsers();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-users").reset();
				$('#tambah-users').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-users', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('users/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilUsers();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-users").reset();
				$('#update-users').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-resetpass-users', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('users/prosesResetpass'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilUsers();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-resetpass-users").reset();
				$('#resetpass-users').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-users').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-users').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#resetpass-users').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})


	
	$( "#purchase_date" ).datepicker();
	$( "#license_start_date" ).datepicker();
	$( "#license_end_date" ).datepicker();

	$("li.user.user-menu").hover(
	  function () {
	    $(this).addClass("active");
	  },
	  function () {
	    $(this).removeClass("active");
	  }
	);

	$("a.sidebar-toggle.menu_setting").click(function(){
		$("ul.sidebar-menu ul.nav.child_menu.menu_hw").hide(500);
        $("ul.sidebar-menu ul.nav.child_menu.menu_setting").toggle(500);
    });

    $("a.sidebar-toggle.menu_hw").click(function(){
    	$("ul.sidebar-menu ul.nav.child_menu.menu_setting").hide(500);
        $("ul.sidebar-menu ul.nav.child_menu.menu_hw").toggle(500);
    });
</script>