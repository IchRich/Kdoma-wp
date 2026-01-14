<?php get_header(); ?>

<?php the_post(); ?>

<main class="single-post">
  <div class="container">

    <nav class="breadcrumbs" aria-label="breadcrumb">
      <a href="<?php echo esc_url(home_url('/')); ?>">Главная</a>
      <span> / </span>
      <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>">Новости</a>
      <span> / </span>
      <span><?php the_title(); ?></span>
    </nav>

    <article class="single-post__inner">
      <h1 class="single-post__title"><?php the_title(); ?></h1>

      <div class="single-post__meta">
        <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
          <?php echo esc_html(get_the_date('d.m.Y')); ?>
        </time>
      </div>

      <?php if (has_post_thumbnail()) : ?>
        <div class="single-post__thumb">
          <?php the_post_thumbnail('large', [
            'loading' => 'lazy',
            'alt' => get_the_title()
          ]); ?>
        </div>
      <?php endif; ?>

      <div class="single-post__content">
        <?php the_content(); ?>
      </div>

      <div class="single-post__back">
        <a href="<?php echo esc_url(get_permalink()); ?>">
          ← Назад к событиям
        </a>
      </div>
    </article>

  </div>
</main>

<?php get_footer(); ?>
