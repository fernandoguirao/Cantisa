<?php get_header(); ?><?php while ( have_posts() ) : the_post(); ?><?php $page_id = get_queried_object_id() ?><?php $title = get_post_meta( $page_id, 'title',true) ?><?php $description = get_post_meta( $page_id, 'description',true) ?><?php $thumbnail = get_the_post_thumbnail( $page_id, 'full',true) ?><?php echo $thumbnail; ?>
<div id="quienes">
  <div id="banner" style="background-image:url('<?php echo get_template_directory_uri(); ?>/assets/misc/10-cantisa/web/home.jpg')" class="block light-color center container-fluid background-full bg-alpha-dark mimg">
    <div class="bg"></div>
    <div class="row">
      <div class="spacing sp-md"></div>
      <div class="col-sm-12">
        <h3 class="text-lg lighter"><span class="bolder"><?php echo get_the_title() ?></span></h3>
      </div>
    </div>
    <div class="spacing sp-sm"></div>
  </div>
  <div id="nosotros" class="block black-color container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-10 col-sm-offset-1">
        <div class="spacing sp-sm"></div>
        <p><?php the_content(); ?>
        </p>
        <div class="spacing sp-sm2"></div>
      </div>
    </div>
  </div>
</div><?php endwhile; //resetting the page loop ?><?php wp_reset_query(); //resetting the page query ?>
<script>
  $fimg = $('img.attachment-full');
  $src = $fimg.attr("src");
  $fimg.remove();
  $('.mimg').css("background-image", 'url("'+$src+'")');
  
</script><?php get_footer(); ?>