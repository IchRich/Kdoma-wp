<?php
get_header();
the_post();

$company_title = function_exists('get_field') ? get_field('company_title') : '';

$company_title = $company_title ?: get_the_title();
?>

<main>
  <section class="container">

    <div class="breadcrumbs">
      <div class="title-min">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="title-glav">Главная</a>
        <a class="title-glav">/</a>

        <!-- ссылка на страницу со списком компаний -->
        <a class="title-glav" href="<?php echo esc_url(get_permalink(104)); ?>">Компании</a>
        <a class="title-glav">/</a>

        <a>Компания <?php echo esc_html($company_title); ?></a>
      </div>

      <h1 class="title"><?php echo esc_html($company_title); ?></h1>
    </div>

    <?php

    $about_text  = function_exists('get_field') ? get_field('company_about_text') : '';
    $about_image = function_exists('get_field') ? get_field('company_about_image') : null;

    $about_img_url = '';
    $about_img_alt = '';

    if (!empty($about_image)) {
      if (is_array($about_image)) {
        $about_img_url = $about_image['sizes']['large'] ?? $about_image['url'] ?? '';
        $about_img_alt = $about_image['alt'] ?? '';
      } elseif (is_numeric($about_image)) {
        $about_img_url = wp_get_attachment_image_url((int)$about_image, 'large');
        $about_img_alt = get_post_meta((int)$about_image, '_wp_attachment_image_alt', true);
      } elseif (is_string($about_image)) {
        $about_img_url = $about_image;
      }
    }

    if ($about_img_alt === '') {
      $about_img_alt = $company_title;
    }
    ?>

    <div class="About_the_company">
      <div class="About_the_company_info">

        <div class="About_the_company_info_text">
          <?php if (!empty($about_text)) : ?>
            <?php echo wp_kses_post($about_text); ?>
          <?php else : ?>
            <p>Добавь текст в поле ACF <b>company_about_text</b>.</p>
          <?php endif; ?>
        </div>

        <?php if (!empty($about_img_url)) : ?>
          <img src="<?php echo esc_url($about_img_url); ?>"
               alt="<?php echo esc_attr($about_img_alt); ?>"
               loading="lazy">
        <?php endif; ?>

      </div>
    </div>

    <?php

$g_big   = function_exists('get_field') ? get_field('company_gallery_big') : null;
$g_s1    = function_exists('get_field') ? get_field('company_gallery_small_1') : null;
$g_s2    = function_exists('get_field') ? get_field('company_gallery_small_2') : null;

// маленькая функция, чтобы вытащить url/alt из array|id|url
$pp_img = function($value, $size = 'large') {
  $out = ['url' => '', 'alt' => ''];
  if (empty($value)) return $out;

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
    return $out;
  }
  return $out;
};

$img_big = $pp_img($g_big, 'large');
$img_s1  = $pp_img($g_s1, 'large');
$img_s2  = $pp_img($g_s2, 'large');

// если alt пустой — подставим заголовок компании
if ($img_big['alt'] === '') $img_big['alt'] = $company_title;
if ($img_s1['alt'] === '') $img_s1['alt'] = $company_title;
if ($img_s2['alt'] === '') $img_s2['alt'] = $company_title;

// показываем секцию, если есть хотя бы 1 фото
$has_gallery = !empty($img_big['url']) || !empty($img_s1['url']) || !empty($img_s2['url']);
?>

