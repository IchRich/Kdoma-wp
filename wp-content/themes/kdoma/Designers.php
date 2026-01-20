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
    <link href="https://fonts.googleapis.com/css2?family=Geologica:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Assets/css/Designers.css">
    
    <script src="Assets/js/slider.js" defer></script>
    <script src="Assets/js/brand-float.js" defer></script>
    <script src="Assets/js/header.js" defer></script>
    <link rel="stylesheet" href="Assets/css/Header.css">

    <?php get_header(); ?>
</head>
<body>

<main>
    <section class="container content">
        <!-- Добавить сразу после <body> -->
        <aside class="brand_stack" id="brandStack">
            <a class="brand_stack__logo" href="/" aria-label="Перейти на главную">
                <img src="Assets/image/Oblozka_Orlova.jpg" alt="">
            </a>
            <a class="brand_stack__cta" href="/magazine" aria-label="Читать актуальный номер">
                <span class="cta__text">Читать актуальный номер</span>
                <img class="cta__arrow" src="Assets/image/Pointer.png" alt="">
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

$myposts = get_posts([
	'numberposts' => -1,
	'category'    => 11
]);

if( $myposts ){
	foreach( $myposts as $post ){
		setup_postdata( $post );
		?>
		<!-- Вывод постов, функции цикла: the_title() и т.д. -->
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
                        <a class="about__cta" href="DesignersPage.html">ПОРТФОЛИО
                            <img src="Assets/image/Pointer.svg" alt="">
                        </a>
                    </div>
                </div>

<div class="work">
    <div class="work_slider" data-slider>
    <button class="nav prev" type="button" aria-label="Предыдущий слайд"></button>
    <button class="nav next" type="button" aria-label="Следующий слайд"></button>
    
    <?php
    $work_1 = get_field('designer_work_1');
    $work_2 = get_field('designer_work_2');
    $work_3 = get_field('designer_work_3');
    $works = array_filter([$work_1, $work_2, $work_3]);
    
    if( $works ) : ?>
        <div class="work_slider__track">
            <?php foreach( $works as $image_id ) : 
                if($image_id) {
                    $image_url = wp_get_attachment_image_url($image_id, 'large');
                    if($image_url) : ?>
                        <div class="work_slider__slide">
                            <img src="<?php echo esc_url($image_url); ?>" 
                                 alt="Работа дизайнера">
                        </div>
                    <?php endif;
                }
            endforeach; ?>
        </div>
        
        <div class="work_slider__dots">
            <?php $counter = 0;
            foreach( $works as $image_id ) : 
                if($image_id) : ?>
                    <button class="dot <?php echo ($counter === 0) ? 'is_active' : ''; ?>" 
                            data-slide="<?php echo $counter; ?>"></button>
                    <?php $counter++;
                endif;
            endforeach; ?>
        </div>
    <?php endif; ?>
</div>
    </div>
</div>
            </li>
		<?php
	}
}

wp_reset_postdata(); // Сбрасываем $post
?>



            <!-- Орлова Асия -->
            <li class="row">
                <div class="about">
                    <img class="about__avatar" src="Assets/image/Asia.png" alt="Орлова Асия">
                    <div class="about__info">
                        <h3 class="about__name">Орлова Асия</h3>
                        <p class="about__roles">Дизайнер, Архитектор</p>
                        <a class="about__cta" href="DesignersPage.html"> ПОРТФОЛИО
                            <img src="Assets/image/Pointer.svg" alt="">
                        </a>
                    </div>
                </div>

                <div class="work">
                    <div class="work_slider" data-slider>
                        <button class="nav prev" type="button" aria-label="Предыдущий слайд"></button>
                        <button class="nav next" type="button" aria-label="Следующий слайд"></button>
                        <div class="work_slider__track">
                            <div class="work_slider__slide">
                                <img src="Assets/image/AsiaPhoto.svg" alt="Интерьер 1">
                            </div>
                            <div class="work_slider__slide">
                                <img src="Assets/image/AsiaPhoto.svg" alt="Интерьер 2">
                            </div>
                            <div class="work_slider__slide">
                                <img src="Assets/image/AsiaPhoto.svg" alt="Интерьер 3">
                            </div>
                        </div>
                        <div class="work_slider__dots">
                            <button class="dot is_active"></button>
                            <button class="dot"></button>
                            <button class="dot"></button>
                        </div>
                    </div>
                </div>
            </li>

            <!-- Чигирева Елена -->
            <li class="row">
                <div class="about">
                    <img class="about__avatar" src="Assets/image/Elena%20Ch.png" alt="Чигирева Елена">
                    <div class="about__info">
                        <h3 class="about__name">Чигирева Елена</h3>
                        <p class="about__roles">Дизайнер, Декоратор</p>
                        <a class="about__cta" href="DesignersPage.html">ПОРТФОЛИО
                            <img src="Assets/image/Pointer.svg" alt="">
                        </a>
                    </div>
                </div>

                <div class="work">
                    <div class="work_slider" data-slider>
                        <button class="nav prev" type="button" aria-label="Предыдущий слайд"></button>
                        <button class="nav next" type="button" aria-label="Следующий слайд"></button>
                        <div class="work_slider__track">
                            <div class="work_slider__slide">
                                <img src="Assets/image/ElenaChPhoto.svg" alt="Интерьер 1">
                            </div>
                            <div class="work_slider__slide">
                                <img src="Assets/image/ElenaChPhoto.svg" alt="Интерьер 2">
                            </div>
                            <div class="work_slider__slide">
                                <img src="Assets/image/ElenaChPhoto.svg" alt="Интерьер 3">
                            </div>
                        </div>
                        <div class="work_slider__dots">
                            <button class="dot is_active"></button>
                            <button class="dot"></button>
                            <button class="dot"></button>
                        </div>
                    </div>
                </div>
            </li>

            <!-- Безсмолова Елена -->
            <li class="row">
                <div class="about">
                    <img class="about__avatar" src="Assets/image/Elena%20B.png" alt="Безсмолова Елена">
                    <div class="about__info">
                        <h3 class="about__name">Безсмолова Елена</h3>
                        <p class="about__roles">Дизайнер</p>
                        <a class="about__cta" href="DesignersPage.html">ПОРТФОЛИО
                            <img src="Assets/image/Pointer.svg" alt="">
                        </a>
                    </div>
                </div>

                <div class="work">
                    <div class="work_slider" data-slider>
                        <button class="nav prev" type="button" aria-label="Предыдущий слайд"></button>
                        <button class="nav next" type="button" aria-label="Следующий слайд"></button>
                        <div class="work_slider__track">
                            <div class="work_slider__slide">
                                <img src="Assets/image/ElenaBPhoto.svg" alt="Интерьер 1">
                            </div>
                            <div class="work_slider__slide">
                                <img src="Assets/image/ElenaBPhoto.svg" alt="Интерьер 2">
                            </div>
                            <div class="work_slider__slide">
                                <img id="bezsmolova_elena" src="Assets/image/ElenaBPhoto.svg" alt="Интерьер 3">
                            </div>
                        </div>
                        <div class="work_slider__dots">
                            <button class="dot is_active"></button>
                            <button class="dot"></button>
                            <button class="dot"></button>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="actions">
            <button class="more" type="button" aria-label="Показать ещё материалы">ПОКАЗАТЬ ЕЩЕ</button>
        </div>
    </section>
</main>

<?php get_footer(); ?>

</body>
</html>