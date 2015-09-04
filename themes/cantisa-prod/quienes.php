<?php /* ?><?php Template Name: Quiénes somos ?><?php */ ?><?php get_header(); ?>
<div id="quienes">
  <div id="banner" style="background-image:url('<?php the_field('background_image') ?>')" class="block light-color center container-fluid background-full bg-alpha-dark">
    <div class="bg"></div>
    <div class="row">
      <div class="spacing sp-xl"></div>
      <div class="col-sm-12">
        <h3 class="text-lg lighter"><?php the_field('titulo') ?>
        </h3>
      </div>
    </div>
    <div class="next-up"><a href="#nosotros" data-scrollTo="true" class="btn btn-circle btn-sm from-top anim-slow anim"><span class="glyphicon glyphicon-menu-down"></span></a></div>
    <div class="spacing sp-lg"></div>
  </div>
  <div id="nosotros" class="block black-color center container-fluid">
    <div class="row">
      <div class="column-1">
        <h2 class="text-lg"> <?php the_field('epigrafe') ?>
        </h2>
        <div class="spacing sp-sm2"></div>
        <p><?php the_field('contenido') ?>
        </p>
        <div class="spacing sp-sm2"></div>
      </div>
    </div>
  </div>
  <div class="block container-fluid block-wide">
    <div class="row portfolio thumbs-wide">
      <div class="col-sm-6 lightgray-bgcolor thumb thumb-lg center">
        <div class="text-content">
          <div class="spacing sp-sm2"></div>
          <h2 class="main-color"><?php the_field('titulo_thumb_1') ?>
          </h2>
          <p class="text-lg dark-color"><?php the_field('texto_thumb_1') ?>
          </p>
          <div class="spacing sp-sm2"></div>
        </div>
      </div>
      <div class="col-sm-6 blue-bgcolor thumb zoomHover thumb-lg center thumbmg">
        <div style="background-image:url('<?php echo get_template_directory_uri(); ?>/assets/misc/demo02/section-04.jpg');" class="img background-full bg-alpha-dark">
          <div class="bg"></div>
        </div>
        <div class="text-content"></div>
      </div>
    </div>
  </div>
  <div class="block container-fluid block-wide lightgray-bgcolor">
    <div class="row portfolio thumbs-wide"><a class="col-sm-4 light-bgcolor thumb thumb-xl zoomHover center accordion-show">
        <div class="text-content">
          <div class="spacing sp-md"></div>
          <h2 class="main-color title"><span><img src="<?php echo get_template_directory_uri(); ?>/assets/misc/10-cantisa/servicio.svg" alt="Calidad Cantisa" class="icon-img"/></span><?php the_field('titulo_thumb_2') ?>
          </h2>
          <p class="text-lg dark-color"> <?php the_field('texto_thumb_2') ?>
          </p>
          <div class="spacing sp-sm2"></div>
        </div></a>
      <div class="col-sm-4 blue-bgcolor thumb thumb-xl zoomHover center thumbmg2">
        <div style="background-image:url('<?php echo get_template_directory_uri(); ?>/assets/misc/demo02/section-04.jpg');" class="img background-full bg-alpha-dark">
          <div class="bg"></div>
        </div>
        <div class="text-content"></div>
      </div><a class="col-sm-4 light-bgcolor thumb thumb-xl zoomHover center">
        <div class="text-content">
          <div class="spacing sp-md"></div>
          <h2 class="main-color title"><span><img src="<?php echo get_template_directory_uri(); ?>/assets/misc/10-cantisa/calidad.svg" alt="Calidad Cantisa" class="icon-img"/></span><?php the_field('titulo_thumb_3') ?>
          </h2>
          <p class="text-lg dark-color"> <?php the_field('texto_thumb_3') ?>
          </p>
          <div class="spacing sp-sm2"></div>
        </div></a>
    </div>
  </div>
</div><?php get_footer(); ?>