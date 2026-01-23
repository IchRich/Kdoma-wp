<?php
/**
 * Template Name: PublishProject
 */
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заявка на публикацию проекта</title>
    <link rel="stylesheet" href="Assets/css/PublishProject.css">
    <link rel="stylesheet" href="Assets/css/Header.css">
</head>
<body>

<?php get_header(); ?>

<main>
    <section class="container">
        <div class="breadcrumbs">
            <div class="title-min">
                <a href="<?php echo home_url('/'); ?>" class="title-glav">Главная</a>
                <span class="title-glav">/</span>
                <a href="<?php echo get_permalink(get_page_by_path('premiya')); ?>" class="title-glav">Премия</a>
                <span class="title-glav">/</span>
                <span>Заявка на публикацию интерьера</span>
            </div>
            <h1 id="page-title" class="title">Заявка на публикацию интерьера</h1>
        </div>
        
        <div class="Dear_architects">
            <h1>Уважаемые архитекторы и дизайнеры! <br>
                Вы можете подать заявку на публикацию вашего объекта в журнале «Калининградские дома» и на сайте kdoma.ru .</h1>
        </div>
        
        <!-- ВСТАВЬТЕ ШОРТКОД ФОРМЫ CF7 ЗДЕСЬ -->
        <?php 
        // Замените 123 на реальный ID вашей формы CF7
        echo do_shortcode('[contact-form-7 id="c8cc485" title="Форма заявки на публикацию проекта"]');
        ?>
        
    </section>
</main>

<?php get_footer(); ?>

</body>
</html>
<!-- <div class="Nominations_flex">
    <div class="Nominations_flex_g1">
        <h1 class="Nominations_titel">О дизайнере</h1>
        <div class="Nominations_grid">
            <article class="Nominations_article">
                <p>ФИО</p>
                [text* designer-name placeholder "Иванов Иван Иванович"]
            </article>
            <article class="Nominations_article">
                <p>E-mail</p>
                [email* designer-email placeholder "example@mail.ru"]
            </article>
            <article class="Nominations_article">
                <p>Телефон</p>
                [tel* designer-phone placeholder "+7 (999) 999-99-99"]
            </article>
            <article class="Nominations_article">
                <p>Ссылки на ваши социальные сети</p>
                [url designer-social placeholder "https://vk.com/username"]
            </article>
        </div>
    </div>
    <div class="Nominations_flex_g2">
        <h1 class="Nominations_titel">Об объекте</h1>
        <div class="Nominations_grid">
            <article class="Nominations_article">
                <p>Категория объекта</p>
                [select* object-category include_blank "Дом" "Общественное помещение" "Апартаменты"]
            </article>
            <article class="Nominations_article">
                <p>Местоположение объекта</p>
                [text* object-location placeholder "г. Калининград, ул. Примерная, д. 1"]
            </article>
            <article class="Nominations_article">
                <p>Название ЖК/серия дома</p>
                [text object-complex placeholder "ЖК 'Новый город'"]
            </article>
            <article class="Nominations_article">
                <p>Площадь объекта</p>
                [text* object-area placeholder "85 кв.м."]
            </article>
        </div>
    </div>
</div>

<div class="Nominations">
    <h1 class="Nominations_titel">Дополнительная информация</h1>
</div>

<div class="Nominations_flex">
    <div class="Nominations_flex_g1">
        <div class="Nominations_grid">
            <article class="Nominations_article">
                <p>Описание объекта (напишите несколько предложений, но не более 12-15, о стиле, основной идее, средствах достижения, производителей мебели и декора):</p>
                [textarea* object-description maxlength:500 placeholder "Опишите ваш проект..."]
            </article>
            <article class="Nominations_article">
                <p>Автор фотосъемки</p>
                [text photo-author placeholder "ФИО фотографа"]
            </article>
        </div>
    </div>
    <div class="Nominations_flex_g2">
        <div class="Nominations_grid">
            <article class="Nominations_article">
                <p>Ссылка на фото (загрузите фотографии объекта на любой файлообменник и приложите ссылку, также необходимо загрузить планы До и После перепланировки):</p>
                [url* photo-link placeholder "https://drive.google.com/..."]
            </article>
            <article class="Nominations_article">
                <p>Годы начала/окончания работ</p>
                [text* work-years placeholder "2023-2024"]
            </article>
        </div>
    </div>
</div>

<div class="Nominationss">
    <div class="Nominations_grid_dop">
        <div class="Nominations_grid_dop_flex">
            <div>
                [acceptance personal-data] Принимаю условия обработки персональных данных. [/acceptance]
            </div>
            <div>
                [acceptance privacy-policy] Принимаю условия Политики конфиденциальности. [/acceptance]
            </div>
            <div>
                [acceptance copyright-agreement] Присылая фотографии интерьеров для участия в Премии "Калининградский дизайн" заявитель гарантирует наличие у него исключительного права на фотографии и дает согласие для размещения их на сайте kdoma.ru, а также подтверждает достоверность заявленных в заявке сведений. [/acceptance]
            </div>
            
            [submit class:btn class:btn--primary "Отправить"]
        </div>
        <div class="Dear_architectss"></div>
    </div>
</div> -->
<style>
/* Принудительные стили для CF7 */
.wpcf7-form input[type="text"],
.wpcf7-form input[type="email"],
.wpcf7-form input[type="tel"],
.wpcf7-form input[type="url"],
.wpcf7-form textarea {
    width: 43.3vw !important;
    height: 3.1vw !important;
    background-color: #ffffff !important;
    border: 1px solid #111 !important;
    font-family: 'Geologica', sans-serif !important;
    font-size: 1vw !important;
    padding: 0 15px !important;
    box-sizing: border-box !important;
}

.wpcf7-form select {
    width: 43.3vw !important;
    height: 3.1vw !important;
    background-color: #ffffff !important;
    border: 1px solid #111 !important;
    font-family: 'Geologica', sans-serif !important;
    font-size: 1vw !important;
    padding: 0 15px !important;
    appearance: none !important;
    background-image: url('data:image/svg+xml;utf8,<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M23 7L12 18L1 7" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>') !important;
    background-repeat: no-repeat !important;
    background-position: right 10px center !important;
    background-size: 16px !important;
    padding-right: 40px !important;
}

/* Адаптивные стили */
@media (max-width: 1024px) {
    .wpcf7-form input[type="text"],
    .wpcf7-form input[type="email"],
    .wpcf7-form input[type="tel"],
    .wpcf7-form input[type="url"],
    .wpcf7-form textarea,
    .wpcf7-form select {
        width: 100% !important;
    }
}
</style>