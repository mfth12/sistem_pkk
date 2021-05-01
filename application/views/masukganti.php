<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Akses ke Sistem</title>
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
    <!-- styled -->
    <style type="text/css">
        * {
            transition: all 0.6s;
        }

        body {
			color: #888;
            width: 100%;
			margin: 0;
            user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            -khtml-user-select: none;
            -webkit-user-select: none;
        }

        #main {
            display: table;
            width: 100%;
            height: 100vh;
            text-align: center;
        }

        .fof {
            display: table-cell;
            vertical-align: middle;
        }

        .fof h1 {
            font-size: 36px;
            display: inline-block;
            padding-right: 12px;
        }
        
        .klip {
            animation: type .4s alternate infinite;
        }

        @keyframes type {
            from {
                box-shadow: inset -3px 0px 0px #888;
            }

            to {
                box-shadow: inset -3px 0px 0px transparent;
            }
        }
    </style>
</head>

<body>
    <div id="main">
        <div class="container fof">
            <div class="col-12 col-md-5 mx-auto">
                <div class="mb-4">
                    <img src="<?php echo base_url('front_assets/upload/' . $site['icon']) ?>" width="30%" />
                </div>
                <h1 style="color: #888; text-transform: none;">Masuk ke Sistem PKK</h1>
                <p class="lead">Silakan masuk untuk mendapat akses.</p>
                <form action="<?php echo base_url('index.php/auth/login'); ?>" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Username" required autofocus />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password" required />
                    </div>
                    <div class="form-group">
                        <div class="d-flex justify-content-between"><span></span>
                            <a href="https://wa.link/5om5kr" target="_blank">Bantuan Akses?</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary w-100" value="Masuk" />
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>