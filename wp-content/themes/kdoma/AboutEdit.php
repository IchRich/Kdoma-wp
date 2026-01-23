<?php
/*
Template Name: AboutEdit
*/
get_header();
the_post();

$theme_uri = get_template_directory_uri();
?>

<!-- Локальные стили/скрипты ТОЛЬКО для этой страницы -->
<link rel="stylesheet" href="<?php echo esc_url($theme_uri . '/Assets/css/Header.css'); ?>">
<link rel="stylesheet" href="<?php echo esc_url($theme_uri . '/Assets/css/AboutEdit.css'); ?>">
<link rel="stylesheet" href="<?php echo esc_url($theme_uri . '/Assets/cssAboutEdit.htmlEdit.css'); ?>">
<script src="<?php echo esc_url($theme_uri . '/Assets/js/AboutEditSlider.js'); ?>" defer></script>

<main>
  <section class="container">
    <div class="breadcrumbs">
      <div class="title-min">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="title-glav">Главная</a>
        <a>/</a>
        <a>О редакции</a>
      </div>
      <h1 class="title">О редакции</h1>
    </div>
  </section>

  <section class="container about">
    <div class="about__grid">

      <div class="work_slider" data-slider>
        <button class="nav prev" type="button" aria-label="Предыдущий слайд"></button>

        <div class="slider__viewport">
          <div class="slider__track">
            <div class="slide">
              <img src="<?php echo esc_url($theme_uri . '/Assets/image/EditTeam.svg'); ?>" alt="Команда редакции, фото 1" />
            </div>
            <div class="slide">
              <img src="<?php echo esc_url($theme_uri . '/Assets/image/EditTeam.svg'); ?>" alt="Команда редакции, фото 2" />
            </div>
            <div class="slide">
              <img src="<?php echo esc_url($theme_uri . '/Assets/image/EditTeam.svg'); ?>" alt="Команда редакции, фото 3" />
            </div>
          </div>
        </div>

        <button class="nav next" type="button" aria-label="Следующий слайд"></button>

        <div class="slider__dots" aria-label="Пагинация"></div>
      </div>

      <article class="about__text">
        <p>
          Как воплотить эту мечту в жизнь? Где почерпнуть идеи? С кем можно разработать концепцию и обсудить детали? Кто подскажет, предложит и сделает? Где купить, заказать, получить скидку?
          Именно для тех, кто задает вопросы и тех, кто знает на них ответы, журнал «Калининградские дома» создал сайт KDoma.ru KDoma.ru собрал профессионалов города Калининграда на одной интернет-площадке с единственной целью – помочь каждому мечтателю создать свой комфортный дом.
          Именно такой, который ему нужен. Ведущие дизайнеры, архитекторы, декораторы, флористы, продавцы мебели, отделочных материалов, света, сантехники, декора, мастера-отделочники, строители — творческая, профессиональная, создающая команда, на опыт и мастерство которой вы можете положиться.
          Ищите экспертов, вдохновляйтесь идеями, выбирайте товары на KDoma.ru , создавайте уют и красоту в вашем доме! Кому нужен KDoma.ru
        </p>
        <p>
          — Всем тем, кто хочет создать уютный, красивый и комфортный дом, кто заинтересован в качественном ремонте и дизайнерских продуктах. KDoma.ru предлагает множество вариантов интерьеров и помогает в поиске новых идей.
          Понравившиеся интерьеры, идеи можно добавлять в альбомы личного кабинета.
        </p>

        <a class="about__link" href="#">Информация о результатах проведения СОУТ</a>
      </article>

    </div>

    <div class="slider__dots__outer" aria-hidden="true"></div>
  </section>

  <section class="container projects">
    <h2 class="title">Проекты</h2>

    <ul class="projects__list">

      <li class="project">
        <div class="project__item">
          <div class="project__logo">
            <img src="<?php echo esc_url($theme_uri . '/Assets/image/Stupeni.svg'); ?>" alt="Ступени">
          </div>
          <div class="project__text">
            <p>Понравившиеся интерьеры, идеи можно добавлять в альбомы личного кабинета.</p>
          </div>
        </div>
      </li>

      <li class="project">
        <div class="project__item">
          <div class="project__logo">
            <img src="<?php echo esc_url($theme_uri . '/Assets/image/KDdoma.svg'); ?>" alt="KD">
          </div>
          <div class="project__text">
            <p>Понравившиеся интерьеры, идеи можно добавлять в альбомы личного кабинета.</p>
          </div>
        </div>
      </li>

      <li class="project">
        <div class="project__item">
          <div class="project__logo">
            <img src="<?php echo esc_url($theme_uri . '/Assets/image/Premia.svg'); ?>" alt="Премия">
          </div>
          <div class="project__text">
            <p>Понравившиеся интерьеры, идеи можно добавлять в альбомы личного кабинета.</p>
          </div>
        </div>
      </li>

      <li class="project">
        <div class="project__item">
          <div class="project__logo">
            <img src="<?php echo esc_url($theme_uri . '/Assets/image/DesignWeek.svg'); ?>" alt="Design Week">
          </div>
          <div class="project__text">
            <p>Понравившиеся интерьеры, идеи можно добавлять в альбомы личного кабинета.</p>
          </div>
        </div>
      </li>

    </ul>
  </section>
</main>

<?php get_footer(); ?>
