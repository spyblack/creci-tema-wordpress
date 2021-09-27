<?php

/**
 * Template for displaying search forms in Twenty Sixteen
 *
 * @package WordPress
 * @subpackage Creci_Sergipe
 * @since Creci_Sergipe 1.0
 */
?>
<form class="form_searchCreci" autocomplete="on" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
	<input class="input-busca" id="search" type="text" placeholder="Pesquisar" value="<?php echo get_search_query(); ?>" name="s" required>
	<button type="submit">
		<i class="fa fa-search"> </i>
	</button>
</form> 