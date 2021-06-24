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
            if (isset($error)) {
                echo '<div class="alert alert-warning">';
                echo '<button class="close" data-dismiss="alert">&times;</button>';
                echo $error;
                echo '</div>';
            }
            // Validasi
            echo validation_errors('<div class="alert alert-danger">', '<button class="close" data-dismiss="alert">&times;</button> </div>');
            // Form
            echo form_open_multipart('admin/proker/edit_utama/' . $proker->id_proker_utama);
            ?>
            <div class="card mb-4">
                <div class="card-header">
                    <a href="<?php echo site_url('admin/proker') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="form-group form-group-lg">
                                <label>Program Kerja *</label>
                                <input type="text" autofocus name="nama_proker_utama" value="<?php echo $proker->nama_proker_utama ?>" required class="form-control">
                                <input type="hidden" name="id_proker_utama" value="<?php echo $proker->id_proker_utama ?>" required class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="form-group">
                                <label>Pokja *</label>
                                <select name="id_pokja" class="form-control" required>
                                    <?php foreach ($pokja as $pokja) { ?>
                                        <option value="<?php echo $pokja->id_pokja ?>" <?php if ($proker->id_pokja == $pokja->id_pokja) { echo "selected"; } ?>>
                                            <?php echo $pokja->nama_pokja ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="form-group">
                                <label>Keterangan Program</label><small> (Opsional)</small>
                                <textarea placeholder="Keterangan" name="keterangan" rows="5" class="form-control"><?php echo $proker->keterangan ?></textarea>
                                <div class="small text-muted">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="reset" name="reset" value="Reset" class="btn btn-secondary">
                        <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                    </div>
                </div>
            </div>
            <?php
            echo form_close() ?>
        </div>
    </main>