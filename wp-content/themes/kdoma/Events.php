<?php
/*
Template Name: Events
*/
?>

<?php get_header(); ?>

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

      // Выводим кастомные события (CPT: events)
      $myposts = get_posts([
        'post_type'   => 'eventsm',   // <-- ВАЖНО: slug CPT
        'numberposts' => 6,
        'offset'      => 0,
        'orderby'     => 'date',
        'order'       => 'DESC',
      ]);

      $i = 0;

      if ($myposts) {
        foreach ($myposts as $post) {
          setup_postdata($post);

          $i++;
          $pos = (($i - 1) % 6) + 1;          // 1..6 по кругу
          $is_lg = ($pos === 2 || $pos === 6); // большие: 2 и 6
          $size_class = $is_lg ? 'event__lg' : 'event__sm';

          // Безопасно получаем класс из первого тега (если теги есть)
          $tags = get_the_tags($post->ID);
          $tag_class = ($tags && !empty($tags[0]->name)) ? sanitize_html_class($tags[0]->name) : '';

          // Первая картинка как в single: event_image_1 -> fallback event_image
          $img = get_field('event_image_1', $post->ID);
          if (!$img) {
            $img = get_field('event_image', $post->ID);
          }

          $src = '';
          $alt = get_the_title();

          if ($img) {
            // если ACF возвращает массив
            if (is_array($img)) {
              $src = $img['sizes']['large'] ?? $img['url'] ?? '';
              if (!empty($img['alt'])) $alt = $img['alt'];
            } else {
              // если вдруг ACF настроен на URL/ID
              if (is_numeric($img)) {
                $src = wp_get_attachment_image_url((int)$img, 'large') ?: '';
                $alt_meta = get_post_meta((int)$img, '_wp_attachment_image_alt', true);
                if (!empty($alt_meta)) $alt = $alt_meta;
              } elseif (is_string($img)) {
                $src = $img;
              }
            }
          }
          ?>

          <li class="event <?php echo esc_attr($size_class); ?> <?php echo $tag_class ? 'event__' . esc_attr($tag_class) : ''; ?>">
            <article class="event__inner">

              <a class="event__media" href="<?php the_permalink(); ?>">
                <?php if (!empty($src)) : ?>
                  <img
                    src="<?php echo esc_url($src); ?>"
                    alt="<?php echo esc_attr($alt); ?>"
                    loading="lazy"
                  >
                <?php endif; ?>
              </a>

              <div class="event__content">
                <h3 class="event__title"><?php the_title(); ?></h3>
                <p class="event__meta"><?php the_excerpt(); ?></p>
              </div>

            </article>
          </li>

          <?php
        }
      }

      wp_reset_postdata();
      ?>
    </ul>

    <div class="events__more">
      <button class="btn_more" type="button">Показать ещё</button>
    </div>
  </section>
</main>

<?php get_footer(); ?>
