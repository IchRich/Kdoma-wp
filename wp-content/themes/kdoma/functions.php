<?php
// добавление стилей
add_action( 'wp_enqueue_scripts', function () {

    if (is_page_template('Home.php')) {
        wp_enqueue_style(
            'style-home',
            get_template_directory_uri() . '/Assets/css/Home.css'
        );
    }

    if (is_page_template('AboutDesign.php')) {
        wp_enqueue_style(
            'style-aboutdesign',
            get_template_directory_uri() . '/Assets/css/AboutDesign.css'
        );
    }

    if (is_page_template('Events.php')) {
        wp_enqueue_style(
            'style-events',
            get_template_directory_uri() . '/Assets/css/Events.css'
        );
    }

    if (is_page_template('DesignSchool.php')) {
        wp_enqueue_style(
            'style-design-school',
            get_template_directory_uri() . '/Assets/css/DesignSchool.css'
        );

        wp_enqueue_script(
            'script-design-school-slider',
            get_template_directory_uri() . '/Assets/js/slider.js',
            [],
            null,
            true
        );
    }


    wp_enqueue_style(
        'style-header',
        get_template_directory_uri() . '/Assets/css/Header.css'
    );

    if (is_singular('eventsm')) {
        wp_enqueue_style(
            'style-eventsm',
            get_template_directory_uri() . '/Assets/css/Eventsm.css'
        );
    }
    
});



add_action('init', function () {
    register_post_type('eventsm', [
        'label' => 'События',
        'public' => true,
        'menu_icon' => 'dashicons-media-document',
        'supports' => ['title'],
        'has_archive' => true,
        'show_in_rest' => false
    ]);
});


/**
 * Заполняет поле для атрибута alt на основе заголовка изображения
 */
function change_empty_alt_to_title($response) {
    if (!$response['alt']) {
        $response['alt'] = sanitize_text_field($response['title']);
    }
    return $response;
}
add_filter('wp_prepare_attachment_for_js', 'change_empty_alt_to_title');


// Theme supports
add_theme_support('post-thumbnails');
add_theme_support('custom-logo');



add_filter( 'upload_mimes', 'svg_upload_allow' );

# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';

	return $mimes;
}
add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){

	// WP 5.1 +
	if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) ){
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	}
	else {
		$dosvg = ( '.svg' === strtolower( substr( $filename, -4 ) ) );
	}

	// mime тип был обнулен, поправим его
	// а также проверим право пользователя
	if( $dosvg ){

		// разрешим
		if( current_user_can('manage_options') ){

			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		// запретим
		else {
			$data['ext']  = false;
			$data['type'] = false;
		}

	}

	return $data;
}
add_filter('wpcf7_autop_or_not', '__return_false');
