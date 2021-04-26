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
    <link href="<?php echo base_url('front_assets/css/bootstrap-4.1.3.min.css') ?>" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url('front_assets/css/owl-carousel.min.css') ?>" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url('front_assets/css/nice-select.css') ?>" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url('front_assets/css/style.css') ?>" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url('front_assets/css/dropdown.css') ?>" type="text/css" rel="stylesheet">
    <!-- Tutup CSS -->
</head>

<body>
    <!-- Starts animated loading -->
    <div class="preloader">
        <div class="spinner"></div>
    </div>
    <!-- Ends animated loading -->
    <!-- <script>
        document.body.className += 'fade-out';
    </script> -->
    <!-- Navigation -->
    <header class="header-area main-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="logo-area">
                        <a href="index.html"><img src="front_assets/images/logo.png" alt="logo"></a>
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
                            <li class="active"><a href="index.html">home</a></li>
                            <li><a href="about.html">about us</a></li>
                            <li><a href="job-category.html">category</a></li>
                            <li><a href="#">blog</a>
                                <ul class="sub-menu">
                                    <li><a href="blog-home.html">Blog Home</a></li>
                                    <li><a href="blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="contact-us.html">contact</a></li>
                            <li><a href="#">pages</a>
                                <ul class="sub-menu">
                                    <li><a href="job-search.html">Job Search</a></li>
                                    <li><a href="job-single.html">Job Single</a></li>
                                    <li><a href="pricing-plan.html">Pricing Plan</a></li>
                                    <li><a href="elements.html">Elements</a></li>
                                </ul>
                            </li>
                            <li class="menu-btn">
                                <!-- <a href="#" class="login">log in</a> -->
                                <a href="#" class="template-btn">Masuk</a>
                            </li>
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



    <!-- Starts header -->
    <!-- <header class="header-area main-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo-area">
                        <a href="index.html"><img src="front_assets/images/logo.png" alt="logo"></a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="custom-navbar">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="main-menu">
                        <ul>
                            <li class="active"><a href="index.html">home</a></li>
                            <li><a href="about.html">about us</a></li>
                            <li><a href="job-category.html">category</a></li>
                            <li><a href="#">blog</a>
                                <ul class="sub-menu">
                                    <li><a href="blog-home.html">Blog Home</a></li>
                                    <li><a href="blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="contact-us.html">contact</a></li>
                            <li><a href="#">pages</a>
                                <ul class="sub-menu">
                                    <li><a href="job-search.html">Job Search</a></li>
                                    <li><a href="job-single.html">Job Single</a></li>
                                    <li><a href="pricing-plan.html">Pricing Plan</a></li>
                                    <li><a href="elements.html">Elements</a></li>
                                </ul>
                            </li>
                            <li class="menu-btn">
                                <a href="#" class="login">log in</a>
                                <a href="#" class="template-btn">sign up</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header> -->
    <!-- Ends header -->