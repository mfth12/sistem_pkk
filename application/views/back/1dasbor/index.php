<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"><?php echo $title ?><?php if ($this->session->userdata('akses_level') == 'superadmin') echo "Admin PKK";
                if ($this->session->userdata('akses_level') == 'sekret_pokja') echo "Sekretaris Pokja";
                if ($this->session->userdata('akses_level') == 'kades') echo "Kepala Desa"; ?></h1>
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
            <?php if ($this->session->flashdata('sukses')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button class="close" data-dismiss="alert">&times;</button>
                    <?php echo $this->session->flashdata('sukses'); ?>
                    <strong><?php echo $this->session->userdata('nama'); ?></strong> di Sistem Informasi PKK Desa Uma Beringin!
                </div>
            <?php endif; ?>

            <?php if ($this->session->userdata('akses_level') == 'superadmin') { ?>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                <h4><?php echo count($berita) ?> Berita</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="<?php echo site_url('admin/berita') ?>">Lihat Detail Berita</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                <h4><?php //echo count($user) ?> Program Kerja</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="<?php // echo site_url('admin/user') ?>">Lihat Detail Program Kerja</a>
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
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                <h4><?php //echo count($total_trans) ?> Data Surat</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="<?php //echo site_url('admin/keuangan') ?>">Lihat Detail Surat-menyurat</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-6 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                <h4><?php echo count($pokja) ?> Pokja</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="<?php echo site_url('admin/pokja') ?>">Lihat Detail Pokja</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-secondary text-white mb-4">
                            <div class="card-body">
                                <h4><?php echo count($slider) ?> Gambar Slide</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="<?php echo site_url('admin/sliders') ?>">Lihat Detail Gambar Slider</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-secondary text-white mb-4">
                            <div class="card-body">
                                <h4><?php echo count($user) ?> User</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="<?php echo site_url('admin/user') ?>">Lihat Detail User</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-secondary text-white mb-4">
                            <div class="card-body">
                                <h4><?php //echo count($user) ?> Galeri</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="<?php //echo site_url('admin/user') ?>">Lihat Detail Galeri</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="card bg-secondary text-white mb-4">
                            <div class="card-body">
                                <h4><?php echo count($struktur) ?> Pengurus</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="<?php echo site_url('admin/struktur') ?>">Lihat Detail Pengurus</a>
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