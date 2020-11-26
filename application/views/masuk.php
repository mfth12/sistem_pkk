<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link href="<?php echo base_url('assets/upload/image/'.$site['icon']) ?>" rel="shortcut icon" />
    <title>Akses ke Sistem</title>

    <!-- CCS utama -->
	<link href="<?php echo base_url('assets/css/styles_sbadmin.css') ?>" rel="stylesheet">

</head>

<body style="background-color: #f5f5f5; 
    user-select:none;
    -moz-user-select:none;
    -ms-user-select:none;
    -khtml-user-select:none;
    -webkit-user-select:none;">

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 text-center mt-5 mx-auto p-3">
            <img src="<?php echo base_url('assets/upload/image/'.$site['logo'])?>" width="128" />
                <br>
                <h1 class="h2">Sistem PKK Desa Uma Beringin</h1>
                <p class="lead">Masuk untuk mendapat akses ke sistem</p>
                <!-- <p class="lead">Version Dev. 1.2</p> -->
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-5 mx-auto mt-6">
                <?php $this->load->view("superadmin/_partials/8flash") ?>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-5 mx-auto mt-7">
            <!-- mulai masuk ke form login -->
                <form action="<?php echo base_url('index.php/auth/login'); ?>" method="POST"> 
                    <!-- aksi nya ini, mengarah ke halaman login(index.php) -->
                
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Username" required autofocus/>
                        <!-- <small for="nik">Contoh: (177723.02.03662.6)</small> -->
                    </div>
                    
          <!-- <small id="password_baru" class="form-text text-muted">Tuliskan password verifikasi baru anda.</small> -->
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password" required />
                    </div>
                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <div class="custom-control custom-checkbox">
                                <!-- <input type="checkbox" class="custom-control-input" name="rememberme" id="rememberme" />
                                <label class="custom-control-label" for="rememberme"> Ingat Saya</label> -->
                            </div>
                            <a href="https://wa.link/5om5kr" target="_blank">Bantuan Akses?</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary w-100" value="Masuk" />
                    </div>

                </form>
                <p class="mt-5 mb-3 text-muted text-center">Copyright &copy; Desa Uma Beringin - 2020</p>
            </div>
        </div>
    </div>
        
        <script src="<?php echo base_url('assets/jquery-3.5.1.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/bootstrap.bundle.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/Chart.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/jquery.dataTables.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/dataTables.bootstrap4.min.js') ?>"></script>
        <!--  -->
        <!--  -->
        <script src="<?php echo base_url('js/scripts.js') ?>"></script>
        <script src="<?php echo base_url('assets/demo/datatables-demo.js') ?>"></script>



</body>

</html>