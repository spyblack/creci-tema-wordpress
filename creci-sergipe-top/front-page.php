<?php
// Limita quantidade de caracters
add_filter('the_excerpt', 'max_resume_length');

get_header(); ?>

<div class="containerCreciSergipe">
    <!-- BUSCAR CORRETOR INSCRITO -->
    <div>
        <form class="grid-buscarcorretor" target="_blank" action="https://www.crecise.conselho.net.br/form_pesquisa_cadastro_geral_site.php?acao=PesquisarCadastro&OK=1" method="POST">
            <div class="titulo-buscorretor">
                <h2> Buscar corretor inscrito</h2>
            </div>
            <div class="input-container1">
                <input id="strNome" name="strNome" class="input-buscorretor1" type="text" placeholder=" ">
                <label class="label-buscorretor1" for="strNome">Nome</label>
            </div>
            <div class="input-container2">
                <input id="intCodigoCadastro" name="intCodigoCadastro" class="input-buscorretor2" type="text" placeholder=" ">
                <label class="label-buscorretor2" for="intCodigoCadastro">Número do CRECI</label>
            </div>
            <div class="input-container3">
                <input id="strLocal" name="strLocal" class="input-buscorretor3" type="text" placeholder=" ">
                <label class="label-buscorretor3" for="strLocal">Cidade</label>
            </div>
            <div class="botao-buscarcorretor">
                <button class="botao-buscorretor botao-geral" type="submit">BUSCAR</button>
            </div>
        </form>
    </div>
    <hr>
</div>

<div class="containerCreciSergipe">
    <!-- INICIO SLIDER -->
    <div class="indicadorOWL">
        <!--    Carousel Slider    -->
        <main class="owl-carousel containerCreciSergipe">
            <?php
            $loop = new WP_Query(array('post_type' => 'post', 'owl-carousel' => 'rand', 'posts_per_page' => 5));
            while ($loop->have_posts()) : $loop->the_post();
            ?>
                <section class="carousel-slider active grid-SliderT ">

                    <div class="grid-imgSlider">

                        <a class="img"><?php the_post_thumbnail(); ?></a>
                    </div>

                    <!-- Conteudo -->
                    <div class="carousel grid-conteudoSlider">
                        <div class="tituloSlide dataSlider ">
                            <a href="<?php the_permalink(); ?>">
                                <h3><?php the_title(); ?></h3>
                            </a>
                        </div>
                        <div class="dataSlider ">
                            <center><span> Publicado em: <?= get_the_date('j/m/Y'); ?> </span></center>
                        </div>
                        <div class="grid-cont-bot">
                            <div class="conteudoSlide blockquote-wrapper grid-textoSlider">

                                <div class="blockquote"> <i class="fas fa-quote-left"></i>
                                    <h5> <?php the_excerpt(); ?> </h5>
                                </div>
                            </div>
                            <!-- Botão LEIA MAIS -->
                            <div class="grid-botãoSlider">
                                <center><a href="<?= the_permalink(); ?>" class="btnLeiaMais btn-lg">LEIA MAIS</a> </center>
                            </div>
                        </div>
                    </div>
                </section>
            <?php
            endwhile;
            wp_reset_query();
            ?>
        </main>
        <!-- Botão LER TODAS NOTICIAS -->
        <div class="d-flex justify-content-center grid-MaisNotSlider">
            <form class="d-flex justify-content-center" action="<?= get_site_url() ?>/category/noticias">
                <button class="botao-MaisNot botao-geral"> Clique aqui para ler todas notícias do CRECI</button>
            </form>
        </div>
    </div>
    <!-- fim Slider-->
    <!-- Inicio do JAVASCRIP DO SLIDER -->
    <script src="<?= url_theme() ?>lib/js/jquery.js"></script>
    <script src="<?= url_theme() ?>lib/js/owl.carousel.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var owl = $(".owl-carousel");
            owl.owlCarousel({
                animateOut: 'animate__fadeOut',
                loop: true,
                margin: 0,
                autoplay: true,
                autoplayTimeout: 3000, // Tempo que o slide passa
                pages: true,
                autoplayHoverPause: true,
                rtl: false, // Efeito de passar pela esquerda
                responsive: { //A cada tipo de tela a quantiade de posts será exibidos.
                    0: {
                        items: 1
                    },
                    300: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            });

        });
    </script>
