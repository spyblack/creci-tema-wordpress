
<?php
/**
 * Funções e definições do tema CRECI SERGIPE
 *
 * @link https://crecise.gov.br
 *
 * @package CRECISE
 * @subpackage Creci-Sergipe
 * @since Creci-Sergipe 1.0
 */

// Carregando nossos scripts e folhas de estilos
function load_scripts()
{
	wp_enqueue_script('bootstrap-v4.1.3-js', get_template_directory_uri() . '/stylesheet/bootstrap-v4.1.3-js.min.js', array('jquery'), '4.1.3', true);
	wp_enqueue_style('bootstrap-v4.1.3-css', get_template_directory_uri() . '/stylesheet/bootstrap-v4.1.3-css.min.css', array(), '4.1.3', 'all');
	wp_enqueue_style('all.css', get_template_directory_uri() . '/css/ftaw/css/all.css', array(), '5.15.2', 'all');
	wp_enqueue_style('fonts.googleapis', 'https://fonts.googleapis.com/css?family=Oswald', array(), '5.3.1', 'all');
	wp_enqueue_style('fonts.googleapis', 'https://fonts.googleapis.com/css?family=Roboto', array(), '5.3.1', 'all');
	wp_enqueue_style('style', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
	wp_enqueue_style('responsive', get_template_directory_uri() . '/css/responsive.css', array(), '1.0', 'all');
	wp_enqueue_style('style-header', get_template_directory_uri() . '/css/style-header.css', array(), '1.0', 'all');
	wp_enqueue_style('style-header-topo', get_template_directory_uri() . '/css/style-header-topo.css', array(), '1.0', 'all');
	wp_enqueue_style('style-buscar-corretor', get_template_directory_uri() . '/css/style-buscar-corretor.css', array(), '1.0', 'all');
	wp_enqueue_style('style-faq', get_template_directory_uri() . '/css/style-faq.css', array(), '1.0', 'all');
	wp_enqueue_style('style-header-meio', get_template_directory_uri() . '/css/style-header-meio.css', array(), '1.0', 'all');
	wp_enqueue_style('style-footer', get_template_directory_uri() . '/css/style-footer.css', array(), '1.0', 'all');
	wp_enqueue_style('style-search', get_template_directory_uri() . '/css/style-search.css', array(), '1.0', 'all');
	wp_enqueue_style('style-widget', get_template_directory_uri() . '/css/style-widget.css', array(), '1.0', 'all');
	wp_enqueue_style('style-noticias', get_template_directory_uri() . '/css/style-noticias.css', array(), '1.0', 'all');
	wp_enqueue_style('style-botoes', get_template_directory_uri() . '/css/style-botoes.css', array(), '1.0', 'all');
	wp_enqueue_style('style-clube-corretor', get_template_directory_uri() . '/css/style-clube-corretor.css', array(), '1.0', 'all');
	wp_enqueue_style('style-tv-creci', get_template_directory_uri() . '/css/style-tv-creci.css', array(), '1.0', 'all');
	wp_enqueue_style('style-single', get_template_directory_uri() . '/css/style-single.css', array(), '1.0', 'all');
	wp_enqueue_style('style-botoes-maiores', get_template_directory_uri() . '/css/style-botoes-maiores.css', array(), '1.0', 'all');
	wp_enqueue_style('style-404', get_template_directory_uri() . '/css/style-404.css', array(), '1.0', 'all');
	wp_enqueue_style('style-botoes-footer', get_template_directory_uri() . '/css/style-botoes-footer.css', array(), '1.0', 'all');
	wp_enqueue_style('style-slider-noticias', get_template_directory_uri() . '/css/style-slider-noticias.css', array(), '1.0', 'all');


	// Style CSS SLIDER
	wp_enqueue_style('carousel', get_template_directory_uri() . '/lib/css/owl.carousel.min.css', array(), '1.0', 'all');
	wp_enqueue_style('owl-theme-default', get_template_directory_uri() . '/lib/css/owl.theme.default.min.css', array(), '1.0', 'all');
	wp_enqueue_style('all', get_template_directory_uri() . '/lib/css/all.css', array(), '1.0', 'all');
	wp_enqueue_style('transicao-slider', get_template_directory_uri() . '/lib/css/transicao-slider.css', array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'load_scripts');



// Menu e suporte a miniaturas de posts
function themeCreci_menu()
{
	register_nav_menus(
		array(
			'mainMenu' => 'Principal',
			'intranetMenu' => 'Intranet'
		)
	);
	$args = array(
		'height' => 300,
		'width'  => 1200
	);
	add_theme_support('post-thumbnails'); //imagem destacada
}
add_action('after_setup_theme', 'themeCreci_menu', 0);



// URL
function url_theme()
{
	return get_site_url(null, '/wp-content/themes/creci-sergipe-top/', 'http');
}


// Criando Widgets da Lateral Direita do Site
if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name'			    => 'Lateral Notícia',
		'id'            => 'single-lateral',
		'before_widget'	=> '<div class="widget">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<div class="section-title mb-30 mt-20"><h2>',
		'after_title'	  => '</h2></div>',
	));
}

