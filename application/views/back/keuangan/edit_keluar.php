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
			echo validation_errors('<div class="alert alert-danger">', '<button class="close" data-dismiss="alert">&times;</button> </div>');

			// Form
			echo form_open_multipart('admin/keuangan/ubah_keluaran/' . $nomor);

			?>

			<!-- sekarang masuk ke kolom isi konten -->
			<div class="card mb-4">
				<div class="card-header">
					<a href="<?php echo site_url('admin/keuangan/keluaran') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
				</div>
				<div class="card-body">

					<div class="form-group">
						<label class="col-form-label" for="nomor">Nomor</label>
						<input type="number" class="form-control" name="nomor" id="nomor" value="<?= $nomor; ?>" readonly="">
					</div>
					<div class="form-group col-md-4">
						<label>Bukti Transaksi</label><br>
						<img src="<?php echo base_url('back_assets/upload/transaksi/' . $image) ?>" style="max-width:100%; height:auto;">
					</div>
					<div class=" col-md-4 form-group">
						<input class="form-control" name="image" type="file" />
						<input type="hidden" name="image_lama" value="<?php echo $image ?>" />
					</div>
					<div class="form-group">
						<label>Pokja</label>
						<select name="id_pokja" class="form-control" required>
							<?php foreach ($pokja as $pokja) {
								if ($pokja->id_pokja != 74) { ?>
									<option value="<?php echo $pokja->id_pokja ?>" <?php  if ($id_pokja_this == $pokja->id_pokja) { echo "selected"; } ?>> <?php echo $pokja->nama_pokja ?></option>
							<?php }
							} ?>
						</select>
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