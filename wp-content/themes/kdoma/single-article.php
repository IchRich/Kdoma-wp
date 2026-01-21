<?php
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
            <a href="<?php echo home_url('/'); ?>" class="title-glav">Про дизайн</a>
            <a class="title-glav">/</a>

            <?php
            $terms = get_the_terms(get_the_ID(), 'category');
            if ($terms && !is_wp_error($terms)) :
                $term = $terms[0];
            ?>
                <a href="<?php echo get_term_link($term); ?>" class="title-glav">
                    <?php echo esc_html($term->name); ?>
                </a>
                <a class="title-glav">/</a>
            <?php endif; ?>

            <a><?php the_title(); ?></a>
        </div>

        <h1 id="page-title" class="title">
            <?php the_field('page_title'); ?>
        </h1>
    </div>

        <!-- INTRO -->
        <div class="Designer_Flex">

            <?php if (get_field('hero_media_type') === 'video'): ?>

                <?php
                $video = get_field('hero_video');
                $video_url = '';

                if ($video) {
                    if (is_array($video) && isset($video['url'])) {
                        $video_url = $video['url'];
                    } elseif (is_numeric($video)) {
                        $video_url = wp_get_attachment_url($video);
                    } elseif (is_string($video)) {
                        $video_url = $video;
                    }
                }
                ?>

                <?php if ($video_url): ?>

                    <div class="intro-video" data-intro-video>

                        <video class="intro-video__bg"
                                data-video-bg
                                autoplay
                                muted
                                loop
                                playsinline>
                            <source src="<?php echo esc_url($video_url); ?>" type="video/mp4">
                        </video>

                        <video class="intro-video__main"
                                data-video-main
                                autoplay
                                muted
                                loop
                                playsinline
                                controls>
                            <source src="<?php echo esc_url($video_url); ?>" type="video/mp4">
                        </video>

                    </div>

                <?php endif; ?>

            <?php else: ?>

                <?php if ($img = get_field('intro_image')): ?>
                    <img class="Designer_Flex_Img"
                        src="<?php echo esc_url($img['url']); ?>"
                        alt="">
                <?php endif; ?>

            <?php endif; ?>



        <div class="Designer_Flex_Grids">

            <div class="Designer_Flex_Grids1">
                <h1><?php the_field('intro_text'); ?></h1>
            </div>

            <?php if (get_field('show_author')): ?>
                <div class="Designer_Flex_GridsB">
                    <div class="Designer_Flex_Info">
                        <h1><?php the_field('author_name'); ?></h1>
                        <p><?php the_field('author_position'); ?></p>
                    </div>

                    <?php if ($photo = get_field('author_photo')): ?>
                        <img src="<?php echo esc_url($photo['url']); ?>" alt="">
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="Designer_Flex_Grids2"></div>
        </div>
    </div>

        <div class="Designer_Flex_Grids_PadB">
            <h1><?php the_field('subtitle'); ?></h1>

            <?php if (get_field('show_author')): ?>
                <div class="Designer_Flex_Grids_PadB_">
                    <div class="Designer_Flex_Grids_PadB_Info">
                        <h1><?php the_field('author_name'); ?></h1>
                        <p><?php the_field('author_position'); ?></p>
                    </div>

                    <?php if ($photo = get_field('author_photo')): ?>
                        <img src="<?php echo esc_url($photo['url']); ?>" alt="">
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="Design_Info">

        <aside class="brand_stack" id="brandStack">
            <?php if ($magazine = get_field('magazine_cover')): ?>
                <a class="brand_stack__logo" href="/" aria-label="Перейти на главную">
                    <img src="<?php echo esc_url($magazine['url']); ?>" alt="">
                </a>
            <?php endif; ?>
        </aside>

        <ul class="cards">

            <?php if (get_field('text_1')): ?>
                <p class="Card_Title_Сontainer">
                    <?php the_field('text_1'); ?>
                </p>
            <?php endif; ?>

            <div class="Card_Grid">

                <div class="work_slider" data-slider>
                    <div class="slider__viewport">
                        <div class="slider__track">

                            <?php for ($i=1; $i<=3; $i++):
                                $img = get_field("slider1_img{$i}");
                                if ($img): ?>
                                    <div class="slide">
                                        <img src="<?php echo esc_url($img['url']); ?>" alt="">
                                    </div>
                                <?php endif;
                            endfor; ?>

                        </div>
                    </div>

                    <div class="slider__dots"></div>
                    <button class="nav prev" type="button"></button>
                    <button class="nav next" type="button"></button>
                </div>

                <?php if ($img = get_field('image_1')): ?>
                    <img src="<?php echo esc_url($img['url']); ?>" alt="">
                <?php endif; ?>
            </div>

            <?php if (get_field('text_2')): ?>
                <p class="Card_Title_Сontainer">
                    <?php the_field('text_2'); ?>
                </p>
            <?php endif; ?>

            <div class="Card_Grid">

                <?php if ($img = get_field('image_2')): ?>
                    <img class="Card_Grid_Img" src="<?php echo esc_url($img['url']); ?>" alt="">
                <?php endif; ?>

                <div class="work_slider" data-slider>
                    <div class="slider__viewport">
                        <div class="slider__track">

                            <?php for ($i=1; $i<=3; $i++):
                                $img = get_field("slider2_img{$i}");
                                if ($img): ?>
                                    <div class="slide">
                                        <img src="<?php echo esc_url($img['url']); ?>" alt="">
                                    </div>
                                <?php endif;
                            endfor; ?>

                        </div>
                    </div>

                    <div class="slider__dots"></div>
                    <button class="nav prev" type="button"></button>
                    <button class="nav next" type="button"></button>
                </div>

                <?php if ($img = get_field('image_3')): ?>
                    <img src="<?php echo esc_url($img['url']); ?>" alt="">
                <?php endif; ?>
            </div>

            <?php if (get_field('text_3')): ?>
                <p class="Card_Title_Сontainer">
                    <?php the_field('text_3'); ?>
                </p>
            <?php endif; ?>

            <!-- CONTACTS -->
        <?php if (get_field('show_contanct')): ?>
            <div class="contacts">
                <div class="contacts__grid">
                    <ul class="contacts__list">

                        <?php
                        $contacts = [
                            'site'    => ['icon'=>'site_icon.webp', 'label'=>'Сайт', 'field'=>'contact_site'],
                            'phone'   => ['icon'=>'PhoneLogo.svg', 'label'=>'Телефон', 'field'=>'contact_phone', 'prefix'=>'tel:'],
                            'address' => ['icon'=>'AdressLogo.svg', 'label'=>'Адрес', 'field'=>'contact_address'],
                            'email'   => ['icon'=>'EmailLogo.svg', 'label'=>'E-mail', 'field'=>'contact_email', 'prefix'=>'mailto:'],
                            'tg'      => ['icon'=>'TgLogo.png', 'label'=>'Telegram', 'field'=>'contact_tg'],
                            'vk'      => ['icon'=>'VkLogo.png', 'label'=>'Вконтакте', 'field'=>'contact_vk'],
                        ];

                        foreach ($contacts as $c):
                            $value = get_field($c['field']);
                            if (!$value) continue;
                        ?>
                        <li class="contact__item">
                            <div class="contact__row">
                                <div class="contact__info">
                                    <img src="<?php echo get_template_directory_uri(); ?>/Assets/image/<?php echo $c['icon']; ?>" class="contact__icon" alt="">
                                    <span class="contact__label"><?php echo $c['label']; ?></span>
                                </div>
                                <div class="contact__data">
                                    <a href="<?php echo ($c['prefix'] ?? '') . esc_attr($value); ?>">
                                        <?php echo esc_html($value); ?>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; ?>
                            <div class="contacts__map">
                                <?php if ($logo = get_field('company_logo')): ?>
                                    <img src="<?php echo esc_url($logo['url']); ?>" alt="">
                                <?php endif; ?>

                                <?php if (get_field('company_info')): ?>
                                    <p>
                                        <?php the_field('company_info'); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                    </ul>
                </div>
            </div>
           <?php endif; ?>
        </ul>

    </div>