// Modal complemento dos Botões maiores
function modal_creci_shortcode($atts)
{

	// Attributes
	$atts = shortcode_atts(
		array(
			'id' => '',
			'chamada_src' => '',
			'banner_src' => '',
			'link' => '',
			'legenda' => '',
		),
		$atts,
		'modal_creci'
	);

	$modal = '
		<a href="#" data-toggle="modal" data-toggle="modal" data-target="#' . $atts['id'] . '"><img src="' . $atts['chamada_src'] . '" /></a>

		<div class="modal animate__animated animate__fadeIn" id="' . $atts['id'] . '" tabindex="-1" role="dialog" aria-labelledby="' . $atts['id'] . '-ModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="' . $atts['id'] . '-ModalLabel">' . $atts['legenda'] . '</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				<img src="' . $atts['banner_src'] . '" style="object-fit: contain; width: 100%; height: auto;
}">
			  </div>
			</div>
		  </div>
		</div>
	';
	// Return cloaked email
	return $modal;
}
add_shortcode('modal_creci', 'modal_creci_shortcode');

//FAQS
function create_posttype()
{
	register_post_type(
		'faq',
		array(
			'labels' => array(
				'name' => __('FAQs'),
				'singular_name' => __('FAQ'),
				'menu_name'           => __('FAQs', 'twentythirteen'),
				'parent_item_colon'   => __('FAQ Pai', 'twentythirteen'),
				'all_items'           => __('Todos os FAQs', 'twentythirteen'),
				'view_item'           => __('Ver FAQ', 'twentythirteen'),
				'add_new_item'        => __('Adicionar novo FAQ', 'twentythirteen'),
				'add_new'             => __('Adicionar novo', 'twentythirteen'),
				'edit_item'           => __('Editar FAQ', 'twentythirteen'),
				'update_item'         => __('Atualizar FAQ', 'twentythirteen'),
				'search_items'        => __('Pesquisar FAQ', 'twentythirteen'),
				'not_found'           => __('Não Encontrado', 'twentythirteen'),
				'not_found_in_trash'  => __('Não Encontrado na Lixeira', 'twentythirteen')
			),
			'public' => true,
			'has_archive' => true,
			'hierarchical' => true,
			'rewrite'  => array('slug' => 'faq'),
			'supports' => array('title', 'editor'),
			'menu_icon' => 'dashicons-admin-site'
		)
	);
}

//Youtube
register_post_type(
	'canal-youtube',
	array(
		'labels' => array(
			'name' => __('Vídeos - TV CRECI-SE'),
			'singular_name' => __('Vídeo - TV CRECI-SE'),
			'menu_name'           => __('YOUTUBE', 'twentythirteen'),
			'parent_item_colon'   => __('Vídeo Pai', 'twentythirteen'),
			'all_items'           => __('Todos os Vídeos', 'twentythirteen'),
			'view_item'           => __('Ver Vídeo', 'twentythirteen'),
			'add_new_item'        => __('Adicionar novo Vídeo', 'twentythirteen'),
			'add_new'             => __('Adicionar novo', 'twentythirteen'),
			'edit_item'           => __('Editar Vídeo', 'twentythirteen'),
			'update_item'         => __('Atualizar Vídeo', 'twentythirteen'),
			'search_items'        => __('Pesquisar Vídeo', 'twentythirteen'),
			'not_found'           => __('Não Encontrado', 'twentythirteen'),
			'not_found_in_trash'  => __('Não Encontrado na Lixeira', 'twentythirteen')
		),
		'public' => true,
		'has_archive' => true,
		'rewrite'  => array('slug' => 'canal-youtube'),
		'supports' => array('title', 'custom-fields'),
		'menu_icon' => 'dashicons-admin-site'
	)
);

