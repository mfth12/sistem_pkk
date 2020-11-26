  <!-- Masthead -->
  <!-- <header class="masthead text-white text-center"> -->
  <header>
    
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <?php $no=0; foreach($slide as $data) { ?>
          <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $no?>"></li>
          <?php $no++; } ?>
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <?php 
          $no=0;
          foreach($slide as $data2) { 
          // masuk logika if, untuk menentukan item yang aktif 
          if($no==0){
            ?> 
            <div class="carousel-item active" style="<?php echo "background-image: url('".base_url('assets/upload/slider/'.$data2->image)."');" ?>">
              <div class="carousel-caption d-none d-md-block">
                <h3 class="display-4"><?php echo $data2->name?></h3>
                <p class="lead"><?php echo $data2->description?></p>
              </div>
            </div> 
            <?php
          } else {
            ?> 
            <div class="carousel-item" style="<?php echo "background-image: url('".base_url('assets/upload/slider/'.$data2->image)."');" ?>">
              <div class="carousel-caption d-none d-md-block">
                <h3 class="display-4"><?php echo $data2->name?></h3>
                <p class="lead"><?php echo $data2->description?></p>
              </div>
            </div> 
            <?php
          }
        ?>
        <!-- end of logika if -->
        <?php $no++; } ?>
        <!-- end foreach -->
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Sebelumnya</span>
          </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Selanjutnya</span>
          </a>
    </div>
</header>