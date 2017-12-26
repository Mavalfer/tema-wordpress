<?php get_header(); ?>

<!-- Navigation -->
<?php get_template_part('nav'); ?>

<div class="row">
  <div class="container">
    
  </div>
</div>

<div class="row">
  <div class="container">
    <div class="row">
      <div class="bg-faded col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <?php
        $args = array(
          'posts_per_page' => 1
          );
        $query = new WP_Query($args);
        if($query->have_posts()):while($query->have_posts()):$query->the_post();
        $dest_id = $post->ID;
        echo '<h1>' . the_title() . '</h1>';
        echo $dest_id;
      ?>
        
      <?php
        endwhile;endif;
        wp_reset_query();
      ?>
      </div>
      <!--<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">-->
      <!--    <?php //get_sidebar(); ?>-->
      <!--</div>-->
    </div>
    
    <br>
    
    <div class="row">
      <div class="bg-faded col-lg-8 col-md-8 col-sm-12 col-xs-12">
      <?php
        $args = array(
          'posts_per_page' => 10,
          'post__not__in' => array($dest_id)
          );
        $query = new WP_Query($args);
        if($query->have_posts()):while($query->have_posts()):$query->the_post();
        echo '<h1>' . the_title() . '</h1>';
        echo $dest_id;
      ?>
        
      <?php
        endwhile;endif;
        wp_reset_query();
      ?>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <?php get_sidebar(); ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>