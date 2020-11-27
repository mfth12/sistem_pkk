<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<!-- ini nama judul halaman -->
			<h1 class="mt-4">Ubah Keuangan</h1>
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
			echo form_open(site_url('superadmin/keuangan/do_ubah/' . $nomor));
			?>

			<!-- sekarang masuk ke kolom isi konten -->
			<div class="card mb-4">
				<div class="card-header">
					<a href="<?php echo site_url('superadmin/keuangan') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
				</div>
				<div class="card-body">

					<div class="form-group">
						<label class="col-form-label" for="nomor">Nomor</label>
						<input type="number" class="form-control" name="nomor" id="nomor" value="<?= $nomor; ?>" readonly="">
					</div>
					<div class="form-group">
						<label class="col-form-label" for="keterangan">Keterangan</label>
						<textarea class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" required=""><?= $keterangan; ?></textarea>
					</div>
					<div class="form-group">
						<label class="col-form-label" for="tanggal">Tanggal</label>
						<input type="date" class="form-control" name="tanggal" id="tanggal" value="<?= $tanggal; ?>" required="">
					</div>
					<div class="form-group">
						<label class="col-form-label" for="jumlah">Jumlah</label>
						<input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" value="<?= $jumlah; ?>" required="">
					</div>
					<button type="submit" class="btn btn-primary">Simpan</button>

					<?php echo form_close() ?>

				</div> <!-- akhir div card body -->
			</div> <!-- akhir div card -->
		</div> <!-- akhir container fluid -->
	</main>