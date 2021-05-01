<!-- News Area Starts -->
<section id="berita" class="news-area section-padding3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-top text-center">
                    <h2><?php echo $site['welcome_say'] ?></h2>
                    <p><?php echo $site['deskripsi_say'] ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($berita as $berita) { ?>
                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="single-news mb-5 mb-lg-0">
                        <div class="news-img" style="<?php echo "background-image: url('" . base_url('assets/upload/image/' . $berita->gambar) . "');" ?>"></div>
                        <div class="news-tag">
                            <ul class="my-3">
                                <li>
                                    <h5><i class="fa fa-calendar-o"></i> <?php echo date('d M Y', strtotime($berita->tanggal_post)) ?></h5>
                                </li>
                                <li class="separator mx-2"><span></span></li>
                                <li>
                                    <h5><i class="fa fa-folder-open-o"></i> Pokja PKK</h5>
                                </li>
                            </ul>
                        </div>
                        <div class="news-title">
                            <h4><a href="<?php echo site_url('kegiatan/read/' . $berita->slug_berita) ?>"><?php echo $berita->nama_berita ?></a></h4>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- end -->
        </div>
    </div>
</section>
<!-- News Area End -->
