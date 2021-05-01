<?php
$site       = $this->konfigurasi_model->listing();
$nav_produk = $this->site_model->nav_produk();
$nav_berita = $this->site_model->nav_berita();
$nav_profil = $this->site_model->nav_profil();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Page Title -->
    <title>PKK Desa Uma Beringin</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url('front_assets/upload/' . $site['icon']) ?>" type="image/x-icon">
    <!-- CSS All -->
    <link href="<?php echo base_url('front_assets/css/animate-3.7.0.css') ?>" type="text/css" rel="stylesheet" media="all">
    <link href="<?php echo base_url('front_assets/css/font-awesome-4.7.0.min.css') ?>" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url('front_assets/fonts/flat-icon/flaticon.css') ?>" type="text/css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
    <link href="<?php echo base_url('front_assets/css/bootstrap-4.1.3.min.css') ?>" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url('front_assets/css/owl-carousel.min.css') ?>" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url('front_assets/css/nice-select.css') ?>" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url('front_assets/css/style.css') ?>" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url('front_assets/css/dropdown.css') ?>" type="text/css" rel="stylesheet">
    <!-- Style tambahan -->
    <style>
        * {
            transition: all 0.6s;
        }
        .smart-scroll {
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1030;
        }

        .scrolled-down {
            transform: translateY(-100%);
            transition: all 0.3s ease-in-out;
        }

        .scrolled-up {
            transform: translateY(0);
            transition: all 0.3s ease-in-out;
        }

        body {
            opacity: 1;
            transition: 1s opacity;
        }
        
        body.fade-out {
            opacity: 0;
            transition: none;
        }
        
        html {
            min-width: 384px;
            background-color: white;
        }
    </style>
</head>

<body>
    <!-- Header Fade-out -->
    <script>
        document.body.className += 'fade-out';
    </script>
    <!-- loading Animation -->
    <div class="preloader">
        <div class="spinner"></div>
    </div>
    <!-- Back to top button -->
    <!-- <a id="button-up"></a> -->
    <a id="button-up"></a>
    <!-- Navigation -->
    <header class="header-area main-header smart-scroll shadow p-2 blur-ios">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="logo-area">
                        <a href="<?php echo base_url() ?>"><img height="50" src="<?php echo base_url('front_assets/images/' . $site['logo']) ?>" alt="logo"></a>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="custom-navbar">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="main-menu">
                        <ul>
                            <li><a href="<?php echo base_url() ?>">Beranda</a></li>
                            <li><a href="#berita">Berita</a>
                                <ul class="sub-menu">
                                    <?php foreach ($nav_berita as $nav_berita) { ?>
                                        <li>
                                            <a href="<?php echo site_url('kegiatan/kategori/' . $nav_berita->slug_kategori_berita) ?>">
                                                <?php echo $nav_berita->nama_kategori_berita ?>
                                            </a><?php } ?>
                                        </li>
                                        <li><a href="blog-home.html">+ tambahan</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Galeri</a>
                                <ul class="sub-menu">
                                    <li><a href="#">Pokja I</a></li>
                                    <li><a href="#">Pokja II</a></li>
                                    <li><a href="#">Pokja III</a></li>
                                    <li><a href="#">Pokja IV</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Tentang</a>
                                <ul class="sub-menu">
                                    <?php foreach ($nav_profil as $nav_profil) { ?>
                                        <li>
                                            <a href="<?php echo site_url('kegiatan/read/' . $nav_profil->slug_berita) ?>">
                                                <?php echo $nav_profil->nama_berita ?>
                                            </a><?php } ?>
                                        </li>
                                </ul>
                            </li>
                            <li><a href="#">Kontak</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <?php
    if ($pakai_slide) {
    ?>
        <header>
            <!-- html dimulai -->
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php $no = 0;
                    foreach ($slide as $data) { ?>
                        <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $no ?>"></li>
                    <?php $no++;
                    } ?>
                </ol>
                <div class="carousel-inner">
                    <?php
                    $no = 0;
                    foreach ($slide as $data2) {
                        // masuk logika if, untuk menentukan item yang aktif 
                        if ($no == 0) {
                    ?>
                            <div class="carousel-item active" style="<?php echo "background-image: url('" . base_url('assets/upload/slider/' . $data2->image) . "');" ?>">
                                <div class="carousel-caption d-none d-md-block">
                                    <h2 class="h2caption" style="color: white;"><?php echo $data2->name ?></h2>
                                    <p class="lead"><?php echo $data2->description ?></p>
                                </div>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="carousel-item" style="<?php echo "background-image: url('" . base_url('assets/upload/slider/' . $data2->image) . "');" ?>">
                                <div class="carousel-caption d-none d-md-block">
                                    <h2 class="h2caption" style="color: white;"><?php echo $data2->name ?></h2>
                                    <p class="lead"><?php echo $data2->description ?></p>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <!-- end of logika if -->
                    <?php $no++;
                    } ?>
                    <!-- end foreach -->
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Sebelumnya</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Selanjutnya</span>
                </a>
            </div>
            <!-- html selesai -->
        </header>
    <?php
    } ?>