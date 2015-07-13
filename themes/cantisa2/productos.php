<?php /* ?><?php Template Name: Productos ?><?php */ ?><?php get_header(); ?>
<div id="productos">
  <div id="banner" style="background-image:url('<?php echo get_template_directory_uri(); ?>/assets/misc/10-cantisa/web/home.jpg')" class="block light-color center container-fluid background-full bg-alpha-dark">
    <div class="bg"></div>
    <div class="row">
      <div class="spacing sp-xl"></div>
      <div class="column-1">
        <h3 class="text-lg lighter">Nuestros<br/><span class="bolder">productos</span></h3>
      </div>
    </div>
    <div class="next-up"><a href="#listaproductos" data-scrollTo="true" class="btn btn-circle btn-sm from-top anim-slow anim"><span class="glyphicon glyphicon-menu-down"></span></a></div>
    <div class="spacing sp-lg"></div>
  </div>
  <div id="listaproductos"><?php query_posts('post_type=cantisa_producto'); ?><?php if (have_posts()):  ?><?php $contador = 1; ?><?php while (have_posts()): the_post(); ?><?php if ($contador == 1) { ?><a href="<?php echo get_permalink(); ?>" class="block container-fluid darkgray-bgcolor producto">
      <div class="row">
        <div class="col-sm-4 bg-fixed">
          <div style="background-image:url('<?php the_field('foto_principal');?>')" class="background-full img-float"></div>
        </div>
        <div class="col-sm-8 col-sm-offset-4 from-right anim">
          <div class="col-sm-12">
            <h2 class="sans-2 pull-left uppercase lighter black-color"><?php the_field('titulo_linea_1'); ?><br/><span class="bold"><?php the_field('titulo_linea_2'); ?></span>
            </h2>
            <div class="btn btn-bordered icon-show btn-md pull-right btn-nolink"><?php the_field('grosor'); ?><span class="icon-right fa fa-chevron-right"></span>
            </div>
            <div class="clearfix"></div>
            <div class="spacing sp-lg"></div>
            <div class="col-sm-9 white-color">
              <p class="sans text-lg"><?php the_field('descripcion_breve'); ?>
              </p>
              <div class="spacing sp-sm"></div>
              <p class="sans">+ info <span class="fa fa-chevron-right prod-chev"></span></p>
            </div>
          </div>
        </div>
      </div></a><?php $contador++; ?><?php } elseif ($contador ==2) { ?><a href="<?php echo get_permalink();?>" class="block container-fluid dark-color light-bgcolor producto">
      <div class="row">
        <div class="col-sm-4 anim from-left">
          <div class="col-sm-12 producto-left">
            <h2 class="sans-2 uppercase lighter"><?php the_field('titulo_linea_1'); ?><br/><span class="bold"><?php the_field('titulo_linea_2');  ?></span>
            </h2>
            <div class="spacing sp-lg"></div>
            <p class="sans text-lg"><?php the_field('descripcion_breve'); ?>
            </p>
            <div class="spacing sp-sm"></div>
            <p class="sans">+ info <span class="fa fa-chevron-right prod-chev"></span></p>
          </div>
        </div>
        <div class="col-sm-8 col-sm-offset-4 bg-fixed">
          <div style="background-image:url('<?php the_field('foto_principal');?>')" class="background-full img-float"></div>
        </div>
      </div></a><?php $contador++; ?><?php } elseif ($contador ==3) { ?><a href="<?php echo get_permalink();?>" class="block container-fluid white-color main-bgcolor producto">
      <div class="row">
        <div class="col-sm-4 bg-fixed">
          <div style="background-image:url('<?php the_field('foto_principal');?>')" class="background-full img-float"></div>
        </div>
        <div class="col-sm-8 col-sm-offset-4 from-right anim">
          <div class="col-sm-12">
            <h2 class="sans-2 pull-left uppercase lighter"><?php the_field('titulo_linea_1'); ?><br/><span class="bold"> </span><?php the_field('titulo_linea_1'); ?>
            </h2>
            <div class="btn btn-nolink btn-bordered icon-show btn-md pull-right"><?php the_field('grosor'); ?><span class="icon-right fa fa-chevron-right"></span>
            </div>
            <div class="clearfix"></div>
            <div class="spacing sp-lg"></div>
            <div class="col-sm-9">
              <p class="sans text-lg"><?php the_field('descripcion_breve'); ?>
              </p>
              <div class="spacing sp-sm"></div>
              <p class="sans">+ info <span class="fa fa-chevron-right prod-chev"></span></p>
            </div>
          </div>
        </div>
      </div></a><?php $contador++; ?><?php } else { ?><a href="<?php echo get_permalink();?>" class="block container-fluid dark-color light-bgcolor producto">
      <div class="row">
        <div class="col-sm-4 anim from-left">
          <div class="col-sm-12 producto-left">
            <h2 class="sans-2 uppercase lighter"><?php the_field('titulo_linea_1'); ?><br/><span class="bold"><?php the_field('titulo_linea_2'); ?></span>
            </h2>
            <div class="spacing sp-lg"></div>
            <p class="sans text-lg"><?php the_field('descripcion_breve'); ?>
            </p>
            <div class="spacing sp-sm"></div>
            <p class="sans">+ info <span class="fa fa-chevron-right prod-chev"></span></p>
          </div>
        </div>
        <div class="col-sm-8 col-sm-offset-4 bg-fixed">
          <div style="background-image:url('<?php the_field('foto_principal');?>')" class="background-full img-float"></div>
        </div>
      </div></a><?php $contador = 1; ?><?php } ?><?php endwhile; ?><?php wp_reset_query(); ?><?php endif; ?>
    <div class="block container-fluid dark-color light-bgcolor producto">
      <div class="row">
        <div class="col-sm-4 anim from-left">
          <div class="col-sm-12 producto-left">
            <h2 class="sans-2 uppercase lighter">Rollos de<br/><span class="bold">chapa de madera </span></h2>
            <div class="spacing sp-lg"></div>
            <p class="sans text-lg">La chapa es seleccionada por tonos y calidades, los rollos van reticulados.</p>
            <div class="spacing sp-sm"></div>
            <p class="sans text-lg">+ info ></p>
          </div>
        </div>
        <div class="col-sm-8 col-sm-offset-4 bg-fixed">
          <div style="background-image:url('<?php echo get_template_directory_uri(); ?>/assets/misc/demo02/plane2.jpg');" class="background-full img-float"></div>
        </div>
      </div>
    </div>
  </div>
</div><?php get_footer(); ?>