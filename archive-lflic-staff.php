<?php
/**
 * The template for displaying archive-lflic-staff pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

	<?php
			$args = array(
				'post_type' => 'lflic-staff',
				'posts_per_page' => -1,
				'order' => 'ASC',
           		'orderby' => 'date'
			);

			$ourteam_query = new WP_Query($args);
			if ($ourteam_query->have_posts()) : ?>

			<section class="our__team__wrap">
				<h2>Our Team</h2>
				<?php
				while ($ourteam_query->have_posts()) : $ourteam_query->the_post();
					if (get_field('staff_name') ||
						get_field('staff_title') ||
						get_field('staff_license') ||
						get_field('staff_image') ||
						get_field('areas_of_specialties') ||
						get_field('learn_more_link') ||
						get_field('staff_button_text') ||
						get_field('book_now')) :
						$staff_name = get_field('staff_name');
						$staff_title = get_field('staff_title');
						$staff_license = get_field('staff_license');
						$staff_image = get_field('staff_image');
						$areas_of_specialties = get_field('areas_of_specialties');
						$learn_more_link = get_field('learn_more_link');
						$staff_button_text = get_field('staff_button_text');
						$book_now = get_field('book_now');
						$acf_field_value = get_field('areas_of_specialties');
						
				?>
				<article>
					<div class="img__name__wrap">
						<?php if ($staff_image) : ?>
						<div class="staff__img">
							<figure>
								<?php echo wp_get_attachment_image($staff_image, 'medium'); ?>
							</figure>
						</div>
						<?php endif; ?>
						<div class="our__team__content">
							<div class="ourteam__text">
								<div class="ourteam__name">
									<?php if ($staff_name) : ?>
									<h3><?php echo esc_html($staff_name) ?></h3>
									<?php endif; ?>

									<?php if ($staff_title) : ?>
									<p><?php echo esc_html($staff_title) ?></p>
									<?php endif; ?>

									<?php if ($staff_license) : ?>
									<p><?php echo esc_html($staff_license) ?></p>
									<?php endif; ?>
								</div>
								
								<?php if ($areas_of_specialties) : ?>
									<h3>Areas of Specialty</h3>
									<div class="specialty__text">
										<p><?php echo esc_html($areas_of_specialties) ?></p>
									</div>
									<?php endif; ?>
									
							</div>
							
							<div class="button__wrap">
								<?php if ($learn_more_link) : ?>
								<div class="learn__more">
									<a href="<?php echo esc_url($learn_more_link); ?>">Learn More</a>
								</div>
								<?php endif; ?>

								<?php if ($staff_button_text) : ?>
								<div class="book__now">
									<a href="<?php echo esc_url($book_now); ?>"><?php echo ($staff_button_text); ?></a>
								</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</article>
				<?php
					endif;
				endwhile;
				wp_reset_postdata();
				?>
			</section>
			<?php
			endif; // End of client reviews query.
			?>
		

	</main><!-- #primary -->

<?php
get_footer();
