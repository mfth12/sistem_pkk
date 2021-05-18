<!-- Start blog-posts Area -->
<section class="blog-posts-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 post-list blog-post-list">
                <!-- post -->
                <?php foreach ($berita as $berita) { ?>
                    <div class="single-post">
                        <div class="img-fluid" style="width: 100%; height: 45vh; 
                        background: no-repeat center center scroll; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; 
                        <?php echo "background-image: url('" . base_url('back_assets/upload/image/' . $berita->gambar) . "');" ?>" src="" alt=""></div>
                        <ul class="tags">
                            <li><a href="#">Art, </a></li>
                            <li><a href="#">Technology, </a></li>
                            <li><a href="#">Fashion</a></li>
                        </ul>
                        <a href="<?php echo site_url('berita/read/'.$berita->slug_berita) ?>">
                            <h2>
                                <?php echo $berita->nama_berita ?>
                            </h2>
                        </a>
                        <p>
                            <?php echo substr($berita->keterangan, 0, 225) ?>
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

            </div>
            <div class="col-lg-4 sidebar">
                <div class="single-widget search-widget">
                    <form class="example" action="#" style="margin:auto;max-width:300px">
                        <input type="text" placeholder="Search Posts" name="search2" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'" required>
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>

                <div class="single-widget category-widget">
                    <h4 class="title">Post Categories</h4>
                    <ul>
                        <li><a href="#" class="justify-content-between align-items-center d-flex">
                                <h6>Techlology</h6> <span>37</span>
                            </a></li>
                        <li><a href="#" class="justify-content-between align-items-center d-flex">
                                <h6>Lifestyle</h6> <span>24</span>
                            </a></li>
                        <li><a href="#" class="justify-content-between align-items-center d-flex">
                                <h6>Fashion</h6> <span>59</span>
                            </a></li>
                        <li><a href="#" class="justify-content-between align-items-center d-flex">
                                <h6>Art</h6> <span>29</span>
                            </a></li>
                        <li><a href="#" class="justify-content-between align-items-center d-flex">
                                <h6>Food</h6> <span>15</span>
                            </a></li>
                        <li><a href="#" class="justify-content-between align-items-center d-flex">
                                <h6>Architecture</h6> <span>09</span>
                            </a></li>
                        <li><a href="#" class="justify-content-between align-items-center d-flex">
                                <h6>Adventure</h6> <span>44</span>
                            </a></li>
                    </ul>
                </div>

                <div class="single-widget recent-posts-widget">
                    <h4 class="title">Recent Posts</h4>
                    <div class="blog-list ">
                        <div class="single-recent-post d-flex flex-row">
                            <div class="recent-thumb">
                                <img class="img-fluid" src="front_assets/images/r1.jpg" alt="">
                            </div>
                            <div class="recent-details">
                                <a href="blog-single.html">
                                    <h4>
                                        Home Audio Recording
                                        For Everyone
                                    </h4>
                                </a>
                                <p>
                                    02 hours ago
                                </p>
                            </div>
                        </div>
                        <div class="single-recent-post d-flex flex-row">
                            <div class="recent-thumb">
                                <img class="img-fluid" src="front_assets/images/r2.jpg" alt="">
                            </div>
                            <div class="recent-details">
                                <a href="blog-single.html">
                                    <h4>
                                        Home Audio Recording
                                        For Everyone
                                    </h4>
                                </a>
                                <p>
                                    02 hours ago
                                </p>
                            </div>
                        </div>
                        <div class="single-recent-post d-flex flex-row">
                            <div class="recent-thumb">
                                <img class="img-fluid" src="front_assets/images/r3.jpg" alt="">
                            </div>
                            <div class="recent-details">
                                <a href="blog-single.html">
                                    <h4>
                                        Home Audio Recording
                                        For Everyone
                                    </h4>
                                </a>
                                <p>
                                    02 hours ago
                                </p>
                            </div>
                        </div>
                        <div class="single-recent-post d-flex flex-row">
                            <div class="recent-thumb">
                                <img class="img-fluid" src="front_assets/images/r4.jpg" alt="">
                            </div>
                            <div class="recent-details">
                                <a href="blog-single.html">
                                    <h4>
                                        Home Audio Recording
                                        For Everyone
                                    </h4>
                                </a>
                                <p>
                                    02 hours ago
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="single-widget category-widget">
                    <h4 class="title">Post Archive</h4>
                    <ul>
                        <li><a href="#" class="justify-content-between align-items-center d-flex">
                                <h6>Dec '17</h6> <span>37</span>
                            </a></li>
                        <li><a href="#" class="justify-content-between align-items-center d-flex">
                                <h6>Nov '17</h6> <span>24</span>
                            </a></li>
                        <li><a href="#" class="justify-content-between align-items-center d-flex">
                                <h6>Oct '17</h6> <span>59</span>
                            </a></li>
                        <li><a href="#" class="justify-content-between align-items-center d-flex">
                                <h6>Sep '17</h6> <span>29</span>
                            </a></li>
                        <li><a href="#" class="justify-content-between align-items-center d-flex">
                                <h6>Aug '17</h6> <span>15</span>
                            </a></li>
                        <li><a href="#" class="justify-content-between align-items-center d-flex">
                                <h6>Jul '17</h6> <span>09</span>
                            </a></li>
                        <li><a href="#" class="justify-content-between align-items-center d-flex">
                                <h6>Jun '17</h6> <span>44</span>
                            </a></li>
                    </ul>
                </div>

                <!-- akhir widget -->
            </div>
        </div>
    </div>
</section>
<!-- End blog-posts Area -->