<?php
    get_header();
    get_template_part('nav');
    the_post();
?>
<div class="container">
    <div class="row">
        <div class="bg-faded col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <?php the_content(); ?>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>