<?php if ($has_gallery) : ?>
  <div class="Photo_Gallery">
    <h1 class="title">Фотогалерея</h1>

    <div class="Photo_Gallery_Grid">

      <?php if (!empty($img_big['url'])) : ?>
        <article class="Photo_Gallery_Grid_Img_Big">
          <img src="<?php echo esc_url($img_big['url']); ?>"
               alt="<?php echo esc_attr($img_big['alt']); ?>"
               loading="lazy">
        </article>
      <?php endif; ?>

      <?php if (!empty($img_s1['url'])) : ?>
        <article class="Photo_Gallery_Grid_Img">
          <img src="<?php echo esc_url($img_s1['url']); ?>"
               alt="<?php echo esc_attr($img_s1['alt']); ?>"
               loading="lazy">
        </article>
      <?php endif; ?>

      <?php if (!empty($img_s2['url'])) : ?>
        <article class="Photo_Gallery_Grid_Img">
          <img src="<?php echo esc_url($img_s2['url']); ?>"
               alt="<?php echo esc_attr($img_s2['alt']); ?>"
               loading="lazy">
        </article>
      <?php endif; ?>

    </div>
  </div>
<?php endif; ?>


<?php

$schedule_raw  = function_exists('get_field') ? (string) get_field('company_schedule') : '';
$address_lines = function_exists('get_field') ? (string) get_field('company_address_lines') : '';
$phone         = function_exists('get_field') ? (string) get_field('company_phone') : '';
$email         = function_exists('get_field') ? (string) get_field('company_email') : '';
$vk            = function_exists('get_field') ? (string) get_field('company_vk') : '';
$telegram      = function_exists('get_field') ? (string) get_field('company_telegram') : '';
$site          = function_exists('get_field') ? (string) get_field('company_site') : '';
$ad_text       = function_exists('get_field') ? (string) get_field('company_ad_text') : '';
$map_iframe    = function_exists('get_field') ? (string) get_field('company_map_iframe') : '';

// --- График
$schedule_rows = [];
if (!empty(trim($schedule_raw))) {
  $lines = preg_split('/\R/u', $schedule_raw);
  foreach ($lines as $line) {
    $line = trim($line);
    if ($line === '') continue;

    $parts = array_map('trim', explode('|', $line, 2));
    $day  = $parts[0] ?? '';
    $time = $parts[1] ?? '';

    if ($day !== '' || $time !== '') {
      $schedule_rows[] = [$day, $time];
    }
  }
}

// --- Адрес
$address_arr = array_values(array_filter(array_map('trim', preg_split('/\R/u', $address_lines ?: ''))));

// --- Флаги наличия
$has_schedule = !empty($schedule_rows);
$has_address  = !empty($address_arr);
$has_phone    = !empty(trim($phone));
$has_email    = !empty(trim($email));
$has_social   = !empty(trim($vk)) || !empty(trim($telegram));
$has_site     = !empty(trim($site));
$has_map      = !empty(trim($map_iframe));

$has_contacts = $has_schedule || $has_address || $has_phone || $has_email || $has_social || $has_site || !empty(trim($ad_text)) || $has_map;
?>

