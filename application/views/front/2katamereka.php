<!-- Sambutan Starts -->
<section id="sambutan" class="employee-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-top text-center">
                    <h2>Kata Mereka</h2>
                    <p>Tentang TP-PKK Desa Uma Beringin</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="employee-slider owl-carousel">
                    <?php foreach ($quotes as $qu) { 
                    ?>
                    <!-- start -->
                    <div class="single-slide d-sm-flex">
                        <div class="slide-img" style="<?php echo "background-image: url('" . base_url('back_assets/upload/quote/' . $qu->image) . "');" ?>">
                            <div class="hover-state">
                                <div class="hover-text text-center">
                                    <h3><?php echo $qu->name ?></h3>
                                    <h5><?php echo $qu->jabatan ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="slide-text align-self-center">
                            <i class="fa fa-quote-left"></i>
                            <p><h5><?php echo $qu->description ?></h5></p>
                        </div>
                    </div>

                    <?php } ?>
                    <!-- end -->

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Sambutan End -->