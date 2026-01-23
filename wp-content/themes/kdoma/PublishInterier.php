<?php
/**
 * Template Name: PublishInterier
 */
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заявка на участие интерьера в премии</title>
    <link rel="stylesheet" href="Assets/css/PublishProject.css">
    <link rel="stylesheet" href="Assets/css/Header.css">
</head>
<?php
get_header();
?>

<main class="publish-interier-page">
    <section class="container">
        <div class="breadcrumbs">
            <div class="title-min">
                <a href="<?php echo home_url('/'); ?>" class="title-glav">Главная</a>
                <span class="title-glav">/</span>
                <a href="<?php echo get_permalink(get_page_by_path('premiya')); ?>" class="title-glav">Премия</a>
                <span class="title-glav">/</span>
                <span>Заявка на участие интерьера в премии "Калининградский дизайн 2025"</span>
            </div>
            <h1 id="page-title" class="title">Заявка на участие интерьера в премии "Калининградский дизайн 2025"</h1>
        </div>

        <div class="Dear_architects">
            <h1>Уважаемые архитекторы и дизайнеры, присылайте ваш интерьер для участия в премии «Калининградский дизайн-2025»</h1>
            <p>К рассмотрению принимается готовая съемка реализованного в Калининграде или области интерьера (кроме номинации «Проект, который предстоит реализовать»).
                Для каждого интерьера создается отдельная заявка.</p>
        </div>

        <!-- ТОЛЬКО ЭТО ДОБАВЬТЕ ВМЕСТО ВСЕЙ ФОРМЫ -->
        <?php 
        // Замените 123 на реальный ID вашей формы
        echo do_shortcode('[contact-form-7 id="dfac702" title="Форма участия в премии"]');
        ?>
        
    </section>
</main>

<?php get_footer(); ?>

<style>
    /* Стили для полей Contact Form 7 */
.wpcf7-form .Nominations_article {
    margin-bottom: 20px;
}

.wpcf7-form .Nominations_article p {
    margin-bottom: 8px;
    font-size: 16px;
    color: #333;
}

/* Стили для всех полей ввода CF7 */
.wpcf7-form input[type="text"],
.wpcf7-form input[type="email"],
.wpcf7-form input[type="tel"],
.wpcf7-form input[type="url"],
.wpcf7-form textarea {
    width: 43.3vw;
    height: 3.1vw;
    background-color: #ffffff;
    border: 1px solid #111;
    padding: 0 15px;
    font-size: 1vw;
    box-sizing: border-box;
    font-family: inherit;
}

.wpcf7-form select {
    width: 43.3vw;
    height: 3.1vw;
    background-color: #ffffff;
    border: 1px solid #111;
    padding: 0 15px;
    font-size: 1vw;
    box-sizing: border-box;
    font-family: inherit;
    appearance: none;
    background-image: url('data:image/svg+xml;utf8,<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M23 7L12 18L1 7" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>');
    background-repeat: no-repeat;
    background-position: right 10px center;
    background-size: 16px;
    padding-right: 40px;
}

.wpcf7-form textarea {
    height: 10vw;
    padding: 15px;
    resize: vertical;
}

/* Стили для чекбоксов */
.wpcf7-form .wpcf7-acceptance {
    display: flex;
    align-items: flex-start;
    margin-bottom: 15px;
}

.wpcf7-form .wpcf7-list-item {
    margin: 0;
}

.wpcf7-form .wpcf7-list-item-label {
    font-size: 14px;
    line-height: 1.5;
    color: #555;
}

/* Кнопка отправки */
.wpcf7-form .wpcf7-submit.btn--primary {
    background: #B91C1C;
    color: #fff;
    border: 1px solid #B91C1C;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    width: 100%;
    height: 3.2vw;
    padding: 0 24px;
    font-size: 1vw;
    font-weight: 300;
    text-decoration: none;
    cursor: pointer;
    margin-top: 2vw;
    transition: .2s ease;
    white-space: nowrap;
    font-family: inherit;
    margin-bottom: 5vw;
}

/* Адаптивность */
@media (max-width: 768px) {
    .wpcf7-form input[type="text"],
    .wpcf7-form input[type="email"],
    .wpcf7-form input[type="tel"],
    .wpcf7-form input[type="url"],
    .wpcf7-form textarea,
    .wpcf7-form select {
        width: 100%;
        height: 10.6vw;
        font-size: 4.2vw;
    }
    
    .wpcf7-form textarea {
        height: 25vw;
    }
    
    .wpcf7-form .wpcf7-submit.btn--primary {
        height: 10.6vw;
        font-size: 4.2vw;
    }
}
</style>