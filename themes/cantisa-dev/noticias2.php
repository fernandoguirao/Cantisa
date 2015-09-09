<?php /* ?><?php Template Name: Newsalt ?><?php */ ?><?php get_header(); ?>
<div id="noticia">
  <div class="block titlebanner black-color center container-fluid gray-bgcolor block-stretch">
    <div class="row">
      <div class="column-1">
        <h2>Noticias</h2>
      </div>
    </div>
  </div>
  <div class="study block container-fluid posts-block lightgray-bgcolor">
    <div class="row">
      <div class="uppercase"><a href="/">Home </a><i class="fa fa-chevron-right"></i><a href="/noticias"> Noticias</a></div>
      <div class="spacing sp-sm2"></div>
      <div class="study-1 sol-sm-12 col-md-12 col-lg-10 col-lg-offset-1 light-bgcolor dark-color">
        <div class="block"><?php query_posts('post_type=post'); ?><?php if (have_posts()):  ?><?php while (have_posts()): the_post(); ?>
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <p><span class="main-color"><?php echo get_the_date('j/m/y'); ?></span><span class="black-color"> <?php $allCat = get_the_category(); ?><?php $lastCat = array_reverse($allCat); ?><?php echo $lastCat[0]->name; ?></span></p><a href="<?php echo get_permalink(); ?>" class="text-link">
                <h3 class="main-color uppercase"><?php the_title(); ?>
                </h3></a>
              <div class="spacing sp-xs2"></div>
              <p><?php the_excerpt(); ?>
              </p><a href="<?php echo get_permalink(); ?>" class="text-link main-color">
                <p><?php if(ICL_LANGUAGE_CODE=='en') { ?>Read more<?php } else { ?>Seguir leyendo<?php } ?>
                </p></a>
              <div class="spacing sp-md"></div>
            </div>
            <div class="col-md-6 col-sm-12"><a href="<?php echo get_permalink(); ?>"><img src="<?php echo the_field('imagen_principal'); ?>" alt="" class="img-full"/></a>
              <div class="spacing sp-sm2"></div>
            </div>
            <div class="col-sm-12">
              <hr/>
              <div class="spacing sp-sm2"></div>
            </div>
          </div><?php endwhile; ?><?php endif; ?>
        </div>
      </div>
      <div class="spacing sp-md"></div>
    </div>
  </div>
</div><?php get_footer(); ?>