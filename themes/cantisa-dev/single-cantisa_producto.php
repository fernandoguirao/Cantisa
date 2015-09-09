<?php get_header(); ?>
<div id="producto">
  <div class="block container-fluid posts-block lightgray-bgcolor">
    <div class="row">
      <div id="product-left" class="col-sm-4"><a href="/productos" class="dark-color">
          <p class="uppercase"><span class="fa fa-chevron-left spacing sp-horizontal sp-sm"></span><?php if(ICL_LANGUAGE_CODE=='en') { ?>Products<?php } else { ?>Productos<?php } ?>
          </p></a>
        <div class="spacing sp-sm"></div><img src="<?php the_field('foto_principal');?>" alt="" class="img-full"/>
        <div class="block main-bgcolor light-color">
          <div class="align-right"><?php if (get_field('grosor')):  ?>
            <div class="btn btn-bordered btn-nolink">
              <p class="text-xl lowercase"><?php the_field('grosor'); ?><span class="uppercase text-sm"><?php if(ICL_LANGUAGE_CODE=='en') { ?>thickness<?php } else { ?>espesor<?php } ?></span></p>
            </div>
            <div class="spacing sp-sm"></div><?php endif; ?>
            <p class="lines"><?php the_field('atributo_breve_1'); ?>
            </p>
            <p class="lines"><?php the_field('atributo_breve_2'); ?>
            </p>
            <p class="lines"><?php the_field('atributo_breve_3'); ?>
            </p>
            <div class="spacing sp-sm"></div><a href="<?php the_field('ficha_pdf');?>" class="text-link">
              <p class="uppercase"><?php if(ICL_LANGUAGE_CODE=='en') { ?>download file<?php } else { ?>descargar ficha<?php } ?>
              </p><span class="fa fa-download hidden-sm hidden-xs"></span></a>
          </div>
          <div class="clearfix"></div>
        </div><a href="/productos" class="block gray-bgcolor block-stretch text-center">
          <p class="uppercase text-sm"><span class="fa fa-chevron-left spacing sp-horizontal sp-sm2 hidden-sm hidden-xs"></span><?php if(ICL_LANGUAGE_CODE=='en') { ?>Back to products<?php } else { ?>Volver a productos<?php } ?>
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
            <div data-toggle="modal" data-target="#detalleproducto" class="titulo btn btn-block btn-lightgray cp-modal"><?php the_sub_field('titulo'); ?>
            </div>
            <div class="detalles hidden">
              <div class="col-sm-12"><?php the_sub_field('descripcion'); ?><a href="<?php the_sub_field('detalles');?>" target="_blank" class="main-color"><i style="margin-right:6px;" class="fa fa-download"></i><?php if(ICL_LANGUAGE_CODE=='en') { ?>Technical details<?php } else { ?>Detalles técnicos del producto<?php } ?></a>
                <div class="spacing sp-sm"></div>
              </div>
              <div class="col-sm-12"><?php the_sub_field('imagenes'); ?>
              </div>
            </div>
          </li><?php endwhile; ?>
          <div class="spacing sp-sm"></div><?php else : ?><?php endif; ?>
        </ul>
        <ul class="acabados col-sm-6 text-center"><?php if( have_rows('chapas') ): ?>
          <div class="spacing sp-xs"></div>
          <div class="btn btn-bordered btn-dark btn-nolink"><?php if(ICL_LANGUAGE_CODE=='en') { ?>Sheeting<?php } else { ?>Chapas<?php } ?>
          </div>
          <div class="spacing sp-xs"></div><?php while ( have_rows('chapas') ) : the_row(); ?>
          <li>
            <div data-toggle="modal" data-target="#detalleproducto" class="titulo btn btn-block btn-lightgray cp-modal"><?php the_sub_field('titulo'); ?>
            </div>
            <div class="detalles hidden">
              <div class="col-sm-12">
                <p class="descripcion"><?php the_sub_field('descripcion'); ?>
                </p><a href="<?php the_sub_field('detalles');?>" target="_blank" class="main-color"><i style="margin-right:6px;" class="fa fa-download"></i><?php if(ICL_LANGUAGE_CODE=='en') { ?>Technical details<?php } else { ?>Detalles técnicos del producto<?php } ?></a>
                <div class="spacing sp-sm"></div>
              </div>
              <div class="col-sm-12"><?php the_sub_field('imagenes'); ?>
              </div>
            </div>
          </li><?php endwhile; ?>
          <div class="spacing sp-sm"></div><?php else : ?><?php endif; ?>
        </ul>
        <div class="detalleOut col-sm-6 hidden">
          <div class="here"></div>
          <div class="spacing sp-xs"></div>
          <div class="btn btn-lightgray text-right"><i style="margin-right:6px;" class="fa fa-chevron-left"></i><?php if(ICL_LANGUAGE_CODE=='en') { ?>Back to the sheet<?php } else { ?>Volver a la ficha<?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div><?php if( have_rows('fotos_de_slider') ): ?>
<div style="padding-top:0;padding-bottom:10px;" class="block container-fluid lightgray-bgcolor">
  <h3 class="text-center"><?php if(ICL_LANGUAGE_CODE=='en') { ?>Fabrication process<?php } else { ?>Proceso de fabricación<?php } ?>
  </h3>
</div>
<div id="slideCar"><?php while ( have_rows('fotos_de_slider') ) : the_row(); ?><a href="<?php echo the_sub_field('foto'); ?>" rel="lightbox[producto]" title="" style="background-image:url('<?php the_sub_field('foto');?>')" class="img-full background-full thumb thumb-sm"></a><?php endwhile; ?><?php endif; ?>
</div>

<div id="detalleproducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" data-dismiss="modal" class="btn btn-main"><?php if(ICL_LANGUAGE_CODE=='en') { ?>Back<?php } else { ?>Volver<?php } ?>
        </button>
        <h3 class="modal-title">Modal title</h3>
      </div>
      <div class="modal-body"></div>
      <div class="modal-footer"></div>
    </div>
  </div>
</div>
<script>
  var mbody = $('#detalleproducto .modal-body');
  var mtitulo = $('#detalleproducto .modal-title');
  var mheader = $('#detalleproducto .modal-header');
  $('.cp-modal').click(function(){
    var imgg = $(this).next().find('img');
    mheader.attr('style','background-image:url('+imgg.attr('src')+');background-size:cover;background-position:center;');
  
    mbody.html($(this).next().html());
    mtitulo.html($(this).html());
  })
</script><?php get_footer(); ?>