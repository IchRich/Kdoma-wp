<?php wp_head() ?>
<header class="site_header">
    <div class="header_inner">
        <a class="logo" href="index.php" aria-label="Home">
            <img src="<?php bloginfo('template_url')?>/Assets/image/LogoKD.svg" alt="Logo">
        </a>
        <input type="checkbox" id="nav-toggle" class="nav_toggle" aria-hidden="true">
        <label for="nav-toggle"
               class="burger_btn"
               aria-label="Открыть меню"
               aria-controls="mobile_drawer"
               aria-expanded="false">
            <span></span>
        </label>

        <aside id="mobile_drawer" class="mobile_drawer" role="dialog" aria-modal="true" aria-label="Меню">
            <div class="mobile_drawer__head">
                <img src="<?php bloginfo('template_url')?>/Assets/image/SearchIcon.png" alt="">
                <!-- <form class="mobile_search" role="search" action="/search">
                    <input type="search" name="q" placeholder="Поиск" aria-label="Поиск">
                </form> -->
                <button type="button" class="mobile_drawer__close" aria-label="Закрыть меню"
                        onclick="document.getElementById('nav-toggle').checked=false"></button>
            </div>

            <nav class="mobile_nav" aria-label="Основные разделы">
                <ul class="mobile_nav__list">
                    <li><a href="Interior.html">Интерьеры</a></li>
                    <li><a href="Designers.html">Дизайнеры</a></li>
                    <li><a href="Company.html">Компании</a></li>
                    <li><a href="AboutDesign.html">Про дизайн</a></li>
                    <li><a href="Events.html">События</a></li>
                    <li><a href="AboutEdit.html">О редакции</a></li>
                    <li><a class="accent" href="DesignSchool.html">Школа дизайна</a></li>
                    <li><a class="accent" href="DesignWeek.html">Неделя дизайна</a></li>
                    <li><a class="accent" href="Premia.html">Премия</a></li>
                </ul>
            </nav>

            <!-- <section class="mobile_social" aria-label="Наши соцсети">
                <h3>Наши соцсети</h3>
                <ul>
                    <li>
                        <img src="<?php bloginfo('template_url')?>/Assets/image/vk.svg" alt="VK">
                        <a href="#">ВКонтакте</a>
                    </li>
                    <li>
                        <img src="<?php bloginfo('template_url')?>/Assets/image/TelegramLogo.svg">
                        <a href="#">Telegram</a>
                    </li>
                </ul>
            </section> -->
        </aside>

        <div class="mobile_overlay"></div>

        <nav class="main_nav" aria-label="Главное меню">
            <ul>
                <li><a href="Interior.html">ИНТЕРЬЕРЫ</a></li>
                <li><a href="Designers.html">ДИЗАЙНЕРЫ</a></li>
                <li><a href="Company.html">КОМПАНИИ</a></li>
                <li><a href="AboutDesign.html">ПРО ДИЗАЙН</a></li>
                <li><a href="Events.html">СОБЫТИЯ</a></li>
                <li><a href="AboutEdit.html">О РЕДАКЦИИ</a></li>
                <li><a class="accent" href="DesignSchool.html">ШКОЛА ДИЗАЙНА</a></li>
                <li><a class="accent" href="DesignWeek.html">НЕДЕЛЯ ДИЗАЙНА</a></li>
                <li><a class="accent" href="Premia.html">ПРЕМИЯ</a></li>
            </ul>
        </nav>

        <div class="utils">
            <a class="icon_btn" href="#" aria-label="VK">
                <img src="<?php bloginfo('template_url')?>/Assets/image/vk.svg" alt="VK">
            </a>
            <a class="icon_btn" href="#" aria-label="Telegram">
                <img src="<?php bloginfo('template_url')?>/Assets/image/TelegramLogo.svg" alt="Telegram">
            </a>
            <form class="search" role="search">
                <input type="search" placeholder="Поиск" aria-label="Поиск" />
                <button type="submit" aria-label="Найти">
                    <img src="<?php bloginfo('template_url')?>/Assets/image/SearchIcon.png" alt="<UNK>">
                </button>
            </form>
        </div>
    </div>
</header>