<?php if ($has_contacts) : ?>
  <div class="Contacts">
    <h1 class="title">Контакты</h1>

    <div class="Contacts_Info">
      <div class="Contacts_Info_Blok">

        <div class="Contacts_Info_Blok_Grid">

          <!-- График работы  -->
          <?php if ($has_schedule) : ?>
            <article class="Contacts_Info_Blok_Grid_Box">
              <div class="work-schedule-grid">
                <div class="schedule-flex">
                  <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/Assets/image/Time.svg'); ?>" alt="">
                  <span>График работы</span>
                </div>

                <div class="schedule-rows">
                  <?php foreach ($schedule_rows as [$day, $time]) : ?>
                    <span><?php echo esc_html($day); ?></span>
                    <span><?php echo esc_html($time); ?></span>
                  <?php endforeach; ?>
                </div>
              </div>
            </article>
          <?php endif; ?>

          <!-- Адрес -->
          <?php if ($has_address) : ?>
            <article class="Contacts_Info_Blok_Grid_Box">
              <div class="work-schedule-grid">
                <div class="schedule-flex">
                  <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/Assets/image/address_icon.webp'); ?>" alt="">
                  <span>Адрес</span>
                </div>

                <div>
                  <?php foreach ($address_arr as $line) : ?>
                    <div class="schedule-flex">
                      <span><?php echo esc_html($line); ?></span>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </article>
          <?php endif; ?>

          <!-- Телефон  -->
          <?php if ($has_phone) : ?>
            <article class="Contacts_Info_Blok_Grid_Box">
              <div class="work-schedule-grid">
                <div class="schedule-flex">
                  <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/Assets/image/phone_icon.webp'); ?>" alt="">
                  <span>Телефон</span>
                </div>

                <div>
                  <a class="pp-link-reset"
                     href="tel:<?php echo esc_attr(preg_replace('/[^0-9\+]/', '', $phone)); ?>">
                    <span><?php echo esc_html($phone); ?></span>
                  </a>
                </div>
              </div>
            </article>
          <?php endif; ?>

          <!-- Email -->
          <?php if ($has_email) : ?>
            <article class="Contacts_Info_Blok_Grid_Box">
              <div class="work-schedule-grid">
                <div class="schedule-flex">
                  <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/Assets/image/email_icon.webp'); ?>" alt="">
                  <span>E-mail</span>
                </div>

                <div>
                  <a class="pp-link-reset"
                     href="mailto:<?php echo esc_attr($email); ?>">
                    <span><?php echo esc_html($email); ?></span>
                  </a>
                </div>
              </div>
            </article>
          <?php endif; ?>

          <!-- Соц сети  -->
          <?php if ($has_social) : ?>
            <article class="Contacts_Info_Blok_Grid_Box">
              <div class="work-schedule-grid">

                <div class="schedule-row">
                  <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/Assets/image/Mes.svg'); ?>" alt="">
                  <span>Соц сети</span>
                </div>

                <?php if (!empty(trim($vk))) : ?>
                  <a class="schedule-row pp-link-reset"
                     href="<?php echo esc_url($vk); ?>"
                     target="_blank" rel="noopener">
                    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/Assets/image/VkLogo.svg'); ?>" alt="">
                    <span>Вконтакте</span>
                  </a>
                <?php endif; ?>

                <?php if (!empty(trim($telegram))) : ?>
                  <a class="schedule-row pp-link-reset"
                     href="<?php echo esc_url($telegram); ?>"
                     target="_blank" rel="noopener">
                    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/Assets/image/TelegramLogo.svg'); ?>" alt="">
                    <span>Telegram</span>
                  </a>
                <?php endif; ?>

              </div>
            </article>
          <?php endif; ?>

          <!-- Сайт  -->
          <?php if ($has_site) : ?>
            <article class="Contacts_Info_Blok_Grid_Box">
              <div class="work-schedule-grid">
                <div class="schedule-flex">
                  <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/Assets/image/site_icon.webp'); ?>" alt="">
                  <span>Сайт</span>
                </div>

                <div class="schedule-row">
                  <a class="pp-link-reset"
                     href="<?php echo esc_url($site); ?>"
                     target="_blank" rel="noopener">
                    <span class="span_com"><?php echo esc_html($site); ?></span>
                  </a>
                </div>
              </div>
            </article>
          <?php endif; ?>

        </div>

        <?php if (!empty(trim($ad_text))) : ?>
          <p><?php echo esc_html($ad_text); ?></p>
        <?php endif; ?>

      </div>

      <!-- Карта -->
      <?php if ($has_map) : ?>
        <div class="contacts__map">
          <?php
          echo wp_kses(
            $map_iframe,
            [
              'iframe' => [
                'src'             => true,
                'width'           => true,
                'height'          => true,
                'frameborder'     => true,
                'allowfullscreen' => true,
                'style'           => true,
                'loading'         => true,
                'referrerpolicy'  => true,
              ]
            ]
          );
          ?>
        </div>
      <?php endif; ?>

    </div>
  </div>


  <style>
    .Contacts .pp-link-reset{
      color: inherit;
      text-decoration: none;
    }
    .Contacts .pp-link-reset:hover{
      text-decoration: none;
    }
  </style>
<?php endif; ?>
