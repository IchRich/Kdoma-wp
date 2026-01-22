<?php get_header(); ?>
<main>
    <section class="container">
        <div class="breadcrumbs">
            <div class="title-min">
                <!-- Главная страница -->
                <a href="<?php echo home_url('/'); ?>" class="title-glav">Главная</a>
                <span class="title-glav">/</span>

                <!-- Страница дизайнеров -->
                <?php
                // Получаем ссылку на страницу архива дизайнеров
                $designers_archive_url = get_post_type_archive_link('designer');

                // ИЛИ если у вас есть отдельная страница Designers.php с шаблоном
                // Можно найти страницу по slug или ID
                $designers_page = get_page_by_path('designers'); // если slug страницы 'designers'
                
                if ($designers_page) {
                    $designers_url = get_permalink($designers_page->ID);
                } else {
                    $designers_url = $designers_archive_url ?: '#';
                }
                ?>
                <a href="<?php echo esc_url($designers_url); ?>" class="title-glav">Дизайнеры</a>
                <span class="title-glav">/</span>

                <!-- Конкретный дизайнер -->
                <?php
                $project_id = get_the_ID();
                $designer_id = get_field('project_designer', $project_id);

                if ($designer_id):
                    $designer_name = get_the_title($designer_id);
                    $designer_url = get_permalink($designer_id);
                    ?>
                    <a href="<?php echo esc_url($designer_url); ?>" class="title-glav">
                        <?php echo esc_html($designer_name); ?>
                    </a>
                    <span class="title-glav">/</span>
                <?php endif; ?>

                <!-- Текущий проект (без ссылки, активная страница) -->
                <span class="current"><?php the_title(); ?></span>
            </div>
            <h1 id="page-title" class="title"><?php the_title(); ?></h1>
        </div>


        <div class="Designers_Page_Grid">
            <article class="Designers_Grid_Info">
                <?php the_post_thumbnail(); ?>
                <p><?php the_content(); ?></p>
            </article>
            <article class="Designers_Grid">
                <h1>Контакты</h1>
                <ul class="Designers_Grid_Contacts">
                    <li>
                        <img src="<?php bloginfo('template_url') ?>/Assets/image/site_icon.webp" alt="">
                        <a href="<?php the_field('site'); ?>"><?php the_field('site'); ?></a>
                    </li>
                    <li>
                        <img src="<?php bloginfo('template_url') ?>/Assets/image/phone_icon.webp" alt="">
                        <a><?php the_field('phone'); ?></a>
                    </li>
                    <li>
                        <img src="<?php bloginfo('template_url') ?>/Assets/image/vk_icon.webp" alt="">
                        <a><?php the_field('vk'); ?></a>
                    </li>
                    <li>
                        <img src="<?php bloginfo('template_url') ?>/Assets/image/telegram_icon.webp" alt="">
                        <a><?php the_field('telegram'); ?></a>
                    </li>
                    <li>
                        <img src="<?php bloginfo('template_url') ?>/Assets/image/email_icon.webp" alt="">
                        <a><?php the_field('email'); ?></a>
                    </li>
                </ul>
                <h6 class="title-glava">
                    <?php the_field('ad') ?>
                </h6>
            </article>
            <article class="Designers_Grid">
                <h1>Услуги</h1>
                <?php the_field('services'); ?>
            </article>
            <article class="Designers_Grid">
                <div class="About_Me">
                    <h1>О себе</h1>
                    <?php the_field('about_me'); ?>
                </div>
                <div>
                    <h1>Прайс</h1>
                    <?php the_field('price'); ?>
                </div>
            </article>
        </div>
        <div class="Designers_Page_Grid_mob">
            <div class="Designers_Page_Grid_mob_info">
                <img src="<?php bloginfo('template_url') ?>/Assets/image/Ekaterina.png" alt="">
                <div class="Designers_Grid_Contacts">
                    <h1>Дизайнер</h1>
                    <div>
                        <img src="<?php bloginfo('template_url') ?>/Assets/image/site_icon.webp" alt="">
                        <a href="https://dozorec.pro/">Сайт</a>
                    </div>
                    <div>
                        <img src="<?php bloginfo('template_url') ?>/Assets/image/phone_icon.webp" alt="">
                        <a>Телефон</a>
                    </div>
                    <div>
                        <img src="<?php bloginfo('template_url') ?>/Assets/image/vk_icon.webp" alt="">
                        <a>Вконтакте</a>
                    </div>
                    <div>
                        <img src="<?php bloginfo('template_url') ?>/Assets/image/telegram_icon.webp" alt="">
                        <a>Telegram</a>
                    </div>
                    <div>
                        <img src="<?php bloginfo('template_url') ?>/Assets/image/email_icon.webp" alt="">
                        <a>E-mail</a>
                    </div>
                </div>
            </div>
            <div class="actions">
                <button class="btn_Archive">ДОП.ИНФОРМАЦИЯ</button>
            </div>
        </div>

        <div class="Portfolio">
            <h1 class="title">Портфолио</h1>
            <?php
            // Получаем ID текущего дизайнера (со страницы дизайнера)
            $current_designer_id = get_the_ID(); // Это ID дизайнера на странице single-designer.php
            
            // Получаем проекты ТОЛЬКО этого дизайнера
            $projects = get_posts([
                'post_type' => 'project',
                'posts_per_page' => 6,
                'orderby' => 'menu_order',
                'order' => 'ASC',
                'meta_query' => [
                    [
                        'key' => 'project_designer', // Поле ACF для связи с дизайнером
                        'value' => $current_designer_id,
                        'compare' => '='
                    ]
                ]
            ]);

            if ($projects):
                ?>
                <div class="Portfolio_Grid">
                    <?php
                    $index = 0;
                    foreach ($projects as $project):
                        $project_id = $project->ID;
                        $project_url = get_permalink($project_id);

                        // Получаем специальное изображение для сетки из ACF
                        $grid_image = get_field('portfolio_grid_image', $project_id);
                        $is_big_image = get_field('is_big_in_grid', $project_id);

                        // Если нет специального поля, используем миниатюру
                        if (!$grid_image && has_post_thumbnail($project_id)) {
                            $grid_image = get_the_post_thumbnail_url($project_id, 'large');
                        }

                        // Определяем классы
                        $is_big = ($is_big_image) ? $is_big_image : ($index == 2 || $index == 3);
                        $grid_class = $is_big ? 'Portfolio_Grid_Info_Big' : 'Portfolio_Grid_Info';
                        $img_class = $is_big ? 'Portfolio_Grid_Info_Img' : 'Portfolio_Grid_Info_Img_Mini';

                        // Если нет изображения, используем заглушку
                        if (!$grid_image) {
                            if ($is_big) {
                                $grid_image = get_template_directory_uri() . '/Assets/image/ApartmentInterior.svg';
                            } else {
                                $mini_images = ['Cirkovaya.svg', 'Koloskov.svg'];
                                $grid_image = get_template_directory_uri() . '/Assets/image/' . $mini_images[$index % 2];
                            }
                        }
                        ?>

                        <article class="<?php echo esc_attr($grid_class); ?>">
                            <a href="<?php echo esc_url($project_url); ?>" class="project-link"
                                style="text-decoration: none; color: #000;">
                                <img class="<?php echo esc_attr($img_class); ?>" src="<?php echo esc_url($grid_image); ?>"
                                    alt="<?php echo esc_attr(get_the_title($project_id)); ?>">
                                <p><?php echo esc_html(get_the_title($project_id)); ?></p>
                            </a>

                            <?php
                            // Можно вывести краткое описание
                            $short_desc = get_field('short_description', $project_id);
                            if ($short_desc && $is_big): ?>
                                <div class="project-excerpt">
                                    <?php echo wp_kses_post($short_desc); ?>
                                </div>
                            <?php endif; ?>
                        </article>

                        <?php
                        $index++;
                    endforeach;
                    ?>
                </div>

            <?php else: ?>
                <p class="no-projects">У этого дизайнера пока нет проектов.</p>
            <?php endif; ?>

            <?php
            // Кнопка "ВСЕ ПРОЕКТЫ" - можно оставить или убрать
            // Если оставить, она может вести на страницу со всеми проектами дизайнера
            if ($projects && count($projects) > 6):
                $all_projects_url = add_query_arg('show_all', 'true', get_permalink($current_designer_id));
                ?>
                <div class="actions">
                    <a href="<?php echo esc_url($all_projects_url); ?>" class="btn_Archive">
                        ВСЕ ПРОЕКТЫ
                        <img src="<?php bloginfo('template_url') ?>/Assets/image/button_icon.webp" alt="">
                    </a>
                </div>
            <?php endif; ?>
        </div>
        </div>
    </section>
    <section class="Publications">
        <div class="container">
            <h1 class="title">Публикации</h1>
            <div class="Portfolio_Grid">
                <article class="Portfolio_Grid_Info">
                    <img class="Portfolio_Grid_Info_Img_Mini"
                        src="<?php bloginfo('template_url') ?>/Assets/image/Brodskogo.svg" alt="">
                    <p>Трехуровневая квартира в немецком фонде</p>
                </article>
                <article class="Portfolio_Grid_Info">
                    <img class="Portfolio_Grid_Info_Img_Mini"
                        src="<?php bloginfo('template_url') ?>/Assets/image/Koloskov.svg" alt="">
                    <p>Авторская подача</p>
                </article>
                <article class="Portfolio_Grid_Info_Big">
                    <img class="Portfolio_Grid_Info_Img"
                        src="<?php bloginfo('template_url') ?>/Assets/image/ApartmentInterior.svg" alt="">
                    <p>Стены как картины</p>
                </article>
            </div>
            <div class="actions_publications">
                <button class="btn_Archive">ВСЕ ПУБЛИКАЦИИ <img
                        src="<?php bloginfo('template_url') ?>/Assets/image/button_icon.webp" alt=""></button>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>