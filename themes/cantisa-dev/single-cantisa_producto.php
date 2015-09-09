<?php get_header(); ?>
<div id="producto">
  <div class="block container-fluid posts-block lightgray-bgcolor">
    <div class="row">
      <div id="product-left" class="col-sm-4"><a href="/productos" class="dark-color">
          <p class="uppercase"><span class="fa fa-chevron-left spacing sp-horizontal sp-sm"></span><?php if(ICL_LANGUAGE_CODE=='en') { ?>Our products<?php } else { ?>Nuestros productos<?php } ?>
          </p></a>
        <div class="spacing sp-sm"></div><img src="<?php the_field('foto_principal');?>" alt="" class="img-full"/>
        <div class="block main-bgcolor light-color">
          <div class="align-right">
            <div class="btn btn-bordered btn-nolink">
              <p class="text-xl lowercase"><?php the_field('grosor'); ?><span class="uppercase text-sm"><?php if(ICL_LANGUAGE_CODE=='en') { ?>thickness<?php } else { ?>espesor<?php } ?></span></p>
            </div>
            <div class="spacing sp-sm"></div>
            <p class="lines"><?php the_field('atributo_breve_1'); ?>
            </p>
            <p class="lines"><?php the_field('atributo_breve_2'); ?>
            </p>
            <p class="lines"><?php the_field('atributo_breve_3'); ?>
            </p>
            <div class="spacing sp-sm"></div><a href="<?php the_field('ficha_pdf');?>" class="text-link">
              <p class="uppercase"><?php if(ICL_LANGUAGE_CODE=='en') { ?>download file<?php } else { ?>descargar ficha<?php } ?>
              </p><span class="fa fa-download"></span></a>
          </div>
          <div class="clearfix"></div>
        </div><a href="/productos" class="block gray-bgcolor block-stretch text-center">
          <p class="uppercase text-sm"><span class="fa fa-chevron-left spacing sp-horizontal sp-sm2"></span><?php if(ICL_LANGUAGE_CODE=='en') { ?>Back to products<?php } else { ?>Volver a productos<?php } ?>
          </p></a>
      </div>
      <div id="product-right" class="col-sm-8">
        <div class="spacing sp-md"></div>
        <h2 class="uppercase"><?php the_field('titulo_linea_1'); ?><br/><span class="bolder"><?php the_field('titulo_linea_2'); ?></span>
        </h2>
        <div class="spacing sp-sm2"></div>
        <div class="parrafo"><?php the_field('parrafo'); ?>
        </div>
        <div class="spacing sp-sm"></div>
        <ul class="acabados col-sm-6 text-center"><?php if( have_rows('acabados') ): ?>
          <div class="spacing sp-xs"></div>
          <div class="btn btn-bordered btn-dark btn-nolink"><?php if(ICL_LANGUAGE_CODE=='en') { ?>Finishes<?php } else { ?>Acabados<?php } ?>
          </div>
          <div class="spacing sp-xs"></div><?php while ( have_rows('acabados') ) : the_row(); ?>
          <li>
            <div class="titulo btn btn-block btn-lightgray"><?php the_sub_field('titulo'); ?>
            </div>
            <div class="detalles hidden">
              <div class="col-sm-12"><?php the_sub_field('descripcion'); ?><a href="<?php the_sub_field('detalles');?>" target="_blank" class="main-color"><i class="fa fa-download"></i><?php if(ICL_LANGUAGE_CODE=='en') { ?>Technical details<?php } else { ?>Detalles técnicos del producto<?php } ?></a>
                <div class="spacing sp-sm"></div>
              </div>
              <div class="col-sm-12"><?php the_sub_field('imagenes'); ?>
              </div>
            </div>
          </li><?php endwhile; ?><?php else : ?><?php endif; ?>
        </ul>
        <ul class="acabados col-sm-6 text-center"><?php if( have_rows('chapas') ): ?>
          <div class="spacing sp-xs"></div>
          <div class="btn btn-bordered btn-dark btn-nolink"><?php if(ICL_LANGUAGE_CODE=='en') { ?>Sheeting<?php } else { ?>Chapas<?php } ?>
          </div>
          <div class="spacing sp-xs"></div><?php while ( have_rows('chapas') ) : the_row(); ?>
          <li>
            <div class="titulo btn btn-block btn-lightgray"><?php the_sub_field('titulo'); ?>
            </div>
            <div class="detalles hidden">
              <div class="col-sm-12"><?php the_sub_field('descripcion'); ?><a href="<?php the_sub_field('detalles');?>" target="_blank" class="main-color"><i class="fa fa-download"></i><?php if(ICL_LANGUAGE_CODE=='en') { ?>Technical details<?php } else { ?>Detalles técnicos del producto<?php } ?></a>
                <div class="spacing sp-sm"></div>
              </div>
              <div class="col-sm-12"><?php the_sub_field('imagenes'); ?>
              </div>
            </div>
          </li><?php endwhile; ?><?php else : ?><?php endif; ?>
        </ul>
        <div class="detalleOut col-sm-6 hidden">
          <div class="here"></div>
          <div class="spacing sp-xs"></div>
          <div class="btn btn-lightgray text-right"><i class="fa fa-chevron-left"></i><?php if(ICL_LANGUAGE_CODE=='en') { ?>Back to the sheet<?php } else { ?>Volver a la ficha<?php } ?>
          </div>
        </div>
      </div>
    </div><?php if (get_field('foto1')) { ?>
    <div id="galeria" class="row row-lessgutter thumbs">
      <h3 class="text-center"><?php if(ICL_LANGUAGE_CODE=='en') { ?>Fabrication process<?php } else { ?>Proceso de fabricación<?php } ?>
      </h3>
      <div class="col-sm-4 col-lessgutter"><a href="<?php echo the_field('foto1'); ?>" rel="lightbox[producto]" title="" style="background-image:url('<?php the_field('foto1');?>')" class="img-full background-full thumb thumb-sm"></a></div>
      <div class="col-sm-4 col-lessgutter"><a href="<?php echo the_field('foto2'); ?>" rel="lightbox[producto]" title="" style="background-image:url('<?php the_field('foto2');?>')" class="img-full background-full thumb thumb-sm"></a></div>
      <div class="col-sm-4 col-lessgutter"><a href="<?php echo the_field('foto3'); ?>" rel="lightbox[producto]" title="" style="background-image:url('<?php the_field('foto3');?>')" class="img-full background-full thumb thumb-sm"></a></div>
      <div class="col-sm-4 col-lessgutter"><a href="<?php echo the_field('foto4'); ?>" rel="lightbox[producto]" title="" style="background-image:url('<?php the_field('foto4');?>')" class="img-full background-full thumb thumb-sm"></a></div><?php } ?>
    </div>
  </div>
</div><?php get_footer(); ?>