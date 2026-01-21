<?php
/*
Template Name: Designers
*/
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Дизайнеры</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geologica:wght@200;300;400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="Assets/css/Designers.css">

    <script src="Assets/js/slider.js" defer></script>
    <script src="Assets/js/brand-float.js" defer></script>
    <script src="Assets/js/header.js" defer></script>
    <link rel="stylesheet" href="Assets/css/Header.css">

</head>

<body>

    <?php get_header(); ?>

    <main>
        <section class="container content">
            <!-- Добавить сразу после <body> -->
            <aside class="brand_stack" id="brandStack">
                <a class="brand_stack__logo" href="/" aria-label="Перейти на главную">
                    <img src="<?php bloginfo('template_url') ?>/Assets/image/Oblozka_Orlova.jpg" alt="">
                </a>
                <a class="brand_stack__cta" href="/magazine" aria-label="Читать актуальный номер">
                    <span class="cta__text">Читать актуальный номер</span>
                    <img class="cta__arrow" src="<?php bloginfo('template_url') ?>/Assets/image/Pointer.png" alt="">
                </a>
            </aside>
            <div class="breadcrumbs">
                <div class="title-min">
                    <a href="index.html" class="title-glav">Главная</a>
                    <a>/</a>
                    <a>Дизайнеры</a>
                </div>
                <h1 id="page-title" class="title">Дизайнеры</h1>
            </div>

            <ul class="cards">
                <!-- Карточка -->

                <?php
                global $post;

                $designers = get_posts([
                    'post_type' => 'designer',
                    'numberposts' => -1,
                ]);

                if ($designers) {
                    foreach ($designers as $post) {
                        setup_postdata($post);
                        $current_designer_id = get_the_ID(); // ID текущего дизайнера в цикле
                        ?>
                        <li class="row">
                            <div class="about">
                                <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('medium', array('class' => 'about__avatar'));
                                } else {
                                    echo '<div class="about__avatar about__avatar--placeholder">Нет фото</div>';
                                }
                                ?>
                                <div class="about__info">
                                    <h3 class="about__name"><?php the_title(); ?></h3>
                                    <p class="about__roles"><?php the_content(); ?></p>
                                    <a class="about__cta" href="<?php the_permalink(); ?>">ПОРТФОЛИО
                                        <img src="<?php bloginfo('template_url') ?>/Assets/image/Pointer.svg" alt="">
                                    </a>
                                </div>
                            </div>

                            <div class="work">
                                <div class="work_slider" data-slider>
                                    <button class="nav prev" type="button" aria-label="Предыдущий слайд"></button>
                                    <button class="nav next" type="button" aria-label="Следующий слайд"></button>

                                    <?php
                                    // ПОЛУЧАЕМ ПРОЕКТЫ ЭТОГО ДИЗАЙНЕРА
                                    $projects = get_posts([
                                        'post_type' => 'project',
                                        'posts_per_page' => 3, // Все проекты
                                        'meta_query' => [
                                            [
                                                'key' => 'project_designer', // Имя вашего поля ACF
                                                'value' => $current_designer_id,
                                                'compare' => '='
                                            ]
                                        ],
                                        'orderby' => 'date',
                                        'order' => 'DESC'
                                    ]);

                                    if ($projects): ?>
                                        <div class="work_slider__track">
                                            <?php
                                            $counter = 0;
                                            foreach ($projects as $project):
                                                $project_id = $project->ID;
                                                $project_title = get_the_title($project_id);
                                                $project_url = get_permalink($project_id);

                                                // Получаем миниатюру проекта
                                                if (has_post_thumbnail($project_id)) {
                                                    $image_url = get_the_post_thumbnail_url($project_id, 'large');
                                                } else {
                                                    // Если нет миниатюры, можно поставить заглушку
                                                    $image_url = get_template_directory_uri() . '/Assets/image/placeholder.jpg';
                                                }
                                                ?>
                                                <div class="work_slider__slide">
                                                    <img src="<?php echo esc_url($image_url); ?>">
                                                </div>
                                                <?php
                                                $counter++;
                                            endforeach; ?>
                                        </div>

                                        <?php if (count($projects) > 1): ?>
                                            <div class="work_slider__dots">
                                                <?php for ($i = 0; $i < $counter; $i++): ?>
                                                    <button class="dot <?php echo ($i === 0) ? 'is_active' : ''; ?>"
                                                        data-slide="<?php echo $i; ?>"></button>
                                                <?php endfor; ?>
                                            </div>
                                        <?php endif; ?>

                                    <?php else: ?>
                                        <div class="no-projects">
                                            <p>У этого дизайнера пока нет проектов</p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                }

                wp_reset_postdata();
                ?>

            </ul>
            <div class="actions">
                <button class="more" type="button" aria-label="Показать ещё материалы">ПОКАЗАТЬ ЕЩЕ</button>
            </div>
        </section>
    </main>

    <?php get_footer(); ?>

</body>

</html>