<?php
/*
Template Name: Home
*/
?>
<!doctype html>
<html <?= language_attributes()?>>
<head>
    <meta charset="<?php bloginfo('charset')?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <!-- до коннекта wp - <link rel="stylesheet" href="Assets/css/Home.css">
    <link rel="stylesheet" href="Assets/css/Header.css"> -->
</head>
<body>
<?php get_header()?>


<main>
    <!-- Hero -->
    <section class="hero" aria-label="Подписка на телеграм канал">
        <h1>Подпишись на наш<br>телеграм канал</h1>
        <a href="#" class="hero_btn">
            ПОДПИСАТЬСЯ
            <img src="<?php bloginfo('template_url')?>/Assets/image/TelegramLogo.png" class="hero_icon" alt="telegram" loading="lazy">
        </a>
    </section>

    <!-- Карточки -->
    <section class="cards" aria-label="Разделы сайта">
        <div class="cards_row">
            <article class="card card_tall card_designers">
                <div class="card_bg" aria-hidden="true"></div>
                <h2>ДИЗАЙНЕРЫ</h2>
                <img src="<?php bloginfo('template_url')?>/Assets/image/Pointer.png" alt="перейти" class="card_arrow" loading="lazy">
            </article>

            <article class="card card_wide card_interiors">
                <a href="Interior.html">
                    <div class="card_bg" aria-hidden="true"></div>
                    <h2>ИНТЕРЬЕРЫ</h2>
                    <img src="<?php bloginfo('template_url')?>/Assets/image/Pointer.png" alt="перейти" class="card_arrow" loading="lazy">
                </a>
            </article>

            <div class="card_col">
                <article class="card card_small card_companies">
                    <div class="card_bg" aria-hidden="true"></div>
                    <h2>КОМПАНИИ</h2>
                    <img src="<?php bloginfo('template_url')?>/Assets/image/Pointer.png" alt="перейти" class="card_arrow" loading="lazy">
                </article>

                <article class="card card_small card_banner">
                    <div class="card_bg" aria-hidden="true"></div>
                    <h2>(БАННЕР)</h2>
                    <img src="<?php bloginfo('template_url')?>/Assets/image/Pointer.png" alt="перейти" class="card_arrow" loading="lazy">
                </article>
            </div>
        </div>
    </section>

    <!-- Про дизайн -->
     <section class="about_design" aria-labelledby="about_design_title">
        <h2 id="about_design_title">Про дизайн</h2>
        <div class="about_design_row">
         <?php
        global $post;
        $i = 1;
        $myposts = get_posts([
	        'numberposts' => 3,
	        'offset'      => 0,
            'orderby'     => 'date',
	        'category'    => 3, // рубрика "про дизайн"
             
        ]);

        if( $myposts ){
            foreach( $myposts as $post ){
                setup_postdata( $post );
                ?>
                <figure class="about_design_card fig_<?=$i?>">
                    <img src="<?=the_post_thumbnail_url();?>" alt="Интерьер 1" loading="lazy">
                    <figcaption><?=the_title()?></figcaption>
                </figure>
                <?php
                $i++;
            }
        } else { ?>

        <?php
        echo "Посты не найдены.";
        }

