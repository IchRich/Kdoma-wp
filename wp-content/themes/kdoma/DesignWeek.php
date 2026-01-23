<?php
/*
Template Name: DesignWeek
*/
get_header();
?>

<main>
    <section class="container">
        <div class="breadcrumbs">
            <div class="title-min">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="title-glav">Главная</a>
                <a class="title-glav">/</a>
                <a>Неделя дизайна</a>
            </div>
            <h1 id="page-title" class="title">Неделя дизайна</h1>
        </div>

        <div class="Design_Week">
            <img class="Design_Week_Img"
                 src="<?php echo get_template_directory_uri(); ?>/Assets/image/Frame578.svg"
                 alt="Неделя дизайна">

            <div class="Design_Week_Center">
                <p>
                    Знаковое событие в сфере интерьера и дизайна. Площадка для получения новых знаний,
                    информации, знакомств и профессионального общения.
                    Проект впервые организован журналом «Калининградские дома» в 2014 году.
                    Ежегодно мероприятие объединяет дизайнеров, архитекторов, представителей интерьерных салонов,
                    производителей мебели и отделочных материалов, частных мастеров и творческие студии.
                    Каждый год организаторы события объявляют новую тему НЕДЕЛИ и подчиняют ей все мероприятия.
                </p>

                <div class="Design_Week_Button">
                    <a class="btn btn--primary">
                        СМОТРЕТЬ АФИШУ
                        <img src="<?php echo get_template_directory_uri(); ?>/Assets/image/WhitePointer.png"
                             alt="перейти"
                             class="design_arrow"
                             loading="lazy">
                    </a>
                </div>
            </div>
        </div>

        <div class="Design_Week_Project">
            <div class="Design_Week_Project_Grid">
                <h1 class="Design_Week_Project_Grid_Title">О проекте</h1>

                <p class="Design_Week_Project_Grid_Text">
                    НЕДЕЛЯ ДИЗАЙНА — знаковое событие в сфере интерьера и дизайна.
                    Площадка для получения новых знаний, информации, знакомств и профессионального общения.
                    Проект впервые организован журналом «Калининградские дома» в 2014 году.
                    Ежегодно мероприятие объединяет дизайнеров, архитекторов, представителей интерьерных салонов,
                    производителей мебели и отделочных материалов, частных мастеров и творческие студии.
                    <br><br>
                    Каждый год организаторы события объявляют новую тему НЕДЕЛИ и подчиняют ей все мероприятия.
                    В рамках НЕДЕЛИ ДИЗАЙНА проходят лекции, презентации, мастер-классы и public talk.
                    Мероприятия объединяют до 500 гостей на более чем 15 площадках города.
                    Стать участником может любой желающий.
                    Подать заявку можно по почте director@kdoma.ru
                </p>

                <p class="Design_Week_Project_Grid_Text_Dop">
                    <u>Читать далее</u>
                </p>
            </div>
        </div>

        <div class="Archive_Of_Events">
            <h1 class="Design_Week_Project_Grid_Title">Архив мероприятий</h1>

            <div class="Archive_Of_Events_Grid">
                <?php
                $years = [
                    '2024','2023','2022','2021',
                    '2020','2019','2018','2017'
                ];

                $i = 690;
                foreach ($years as $year): ?>
                    <article class="Archive_Of_Events_Grid_Item">
                        <img src="<?php echo get_template_directory_uri(); ?>/Assets/image/Rectangle%20<?php echo $i; ?>.svg"
                             alt="Неделя дизайна <?php echo $year; ?>">
                        <p>Неделя дизайна <?php echo $year; ?> года</p>
                    </article>
                <?php
                    $i++;
                endforeach;
                ?>
            </div>

            <div class="actions">
                <button class="btn_Archive">ПОКАЗАТЬ ЕЩЕ</button>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
