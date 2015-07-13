<?php /* ?><?php Template Name: Contacto  ?><?php */ ?><?php get_header(); ?>
<div id="contacto">
  <div id="map" class="block block-full light-color center container-fluid background-full">
    <iframe width="600" height="450" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Calle%20Gasco%20Oliag%2C%2010%2C%20Valencia%2C%20Espa%C3%B1a&amp;key=AIzaSyA2krBchnBxATGkN8XjD-F3qlYh-wR0-m8&amp;"></iframe>
  </div>
  <div class="block container-fluid block-wide lightgray-bgcolor">
    <div class="row portfolio thumbs-wide">
      <div class="col-sm-6 dark-bgcolor light-color thumb zoomHover center">
        <div class="text-content">
          <div class="spacing sp-sm2"></div>
          <h2 class="text-sm title">Contacta con<span class="text-lg bolder">Cantisa S.A.</span></h2>
          <p>C/ Pintor Joaquín Sorolla,<br/>Polígono industrial Ciudad Mudeco<br/>4630 Quart de Poblet Valencia, España</p>
          <div class="spacing sp-sm"></div>
        </div>
      </div><a href="mailto:cantisa@cantisa.es" class="col-sm-6 gray-bgcolor dark-color thumb zoomHover center">
        <div class="text-content">
          <div class="spacing sp-sm"></div>
          <h3 class="title"><span class="steady icon-envelope"></span><span class="text-lg main-color">961 597 242</span><span class="text-sm">cantisa@cantisa.es</span></h3>
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