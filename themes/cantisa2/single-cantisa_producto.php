<?php get_header(); ?>
<div id="producto">
  <div class="block container-fluid posts-block lightgray-bgcolor">
    <div class="row">
      <div id="product-left" class="col-sm-4"><a href="/productos" class="dark-color">
          <p class="uppercase"><span class="fa fa-chevron-left spacing sp-horizontal sp-sm"></span>Nuestros productos</p></a>
        <div class="spacing sp-sm"></div><img src="<?php the_field('foto_principal');?>" alt="" class="img-full"/>
        <div class="block main-bgcolor light-color">
          <div class="align-right">
            <div class="btn btn-bordered btn-nolink">
              <p class="text-xl lowercase"><?php the_field('grosor'); ?><span class="uppercase text-sm">espesor</span></p>
            </div>
            <div class="spacing sp-sm"></div>
            <p class="lines"><?php the_field('atributo_breve_1'); ?>
            </p>
            <p class="lines"><?php the_field('atributo_breve_2'); ?>
            </p>
            <p class="lines"><?php the_field('atributo_breve_3'); ?>
            </p>
            <div class="spacing sp-sm"></div><a href="<?php the_field('ficha_pdf');?>" class="text-link">
              <p class="uppercase">Descargar ficha </p><span class="fa fa-download"></span></a>
          </div>
          <div class="clearfix"></div>
        </div><a href="/productos" class="block gray-bgcolor block-stretch text-center">
          <p class="uppercase text-sm"><span class="fa fa-chevron-left spacing sp-horizontal sp-sm2"></span>Volver a productos</p></a>
      </div>
      <div id="product-right" class="col-sm-8">
        <div class="spacing sp-md"></div>
        <h2 class="uppercase"><?php the_field('titulo_linea_1'); ?><br/><span class="bolder"><?php the_field('titulo_linea_2'); ?></span>
        </h2>
        <div class="spacing sp-sm2"></div>
        <p><?php the_field('parrafo'); ?>
        </p>
        <div class="spacing sp-sm"></div>
        <div class="btn btn-bordered btn-dark btn-nolink">Presentación</div>
        <div class="spacing sp-sm"></div>
        <p><?php the_field('presentacion'); ?>
        </p>
        <div class="spacing sp-sm"></div>
        <div class="btn btn-bordered btn-dark btn-nolink">Acabados</div>
        <div class="spacing sp-sm"></div>
        <p><?php the_field('acabados'); ?>
        </p>
        <div class="spacing sp-sm"></div>
        <div id="galeria" class="row row-lessgutter thumbs">
          <div class="col-sm-4 col-lessgutter"><a href="<?php echo the_field('foto1'); ?>" rel="lightbox[producto]" title="" style="background-image:url('<?php the_field('foto1');?>')" class="img-full background-full thumb thumb-sm"></a></div>
          <div class="col-sm-4 col-lessgutter"><a href="<?php echo the_field('foto2'); ?>" rel="lightbox[producto]" title="" style="background-image:url('<?php the_field('foto2');?>')" class="img-full background-full thumb thumb-sm"></a></div>
          <div class="col-sm-4 col-lessgutter"><a href="<?php echo the_field('foto3'); ?>" rel="lightbox[producto]" title="" style="background-image:url('<?php the_field('foto3');?>')" class="img-full background-full thumb thumb-sm"></a></div>
          <div class="col-sm-4 col-lessgutter"><a href="<?php echo the_field('foto4'); ?>" rel="lightbox[producto]" title="" style="background-image:url('<?php the_field('foto4');?>')" class="img-full background-full thumb thumb-sm"></a></div>
        </div>
      </div>
    </div>
  </div>
</div><?php get_footer(); ?>