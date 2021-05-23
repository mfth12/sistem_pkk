<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"><?php echo $title?><?php if ($this->session->userdata('akses_level') == 'superadmin') echo "Administrator";
                                        if ($this->session->userdata('akses_level') == 'admin_desa') echo "Perangkat Desa"; ?></h1>
            <!-- Breadcrumbs-->
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
            <!-- Breadcrumbs-->
            <div class="card mb-4">
                <div class="card-body font-italic">
                    Selamat datang di Sistem Informasi PKK Desa Uma Beringin. Anda berada pada halaman dasbor sistem.
                </div>
            </div>
            <?php if ($this->session->userdata('akses_level') == 'superadmin') { ?>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                <h4><?php echo count($berita) ?> Berita</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="<?php echo site_url('admin/berita') ?>">Lihat Detail Kegiatan</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">
                                <h4><?php echo count($total_trans) ?> Data Keuangan</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="<?php echo site_url('admin/keuangan') ?>">Lihat Detail Keuangan</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-secondary text-white mb-4">
                            <div class="card-body">
                                <h4><?php echo count($slider) ?> Gambar Slider</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="<?php echo site_url('admin/sliders') ?>">Lihat Detail Gambar Slider</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">
                                <h4><?php echo count($user) ?> User</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="<?php echo site_url('admin/user') ?>">Lihat Detail User</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                <h4><?php echo count($kategori_berita) ?> Kategori Berita</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="<?php echo site_url('admin/kategori_berita') ?>">Lihat Detail Kategori Berita</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-md-6">
                        <div class="card bg-secondary text-white mb-4">
                            <div class="card-body">
                                <h4><?php echo count($struktur) ?> Pengurus PKK</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="<?php echo site_url('admin/struktur') ?>">Lihat Detail Pengurus PKK</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of kolom isi konten -->
            <?php
            } ?>


            <!-- SUPERADMIN -->
            <?php if ($this->session->userdata('akses_level') == 'admin_desa') { ?>
                <!-- kolom isi konten -->
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                <h4><?php echo count($berita) ?> Kegiatan</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="<?php echo site_url('admin/kegiatan') ?>">Lihat Detail Kegiatan</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">
                                <h4><?php echo count($total_trans) ?> Data Keuangan</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="<?php echo site_url('admin/keuangan') ?>">Lihat Detail Keuangan</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">
                                <h4><?php echo count($user) ?> User</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="<?php echo site_url('admin/user') ?>">Lihat Detail User</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">

                </div>
                <!-- end of kolom isi konten -->
            <?php
            } ?>

        </div>
    </main>