<!-- Adiciona o cabeçalho (header.php) -->
<?php get_header(); ?>

<main>
	<div class="containerCreciSergipe">
		<!-- page-title-area end -->

		<section class="post-details-area pt-10 pb-10">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-9 col-lg-9 col-xl-9">
						<!-- post-details -->
						<br>
						<div class="post-details">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
									<h2 class="details-title mb-15"><?php the_title(); ?></h2>
									<hr>
									<div class="linha-single grid-Img-Not-Compatilhe-Not">
										<div class="imgPUBLI grid-Img-Not">
											<!-- Imagem -->
											<?php the_post_thumbnail(); ?>
										</div>
										<!-- share-post-link -->
										<div class="share-post-link grid-Compatilhe-Not ">

											<div class="compartilhe-icon justify-content-center">

												<a class="whatsapp" href="https://api.whatsapp.com/send?text=<?= the_title() ?>%20<?= the_permalink() ?>" target="_blank">
													<i class="fab fa-whatsapp"></i>
												</a>											

												<a class="telegram" href="https://telegram.me/share/url?url=<?= the_permalink() ?>&text=<?= the_title() ?>" target="_blank">
													<i class="fab fa-telegram-plane"></i>
												</a>

												<a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?= the_permalink() ?>" target="_blank">
													<i class="fab fa-facebook-f"></i>
												</a>

												<a class="twitter" href="https://twitter.com/share?url=<?= the_permalink() ?>&text=<?= the_title() ?>" target="_blank">
													<i class="fab fa-twitter"></i>
												</a>

												<a class="print" href="#" onclick="window.print()" <?= the_permalink() ?><?= the_title() ?>>
													<i class="fas fa-print"></i>
												</a>

												<a class="email" href="mailto:?subject=%body=:%20<?= the_permalink() ?>&text=<?= the_title() ?>" target="_blank">
													<i class="far fa-envelope"></i>
												</a>

											</div>
										</div>
									</div>
									<!-- Data de publicação -->
									<div class="publicadoDia">
										<!-- <i class="dataPubliDia fas fa-calendar-alt "></i> -->
										<span>Publicado em: <?php the_date('d/m/Y') ?> às <?php the_time(); ?></span>
									</div>

									<!-- post-thumb -->
									<div class="post-thumb mb-25">
										<img src="assets/img/details/post.jpg" alt="">
									</div>


								<?php endwhile; ?>
							<?php endif; ?>

							<!-- post-content -->
							<div class="post-content">
								<hr class="hr-noticia">
								<?php echo the_content(); ?>
							</div>
							<!-- NOTICIAS RECENTES E PROXIMAS -->
							<div class="proximrecent-notic mt-60">
								<div class="proxrecent-notic ">
									<div class="row">
										<div class="col-6">
											<div class="notic__prev mb-30 ">
												<a href="#0" rel="prev">
													<?php next_post_link('%link', '<i class="fas fa-chevron-circle-left"></i> Notícia Anterior'); ?>
												</a>
											</div>
										</div>
										<div class="col-6">
											<div class="notic__next mb-30 text-right ">
												<a href="#0" rel="next">
													<?php previous_post_link('%link', 'Próxima Notícia <i class="fas fa-chevron-circle-right"></i>'); ?>
												</a>
												<br>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<hr>
					</div>

					<!-- Ultimas notícias -->
					<?php require_once("ultimas_noticias.php"); ?>

				</div>
			</div>
		</section>
</main>
<!-- Adiciona o rodapé (footer.php) -->
<?php get_footer(); ?>