<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
	<div>
		<input class="form-control" type="search" placeholder="Chercher" aria-label="Chercher" value="<?php the_search_query(); ?>" name="s" id="s" />
	</div>
</form>
