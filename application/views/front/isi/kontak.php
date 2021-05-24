<!-- Start blog-posts Area -->
<section class="blog-posts-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 post-list blog-post-list">
                <!-- post -->
                <?php //foreach ($berita as $berita) { 
                ?>
                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="single-news mb-5 mb-lg-0">
                        <div class="news-img" style="<?php //echo "background-image: url('" . base_url('assets/upload/image/' . $berita->gambar) . "');" 
                                                        ?>"></div>
                        <div class="news-tag">
                            <ul class="my-3">
                                <li>
                                    <h5><i class="fa fa-calendar-o"></i> <?php //echo date('d M Y', strtotime($berita->tanggal_post)) 
                                                                            ?></h5>
                                </li>
                                <li class="separator mx-2"><span></span></li>
                                <li>
                                    <h5><i class="fa fa-folder-open-o"></i> Pokja PKK</h5>
                                </li>
                            </ul>
                        </div>
                        <div class="news-title">
                            <h4><a href="<?php //echo site_url('kegiatan/read/' . $berita->slug_berita) 
                                            ?>"><?php //echo $berita->nama_berita
                                                                                                            ?></a></h4>
                        </div>
                    </div>
                </div>
                <?php // } 
                ?>
                <!-- end post -->
            </div>

            <div class="col-lg-4 sidebar">
                <div class="single-widget search-widget">
                    <form class="example" action="#" style="margin:auto;max-width:300px">
                        <input type="text" placeholder="Search Posts" name="search2" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'" required>
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>

                <div class="single-widget category-widget">
                    <h4 class="title">Kategori Berita</h4>
                    <?php $footer_berita  = $this->site_model->nav_berita(); ?>
                    <?php foreach ($footer_berita as $nav_berita) { ?>
                        <!-- Kategori -->
                        <ul>
                            <li>
                                <a href="<?php echo site_url('berita/kategori/' . $nav_berita->slug_kategori_berita) ?>" class="justify-content-between align-items-center d-flex">
                                    <h6><?php echo $nav_berita->nama_kategori_berita ?></h6> <span>94</span>
                                </a>
                            </li>
                        <?php } ?>
                        </ul>
                </div>
                <!-- Kategori end -->
            </div>
        </div>
    </div>
</section>
<!-- End blog-posts Area -->

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
            <?php //foreach ($berita as $berita) { 
            ?>
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="single-news mb-5 mb-lg-0">
                    <div class="news-img" style="<?php //echo "background-image: url('" . base_url('assets/upload/image/' . $berita->gambar) . "');" 
                                                    ?>"></div>
                    <div class="news-tag">
                        <ul class="my-3">
                            <li>
                                <h5><i class="fa fa-calendar-o"></i> <?php //echo date('d M Y', strtotime($berita->tanggal_post)) 
                                                                        ?></h5>
                            </li>
                            <li class="separator mx-2"><span></span></li>
                            <li>
                                <h5><i class="fa fa-folder-open-o"></i> Pokja PKK</h5>
                            </li>
                        </ul>
                    </div>
                    <div class="news-title">
                        <h4><a href="<?php //echo site_url('kegiatan/read/' . $berita->slug_berita) 
                                        ?>"><?php //echo $berita->nama_berita 
                                                                                                        ?></a></h4>
                    </div>
                </div>
            </div>
            <?php // } 
            ?>
            <!-- end -->
        </div>
    </div>
</section>
<!-- News Area End -->