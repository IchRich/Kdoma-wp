<?php
get_header();
?>

<main>
<section class="page container">

    <!-- BREADCRUMBS -->
    <div class="breadcrumbs">
        <div class="title-min">
            <a href="<?php echo home_url('/'); ?>" class="title-glav">Главная</a>
            <a>/</a>
            <a>Интерьеры</a>
        </div>
        <h1 class="title">Интерьеры</h1>
    </div>

    <!-- GALLERY -->
    <div class="section section_gallery">
        <div class="cards_grid" role="list">

            <?php if (have_posts()): ?>
                <?php while (have_posts()): the_post(); ?>

                    <article class="card" role="listitem" onclick="location.href='<?php the_permalink(); ?>'">
                        <figure class="card_media">
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('large', ['class' => 'card_image', 'loading' => 'lazy']); ?>
                            <?php endif; ?>
                            <figcaption class="card_caption">
                                <?php the_title(); ?>
                            </figcaption>
                        </figure>
                    </article>

                <?php endwhile; ?>
            <?php else: ?>
                <p>Интерьеры пока не добавлены.</p>
            <?php endif; ?>

        </div>
    </div>

</section>
</main>

<?php get_footer(); ?>
