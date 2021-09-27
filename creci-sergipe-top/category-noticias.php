<?php
add_filter('the_title', 'max_title_length');
add_filter('the_excerpt', 'max_resume_length');

/* Cabeçalho */
get_header();
?>

<main class="containerCreciSergipe mainNewsFast">
    <div class="section-title-general">
        <h2 class="titulo-noticias">NOTÍCIAS</h2>
    </div>

    <div class="grid">
        <div class="post">
            <!-- Posts -->
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <section class="postsSectionNews">
                        <?php
                        if (has_post_thumbnail()) {
                            $thumbURL = get_the_post_thumbnail_url(get_the_ID());
                        } elseif (metadata_exists('post', $post->ID, 'youtube_thumbnail')) {
                            $thumbURL = get_post_meta($post->ID, 'youtube_thumbnail', true);
                        } else {
                            $thumbURL = get_url_theme() . '/img/1200x840.png';
                        }
                        ?>
                        <!-- Imagem -->
                        <div class="imag-newss">
                            <img src="<?= $thumbURL ?>" alt="">
                        </div>

                        <!-- Titulo & Data -->
                        <div class="title-date-newss">
                            <div class="grid-interno">
                                <div class="titulo-newss">
                                    <a href="<?php the_permalink(); ?>">
                                        <h3>
                                            <?php the_title(); ?>
                                        </h3>
                                    </a>
                                </div>
                                <div class="data-newss">
                                    <span class="pub-newss">Publicado em:</span>
                                    <span><?= get_the_date('d/m/Y'); ?></span>
                                </div>
                            </div>
                        </div>

                        <!-- Resumo -->
                        <div class="resumo-newss">
                            <p><?php the_excerpt(); ?></p>
                        </div>
                        <!-- BOTÃO 'CONTINUE LENDO' DESKTOP -->
                        <div class="botao-newss">
                            <a href="<?php the_permalink(); ?>">Continue Lendo<i class="fas fa-arrow-right"></i></a>
                        </div>

                        <!-- BOTÃO 'CONTINUE LENDO' MOBILE & TABLET -->
                        <div class="mobile-newss">
                            <form action="<?php the_permalink(); ?>">
                                <button class="Botao-mobile-newss">Continue Lendo</button>
                            </form>
                        </div>
                    </section>

                <?php endwhile; ?>
                <hr>
                <!-- Paginação -->
                <div class="paginationGeneralCreci">
                    <?php post_pagination(); ?>
                </div>
            <?php endif; ?>

        </div>

        <!-- Acesso rápido -->
        <div class="fast">
            <div class="section-title-general">
                <h2 class="acesso-rapido">Botões de Acesso Rápido</h2>
            </div>
            <div class="hover-serv">
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
                    <a href="<?php the_field('link_de_acesso_rapido'); ?>" <?= $tag_blank ?>>
                        <div class="botao-fast">
                            <i class="<?= $icone_id ?>"></i>
                            <span> <?php the_field('titulo_de_acesso_rapido'); ?></span>
                        </div>
                    </a>
                <?php endwhile;
                wp_reset_query(); ?>

            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>