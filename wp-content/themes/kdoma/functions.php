<?php
// добавление стилей
add_action('wp_enqueue_scripts', function () {
	wp_enqueue_style('style-home', get_template_directory_uri() . '/Assets/css/Home.css');
	wp_enqueue_style('style-header', get_template_directory_uri() . '/Assets/css/Header.css');
	wp_enqueue_style('style-archive', get_template_directory_uri() . '/Assets/css/Archive.css');
	wp_enqueue_style('style-designers', get_template_directory_uri() . '/Assets/css/Designers.css');
	wp_enqueue_style('style-designer-page', get_template_directory_uri() . '/Assets/css/DesignersPage.css');
	wp_enqueue_style('style-publisher-project', get_template_directory_uri() . '/Assets/css/PublishProject.css');

	wp_enqueue_script('slider', get_template_directory_uri() . '/Assets/js/slider.js');
});



/* Тут в дальнейшем будет подключение фич для вордпресса */
add_theme_support("post-thumbnails");
add_theme_support('custom-logo');



add_filter('upload_mimes', 'svg_upload_allow');

# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow($mimes)
{
	$mimes['svg'] = 'image/svg+xml';

	return $mimes;
}

add_filter('wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5);

# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type($data, $file, $filename, $mimes, $real_mime = '')
{

	// WP 5.1 +
	if (version_compare($GLOBALS['wp_version'], '5.1.0', '>=')) {
		$dosvg = in_array($real_mime, ['image/svg', 'image/svg+xml']);
	} else {
		$dosvg = ('.svg' === strtolower(substr($filename, -4)));
	}

	// mime тип был обнулен, поправим его
	// а также проверим право пользователя
	if ($dosvg) {

		// разрешим
		if (current_user_can('manage_options')) {

			$data['ext'] = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		// запретим
		else {
			$data['ext'] = false;
			$data['type'] = false;
		}

	}

	return $data;
}


// Регистрируем тип записи "Дизайнеры"
add_action('init', 'register_designer_post_type');
function register_designer_post_type()
{
	register_post_type('designer', [
		'label' => 'Дизайнеры',
		'public' => true,
		'menu_icon' => 'dashicons-admin-users',
		'supports' => ['title', 'editor', 'thumbnail'],
		'has_archive' => true,
		'show_in_rest' => true, // Для работы с Gutenberg
		'labels' => [
			'singular_name' => 'Дизайнер',
			'add_new_item' => 'Добавить нового дизайнера',
		]
	]);
}

// Регистрируем тип записи "Проекты"
add_action('init', 'register_project_post_type');
function register_project_post_type()
{
	register_post_type('project', [
		'label' => 'Проекты',
		'public' => true,
		'menu_icon' => 'dashicons-portfolio',
		'supports' => ['title', 'editor', 'thumbnail'],
		'has_archive' => true,
		'show_in_rest' => true,
		'labels' => [
			'singular_name' => 'Проект',
			'add_new_item' => 'Добавить новый проект',
		]
	]);
}




// Для отображения проектов у дизайнера 
add_action('add_meta_boxes', 'add_designer_projects_table_meta_box');
function add_designer_projects_table_meta_box()
{
	add_meta_box(
		'designer_projects_table',
		'Проекты дизайнера',
		'render_designer_projects_table_meta_box',
		'designer',
		'normal',
		'high'
	);
}

function render_designer_projects_table_meta_box($post)
{
	$designer_id = $post->ID;

	// Получаем проекты
	$projects = get_posts([
		'post_type' => 'project',
		'posts_per_page' => -1,
		'meta_query' => [
			[
				'key' => 'project_designer',
				'value' => $designer_id,
				'compare' => '='
			]
		],
		'orderby' => 'date',
		'order' => 'DESC'
	]);

	if (empty($projects)) {
		echo '<div class="notice notice-info">';
		echo '<p>У этого дизайнера пока нет проектов.</p>';
		echo '</div>';

		echo '<p><a href="' . admin_url('post-new.php?post_type=project') . '" class="button button-primary">';
		echo 'Создать первый проект';
		echo '</a></p>';

		return;
	}

	// Статистика
	$published = 0;
	$draft = 0;
	foreach ($projects as $project) {
		if ($project->post_status == 'publish')
			$published++;
		else
			$draft++;
	}

	echo '<div class="designer-stats" style="margin-bottom:20px; background:#f5f5f5; padding:10px; border-left:4px solid #0073aa;">';
	echo '<h3 style="margin-top:0;">Статистика:</h3>';
	echo '<p>Всего проектов: <strong>' . count($projects) . '</strong></p>';
	echo '<p>Опубликовано: <strong>' . $published . '</strong></p>';
	echo '<p>Черновиков: <strong>' . $draft . '</strong></p>';
	echo '</div>';

	// Таблица проектов
	echo '<table class="wp-list-table widefat fixed striped" style="width:100%;">';
	echo '<thead>';
	echo '<tr>';
	echo '<th style="width:50%;">Название проекта</th>';
	echo '<th>Статус</th>';
	echo '<th>Дата</th>';
	echo '<th>Действия</th>';
	echo '</tr>';
	echo '</thead>';
	echo '<tbody>';

	foreach ($projects as $project) {
		$project_id = $project->ID;
		$edit_link = get_edit_post_link($project_id);
		$view_link = get_permalink($project_id);

		// Статус
		$status = get_post_status_object($project->post_status);
		$status_label = $status ? $status->label : $project->post_status;
		$status_class = ($project->post_status == 'publish') ? 'status-publish' : 'status-draft';

		echo '<tr>';

		// Название
		echo '<td>';
		echo '<strong><a href="' . esc_url($edit_link) . '">' . esc_html($project->post_title) . '</a></strong>';
		echo '</td>';

		// Статус
		echo '<td><span class="' . $status_class . '">' . esc_html($status_label) . '</span></td>';

		// Дата
		echo '<td>' . get_the_date('d.m.Y', $project_id) . '</td>';

		// Действия
		echo '<td>';
		echo '<a href="' . esc_url($edit_link) . '" class="button button-small">Редактировать</a> ';

		echo '</tr>';
	}

	echo '</tbody>';
	echo '</table>';

	// Быстрые действия
	echo '<div style="margin-top:15px;">';
	echo '<a href="' . admin_url('edit.php?post_type=project') . '" class="button">Все проекты</a> ';
	echo '<a href="' . admin_url('post-new.php?post_type=project') . '" class="button button-primary">Добавить проект</a>';
	echo '</div>';
}