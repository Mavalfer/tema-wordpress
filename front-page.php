<?php get_header(); ?>

    
    <!-- Navigation -->
    <?php get_template_part('nav'); ?>

    <div class="container">

      <div class="bg-faded p-4 my-4">
        <!-- Image Carousel -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid w-100" src="<?php echo get_template_directory_uri();?>/img/slide-1.jpg" alt="">
              <div class="carousel-caption d-none d-md-block">
                <h3 class="text-shadow">First Slide</h3>
                <p class="text-shadow">This is the caption for the first slide.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid w-100" src="<?php echo get_template_directory_uri();?>/img/slide-2.jpg" alt="">
              <div class="carousel-caption d-none d-md-block">
                <h3 class="text-shadow">Second Slide</h3>
                <p class="text-shadow">This is the caption for the second slide.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid w-100" src="<?php echo get_template_directory_uri();?>/img/slide-3.jpg" alt="">
              <div class="carousel-caption d-none d-md-block">
                <h3 class="text-shadow">Third Slide</h3>
                <p class="text-shadow">This is the caption for the third slide.</p>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <!-- Welcome Message -->
        <div class="text-center mt-4">
          <div class="text-heading text-muted text-lg">Welcome To</div>
          <h1 class="my-2">Front Page</h1>
          <div class="text-heading text-muted text-lg">By
            <strong>Business Casual</strong>
          </div>
        </div>
      </div>

      <div class="bg-faded p-4 my-4">
        <hr class="divider">
        <h2 class="text-center text-lg text-uppercase my-0">Build a website
          <strong>worth visitng</strong>
        </h2>
        <hr class="divider">
        <img class="img-fluid float-left mr-4 d-none d-lg-block" src="<?php echo get_template_directory_uri();?>/img/intro-pic.jpg" alt="">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam soluta dolore voluptatem, deleniti dignissimos excepturi veritatis cum hic sunt perferendis ipsum perspiciatis nam officiis sequi atque enim ut! Velit, consectetur.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam pariatur perspiciatis reprehenderit illo et vitae iste provident debitis quos corporis saepe deserunt ad, officia, minima natus molestias assumenda nisi velit?</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit totam libero expedita magni est delectus pariatur aut, aperiam eveniet velit cum possimus, autem voluptas. Eum qui ut quasi voluptate blanditiis?</p>
      </div>

      <div class="bg-faded p-4 my-4">
        <hr class="divider">
        <h2 class="text-center text-lg text-uppercase my-0">Beautiful boxes to
          <strong>showcase your content</strong>
        </h2>
        <hr class="divider">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam soluta dolore voluptatem, deleniti dignissimos excepturi veritatis cum hic sunt perferendis ipsum perspiciatis nam officiis sequi atque enim ut! Velit, consectetur.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam pariatur perspiciatis reprehenderit illo et vitae iste provident debitis quos corporis saepe deserunt ad, officia, minima natus molestias assumenda nisi velit?</p>
      </div>
      
       <!-- About Section -->
    <section class="bg-faded mb-0" id="about">
      <div class="container">
        <h2 class="text-center text-uppercase">Ultimos Post</h2>
        <hr class="star-light mb-5">
        <div class="row">
          <?php
            $args = array(
              'posts_per_page' => 3
              );
            $query = new WP_Query($args);
            if($query->have_posts()):while($query->have_posts()):$query->the_post();
          ?>
          <div class="col-lg-4 ml-auto">
             <?php
             if(has_post_thumbnail()){
                 $postImg = get_the_post_thumbnail_url();
             }else{
                  $postImg = get_template_directory_uri() . '/img/default.png';
             }
              ?>
                <img src="<?php echo $postImg; ?>" class="img-fluid"></img>
              <?php
                echo '<br>';
              ?>
                <a href="<?php the_permalink(); ?>" class="linkPost"><?php the_title();?></a>
                <?php
                echo '<br> Date: '; the_time('j-m-Y');
                $new_defaults = array('extra_attr' => 'style="margin:5px"');
                echo '<br> Autor: '; echo get_avatar(get_the_author_meta('ID'), 32, get_template_directory_uri() . '/img/default.png', 'Avatar', $new_defaults); the_author();
                echo '<hr>';
                the_excerpt();
             ?>
          </div>
          <?php
            endwhile;endif;
            wp_reset_query();
          ?>
        </div>
        <div class="text-center mt-4">
          <a class="btn btn-xl btn-outline-light" href="#">
            <i class="fa fa-download mr-2"></i>
            Download Now!
          </a>
        </div>
      </div>
    </section>

    </div>
    <!-- /.container -->

<?php get_footer(); ?>
