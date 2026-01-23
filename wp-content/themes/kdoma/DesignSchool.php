<?php
/*
Template Name: DesignSchool
*/
get_header();
the_post();
?>

<style>
/* ===== ЛОКАЛЬНАЯ ПРАВКА CF7 (только для этой страницы) ===== */

/* CF7 часто добавляет <p> с отступами — они ломают grid */
.register__form .wpcf7 form p {
  margin: 0;
  padding: 0;
}

/* чтобы обёртка CF7 не влияла на ширину в сетке */
.register__form .wpcf7-form-control-wrap{
  display: block;
  width: 100%;
}

/* инпуты/textarea CF7 по ширине */
.register__form input.wpcf7-form-control,
.register__form textarea.wpcf7-form-control{
  width: 100%;
}

/* сделать textarea “как поле” (у тебя в CSS одинаковая высота) */
.register__form textarea.wpcf7-form-control{
  resize: none;
}

/* acceptance (чекбокс) — привести к виду .checkbox */
.register__form .wpcf7-acceptance,
.register__form .wpcf7-acceptance .wpcf7-list-item{
  margin: 0;
}

.register__form .wpcf7-acceptance label{
  display: flex;
  align-items: flex-start;
  gap: 0.5vw;
  font-size: inherit;
  font-weight: inherit;
  line-height: 1.4;
  cursor: pointer;
}

.register__form .wpcf7-acceptance input[type="checkbox"]{
  cursor: pointer;
  width: 0.9vw;
  height: 0.9vw;
  margin: 0.2vw 0 0 0;
}

/* submit: чтобы применились твои .btn/.btn__primary и не был “серым маленьким” */
.register__form input.wpcf7-submit{
  appearance: none;
  -webkit-appearance: none;
}

/* если CF7 выводит сообщение об ошибке — пусть не сдвигает сетку */
.register__form .wpcf7-not-valid-tip{
  margin-top: 0.3vw;
}
</style>

