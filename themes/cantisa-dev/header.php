<!DOCTYPE html><html lang='es'>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> <?php if ( is_home() && is_front_page() ) { ?><?php bloginfo('title') ?><?php } else { ?><?php echo get_the_title() ?><?php echo " « " ?><?php bloginfo('title')	 ?><?php } ?>
  </title>
  <meta name="description" content="<?php bloginfo('description'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/assets/misc/10-cantisa/apple-touch-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/assets/misc/10-cantisa/apple-touch-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/assets/misc/10-cantisa/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/assets/misc/10-cantisa/apple-touch-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/assets/misc/10-cantisa/apple-touch-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/assets/misc/10-cantisa/apple-touch-icon-120x120.png">
  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/misc/10-cantisa/favicon-32x32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/misc/10-cantisa/favicon-96x96.png" sizes="96x96">
  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/misc/10-cantisa/favicon-16x16.png" sizes="16x16">
  <link href="<?php echo get_template_directory_uri(); ?>/assets/misc/10-cantisa/favicon.ico" rel="icon" type="image/x-icon">
  <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/misc/10-cantisa/manifest.json">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff"><?php wp_head();
 ?>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/app.css"><!--[if IE]>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/ie/ie.css"><![endif]-->
  <!--[if IE 8]>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/ie/ie8.css"><![endif]--><!--[if IE]>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/ie.js"></script><![endif]-->
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>
</head><body class='sd-right'>
<!--[if lt IE 8]>
<p class="browsehappy">
  You are using an <strong>outdated</strong> browser.
  Please <a href="http://browsehappy.com/">upgrade your browser</a>
  to improve your experience.
</p><![endif]-->
<div id='view'><?php if(ICL_LANGUAGE_CODE=='en') { ?><?php $quienes = 'Who we are' ?><?php $productos = 'Products' ?><?php $noticias = 'News' ?><?php $contacto = 'Contact' ?><?php $busca = 'Find a product' ?><?php $idiomas = 'Languages' ?><?php $aviso = 'Legal' ?><?php $siguenos = 'Follow us' ?><?php $noencuentra = 'Need help?' ?><?php $preguntar = 'Contact' ?><?php } else { ?><?php $quienes = 'Quiénes somos' ?><?php $productos = 'Productos' ?><?php $noticias = 'Noticias' ?><?php $contacto = 'Contacto' ?><?php $busca = "Busca un producto" ?><?php $idiomas = 'Idiomas' ?><?php $aviso = 'Aviso legal' ?><?php $siguenos = 'Síguenos' ?><?php $noencuentra = '¿No lo encuentras?' ?><?php $preguntar = 'Preguntar' ?><?php } ?> //- PRUEBAS
<nav class="navbar nav-white nav-nochange nav-lg">
  <div class="container-fluid">
    <div class="blackdetail"></div>
    <div class="navbar-header"><a href="" data-toggle="sidebar" class="dark-color link align-right visible-xs">
        <div class="spacing sp-xs2"></div><i class="fa fa-bars fa-2x"></i></a><a href="<?php echo site_url(); ?>" data-scroll="true" class="navbar-brand"><img src="<?php echo get_template_directory_uri(); ?>/assets/misc/10-cantisa/logo.png" class="brand">
        
        </a></div>
    <div class="collapse navbar-collapse sans uppercase">
      <ul class="nav navbar-nav navbar-right navbar-fixedright black-bgcolor white-color">
        <li><a href="<?php echo site_url(); ?>/quienes"><span><?php echo $quienes ?></span></a></li>
        <li class="dropdown"><a href="<?php echo site_url(); ?>/productos" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><span><?php echo $productos ?></span></a>
          <ul class="dropdown-menu"><?php $terms = get_terms( 'tipo_de_producto' ); ?><?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){ ?><?php foreach ( $terms as $term ) { ?><?php $imagenf = get_tax_meta($term,'ba_image_field_id',true); ?><?php if ($imagenf) { ?><?php $imagen = array_values($imagenf) ?><?php $imagen = $imagenf[1] ?><?php } else { ?><?php $imagen = get_template_directory_uri() . '/assets/misc/10-cantisa/web/home.jpg'; ?><?php } ?><?php $nombre = $term->name; ?><?php $deslug = $term->slug; ?><?php $furl = get_site_url() . '/familia/?family=' . $deslug; ?>
            <li><a href="<?php echo $furl; ?>"><?php echo $nombre ?></a></li><?php } ?><?php } ?>
          </ul>
        </li>
        <li><a href="<?php echo site_url(); ?>/noticias"><span><?php echo $noticias ?></span></a></li>
        <li><a href="<?php echo site_url(); ?>/contacto"><span><?php echo $contacto ?></span></a></li><?php if (is_page( 'productos' )|| is_page( 'familia' )|| 'cantisa_producto' == get_post_type() ) { } else { ?>
        <li><a id="searchBtn" href="#" class="main-bgcolor"><span class="fa fa-search"></span></a></li><?php } ?>
      </ul>
    </div>
  </div>
</nav>
<div id="buscador" style="<?php if (is_page( 'productos' )|| is_page( 'familia' )|| 'cantisa_producto' == get_post_type()) { ?>margin-top: 0px; opacity: 1;<?php } ?>"> 
  <div class="block block-stretch container-fluid gray-bgcolor">
    <div class="row">
      <div class="col-sm-8">
        <div class="row">
          <div class="col-sm-4 align-right">
            <h4 class="title"><span class="dark-color bold text-sm"><?php echo $busca ?></span></h4>
          </div>
          <div class="col-sm-8">
            <form method="get" action="http://217.125.51.89/equiv/" class="box-form form-sm">
              <div class="input-group">
                <input type="text" placeholder="Referencia producto" name="tab" value="" class="form-control"><span class="input-group-btn">
                  <button type="submit" class="btn btn-dark"><span class="fa fa-search"></span></button></span>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-sm-4 align-right">
        <ul class="list list-horizontal">
          <li>
            <p class="bold"><?php //echo $preguntar ?>
            </p>
          </li>
          <li><a href="<?php echo site_url(); ?>/contacto" style="margin-top:4px;" class="btn btn-lightgray"><?php echo $noencuentra ?></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="sidebar dark-bgcolor">
  <div class="close-view light-color"><a href="#" data-toggle="sidebar" class="sans">+</a></div>
  <div class="block">
    <div class="row">
      <div class="col-xs-12 center">
        <div class="spacing sp-md"></div>
        <div class="side-menu">
          <ul id="main-nav" class="main-nav nav-menu nav-lined light-color align-left">
            <li><a href="<?php echo site_url(); ?>/quienes" data-toggle="sidebar" data-scrollTo="true">
                <p class="sans-2 uppercase italic"><?php echo $quienes ?>
                </p></a></li>
            <li><a href="<?php echo site_url(); ?>/productos" data-toggle="sidebar" data-scrollTo="true">
                <p class="sans-2 uppercase italic"><?php echo $productos ?>
                </p></a></li>
            <li><a href="<?php echo site_url(); ?>/noticias" data-toggle="sidebar" data-scrollTo="true">
                <p class="sans-2 uppercase italic"><?php echo $noticias ?>
                </p></a></li>
            <li><a href="<?php echo site_url(); ?>/contacto" target="_blank">
                <p class="sans-2 uppercase italic"><?php echo $contacto ?>
                </p></a></li>
            <li><a href="http://217.125.51.89/equiv/">
                <p class="sans-2 uppercase italic"><?php echo $busca ?>
                </p></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>