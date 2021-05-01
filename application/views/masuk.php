<?php // $site = $this->konfigurasi_model->listing(); 
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="<?php echo base_url('back_assets/img/' . $site['icon']) ?>" type="image/x-icon">
    <title>Akses ke Sistem</title>
    <!-- CCS utama -->
    <link href="<?php echo base_url('back_assets/css/styles_sbadmin.css') ?>" rel="stylesheet">
    <!-- Script -->
    <script src="<?php echo base_url('back_assets/js/jquery-3.5.1.min.js') ?>"></script>
    <script src="<?php echo base_url('back_assets/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?php echo base_url('back_assets/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?php echo base_url('back_assets/js/dataTables.bootstrap4.min.js') ?>"></script>
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

<body style="background-color: #f5f5f5; user-select:none; -moz-user-select:none; -ms-user-select:none; -khtml-user-select:none; -webkit-user-select:none;">
    <div class="container">
        <div class="mt-5">
            <div class="row">
                <div class="col-12 col-md-6 text-center mt-3 mx-auto p-3">
                    <img src="<?php echo base_url('back_assets/img/' . $site['icon']) ?>" width="35%" class="mb-4" />
                    <br>
                    <h1 class="h2" style="font-size: 28px;">Sistem PKK Desa Uma Beringin</h1>
                    <p class="lead">Masuk untuk mendapat akses ke sistem.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-5 mx-auto mt-6">
                    <?php $this->load->view("back/8flash") ?>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-5 mx-auto mt-6">
                    <form action="<?php echo base_url('index.php/auth/login'); ?>" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" placeholder="Email / Username" required autofocus />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" required />
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-between">
                                <div class="custom-control custom-checkbox">
                                </div>
                                <a href="https://wa.link/5om5kr" target="_blank">Bantuan Akses?</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary w-100" value="Masuk" />
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mx-auto mt-3 mb-3">
                    <span>
                        <p style="vertical-align: middle;" class="text-muted text-center">Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> - <?= $site['namaweb'] . $site['tagline']; ?>. All rights reserved.
                        </p>
                    </span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>