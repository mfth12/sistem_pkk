<body>

  <script>
    document.body.className += 'fade-out';
  </script>
  <!-- Navigation -->
  <nav class="navbar smart-scroll navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="<?php echo base_url() ?>">
        <img height="50" src="<?php echo base_url('assets/upload/image/kkn1.png') ?>" alt="">
        <img width="50" height="50" src="<?php echo base_url('assets/upload/image/' . $site['logo']) ?>" alt="">
      </a>
      <a class="navbar-brand" href="<?php echo base_url() ?>"><strong><?php echo $title . " " ?></strong></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Kegiatan
            </a>
            <!-- Here's the magic. Add the .animate and .slide-in classes to your .dropdown-menu and you're all set! -->
            <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
              <?php foreach ($nav_berita as $nav_berita) { ?>
                <a class="dropdown-item" href="<?php echo site_url('kegiatan/kategori/' . $nav_berita->slug_kategori_berita) ?>">
                  <?php echo $nav_berita->nama_kategori_berita ?>
                </a>
              <?php } ?>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Profil
            </a>
            <!-- Here's the magic. Add the .animate and .slide-in classes to your .dropdown-menu and you're all set! -->
            <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
              <?php foreach ($nav_profil as $nav_profil) { ?>
                <a class="dropdown-item" href="<?php echo site_url('kegiatan/read/' . $nav_profil->slug_berita) ?>">
                  <?php echo $nav_profil->nama_berita ?>
                </a>
              <?php } ?>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('pengurus') ?>">Pengurus PKK</a>
          </li>



          <!-- end drop down -->
        </ul>

      </div>
    </div>
  </nav>