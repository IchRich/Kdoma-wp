<footer class="site_footer" role="contentinfo">
    <div class="site_footer__inner">
        <!-- Колонка: бренд и реквизиты -->
        <section class="site_footer__col site_footer__col_brand" aria-labelledby="footer_brand">

            <a class="site_footer__logo" href="/" aria-label="На главную">
                <img src="<?php bloginfo('template_url')?>/Assets/image/LogoKD.svg" width="75" height="50" alt="Логотип КД">
            </a>
            <p class="site_footer__text">Проект медиагруппы «Западная пресса».</p>
            <p class="site_footer__text">ООО «Стартап»</p>
            <p class="site_footer__text">ИНН 3906159571<br>ОГРН 1063906139659</p>
        </section>

        <!-- Колонка: соцсети -->
        <nav class="site_footer__col footer_social" aria-labelledby="footer_social">
            <div class="site_footer__col footer_social" aria-label="Соцсети">
                <h2 class="site_footer__col_header footer_social">Соцсети</h2>
                <ul class="site_footer__list_media">
                    <li class="site_footer__list_TG">
                        <img src="<?php bloginfo('template_url')?>/Assets/image/TgLogo.png" width="30" height="30" alt="<UNK> <UNK>">
                        <a class="site_footer__link" href="https://t.me/">Telegram</a>
                    </li>
                    <li class="site_footer__list_VK">
                        <img src="<?php bloginfo('template_url')?>/Assets/image/VkLogo.png" width="30" height="30" alt="<UNK> <UNK>"/>
                        <a class="site_footer__link" href="https://vk.com/">ВКонтакте</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Колонка: разделы 1 -->
        <nav class="site_footer__col footer_sections" aria-labelledby="footer_sections_1">
            <h2 id="footer_sections_1" class="site_footer__title">Разделы сайта:</h2>
            <ul class="site_footer__list">
                <li><a class="site_footer__link" href="Interior.html">Интерьеры</a></li>
                <li><a class="site_footer__link" href="Designers.html">Дизайнеры</a></li>
                <li><a class="site_footer__link" href="Company.html">Компании</a></li>
                <li><a class="site_footer__link" href="AboutDesign.html">Про дизайн</a></li>
                <li><a class="site_footer__link" href="Events.html">События</a></li>
            </ul>
        </nav>

        <!-- Колонка: разделы 2 -->
        <nav class="site_footer__col footer_sections footer_sections_extra" aria-labelledby="footer_sections_2">

            <ul class="site_footer__list_second">
                <li><a class="site_footer__link" href="<?php echo get_page_link(65); ?>">Архив номеров</a></li>
                <li><a class="site_footer__link" href="AboutEdit.html">О редакции</a></li>
                <li class="red_marker"><a class="site_footer__link site_footer__link_accent" href="DesignSchool.html">Школа дизайна</a></li>
                <li class="red_marker"><a class="site_footer__link site_footer__link_accent" href="/week">Неделя дизайна</a></li>
                <li class="red_marker"><a class="site_footer__link site_footer__link_accent" href="/award">Премия</a></li>
            </ul>
        </nav>

        <!-- Колонка: контакты -->
        <section class="site_footer__col footer_contacts" aria-labelledby="footer_contacts">
            <h2 id="footer_contacts" class="site_footer__title">Контакты</h2>
            <address class="site_footer__address">
                г. Калининград,<br>
                ул. Рокоссовского, д. 16/18<br>
                Телефон редакции:<br>
                <a class="site_footer__link" href="tel:+74012677706">+7 (4012) 677-706</a>
            </address>
        </section>
    </div>

    <div class="site_footer__bottom">
        <a class="site_footer__policy" href="/privacy">Политика ОПД</a>
        <div class="site_footer__dev_container">
            <p class="site_footer__dev">Сайт разработан</p>
            <img src="<?php bloginfo('template_url')?>/Assets/image/LogoKant.svg" width="138" height="14" alt="<UNK> <UNK>">
        </div>
    </div>
</footer>