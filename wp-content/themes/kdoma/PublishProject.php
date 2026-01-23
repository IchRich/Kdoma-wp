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
<main class="publish-project-page">
    <section class="container">
        <div class="breadcrumbs">
            <div class="title-min">
                <a href="<?php echo home_url('/'); ?>" class="title-glav">Главная</a>
                <span class="title-glav">/</span>
                <a href="<?php echo get_permalink(get_page_by_path('premiya')); ?>" class="title-glav">Премия</a>
                <span class="title-glav">/</span>
                <span>Заявка на публикацию интерьера</span>
            </div>
            <h1 id="page-title" class="title"><?php the_field('title'); ?></h1>
        </div>
        
        <div class="Dear_architects">
            <h1><?php the_field('form_intro_text'); ?></h1>
        </div>
        <div class="Nominations">
            <?php echo do_shortcode('[contact-form-7 id="c8cc485" title="Форма заявки на публикацию проекта"]');?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
<?php get_footer(); ?>

</body>
</html>

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