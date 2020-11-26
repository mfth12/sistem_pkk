<?php
$site = $this->konfigurasi_model->listing();
$nav_produk  = $this->site_model->nav_produk();
$nav_berita  = $this->site_model->nav_berita();
$nav_profil  = $this->site_model->nav_profil();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="keywords" content="<?php echo $keywords ?>" />
  <meta name="author" content="">

  <title><?php echo $title ?></title>

  <link href="<?php echo base_url('assets/upload/image/' . $site['icon']) ?>" rel="shortcut icon">
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('assets/front_you/vendor/bootstrap/css/bootstrap.min.css') ?>" type="text/css" rel="stylesheet" media="all">
  <link href="<?php echo base_url('assets/front_you/css/dropdown_nav.css') ?>" type="text/css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="<?php echo base_url('assets/front_you/vendor/fontawesome-free/css/all.min.css') ?>" type="text/css" rel="stylesheet">
  <link href="<?php echo base_url('assets/front_you/vendor/simple-line-icons/css/simple-line-icons.css') ?>" type="text/css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url('assets/front_you/css/landing-page.min.css') ?>" rel="stylesheet">
  <style>
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
      background-color: white;
    }
  </style>

</head>