</section>

<?php endwhile; endif; ?>

</main>

<script>
document.addEventListener('DOMContentLoaded', () => {

    const container = document.querySelector('[data-intro-video]');
    const main = document.querySelector('[data-video-main]');
    const bg   = document.querySelector('[data-video-bg]');

    if (!container || !main || !bg) return;

    bg.muted = true;

    main.addEventListener('play', () => {
        bg.currentTime = main.currentTime;
        bg.play().catch(()=>{});
    });

    main.addEventListener('pause', () => {
        bg.pause();
    });

    main.addEventListener('seeking', () => {
        bg.currentTime = main.currentTime;
    });

    main.addEventListener('timeupdate', () => {
        if (Math.abs(bg.currentTime - main.currentTime) > 0.3) {
            bg.currentTime = main.currentTime;
        }
    });

    // ОПРЕДЕЛЕНИЕ ОРИЕНТАЦИИ
    main.addEventListener('loadedmetadata', () => {
        const ratio = main.videoWidth / main.videoHeight;

        if (ratio >= 1.3) {
            container.classList.add('is-horizontal');
            container.classList.remove('is-vertical');

            bg.pause();
            bg.style.display = 'none';

            main.style.objectFit = 'cover';
        } else {
            container.classList.add('is-vertical');
            container.classList.remove('is-horizontal');

            bg.style.display = 'block';
            bg.play().catch(()=>{});

            main.style.objectFit = 'contain';
        }
    });

});
</script>


<?php get_footer(); ?>
