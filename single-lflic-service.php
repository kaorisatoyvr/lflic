<?php
/**
 * The template for displaying all single service posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package LFLIC
 */

get_header();
?>

	<main id="primary" class="site-main">
	<div class="service__page__wrap">

		<h1><?php the_title(); ?></h1>
		<?php
		while ( have_posts() ) : the_post();

			if (get_field('service_sub_title') ||
				get_field('service_descriptions') || 
				get_field('title_of_community_group') ||
				get_field('community_group_descriptions') ||
				get_field('service_book_button_title') ||
				get_field('service_button_link')
				) :
				$service_sub_title = get_field('service_sub_title');
				$service_descriptions = get_field('service_descriptions');
				$title_of_community_group = get_field('title_of_community_group');
				$community_group_descriptions = get_field('community_group_descriptions');
				$service_book_button_title = get_field('service_book_button_title');
				$service_button_link = get_field('service_button_link');
				
		?>
			<section class="service__single">
				<p class="service__subtitle"><?php echo esc_html($service_sub_title); ?></p>
				<p class="service__descriptions"><?php echo esc_html($service_descriptions); ?></p>
				
				<?php if (have_rows('service')) :
							while (have_rows('service')) : the_row();
								$service_title = get_sub_field('service_title');
								$service_image = get_sub_field('service_image');
								$age = get_sub_field('age');
								$relation_status = get_sub_field('relation_status');
								$issues = get_sub_field('issues');
						?>
						<article>
							<div class="service__wrap">
								<div class="service_home_title">
									<h2><?php echo esc_html($service_title); ?></h2>
									<div class="service__img__age">
										<figure>
											<?php echo wp_get_attachment_image($service_image, 'full'); ?>
										</figure>

										<!-- Age -->
										<div>
											<h3>Age</h3>
											<p class="issues__text"><?php echo esc_html($age); ?></p>
										</div>
									</div>
									<!-- Relation Status -->
									<?php
										if (get_sub_field('relation_status')) :
									?>
									<h3>Relationship Status</h3>
									<p class="issues__text"><?php echo esc_html($relation_status); ?></p>
									<?php
									endif;?>

									<!-- Issues -->
									<div class="issues__wrap">
									<h3>Issues & Needs</h3>
										<p class="issues__text"><?php echo esc_html($issues); ?></p>
									</div>
								</div>
								<div class="service__button">
									<a href="<?php echo esc_url($service_button_link); ?>"><?php echo $service_book_button_title; ?></a>
								</div>
							</div>
							<?php
							endwhile;
						endif;
							?>
				
					<div class="Community__wrap">
						<h2><?php echo esc_html($title_of_community_group); ?></h2>
						<p><?php echo esc_html($community_group_descriptions); ?></p>
					</div>
				</div>
			</section>
			
			</section>
			<?php
			endif;
		endwhile; // End of the loop.
			?>
	</div>
	</main><!-- #primary -->

<?php
get_footer();
