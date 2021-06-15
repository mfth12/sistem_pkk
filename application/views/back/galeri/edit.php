<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<!-- ini nama judul halaman -->
			<h1 class="mt-4"><?php echo $title ?></h1>
			<!-- ini nama bread crumb -->
			<ol class="breadcrumb">
				<?php foreach ($this->uri->segments as $segment) : ?>
					<?php $url = substr($this->uri->uri_string, 0, strpos($this->uri->uri_string, $segment)) . $segment;
					$is_active =  $url == $this->uri->uri_string; ?>
					<li class="breadcrumb-item <?php echo $is_active ? 'active' : '' ?>">
						<?php if ($is_active) : ?>
							<?php echo ucfirst($segment) ?>
						<?php else : ?>
							<a href="<?php echo site_url($url) ?>"> <?php echo ucfirst($segment) ?></a>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ol>
			<!-- flash sedikit -->
			<?php
			// Validasi
			echo validation_errors('<div class="alert alert-success">', '<button class="close" data-dismiss="alert">&times;</button> </div>');

			// Form
			echo form_open_multipart('admin/galeri/edit/' . $galeri->galeri_id);
			?>
			<!-- sekarang masuk ke kolom isi konten -->
			<div class="card mb-4">
				<div class="card-header">
					<a href="<?php echo site_url('admin/galeri') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
				</div>
				<div class="card-body">
					<input class="form-group" required type="hidden" name="id" value="<?php echo $galeri->galeri_id ?>" />
					<div class="form-group col-md-6">
						<label>Foto Galeri Sekarang</label><br>
						<img src="<?php echo base_url('back_assets/upload/galeri/' . $galeri->image) ?>" style="max-width:100%; height:auto;">
					</div>
					<div class="card mb-4">
						<div class="card-body">
							Anda dapat mengubah foto galeri dengan memilih <a href="#">file foto</a> yang baru. 
							Jika tidak ingin mengubah, anda dapat mengabaikan kolom input foto.
						</div>
					</div>
					<div class="form-group">
						<label for="image">Foto Galeri </label><small> (Max 2Mb)</small>
						<input class="form-control" name="image" type="file"/>
						<input type="hidden" name="image_lama" value="<?php echo $galeri->image ?>" />
					</div>
					<div class="form-group">
						<label for="nama_galeri">Judul Foto *</label>
						<input class="form-control" required type="text" name="nama_galeri" value="<?php echo $galeri->name ?>" />
					</div>
					<div class="form-group">
						<label for="nomor">Urutan Tampil *</label>
						<input class="form-control" required type="number" name="nomor" value="<?php echo $galeri->nomor ?>" placeholder="<?php echo $galeri->nomor ?>" />
					</div>

					<div class="form-group">
						<label for="description">Keterangan Foto *</label>
						<textarea class="form-control" name="description" required><?php echo $galeri->description ?></textarea>
						<div class="small text-muted">
							* harus diisi
						</div>
					</div>
					<button type="reset" value="Reset" class="btn btn-secondary">Reset</button>
					<button type="submit" class="btn btn-primary">Simpan</button>

					<?php echo form_close() ?>

				</div> <!-- akhir div card body -->
			</div> <!-- akhir div card -->
		</div> <!-- akhir container fluid -->
	</main>