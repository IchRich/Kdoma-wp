<?php
/*
Template Name: AboutDesign
*/
?>
<!doctype html>
<html <?= language_attributes()?>></html>
<head>
  <meta charset="<?php bloginfo('charset')?>">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Про дизайн</title>
  <!-- <link rel="stylesheet" href="Assets/css/AboutDesign.css" />
  <link rel="stylesheet" href="Assets/css/Header.css"> -->
</head>
<body>
<?php get_header()?>
<main>
    <section class="page container" id="main-content">
        <div class="pd__container">
            <div class="breadcrumbs">
                <div class="title-min">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="title-glav">Главная</a>
                    <a>/</a>
                    <a>Про дизайн</a>
                </div>
                <h1 class="title">Про дизайн</h1>
            </div>



            <div class="pd_grid">
                 <?php
        global $post;
        $i = 1;
        $myposts = get_posts([
	        'numberposts' => 7,
	        'offset'      => 0,
            'orderby'     => 'date',
	        'category'    => 3, // рубрика "про дизайн"
             
        ]);

        if( $myposts ){
            foreach( $myposts as $post ){
                setup_postdata( $post );
                if ($i == 5){
                    ?>
                     <div class="pd_pair">
                    <div class="pd_left_pair">
                    <article class="pd_card pd_card__floor pd_card__floor__dup">
                    <a class="pd_card__media" href="#"><img src="<?=the_post_thumbnail_url();?>" alt="Не только босиком ходить" loading="lazy"></a>
                    <h3 class="pd_card__caption"><?=the_title()?></h3>
                     </article>
                    <?php
                }elseif ($i == 6){
                    ?>
                    <article class="pd_card pd_card__relax_2">
                    <a class="pd_card__media" href="#"><img src="<?=the_post_thumbnail_url();?>" alt="" loading="lazy"></a>
                    <h3 class="pd_card__caption"><?=the_title()?></h3>
                    </article>
                    </div>
                    </div><?php
                } else {
                ?>
                 <article class="pd_card">
                <a class="pd_card__media" href="#"><img src="<?=the_post_thumbnail_url();?>" alt="Проект от студии Interior design by Mariya Boychuk" loading="lazy"></a>
                <h3 class="pd_card__caption"><?=the_title()?></h3>
                </article>
                <?php
                }

                <?php
                $i++;
            }
        } else { ?>

        <?php
        echo "Посты не найдены.";
        }

wp_reset_postdata(); // сброс поста
?>  
            </div>

            <div class="pd__more">
                <button class="pd_btn" type="button">Показать еще</button>
            </div>
        </div>
    </section>
</main>
<?php get_footer()?>
</body>
</html>
