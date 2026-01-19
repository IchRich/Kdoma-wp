<?php get_header(); ?>

<main>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <section class="events">
      <div class="container breadcrumbs">
        <div class="title-min">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="title-glav">Главная</a>
          <a> / </a>
          <a href="<?php echo esc_url(home_url('/Events')); ?>" class="title-glav">События</a>
          <a> / </a>
          <a><?php the_title(); ?></a>
        </div>
      </div>

      <div class="container">
        <h1 class="events__title"><?php the_title(); ?></h1>

        <?php
          $images = [];
          $max_images = 10;

          for ($i = 1; $i <= $max_images; $i++) {
            $img = get_field("event_image_$i");
            if (!empty($img) && is_array($img)) {
              $images[] = $img;
            }
          }
 
          if (empty($images)) {
            $single = get_field('event_image');
            if (!empty($single) && is_array($single)) {
              $images[] = $single;
            }
          }
        ?>

        <?php if (!empty($images)) : ?>
          <div class="events_img">
            <?php foreach ($images as $index => $img) : ?>
              <?php
                $pos = $index + 1;

                
                $is_big = ($pos === 5 || $pos === 6);

                $wrap_class = $is_big ? 'event_img' : 'event_img_mini';
                $src = $img['sizes']['large'] ?? $img['url'];
                $alt = !empty($img['alt']) ? $img['alt'] : get_the_title();
              ?>

              <div class="<?php echo esc_attr($wrap_class); ?>">
                <img
                  src="<?php echo esc_url($src); ?>"
                  alt="<?php echo esc_attr($alt); ?>"
                  loading="lazy"
                >
              </div>
              
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

        <div class="event__content">
          <?php the_content(); ?>
        </div>
      <div class="actions">
          <button class="btn">
            Показать ещё
          </button>
      </div>
      </div>
  
  
    </section>

  <?php endwhile; endif; ?>
      
</main>

<?php get_footer(); ?>
