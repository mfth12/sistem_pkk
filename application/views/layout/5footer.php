  <!-- Testimonials -->
  <section class="testimonials text-center bg-light">
    <div class="container">
      <h2 class="mb-5">Pengurus <?php echo $site['namaweb']." ".$site['tagline']?></h2>
      <div class="row">
      <?php 
          foreach($struktur as $data4) { ?> 

            <div class="col-lg-4 mb-4">
              <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                <img class="img-fluid img-responsive rounded-circle mb-3" src="<?php echo base_url('assets/upload/pengurus/'.$data4->image)?>" alt="">
                <h5><?php echo $data4->name?></h5>
                <p class="font-weight-light mb-0"><?php echo $data4->description?></p>
              </div>
            </div>

        <?php } ?>
        <!-- end foreach -->
      </div>
    </div>
  </section>
  
<!-- Footer -->
<footer class="page-footer font-small unique-color-dark">
  <!-- Footer Links -->
  <div class="container text-center text-md-left mt-5">
    <!-- Grid row -->
    <div class="row mt-3">
      <!-- Grid column -->
      <div class="col-md-3 col-lg-6 col-xl-3 mx-auto mb-4">
        <div> 
        <img class="mb-3" src="<?php echo base_url('assets/upload/image/'.$site['logo']) ?>" alt="" width="32" height="32">
        
        <h6 class="text-uppercase font-weight-bold"><?php echo $site['namaweb']." ".$site['tagline']?></h6>
        </div>
        <p><?php echo $site['tentang']?></p>
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Sub-Kegiatan</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        
          <?php $footer_berita	= $this->site_model->nav_berita();?>
        <?php foreach($footer_berita as $nav_berita) { ?>
        <p>
          <a href="<?php echo site_url('kegiatan/kategori/'.$nav_berita->slug_kategori_berita) ?>">
          <?php echo $nav_berita->nama_kategori_berita ?>
          </a>
        </p>
        <?php } ?> 
        
      </div>
      <!-- Grid column -->
      <!-- Grid column -->
      <!-- <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
        <h6 class="text-uppercase font-weight-bold">Useful links</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a href="#!">Your Account</a>
        </p>
        <p>
          <a href="#!">Become an Affiliate</a>
        </p>
        <p>
          <a href="#!">Shipping Rates</a>
        </p>
        <p>
          <a href="#!">Help</a>
        </p>
      </div> -->
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Kontak</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <i class="fas fa-home mr-3"></i><?php echo nl2br ($site['alamat'])?></p>
        <p>
          <i class="fas fa-envelope mr-3"></i><a href="mailto:<?php echo $site['email']?>"><?php echo $site['email']?></a></p>
        <p>
          <i class="fas fa-phone mr-3"></i><?php echo $site['telepon']?></p>
        <p>
          <i class="fas fa-print mr-3"></i><?php echo $site['fax']?></p>
      </div>
      <!-- Grid column -->
    </div>
    <!-- Grid row -->
  </div>
  <!-- Footer Links -->
<hr class="mb-3">
<!-- Social buttons -->
<ul class="list-unstyled list-inline text-center">
  <li class="list-inline-item">
    <a class="btn-floating btn-fb mx-1" href="<?php echo $site['facebook']?>" target="_blank">
      <i class="fab fa-facebook-f"> </i>
    </a>
  </li>

  <li class="list-inline-item">
    <a class="btn-floating btn-tw mx-1" href="<?php echo $site['twitter']?>" target="_blank">
      <i class="fab fa-twitter"> </i>
    </a>
  </li>
  
   <li class="list-inline-item">
    <a class="btn-floating btn-gplus mx-1" href="<?php echo $site['instagram']?>" target="_blank">
      <i class="fab fa-instagram"> </i>
    </a>
  </li>
  <!--<li class="list-inline-item">
    <a class="btn-floating btn-li mx-1">
      <i class="fab fa-linkedin-in"> </i>
    </a>
  </li>
  <li class="list-inline-item">
    <a class="btn-floating btn-dribbble mx-1">
      <i class="fab fa-dribbble"> </i>
    </a>
  </li> -->
</ul>
<!-- Social buttons -->

<!-- Copyright -->
<div class="footer-copyright text-center py-3 mb-3">&copy; Copyright 2020 - 
  <a href=""><?php echo $site['namaweb']." ".$site['tagline']?></a>
</div>
  <br>
<!-- Copyright -->
</footer>
<!-- Footer -->

  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url() ?>assets/front_you/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/front_you/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
    // add padding top to show content behind navbar
  $('body').css('padding-top', $('.navbar').outerHeight() + 'px')
          
  // detect scroll top or down
  if ($('.smart-scroll').length > 0) { // check if element exists
      var last_scroll_top = 0;
      $(window).on('scroll', function() {
          scroll_top = $(this).scrollTop();
          if(scroll_top < last_scroll_top) {
              $('.smart-scroll').removeClass('scrolled-down').addClass('scrolled-up');
          }
          else {
              $('.smart-scroll').removeClass('scrolled-up').addClass('scrolled-down');
          }
          last_scroll_top = scroll_top;
      });
  }
  </script>
  <script>
  $(function() {
    $('body').removeClass('fade-out');
  });
  </script>
</body>

</html>
