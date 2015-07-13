<?php get_header(); ?>
<div id="categorias">
  <div class="block titlebanner black-color center container-fluid gray-bgcolor block-stretch">
    <div class="row">
      <div class="column-1">
        <h2>Categorías s</h2>
      </div>
    </div>
  </div>
  <div class="study block container-fluid posts-block lightgray-bgcolor"><?php while (have_posts()): the_post(); ?>
    <div class="row">
      <div class="uppercase"><a href="/">Home </a>< <a href="/noticias">Productos </a><<a href="<?php echo get_category_link();?>"> <?php single_cat_title(); ?></a></div>
      <div class="spacing sp-sm2"></div>
      <div class="study-1 sol-sm-12 col-md-12 col-lg-10 col-lg-offset-1 light-bgcolor dark-color">
        <div class="block">
          <div class="row">
            <div class="col-xs-12">
              <h3 class="text-lg lighter">Cantos y molduras</h3>
              <h5 class="main-color">Productos de madera</h5>
            </div>
          </div>
          <div class="row row-lessgutter thumbs">
            <div class="col-sm-6 col-lessgutter"><a href="" class="img-full thumb thumb-mini background-full main-bgcolor">
                <p><?php the_title(); ?>
                </p></a><a href="" class="img-full thumb thumb-mini background-full main-bgcolor"></a></div>
            <div class="col-sm-3 col-lessgutter"><a href="" class="img-full thumb thumb-mini background-full main-bgcolor"></a><a href="" class="img-full thumb thumb-mini background-full main-bgcolor"></a></div>
            <div class="col-sm-3 col-lessgutter"><a href="" class="img-full thumb thumb-mini background-full main-bgcolor"></a><a href="" class="img-full thumb thumb-mini background-full main-bgcolor"></a></div>
            <div class="col-sm-12">
              <div class="spacing sp-sm2"></div><a href="/noticias" class="text-link">
                <p class="uppercase main-color text-center">< Volver a productos</p></a>
              <div class="spacing sp-sm2"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="spacing sp-md"></div>
    </div><?php endwhile; ?>
  </div>
</div><?php get_footer();  ?>