//Clube Corretor
register_post_type(
	'clube-corretor',
	array(
		'labels' => array(
			'name' => __('Clube do Corretor'),
			'singular_name' => __('Clube do Corretor'),
			'menu_name'           => __('CLUBE', 'twentythirteen'),
			'parent_item_colon'   => __('Propaganda Pai', 'twentythirteen'),
			'all_items'           => __('Todas Propagandas', 'twentythirteen'),
			'view_item'           => __('Ver Propaganda', 'twentythirteen'),
			'add_new_item'        => __('Adicionar nova Propaganda', 'twentythirteen'),
			'add_new'             => __('Adicionar nova', 'twentythirteen'),
			'edit_item'           => __('Editar Propaganda', 'twentythirteen'),
			'update_item'         => __('Atualizar Propaganda', 'twentythirteen'),
			'search_items'        => __('Pesquisar Propaganda', 'twentythirteen'),
			'not_found'           => __('Não Encontrada', 'twentythirteen'),
			'not_found_in_trash'  => __('Não Encontrada na Lixeira', 'twentythirteen')
		),
		'public' => true,
		'has_archive' => true,
		'rewrite'  => array('slug' => 'clube-corretor'),
		'supports' => array('title', 'custom-fields'),
		'menu_icon' => 'dashicons-admin-site'
	)
);

// Botoes de destaque frontpage
register_post_type(
	'botoes-frontpage',
	array(
		'labels' => array(
			'name' => __('Botões de Destaque Frontpage'),
			'singular_name' => __('Botões de Destaque-Frontpage'),
			'menu_name'           => __('Botões Frontpage', 'twentythirteen'),
			'parent_item_colon'   => __('Botão Pai', 'twentythirteen'),
			'all_items'           => __('Todos os Botões', 'twentythirteen'),
			'view_item'           => __('Ver Botão', 'twentythirteen'),
			'add_new_item'        => __('Adicionar novo Botão', 'twentythirteen'),
			'add_new'             => __('Adicionar novo', 'twentythirteen'),
			'edit_item'           => __('Editar Botão', 'twentythirteen'),
			'update_item'         => __('Atualizar Botão', 'twentythirteen'),
			'search_items'        => __('Pesquisar Botão', 'twentythirteen'),
			'not_found'           => __('Não Encontrado', 'twentythirteen'),
			'not_found_in_trash'  => __('Não Encontrado na Lixeira', 'twentythirteen')
		),
		'public' => true,
		'has_archive' => true,
		'rewrite'  => array('slug' => 'botoes-frontpage'),
		'supports' => array('title', 'custom-fields'),
		'menu_icon' => 'dashicons-admin-site'
	)
);
register_post_type(
	'botoes-acesso-rapido',
	array(
		'labels' => array(
			'name' => __('Botões de Acesso Rapido'),
			'singular_name' => __('Botões de Acesso Rápido'),
			'menu_name'           => __('Botões de Acesso Rápido/Serviços', 'twentythirteen'),
			'parent_item_colon'   => __('Botão Pai', 'twentythirteen'),
			'all_items'           => __('Todos os Botões', 'twentythirteen'),
			'view_item'           => __('Ver Botão', 'twentythirteen'),
			'add_new_item'        => __('Adicionar novo Botão', 'twentythirteen'),
			'add_new'             => __('Adicionar novo', 'twentythirteen'),
			'edit_item'           => __('Editar Botão', 'twentythirteen'),
			'update_item'         => __('Atualizar Botão', 'twentythirteen'),
			'search_items'        => __('Pesquisar Botão', 'twentythirteen'),
			'not_found'           => __('Não Encontrado', 'twentythirteen'),
			'not_found_in_trash'  => __('Não Encontrado na Lixeira', 'twentythirteen')
		),
		'public' => true,
		'has_archive' => true,
		'rewrite'  => array('slug' => 'botoes-acesso-rapido'),
		'supports' => array('title', 'custom-fields'),
		'menu_icon' => 'dashicons-admin-site'
	)
);
register_post_type(
	'botoes-menores',
	array(
		'labels' => array(
			'name' => __('Botões Menores'),
			'singular_name' => __('Botões Menores'),
			'menu_name'           => __('Botões Menores', 'twentythirteen'),
			'parent_item_colon'   => __('Botão Pai', 'twentythirteen'),
			'all_items'           => __('Todos os Botões', 'twentythirteen'),
			'view_item'           => __('Ver Botão', 'twentythirteen'),
			'add_new_item'        => __('Adicionar novo Botão', 'twentythirteen'),
			'add_new'             => __('Adicionar novo', 'twentythirteen'),
			'edit_item'           => __('Editar Botão', 'twentythirteen'),
			'update_item'         => __('Atualizar Botão', 'twentythirteen'),
			'search_items'        => __('Pesquisar Botão', 'twentythirteen'),
			'not_found'           => __('Não Encontrado', 'twentythirteen'),
			'not_found_in_trash'  => __('Não Encontrado na Lixeira', 'twentythirteen')
		),
		'public' => true,
		'has_archive' => true,
		'rewrite'  => array('slug' => 'botoes-menores'),
		'supports' => array('title', 'custom-fields'),
		'menu_icon' => 'dashicons-admin-site'
	)
);


