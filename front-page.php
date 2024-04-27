<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LFLIC
 */

get_header();
?>
	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) : the_post();
		?>
		
	<!-- === Home Hero Section === -->
		
	<?php if (function_exists('get_field')) : ?>
		<section class="home__hero">

			<?php if (get_field('hero_image') && 
				get_field('home_hero_title') &&
				get_field('home_hero_text') &&
				get_field('button_text') &&
				get_field('button_link')
				) :
				$hero_image = get_field('hero_image');
				$home_hero_title = get_field('home_hero_title');
				$home_hero_text = get_field('home_hero_text');
				$button_text = get_field('button_text');
				$button_link = get_field('button_link');

			?>
					
			<div class="home_hero__wrap">
				<div class="home_hero__image">
					<video autoplay loop playsinline>
						<source src="<?php echo esc_url($hero_image); ?>" type="video/mp4">
						Your browser does not support the video tag.
					</video>
				</div>
				<div class="hero__text__wrap">
					<div class="home_hero_title">
						<h1><?php echo esc_html($home_hero_title); ?></h1>
					</div>
					<div class="home_hero_subtitle">
						<p><?php echo esc_html($home_hero_text); ?><p>
					</div>
					<div class="book__now">
						<a href="<?php echo esc_url($button_link); ?>"><?php echo $button_text; ?></a>
					</div>
				</div>
				<div class="arrow">
					<p>&darr;</p>
				</div>
			</div>
		</section>
		<?php
			endif;
			
			endif;
			/* === Home Hero Section End === */
		
			// === About Section === 
		
			$args = array(
				'post_type' => 'page',
				'page_id' => 82
			);
			$about_query = new WP_Query($args);
			if ($about_query->have_posts()) :
				while ($about_query->have_posts()) : $about_query->the_post();
					if (get_field('about_text') && 
						get_field('about_image') &&
						get_field('mission') &&
						get_field('mission_text') &&
						get_field('vision') &&
						get_field('vision_text')) :
						$about_text = get_field('about_text');
						$about_image = get_field('about_image');
						$mission_title = get_field('mission');
						$mission_text = get_field('mission_text');
						$vision_title = get_field('vision');
						$vision_text = get_field('vision_text');
			?>
			<div class="home__container">
				<section id="about" class="about">
					
					<div class="about__wrap">
						<div class="about__image">
							<figure>
								<?php echo wp_get_attachment_image($about_image, 'full'); ?>
							</figure>
						</div>
						<div class="about__text">
							<p><?php echo esc_html($about_text); ?></p>
						</div>
					</div>
				</section>
				<!-- Mission Vision -->
				<section class="mission__vision">
					<div class="mission__vision__wrap">
						<div class="mission__wrap">
							<h3><?php echo esc_html($mission_title); ?></h3>
							<p><?php echo esc_html($mission_text); ?></p>
						</div>
						<div class="vision_wrap">
							<h3><?php echo esc_html($vision_title); ?></h3>
							<p><?php echo esc_html($vision_text); ?></p>
						</div>
					</div>
				</section>
			</div>
				<?php
					endif;
				endwhile;
				wp_reset_postdata();
			endif;
			/* === About Section End === */
		
			// Service Section Start
			
			$args = array(
				'post_type' => 'page',
				'page_id' => 37
			);
			$service_query = new WP_Query($args);
			if ($service_query->have_posts()) :
				while ($service_query->have_posts()) : $service_query->the_post();
						
						if (get_field('counselling_tittle') && 
							get_field('counselling_img') &&
							get_field('counselling_button_title') &&
							get_field('counselling_link') &&

							get_field('coaching_title') && 
							get_field('coaching_img') && 
							get_field('coaching_button_text') &&
							get_field('coaching_url_second') &&

							get_field('community_title') &&
							get_field('community_img') &&
							get_field('community_button_title') && 
							get_field('community_link') && 

							get_field('button_text') && 
							get_field('button_link') &&

							get_field('first_step_title') &&
							get_field('first_step_image') &&
							get_field('first_step_title_one') &&
							get_field('first_step_text_one') &&
							get_field('first_step_title_two') &&
							get_field('first_step_text_two') &&
							get_field('first_step_title_three') &&
							get_field('first_step_text_three') &&
							get_field('first_step_book_button_text') &&
							get_field('first_step_join_now_button_text') &&
							get_field('first_step_join_now_url')
							) :
							
							$counselling_tittle = get_field('counselling_tittle');
							$counselling_img = get_field('counselling_img');
							$counselling_button_title = get_field('counselling_button_title');
							$counselling_link = get_field('counselling_link');

							$coaching_title = get_field('coaching_title');
							$coaching_img = get_field('coaching_img');
							$coaching_button_text = get_field('coaching_button_text');
							$coaching_url_second = get_field('coaching_url_second');

							$community_title = get_field('community_title');
							$community_img = get_field('community_img');
							$community_button_title = get_field('community_button_title');
							$community_link = get_field('community_link');

							$button_text = get_field('button_text');
							$button_link = get_field('button_link');

							$first_step_title = get_field('first_step_title');
							$first_step_image = get_field('first_step_image');
							$first_step_title_one = get_field('first_step_title_one');
							$first_step_text_one = get_field('first_step_text_one');
							$first_step_title_two = get_field('first_step_title_two');
							$first_step_text_two = get_field('first_step_text_two');
							$first_step_title_three = get_field('first_step_title_three');
							$first_step_text_three = get_field('first_step_text_three');
							$first_step_book_button_text = get_field('first_step_book_button_text');
							$first_step_join_now_button_text = get_field('first_step_join_now_button_text');
							$first_step_join_now_url = get_field('first_step_join_now_url');
					?>
				<section id="service" class="service__home">
					<h2><?php the_title(); ?></h2>
					<!-- /* === Service Info === */ -->
					<div class="service__container home__container">
							<article class="service__wrap">
								<div class="service__bg">
									<div class="service__image">
										<figure>
											<?php echo wp_get_attachment_image($counselling_img, 'full'); ?>
										</figure>
									</div>
									<h3><?php echo esc_html($counselling_tittle); ?></h3>
									<div class="learn__more">
										<a href="<?php echo esc_url($counselling_link); ?>"><?php echo $counselling_button_title; ?></a>
									</div>
								</div>
							</article>
							<article class="service__wrap">
								<div class="service__bg">
									<div class="service__image">
										<figure>
											<?php echo wp_get_attachment_image($coaching_img, 'full'); ?>
										</figure>
									</div>
									<h3><?php echo esc_html($coaching_title); ?></h3>
									<div class="learn__more">
										<a href="<?php echo esc_url($coaching_url_second); ?>"><?php echo $coaching_button_text; ?></a>
									</div>
								</div>
							</article>
							<article class="service__wrap">
								<div class="service__bg">
									<div class="service__image">
										<figure>
											<?php echo wp_get_attachment_image($community_img, 'full'); ?>
										</figure>
									</div>
									<h3><?php echo esc_html($community_title); ?></h3>
									<div class="learn__more">
										<a href="<?php echo esc_url($community_link); ?>"><?php echo $community_button_title; ?></a>
									</div>
								</div>
							</article>					
					</div>
						<div class="button__bottom">
							<a href="<?php echo esc_url($button_link); ?>"><?php echo $button_text; ?></a>
						</div>
				</section>
				<!-- first step section -->
				<section class="first__step__wrap home__container">
					<div class="first__step__image">
						<figure>
							<?php echo wp_get_attachment_image($first_step_image, 'full'); ?>
						</figure>
					</div>
					<div class="firststep__text__wrap">
						<h2><?php echo esc_html($first_step_title); ?></h2>
						<div class="first__step__text">
							<h3><?php echo esc_html($first_step_title_one); ?></h3>
							<p><?php echo esc_html($first_step_text_one); ?></p>

							<h3><?php echo esc_html($first_step_title_two); ?></h3>
							<p><?php echo esc_html($first_step_text_two); ?></p>
							<div class="first__step__button">
								<a href="<?php echo esc_url($button_link); ?>"><?php echo $first_step_book_button_text; ?></a>
							</div>

							<h3><?php echo esc_html($first_step_title_three); ?></h3>
							<p><?php echo esc_html($first_step_text_three); ?></p>
							<div class="first__step__button">
								<a href="<?php echo esc_url($first_step_join_now_url); ?>"><?php echo $first_step_join_now_button_text; ?></a>
							</div>
						</div>
					</div>
			</section>
						<?php
					endif;
				
			endwhile;
			wp_reset_postdata();
		endif;
		/* === Service Section End === */
			
		// <!-- Client Reviews -->
			$args = array(
				'post_type'      => 'lflic-client-reviews',
				'posts_per_page' => -1,
				'orderby' => 'rand',
			);

			$clientrevews_query = new WP_Query($args);
			if ($clientrevews_query->have_posts()) : ?>

			<section id="client-reviews" class="testimonials home__container">
				<h2>Client Reviews</h2>
				<div class="swiper-testimonials-container">
					<div class="swiper  swiper-testimonials">
						<div class="swiper-wrapper">
							<?php
							while ($clientrevews_query->have_posts()) : $clientrevews_query->the_post();
								if (get_field('client_review')) :
									$client_review = get_field('client_review');
							?>
									<div class="swiper-slide swiper-slide-testimonials">
										<article class="testimonials__content">
											<blockquote>
												<p><?php echo esc_html($client_review) ?></p>
											</blockquote>
										</article>
									</div>
							<?php
								endif;
							endwhile;
							wp_reset_postdata();
							?>
						</div>
					</div>
					<div class="swiper-pagination"></div>
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div>
			</section>

	
		<?php
	endif; // End of client reviews query.
	
	endwhile; // End of the loop.
	?>
	</main><!-- #main -->

<?php
get_footer();
