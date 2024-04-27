<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package LFLIC
 */

?>

	<footer id="colophon" class="site-footer">
	
		<div class="footer-menus">
				<div class="footer-navigation">
					<nav>
						<?php wp_nav_menu( array( 'theme_location' => 'footer-left' )); ?>
					</nav>
				</div>

				<?php
				// WP Query	for Contact info
				$args = array(
					'post_type' => 'page',
					'page_id' => 48
				);
				$contact_query = new WP_Query($args);
				if ($contact_query->have_posts()) :
					while ($contact_query->have_posts()) : $contact_query->the_post();
					if (get_field('email') && 
						get_field('phone_number') &&
						get_field('help_text') &&
						get_field('help_number')
						) :
						$email = get_field('email');
						$phone_number = get_field('phone_number');
						$help_text = get_field('help_text');
						$help_number = get_field('help_number');
					?>
						<div class="contact__info">
							<h3><?php the_title(); ?></h3>
							<div class="contact__wrap">
								<a href="mailto:<?php echo esc_html($email); ?>"><?php echo esc_html($email); ?></a>
								<p><?php echo esc_html($phone_number); ?></p>
								<p><?php echo esc_html($help_text); ?></p>
								<a href="tel:<?php echo esc_html($help_number); ?>"><?php echo esc_html($help_number); ?></a>
							</div>
						</div>
					<?php
						endif;
					endwhile;
					wp_reset_postdata();
				endif;
				?>
			<div class="social_icons">
				<nav>
					<?php wp_nav_menu( array( 'theme_location' => 'footer-right' )); ?>
				</nav>
				<p><?php the_privacy_policy_link(); ?></p>
			</div>
		</div><!-- .footer-menus -->
			<div class="site-info">
				<p>&copy; <?php echo date('Y'); ?> Living Full Life International Clinic</p>
				
					<p><?php esc_html_e( 'Created by ', 'lflic' ); ?><a href="<?php echo esc_url( __( 'https://kaorisato.ca/', 'lflic' ) ); ?>"><?php esc_html_e( 'Kaori', 'lflic' ); ?></a></p>
			</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
