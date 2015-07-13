<?php get_header(); ?>
<div id="home">
  <div class="block light-color center container-fluid">
    <div class="bg-fixed">
      <div style="background-image:url('<?php echo get_template_directory_uri(); ?>/assets/misc/10-cantisa/web/home.jpg')" class="background-full zoomClass bg-alpha-main">
        <div class="bg"></div>
      </div>
    </div>
    <div class="row">
      <div class="spacing sp-lg"></div>
      <div class="col-sm-10 col-sm-offset-1 text-left anim from-left anim-far anim-slow">
        <h1 class="text-sm lighter">30 años de<br/><span class="bolder">calidad</span></h1>
      </div>
      <div class="spacing sp-lg"></div>
      <div class="spacing sp-md"></div>
    </div>
  </div>
  <div class="block container-fluid block-wide lightgray-bgcolor">
    <div class="row portfolio thumbs-wide"><a href="/productos" class="col-sm-3 thumb zoomHover center">
        <div style="background-image:url('<?php echo get_template_directory_uri(); ?>/assets/misc/10-cantisa/web/thumb1.jpg');" class="img background-full bg-gradientshadow-top">
          <div class="bg"></div>
        </div>
        <div class="text-content">
          <div class="spacing sp-md"></div>
          <h3 class="light-color title uppercase lighter">Rollos<br/><span class="bolder">PVC</span></h3>
          <div class="spacing sp-sm2"></div>
          <div class="btn btn-sm btn-bordered">Más info</div>
        </div></a><a href="/productos" class="col-sm-3 blue-bgcolor thumb zoomHover center">
        <div style="background-image:url('<?php echo get_template_directory_uri(); ?>/assets/misc/10-cantisa/web/thumb2.jpg');" class="img background-full bg-gradientshadow-top">
          <div class="bg"></div>
        </div>
        <div class="text-content">
          <div class="spacing sp-md"></div>
          <h3 class="light-color title uppercase lighter">Rollos<br/><span class="bolder">madera</span></h3>
          <div class="spacing sp-sm2"></div>
          <div class="btn btn-sm btn-bordered">Más info</div>
        </div></a><a href="/productos" class="col-sm-3 blue-bgcolor thumb zoomHover center">
        <div style="background-image:url('<?php echo get_template_directory_uri(); ?>/assets/misc/10-cantisa/web/thumb3.jpg');" class="img background-full bg-gradientshadow-top">
          <div class="bg"></div>
        </div>
        <div class="text-content">
          <div class="spacing sp-md"></div>
          <h3 class="light-color title uppercase lighter">Molduras a<br/><span class="bolder">testa</span></h3>
          <div class="spacing sp-sm2"></div>
          <div class="btn btn-sm btn-bordered">Más info</div>
        </div><?php $args = array( 'numberposts' => '1' ); ?><?php $recent_posts = wp_get_recent_posts( $args ); ?><?php foreach( $recent_posts as $recent ){ ?><a href="<?php echo get_permalink($recent['ID'])?>" class="col-sm-3 main-bgcolor thumb red-thumb center">
          <div class="text-content align-left">
            <h3 class="light-color"><span class="bolder"> <?php $allCat = get_the_category(); ?><?php $lastCat = array_reverse($allCat); ?><?php echo $lastCat[$recent['ID']]->name; ?> / </span><?php echo get_the_date('d.m.Y',$recent['ID']) ?>
            </h3>
            <div class="spacing sp-sm"></div>
            <p class="light-color lined-sm"><?php echo get_the_title($recent['ID']) ?>
            </p>
          </div></a><?php } ?></a>
    </div>
  </div>
</div><?php get_footer(); ?>