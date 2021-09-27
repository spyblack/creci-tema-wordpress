<?php get_header(); ?>
<div class="containerCreciSergipe">
	<img class="img-fluid" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
	<div class="content-area">
		<main>
			<section class="middle-area">
				<div class="container">
					<div class="row">

						<div class="error-404">
							<header>
							<p>Desculpe, a página não foi encontrada!</p>
								<h6><?php _e(' ERRO 404', 'CRECI-SE'); ?></h6>
								<p><?php _e('É possível que o endereço digitado não esteja correto. Por favor, verifique e tente novamente!', 'CRECI-SE'); ?></p>
							</header>

							<div class="error">
								<p><?php _e('Se desejar, pesquise escrevendo no campo abaixo o termo desejado.', 'CRECI-SE'); ?></p>							
								<?php get_search_form(); ?>							
								<!-- Botão IR PARA INICIO-->
								<div class="botaoinicio">
									<a href='http://servidor.local/creci_sergipe/'>IR PARA INICIO</a>
								</div>
							</div>

						</div>
					</div>
				</div>
			</section>
		</main>
	</div>
</div>
<?php get_footer(); ?>