add_action('init', 'create_posttype');


/*/ Paginação de pesquisa */
if (!function_exists('post_pagination')) :
	function post_pagination()
	{
		global $wp_query;
		$pager = 999999999; // need an unlikely integer

		echo paginate_links(array(
			'base' => str_replace($pager, '%#%', esc_url(get_pagenum_link($pager))),
			'format' => '?paged=%#%',
			'current' => max(1, get_query_var('paged')),
			'total' => $wp_query->max_num_pages,

		));
	}
endif;

// Limitar qtde de Caracteres do título do post
function max_title_length($title)
{
	$max = 80;
	if (strlen($title) > $max) {
		return substr($title, 0, $max) . "&hellip;";
	} else {
		return $title;
	}
}
//Limitar quabtidade de caracteres do título do últimas notícias
function max_title_length_latestnews($title)
{
	$max = 50;
	if (strlen($title) > $max) {
		return substr($title, 0, $max) . "&hellip;";
	} else {
		return $title;
	}
}
// Limitar qtde de Caracteres do resumo do post
function max_resume_length($resume)
{
	$max = 60;
	if (strlen($resume) > $max) {
		return substr($resume, 0, $max) . "&hellip;";
	} else {
		return $resume;
	}
}
// Limitar qtde de Caracteres da pesquisa
function max_resumeSearch_length($resume)
{
	$max = 170;
	if (strlen($resume) > $max) {
		return substr($resume, 0, $max) . "&hellip;";
	} else {
		return $resume;
	}
}

//LEIA MAIS EM WORDPRESS

add_filter('the_content_more_link', 'filter_more_link');
function filter_more_link($link)
{
	return ' <a class="read-more" href="' . get_permalink(get_the_ID()) . '" title="Continue lendo ' . get_the_title() . '">Continue lendo ' . get_the_title() . '...</a>';
}

//PLUGIN VIDEOS YOUTUBE PORTADO
function dados_youtube($videoID)
{

	$data = array('thumb-1' => 'https://img.youtube.com/vi/' . $videoID . '/maxresdefault.jpg', 'thumb-2' => 'https://img.youtube.com/vi/' . $videoID . '/2.jpg', 'url' => 'https://www.youtube.com/watch?v=' . $videoID . '');
	return $data;
}
