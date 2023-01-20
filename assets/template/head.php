<body>
        <header>
                <section id="bannerTopContainer">
                        <a href="/"><h1 id="titleBrand">Do It <span id="middleBrand">4</span> Vendée.</h1></a>
                        <div id="menuContainer">
                                <a id="profileLink" onclick="checkConnexion('profile');"><svg id="profileIcon" width="14.67" height="16" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 9.5C0 11.5588 0.97075 12 5.5 12C10.0293 12 11 11.5588 11 9.5C11 7.44125 10.0293 7 5.5 7C0.97075 7 0 7.44125 0 9.5ZM1 9.5C1 9.95466 1.05715 10.1897 1.12082 10.3199C1.16598 10.4123 1.23968 10.5091 1.46533 10.6117C1.72367 10.7291 2.14354 10.8346 2.83036 10.904C3.50758 10.9724 4.37758 11 5.5 11C6.62242 11 7.49242 10.9724 8.16965 10.904C8.85646 10.8346 9.27633 10.7291 9.53467 10.6117C9.76032 10.5091 9.83402 10.4123 9.87918 10.3199C9.94285 10.1897 10 9.95466 10 9.5C10 9.04534 9.94285 8.81029 9.87918 8.68008C9.83402 8.58772 9.76032 8.49091 9.53467 8.38834C9.27633 8.27091 8.85646 8.16543 8.16965 8.09605C7.49242 8.02764 6.62242 8 5.5 8C4.37758 8 3.50758 8.02764 2.83036 8.09605C2.14354 8.16543 1.72367 8.27091 1.46533 8.38834C1.23968 8.49091 1.16598 8.58772 1.12082 8.68008C1.05715 8.81029 1 9.04534 1 9.5Z" fill="<?php if($title == 'Do It 4 Vendée - Profil'){echo 'var(--red-color)';}else{echo 'var(--text-color)';} ?>"/><path fill-rule="evenodd" clip-rule="evenodd" d="M2.5 3C2.5 4.65685 3.84315 6 5.5 6C7.15685 6 8.5 4.65685 8.5 3C8.5 1.34315 7.15685 0 5.5 0C3.84315 0 2.5 1.34315 2.5 3ZM3.5 3C3.5 4.10457 4.39543 5 5.5 5C6.60457 5 7.5 4.10457 7.5 3C7.5 1.89543 6.60457 1 5.5 1C4.39543 1 3.5 1.89543 3.5 3Z" fill="<?php if($title == 'Do It 4 Vendée - Profil'){echo 'var(--red-color)';}else{echo 'var(--text-color)';} ?>"/></svg></a>
                                <svg onclick="searchModal()" id="searchIcon" width="15" height="15" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.84575 9.12856L9.12854 9.84576L10.9242 11.6414C11.1222 11.8395 11.4433 11.8395 11.6414 11.6414C11.8395 11.4434 11.8395 11.1223 11.6414 10.9242L9.84575 9.12856Z" fill="var(--text-color)"/><path fill-rule="evenodd" clip-rule="evenodd" d="M0 5.50001C0 9.75001 1.5 11 5.50001 11C9.50001 11 11 9.75001 11 5.50001C11 1.25 9.50001 0 5.50001 0C1.5 0 0 1.25 0 5.50001ZM1 5.50001C1 7.56058 1.37541 8.5755 1.94414 9.12392C2.52147 9.68063 3.54586 10 5.50001 10C7.45415 10 8.47854 9.68063 9.05587 9.12392C9.6246 8.5755 10 7.56058 10 5.50001C10 3.43943 9.6246 2.42451 9.05587 1.8761C8.47854 1.31938 7.45415 1 5.50001 1C3.54586 1 2.52147 1.31938 1.94414 1.8761C1.37541 2.42451 1 3.43943 1 5.50001Z" fill="var(--text-color)"/></svg>
                                <svg onclick="navPage()" id="burgerIcon" width="16.8" height="12" viewBox="0 0 14 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.777778 7H13.2222C13.65 7 14 6.7375 14 6.41667C14 6.09583 13.65 5.83333 13.2222 5.83333H0.777778C0.35 5.83333 0 6.09583 0 6.41667C0 6.7375 0.35 7 0.777778 7ZM0.777778 4.08333H13.2222C13.65 4.08333 14 3.82083 14 3.5C14 3.17917 13.65 2.91667 13.2222 2.91667H0.777778C0.35 2.91667 0 3.17917 0 3.5C0 3.82083 0.35 4.08333 0.777778 4.08333ZM0 0.583333C0 0.904167 0.35 1.16667 0.777778 1.16667H13.2222C13.65 1.16667 14 0.904167 14 0.583333C14 0.2625 13.65 0 13.2222 0H0.777778C0.35 0 0 0.2625 0 0.583333Z" fill="var(--text-color)"/></svg>
                        </div>
                </section>
                <section id="navPage">
                        <div>
                        <ul class="navBlock">
                                <li class="navItem" onclick="window.location = '/'">Accueil</li>
                                <?php if(!isset($_SESSION['firstName'])){ ?>
                                        <li class="navItem" onclick="window.location = 'register'">Inscription</li>
                                        <li class="navItem" onclick="window.location = 'login'">Connexion</li>
                                        <li class="navItem" onclick="emailModal();">Mot de passe oublié</li>
                                <?php }else{ ?>
                                        <li class="navItem" onclick="checkConnexion('profile');">Mon compte</li>
                                        <li class="navItem" onclick="checkConnexion('addressBook');">Carnet d'adresse</li>
                                        <li class="navItem" onclick="checkConnexion('favorite')">Favoris</li>
                                        <li class="navItem" onclick="checkConnexion('bag')">Panier</li>
                                        <li class="navItem" onclick="checkConnexion('orderList')">Mes commandes</li>
                                <?php } ?>
                        </ul>
                        <!-- <ul class="navBlock">
                                <li class="navItem" onclick="window.location = 'legal'">FAQs</li>
                                <li class="navItem" onclick="window.location = 'legal'">Support</li>
                        </ul> -->
                        <ul class="navBlock">
                                <li class="navItem" onclick="window.location = 'https:\/\/www.instagram.com/doit4vendee/'">Instagram</li>
                                <li class="navItem" onclick="window.location = 'https:\/\/www.facebook.com/doit4vendee/'">Facebook</li>
                                <li class="navItem" onclick="window.location = 'https:\/\/g.page/r/CWJIQ9YiThY2EAE'">Google+</li>
                                <li class="navItem" onclick="window.location = 'legal'">Mentions légales & CGV</li>
                        </ul>
                        </div>
                        <div>
                        </div>
                </section>
        </header>
    <main>