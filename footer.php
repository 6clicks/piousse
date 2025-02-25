<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package snow
 */

?>



	<footer id="colophon" class="site-footer row" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
		<div id="inner-footer" class="wrap-full row around-xs col-xs-12 txt-color3 cf">
<div class="col-xs-12 col-md-4  " >	<?php get_sidebar(footer1); ?></div>
<div class="col-xs-12 col-md-4 "  >	<?php get_sidebar(footer2); ?></div>
<div class="col-xs-12 col-md-4 text-right "  >  	<?php get_sidebar(footer3); ?></div>
			<div class=" footer-corner row col-xs-12">
				          <p class="source-org copyright col-xs-6">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</p>
									<p class="col-xs-5 end-xs"><a href="https://www.6clicks.ch" rel="designer" class="sixclicks_logo middle-xs">clicks.ch</a></p>
     </div><!--cornerfooter-->


	</div><!--inner-footer-->




	  </footer><!-- #colophon -->
  </div><!-- #page -->
</div><!-- #hoverflow -->
<a href="#0" class="cd-top">Top</a>
<?php wp_footer(); ?>

</body>
</html>
