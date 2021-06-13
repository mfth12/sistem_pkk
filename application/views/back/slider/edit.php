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
			echo form_open_multipart('admin/sliders/edit/' . $slide->slider_id);
			?>
			<!-- sekarang masuk ke kolom isi konten -->
			<div class="card mb-4">
				<div class="card-header">
					<a href="<?php echo site_url('admin/sliders') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
				</div>
				<div class="card-body">
					<input class="form-group" required type="hidden" name="id" value="<?php echo $slide->slider_id ?>" />
					<div class="form-group col-md-6">
						<label>Gambar slide sekarang</label><br>
						<img src="<?php echo base_url('back_assets/upload/slider/' . $slide->image) ?>" style="max-width:100%; height:auto;">
					</div>
					<div class="card mb-4">
						<div class="card-body">
							Anda dapat mengubah gambar slide dengan memilih <a href="#">gambar</a> yang baru. 
							Jika, tidak ingin mengubah anda dapat mengabaikan kolom input gambar.
						</div>
					</div>
					<div class="form-group">
						<label for="image">Gambar Slide </label><small> (Max 2Mb)</small>
						<input class="form-control" name="image" type="file"/>
						<input type="hidden" name="image_lama" value="<?php echo $slide->image ?>" />
					</div>
					<div class="form-group">
						<label for="nama_slide">Judul Slide *</label>
						<input class="form-control" required type="text" name="nama_slide" value="<?php echo $slide->name ?>" />
					</div>
					<div class="form-group">
						<label for="nomor">Urutan Tampil *</label>
						<input class="form-control" required type="number" name="nomor" value="<?php echo $slide->nomor ?>" placeholder="<?php echo $slide->nomor ?>" />
					</div>

					<div class="form-group">
						<label for="deskription">Keterangan Slide *</label>
						<textarea class="form-control" name="description" required><?php echo $slide->description ?></textarea>
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