<main>
  <section class="page container" id="main-content">

    <!-- Хлебные крошки + заголовок (статично) -->
    <div class="breadcrumbs">
      <div class="title-min">
        <a href="<?= esc_url(home_url('/')); ?>" class="title-glav">Главная</a>
        <a>/</a>
        <a>Школа дизайна</a>
      </div>
      <h1 class="title">Школа дизайна</h1>
    </div>

    <!-- 1) HERO -->
    <div class="hero">
      <div class="hero__grid">
        <?php
        // HERO: logo
        $hero_logo = function_exists('get_field') ? get_field('ds_hero_logo') : null;

        $logo_url = '';
        $logo_alt = '';

        if (!empty($hero_logo)) {
          if (is_array($hero_logo)) {
            $logo_url = $hero_logo['sizes']['large'] ?? $hero_logo['url'] ?? '';
            $logo_alt = $hero_logo['alt'] ?? '';
          } elseif (is_numeric($hero_logo)) {
            $logo_url = wp_get_attachment_image_url((int)$hero_logo, 'large');
            $logo_alt = get_post_meta((int)$hero_logo, '_wp_attachment_image_alt', true);
          } else {
            $logo_url = (string)$hero_logo;
          }
        }
        ?>

        <div class="hero__logo">
          <?php if ($logo_url): ?>
            <img src="<?= esc_url($logo_url); ?>" alt="<?= esc_attr($logo_alt ?: 'Логотип'); ?>">
          <?php endif; ?>
        </div>

        <?php
        // HERO: center (subtitle + files + register)
        $hero_subtitle = function_exists('get_field') ? get_field('ds_hero_subtitle') : '';
        $program_file  = function_exists('get_field') ? get_field('ds_program_file') : null;
        $rules_file    = function_exists('get_field') ? get_field('ds_rules_file') : null;

        if (!function_exists('pp_acf_file_url')) {
          function pp_acf_file_url($file) {
            if (empty($file)) return '';
            if (is_array($file)) return $file['url'] ?? '';
            if (is_numeric($file)) return wp_get_attachment_url((int)$file);
            return (string)$file;
          }
        }

        $program_file_url = pp_acf_file_url($program_file);
        $rules_file_url   = pp_acf_file_url($rules_file);
        ?>

        <div class="hero__center">
          <?php if (!empty($hero_subtitle)) : ?>
            <h2 class="hero__subtitle"><?= esc_html($hero_subtitle); ?></h2>
          <?php endif; ?>

          <div class="hero__actions">
            <?php if (!empty($program_file_url)) : ?>
              <a class="btn btn__outline" href="<?= esc_url($program_file_url); ?>" download>
                <img src="<?= esc_url(get_template_directory_uri() . '/Assets/image/Document.png'); ?>" alt="" class="btn__icon">
                СКАЧАТЬ ПРОГРАММУ
              </a>
            <?php endif; ?>

            <?php if (!empty($rules_file_url)) : ?>
              <a class="btn btn__outline" href="<?= esc_url($rules_file_url); ?>" download>
                <img src="<?= esc_url(get_template_directory_uri() . '/Assets/image/Document.png'); ?>" alt="" class="btn__icon">
                СКАЧАТЬ ПОЛОЖЕНИЕ
              </a>
            <?php endif; ?>

            <a class="btn btn--primary" href="#register">ЗАПИСАТЬСЯ</a>
          </div>
        </div>

        <?php
        // HERO: right
        $hero_title = function_exists('get_field') ? get_field('ds_hero_title') : '';
        $for_whom   = function_exists('get_field') ? get_field('ds_for_whom') : '';
        $when_text  = function_exists('get_field') ? get_field('ds_when') : '';
        $where_text = function_exists('get_field') ? get_field('ds_where') : '';
        $result_txt = function_exists('get_field') ? get_field('ds_result') : '';

        $program_list_text = function_exists('get_field') ? get_field('ds_program_list') : '';
        $program_items = [];

        if (!empty($program_list_text)) {
          $program_items = array_values(array_filter(array_map('trim', preg_split("/\r\n|\n|\r/", $program_list_text))));
        }
        ?>

        <div class="hero__right">
          <?php if (!empty($hero_title)) : ?>
            <h1 class="hero__title"><?= esc_html($hero_title); ?></h1>
          <?php endif; ?>

          <?php if (!empty($for_whom)) : ?>
            <p class="hero__desc"><strong>Для кого:</strong> <?= esc_html($for_whom); ?></p>
          <?php endif; ?>

          <?php if (!empty($when_text)) : ?>
            <p class="hero__desc"><strong>Когда:</strong> <?= esc_html($when_text); ?></p>
          <?php endif; ?>

          <?php if (!empty($where_text)) : ?>
            <p class="hero__desc"><strong>Где:</strong> <?= esc_html($where_text); ?></p>
          <?php endif; ?>

          <?php if (!empty($result_txt)) : ?>
            <p class="hero__desc"><strong>Что получим:</strong> <?= esc_html($result_txt); ?></p>
          <?php endif; ?>

          <?php if (!empty($program_items)) : ?>
            <h3 class="hero__program_title">В программе:</h3>
            <ul class="hero__program_list">
              <?php foreach ($program_items as $item) : ?>
                <li><?= esc_html($item); ?></li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
        </div>

      </div>
    </div>

    <?php
    // 2) SPEAKERS
    $has_speakers = false;
    for ($i = 1; $i <= 8; $i++) {
      $name = function_exists('get_field') ? get_field("ds_speaker_{$i}_name") : '';
      if (!empty($name)) { $has_speakers = true; break; }
    }
    ?>

    <?php if ($has_speakers) : ?>
      <div class="speakers">
        <h2 class="section__title">Спикеры</h2>

        <div class="speakers__slider">
          <div class="speakers__track">
            <?php for ($i = 1; $i <= 8; $i++) :
              $photo = function_exists('get_field') ? get_field("ds_speaker_{$i}_photo") : null;
              $name  = function_exists('get_field') ? get_field("ds_speaker_{$i}_name") : '';
              $role  = function_exists('get_field') ? get_field("ds_speaker_{$i}_role") : '';

              if (empty($name)) continue;

              $photo_url = '';
              $photo_alt = $name;

              if (!empty($photo)) {
                if (is_array($photo)) {
                  $photo_url = $photo['sizes']['medium'] ?? $photo['url'] ?? '';
                  $photo_alt = $photo['alt'] ?? $name;
                } elseif (is_numeric($photo)) {
                  $photo_url = wp_get_attachment_image_url((int)$photo, 'medium');
                  $photo_alt = get_post_meta((int)$photo, '_wp_attachment_image_alt', true) ?: $name;
                } else {
                  $photo_url = (string)$photo;
                  $photo_alt = $name;
                }
              }
            ?>
              <article class="speaker">
                <?php if ($photo_url): ?>
                  <img src="<?= esc_url($photo_url); ?>" alt="<?= esc_attr($photo_alt); ?>">
                <?php endif; ?>
                <h3 class="speaker__name"><?= esc_html($name); ?></h3>
                <?php if ($role): ?>
                  <p class="speaker__role"><?= esc_html($role); ?></p>
                <?php endif; ?>
              </article>
            <?php endfor; ?>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <!-- 3) REGISTER -->
    <div class="register" id="register">
      <div class="register__grid">

        <!-- ЛЕВАЯ КОЛОНКА — СТОИМОСТЬ -->
        <div class="register__info">
          <h3>Стоимость участия</h3>
          <div class="prices-grid">
            <p class="price">Единовременный платеж<br>
              <b class="price_count">45 000 руб.</b>
            </p>
            <p class="price">Рассрочка на 5 месяцев<br>
              <b class="price_count">10 000 руб./мес.</b>
            </p>
          </div>
        </div>

        <!-- ПРАВАЯ КОЛОНКА — ФОРМА CF7 -->
        <div class="register__form">
          <h2 class="section__title">Оставьте заявку и мы с вами свяжемся</h2>

          <?php
          // ВАЖНО: id у CF7 обычно числовой. Но оставляю как у тебя.
          echo do_shortcode('[contact-form-7 id="0c51612" title="Contact form 1"]');
          ?>
        </div>

      </div>
    </div>

    <?php
    // 4) REVIEWS (убрал дублирование $reviews)
    $reviews = [];

    for ($i = 1; $i <= 6; $i++) {
      $author   = function_exists('get_field') ? get_field("ds_review_{$i}_author") : '';
      $subtitle = function_exists('get_field') ? get_field("ds_review_{$i}_subtitle") : '';
      $text     = function_exists('get_field') ? get_field("ds_review_{$i}_text") : '';

      if (empty($author) || empty($text)) continue;

      $reviews[] = [
        'author'   => $author,
        'subtitle' => $subtitle,
        'text'     => $text,
      ];
    }
    ?>

    <?php if (!empty($reviews)) : ?>
      <div class="reviews">
        <h2 class="section__title">Отзывы</h2>

        <div class="reviews__grid">
          <?php foreach ($reviews as $review) : ?>
            <article class="review">
              <h4 class="review__author"><?= esc_html($review['author']); ?></h4>

              <?php if (!empty($review['subtitle'])) : ?>
                <p class="review__date"><?= esc_html($review['subtitle']); ?></p>
              <?php endif; ?>

              <p class="review__text"><?= esc_html($review['text']); ?></p>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endif; ?>

    <?php
    // 5) ARCHIVE (убрал лишний внешний <div class="archive">)
    $workshops = [];

    for ($i = 1; $i <= 12; $i++) {
      $image = function_exists('get_field') ? get_field("ds_workshop_{$i}_image") : null;
      $title = function_exists('get_field') ? get_field("ds_workshop_{$i}_title") : '';
      $date  = function_exists('get_field') ? get_field("ds_workshop_{$i}_date") : '';

      if (empty($title)) continue;

      $img_url = '';
      $img_alt = $title;

      if (!empty($image)) {
        if (is_array($image)) {
          $img_url = $image['sizes']['large'] ?? $image['url'] ?? '';
          $img_alt = $image['alt'] ?? $title;
        } elseif (is_numeric($image)) {
          $img_url = wp_get_attachment_image_url((int)$image, 'large');
          $img_alt = get_post_meta((int)$image, '_wp_attachment_image_alt', true) ?: $title;
        } else {
          $img_url = (string)$image;
          $img_alt = $title;
        }
      }

      $workshops[] = [
        'url'   => $img_url,
        'alt'   => $img_alt,
        'title' => $title,
        'date'  => $date,
      ];
    }
    ?>

    <?php if (!empty($workshops)) : ?>
      <div class="archive">
        <h2 class="section__title">Архив воркшопов</h2>

        <div class="archive__grid">
          <?php foreach ($workshops as $w) : ?>
            <article class="workshop">
              <?php if (!empty($w['url'])) : ?>
                <img src="<?= esc_url($w['url']); ?>" alt="<?= esc_attr($w['alt']); ?>">
              <?php endif; ?>

              <h4 class="workshop__title"><?= esc_html($w['title']); ?></h4>

              <?php if (!empty($w['date'])) : ?>
                <p class="workshop__date"><?= esc_html($w['date']); ?></p>
              <?php endif; ?>
            </article>
          <?php endforeach; ?>
        </div>

        <div class="archive__actions">
          <a class="btn btn--outline" href="#">
            СМОТРЕТЬ ВСЕ
            <img src="<?= esc_url(get_template_directory_uri() . '/Assets/image/SecondPointer.png'); ?>" alt="">
          </a>
        </div>
      </div>
    <?php endif; ?>

 <?php
