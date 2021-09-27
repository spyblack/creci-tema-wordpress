<?php
get_header();
?>

<?php get_header(); ?>


<div class="containerCreciSergipe">
    <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
    <?php
    // Conteudo de uma página específica
    if (have_posts()):
        while (have_posts()) : the_post();
            ?>
                <article>
                    <h2><?php the_title(); ?></h2>
                    <?php the_content(); ?>
                </article>
            <?php
        endwhile;
    else :
        ?>
        <span>Não há conteudo aqui.</span>
    <?php endif; ?>
</div>
<?php get_footer(); ?>