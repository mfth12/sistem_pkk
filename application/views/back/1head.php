<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="n1codes" />
    <title><?php echo $title?></title>
    <link rel="shortcut icon" href="<?php echo base_url('back_assets/img/' . $site['icon']) ?>" type="image/x-icon">
    <!-- css -->
    <link href="<?php echo base_url('back_assets/css/dataTables.bootstrap4.min.css') ?>" rel="stylesheet" crossorigin="anonymous" />
    <link href="<?php echo base_url('back_assets/css/styles_sbadmin.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('back_assets/css/dropdown_nav.css') ?>" type="text/css" rel="stylesheet">
    <style>
        * {
            transition: all 0.5s;
        }

        .blur-ios-black {
            -webkit-backdrop-filter: saturate(180%) blur(20px);
            backdrop-filter: saturate(180%) blur(15px);
            background: rgba(0, 0, 0, 0.8);
        }
    </style>
</head>