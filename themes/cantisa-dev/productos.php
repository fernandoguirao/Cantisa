<?php /* ?><?php Template Name: Productos ?><?php */ ?><?php get_header(); ?>
<div id="home" class="slide-productos">
  <div id="myCarousel" data-ride="carousel" class="carousel slide main-bgcolor light-color">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>    
    <div role="listbox" class="carousel-inner"><?php $post_object = get_field('destacado_1') ?><?php if ($post_object): ?><?php $post = $post_object ?><?php setup_postdata ($post) ?><a href="<?php echo get_permalink(); ?>" class="item active">
        <div class="bg-fixed">
          <div style="background-image:url('<?php the_field('foto_principal')?>')" class="background-full zoomClass bg-alpha-main">
            <div class="bg"></div>
          </div>
        </div><img src="<?php the_field('foto_principal')?>" alt="" class="first-slide zoomClass"/>
        <div class="container">
          <div class="carousel-caption">
            <h2 class="text-lg lighter"><span class="bolder uppercase"> <?php the_field('titulo_linea_1') ?></span></h2>
          </div>
        </div></a><?php endif ?><?php wp_reset_postdata() ?><?php $post_object = get_field('destacado_2') ?><?php if ($post_object): ?><?php $post = $post_object ?><?php setup_postdata ($post)   ?><a href="/" class="item slide-prev slide-next">
        <div class="bg-fixed">
          <div style="background-image:url('<?php the_field('foto_principal')?>')" class="background-full zoomClass bg-alpha-main">
            <div class="bg"></div>
          </div>
        </div><img src="<?php the_field('foto_principal')?>" alt="" class="first-slide zoomClass"/>
        <div class="container">
          <div class="carousel-caption">
            <h2 class="text-lg lighter"><span class="bolder uppercase"> <?php the_field('titulo_linea_1') ?></span></h2>
          </div>
        </div><?php endif  ?><?php wp_reset_postdata() ?><?php $post_object = get_field('destacado_3') ?><?php if ($post_object): ?><?php $post = $post_object ?><?php setup_postdata ($post) ?></a><a href="/" class="item slide-prev slide-next">
        <div class="bg-fixed">
          <div style="background-image:url('<?php the_field('foto_principal')?>')" class="background-full zoomClass bg-alpha-main">
            <div class="bg"></div>
          </div>
        </div><img src="<?php the_field('foto_principal')?>" alt="" class="first-slide zoomClass"/>
        <div class="container">
          <div class="carousel-caption">
            <h2 class="text-lg lighter"><span class="bolder uppercase"> <?php the_field('titulo_linea_1') ?></span></h2>
          </div>
        </div><?php endif  ?><?php wp_reset_postdata() ?></a>
    </div><a href="#myCarousel" role="button" data-slide="prev" class="left carousel-control"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span><span class="sr-only">Previous</span></a><a href="#myCarousel" role="button" data-slide="next" class="right carousel-control"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span><span class="sr-only">Next  </span></a>
  </div>
</div>
<div id="productos"><?php $terms = get_terms( 'tipo_de_producto' ); ?><?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){ ?>
  <div id="listaproductos"><?php $contador = 1; ?><?php foreach ( $terms as $term ) { ?><?php $imagenf = get_tax_meta($term,'ba_image_field_id',true); ?><?php if ($imagenf) { ?><?php $imagen = array_values($imagenf) ?><?php $imagen = $imagenf[1] ?><?php } else { ?><?php $imagen = get_template_directory_uri() . '/assets/misc/10-cantisa/web/home.jpg'; ?><?php } ?><?php $nombre = $term->name; ?><?php $deslug = $term->slug; ?><?php $descripcion = $term->description; ?><?php $furl = get_site_url() . '/familia/?family=' . $deslug; ?><?php if ($contador == 1) { ?><a href="<?php echo $furl; ?>" class="block container-fluid darkgray-bgcolor producto">
      <div class="row">
        <div class="col-sm-4 bg-fixed">
          <div style="background-image:url('<?php echo $imagen?>')" class="background-full img-float"></div>
        </div>
        <div class="col-sm-8 col-sm-offset-4 from-right anim">
          <div class="col-sm-12">
            <h2 class="sans-2 pull-left uppercase lighter black-color"><span class="bold"><?php echo $term->name; ?></span>
            </h2>
            <div class="clearfix"></div>
            <div class="spacing sp-lg"></div>
            <div class="col-sm-9 white-color">
              <p class="sans text-lg"><?php echo $descripcion; ?>
              </p>
              <div class="spacing sp-sm"></div>
              <p class="sans">+ info <span class="fa fa-chevron-right prod-chev"></span></p>
            </div>
          </div>
        </div>
      </div></a><?php $contador++; ?><?php } elseif ($contador ==2) { ?><a href="<?php echo $furl; ?>" class="block container-fluid dark-color light-bgcolor producto">
      <div class="row">
        <div class="col-sm-4 anim from-left">
          <div class="col-sm-12 producto-left">
            <h2 class="sans-2 uppercase lighter"><span class="bold"><?php echo $term->name; ?></span></h2>
            <div class="spacing sp-lg"></div>
            <p class="sans text-lg"><?php echo $descripcion; ?>
            </p>
            <div class="spacing sp-sm"></div>
            <p class="sans">+ info <span class="fa fa-chevron-right prod-chev"></span></p>
          </div>
        </div>
        <div class="col-sm-8 col-sm-offset-4 bg-fixed">
          <div style="background-image:url('<?php echo $imagen?>')" class="background-full img-float"></div>
        </div>
      </div></a><?php $contador++; ?><?php } elseif ($contador ==3) { ?><a href="<?php echo $furl; ?>" class="block container-fluid main-bgcolor producto">
      <div class="row">
        <div class="col-sm-4 bg-fixed">
          <div style="background-image:url('<?php echo $imagen?>')" class="background-full img-float"></div>
        </div>
        <div class="col-sm-8 col-sm-offset-4 from-right anim">
          <div class="col-sm-12">
            <h2 class="sans-2 pull-left uppercase lighter black-color"><span class="bold"><?php echo $term->name; ?></span>
            </h2>
            <div class="clearfix"></div>
            <div class="spacing sp-lg"></div>
            <div class="col-sm-9 white-color">
              <p class="sans text-lg"><?php echo $descripcion; ?>
              </p>
              <div class="spacing sp-sm"></div>
              <p class="sans">+ info <span class="fa fa-chevron-right prod-chev"></span></p>
            </div>
          </div>
        </div>
      </div></a><?php $contador++; ?><?php } else { ?><a href="<?php echo $furl; ?>" class="block container-fluid dark-color light-bgcolor producto">
      <div class="row">
        <div class="col-sm-4 anim from-left">
          <div class="col-sm-12 producto-left">
            <h2 class="sans-2 uppercase lighter"><span class="bold"><?php echo $term->name; ?></span></h2>
            <div class="spacing sp-lg"></div>
            <p class="sans text-lg"><?php echo $descripcion; ?>
            </p>
            <div class="spacing sp-sm"></div>
            <p class="sans">+ info <span class="fa fa-chevron-right prod-chev"></span></p>
          </div>
        </div>
        <div class="col-sm-8 col-sm-offset-4 bg-fixed">
          <div style="background-image:url('<?php echo $imagen?>')" class="background-full img-float"></div>
        </div>
      </div></a><?php $contador = 1; ?><?php } ?><?php } ?>
  </div><?php } ?>
</div><?php get_footer(); ?>