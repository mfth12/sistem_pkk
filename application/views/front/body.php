<!-- isi -->
<?php if ($isi) {
    $this->load->view($isi);
} ?>
<!-- Langganan Area Starts -->
<section class="newsletter-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-top text-center">
                    <h2>Dapatkan informasi terbaru</h2>
                    <p>Berlangganan berita PKK Desa Uma Beringin</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form action="#">
                    <input type="email" placeholder="Email anda" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email anda'" required>
                    <button type="submit" class="template-btn">Langganan</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Footer Area Starts -->
<footer class="footer-area section-padding">
    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4">
                    <div class="single-widget-home mb-5 mb-lg-0">
                        <h3 class="mb-4">Berita</h3>
                        <ul>
                            <?php $footer_berita  = $this->site_model->nav_berita(); ?>
                            <?php foreach ($footer_berita as $nav_berita) { ?>
                                <li class="mb-2"><a href="<?php echo site_url('kegiatan/kategori/' . $nav_berita->slug_kategori_berita) ?>">
                                        <?php echo $nav_berita->nama_kategori_berita ?>
                                    </a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="single-widget-home mb-5 mb-lg-0">
                        <h3 class="mb-4">Galeri PKK</h3>
                        <ul>
                            <?php $footer_berita  = $this->site_model->nav_berita(); ?>
                            <?php foreach ($footer_berita as $nav_berita) { ?>
                                <li class="mb-2"><a href="<?php echo site_url('kegiatan/kategori/' . $nav_berita->slug_kategori_berita) ?>">
                                        <?php echo $nav_berita->nama_kategori_berita ?>
                                    </a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="single-widge-home">
                        <h3 class="mb-4">Kontak</h3>
                        <div class="feed">
                            <img src="<?php echo base_url('front_assets/images/feed1.jpg') ?>" alt="feed">
                            <img src="<?php echo base_url('front_assets/images/feed2.jpg') ?>" alt="feed">
                            <img src="<?php echo base_url('front_assets/images/feed3.jpg') ?>" alt="feed">
                            <img src="<?php echo base_url('front_assets/images/feed4.jpg') ?>" alt="feed">
                            <img src="<?php echo base_url('front_assets/images/feed5.jpg') ?>" alt="feed">
                            <img src="<?php echo base_url('front_assets/images/feed6.jpg') ?>" alt="feed">
                            <img src="<?php echo base_url('front_assets/images/feed7.jpg') ?>" alt="feed">
                            <img src="<?php echo base_url('front_assets/images/feed8.jpg') ?>" alt="feed">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <img class="mb-3" src="<?php echo base_url('back_assets/img/' . $site['icon']) ?>" alt="" width="32" height="32">
                    <h3 class="mb-3"><?php echo $site['namaweb'] . " " . $site['tagline'] ?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <span>
                        <?php echo $site['tentang'] ?>
                        <br>
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> <?php echo $site['namaweb'] . " " . $site['tagline'] ?>. All rights reserved.
                        Powered by <u><a href="https://wa.link/5om5kr" target="_blank"> m1codes</a></u>
                    </span>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="social-icons">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Javascript -->
<script src="<?php echo base_url('front_assets/js/vendor/jquery-2.2.4.min.js') ?>"></script>
<script src="<?php echo base_url('front_assets/js/vendor/bootstrap-4.1.3.min.js') ?>"></script>
<script src="<?php echo base_url('front_assets/js/vendor/wow.min.js') ?>"></script>
<script src="<?php echo base_url('front_assets/js/vendor/owl-carousel.min.js') ?>"></script>
<script src="<?php echo base_url('front_assets/js/vendor/jquery.nice-select.min.js') ?>"></script>
<script src="<?php echo base_url('front_assets/js/vendor/ion.rangeSlider.js') ?>"></script>
<script src="<?php echo base_url('front_assets/js/main.js') ?>"></script>
<script src="<?php echo base_url('front_assets/js/scroll.js') ?>"></script>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!-- Footer Area End -->
<script>
    // add padding top to show content behind navbar
    $('body').css('padding-top', $('.navbar').outerHeight() + 'px')

    // detect scroll top or down
    if ($('.smart-scroll').length > 0) { // check if element exists
        var last_scroll_top = 0;
        $(window).on('scroll', function() {
            scroll_top = $(this).scrollTop();
            if (scroll_top < last_scroll_top) {
                $('.smart-scroll').removeClass('scrolled-down').addClass('scrolled-up');
            } else {
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