    <?php 
        
      get_header();

    ?>
    <!-- Navigation -->
    <?php get_template_part('nav'); ?>
    <div class="separador"></div>
    
            <?php
                $args = array('posts_per_page' => 1);
                $custom = new WP_Query($args);
                $id = null;
                if ($custom->have_posts()):while($custom->have_posts()):$custom->the_post();
                    if(has_post_thumbnail()){
                        $postImg = get_the_post_thumbnail_url();
                    }else{
                        $postImg = get_template_directory_uri() . '/imagenes/defec.jpg';
                    }
                ?>
                <div class="img-postDestacado" style="background-image: url('<?php echo $postImg ?>');"></div>
                <?php
                    $args = array('class' => 'photo_author indexAvatar');
                    echo get_avatar(get_the_author_meta('ID') , 96 , null , 'fotico del autor' , $args);
                ?>
                    <div class="container">
                      <div class="row">
                        <div class="col-md-12">
                            <a href="<?php the_permalink(); ?>" class="tituloPost"><?php the_title();?></a>
                            <span class="WPexcerpt"><?php the_excerpt(); ?></span><br>
                            <div class="infoPost">
                                <span><i class="fa fa-calendar" aria-hidden="true"></i><span class="WPDate">&nbsp;<?php the_time('j-m-Y'); ?></span></span>
                                <span><i class="fa fa-user" aria-hidden="true"></i><span class="WPAuthor">&nbsp;<?php the_author(); ?></span></span>
                                <span><i class="fa fa-comments" aria-hidden="true"></i><span class="WPComments">&nbsp;<?php echo 'No Comments'; ?></span></span>
                            </div>
                            <div class="infoPostLeft">
                                <span><i class="fa fa-tags" aria-hidden="true"></i><span>&nbsp;<?php the_tags(''); ?></span></span>
                            </div>

                    <?php
                            $id = $post->ID; /*get_the_ID()*/
                        endwhile;endif;
                        wp_reset_query();
                    ?>
                        </div>
                      </div>
                      
    <hr>                  
      <div class="row">
          <div class="col-md-8">
              <?php
                $args = array(
                    'posts_per_page' => 10,
                    'post__not_in' => [$id]                     
                );
                $custom = new WP_Query($args);
                if ($custom->have_posts()):while($custom->have_posts()):$custom->the_post();
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                                if(has_post_thumbnail()){
                                      $postImg = get_the_post_thumbnail_url();
                                 }else{
                                      $postImg = get_template_directory_uri() . '/imagenes/defec.jpg';
                                 }
                            ?>
                            <img src="<?php echo $postImg; ?>" class="img-post"></img>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="<?php the_permalink(); ?>" class="tituloPost"><?php the_title();?></a>
                                    <span><?php the_excerpt(); ?></span>
                                    <div class="infoPost">
                                        <span><i class="fa fa-calendar" aria-hidden="true"></i><span class="WPDate">&nbsp;<?php the_time('j-m-Y'); ?></span></span>
                                        <span><i class="fa fa-user" aria-hidden="true"></i><span class="WPAuthor">&nbsp;<?php the_author(); ?></span></span>
                                        <span><i class="fa fa-comments" aria-hidden="true"></i><span class="WPComments">&nbsp;<?php echo 'No Comments'; ?></span></span>
                                    </div>
                                    <div class="infoPostLeft">
                                    <span><i class="fa fa-tags" aria-hidden="true"></i><span>&nbsp;<?php the_tags(''); ?></span></span>
                                    </div>
                                    <br>
                                    
                                    <hr>
                                </div>
                            </div>
                        </div>    
                    </div>
                    <?php
                endwhile;endif;
                wp_reset_query();
              ?>
          </div>
          <div class="col-md-4">
                <?php
                    get_sidebar();
                ?>    
          </div>
      </div>
    </div>
    <?php 
        
        get_footer();

    ?>