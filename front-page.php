<?php get_header(); ?>


<div id="inner-content" class=" wrap-full cf">

	<main id="main" class=" col-xs-12 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('cf row '); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">


					<div class="block block-1 col-xs-12 col-md-6 col center-xs bg1" data-aos="fade-right" data-aos-duration="1500">
						<h2 class="<?php the_field('block-1-icon', 20); ?> col-xs-12"></h2>
						<h3 class="col-xs-12"><?php the_field('block-1-titre', 20); ?></h3>
						<p class="txt-block"><?php the_field('block-1-text', 20); ?></p>
						<span class="sepa bg-color4"></span>
						<p class="quote"><?php the_field('block-1-quote', 20); ?></p>
					</div>
					<!--FIN block-1 -->
					<div class="block block-2 col-xs-12 col-md-6 col center-xs bg2" data-aos="fade-left" data-aos-duration="1000">
						<h2 class="<?php the_field('block-2-icon', 20); ?> col-xs-12"></h2>
						<h3 class="col-xs-12"><?php the_field('block-2-titre', 20); ?></h3>
						<p class="txt-block"><?php the_field('block-2-text', 20); ?></p>

						<a href="<?php the_field('block-2-url', 20); ?>" class="btn-1 bouton-reserver"><?php the_field('block-2-boutton', 20); ?></a>
					</div>
					<!--FIN block-2 -->

					<div class="block-brasseurs-home col-xs-12 row center-xs middle-xs">
						<h2 class="titre titre-brasseurs-home "><?php _e('Les Brasseurs'); ?></h2>
					</div>
					<!--FIN barasseurs titre -->
					<div class="block-brasseurs-slider col-xs-12 row center-xs middle-xs">
						<div class="brasseurs">

							<?php


							$args = array(
								'post_type'  => 'brasseurs',
								'posts_per_page' => 20,
								'orderby'        => 'rand',
							);

							$del = 0;

							$loop = new WP_Query($args);
							while ($loop->have_posts()) : $loop->the_post();
								$del += 20 ?>

								<div class="brasseurs-card" data-aos="zoom-out-up" data-aos-delay="<?php echo $del ?>">

									<?php

									$image = get_field('logo');
									$size = 'full'; // (thumbnail, medium, large, full or custom size)



									?>



									<a href="<?php the_field('url'); ?>" target="_blank" class="link-bra">
										<h4 class="titre-bra"><?php the_field('nom_du_brasseur'); ?></h4>
										<span class="lieux"><?php the_field('localite'); ?></span>
										<figure><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /></figure>

									</a>




								</div>
							<?php endwhile;
							wp_reset_postdata(); ?>


						</div><!-- jacrousel -->

					</div>
					<!--FIN barasseurs block slider -->


					<div class="block block-3 col-xs-12 col-md-6 col center-xs bg2" data-aos="fade-right" data-aos-duration="1500">
						<h2 class="<?php the_field('block-3-icon', 20); ?> col-xs-12"></h2>
						<h3 class="col-xs-12"><?php the_field('block-3-titre', 20); ?></h3>
						<p class="txt-block"><?php the_field('block-3-text', 20, false, false); ?></p>
						<span class="sepa bg-color3"></span>
						<a href="<?php the_field('block-3-url', 20); ?>" class="btn-1 bouton-reserver info"><?php the_field('block-3-boutton', 20); ?></a>
					</div>
					<!--FIN block-3 -->
					<div class="block block-4 col-xs-12 col-md-6 col center-xs bg1" data-aos="fade-left" data-aos-duration="1000">
						<h2 class="<?php the_field('block-4-icon', 20); ?> col-xs-12"></h2>
						<h3 class="col-xs-12"><?php the_field('block-4-titre', 20); ?></h3>
						<p class="txt-block"><?php the_field('block-4-text', 20, false, false); ?></p>
						<span class="sepa bg-color4"></span>
						<a href="<?php the_field('block-4-url', 20); ?>" class="btn-2 bouton-reserver"><?php the_field('block-4-button', 20); ?></a>
					</div>
					<!--FIN block-4 -->


					<div class="block-brasseurs-home col-xs-12 row center-xs middle-xs">
						<h2 class="titre titre-brasseurs-home "><?php _e('Merci à nos Sponsors'); ?></h2>
					</div>
					<!--FIN barasseurs titre -->
					<div class="block-brasseurs-slider col-xs-12 row center-xs middle-xs">
						<?php kw_sc_logo_carousel('sponsors'); ?>
					</div>



				</article>

		<?php endwhile;
		endif; ?>

	</main>



</div>

</div>

<?php get_footer(); ?>