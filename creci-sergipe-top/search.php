<?php 
get_header(); 
add_filter ('the_excerpt', 'max_resumeSearch_length');
?>

<section class="containerCreciSergipe">
    
    <!-- Titulo para pesquisa -->
    <div class="resultSearchCreci">
        <h5>RESULTADOS ENCONTRADOS: <?= $wp_query->found_posts?></h5>
        <span>Você está pesquisando por: <?= get_search_query() ?> </span>
    </div>

    <?php if (have_posts()) : ?>
        <main class="resultSearchPost">
            <?php while (have_posts()) : the_post(); ?>
                <!-- Posts da pesquisa -->
                <style>
                                  
                </style>
                <div class="whilePostSearch">
                    <div class="gridSearchResult"> 
                        <div class="div_imgSearchResult">
                            <?php
                                if(has_post_thumbnail()){
                                    $thumbURL = get_the_post_thumbnail_url(get_the_ID());
                                }
                                elseif(metadata_exists( 'post', $post->ID, 'youtube_thumbnail' )){
                                    $thumbURL = get_post_meta($post->ID, 'youtube_thumbnail', true);
                                }
                                else{ 
                                    $thumbURL = get_url_theme().'/img/1200x840.png'; 
                                }
                            ?>
                            <a href="<?php the_permalink(); ?>"><img src="<?= $thumbURL ?>" alt="" class="img-responsive" style=""></a>
                        </div>

                        <div class="div_contentSearchResult">
                            <!-- Titulo -->
                            <a href="<?php the_permalink(); ?>">
                                <h5 class="titleSearchCreci"><?php the_title(); ?></h5>
                            </a>

                            <!-- Data -->
                            <?if(is_singular( 'post' )){?>
                            <span class="dateSearchCreci">Publicado dia <?= get_the_date() ?></span>
                            <?}?>
                            <!-- Resumo do post -->
                            <div class="containerExcerptSearch">
                                <p><?php the_excerpt(); ?></p>
                            </div>
                        </div>

                    </div>

                    <div class="searchContinueReading">
                        <a href="<?php the_permalink(); ?>">Continue Lendo</a>
                    </div>
                </div>
            <?php endwhile; ?>

            <!-- Paginação - INICIO-->
            <div class="paginationGeneralCreci">
                <?php post_pagination(); ?> 
            </div>
            <!-- Paginação - FIM -->
        </main>
    <?php else : ?>
        <div class="notfoundSearch">
            <h1>Nada encontrado.</h1>
        </div>
    <?php endif; ?>
</section>
<?php get_footer(); ?>