<section class="employee-area mt-3 section-padding2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-top text-center">
                    <h2>Berita <?= $title; ?></h2>
                    <p>Berita <?= $title . ' terbaru ' . $site['namaweb'] . ' ' . $site['tagline']; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Start blog-posts Area -->
<section class="blog-posts-area section-padding3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 post-list blog-post-list">
                <!-- post -->
                <?php foreach ($berita as $berita) { ?>
                    <div class="single-post">
                        <a href="<?php echo site_url('berita/read/' . $berita->slug_berita) ?>">
                            <div class="img-fluid" style="border: 1px solid #eee; width: 100%; height: 45vh; 
                            background: no-repeat center center scroll; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; 
                            <?php echo "background-image: url('" . base_url('back_assets/upload/image/' . $berita->gambar) . "');" ?>" src="" alt="">
                            </div>
                        </a>

                        <ul class="tags" style="margin-top: 20px;">
                            <li>
                                <h5><i class="fa fa-calendar-o"></i> <?php echo date('d M Y', strtotime($berita->tanggal_post)) ?></h5>
                            </li>
                            <li class="separator mx-2"><span></span></li>
                            <li>
                                <h5><i class="fa fa-folder-open-o"></i> Pokja PKK</h5>
                            </li>
                        </ul>
                        <a href="<?php echo site_url('berita/read/' . $berita->slug_berita) ?>">
                            <h2>
                                <?php echo $berita->nama_berita ?>
                            </h2>
                        </a>
                        <p>
                            <?php //echo substr($berita->keterangan, 0, 225) 
                            ?>
                        </p>
                        <div class="bottom-meta">
                            <div class="user-details row align-items-center">
                                <div class="comment-wrap col-lg-6">
                                    <ul>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!-- end post -->
                <div class="row d-flex justify-content-center mb-4">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <?php echo $this->pagination->create_links(); ?>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="col-lg-4 sidebar">
                <div class="single-widget search-widget">
                    <form class="example" action="#" style="margin:auto;max-width:300px">
                        <input type="text" placeholder="Search Posts" name="search2" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'" required>
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <?php $this->load->view('front/4widget.php'); ?>
            </div>
        </div>
    </div>
</section>
<!-- End blog-posts Area -->