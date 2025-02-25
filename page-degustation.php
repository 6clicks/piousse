<?php get_header(); ?>


				<div id="inner-content" class=" wrap-full cf">

					<main id="main" class=" col-xs-12 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf row center-xs' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">


								<section class="entry-content cf col-xs-12 col-md-9 center-xs row" itemprop="articleBody">

										<?php  // check if the repeater field has rows of data
													if( have_rows('degustation') ):
														$counter = 0;

													 	// loop through the rows of data
													    while ( have_rows('degustation') ) : the_row();$counter++?>
                              <div class="block-2 col-xs-12 center-xs	<?php echo $counter; ?>" >
																<h2 class="<?php the_sub_field('icon',342); ?> col-xs-12"></h2>
																<h3 class="col-xs-12"><?php the_sub_field('titre'); ?></h3>
																<p class="txt-block center-xs"><?php the_sub_field('text',false,false); ?></p>
															</div><!--FIN block-3 -->
													      <?php
													    endwhile;

													else :

													    // no rows found

													endif;

													?>

								</section> <?php // end article section ?>

								<footer class="article-footer col-xs-12 center-xs cf row prixdegust ">
                  <p class=" txt-block-repas col-xs-12 col-md-9 "><?php the_field('detail_prix',342,false,false); ?></p>
								</footer>

<div class="iframe contener col-xs-12 row">
	<?php the_field('formulaire',342); ?>
</div>

							</article>

							<?php endwhile; endif; ?>

						</main>



				</div>

			</div>

<?php get_footer(); ?>
