<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package LFLIC
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'lflic' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				
				<div class="go__home">
					<a href="#">Go Back to Home</a>
				</div>
				<div class="search__bar">
					<?php
					get_search_form();
					?>
				</div>

					

			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
