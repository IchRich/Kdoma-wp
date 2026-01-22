<?php
/*
Template Name: Companies
*/
get_header();

/**
 * НАСТРОЙКИ
 */
$POST_TYPE = 'company';
$PER_PAGE  = 9;

/**
 * ACF image → url + alt
 */
function pp_company_logo($value, $size = 'large') {
  $out = ['url' => '', 'alt' => ''];

  if (!$value) return $out;

  if (is_array($value)) {
    $out['url'] = $value['sizes'][$size] ?? $value['url'] ?? '';
    $out['alt'] = $value['alt'] ?? '';
    return $out;
  }

  if (is_numeric($value)) {
    $out['url'] = wp_get_attachment_image_url((int)$value, $size);
    $out['alt'] = get_post_meta((int)$value, '_wp_attachment_image_alt', true);
    return $out;
  }

  if (is_string($value)) {
    $out['url'] = $value;
  }

  return $out;
}

/**
 * Собирает строки company_product_1..N
 * Остановится, когда встретит первую пустую (чтобы не гонять бесконечно)
 */
function pp_company_products($max = 20) {
  if (!function_exists('get_field')) return [];

  $items = [];
  for ($i = 1; $i <= $max; $i++) {
    $field = 'company_product_' . $i;
    $val = get_field($field);

    // если поле отсутствует/пустое — прекращаем поиск дальше
    if (empty($val)) break;

    // поддержка на случай, если вдруг там массив/строка с переносами
    if (is_array($val)) {
      $val = implode(' ', array_filter(array_map('trim', $val)));
    } else {
      $val = trim((string)$val);
    }

    if ($val !== '') $items[] = $val;
  }

  return $items;
}

$query = new WP_Query([
  'post_type'      => $POST_TYPE,
  'post_status'    => 'publish',
  'posts_per_page' => $PER_PAGE,
  'orderby'        => 'date',
  'order'          => 'DESC',
]);
?>

<main>
  <section class="page container">
    <div class="company">

      <!-- Заголовок + фильтры -->
      <div class="section section__header">
        <div class="header">

          <div class="breadcrumbs">
            <div class="title-min">
              <a href="<?php echo esc_url(home_url('/')); ?>" class="title-glav">Главная</a>
              <a>/</a>
              <a>Компании</a>
            </div>
            <h1 class="title">Компании</h1>
          </div>

          <div class="breadcrumbs header__filters">
            <button class="filter_trigger">
              <span class="filter_trigger__label">Тип деятельности</span>
              <img src="<?php echo get_template_directory_uri(); ?>/Assets/image/Galochka.svg" alt="">
            </button>

            <button class="filter_trigger_icon" type="button">
              <img src="<?php echo get_template_directory_uri(); ?>/Assets/image/FilterIcon.svg" alt="">
            </button>
          </div>

        </div>
      </div>

      <!-- Каталог компаний -->
      <div class="section section__catalog">
        <div class="container">

          <div class="catalog">

            <?php if ($query->have_posts()) : ?>
              <?php while ($query->have_posts()) : $query->the_post();

                $logo    = function_exists('get_field') ? get_field('company_logo') : null;
                $tagline = function_exists('get_field') ? get_field('company_tagline') : '';
                $buy_url = function_exists('get_field') ? get_field('company_where_to_buy') : '';

                // НОВОЕ: продукты компании из ACF company_product_1..N
                $products = pp_company_products(30); // лимит можно менять

                $logo_n = pp_company_logo($logo);
                $link   = $buy_url ?: get_permalink();

                // Заголовок карточки: products -> tagline -> title
                if (!empty($products)) {
                  $card_title_html = nl2br(esc_html(implode("\n", $products)));
                } elseif (!empty($tagline)) {
                  $card_title_html = nl2br(esc_html($tagline));
                } else {
                  $card_title_html = esc_html(get_the_title());
                }
              ?>

              <article class="card" onclick="location.href='<?php echo esc_url(get_permalink()); ?>'">

                <div class="card__top">
                  <h3 class="card__title">
                    <?php echo $card_title_html; ?>
                  </h3>
                </div>

                <div class="card__row">
                  <div class="card__logo">
                   <?php if ($logo_n['url']) : ?>
                      <img src="<?php echo esc_url($logo_n['url']); ?>"
                        alt="<?php echo esc_attr($logo_n['alt'] ?: get_the_title()); ?>"
                        loading="lazy">
                   <?php endif; ?>
                  </div>

                  <a class="card__link"
                     href="<?php echo esc_url($link); ?>"
                     <?php echo $buy_url ? 'target="_blank" rel="noopener"' : ''; ?>>
                    Где купить
                    <img src="<?php echo get_template_directory_uri(); ?>/Assets/image/SecondPointer.png" alt="">
                  </a>
                </div>

              </article>

              <?php endwhile; wp_reset_postdata(); ?>
            <?php else : ?>
              <p>Компаний пока нет.</p>
            <?php endif; ?>

          </div>

          <!-- Кнопка-заглушка -->
          <div class="catalog__more">
            <button class="btn btn__outline" type="button">Показать еще</button>
          </div>

        </div>
      </div>

    </div>
  </section>
</main>

<?php get_footer(); ?>
