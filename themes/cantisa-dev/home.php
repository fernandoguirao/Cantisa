<?php /* ?><?php Template Name: Home ?><?php */ ?><?php get_header(); ?>
<div id="home">
  <div id="myCarousel" data-ride="carousel" class="carousel slide main-bgcolor light-color">
    <ol class="carousel-indicators"><?php if(get_field('carousel')): ?><?php $counter = 0 ?><?php while (the_repeater_field('carousel')): ?>
      <li data-target="#myCarousel" data-slide-to="<?php echo $counter ?>" class="<?php if ($counter==0){ echo 'active'; } ?>"></li><?php endwhile ?><?php endif ?>
    </ol>
    <div role="listbox" class="carousel-inner"><?php if(get_field('carousel')): ?><?php $counter = 0 ?><?php while(the_repeater_field('carousel')): ?>
      <div class="item <?php if ($counter==0){ echo 'active'; } ?>">
        <div class="bg-fixed">
          <div style="background-image:url('<?php the_sub_field('background_image') ?>')" class="background-full zoomClass bg-alpha-main">
            <div class="bg"></div>
          </div>
        </div><img src="<?php the_sub_field('background_image') ?>" alt="" class="first-slide zoomClass"/>
        <div class="container">
          <div class="carousel-caption <?php if ($counter==0){ echo ' anim from-left anim-far anim-slow'; } ?>">
            <h2 class="text-lg lighter"> <?php the_sub_field('texto') ?>
            </h2>
          </div>
        </div>
      </div><?php $counter++ ?><?php endwhile ?><?php endif ?>
    </div><a href="#myCarousel" role="button" data-slide="prev" class="left carousel-control"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span><span class="sr-only">Previous</span></a><a href="#myCarousel" role="button" data-slide="next" class="right carousel-control"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span><span class="sr-only">Next  </span></a>
  </div>
  <div class="block container-fluid block-wide lightgray-bgcolor">
    <div class="row portfolio thumbs-wide"><?php $post_object = get_field('thumb_01') ?><?php if ($post_object): ?><?php $post = $post_object ?><?php setup_postdata ($post) ?><a href="<?php the_permalink();?>" class="col-sm-3 thumb zoomHover center">
        <div style="background-image:url('<?php the_field('foto_principal')?>');" class="img background-full bg-gradientshadow-top">
          <div class="bg"></div>
        </div>
        <div class="text-content">
          <div class="spacing sp-md"></div>
          <h3 class="light-color title uppercase lighter"><?php the_field('titulo_linea_1') ?><br/><span class="bolder"><?php the_field('titulo_linea_2') ?></span>
          </h3>
          <div class="spacing sp-sm2"></div>
          <div class="btn btn-sm btn-bordered"><?php if(ICL_LANGUAGE_CODE=='en') { ?>Read more<?php } else { ?>Leer más<?php } ?>
          </div>
        </div></a><?php wp_reset_postdata() ?><?php endif ?><?php $post_object = get_field('thumb_02') ?><?php if ($post_object): ?><?php $post = $post_object ?><?php setup_postdata ($post) ?><a href="<?php the_permalink();?>" class="col-sm-3 thumb zoomHover center">
        <div style="background-image:url('<?php the_field('foto_principal')?>');" class="img background-full bg-gradientshadow-top">
          <div class="bg"></div>
        </div>
        <div class="text-content">
          <div class="spacing sp-md"></div>
          <h3 class="light-color title uppercase lighter"><?php the_field('titulo_linea_1') ?><br/><span class="bolder"><?php the_field('titulo_linea_2') ?></span>
          </h3>
          <div class="spacing sp-sm2"></div>
          <div class="btn btn-sm btn-bordered"> <?php if(ICL_LANGUAGE_CODE=='en') { ?>Read more<?php } else { ?>Leer más<?php } ?>
          </div>
        </div></a><?php wp_reset_postdata() ?><?php endif ?><?php $post_object = get_field('thumb_03') ?><?php if ($post_object): ?><?php $post = $post_object ?><?php setup_postdata ($post) ?><a href="<?php the_permalink();?>" class="col-sm-3 thumb zoomHover center">
        <div style="background-image:url('<?php the_field('foto_principal')?>');" class="img background-full bg-gradientshadow-top">
          <div class="bg"></div>
        </div>
        <div class="text-content">
          <div class="spacing sp-md"></div>
          <h3 class="light-color title uppercase lighter"><?php the_field('titulo_linea_1') ?><br/><span class="bolder"><?php the_field('titulo_linea_2') ?></span>
          </h3>
          <div class="spacing sp-sm2"></div>
          <div class="btn btn-sm btn-bordered"> <?php if(ICL_LANGUAGE_CODE=='en') { ?>Read more<?php } else { ?>Leer más<?php } ?>
          </div>
        </div></a><?php wp_reset_postdata() ?><?php endif ?><?php $args = array( 'numberposts' => '1' ); ?><?php $recent_posts = wp_get_recent_posts( $args ); ?><?php foreach( $recent_posts as $recent ){ ?><a href="<?php echo get_permalink($recent['ID'])?>" class="col-sm-3 main-bgcolor thumb red-thumb center">
        <div class="text-content align-left">
          <h3 class="light-color"><span class="bolder"> <?php $allCat = get_the_category(); ?><?php $lastCat = array_reverse($allCat); ?><?php echo $lastCat[$recent['ID']]->name; ?> / </span><?php echo get_the_date('d.m.Y',$recent['ID']) ?>
          </h3>
          <div class="spacing sp-sm"></div>
          <p class="light-color lined-sm"><?php echo get_the_title($recent['ID']) ?>
          </p>
        </div></a><?php } ?>
    </div>
  </div>
</div><?php get_footer(); ?>