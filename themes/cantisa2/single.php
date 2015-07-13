<?php get_header(); ?>
<div id="noticia">
  <div class="block titlebanner black-color center container-fluid gray-bgcolor block-stretch">
    <div class="row">
      <div class="column-1">
        <h2>Noticias</h2>
      </div>
    </div>
  </div>
  <div class="study block container-fluid posts-block lightgray-bgcolor"><?php while (have_posts()): the_post(); ?>
    <div class="row">
      <div class="uppercase"><a href="/">Home </a>< <a href="/noticias">Noticias </a><<a href="<?php echo get_permalink();?>"> <?php the_title(); ?></a></div>
      <div class="spacing sp-sm2"></div>
      <div class="study-1 sol-sm-12 col-md-12 col-lg-10 col-lg-offset-1 light-bgcolor dark-color">
        <div class="block">
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <p class="main-color"><?php echo get_the_date('j/m/y'); ?>
              </p>
              <h3 class="main-color"> <?php the_title(); ?>
              </h3>
              <div class="spacing sp-xs2"><?php $cats = get_the_category(); ?><?php $cat_name = $cats[0]->name; ?><?php echo $cat_name ?><?php $categories = get_the_category(); ?><?php $separator = ' '; ?><?php $output = ''; ?><?php if($categories){ ?><?php foreach($categories as $category) { ?><?php $output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator; ?><?php } ?><?php echo trim($output, $separator); ?><?php } ?>
              </div>
              <p> <?php the_content(); ?>
              </p>
              <div class="spacing sp-md"></div>
            </div>
            <div class="col-md-6 col-sm-12"><a href="<?php echo the_field('imagen_principal'); ?>" rel="lightbox[noticia]" title="" style="background-image:url('<?php the_field('foto1');?>')" class="img-full"><img src="<?php echo the_field('imagen_principal'); ?>" alt="" class="img-full"/></a>
              <div class="spacing sp-xs"></div>
              <div class="row row-lessgutter thumbs">
                <div class="col-sm-3 col-lessgutter"><a href="<?php echo the_field('imagen1'); ?>" rel="lightbox[noticia]" title="" style="background-image:url('<?php the_field('imagen1');?>')" class="img-full thumb thumb-mini background-full"></a></div>
                <div class="col-sm-3 col-lessgutter"><a href="<?php echo the_field('imagen2'); ?>" rel="lightbox[noticia]" title="" style="background-image:url('<?php the_field('imagen2');?>')" class="img-full thumb thumb-mini background-full"></a></div>
                <div class="col-sm-3 col-lessgutter"><a href="<?php echo the_field('imagen3'); ?>" rel="lightbox[noticia]" title="" style="background-image:url('<?php the_field('imagen3');?>')" class="img-full thumb thumb-mini background-full"></a></div>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="spacing sp-sm2"></div><a href="/noticias" class="text-link">
                <p class="uppercase main-color text-center">< Volver a noticias</p></a>
              <div class="spacing sp-sm2"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="spacing sp-md"></div>
    </div><?php endwhile; ?>
  </div>
</div><?php get_footer(); ?>