<?php
// добавление стилей
add_action( 'wp_enqueue_scripts', function () {
     if(is_page_template('Home.php')) {
	  wp_enqueue_style( 'style-home', get_template_directory_uri() . '/Assets/css/Home.css' );
    }
    if(is_page_template('AboutDesign.php')) {
	  wp_enqueue_style( 'style-aboutdesign', get_template_directory_uri() . '/Assets/css/AboutDesign.css' );
    }
     if(is_page_template('Events.php')) {
	  wp_enqueue_style( 'style-events', get_template_directory_uri() . '/Assets/css/Events.css' );
    }

    if ( is_singular('article') ) {
	  wp_enqueue_style( 'style-events', get_template_directory_uri() . '/Assets/css/Interiorm.css' );
      wp_enqueue_script('script-slider',get_template_directory_uri() . '/Assets/js/slider.js',array(), null,true);
      wp_enqueue_script('script-brand-float',get_template_directory_uri() . '/Assets/js/brand-float.js',array(), null,true);
    }


    wp_enqueue_style( 'style-header', get_template_directory_uri() . '/Assets/css/Header.css' );
});

/**
 * Заполняет поле для атрибута alt на основе заголовка изображения при его вставки в контент поста.
 *
 * @param array $response
 *
 * @return array
 */
function change_empty_alt_to_title( $response ) {
	if ( ! $response['alt'] ) {
		$response['alt'] = sanitize_text_field( $response['title'] );
	}

	return $response;
}

add_action('init', function () {
    register_post_type('article', [
        'label' => 'Про дизайн',
        'public' => true,
        'menu_icon' => 'dashicons-media-document',
        'supports' => ['title'],
        'has_archive' => true,
        'show_in_rest' => false
    ]);
});


add_filter( 'wp_prepare_attachment_for_js', 'change_empty_alt_to_title' );

/* Тут в дальнейшем будет подключение фич для вордпресса */ 
add_theme_support("post-thumbnails");
add_theme_support('custom-logo');