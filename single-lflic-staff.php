<?php
/**
 * The template for displaying all single staff posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package LFLIC
 */

get_header();
?>

	<main id="primary" class="site-main">

	<?php
	while ( have_posts() ) : the_post();

		if (get_field('staff_name') || 
			get_field('staff_image') ||
			get_field('language') ||
			get_field('background') ||
			get_field('training_approach') ||
			get_field('education_two')) :
			$staff_name = get_field('staff_name');
			$staff_image = get_field('staff_image');
			$language = get_field('language');
			$background = get_field('background');
			$training_approach = get_field('training_approach');
			$education_two = get_field('education_two');
	?>
				<section class="founder">
					<div class="founder__wrap">
						<?php if ($staff_image) : ?>
							<div class="founder__image">
								<figure>
									<?php echo wp_get_attachment_image($staff_image, 'medium'); ?>
								</figure>
							</div>
						<?php endif; ?>

						<div class="staff__text">
							<?php if ($staff_name) : ?>
								<h1><?php echo esc_html($staff_name); ?></h1>
							<?php endif; ?>
							<?php if ($language) : ?>
								<h2>Language</h2>
								<p><?php echo esc_html($language); ?></p>
								<?php endif; ?>
						</div>
					</div>
						
						<?php if ($background) : ?>
							<div class="staff__background">
								<h2>Background</h2>
								<p><?php echo esc_html($background); ?></p>
							</div>
						<?php endif; ?>

						<?php if ($training_approach) : ?>	
							<div class="staff__train">
								<h2>Training & Approach</h2>
								<p><?php echo esc_html($training_approach); ?></p>
							</div>
						<?php endif; ?>

						<?php if ($education_two) : ?>
							<div class="staff__education">
								<h2>Education & Experience</h2>
								<?php echo apply_filters('the_content', $education_two); ?>
							</div>
						<?php endif; ?>
				</section>

				<?php
			endif;
		endwhile; // End of the loop.
			?>
	</main><!-- #primary -->

<?php
get_footer();
