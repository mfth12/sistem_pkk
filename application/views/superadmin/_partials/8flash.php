<!-- berbagai macam badge ada disini -->
<?php if ($this->session->flashdata('dihapus')) : ?>
	<div class="alert alert-danger" role="alert">
		<button class="close" data-dismiss="alert">&times;</button>
		<strong>Terhapus! </strong>
		<?php echo $this->session->flashdata('dihapus'); ?>
	</div>
<?php endif; ?>

<!-- berbagai macam badge ada disini -->
<?php if ($this->session->flashdata('selamatdatang')) : ?>
	<div class="alert alert-success">
		<button class="close" data-dismiss="alert">&times;</button>
		<strong>Selamat Datang! </strong>
		<?php echo $this->session->flashdata('selamatdatang'); ?>
	</div>
<?php endif; ?>

<!-- berbagai macam badge ada disini -->
<?php if ($this->session->flashdata('success')) : ?>
	<div class="alert alert-success">
		<button class="close" data-dismiss="alert">&times;</button>
		<strong>Berhasil! </strong>
		<?php echo $this->session->flashdata('success_simpan'); ?>
	</div>
<?php endif; ?>

<!-- berbagai macam badge ada disini -->
<?php if ($this->session->flashdata('maaf')) : ?>
	<div class="alert alert-danger">
		<button class="close" data-dismiss="alert">&times;</button>
		<strong>Maaf, </strong>
		<?php echo $this->session->flashdata('maaf'); ?>
	</div>
<?php endif; ?>