wp_reset_postdata(); // сброс поста
?>       
        </div>
        <div class="about_design_footer">
            <a href="#" class="about_design_all">
                СМОТРЕТЬ ВСЕ <img src="<?php bloginfo('template_url')?>/Assets/image/SecondPointer.png" alt="перейти" class="design_arrow" loading="lazy">
            </a>
        </div>
    </section>  

    <!-- Журнал -->
    <section class="journal_block" aria-labelledby="journal_title">
        <h2 id="journal_title">Журнал</h2>
        <div class="journal_sidebar">
        
        <?php
            global $post;

            $myposts = get_posts([
                'numberposts' => 1,
                'offset'      => 0,
                'orderby'     => 'date',
                'category'    => 4 // рубрика "журнал"
            ]);

            if( $myposts ){
                foreach( $myposts as $post ){
                    setup_postdata( $post );
                    $journal_text = explode( "<p>",  get_the_content()); // достаем текст журнала
                    $journal_num = explode("</h2>",explode( '<h2 class="wp-block-heading">',  get_the_content())[1]); // достаем количество лет изданию (h2)
                    ?>
                      <div class="journal_numbers">
                        <div>
                            <span class="journal_big"><?=the_title()?></span>
                            <div class="journal_note">КОЛИЧЕСТВО НОМЕРОВ</div>
                        </div>
                    <div>
                         <span class="journal_big"><?=$journal_num[0]?></span> 
                        <div class="journal_note">ЛЕТ ИЗДАНИЮ</div>
                    </div>
                  </div>
                </div>
                 <div class="journal_cover">
                    <img src="<?=the_post_thumbnail_url()?>" alt="Обложка журнала" loading="lazy">
                </div>
                <div class="journal_content">
                    <div class="journal_desc">
                       <?=$journal_text[1]?>
                    </div>
                    <?php
                }
            } else {
                echo "Посты не найдены.";
            }

            wp_reset_postdata(); // сброс поста
            ?>
            <div class="journal_actions">
                <div class="journal_btns">
                    <a href="#" class="journal_btn">
                        <img src="<?php bloginfo('template_url')?>/Assets/image/Document.png" alt="перейти" class="icon" loading="lazy"> СКАЧАТЬ АКТУАЛЬНЫЙ ЖУРНАЛ
                    </a>
                    <a href="#" class="journal_btn_s journal_btn__border">
                        СМОТРЕТЬ АРХИВ <img src="<?php bloginfo('template_url')?>/Assets/image/SecondPointer.png" alt="перейти" class="arrow" loading="lazy">
                    </a>
                </div>
            </div>
        </div>


    </section>

    <!-- События -->
    <section class="events_block" aria-labelledby="events_title">
        <h2 id="events_title">События</h2>
        <div class="events_row">

            <?php
                global $post;

                $myposts = get_posts([
                    'numberposts' => 3,
                    'offset'      => 0,
                    'orderby'     => 'date',
                    'category'    => 5 // рубрика "события"
                ]);

                if( $myposts ){
                    foreach( $myposts as $post ){
                        setup_postdata( $post );
                        ?>
                        
                            <article class="event_card event_card__<?=get_the_tags($post)[0]->name?>">
                            <img src="<?=the_post_thumbnail_url()?>" alt="Событие 1" loading="lazy">
                            <div class="event_caption">
                                <?=the_title()?><br>
                                <?=the_content()?>
                            </div>
                            </article> 
                        <?php
                    }
                } else { ?>
                     <article class="event_card event_card__small">
                <img src="<?php bloginfo('template_url')?>/Assets/image/SofiDeMarkoPhoto.png" alt="Событие 1" loading="lazy">
                <div class="event_caption">
                    Появление этих постов означает, что посты не найдены.
                </div>
            </article>

            <article class="event_card event_card__wide">
                <img src="<?php bloginfo('template_url')?>/Assets/image/MebelGradPhoto.png" alt="Событие 2" loading="lazy">
                <div class="event_caption">
                    Появление этих постов означает, что посты не найдены.
                </div>
            </article>

            <article class="event_card event_card__small">
                <img src="<?php bloginfo('template_url')?>/Assets/image/WipartPhoto.png" alt="Событие 3" loading="lazy">
                <div class="event_caption">
                   Появление этих постов означает, что посты не найдены.
                </div>
            </article>
                <?php }

                wp_reset_postdata(); // Сбрасываем $post
            ?>
        </div>

        <div class="events_footer">
            <a href="#" class="events_btn">
                СМОТРЕТЬ ВСЕ <img src="<?php bloginfo('template_url')?>/Assets/image/SecondPointer.png" alt="перейти" class="events_arrow" loading="lazy">
            </a>
        </div>
    </section>

    <!-- О редакции -->
    <section class="about_editorial" aria-labelledby="about_editorial_title">
        <h2 id="about_editorial_title">О редакции</h2>
        <div class="about_editorial__content">
            <div class="about_editorial__col">
                <div class="about_editorial__title">Калининградские дома</div>
                <div class="about_editorial__text">
                    <p>KDoma.ru — ваш дом начинается здесь. Находите проверенных специалистов, вдохновляйтесь реализованными проектами и получайте актуальные советы по созданию идеального пространства.</p>
                </div>
            </div>

            <div class="about_editorial__col">
                <ul class="about_editorial__list">
                    <li>Каталог топовых архитекторов и дизайнеров</li>
                    <li>Реальные кейсы и тренды интерьерных решений <br/> <a href="#" class="readmore">Читать далее</a></li>
                </ul>
            </div>

            <div class="about_editorial__col">
                <div class="about_editorial__title">Желаете разместить рекламу на нашем сайте?</div>
                <div class="about_editorial__text">
                    Свяжитесь с нашим менеджером по рекламе:
                    <a class="mail" href="mailto:project@kdoma.ru">project@kdoma.ru</a>
                </div>
                <a href="#" class="about_editorial__btn">
                    АКТУАЛЬНЫЙ ПРАЙС <img src="<?php bloginfo('template_url')?>/Assets/image/SecondPointer.png" alt="перейти" class="about_editorial__arrow" loading="lazy">
                </a>
            </div>

            <div class="about_editorial__col">
                <div class="about_editorial__title">Хотите опубликовать реализованный проект?</div>
                <div class="about_editorial__text">
                    Заполните заявку перейдя по данной ссылке
                </div>
                <a href="#" class="about_editorial__btn__red ">
                    РАЗМЕСТИТЬ ИНТЕРЬЕР <img src="<?php bloginfo('template_url')?>/Assets/image/WhitePointer.png" alt="перейти" class="about_editorial__arrow" loading="lazy">
                </a>
            </div>
        </div>
    </section>
</main>
<?php get_footer()?>
</body>
</html>
