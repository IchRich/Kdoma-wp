<?php
/* Template Name: Interior Single */
get_header();
?>

<main>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<section class="container">

    <!-- BREADCRUMBS -->
    <div class="breadcrumbs">
        <div class="title-min">
            <a href="<?php echo home_url('/'); ?>" class="title-glav">Главная</a>
            <a class="title-glav">/</a>
            <a href="<?php echo get_post_type_archive_link('interior'); ?>" class="title-glav">Интерьеры</a>
            <a class="title-glav">/</a>
            <a><?php the_field('interior_title'); ?></a>
        </div>
        <h1 id="page-title" class="title"><?php the_field('interior_title'); ?></h1>
    </div>

    <!-- INTRO -->
    <div class="Designer_Flex">

        <?php if ($img = get_field('designer_image')): ?>
            <img class="Designer_Flex_Img" src="<?php echo esc_url($img['url']); ?>" alt="">
        <?php endif; ?>

        <div class="Designer_Flex_Grids">

            <div class="Designer_Flex_Grids1">
                <div class="Designer_Flex_Grids1_L">
                    <div><h2>Город</h2><p><?php the_field('city'); ?></p></div>
                    <div><h2>Площадь</h2><p><?php the_field('area'); ?></p></div>
                    <div><h2>Кол-во комнат</h2><p><?php the_field('rooms'); ?></p></div>
                </div>
                <div class="Designer_Flex_Grids1_R">
                    <div><h2>Фото</h2><p><?php the_field('photo_author'); ?></p></div>
                    <div><h2>Стиль</h2><p><?php the_field('style'); ?></p></div>
                    <div><h2>Текст</h2><p><?php the_field('text_author'); ?></p></div>
                </div>
            </div>

            <div class="Designer_Flex_Grids2">
                <div class="Designer_Flex_Grids2_L">
                    <div>
                        <h1><?php the_field('designer_name'); ?></h1>
                        <p><?php the_field('designer_profession'); ?></p>
                    </div>

                    <div class="Designer_Flex_Grids2_L_Info">
                        <div><img src="<?php echo get_template_directory_uri(); ?>/Assets/image/site_icon.webp"><p><?php the_field('designer_site'); ?></p></div>
                        <div><img src="<?php echo get_template_directory_uri(); ?>/Assets/image/phone_icon.webp"><p><?php the_field('designer_phone'); ?></p></div>
                        <div><img src="<?php echo get_template_directory_uri(); ?>/Assets/image/vk.svg"><p><?php the_field('designer_vk'); ?></p></div>
                        <div><img src="<?php echo get_template_directory_uri(); ?>/Assets/image/telegram_icon.webp"><p><?php the_field('designer_telegram'); ?></p></div>
                        <div><img src="<?php echo get_template_directory_uri(); ?>/Assets/image/email_icon.webp"><p><?php the_field('designer_email'); ?></p></div>
                    </div>

                    <div class="Advertisement_Text">
                        <p><?php the_field('designer_advertisement'); ?></p>
                    </div>
                </div>

                <?php if ($img = get_field('contact_image')): ?>
                    <img src="<?php echo esc_url($img['url']); ?>" alt="">
                <?php endif; ?>
            </div>

        </div>
    </div>

    <!-- CONTENT -->
    <div class="Design_Info">

        <aside class="brand_stack" id="brandStack">
            <?php if ($logo = get_field('brand_stack_logo')): ?>
                <a class="brand_stack__logo" href="/">
                    <img src="<?php echo esc_url($logo['url']); ?>" alt="">
                </a>
            <?php endif; ?>
            <a class="brand_stack__cta" href="<?php the_field('brand_stack_link'); ?>">
                <span class="cta__text"><?php the_field('brand_stack_cta_text'); ?></span>
                <img class="cta__arrow" src="<?php echo get_template_directory_uri(); ?>/Assets/image/Pointer.png">
            </a>
        </aside>

        <ul class="cards">

            <!-- TEXT 1 -->
            <p class="Card_Title_Сontainer"><?php the_field('text_1'); ?></p>

            <!-- GRID 1 -->
            <div class="Card_Grid">
                <div class="work_slider" data-slider>
                    <div class="slider__viewport">
                        <div class="slider__track">
                            <?php for ($i=1;$i<=3;$i++):
                                $img = get_field("slider1_img{$i}");
                                if ($img): ?>
                                    <div class="slide"><img src="<?php echo esc_url($img['url']); ?>"></div>
                                <?php endif;
                            endfor; ?>
                        </div>
                    </div>
                    <div class="slider__dots"></div>
                    <button class="nav prev"></button>
                    <button class="nav next"></button>
                </div>

                <?php if ($img = get_field('image_1')): ?>
                    <img src="<?php echo esc_url($img['url']); ?>">
                <?php endif; ?>
            </div>

            <!-- TEXT 2 -->
            <p class="Card_Title_Сontainer"><?php the_field('text_2'); ?></p>

            <!-- GRID 2 -->
            <div class="Card_Grid">
                <?php if ($img = get_field('image_2')): ?>
                    <img class="Card_Grid_Img" src="<?php echo esc_url($img['url']); ?>">
                <?php endif; ?>

                <div class="work_slider" data-slider>
                    <div class="slider__viewport">
                        <div class="slider__track">
                            <?php for ($i=1;$i<=3;$i++):
                                $img = get_field("slider2_img{$i}");
                                if ($img): ?>
                                    <div class="slide"><img src="<?php echo esc_url($img['url']); ?>"></div>
                                <?php endif;
                            endfor; ?>
                        </div>
                    </div>
                    <div class="slider__dots"></div>
                    <button class="nav prev"></button>
                    <button class="nav next"></button>
                </div>

                <?php if ($img = get_field('image_3')): ?>
                    <img src="<?php echo esc_url($img['url']); ?>">
                <?php endif; ?>
            </div>

            <!-- TEXT 3 -->
            <p class="Card_Title_Сontainer"><?php the_field('text_3'); ?></p>

                    <div class="Design_Plan_Grid">

                    <div class="Design_Plan_Grid_Left">
                        <div>
                            <h1>План</h1>

                            <?php
                            $plan_list = get_field('plan_list');
                            if ($plan_list):
                                $items = array_filter(array_map('trim', explode("\n", $plan_list)));
                                $i = 1;
                                foreach ($items as $item):
                            ?>
                                <p><?php echo $i . '. ' . esc_html($item); ?></p>
                            <?php
                                $i++;
                                endforeach;
                            endif;
                            ?>
                        </div>
                    </div>

                    <?php if ($img = get_field('plan_image')): ?>
                        <img src="<?php echo esc_url($img['url']); ?>" alt="">
                    <?php endif; ?>

                    <div class="Design_Plan_Grid_Right">

                        <h1>Участники проекта</h1>

                        <?php
                        $participants = get_field('participants_list');
                        if ($participants):
                            $items = array_filter(array_map('trim', explode("\n", $participants)));
                            foreach ($items as $item):
                        ?>
                            <p><?php echo esc_html($item); ?></p>
                        <?php
                            endforeach;
                        endif;
                        ?>

                    </div>

                </div>


        </ul>

    </div>

</section>

<?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
