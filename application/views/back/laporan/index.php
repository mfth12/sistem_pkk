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
            if ($this->session->flashdata('sukses')) {
                echo '<div class="alert alert-success">';
                echo '<button class="close" data-dismiss="alert">&times;</button>';
                echo $this->session->flashdata('sukses');
                echo '</div>';
            }
            if ($this->session->flashdata('dihapus')) {
                echo '<div class="alert alert-danger">';
                echo '<button class="close" data-dismiss="alert">&times;</button>';
                echo $this->session->flashdata('dihapus');
                echo '</div>';
            }
            if ($this->session->flashdata('kuning')) {
                echo '<div class="alert alert-info">';
                echo '<button class="close" data-dismiss="alert">&times;</button>';
                echo $this->session->flashdata('kuning');
                echo '</div>';
            }
            // File upload error
            if (isset($error)) {
                echo '<div class="alert alert-danger">';
                echo '<button class="close" data-dismiss="alert">&times;</button>';
                echo $error;
                echo '</div>';
            }
            echo validation_errors('<div class="alert alert-danger">', '<button class="close" data-dismiss="alert">&times;</button></div>'); ?>

            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between lh-condensed ">
                        <div>
                            <h3>Laporan Tahun <?= $tahun_aktif->nama_periode; ?></h3>
                            <?php if ($btn) { ?>
                                <?php if ($this->session->userdata('akses_level') == 'superadmin') { ?>
                                <p>Laporan periode ini belum tersedia. Silakan lanjut untuk mulai membuat laporan.</p>
                                <?php } else { ?>
                                    <p>Laporan periode ini belum tersedia. Silakan hubungi sekretaris PKK agar segera melakukan pembuatan laporan menggunakan sistem.</p> 
                                <?php } ?>
                            <?php } else { ?>
                                <p>Laporan periode ini telah tersedia.</p>
                            <?php } ?>
                        </div>
                        <div class="d-flex">
                            <?php if ($this->session->userdata('akses_level') == 'superadmin') { ?>

                            <?php if ($btn) {
                                ?><p><a id="btnku" href="#!" onclick="showME()" class="btn btn-success mr-2"> <i class="fa fa-arrow-right"></i> Buat</a></p>
                                <?php } else { ?>
                                    <p><a id="b" href="#!" onclick="showME()" class="btn btn-secondary mr-2"> <i class="fa fa-edit"></i> Ubah</a></p>
                                    <p><a href="<?php echo base_url('admin/laporan/view') ?>" target="_blank" class="btn btn-primary"> <i class="fa fa-print"></i> Cetak</a></p>
                                <?php } ?>

                            <?php
                            } else { ?>
                                <?php if ($btn) { ?>
                                <?php } else { ?>
                                    <p><a href="<?php echo base_url('admin/laporan/view') ?>" target="_blank" class="btn btn-primary"> <i class="fa fa-print"></i> Cetak</a></p>
                                <?php } ?>

                            <?php } ?>

                            

                        </div>
                    </div>

                    <div style="display: none;" id="laporanku">
                        <div class="tab-pane fade show active" id="utama" role="tabpanel" aria-labelledby="utama-tab">
                            <hr>
                            <form action="<?php echo site_url('admin/laporan/proses') ?>" method="post">
                                <input type="hidden" name="id_laporan" value="<?php echo $laporan->id_laporan ?>">
                                <input type="hidden" name="periode_ke" value="<?php echo $laporan->periode_ke ?>">
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <h5>1. Pelaksanaan</h5>
                                        <div class="form-group">
                                            <label>Kalimat Laporan Pelaksanaan Secara Umum</label>
                                            <textarea name="umum" rows="6" class="form-control" placeholder="Laporan Umum"><?php echo $laporan->pelaksanaan_umum ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6 order-md-1">
                                        <h5>2. Hambatan</h5>
                                        <div class="form-group">
                                            <label>Hambatan ketika melaksanakan tugas satu periode</label>
                                            <textarea required name="hambatan" rows="8" class="form-control" placeholder="Tuliskan hambatan"><?php echo $laporan->hambatan ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 order-md-1">
                                        <h5>3. Pemecahan Masalah</h5>
                                        <div class="form-group">
                                            <label>Solusi menyelesaikan masalah</label>
                                            <textarea required name="pemecahan_masalah" rows="8" class="form-control" placeholder="Tuliskan solusi"><?php echo $laporan->pemecahan_masalah ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <h5>4. Kesimpulan</h5>
                                        <div class="form-group">
                                            <label>Isi Kesimpulan Laporan</label>
                                            <textarea required name="kesimpulan" rows="6" class="form-control" placeholder="Tuliskan kesimpulan"><?php echo $laporan->kesimpulan ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <h5>5. Usulan / Masukan</h5>
                                        <div class="form-group">
                                            <label>Kalimat Usulan / Masukan</label>
                                            <textarea required name="usulan" rows="6" class="form-control" placeholder="Tuliskan kalimat usulan / masukan"><?php echo $laporan->saran ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <h5>6. Penutup</h5>
                                        <div class="form-group">
                                            <label>Kalimat Penutup Laporan</label>
                                            <textarea required name="penutup" rows="6" class="form-control" placeholder="Kalimat penutup"><?php echo $laporan->penutup ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6 order-md-1">
                                        <h5>Tertanda</h5>
                                        <div class="form-group">
                                            <label>Nama Lengkap Ketua PKK Desa Uma Beringin</label>
                                            <input type="text" name="nama_ttd" placeholder="Nama Lengkap" value="<?php echo $laporan->nama_ttd ?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 order-md-1">
                                        <h5>Tanggal</h5>
                                        <div class="form-group">
                                            <label>Tanggal Dikeluarkan Laporan</label>
                                            <input type="date" name="tanggal_ttd" placeholder="Nama Lengkap" value="<?php echo $laporan->tanggal_ttd ?>" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <?php if ($btn) { ?><input type="hidden" name="baru" value="baru" class="form-control"><?php } ?>
                                <div class="row col-md-12">
                                    <input type="reset" name="reset" value="Reset" class="btn btn-secondary mr-2">
                                    <?php if ($btn) { ?>
                                        <input type="submit" name="submit" value="Buat Laporan" class="btn btn-success">
                                    <?php } else { ?>
                                        <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                                    <?php } ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>