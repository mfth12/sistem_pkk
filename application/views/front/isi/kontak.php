<section class="employee-area mt-3 section-padding2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-top text-center">
                    <h2><?= $title; ?></h2>
                    <p><?= $title . " " . $site['namaweb'] . ' ' . $site['tagline']; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog-posts-area section-padding3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <?php
            // Notifikasi
            if ($this->session->flashdata('sukses')) {
                echo '<div class="alert alert-success alert-dismissible fade show">';
                echo '<button class="close" data-dismiss="alert">&times;</button>';
                echo $this->session->flashdata('sukses');
                echo '</div>';
            }
            // Notifikasi
            if ($this->session->flashdata('maaf')) {
                echo '<div class="alert alert-danger alert-dismissible fade show">';
                echo '<button class="close" data-dismiss="alert">&times;</button>';
                echo $this->session->flashdata('maaf');
                echo '</div>';
            }
            // Error
            echo validation_errors('<div class="alert alert-danger">', '<button class="close" data-dismiss="alert">&times;</button></div>');
            ?>
            </div>
            <div class="col-lg-4 post-list blog-post-list">
                <div class="single-widget category-widget">
                    <h4 class="title">Detail Kontak</h4>

                    <div class="d-flex">
                        <div class="into-icon">
                            <i class="fa fa-home"></i>
                        </div>
                        <div class="info-text">
                            <h4><?php echo $site['namaweb']." ".$site['tagline']; ?></h4>
                            <p><?php echo $site['alamat']; ?></p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="into-icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="info-text">
                            <h4><?php if ($site['telepon']) {echo $site['telepon']. " (Telepon)";} ?></h4>
                            <p><?php if ($site['hp']) {echo $site['hp']. " (Seluler)";} ?></p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="into-icon">
                            <i class="fa fa-envelope-o"></i>
                        </div>
                        <div class="info-text">
                            <h4>Email</h4>
                            <p><?php echo $site['email']; ?></p>
                        </div>
                    </div>
                </div>


                <div class="single-widget category-widget">
                    <h4 class="title">Sosial Media Kami</h4>
                    <ul>
                        <li>
                            <a href="<?php echo $site['twitter'] ?>" target="_blank" class="justify-content-between align-items-center d-flex">
                                <h6>Twitter</h6> <span></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $site['facebook'] ?>" target="_blank" class="justify-content-between align-items-center d-flex">
                                <h6>Facebook</h6> <span></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $site['instagram'] ?>" target="_blank" class="justify-content-between align-items-center d-flex">
                                <h6>Instagram</h6> <span></span>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>

            <div class="col-lg-8 sidebar">
                <div class="single-widget category-widget">
                    <h4 class="title">Lokasi Map</h4>
                    <?php echo $site['google_map']; ?>
                </div>
            </div>
        </div>
    </div>


    <div class="more-job-btn mt-3 text-center">
        <a href="#" data-toggle="modal" data-target="#masukann" class="template-btn">Hubungi Kami<span class="flaticon-next"></span></a>
    </div>
</section>
<div class="modal fade" id="masukann" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hubungi Kami</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('kontak/add') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap *</label>
                        <input class="form-control" required type="text" name="nama_lengkap" placeholder="" />
                    </div>
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input required type="email" name="email" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="keperluan">Keperluan *</label>
                        <input class="form-control" required type="text" name="keperluan" placeholder="" />
                    </div>
                    <div class="form-group">
                        <label for="description">Pesan *</label><small> (10-250 Karakter)</small>
                        <textarea class="form-control" rows="4"  minlength="10" maxlength="250" name="description" required placeholder=""></textarea>
                        <div class="small text-muted">
                            * harus diisi
                        </div>
                    </div>
                    <button class="btn btn-secondary mr-1" type="button" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</div>