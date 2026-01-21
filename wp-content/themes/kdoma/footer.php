<footer class="site_footer" role="contentinfo">
    <div class="site_footer__inner">

        <section class="site_footer__col site_footer__brand" aria-labelledby="footer_brand">
            <a class="site_footer__logo" href="/" aria-label="На главную">
                <img src="<?php bloginfo('template_url')?>/Assets/image/LogoKD.svg" width="75" height="50" alt="Логотип КД">
            </a>
            <div class="site_footer_text_content">
                <p class="site_footer__text">Проект медиагруппы «Западная пресса».</p>
                <p class="site_footer__text">ООО «Стартап»</p>
                <p class="site_footer__text">ИНН 3906159571<br>ОГРН 1063906139659</p>
            </div>
        </section>

        <nav class="site_footer__col site_footer__sections" aria-labelledby="footer_sections">
            <h2 id="footer_sections" class="site_footer__title">Разделы сайта</h2>
            <ul class="site_footer__list site_footer__list_sections">
                <li><a class="site_footer__link" href="Interior.html">Интерьеры</a></li>
                <li><a class="site_footer__link" href="Company.html">Компании</a></li>
                <li><a class="site_footer__link" href="Designers.html">Дизайнеры</a></li>
                <li><a class="site_footer__link" href="AboutEdit.html">О редакции</a></li>
            </ul>
        </nav>

        <nav class="site_footer__col site_footer__sections" aria-labelledby="footer_sections">
            <h2 id="footer_sections" class="site_footer__title">Публикации</h2>
            <ul class="site_footer__list site_footer__list_sections">
                <li><a class="site_footer__link" href="Events.html">События</a></li>
                <li><a class="site_footer__link" href="AboutDesign.html">Про дизайн</a></li>
                <li><a class="site_footer__link" href="Archive.html">Архив номеров</a></li>
            </ul>
        </nav>

        <nav class="site_footer__col site_footer__sections" aria-labelledby="footer_sections">
            <h2 id="footer_sections" class="site_footer__title">Наши проекты</h2>
            <ul class="site_footer__list site_footer__list_sections">
                <li><a class="site_footer__link site_footer__link_accent" href="DesignSchool.html">Школа дизайна</a></li>
                <li><a class="site_footer__link site_footer__link_accent" href="DesignWeek.html">Неделя дизайна</a></li>
                <li><a class="site_footer__link site_footer__link_accent" href="Premia.html">Премия</a></li>
            </ul>
        </nav>

        <section class="site_footer__col site_footer__contacts" aria-labelledby="footer_contacts">
            <h2 id="footer_contacts" class="site_footer__title">Контакты</h2>
            <!-- <p class="site_footer__address">
                г. Калининград,<br>
                ул. Рокоссовского, д. 16/18<br>
                Телефон редакции:<br>
                <a class="site_footer__link" href="tel:+74012677706">+7 (4012) 677-706</a>
            </p> -->
            <ul class="site_footer__list site_footer__list_sections">
                <li><a class="site_footer__link">г. Калининград,</a></li>
                <li><a class="site_footer__link">ул. Рокоссовского, д. 16/18</a></li>
                <li><a class="site_footer__link">Телефон редакции:</a></li>
                <li><a class="site_footer__link" href="tel:+74012677706">+7 (4012) 677-706</a></li>
            </ul>
        </section>

    </div>

    <div class="site_footer__bottom">
        <a class="site_footer__policy" href="Policy.html">Политика ОПД</a>
        <div class="site_footer__dev_container">
            <p class="site_footer__dev">Сайт разработан</p>
            <img src="<?php bloginfo('template_url')?>/Assets/image/LogoKant.svg" width="138" height="14" alt="Логотип Kant">
        </div>
    </div>
</footer>
<?php wp_footer();?>