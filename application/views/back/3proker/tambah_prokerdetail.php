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
            echo form_open_multipart('admin/proker/tambah_detail');
            ?>
            <div class="card mb-4">
                <div class="card-header">
                    <a href="<?php echo site_url('admin/proker/detail') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="form-group form-group-lg">
                                <label>Detail Program Kerja *</label>
                                <input placeholder="Nama Program" type="text" autofocus name="nama_proker" value="<?php echo set_value('nama_proker_utama') ?>" required class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="form-group">
                                <label>Proker Utama *</label>
                                <select name="id_proker_utama" class="form-control" required>
                                    <?php foreach ($proker as $pokja) { ?>
                                        <option value="<?php echo $pokja->id_proker_utama ?>">
                                            <?php echo "[" . $pokja->nama_pokja . "] - " . $pokja->nama_proker_utama ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="form-group">
                                <label>Keterangan Program</label><small> (Opsional)</small>
                                <textarea placeholder="Keterangan" name="keterangan" rows="5" class="form-control"><?php echo set_value('keterangan') ?></textarea>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="form-group form-group-lg">
                                <label>Status Program *</label>
                                <select name="status" class="form-control" required>
                                    <option value="Terlaksana" selected>Terlaksana</option>
                                    <option value="Terlaksana">Tidak</option>
                                </select>
                                <div class="small text-muted">
                                    * harus diisi
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="reset" name="reset" value="Reset" class="btn btn-secondary">
                        <input type="submit" name="submit" value="Tambah Detail Program" class="btn btn-primary">
                    </div>
                </div>
            </div>
            <?php
            echo form_close() ?>
        </div>
    </main>