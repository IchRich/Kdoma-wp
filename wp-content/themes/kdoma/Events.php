<?php
/*
Template Name: Events
*/
?>
<!doctype html>
<html <?= language_attributes()?>>
<head>
    <meta charset="<?php bloginfo('charset')?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>События</title>
    <!-- <link rel="stylesheet" href="Assets/css/Events.css">
    <link rel="stylesheet" href="Assets/css/Header.css"> -->
</head>
<body>
 <?php get_header()?>   
<main>
    <section class="events">
        <div class="container breadcrumbs">
            <div class="title-min">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="title-glav">Главная</a>
                <a>/</a>
                <a>События</a>
            </div>
            <h1 id="page-title" class="title">События</h1>
        </div>

        <ul class="events__list">
        <?php
                global $post;

                $myposts = get_posts([
                    'numberposts' => 6,
                    'offset'      => 0,
                    'orderby'     => 'date',
                    'category'    => 5 // рубрика "события"
                ]);

                if( $myposts ){
                    foreach( $myposts as $post ){
                        setup_postdata( $post );
                        ?>
                             <li class="event event__<?=get_the_tags($post)[0]->name?>">
                                <article class="event__inner">
                                 <a class="event__media" href="#">
                                <img src="<?=the_post_thumbnail_url()?>" alt="Открытие нового салона «Мебельград» и семинар «Квартира для посуточной аренды»" loading="lazy">
                                </a>
                            <div class="event__content">
                                <h3 class="event__title"><?=the_title()?></h3>
                                <p class="event__meta"><?=the_content()?></p>
                            </div>
                            </article>
                            </li>
                        <?php
                    }
                } else { ?>
                
                <?php }

                wp_reset_postdata(); // Сбрасываем $post
            ?>
    </ul>

        <div class="events__more">
            <button class="btn_more" type="button">Показать ещё</button>
        </div>
    </section>
</main>
<?php get_footer()?>
</body>
</html>