$phone_display  = function_exists('get_field') ? get_field('ds_phone_display') : '';
$phone_link     = function_exists('get_field') ? get_field('ds_phone_link') : '';

$address        = function_exists('get_field') ? get_field('ds_address') : '';
$email          = function_exists('get_field') ? get_field('ds_email') : '';

$tg_url         = function_exists('get_field') ? get_field('ds_telegram_url') : '';
$tg_label       = function_exists('get_field') ? get_field('ds_telegram_text') : '';

$vk_url         = function_exists('get_field') ? get_field('ds_vk_url') : '';
$vk_label       = function_exists('get_field') ? get_field('ds_vk_text') : '';

$map_iframe     = function_exists('get_field') ? get_field('ds_map_iframe') : '';

// запасные лейблы, если не задано
if (!$tg_label && $tg_url) $tg_label = $tg_url;
if (!$vk_label && $vk_url) $vk_label = $vk_url;
?>

<div class="contacts">
  <h2 class="section__title">Контакты</h2>

  <div class="contacts__grid">
    <ul class="contacts__list">

      <?php if ($phone_display && $phone_link) : ?>
        <li class="contact__item">
          <div class="contact__row">
            <div class="contact__info">
              <img src="<?= esc_url(get_template_directory_uri() . '/Assets/image/PhoneLogo.svg'); ?>" alt="" class="contact__icon">
              <span class="contact__label">Телефон</span>
            </div>
            <div class="contact__data">
              <a href="tel:<?= esc_attr($phone_link); ?>"><?= esc_html($phone_display); ?></a>
            </div>
          </div>
        </li>
      <?php endif; ?>

      <?php if (!empty($address)) : ?>
        <li class="contact__item">
          <div class="contact__row">
            <div class="contact__info">
              <img src="<?= esc_url(get_template_directory_uri() . '/Assets/image/AdressLogo.svg'); ?>" alt="" class="contact__icon">
              <span class="contact__label">Адрес</span>
            </div>
            <div class="contact__data">
              <?= nl2br(esc_html($address)); ?>
            </div>
          </div>
        </li>
      <?php endif; ?>

      <?php if (!empty($email)) : ?>
        <li class="contact__item">
          <div class="contact__row">
            <div class="contact__info">
              <img src="<?= esc_url(get_template_directory_uri() . '/Assets/image/EmailLogo.svg'); ?>" alt="" class="contact__icon">
              <span class="contact__label">E-mail</span>
            </div>
            <div class="contact__data">
              <a href="mailto:<?= esc_attr($email); ?>"><?= esc_html($email); ?></a>
            </div>
          </div>
        </li>
      <?php endif; ?>

      <?php if (!empty($tg_url)) : ?>
        <li class="contact__item">
          <div class="contact__row">
            <div class="contact__info">
              <img src="<?= esc_url(get_template_directory_uri() . '/Assets/image/TgLogo.png'); ?>" alt="" class="contact__icon">
              <span class="contact__label">Telegram</span>
            </div>
            <div class="contact__data">
              <a href="<?= esc_url($tg_url); ?>" target="_blank" rel="noopener"><?= esc_html($tg_label); ?></a>
            </div>
          </div>
        </li>
      <?php endif; ?>

      <?php if (!empty($vk_url)) : ?>
        <li class="contact__item vk">
          <div class="contact__row">
            <div class="contact__info">
              <img src="<?= esc_url(get_template_directory_uri() . '/Assets/image/VkLogo.png'); ?>" alt="" class="contact__icon">
              <span class="contact__label">Вконтакте</span>
            </div>
            <div class="contact__data">
              <a href="<?= esc_url($vk_url); ?>" target="_blank" rel="noopener"><?= esc_html($vk_label); ?></a>
            </div>
          </div>
        </li>
      <?php endif; ?>

      <?php if (!empty($map_iframe)) : ?>
        <div class="contacts__map">
          <?= $map_iframe; ?>
        </div>
      <?php endif; ?>

    </ul>
  </div>
</div>


  </section>
</main>

<?php get_footer(); ?>
