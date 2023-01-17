<header>

    <nav>

        <div id='logo-bar' class="logo-bar">
            <a class="logo" href="../">MonCinéClub</a>
            <div id="burger" class="burger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </div>

        <ul id="menu" class="menu">

            <li class="menu-items"><a href="my-movies">Ma collection</a></li>
            <li class="menu-items with-sub">
                Les films<span>&nbsp;&#x25BC;</span>
                <ul class="submenu">
                    <li class="submenu-items"><a href="../recent-movies">Les plus récents</a></li>
                    <li class="submenu-items"><a href="../popular-movies">Les plus populaires</a></li>
                    <li class="submenu-items"><a href="../upcoming-movies">Bientôt en salle</a></li>
                </ul>
            </li>

            <form id="search-nav" class="search-nav" name="search-nav" action="../search-movie" method="POST">
                <input class="search-nav-input" type="text" name="search" placeholder="Entrez un titre..." spellcheck="false" required="required" autocomplete>
                <button id="btn-search" class="search-nav-btn"><i class="search-nav-icon fa-solid fa-magnifying-glass"></i></button>
            </form>

            <li class="menu-items with-sub">
                Mon profil<span>&nbsp;&#x25BC;</span>
                <ul class="submenu submenu-profile">
                    <?php if (Authenticator::isLogged()) : ?>
                        <li class="submenu-items"><a href="../logout">Me déconnecter</a></li>
                        <li class="submenu-items"><a href="../update-profile">Modifier mon profil</a></li>
                        <li class="submenu-items"><a href="../delete-profile">Supprimer mon compte</a></li>
                    <?php else : ?>
                        <li class="submenu-items"><a href="../login">Me connecter</a></li>
                        <li class="submenu-items"><a href="../user-register">Créer mon compte</a></li>
                    <?php endif; ?>
                </ul>
            </li>

        </ul>

    </nav>

</header>