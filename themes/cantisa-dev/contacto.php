<?php /* ?><?php Template Name: Contacto  ?><?php */ ?><?php get_header(); ?>
<div id="contacto">
  <div id="map" class="block block-full light-color center container-fluid background-full">
    <iframe width="600" height="450" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo urlencode(the_field('direccion_para_mapa')); ?>&key=AIzaSyA2krBchnBxATGkN8XjD-F3qlYh-wR0-m8&"></iframe>
  </div>
  <div class="block container-fluid block-wide lightgray-bgcolor">
    <div class="row portfolio thumbs-wide">
      <div class="col-sm-6 dark-bgcolor light-color thumb zoomHover center">
        <div class="text-content">
          <div class="spacing sp-sm2"></div>
          <h2 class="text-sm title"><?php if(ICL_LANGUAGE_CODE=='en') { ?>Contact with<?php } else { ?>Contacta con<?php } ?><span class="text-lg bolder">Cantisa S.A.</span>
          </h2>
          <p> <?php the_field('direccion_formateada') ?>
          </p>
          <div class="spacing sp-sm"></div>
        </div>
      </div><a href="mailto:cantisa@cantisa.es" class="col-sm-6 gray-bgcolor dark-color thumb zoomHover center">
        <div class="text-content">
          <div class="spacing sp-sm"></div>
          <h3 class="title"><span class="steady icon-envelope"></span><span class="text-lg main-color"><?php the_field('telefono') ?></span><span class="text-sm"><?php the_field('email') ?></span></h3>
        </div></a>
    </div>
  </div>
  <div class="study block container-fluid posts-block lightgray-bgcolor">
    <div class="row">
      <div class="study-1 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2 light-bgcolor dark-color">
        <form><?php echo do_shortcode('[contact-form-7 id="40" title="Formulario de contacto 1"]') ?>
        </form>
      </div>
      <div class="spacing sp-md"></div>
    </div>
  </div>
</div><?php get_footer(); ?>