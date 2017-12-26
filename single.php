<?php
    get_header();
?>
<?php 
    get_template_part('nav');
    the_post();
    $post_id = $post->ID;
    $categorias = get_the_category();
?>
<div class="separador"></div>
<?php
    if(has_post_thumbnail()){
        $postImg = get_the_post_thumbnail_url();
    }else{
        $postImg = get_template_directory_uri() . '/imag/default.png';
    }
?>
<div class="img-postDestacado singleImage" style="background-image: url('<?php echo $postImg ?>');">
    <span class="tituloSingle"><?php the_title(); ?></span>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 bg-faded">
            <br>
            <div class="infoPost bg-faded">
                <span><i class="fa fa-calendar" aria-hidden="true"></i><span class="WPDate">&nbsp;<?php the_time('j-m-Y'); ?></span></span>
                <span><i class="fa fa-user" aria-hidden="true"></i><span class="WPAuthor">&nbsp;<?php the_author(); ?></span></span>
            </div>
            <br>
            <hr>
            <?php the_content();?>
            
        </div>
        
        <div class="col-md-4">
            <?php
                get_sidebar();
            ?>    
        </div>
    </div>
    <div class="row bg-faded">
        <div class="col-md-12">
            <?php
                $catId = array();
                foreach ($categorias as $cat) {
                    $catId[] = $cat->term_id;
                }
                $args = array(
                    'posts_per_page' => 3,
                    'category__in' => $catId
                );
                $custom = new WP_Query($args);
                if ($custom->have_posts()):while($custom->have_posts()):$custom->the_post();
                    the_title();
                endwhile;endif;
                wp_reset_query();
            ?>
        </div>
    </div>
    
    <div class="row bg-faded">
        <div class="col-md-12">
            <?php
                $args = array(
                    'posts_per_page' => 1,
                    'p' => $post_id
                );
                $custom = new WP_Query($args);
                if ($custom->have_posts()):while($custom->have_posts()):$custom->the_post();
                comments_template();
                
                
                // $comments = get_comments( array(
                //     'post_id' => $post_id,
                //     'orderby' => 'comment_date_gmt',
                //     'status' => 'approve'
                // ) );
                // if(!empty($comments)){
                // $custom->comments = $comments;
                // $custom->comment_count = count($comments);
                // }
                the_title();
                endwhile;endif;
                wp_reset_query();
            ?>
        </div>
    </div>
</div>
<?php 
        
    get_footer();

?>