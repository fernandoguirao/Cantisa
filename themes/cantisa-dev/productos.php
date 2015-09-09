<?php /* ?><?php Template Name: Productos ?><?php */ ?><?php get_header(); ?>
<div id="productos">
  <div id="banner" style="background-image:url('<?php echo get_template_directory_uri(); ?>/assets/misc/10-cantisa/web/home.jpg')" class="block light-color center container-fluid background-full bg-alpha-dark">
    <div class="bg"></div>
    <div class="row">
      <div class="spacing sp-xl"></div>
      <div class="column-1">
        <h3 class="text-lg lighter"><?php the_field('titulo') ?>
        </h3>
      </div>
    </div>
    <div class="next-up"><a href="#listaproductos" data-scrollTo="true" class="btn btn-circle btn-sm from-top anim-slow anim"><span class="glyphicon glyphicon-menu-down"></span></a></div>
    <div class="spacing sp-lg"></div>
  </div><?php $terms = get_terms( 'tipo_de_producto' ); ?><?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){ ?>
  <div id="listaproductos"><?php $contador = 1; ?><?php foreach ( $terms as $term ) { ?><?php $imagenf = get_tax_meta($term,'ba_image_field_id',true); ?><?php if ($imagenf) { ?><?php $imagen = array_values($imagenf)[1]; ?><?php } else { ?><?php $imagen = get_template_directory_uri() . '/assets/misc/10-cantisa/web/home.jpg'; ?><?php } ?><?php $nombre = $term->name; ?><?php $deslug = $term->slug; ?><?php $descripcion = $term->description; ?><?php $furl = get_site_url() . '/familia/?family=' . $deslug; ?><?php if ($contador == 1) { ?><a href="<?php echo $furl; ?>" class="block container-fluid darkgray-bgcolor producto">
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