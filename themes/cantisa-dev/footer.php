<?php if(ICL_LANGUAGE_CODE=='en') { ?><?php $quienes = 'Who we are' ?><?php $productos = 'Products' ?><?php $noticias = 'News' ?><?php $contacto = 'Contact' ?><?php $busca = 'Find a product' ?><?php $idiomas = 'Languages' ?><?php $aviso = 'Legal' ?><?php $siguenos = 'Follow us' ?><?php $noencuentra = 'Need help?' ?><?php $preguntar = 'Contact' ?><?php } else { ?><?php $quienes = 'Quiénes somos' ?><?php $productos = 'Productos' ?><?php $noticias = 'Noticias' ?><?php $contacto = 'Contacto' ?><?php $busca = "Busca un producto" ?><?php $idiomas = 'Idiomas' ?><?php $aviso = 'Aviso legal' ?><?php $siguenos = 'Síguenos' ?><?php $noencuentra = '¿No lo encuentras?' ?><?php $preguntar = 'Preguntar' ?><?php } ?>
<footer>
  <div class="block container-fluid block-wide light-color">
    <div id="mainfooter" class="row dark-bgcolor withmap portfolio thumbs-wide">
      <div class="col-sm-4 thumb darker">
        <div class="spacing sp-md"></div>
        <div class="col-sm-8 col-sm-offset-2">
          <h3 class="uppercase">Cantisa</h3>
          <div class="spacing sp-sm"></div>
          <ul class="list">
            <li>
              <p class="text-md"><span class="uppercase"><?php echo $idiomas ?></span>
                <div class="spacing sp-xs"></div><?php do_action('wpml_add_language_selector'); ?>
              </p>
            </li>
            <li>
              <p class="text-md"><a href="<?php echo site_url(); ?>/quienes"><?php echo $quienes ?></a></p>
            </li>
            <li>
              <p class="text-md"><a href="<?php echo site_url(); ?>/productos"><?php echo $productos ?></a></p>
            </li>
            <li>
              <p class="text-md"><a href="<?php echo site_url(); ?>/noticias"><?php echo $noticias ?></a></p>
            </li>
            <li>
              <p class="text-md"><a href="<?php echo site_url(); ?>/contacto"><?php echo $contact ?></a></p>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-sm-4 thumb">
        <div class="spacing sp-md"></div>
        <div class="col-sm-8 col-sm-offset-2">
          <h3 class="uppercase"><?php echo $contact ?>
          </h3>
          <div class="spacing sp-sm"></div>
          <ul class="list">
            <li>
              <p class="text-md">C/ Pintor Joaquín Sorolla<br/>Polígono industrial Ciudad Mudeco<br/>4630 Quart de Poblet Valencia, España</p>
            </li>
            <li>
              <p class="text-md"><a href="mailto:cantisa@cantisa.es">cantisa@cantisa.es</a></p>
            </li>
            <li>
              <p class="text-md">961 597 242</p>
            </li>
            <li>
              <p class="text-md"><a href="<?php echo site_url(); ?>/legal"><?php echo $aviso ?></a></p>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-sm-4 thumb darker">
        <div class="spacing sp-md"></div>
        <div class="col-sm-8 col-sm-offset-2">
          <h3 class="uppercase"><?php echo $siguenos ?>
          </h3>
          <div class="spacing sp-sm"></div>
          <form method="get" action="http://217.125.51.89/equiv/" class="box-form">
            <div class="input-group"><?php if(ICL_LANGUAGE_CODE=='en') { ?>
              <input type="text" placeholder="Find a product" name="tab" class="form-control"/><?php } else { ?>
              <input type="text" placeholder="Busca un producto" name="tab" class="form-control"/><?php } ?><span class="input-group-btn">
                <button type="submit" class="btn btn-main"><span class="fa fa-search"></span></button></span>
            </div>
          </form>
          <div class="spacing sp-sm">  </div>
          <ul class="list list-horizontal">
            <li><a href="" target="_blank" class="btn btn-main"><i class="fa fa-facebook"></i></a></li>
            <li><a href="" target="_blank" class="btn btn-main"><i class="fa fa-twitter"></i></a></li>
            <li><a href="" target="_blank" class="btn btn-main"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="" target="_blank" class="btn btn-main"><i class="fa fa-google-plus"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="spacing sp-lg"></div>
  </div>
</footer>
<script>
  //<![CDATA[
  document.write("<script async src='//HOST:8888/wp-content/themes/cantisa-dev/browser-sync-client.1.3.7.js'><\/script>".replace(/HOST/g, location.hostname));
  //]]>
  
</script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/app.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/misc/10-cantisa/app.js"></script><!--[if IE]>
<script>
  $('body').removeClass('notmobile');
  $('body').addClass('mobile');
</script><![endif]--></div><?php wp_footer(); ?></body>
</html>