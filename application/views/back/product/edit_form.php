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
		<div id="layoutSidenav_content">
			<main>
				<!-- masuk ke kontainer konten halaman -->



				<div class="container-fluid">

					<!-- ini nama judul halaman -->
					<h1 class="mt-4">Edit Products - <?php echo $product->name ?></h1>
					<!-- ini nama bread crumb -->

					<?php $this->load->view("_partials/4breadcrumb.php") ?>


					<!-- load badges disini -->
					<?php $this->load->view("_partials/8flash.php") ?>

					<!-- Card  -->
					<div class="card mb-3">
						<div class="card-header">

							<a href="<?php echo site_url('admin/products/') ?>"><i class="fas fa-arrow-left"></i>
								Back</a>
						</div>
						<div class="card-body">

							<form action="" method="post" enctype="multipart/form-data">
								<!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							oleh controller tempat vuew ini digunakan. Yakni index.php/admin/products/edit/ID --->

								<input type="hidden" name="id" value="<?php echo $product->product_id ?>" />

								<div class="form-group">
									<label for="name">Nama*</label>
									<input class="form-control <?php echo form_error('name') ? 'is-invalid' : '' ?>" type="text" name="name" placeholder="Nama produk" value="<?php echo $product->name ?>" />
									<div class="invalid-feedback">
										<?php echo form_error('name') ?>
									</div>
								</div>

								<div class="form-group">
									<label for="price">Harga</label>
									<input class="form-control <?php echo form_error('price') ? 'is-invalid' : '' ?>" type="number" name="price" min="0" placeholder="Harga produk" value="<?php echo $product->price ?>" />
									<div class="invalid-feedback">
										<?php echo form_error('price') ?>
									</div>
								</div>


								<div class="form-group">
									<label for="foto">Foto</label>
									<input class="form-control-file <?php echo form_error('image') ? 'is-invalid' : '' ?>" type="file" name="image" />

									<input type="hidden" name="old_image" value="<?php echo $product->image ?>" />
									<div class="invalid-feedback">
										<?php echo form_error('image') ?>
									</div>
								</div>

								<div class="form-group">
									<label for="Deskripsi">Deskripsi*</label>
									<textarea class="form-control <?php echo form_error('description') ? 'is-invalid' : '' ?>" name="description" placeholder="Deskripsi produk"><?php echo $product->description ?></textarea>
									<div class="invalid-feedback">
										<?php echo form_error('description') ?>
									</div>
								</div>

								<input class="btn btn-success" type="submit" name="btn" value="Perbarui" />
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


			<!-- end footer -->
		</div>


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