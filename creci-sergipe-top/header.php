<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title><?= wp_title(' | ', true, 'right'); ?> <?= bloginfo('title') ?> - <?= bloginfo('description') ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- INICIO - Cabeçalho -->
    <section class="section_redesSociaisIntranet">
        <ul class="gridRedesSociaisIntranet containerCreciSergipe">

            <li class="redesSociaisHeader">
                <span>
                    <i class="contact_telefoneCreci fa fa-phone" aria-hidden="true"> </i>
                    (79) 2106-6801</span>

                <a href="http://servidor.local/creci_sergipe/contato/">
                    <i class="contact_emailCreci fa fa-envelope" aria-hidden="true"></i>
                </a>
                <a href="https://www.youtube.com/TVCRECISERGIPE/" target="_blank">
                    <i class="rede_youtubeCreci fab fa-youtube"></i>
                </a>
                <a href="https://www.facebook.com/crecisergipe/" target="_blank">
                    <i class="rede_facebookCreci fab fa-facebook"></i>
                </a>
                <a href="https://twitter.com/crecisergipe/" target="_blank">
                    <i class="rede_twitterCreci fab fa-twitter"></i>
                </a>
                <a href="https://www.instagram.com/crecisergipe/" target="_blank">
                    <i class="rede_instagramCreci fab fa-instagram"></i>
                </a>
            </li>
            <!-- MENU INTRANET -->

            <ul class="title-intranet">
                <li class="menuIntranetCreci">
                    <a href="#" data-toggle="menuDropdownTop" aria-haspopup="true" aria-expanded="false" onclick="ocultarExibir()">INTRANET&ensp;<i class="fa fa-chevron-down"></i> </a>
                    <div class="dropdown-menuIntranet" id="intranet" aria-labelledby="menuDropdownTop">

                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'intranetMenu',
                            )
                        );
                        ?>
                    </div>
                </li>
            </ul>

    </section>

    <!-- Header Meio-->
    <header class="containerCreciSergipe">

        <div class="gridHeaderCreci">

            <!-- LOGO -->
            <div class="button-logoCreci">
                <a href="<?= get_site_url() ?>"><img src="<?= url_theme() ?>/img/creci-logo.png" alt="<?= bloginfo('title') ?>" width=220></a>
            </div>

            <!-- Campo de Pesquisa -->
            <div class="search_campoCreci">
                <?php get_search_form(); ?>
            </div>

            <!-- Botões Atalhos -->
            <div class="buttons-fieldCreci">
                <!-- Botão de TV CRECI Sergipe-->
                <a class="btn btn-lg red" href="https://www.youtube.com/channel/UCTQNUZWTHVsPwP0RCV5NWOw" data-hover="button" target="_blank">
                    <span> <i class="fab fa-youtube"></i></span>
                    <p class="tv-crecise">TV CRECI<br>Sergipe</p>
                </a>
                <!-- Botão de Certidão de Regularidade-->
                <a class="btn btn-lg blue" href="certidao-de-regularidade">
                    <span> <i class="fa fa-newspaper"></i></span>
                    <p class="cert-regularidade">Certidão de<br>Regularidade</p>
                </a>
                <!-- Botão de Boleto de anuidade -->
                <a class="btn btn-lg brown" href="boleto">
                    <span> <i class="fa fa-3x fa-barcode"></i></span>
                    <p class="bol-anuidade">Boleto de<br>Anuidade</p>
                </a>
            </div>
        </div>
    </header>

    <!-- MENU PRINCIPAL -->
    <?php
    wp_nav_menu(
        array(
            'theme_location' => 'mainMenu',
            'menu_id' => 'navigationMenuMain',
            'container'            => 'nav',
            'container_class'      => 'navigationMenuMain',
            'items_wrap'           => '
            <div class="gridMainMenu containerCreciSergipe">
                <div id="idButtonMainMenu">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </div>
                <div class="search_mobileCreci">
                    <form class="form_searchMobile"  autocomplete="on" role="search" method="get" action="' . esc_url(home_url("/")) . '">
                        
                            <input type="text" id="search" name="s" required class="input-buscamobile" placeholder="Pesquisar" value="' . get_search_query() . '">
                           
                                <button class="botao-buscamobile" type="submit">
                                    <i class="fa fa-search"> </i>
                                </button>
            
                        
                    </form>
                </div>
            </div>
            <ul id="idMenuMain" class="containerCreciSergipe list-menu">%3$s</ul>'
        )
    );
    ?>
    <?php wp_head(); ?>
    <?php get_header(); ?>

    <!-- JAVASCRIPT DO MENU INTRANET -->
    <script>
        var exibeoculta = true;

        function ocultarExibir() {

            if (exibeoculta) { //Oculta o menu dropdown
                document.getElementById("intranet").style.display = "none";
                exibeoculta = false;
            } else { //Exibe o menu drodown
                document.getElementById("intranet").style.display = "block";
                exibeoculta = true;
            }
        }
    </script>

    <!-- Javascript para menu principal -->
    <script>
        // Script para exibir menu mobile e minimizar
        const buttonMainMenu = document.getElementById('idButtonMainMenu')
        const mainDropdown = document.getElementById("idMenuMain")
        let i = 0
        buttonMainMenu.onclick = function() {
            // Mostrar menu tela pequena
            if (i == 0) {
                document.getElementById("idMenuMain").style.display = "block";
                i = 1
                // Minimizar menu tela pequena
            } else {
                i = 0
                document.getElementById("idMenuMain").style.display = "none";
            }
        }
    </script>