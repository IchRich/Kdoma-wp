<?php
/*
Template Name: ArchivedMagazine
*/
?>
<!doctype html>
<html lang="ru">
<head>
    <!-- Базовая конфигурация документа -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Все журналы — каталог</title>

    <!-- Стили проекта -->
    <link rel="stylesheet" href="Assets/cssArchive.html.css" />

    <!-- Скрипты: переключение активного года и мобильный дропдаун -->
    <script src="Assets/js/year-toggle.js" defer></script>
    <script src="Assets/js/filter-panel.js" defer></script>
    <link rel="stylesheet" href="Assets/css/Header.css">
    <link rel="stylesheet" href="Assets/css/Archive.css">
    <script src="Assets/js/filters-panel.js" defer></script>

    <?php get_header(); ?>
</head>
<body>

<main>
<!-- Шапка: заголовок + фильтры годов -->
            <div class="container section__header">
                <div class="header">

                    <div class="breadcrumbs ">
                        <div class="title-min">
                            <a href="index.html" class="title-glav">Главная</a>
                            <a>/</a>
                            <a>Архив</a>
                        </div>
                        <h1 class="title"><?php the_title(); ?></</h1>
                    </div>
                </div>
            </div>
<div id="filter_overlay" class="filter_overlay" hidden></div>
<!-- Основной контент -->
    <section class="catalog container" aria-labelledby="y2024">
        <h2 id="y2024" class="visually_hidden">Журналы 2024</h2>

        <ul class="arhive_grid">
                      <li class="card">
                <a class="card__link" href="<?php the_permalink(); ?>">
                    <div class="card__cover">
                            <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="card__meta">
                        <h3 class="card__title"><?php the_title(); ?></h3>
                        <p class="card__year"><?php the_content(); ?></p>
                    </div>
                </a>
            </li>
        </ul>
    </section>
</main>
<?php get_footer(); ?>
</body>
</html>