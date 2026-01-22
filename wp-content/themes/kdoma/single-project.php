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


        <?php
        // 2. ПОЛУЧАЕМ ИЗОБРАЖЕНИЯ ПРОЕКТА
        $images = [];

        // Главное изображение (миниатюра поста)
        if (has_post_thumbnail($project_id)) {
            $images[] = [
                'url' => get_the_post_thumbnail_url($project_id, 'large'),
                'class' => 'is_big_in_grid',
                'is_main' => true
            ];
        }

        // Дополнительные изображения из ACF полей
        for ($i = 1; $i <= 20; $i++) { // Увеличил до 20 на всякий случай
            $image_field = 'project_img_' . $i;
            $image_id = get_field($image_field, $project_id);

            if ($image_id) {
                $image_url = wp_get_attachment_image_url($image_id, 'large');
                if ($image_url) {
                    $images[] = [
                        'url' => $image_url,
                        'class' => '',
                        'is_main' => false
                    ];
                }
            }
        }

        if (!empty($images)):
            ?>
            <div class="Portfolio_Grid">
                <?php
                $index = 0;
                $total_images = count($images);

                foreach ($images as $image):
                    // Определяем размер изображения по логике чередования
                    $is_big = false;

                    if ($index == 0) {
                        // Главное изображение - всегда большое
                        $is_big = true;
                    } else {
                        // Логика чередования для остальных изображений:
                        // Позиции в 0-based индексе (реальные позиции в скобках):
                        // 1-2 (позиции 2-3): маленькие
                        // 3-4 (позиции 4-5): большие  
                        // 5-8 (позиции 6-9): маленькие
                        // 9-10 (позиции 10-11): большие
                        // 11-16 (позиции 12-17): маленькие
                        // 17-18 (позиции 18-19): большие
                        // и т.д.
            
                        // Считаем с 1 для удобства
                        $position = $index + 1;

                        if ($position >= 2 && $position <= 3) {
                            // Позиции 2-3: маленькие
                            $is_big = false;
                        } elseif ($position >= 4 && $position <= 5) {
                            // Позиции 4-5: большие
                            $is_big = true;
                        } elseif ($position >= 6 && $position <= 9) {
                            // Позиции 6-9: маленькие
                            $is_big = false;
                        } elseif ($position >= 10 && $position <= 11) {
                            // Позиции 10-11: большие
                            $is_big = true;
                        } elseif ($position >= 12 && $position <= 17) {
                            // Позиции 12-17: маленькие
                            $is_big = false;
                        } elseif ($position >= 18 && $position <= 19) {
                            // Позиции 18-19: большие
                            $is_big = true;
                        } elseif ($position >= 20 && $position <= 25) {
                            // Позиции 20-25: маленькие
                            $is_big = false;
                        } elseif ($position >= 26 && $position <= 27) {
                            // Позиции 26-27: большие
                            $is_big = true;
                        } else {
                            // По умолчанию (если больше 27) - продолжаем паттерн
                            // Определяем группу
                            $group = floor(($position - 2) / 8); // Каждые 8 позиций повторяется паттерн
                            $pos_in_group = ($position - 2) % 8;

                            // В каждой группе из 8 позиций:
                            // 0-1: маленькие (позиции 2-3 в группе)
                            // 2-3: большие (позиции 4-5 в группе)  
                            // 4-7: маленькие (позиции 6-9 в группе)
                            $is_big = ($pos_in_group >= 2 && $pos_in_group <= 3);
                        }
                    }

                    $grid_class = $is_big ? 'Portfolio_Grid_Info_Big' : 'Portfolio_Grid_Info';
                    $img_class = $is_big ? 'Portfolio_Grid_Info_Img' : 'Portfolio_Grid_Info_Img_Mini';

                    // Если изображение главное, добавляем особый класс
                    if ($image['is_main']) {
                        $img_class .= ' is_big_in_grid';
                    }
                    ?>

                    <article class="<?php echo esc_attr($grid_class); ?>">
                        <div class="project-image-wrapper">
                            <img class="<?php echo esc_attr($img_class); ?>" src="<?php echo esc_url($image['url']); ?>"
                                alt="<?php echo esc_attr(get_the_title($project_id) . ' - изображение ' . ($index + 1)); ?>"
                                data-index="<?php echo $index; ?>" data-position="<?php echo ($index + 1); ?>">
                        </div>
                    </article>

                    <?php
                    $index++;
                endforeach;
                ?>
            </div>

        <?php else: ?>
            <p class="no-images">Изображения проекта пока не добавлены.</p>
        <?php endif; ?>

    </section>
</main>
<?php get_footer(); ?>