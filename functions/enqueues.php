<?php
/*
 * Enqueues
 */

if ( ! function_exists('b4st_enqueues') ) {
	function b4st_enqueues() {

		// Styles

		wp_register_style('bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css', false, '4.1.3', null);
		wp_enqueue_style('bootstrap');

		wp_register_style('fontawesome5', 'https://use.fontawesome.com/releases/v5.6.1/css/all.css', false, '5.6.1', null);
		wp_enqueue_style('fontawesome5');

		wp_enqueue_style( 'gutenberg-blocks', get_template_directory_uri() . '/assets/css/blocks.css' );

		wp_register_style('b4st', get_template_directory_uri() . '/assets/css/b4st.css', false, null);
		wp_enqueue_style('b4st');

		wp_register_style('custom-style', get_template_directory_uri() . '/assets/css/custom-style.css', false, null);
		wp_enqueue_style('custom-style');

		wp_register_style('animate-css', get_template_directory_uri() . '/assets/css/animate.css', false, null);
		wp_enqueue_style('animate-css');

		wp_register_style('owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', false, null);
		wp_enqueue_style('owl-carousel');

		wp_register_style('owl-theme', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css', false, null);
		wp_enqueue_style('owl-theme');

		wp_register_style('elastic-menu', get_template_directory_uri() . '/assets/css/elastic_menu.css', false, null);
		wp_enqueue_style('elastic-menu');

		wp_register_style('aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css', false, null);
		wp_enqueue_style('aos-css');

		wp_register_style('fancybox3-css', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css', false, null);
		wp_enqueue_style('fancybox3-css');

		if(is_page()):
			wp_register_style('myplace-page', get_template_directory_uri() . '/assets/css/dashboard.css', false, null);
			wp_enqueue_style('myplace-page');
		endif;

		// Scripts

		wp_register_script('modernizr',  'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', false, '2.8.3', true);
		wp_enqueue_script('modernizr');

		wp_enqueue_script('jquery');

		wp_register_script('bootstrap-bundle', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js', false, '4.1.3', true);
		wp_enqueue_script('bootstrap-bundle');
		// (The Bootstrap JS bundle contains Popper JS.)

		wp_register_script('b4st', get_template_directory_uri() . '/assets/js/b4st.js', false, null, true);
		wp_enqueue_script('b4st');

		wp_register_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', false, null, true);
		wp_enqueue_script('owl-carousel');

		wp_register_script('aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', false, '4.1.3', true);
		wp_enqueue_script('aos-js');

		wp_register_script('fancybox3-js', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js', false, '3.5.7', true);
		wp_enqueue_script('fancybox3-js');

		//wp_register_script('onepagenav-js', get_template_directory_uri() . '/assets/js/onepagenav.js', false, null, true);
		//wp_enqueue_script('onepagenav-js');

		wp_register_script('scripts', get_template_directory_uri() . '/assets/js/scripts.js', false, null, true);
		wp_enqueue_script('scripts');


		if(is_single()):
			wp_register_script('scripts-single', get_template_directory_uri() . '/assets/js/scripts_single.js', false, null, true);
			wp_enqueue_script('scripts-single');
		endif;

		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}
	}
}
add_action('wp_enqueue_scripts', 'b4st_enqueues', 100);
