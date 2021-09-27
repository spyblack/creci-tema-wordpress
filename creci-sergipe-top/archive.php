<?php get_header(); ?>
<main>
    <section class="post-details-area pt-60 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-10 offset-md-1">
                    <!-- post-details -->
                    <div class="post-details">
                    <br>
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <h1 class="details-title mb-15"><?php the_title(); ?></h1>
                                <!-- post-content -->
                                <div class="post-content mt-15 mb-15">
                                    <?php the_content(); ?>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- start pagination -->
    <!-- Paginação - INICIO-->
    <div class="paginacaoFAQ">
        <?php post_pagination(); ?>
    </div>
    <!-- Paginação - FIM -->
   
</main>

<!-- footer -->
<?php get_footer(); ?>