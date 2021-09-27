<footer>
    <div class="gridFooter ">
        <!-- Logo -->
        <div class="barraFooterCreci">
        <div class=" logoFooterCreci  d-flex justify-content-center "> 
            <a href="#">
                <img src="<?= url_theme() ?>img/creci-logo-white.png" alt="CRECI-SE">
            </a>
        </div>
        <!-- Apresentação -->
        <div class="apresentacaoFooterCreci d-flex justify-content-center ">
            <p class="content-p">O Conselho Regional dos Corretores de Imóveis de Sergipe (CRECI-SE), 16a região, é uma autarquia federal, criada para orientar, disciplinar e fiscalizar o exercício da profissão de corretor de imóveis.</p>
        </div>
        </div>
    </div>

    <div class="containerCreciSergipe gridFooter">
        <div class="grid-contato">
            <!-- Contato -->
            <div class="centraliz">

                <div class="infoEndereco">
                    <h3>Informações</h3>
                    <hr class="estilo-hr1">
                    <i class="locationFooter fas fa-map-marker-alt">
                        <span>Rua Arauá, 919 – Bairro São José, Aracaju/SE. CEP 49015-250</span>
                    </i><br>
                    <i class="hourFooter fas fa-clock">
                        <span>Segunda à sexta-feira das 8h às 12h | 13h às 17h</span>
                    </i><br>
                    <i class="telephoneFooter fas fa-phone">
                        <span>(79) 2106-6800</span>
                    </i><br>
                    <i class="cnpjFooter fas ">
                        <span>CNPJ: 13.171.970/0001-00</span>
                    </i>
                </div>
            </div>
            <br><br>

            <!-- EXIBIÇÃO DO MAPA DO CRECI-->
            <div class="map">
                <div class="centraliz">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3917.5420965724397!2d-37.05498168579363!3d-10.922362724974091!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x71ab39cfeff0545%3A0xa4c59c804f3a8252!2sCreci-SE!5e0!3m2!1spt-BR!2sbr!4v1593709420096!5m2!1spt-BR!2sbr&zoom=15" width="80%" height="365" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>

        </div>
        <!-- BOTÕES DE SERVIÇOS -->
        <section class="grid-serv">
            <div class="botoes-footer">
                <h2>Serviços</h2>
                <div class="grid-botoeserv">
                    <hr class="estilo-hr">
                    <?php
                    $loop = new WP_Query(array('post_type' => 'botoes-acesso-rapido', 'posts_per_page' => 999));
                    while ($loop->have_posts()) : $loop->the_post();
                        $icone_id = get_post_meta($post->ID, 'icone_do_botao_de_acesso_rapido', true);
                        $nova_pag = get_post_meta($post->ID, 'abrir_em_nova_pagina', true);
                        if ($nova_pag == 'sim') {
                            $tag_blank = 'target="_blank"';
                        } else {
                            $tag_blank = '';
                        }

                    ?>
                        <div class="botao-footer botao-1-footer">
                            <a href="<?php the_field('link_de_acesso_rapido'); ?>" <?= $tag_blank ?>>
                                <svg>
                                    <rect x="0" y="0" fill="none" width="100%" height="100%" />
                                </svg>
                                <i class="<?= $icone_id ?>"></i>
                                <span> <?php the_field('titulo_de_acesso_rapido'); ?></span>
                        </div>
                        </a>
                    <?php endwhile;
                    wp_reset_query(); ?>
                </div>
                <hr class="estilo-hr">
            </div>
    </div>

    </section>
    </div>


    <!-- Redes sociais -->
    <div class="gridFooter">
        <div class="redeSociais">
            <p class="siga-nos">Nossas redes sociais</p>
            <!-- YOUTUBE -->
            <div>
                <a href="https://www.youtube.com/TVCRECISERGIPE/" target="_blank">
                    <i class="fab fa-youtube" id='icon_youtube'></i>
                    <span class="len-texto-footer" id='link_texto_youtube'> TV CRECI</span>
                </a>
            </div>
            <!-- FACEBOOK -->
            <div>
                <a href="https://www.facebook.com/crecisergipe/" target="_blank">
                    <i class="fab fa-facebook" id='icon_face'></i>
                    <span class="len-texto-footer" id='link_texto_face'> FACEBOOK</span>
                </a>
            </div>
            <!-- TWITTER -->
            <div class="cor-hovertwitter">
                <a href="https://twitter.com/crecisergipe/" target="_blank">
                    <i class="fab fa-twitter" id='icon_twitter'></i>
                    <span class="len-texto-footer" id='link_texto_twitter'> TWITTER</span>
                </a>
            </div>
            <!-- INSTAGRAM -->
            <div>
                <a href="https://www.instagram.com/crecisergipe/" target="_blank">
                    <i class="fab fa-instagram" id='icon_instagram'></i>
                    <span class="len-texto-footer" id='link_texto_instagram'> INSTAGRAM</span>
                </a>
            </div>
        </div>
    </div>




    <!-- SCRIPT DO HOVER -->
    <script>
        function hover_youtube() {
            document.getElementById("icon_youtube").classList.add("hovered_icon_youtube");
            document.getElementById("link_texto_youtube").classList.add("hovered_text");
        }

        function noHover_youtube() {
            document.getElementById("icon_youtube").classList.remove("hovered_icon_youtube");
            document.getElementById("link_texto_youtube").classList.remove("hovered_text");
        }

        function hover_face() {
            document.getElementById("icon_face").classList.add("hovered_icon_face");
            document.getElementById("link_texto_face").classList.add("hovered_text");
        }

        function noHover_face() {
            document.getElementById("icon_face").classList.remove("hovered_icon_face");
            document.getElementById("link_texto_face").classList.remove("hovered_text");
        }

        function hover_twitter() {
            document.getElementById("icon_twitter").classList.add("hovered_icon_twitter");
            document.getElementById("link_texto_twitter").classList.add("hovered_text");
        }

        function noHover_twitter() {
            document.getElementById("icon_twitter").classList.remove("hovered_icon_twitter");
            document.getElementById("link_texto_twitter").classList.remove("hovered_text");
        }

        function hover_instagram() {
            document.getElementById("icon_instagram").classList.add("hovered_icon_instagram");
            document.getElementById("link_texto_instagram").classList.add("hovered_text");
        }

        function noHover_instagram() {
            document.getElementById("icon_instagram").classList.remove("hovered_icon_instagram");
            document.getElementById("link_texto_instagram").classList.remove("hovered_text");
        }

        document.getElementById("icon_youtube").addEventListener("mouseover", hover_youtube);
        document.getElementById("icon_youtube").addEventListener("mouseout", noHover_youtube);
        document.getElementById("link_texto_youtube").addEventListener("mouseover", hover_youtube);
        document.getElementById("link_texto_youtube").addEventListener("mouseout", noHover_youtube);

        document.getElementById("icon_face").addEventListener("mouseover", hover_face);
        document.getElementById("icon_face").addEventListener("mouseout", noHover_face);
        document.getElementById("link_texto_face").addEventListener("mouseover", hover_face);
        document.getElementById("link_texto_face").addEventListener("mouseout", noHover_face);

        document.getElementById("icon_twitter").addEventListener("mouseover", hover_twitter);
        document.getElementById("icon_twitter").addEventListener("mouseout", noHover_twitter);
        document.getElementById("link_texto_twitter").addEventListener("mouseover", hover_twitter);
        document.getElementById("link_texto_twitter").addEventListener("mouseout", noHover_twitter);

        document.getElementById("icon_instagram").addEventListener("mouseover", hover_instagram);
        document.getElementById("icon_instagram").addEventListener("mouseout", noHover_instagram);
        document.getElementById("link_texto_instagram").addEventListener("mouseover", hover_instagram);
        document.getElementById("link_texto_instagram").addEventListener("mouseout", noHover_instagram);
    </script>
    <!-- FIM SCRIPT HOVER -->





    <div class="gridFooter">

        <!-- Copyrights -->
        <div class="copyrightCreci">
            <span>©<?= date('Y') ?> CRECI-SE | Todos os direitos reservados.</span>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>