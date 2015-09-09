<?php /* ?><?php Template Name: Familia ?><?php */ ?><?php get_header(); ?><?php $term = get_term_by( 'slug', get_query_var('family'), 'tipo_de_producto' ); ?><?php $categoria = $term->name; ?><?php $textf = get_tax_meta($term,'ba_text_field_id',true); ?><?php $family = get_query_var( 'family' ); ?><?php $post_type = 'cantisa_producto'; ?><?php $tax = 'tipo_de_producto'; ?><?php $tax_terms = get_terms($tax); ?><?php if ($tax_terms): ?><?php foreach ($tax_terms  as $tax_term) { ?><?php $args=array('post_type' => $post_type,'posts_per_page' => -1,'tax_query' => array(array('taxonomy' =>'tipo_de_producto','field'    => 'slug','terms' => $family ))); ?><?php } ?><?php endif; ?><?php $my_query = null; ?><?php $my_query = new WP_Query($args); ?><?php if( $my_query->have_posts() ): ?>
<div id="productos" class="familia">
  <div class="study block container-fluid posts-block lightgray-bgcolor">
    <div class="row">
      <div class="uppercase"><a href="/">Home </a><i class="fa fa-chevron-right"></i><a href="/productos"> Productos </a><i class="fa fa-chevron-right"></i><a href="/<?php echo $family ?>"><?php echo ' '.$categoria; ?></a></div>
      <div class="spacing sp-sm2"></div>
    </div>
    <div class="row">
      <div class="col-xs-12 text-center">
        <h2> <?php echo $categoria ?>
        </h2>
        <h5 class="uppercase main-color"> <?php echo $textf ?>
        </h5>
      </div>
      <div class="spacing sp-sm2"></div>
    </div><?php while ($my_query->have_posts()) : $my_query->the_post(); ?><?php if ( $my_query->current_post == 0 ) { ?>
    <div class="row row-lessgutter thumbs center">
      <div class="col-sm-6 col-lessgutter"><a href="<?php echo get_permalink(); ?>" title="" style="background-image:url('<?php the_field('foto_principal');?>')" class="img-full background-full thumb thumb-lg">
          <div class="text-content">
            <div class="spacing sp-xl"></div>
            <h3 class="text-shadow light-color title uppercase bolder"> <?php the_field('titulo_linea_1'); ?><?php echo ' '; ?><?php the_field('titulo_linea_2'); ?>
            </h3>
            <div class="spacing sp-sm2"></div>
          </div></a><?php } ?><?php endwhile; ?><?php rewind_posts(); ?><?php while ($my_query->have_posts()) : $my_query->the_post(); ?><?php if ( $my_query->current_post == 1 ) { ?><a href="<?php echo get_permalink(); ?>" title="" style="background-image:url('<?php the_field('foto_principal');?>')" class="img-full background-full thumb thumb-sm">
          <div class="text-content">
            <div class="spacing sp-md2"></div>
            <h3 class="text-shadow light-color title uppercase bolder"> <?php the_field('titulo_linea_1'); ?><?php echo ' '; ?><?php the_field('titulo_linea_2'); ?>
            </h3>
          </div></a><?php } ?><?php endwhile; ?>
      </div><?php rewind_posts(); ?><?php while ($my_query->have_posts()) : $my_query->the_post(); ?><?php if ( $my_query->current_post == 2 ) { ?>
      <div class="col-sm-3 col-lessgutter"><a href="<?php echo get_permalink(); ?>" title="" style="background-image:url('<?php the_field('foto_principal');?>')" class="img-full background-full thumb thumb-sm">
          <div class="text-content">
            <div class="spacing sp-md2"></div>
            <h3 class="text-shadow light-color title uppercase bolder"> <?php the_field('titulo_linea_1'); ?><?php echo ' '; ?><?php the_field('titulo_linea_2'); ?>
            </h3>
          </div></a><?php } ?><?php endwhile; ?><?php rewind_posts(); ?><?php while ($my_query->have_posts()) : $my_query->the_post(); ?><?php if ( $my_query->current_post == 3 ) { ?><a href="<?php echo get_permalink(); ?>" title="" style="background-image:url('<?php the_field('foto_principal');?>')" class="img-full background-full thumb thumb-lg">
          <div class="text-content">
            <div class="spacing sp-xl"></div>
            <h3 class="text-shadow light-color title uppercase bolder"> <?php the_field('titulo_linea_1'); ?><?php echo ' '; ?><?php the_field('titulo_linea_2'); ?>
            </h3>
            <div class="spacing sp-sm2"></div>
          </div></a><?php } ?><?php endwhile; ?>
      </div><?php rewind_posts(); ?><?php while ($my_query->have_posts()) : $my_query->the_post(); ?><?php if ( $my_query->current_post == 4 ) { ?>
      <div class="col-sm-3 col-lessgutter"><a href="<?php echo get_permalink(); ?>" title="" style="background-image:url('<?php the_field('foto_principal');?>')" class="img-full background-full thumb thumb-sm">
          <div class="text-content">
            <div class="spacing sp-md2"></div>
            <h3 class="text-shadow light-color title uppercase bolder"> <?php the_field('titulo_linea_1'); ?><?php echo ' '; ?><?php the_field('titulo_linea_2'); ?>
            </h3>
          </div></a><?php } ?><?php endwhile; ?><?php rewind_posts(); ?><?php while ($my_query->have_posts()) : $my_query->the_post(); ?><?php if ( $my_query->current_post == 5 ) { ?><a href="<?php echo get_permalink(); ?>" title="" style="background-image:url('<?php the_field('foto_principal');?>')" class="img-full background-full thumb thumb-lg">
          <div class="text-content">
            <div class="spacing sp-xl"></div>
            <h3 class="text-shadow light-color title uppercase bolder"> <?php the_field('titulo_linea_1'); ?><?php echo ' '; ?><?php the_field('titulo_linea_2'); ?>
            </h3>
            <div class="spacing sp-sm2"></div>
          </div></a>
      </div>
    </div><?php } ?><?php endwhile; ?><?php rewind_posts(); ?><?php while ($my_query->have_posts()) : $my_query->the_post(); ?><?php if ( $my_query->current_post == 6 ) { ?>
    <div style="top:-10px;position: relative;" class="row row-lessgutter thumbs center">
      <div class="col-sm-3 col-lessgutter"><a href="<?php echo get_permalink(); ?>" title="" style="background-image:url('<?php the_field('foto_principal');?>')" class="img-full background-full thumb thumb-sm">
          <div class="text-content">
            <div class="spacing sp-md2"></div>
            <h3 class="text-shadow light-color title uppercase bolder"> <?php the_field('titulo_linea_1'); ?><?php echo ' '; ?><?php the_field('titulo_linea_2'); ?>
            </h3>
          </div></a></div><?php } ?><?php endwhile; ?><?php rewind_posts(); ?><?php while ($my_query->have_posts()) : $my_query->the_post(); ?><?php if ( $my_query->current_post == 7 ) { ?>
      <div class="col-sm-3 col-lessgutter"><a href="<?php echo get_permalink(); ?>" title="" style="background-image:url('<?php the_field('foto_principal');?>')" class="img-full background-full thumb thumb-sm">
          <div class="text-content">
            <div class="spacing sp-md2"></div>
            <h3 class="text-shadow light-color title uppercase bolder"> <?php the_field('titulo_linea_1'); ?><?php echo ' '; ?><?php the_field('titulo_linea_2'); ?>
            </h3>
          </div></a></div><?php } ?><?php endwhile; ?><?php rewind_posts(); ?><?php while ($my_query->have_posts()) : $my_query->the_post(); ?><?php if ( $my_query->current_post == 8 ) { ?>
      <div class="col-sm-6 col-lessgutter"><a href="<?php echo get_permalink(); ?>" title="" style="background-image:url('<?php the_field('foto_principal');?>')" class="img-full background-full thumb thumb-sm">
          <div class="text-content">
            <div class="spacing sp-md2"></div>
            <h3 class="text-shadow light-color title uppercase bolder"> <?php the_field('titulo_linea_1'); ?><?php echo ' '; ?><?php the_field('titulo_linea_2'); ?>
            </h3>
          </div></a></div><?php } ?><?php endwhile; ?><?php rewind_posts(); ?><?php while ($my_query->have_posts()) : $my_query->the_post(); ?><?php if ( $my_query->current_post > 8 ) { ?>
      <div style="position:relative;margin-top:-10px;" class="col-sm-6 col-lessgutter"><a href="<?php echo get_permalink(); ?>" title="" style="background-image:url('<?php the_field('foto_principal');?>')" class="img-full background-full thumb thumb-sm">
          <div class="text-content">
            <div class="spacing sp-md2"></div>
            <h3 class="text-shadow light-color title uppercase bolder"> <?php the_field('titulo_linea_1'); ?><?php echo ' '; ?><?php the_field('titulo_linea_2'); ?>
            </h3>
          </div></a></div><?php } ?><?php endwhile; ?>
      
      
    </div><?php wp_reset_query(); ?><?php endif; ?>
    
  </div>
</div>
<?php get_footer(); ?>