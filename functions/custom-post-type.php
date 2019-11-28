<?php
/*
 * Custom Post Type
 */

add_action( 'init', 'reusables_cpt_create' );

function reusables_cpt_create() {
	$labels = array(
        'name' => _x( 'Reusables', 'Post Type General Name', 'somos_turbus' ),
		'singular_name' => _x( 'Reusable', 'Post Type Singular Name', 'somos_turbus' ),
		'menu_name' => _x( 'Reusables', 'Admin Menu text', 'somos_turbus' ),
		'name_admin_bar' => _x( 'Reusable', 'Add New on Toolbar', 'somos_turbus' ),
		'archives' => __( 'Archivos Reusable', 'somos_turbus' ),
		'attributes' => __( 'Atributos Reusable', 'somos_turbus' ),
		'parent_item_colon' => __( 'Padres Reusable:', 'somos_turbus' ),
		'all_items' => __( 'Todas Reusables', 'somos_turbus' ),
		'add_new_item' => __( 'Añadir nuevo Reusable', 'somos_turbus' ),
		'add_new' => __( 'Añadir nuevo', 'somos_turbus' ),
		'new_item' => __( 'Nueva Reusable', 'somos_turbus' ),
		'edit_item' => __( 'Editar Reusable', 'somos_turbus' ),
		'update_item' => __( 'Actualizar Reusable', 'somos_turbus' ),
		'view_item' => __( 'Ver Reusable', 'somos_turbus' ),
		'view_items' => __( 'Ver Reusables', 'somos_turbus' ),
		'search_items' => __( 'Buscar Reusable', 'somos_turbus' ),
		'not_found' => __( 'No se encontraron Reusables.', 'somos_turbus' ),
		'not_found_in_trash' => __( 'Ningún Reusable encontrado en la papelera.', 'somos_turbus' ),
		'featured_image' => __( 'Imagen destacada', 'somos_turbus' ),
		'set_featured_image' => __( 'Establecer imagen destacada', 'somos_turbus' ),
		'remove_featured_image' => __( 'Borrar imagen destacada', 'somos_turbus' ),
		'use_featured_image' => __( 'Usar como imagen destacada', 'somos_turbus' ),
		'insert_into_item' => __( 'Insertar en la Reusable', 'somos_turbus' ),
		'uploaded_to_this_item' => __( 'Subido a esta Reusable', 'somos_turbus' ),
		'items_list' => __( 'Lista de Reusables', 'somos_turbus' ),
		'items_list_navigation' => __( 'Navegación por el listado de Reusables', 'somos_turbus' ),
		'filter_items_list' => __( 'Lista de Reusables filtradas', 'somos_turbus' ),
    );
 
    // Creamos un array para $args
    $args = array(
        'label' => __( 'Reusable', 'stitchkinwp' ),
		'description' => __( '', 'stitchkinwp' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-controls-repeat',
		'supports' => array(),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => true,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
		'rewrite' => true,
    );
 
    register_post_type( 'reusables', $args ); /* Registramos y a funcionar */
}

add_action( 'init', 'procedimientos_cpt_create' );

function procedimientos_cpt_create() {
	$labels = array(
		'name' => __( 'Procedimientos'), 
        'singular_name' => __( 'Procedimiento' ),
        'add_new' => _x( 'Añadir nuevo', 'Procedimiento' ),
        'add_new_item' => __( 'Añadir nuevo Procedimiento'),
        'edit_item' => __( 'Editar Procedimiento' ),
        'new_item' => __( 'Nuevo Procedimiento' ),
        'view_item' => __( 'Ver cliente' ),
        'search_items' => __( 'Buscar procedimientos' ),
        'not_found' =>  __( 'No se ha encontrado ningún Procedimiento' ),
        'not_found_in_trash' => __( 'No se han encontrado procedimientos en la papelera' ),
        'parent_item_colon' => ''
    );
 
    // Creamos un array para $args
    $args = array(
        'label' => __('procedimientos'),
        'labels' => $labels,
        'public' => true,
        'can_export' => true,
        'show_ui' => true,
        '_builtin' => false,
        'capability_type' => 'post',        
        'hierarchical' => false,
        'rewrite' => array( "slug" => "procedimientos" , 'with_front' => true),
        'supports'=> array('title','editor','thumbnail','excerpt') ,
        'show_in_nav_menus' => true,
        'taxonomies' => array( 'category'),
        'menu_icon' => 'dashicons-book-alt',
        'map_meta_cap' => true
        );
 
    register_post_type( 'procedimientos', $args ); /* Registramos y a funcionar */
}

add_action( 'init', 'embajadores_cpt_create' );

function embajadores_cpt_create() {
	$labels = array(
		'name' => __( 'Posts Embajadores'), 
        'singular_name' => __( 'Post embajadores' ),
        'add_new' => _x( 'Añadir nuevo', 'Post embajador' ),
        'add_new_item' => __( 'Añadir nuevo Post embajador'),
        'edit_item' => __( 'Editar Post embajador' ),
        'new_item' => __( 'Nuevo Post embajador' ),
        'view_item' => __( 'Ver Post Embajador' ),
        'search_items' => __( 'Buscar Post embajadores' ),
        'not_found' =>  __( 'No se ha encontrado ningún post de embajadores' ),
        'not_found_in_trash' => __( 'No se han encontrado posts de embajadores en la papelera' ),
        'parent_item_colon' => ''
    );
 
    // Creamos un array para $args
    $args = array(
        'label' => __('embajadores'),
        'labels' => $labels,
        'public' => true,
        'can_export' => true,
        'show_ui' => true,
        '_builtin' => false,
        'capability_type' => 'post',        
        'hierarchical' => false,
        'rewrite' => array( "slug" => "embajadores" , 'with_front' => true),
        'supports'=> array('title','editor','thumbnail','excerpt') ,
        'show_in_nav_menus' => true,
        'taxonomies' => array( 'category'),
        'menu_icon' => 'dashicons-flag',
        'map_meta_cap' => true
        );
 
    register_post_type( 'embajadores', $args ); /* Registramos y a funcionar */
}

