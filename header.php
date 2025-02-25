<?php ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if (is_singular() && pings_open(get_queried_object())) : ?>
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
	<!-- Google Tag Manager -->
	<script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =
				'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-P2MV23L');
	</script>
	<!-- End Google Tag Manager -->
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2MV23L" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<div id="hoverflow">
		<div id="header-container ">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'snow'); ?></a>
			<header class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">

				<!-- The overlay -->
				<div id="myNav" class="overlay">

					<!-- Button to close the overlay navigation -->
					<a class="closebtn">&times;</a>

					<!-- Overlay content -->
					<div class="overlay-content">
						<?php if (has_nav_menu('primary') || has_nav_menu('social')) : ?>
							<div id="site-header-menu" class="site-header-menu col">
								<?php if (has_nav_menu('primary')) : ?>
									<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary Menu', 'snow'); ?>">
										<?php
										wp_nav_menu(array(
											'theme_location' => 'primary',
											'menu_class'     => 'primary-menu nav top-nav cf row',
										));
										?>
									</nav><!-- .main-navigation -->
								<?php endif; ?>

							</div><!-- .site-header-menu -->
						<?php endif; ?>
					</div>

					<h1 id="logo-sml" class="site-title-sml" itemscope itemtype="http://schema.org/Organization"><?php bloginfo('name'); ?></h1>
				</div><!-- fin du contenu du menu Full page -->






				<!-- the burger to open  -->
				<div class="c-hamburger" type="button" id="responsive-menu-button">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<p class="txt-menu-res"><?php _e('Menu'); ?></p>
				</div>
				<!--FIN c.hamburger-->

				<div id="inner-header" class="wrap-full cf row center-xs">
					<?php if (is_front_page() && is_home()) : ?>
						<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
							<h1 id="logo" class="site-title site-logo" itemscope itemtype="http://schema.org/Organization" data-aos="zoom-out-down" data-aos-duration="1000" data-aos-easing="ease-in-quad"><?php bloginfo('name'); ?></h1>
						</a>
					<?php else : ?>
						<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
							<p class="site-title site-logo" data-aos="zoom-out-down" data-aos-duration="1000" data-aos-easing="ease-in-quad"><?php bloginfo('name'); ?></p>
						</a>
					<?php endif; ?>
					<?php // bloginfo('description'); 
					?>

			</header>
		</div><!-- header-contener -->
		<div class="houbholder">
			<div class="tagline row col-xs-12 center-xs around-xs" id="anchor">
				<p>22 juin 2024</p>
				<p class="bold">11h00 -> 2h00</p>
				<p> festival de la bière artisanale</p>
				<p class="bold">Echallens</p>
			</div>
			<div class="houb"></div>
		</div>
		<div id="content" class="site-content row">