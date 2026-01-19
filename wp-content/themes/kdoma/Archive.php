<?php
/*
Template Name: Archive
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
                        <h1 class="title">Архив</h1>
                    </div>

                    <div class="breadcrumbs header__filters">
                        <!-- Десктопный триггер -->
                        <button id="filter_trigger_desktop" class="filter_trigger" aria-haspopup="dialog" aria-expanded="false"
                                aria-controls="filter_dropdown">
                            <span class="filter_trigger__label">Год выпуска</span>
                            <img src="Assets/image/Galochka.svg" alt="">
                        </button>

                        <!-- Мобильный триггер -->
                        <button id="filter_trigger_mobile" class="filter_trigger_icon" type="button" aria-label="Фильтры">
                            <img class="filter_trigger_icon__img" src="Assets/image/FilterIcon.svg" alt="">
                        </button>

                        <!-- Компактная плашка-дропдаун прямо под кнопкой -->
                        <div class="filter_dropdown" id="filter_dropdown" hidden>
                            <div class="filter_dropdown__panel" role="dialog" aria-modal="false"
                                 aria-labelledby="filter_panel_title">
                                 
                                <div class="mobile_drawer__head">
                                    <img src="Assets/image/SearchIcon.png" alt="">
                                    <!-- <form class="mobile_search" role="search" action="/search">
                                        <input type="search" name="q" placeholder="Поиск" aria-label="Поиск">
                                    </form> -->
                                    <button type="button" class="mobile_drawer__close filter_dropdown__close" aria-label="Закрыть меню"></button>
                                </div>

                                <div class="filter_dropdown__body">
                                    <!-- Год выпуска -->
                                    <details class="filter_acc" open>
                                        <summary class="filter_acc__sum">Год выпуска<img src="Assets/image/Galochka.svg" alt=""></summary>
                                        <div class="filter_acc__body">
                                           <label class="filter_check"><input type="checkbox" name="year[]" value="2025"> 2025</label>
<label class="filter_check"><input type="checkbox" name="year[]" value="2024"> 2024</label>
<label class="filter_check"><input type="checkbox" name="year[]" value="2023"> 2023</label>
<label class="filter_check"><input type="checkbox" name="year[]" value="2022"> 2022</label>
<label class="filter_check"><input type="checkbox" name="year[]" value="2021"> 2021</label>
<label class="filter_check"><input type="checkbox" name="year[]" value="2020"> 2020</label>
<label class="filter_check"><input type="checkbox" name="year[]" value="2019"> 2019</label>
<label class="filter_check"><input type="checkbox" name="year[]" value="2018"> 2018</label>
<label class="filter_check"><input type="checkbox" name="year[]" value="2017"> 2017</label>
<label class="filter_check"><input type="checkbox" name="year[]" value="2016"> 2016</label>
<label class="filter_check"><input type="checkbox" name="year[]" value="2015"> 2015</label>
<label class="filter_check"><input type="checkbox" name="year[]" value="2014"> 2014</label>
<label class="filter_check"><input type="checkbox" name="year[]" value="2013"> 2013</label>
<label class="filter_check"><input type="checkbox" name="year[]" value="2012"> 2012</label>
<label class="filter_check"><input type="checkbox" name="year[]" value="2011"> 2011</label>
<label class="filter_check"><input type="checkbox" name="year[]" value="2010"> 2010</label>
<label class="filter_check"><input type="checkbox" name="year[]" value="2009"> 2009</label>
<label class="filter_check"><input type="checkbox" name="year[]" value="2008"> 2008</label>
<label class="filter_check"><input type="checkbox" name="year[]" value="2007"> 2007</label>
<label class="filter_check"><input type="checkbox" name="year[]" value="2006"> 2006</label>
<label class="filter_check"><input type="checkbox" name="year[]" value="2005"> 2005</label>


                                        </div>
                                    </details>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
<div id="filter_overlay" class="filter_overlay" hidden></div>
<!-- Основной контент -->
    <section class="catalog container" aria-labelledby="y2024">
        <h2 id="y2024" class="visually_hidden">Журналы 2024</h2>

        <ul class="arhive_grid">
            <!-- Карточка года -->
            <li class="card card__year">
                <a class="card__link" href="#y2024" aria-label="Текущий год: 2024">
                    <div class="card__cover__year">
                    </div>
                </a>
            </li>
<?php
global $post;

$myposts = get_posts([
	'numberposts' => -1,
	'category'    => 10
]);

if( $myposts ){
	foreach( $myposts as $post ){
		setup_postdata( $post );
		?>
<li class="card">
    <?php
    // Получаем URL PDF через ACF
    $pdf_url = get_field('magazine_pdf');
    
    // Если PDF есть - используем его, если нет - обычная ссылка на запись
    $link_url = $pdf_url ?: get_permalink();
    $link_attrs = $pdf_url ? 'download' : '';
    ?>
    
    <a class="card__link" href="<?php echo esc_url($link_url); ?>" <?php echo $link_attrs; ?>>
        <div class="card__cover">
            <?php the_post_thumbnail(); ?>
        </div>
        <div class="card__meta">
            <h3 class="card__title"><?php the_title(); ?></h3>
            <p class="card__year"><?php the_content(); ?></p>
        </div>
    </a>
</li>

		<?php
	}
}
wp_reset_postdata(); // Сбрасываем $post
?>

 
        </ul>
    </section>
</main>
<?php get_footer(); ?>
</body>
</html>