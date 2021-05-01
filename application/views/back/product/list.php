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
					<h1 class="mt-4">Products</h1>
					<!-- ini nama bread crumb -->
					<?php $this->load->view("_partials/4breadcrumb.php") ?>

					<!-- DataTables -->
					<div class="row">
						<div class="col-xl-8">
							<!-- cards -->
							<!-- tulisan untuk row data, bebas -->
						</div>
					</div>


					<!-- ini untuk tulisan sukses, disini yaa -->
					<?php $this->load->view("_partials/8flash.php") ?>


					<div class="card mb-4">
						<div class="card-header">
							<a href="<?php echo site_url('admin/products/add') ?>"><i class="fas fa-plus align-right"></i> Tambah Baru</a>
						</div>
						<!-- .end header -->

						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
									<!-- kepala tabel -->
									<thead>
										<tr>
											<th>No.</th>
											<th>Nama Produk</th>
											<th>Harga</th>
											<th>Foto</th>
											<th>Deskripsi</th>
											<th>Aksi</th>
										</tr>
									</thead>


									<!-- bodi -->

									<!-- foreach($products as $product){ -->

									<tbody>
										<?php
										$no = 0;
										foreach ($products as $product) :
											$no++;
										?>
											<tr>
												<td>
													<?php echo $no; ?>
												</td>
												<td width="150">
													<?php echo $product->name ?>
												</td>
												<td>
													<?php echo $product->price ?>
												</td>
												<td>
													<img src="<?php echo base_url('upload/product/' . $product->image) ?>" width="64" />
												</td>
												<td class="small">
													<?php echo substr($product->description, 0, 150) ?></td>
												<td width="190">
													<a href="<?php echo site_url('admin/products/edit/' . $product->product_id) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
													<a onclick="deleteConfirm('<?php echo site_url('admin/products/delete/' . $product->product_id) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
												</td>

											</tr>
										<?php endforeach; ?>

									</tbody>


								</table>
							</div>







						</div> <!-- end card body -->
					</div>

				</div>
				<!-- /.container-fluid -->


				<!-- area bar -->
				<!-- close row class -->






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


	<script>
		function deleteConfirm(url) {
			$('#btn-delete').attr('href', url);
			$('#deleteModal').modal();
		}
	</script>
	<!-- script javascript untuk modal delete -->
	<!-- script javascript untuk modal delete -->
	<!-- script javascript untuk modal delete -->
</body>

</html>