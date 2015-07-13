<?php

  add_action( 'init', 'create_post_type' );

  function create_post_type() {
    register_post_type( 'cantisa_producto',
      array(
        'labels' => array(
          'name' => __( 'Productos' ),
          'singular_name' => __( 'Producto' )
        ),
        'has_archive' => true,
        'taxonomies' => array('category','post_tag','tipo_de_producto'),
        'public' => true,
        'show_ui' => true,
        'hierarchical' => true,
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'query_var' => true
      )
    );
  }


  function add_custom_taxonomies() {
    // Add new "Locations" taxonomy to Posts
    register_taxonomy('tipo_de_producto', 'cantisa_producto', array(
      // Hierarchical taxonomy (like categories)
      'hierarchical' => true,
      // This array of options controls the labels displayed in the WordPress Admin UI
      'labels' => array(
        'name' => _x( 'Tipo de productos', 'taxonomy general name' ),
        'singular_name' => _x( 'Tipo de producto', 'taxonomy singular name' ),
      ),
      // Control the slugs used for this taxonomy
      'rewrite' => array(
        'slug' => 'tipodeproducto', // This controls the base slug that will display before each term
        'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
      ),
    ));
  }
  add_action( 'init', 'add_custom_taxonomies', 0 );  
 
