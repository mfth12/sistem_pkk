<!DOCTYPE html>
<html lang="en">

<head>
	<!-- menggunakan partials 'head.php' -->
	<?php $this->load->view("_partials/1head.php") ?>
</head>

<body class="sb-nav-fixed">
	<!-- partial navbar -->
	<?php $this->load->view("_partials/2navbar.php") ?>
	<!-- selesai partial navbar -->


	<div id="layoutSidenav">
		<!-- partial side_navigation -->
		<?php $this->load->view("_partials/3sidenav.php") ?>



		<!-- ini mulai masuk ke konten halaman (sidenav_content) -->
		<!-- ini mulai masuk ke konten halaman (sidenav_content) -->
		<!-- ini mulai masuk ke konten halaman (sidenav_content) -->
		<!-- ini mulai masuk ke konten halaman (sidenav_content) -->
		<!-- ini mulai masuk ke konten halaman (sidenav_content) -->
		<!-- ini mulai masuk ke konten halaman (sidenav_content) -->
		<div id="layoutSidenav_content">
			<main>
				<!-- masuk ke kontainer konten halaman -->

				<div class="container-fluid">
					<!-- ini nama judul halaman -->
					<h1 class="mt-4">Tambah Products</h1>
					<!-- ini nama bread crumb -->
					<?php $this->load->view("_partials/4breadcrumb.php") ?>
					<!-- DataTables -->
					<div class="row">
						<div class="col-xl-8">
							<!-- cards -->
							<!-- tulisan untuk row data, bebas -->
						</div>
					</div>
					<div class="container-fluid">



						<!-- ini untuk tulisan sukses, disini yaa -->

						<!-- load badges disini -->
						<?php $this->load->view("_partials/8flash.php") ?>

						<div class="card mb-4">
							<div class="card-header">
								<a href="<?php echo site_url('admin/products/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
							</div>
							<div class="card-body">

								<form action="<?php echo site_url('admin/products/add') ?>" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label for="name">Nama*</label>
										<input class="form-control <?php echo form_error('name') ? 'is-invalid' : '' ?>" type="text" name="name" placeholder="Nama produk" />
										<div class="invalid-feedback">
											<?php echo form_error('name') ?>
										</div>
									</div>

									<div class="form-group">
										<label for="price">Harga*</label>
										<input class="form-control <?php echo form_error('price') ? 'is-invalid' : '' ?>" type="number" name="price" min="0" placeholder="Harga produk" />
										<div class="invalid-feedback">
											<?php echo form_error('price') ?>
										</div>
									</div>


									<div class="form-group">
										<label for="image">Foto</label>
										<input class="form-control-file <?php echo form_error('image') ? 'is-invalid' : '' ?>" type="file" name="image" />
										<div class="invalid-feedback">
											<?php echo form_error('image') ?>
										</div>
									</div>

									<div class="form-group">
										<label for="deskription">Dekripsi*</label>
										<textarea class="form-control <?php echo form_error('description') ? 'is-invalid' : '' ?>" name="description" placeholder="Deskripsi produk..."></textarea>
										<div class="invalid-feedback">
											<?php echo form_error('description') ?>
										</div>
									</div>

									<input class="btn btn-success" type="submit" name="btn" value="Tambah" />
								</form>

							</div>

							<div class="card-footer small text-muted">
								* harus diisi
							</div>


						</div>
						<!-- /.container-fluid -->
			</main>





			<!-- ini bagian footer  -->
			<?php $this->load->view("_partials/5footer.php") ?>

			<!-- ini mulai masuk ke konten halaman (sidenav_content) -->
			<!-- ini mulai masuk ke konten halaman (sidenav_content) -->
			<!-- ini mulai masuk ke konten halaman (sidenav_content) -->
			<!-- ini mulai masuk ke konten halaman (sidenav_content) -->
			<!-- ini mulai masuk ke konten halaman (sidenav_content) -->
			<!-- ini mulai masuk ke konten halaman (sidenav_content) -->
		</div>


		<!-- modal -->
		<!-- modal untuk klik logout dari navbar-->
		<?php $this->load->view("_partials/6modal.php") ?>


		<!--  ??php $this->load->view("admin/_partials/6modal.php") ?> -->
		<!-- Ini adalah script dari link internet -->
		<?php $this->load->view("_partials/7js.php") ?>
</body>

</html>