<!-- Start blog-posts Area -->
<section class="blog-posts-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 post-list blog-post-list">
                <!-- post -->
                    <div class="single-post">
                        <div class="img-fluid" style="border: 1px solid #eee; width: 100%; height: 45vh; 
                        background: no-repeat center center scroll; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; 
                        <?php echo "background-image: url('" . base_url('back_assets/upload/image/' . $read->gambar) . "');" ?>" src="" alt=""></div>
                        <ul class="tags">
                            <li><a href="#">Art, </a></li>
                            <li><a href="#">Technology, </a></li>
                            <li><a href="#">Fashion</a></li>
                        </ul>
                        <a>
                            <h2>
                                <?php echo $read->nama_berita ?>
                            </h2>
                        </a>
                        <p>
                            <?php echo $read->keterangan ?>
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