</div>
<div class="containerCreciSergipe">
    <hr>
    <!-- BOTÕES MAIORES -->
    <div class="botoes-frontpage">
        <?php
        $loop = new WP_Query(array('post_type' => 'botoes-frontpage', 'posts_per_page' => 4));
        while ($loop->have_posts()) : $loop->the_post();
            $url_id_loop = get_post_meta($post->ID, 'url_link_banner', true);
            $tamanho_url = strlen($url_id_loop);
        ?>
            <!-- Botão para acionar modal -->
            <img class="img-clicavel" src="<?php the_field('imagem_do_botao'); ?>" alt="" data-toggle="modal" data-target="#<?php the_title() ?>">

            <!-- Modal -->
            <div class="modal fade" id="<?php the_title() ?>" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="TituloModalLongoExemplo"><?php the_field('titulo_botao_destaque'); ?></h5>
                            <button type="button" class="button-modal" data-dismiss="modal"><b>Fechar</b></button>
                        </div>
                        <!-- verifica se existe endereço escrito no campo link -->
                        <div class="modal-body">
                            <?php
                            if ($tamanho_url > 0) {
                            ?>
                                <a href="<?= $url_id_loop ?>" target="_blank">
                                    <img src="<?php the_field('imagem_de_destaque'); ?>"></img>
                                </a>
                            <?php
                            } else {
                            ?>
                                <img src="<?php the_field('imagem_de_destaque'); ?>"></img>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile;
        wp_reset_query(); ?>

    </div>
    <!-- BOTÕES -->
    <div class="botoes-grid">

        <!-- BOLETO DE ANUIDADE -->
        <a class="boletoat" href="boleto">
            <i class='alterColor1 fa fa-3x fa-barcode'></i>
            <h4 class='alterColor1'>Boleto de</br>Anuidade</h4>
        </a>

        <!-- CANAIS DE ATENDIMENTO -->
        <a class="canaisat" href="covid-19" target="_blank">
            <i class="alterColor2 fa fa-2x fa-users"></i>
            <h4 class='alterColor2'>Canais de</br>Atendimento</h4>
        </a>

        <!-- APP I-CORRETOR -->

        <a class="appicorretor" href="#">
            <i class="alterColor3 fas fa-3x fa-address-card"></i>
            <h4 class="alterColor3">Aplicativo</br>I-Corretor</h4>
        </a>

        <!-- CONVENIO CAIXA -->
        <a class="convenio" href="convenio-caixa-cofeci">
            <i class="alterColor4 far fa-check-square"></i>
            <h4 class="alterColor4">Convenio</br>Caixa</h4>
        </a>

        <!-- PORTAL CRECI -->

        <a class="portal" href="https://novo.portalcreci.org.br/">
            <i class="alterColor5 far fa-3x fa-building"></i>
            <h4 class="alterColor5">Portal</br>CRECI</h4>
        </a>

        <!-- AMIGOS CHEVROLET -->

        <a class="amigoschevrolet" href="parceria-creci-se-e-chevrolet">
            <i class="alterColor6 fa fa-3x fa-car"></i>
            <h4 class="alterColor6">Amigos</br>Chevrolet</h4>
        </a>

    </div>

    <hr>
    <!-- TESTE BOTÕES MENORES COM CUSTOM POST TYPE -->
    <!-- <div class="botoes-grid"> -->
        <!-- <php
        $numero_botao = 0;
        $loop = new WP_Query(array('post_type' => 'botoes-menores', 'posts_per_page' => 1));
        while ($loop->have_posts()) : $loop->the_post();
            $url_id_loop = get_post_meta($post->ID, 'link_do_botao_menor', true);
            $numero_botao = $numero_botao + 1;
        ?> -->
            <!-- BOLETO DE ANUIDADE -->
            <!-- <div>
                <a href="<= $url_id_loop ?>">
                    <i class='$alterColor<php $numero_botao; ?> <php the_field('icone_do_botao_menor'); ?>'></i>
                    <h4 class='alterColor<php $numero_botao; ?>'><php the_field('titulo_linha_1'); ?></br><php the_field('titulo_linha_2'); ?></h4>
                </a>
            </div> -->
        <!-- <php endwhile;
        wp_reset_query(); ?>
    </div> -->
    <!-- <hr> -->
</div>


<style>
    .bgTvCRECI {
        background-image: url("<?= url_theme() ?>/canal-tvcreci-yt.jpg");
        background-position: right bottom;
        padding: 20px 0;

    }
</style>
<!-- YOUTUBE -->
<div class="containerCreciSergipe mb-1">
    <div class="linha-tv">
        <div>
            <i class="fab fa-youtube fa-2x mr-1"></i>
        </div>

        <div class="section-title-tv">
            <h2>TV CRECI SERGIPE</h2>
        </div>
    </div>

</div>

<div class="bgTvCRECI pt-4 pb-4" style="background-color: #eeeeee;">
    <div class="containerCreciSergipe">
        <div>
            <div>
                <div>
                    <div class="galerry pos-relative mb-30 hover-video">
                        <div class="galerry">
                            <div class="galerry__thumb ">
                                <?php
                                $args = array('post_type' => 'canal-youtube', 'posts_per_page' => '1');
                                $posts = get_posts($args);
                                foreach ($posts as $post) :

                                    if (!empty(get_field('youtube_thumbnail'))) {
                                        $dados['thumb-1'] = get_field('youtube_thumbnail');
                                    } else {
                                        $dados = dados_youtube(get_field('youtube_video_id'));
                                    }
                                ?>
                                    <figure class="galerry__thumb__item galerry__thumb__item--1 ">
                                        <a href="https://www.youtube.com/watch?v=<?= get_field('youtube_video_id') ?>" target="_blank">
                                            <img src="<?= $dados['thumb-1'] ?>" alt="<?= the_title() ?>">
                                        </a>
                                    </figure>
                                <?php endforeach;
                                wp_reset_query(); ?>
                                <?php
                                $args = array('post_type' => 'canal-youtube', 'posts_per_page' => '1', 'offset' => 1);
                                $posts = get_posts($args);
                                foreach ($posts as $post) :

                                    if (!empty(get_field('youtube_thumbnail'))) {
                                        $dados['thumb-1'] = get_field('youtube_thumbnail');
                                    } else {
                                        $dados = dados_youtube(get_field('youtube_video_id'));
                                    }
                                ?>
                                    <figure class="galerry__thumb__item galerry__thumb__item--2">
                                        <a href="https://www.youtube.com/watch?v=<?= get_field('youtube_video_id') ?>" target="_blank">
                                            <img src="<?= $dados['thumb-1'] ?>" alt="<?= the_title() ?>">
                                        </a>
                                    </figure>
                                <?php endforeach;
                                wp_reset_query(); ?>
                                <?php
                                $args = array('post_type' => 'canal-youtube', 'posts_per_page' => '1', 'offset' => 2);
                                $posts = get_posts($args);
                                foreach ($posts as $post) :

                                    if (!empty(get_field('youtube_thumbnail'))) {
                                        $dados['thumb-1'] = get_field('youtube_thumbnail');
                                    } else {
                                        $dados = dados_youtube(get_field('youtube_video_id'));
                                    }
                                ?>
                                    <figure class="galerry__thumb__item galerry__thumb__item--3">
                                        <a href="https://www.youtube.com/watch?v=<?= get_field('youtube_video_id') ?>" target="_blank">
                                            <img src="<?= $dados['thumb-1'] ?>" alt="<?= the_title() ?>">
                                        </a>
                                    </figure>

                                <?php endforeach;
                                wp_reset_query(); ?>
                                <?php
                                $args = array('post_type' => 'canal-youtube', 'posts_per_page' => '1', 'offset' => 3);
                                $posts = get_posts($args);
                                foreach ($posts as $post) :

                                    if (!empty(get_field('youtube_thumbnail'))) {
                                        $dados['thumb-1'] = get_field('youtube_thumbnail');
                                    } else {
                                        $dados = dados_youtube(get_field('youtube_video_id'));
                                    }
                                ?>
                                    <figure class="galerry__thumb__item galerry__thumb__item--4">
                                        <a href="https://www.youtube.com/watch?v=<?= get_field('youtube_video_id') ?>" target="_blank">
                                            <img src="<?= $dados['thumb-1'] ?>" alt="<?= the_title() ?>">
                                        </a>
                                    </figure>
                                <?php endforeach;
                                wp_reset_query(); ?>
                                <?php
                                $args = array('post_type' => 'canal-youtube', 'posts_per_page' => '1', 'offset' => 4);
                                $posts = get_posts($args);
                                foreach ($posts as $post) :

                                    if (!empty(get_field('youtube_thumbnail'))) {
                                        $dados['thumb-1'] = get_field('youtube_thumbnail');
                                    } else {
                                        $dados = dados_youtube(get_field('youtube_video_id'));
                                    }
                                ?>
                                    <figure class="galerry__thumb__item galerry__thumb__item--5">
                                        <a href="https://www.youtube.com/watch?v=<?= get_field('youtube_video_id') ?>" target="_blank">
                                            <img src="<?= $dados['thumb-1'] ?>" alt="<?= the_title() ?>">
                                        </a>
                                    </figure>
                                <?php endforeach;
                                wp_reset_query(); ?>
                            </div>
                        </div>
                    </div>
                    <!-- BOTÃO IR PARA CANAL DO CRECI -->

                    <form class="d-flex justify-content-center" action="https://www.youtube.com/channel/UCTQNUZWTHVsPwP0RCV5NWOw" target="_blank">
                        <button class="ButtonTVCRECI botao-geral">IR PARA TV CRECI</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="containerCreciSergipe">
    <hr>
    <br>
    <!-- FAQ -->
    <div class="linha grid-faq-club">
        <div class="grid-faq">
            <div class="section-title-general">
                <h2>DÚVIDAS FREQUENTES (FAQ)</h2>
            </div>
            <?php
            $loop = new WP_Query(array('post_type' => 'faq', 'orderby' => 'rand', 'posts_per_page' => 4));
            while ($loop->have_posts()) : $loop->the_post();
            ?>
                <div class="linha-faq">
                    <p class="accordion "><?php the_title() ?></p>
                    <div class="panel"><?php the_content(); ?></div>
                </div>
            <?php endwhile;
            wp_reset_query(); ?>

            <!-- BOTÃO FAQ -->
            <div class="d-flex justify-content-center">
                <form action="<?= get_site_url() ?>/faq">
                    <button class="botao-faq botao-geral">LEIA MAIS PERGUNTAS</button>
                </form>
            </div>
        </div>

        <!-- SLIDE CLUBE DO CORRETOR  -->
        <div class="grid-club">
            <div class="section-title-general">
                <h2>CLUBE DO CORRETOR</h2>
                <p>Clube do corretor é voltado para corretores de imoveis de Aracaju.</p>
            </div>

            <div class="div-slide-center">
                <div class="slideCLUBE">
                    <div class="owl-carousel ">
                        <?php
                        $loop = new WP_Query(array('post_type' => 'clube-corretor', 'owl-carousel' => 'rand', 'posts_per_page' => 10));
                        while ($loop->have_posts()) : $loop->the_post();
                        ?>
                            <!-- Informações do Post -->

                            <div class="owl-carouselClube">
                                <!-- Imagem -->

                                <a href="<?php the_field('endereco_da_propaganda'); ?>" target="_blank">
                                    <img src="<?php the_field('imagem'); ?>"></img>
                                </a>
                            </div>
                        <?php endwhile;
                        wp_reset_query(); ?>
                    </div>

                    <!-- Botão Ir pro site Clube Corretor -->
                    <div class="espaco-alinhamento d-flex justify-content-center">
                        <form action="https://crecise.gov.br/clube/" target="_blank">
                            <button class="ButtonCLUBE botao-geral">IR PARA CLUBE DO CORRETOR</button>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- JAVA DO FAQ -->
    <script type="text/javascript">
        $(window).on('load', function() {
            $('#myModal').modal('show');
        });
    </script>
    <script src="<?= url_theme() ?>lib/js/owl.carousel.min.js"></script>
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var acc = document.getElementsByClassName("accordion");
            var panel = document.getElementsByClassName('panel');

            for (var i = 0; i < acc.length; i++) {
                acc[i].onclick = function() {
                    var setClasses = !this.classList.contains('active');
                    setClass(acc, 'active', 'remove');
                    setClass(panel, 'show', 'remove');

                    if (setClasses) {
                        this.classList.toggle("active");
                        this.nextElementSibling.classList.toggle("show");
                    }
                }
            }

            function setClass(els, className, fnName) {
                for (var i = 0; i < els.length; i++) {
                    els[i].classList[fnName](className);
                }
            }

        });
    </script>


</div>

<br>
<?php get_footer();
