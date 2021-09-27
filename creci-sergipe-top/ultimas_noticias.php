<?php
// Limita quantidade de caracters
add_filter('the_title', 'max_title_length_latestnews');
?>

<!-- Mais notícias -->
<div class="aux-ultimas col-sm-12 col-md-3 col-lg-3 col-xl-3">
    <div class="section-title-general">
        <h2 class="ultimas-noticias">ÚLTIMAS NOTÍCIAS</h2>
    </div>
    <?php
    $loop = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 6));
    while ($loop->have_posts()) : $loop->the_post();
    ?>
        <!-- Informações do Post -->

        <div class="ultimasNOT">
            <!-- DATA d/m/Y -->
            <div class="datUltmNot">
                <small><i class="fa fa-calendar-alt" aria-hidden="true"></i>&ensp;<?= get_the_date('d/m/Y'); ?></small>
            </div>
            <div class="row limite-larg d-flex justify-content-center">
                <div class="ultimasIMAG">
                    <!-- Imagem -->
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                </div>
                <!-- Titulo -->
                <div class="titulo-ultimas">
                    <a href="<?php the_permalink(); ?>" class="titulo-ultimasNOT"><?php the_title(); ?></a>
                </div>
            </div>
            <hr>
        </div>

        <!-- <hr> -->
    <?php endwhile;
    wp_reset_query(); ?>
</div>