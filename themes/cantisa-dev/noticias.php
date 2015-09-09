<?php /* ?><?php Template Name: News ?><?php */ ?><?php get_header(); ?><?php $args=array('posts_per_page' => -1); ?><?php $my_query = null; ?><?php $my_query = new WP_Query($args); ?><?php if( $my_query->have_posts() ): ?>
<div id="productos" class="news-alt">
  <div class="block titlebanner black-color center container-fluid lightgray-bgcolor block-stretch">
    <div class="row">
      <div class="column-1">
        <h2>Noticias</h2>
      </div>
    </div>
  </div>
  <div class="study block container-fluid posts-block white-bgcolor">
    <div style="margin-left:0;" class="row">
      <div class="uppercase"><a href="/">Home </a><i class="fa fa-chevron-right"></i><a href="/noticias"> Noticias </a><i class="fa fa-chevron-right"></i></div>
      <div class="spacing sp-sm2"></div>
    </div><?php while ($my_query->have_posts()) : $my_query->the_post(); ?><?php if ( $my_query->current_post == 0 ) { ?>
    <div class="row row-lessgutter thumbs center">
      <div class="col-sm-4 col-lessgutter"><a href="<?php echo get_permalink(); ?>" title="" style="background-image:url('<?php echo the_field('imagen_principal');?>')" class="img-full background-full thumb thumb-md3">
          <div class="date-content">
            <h3 class="white-color"><?php echo get_the_date('j') ?>
            </h3>
            <h5 class="uppercase white-color"><?php echo get_the_date('M') ?>
            </h5>
          </div>
          <div class="text-content">
            <div class="spacing sp-xs"></div>
            <h3 class="main-color title bolder"> <?php echo get_the_title(); ?>
            </h3>
            <div class="spacing sp-xs2"></div>
            <p><?php echo get_excerpt(90) . '...' ?>
            </p>
            <p class="bolder"><?php if(ICL_LANGUAGE_CODE=='en') { ?>Read more<?php } else { ?>Seguir leyendo<?php } ?><span class="fa fa-chevron-right"></span>
            </p>
            <div class="spacing sp-sm2"></div>
          </div></a><?php } ?><?php endwhile; ?><?php rewind_posts(); ?><?php while ($my_query->have_posts()) : $my_query->the_post(); ?><?php if ( $my_query->current_post == 1 ) { ?><a href="<?php echo get_permalink(); ?>" title="" style="background-image:url('<?php echo the_field('imagen_principal');?>')" class="img-full background-full thumb thumb-md2">
          <div class="date-content">
            <h3 class="white-color"><?php echo get_the_date('j') ?>
            </h3>
            <h5 class="uppercase white-color"><?php echo get_the_date('M') ?>
            </h5>
          </div>
          <div class="text-content">
            <div class="spacing sp-xs"></div>
            <h3 class="main-color title bolder"> <?php echo get_the_title(); ?>
            </h3>
            <div class="spacing sp-xs2"></div>
            <p><?php echo get_excerpt(90) . '...' ?>
            </p>
            <p class="bolder"><?php if(ICL_LANGUAGE_CODE=='en') { ?>Read more<?php } else { ?>Seguir leyendo<?php } ?><span class="fa fa-chevron-right"></span>
            </p>
            <div class="spacing sp-sm2"></div>
          </div></a><?php } ?><?php endwhile; ?>
      </div><?php rewind_posts(); ?><?php while ($my_query->have_posts()) : $my_query->the_post(); ?><?php if ( $my_query->current_post == 2 ) { ?>
      <div class="col-sm-4 col-lessgutter"><a href="<?php echo get_permalink(); ?>" title="" style="background-image:url('<?php echo the_field('imagen_principal');?>')" class="img-full background-full thumb thumb-lg">
          <div class="date-content">
            <h3 class="white-color"><?php echo get_the_date('j') ?>
            </h3>
            <h5 class="uppercase white-color"><?php echo get_the_date('M') ?>
            </h5>
          </div>
          <div class="text-content">
            <div class="spacing sp-xs"></div>
            <h3 class="main-color title bolder"> <?php echo get_the_title(); ?>
            </h3>
            <div class="spacing sp-xs2"></div>
            <p><?php echo get_excerpt(90) . '...' ?>
            </p>
            <p class="bolder"><?php if(ICL_LANGUAGE_CODE=='en') { ?>Read more<?php } else { ?>Seguir leyendo<?php } ?><span class="fa fa-chevron-right"></span>
            </p>
            <div class="spacing sp-sm2"></div>
          </div></a><?php } ?><?php endwhile; ?><?php rewind_posts(); ?><?php while ($my_query->have_posts()) : $my_query->the_post(); ?><?php if ( $my_query->current_post == 3 ) { ?><a href="<?php echo get_permalink(); ?>" title="" style="background-image:url('<?php echo the_field('imagen_principal');?>')" class="img-full background-full thumb thumb-md">
          <div class="date-content">
            <h3 class="white-color"><?php echo get_the_date('j') ?>
            </h3>
            <h5 class="uppercase white-color"><?php echo get_the_date('M') ?>
            </h5>
          </div>
          <div class="text-content">
            <div class="spacing sp-xs"></div>
            <h3 class="main-color title bolder"> <?php echo get_the_title(); ?>
            </h3>
            <div class="spacing sp-xs2"></div>
            <p><?php echo get_excerpt(90) . '...' ?>
            </p>
            <p class="bolder"><?php if(ICL_LANGUAGE_CODE=='en') { ?>Read more<?php } else { ?>Seguir leyendo<?php } ?><span class="fa fa-chevron-right"></span>
            </p>
            <div class="spacing sp-sm2"></div>
          </div></a><?php } ?><?php endwhile; ?>
      </div><?php rewind_posts(); ?><?php while ($my_query->have_posts()) : $my_query->the_post(); ?><?php if ( $my_query->current_post == 4 ) { ?>
      <div class="col-sm-4 col-lessgutter"><a href="<?php echo get_permalink(); ?>" title="" style="background-image:url('<?php echo the_field('imagen_principal');?>')" class="img-full background-full thumb thumb-md2">
          <div class="date-content">
            <h3 class="white-color"><?php echo get_the_date('j') ?>
            </h3>
            <h5 class="uppercase white-color"><?php echo get_the_date('M') ?>
            </h5>
          </div>
          <div class="text-content">
            <div class="spacing sp-xs"></div>
            <h3 class="main-color title bolder"> <?php echo get_the_title(); ?>
            </h3>
            <div class="spacing sp-xs2"></div>
            <p><?php echo get_excerpt(90) . '...' ?>
            </p>
            <p class="bolder"><?php if(ICL_LANGUAGE_CODE=='en') { ?>Read more<?php } else { ?>Seguir leyendo<?php } ?><span class="fa fa-chevron-right"></span>
            </p>
            <div class="spacing sp-sm2"></div>
          </div></a><?php } ?><?php endwhile; ?><?php rewind_posts(); ?><?php while ($my_query->have_posts()) : $my_query->the_post(); ?><?php if ( $my_query->current_post == 5 ) { ?><a href="<?php echo get_permalink(); ?>" title="" style="background-image:url('<?php echo the_field('imagen_principal');?>')" class="img-full background-full thumb thumb-md3">
          <div class="date-content">
            <h3 class="white-color"><?php echo get_the_date('j') ?>
            </h3>
            <h5 class="uppercase white-color"><?php echo get_the_date('M') ?>
            </h5>
          </div>
          <div class="text-content">
            <div class="spacing sp-xs"></div>
            <h3 class="main-color title bolder"> <?php echo get_the_title(); ?>
            </h3>
            <div class="spacing sp-xs2"></div>
            <p><?php echo get_excerpt(90) . '...' ?>
            </p>
            <p class="bolder"><?php if(ICL_LANGUAGE_CODE=='en') { ?>Read more<?php } else { ?>Seguir leyendo<?php } ?><span class="fa fa-chevron-right"></span>
            </p>
            <div class="spacing sp-sm2"></div>
          </div></a>
      </div>
    </div><?php } ?><?php endwhile; ?><?php rewind_posts(); ?>
    <div class="row row-lessgutter thumbs center"><?php while ($my_query->have_posts()) : $my_query->the_post(); ?><?php if ( $my_query->current_post > 5 ) { ?>
      <div style="position:relative;margin-top:-10px;" class="col-sm-4 col-lessgutter"><a href="<?php echo get_permalink(); ?>" title="" style="background-image:url('<?php echo the_field('imagen_principal');?>')" class="img-full background-full thumb thumb-md2">
          <div class="date-content">
            <h3 class="white-color"><?php echo get_the_date('j') ?>
            </h3>
            <h5 class="uppercase white-color"><?php echo get_the_date('M') ?>
            </h5>
          </div>
          <div class="text-content">
            <div class="spacing sp-xs"></div>
            <h3 class="main-color title bolder"> <?php echo get_the_title(); ?>
            </h3>
            <div class="spacing sp-xs2"></div>
            <p><?php echo get_excerpt(90) . '...' ?>
            </p>
            <p class="bolder"><?php if(ICL_LANGUAGE_CODE=='en') { ?>Read more<?php } else { ?>Seguir leyendo<?php } ?><span class="fa fa-chevron-right"></span>
            </p>
            <div class="spacing sp-sm2"></div>
          </div></a></div><?php } ?><?php endwhile; ?>
    </div>
    
    <?php wp_reset_query(); ?><?php endif; ?>
    
  </div>
</div>
<?php get_footer(); ?>