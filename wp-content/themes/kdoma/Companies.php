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
    <title>Компании</title>
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
                <a>Компании</a>
            </div>
            <h1 id="page-title" class="title">Компании</h1>
        </div>

        <ul class="events__list">
        <?php
                global $post;

                $myposts = get_posts([
                    'numberposts' => 6,
                    'offset'      => 0,
                    'orderby'     => 'date',
                    'category'    => 6 // рубрика "компании"
                ]);

                if( $myposts ){
                    foreach( $myposts as $post ){
                        setup_postdata( $post );
                        ?>
                          <li class="event event__<?= get_the_tags($post)[0]->name ?>">
                                <article class="event__inner">

                                    <a class="event__media" href="<?php the_permalink(); ?>">
                                        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" loading="lazy">
                                    </a>

                                    <div class="event__content">
                                        <h3 class="event__title"><?php the_title(); ?></h3>
                                        <p class="event__meta"><?php the_excerpt(); ?></p>
                                    </div>

                                </article>
                        </li>

                        <?php
                    }
                } else { ?>
                    <p>Нет компаний для отображения.</p>
                <?php
                }
                wp_reset_postdata();
            ?>
        </ul>
    </section>
</body>