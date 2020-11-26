  <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="<?php echo "background-image: url('".base_url('assets/upload/image/'.$read->gambar)."');"?>">
          <div class="carousel-caption d-none d-md-block">
            <!-- <h3 class="display-4"><?php echo $title ?></h3> -->
            <!-- <p class="lead">Kantor Desa Uma Beringin.</p> -->
          </div>
        </div>
    </div>
  </header>	<!--about-->


<!-- Testimonials -->
  <section class="mb-4">
	  <h2> 

	  </h2>
  </section>
  <section class="text-center bg-light mb-4">
    <div class="container">
      <h2><?php echo $title ?></h2>
      </div>
    </div>
  </section>

	<div class="about mb-4"> 
		<div class="container">
			<!-- <h3 class="title"><?php echo $title ?></h3> -->
			<div class="about-text">
				<!-- <div class="col-md-6 about-text-left">
					<img src="<?php echo base_url('assets/upload/image/'.$read->gambar) ?>" class="img-responsive" alt="<?php echo $title ?>"/>
				</div> -->
				<div class="col-md-12 about-text-right">                    
					<?php echo $read->keterangan ?>

				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>