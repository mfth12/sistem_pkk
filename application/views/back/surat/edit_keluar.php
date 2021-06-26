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
			<?php
			
            // Error
            if (isset($error)) {
                echo '<div class="alert alert-warning">';
                echo '<button class="close" data-dismiss="alert">&times;</button>';
                echo $error;
                echo '</div>';
            }
			// Validasi
			echo validation_errors('<div class="alert alert-danger">', '<button class="close" data-dismiss="alert">&times;</button> </div>');
			// Form
			echo form_open_multipart('admin/surat/ubah_keluar/' . $id_surat);
			?>

			<!-- sekarang masuk ke kolom isi konten -->
			<div class="card mb-4">
				<div class="card-header">
					<a href="<?php echo site_url('admin/surat/keluar') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
				</div>
				<div class="card-body">

					<div class="form-group">
						<label class="col-form-label" for="nomor">No. Surat</label>
						<input type="text" class="form-control" name="nomor" value="<?= $nomor; ?>" placeholder="001/SKRT/TP-PKK/II/2021">
						<input type="hidden" class="form-control" name="id_surat" value="<?= $id_surat; ?>" >
					</div>
					<div class="form-group col-md-4">
						<label>Berkas Surat </label><small> (Klik untuk melihat)</small><br>
						<a target="_blank" href="<?php echo base_url('back_assets/upload/surat/' . $image) ?>">
						<img src="<?php echo base_url('back_assets/upload/surat/' . $image) ?>" style="max-width:100%; height:auto;">
						</a>
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
						<label class="col-form-label" for="keterangan">Keterangan Surat</label>
						<textarea class="form-control" name="keterangan" placeholder="Keterangan" required=""><?= $keterangan; ?></textarea>
					</div>
					<div class="form-group">
						<label class="col-form-label" for="tanggal">Tanggal</label>
						<input type="date" class="form-control" name="tanggal" value="<?= $tanggal; ?>" required="">
					</div>
					<button type="reset" value="Reset" class="btn btn-secondary">Reset</button>
					<button type="submit" class="btn btn-primary">Simpan</button>

					<?php echo form_close() ?>

				</div> <!-- akhir div card body -->
			</div> <!-- akhir div card -->
		</div> <!-- akhir container fluid -->
	</main>