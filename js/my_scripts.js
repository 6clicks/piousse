/*
 * Bones Scripts File
 * Author: Eddie Machado
 *
 * This file should contain any js scripts you want to add to the site.
 * Instead of calling it in the header or throwing it inside wp_head()
 * this file will be called automatically in the footer so as not to
 * slow the page load.
 *
 * There are a lot of example functions and tools in here. If you don't
 * need any of it, just remove it. They are meant to be helpers and are
 * not required. It's your world baby, you can do whatever you want.
*/


/*
 * Get Viewport Dimensions
 * returns object with viewport dimensions to match css in width and height properties
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
*/
function updateViewportDimensions() {
	var w = window, d = document, e = d.documentElement, g = d.getElementsByTagName('body')[0], x = w.innerWidth || e.clientWidth || g.clientWidth, y = w.innerHeight || e.clientHeight || g.clientHeight;
	return { width: x, height: y };
}
// setting the viewport width
var viewport = updateViewportDimensions();


/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
*/
var waitForFinalEvent = (function () {
	var timers = {};
	return function (callback, ms, uniqueId) {
		if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
		if (timers[uniqueId]) { clearTimeout(timers[uniqueId]); }
		timers[uniqueId] = setTimeout(callback, ms);
	};
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;


/*
 * Here's an example so you can see how we're using the above function
 *
 * This is commented out so it won't work, but you can copy it and
 * remove the comments.
 *
 *
 *
 * If we want to only do it on a certain page, we can setup checks so we do it
 * as efficient as possible.
 *
 * if( typeof is_home === "undefined" ) var is_home = $('body').hasClass('home');
 *
 * This once checks to see if you're on the home page based on the body class
 * We can then use that check to perform actions on the home page only
 *
 * When the window is resized, we perform this function
 * $(window).resize(function () {
 *
 *    // if we're on the home page, we wait the set amount (in function above) then fire the function
 *    if( is_home ) { waitForFinalEvent( function() {
 *
 *	// update the viewport, in case the window size has changed
 *	viewport = updateViewportDimensions();
 *
 *      // if we're above or equal to 768 fire this off
 *      if( viewport.width >= 768 ) {
 *        console.log('On home page and window sized to 768 width or more.');
 *      } else {
 *        // otherwise, let's do this instead
 *        console.log('Not on home page, or window sized to less than 768.');
 *      }
 *
 *    }, timeToWaitForLast, "your-function-identifier-string"); }
 * });
 *
 * Pretty cool huh? You can create functions like this to conditionally load
 * content and other stuff dependent on the viewport.
 * Remember that mobile devices and javascript aren't the best of friends.
 * Keep it light and always make sure the larger viewports are doing the heavy lifting.
 *
*/

/*
 * We're going to swap out the gravatars.
 * In the functions.php file, you can see we're not loading the gravatar
 * images on mobile to save bandwidth. Once we hit an acceptable viewport
 * then we can swap out those images since they are located in a data attribute.
*/
function loadGravatars() {
	// set the viewport using the function above
	viewport = updateViewportDimensions();
	// if the viewport is tablet or larger, we load in the gravatars
	if (viewport.width >= 768) {
		jQuery('.comment img[data-gravatar]').each(function () {
			jQuery(this).attr('src', jQuery(this).attr('data-gravatar'));
		});
	}
} // end function


/*
 * Put all your regular jQuery in here.
*/
jQuery(document).ready(function ($) {

	/*
	 * AOS ANIMATION on SCROLL_____________________________________/////////////.
	*/
	AOS.init();

	/*
	 * Carousel L_____________________________________/////////////.
	*/

	$('.owl-carousel').owlCarousel({
		margin: 10,
		autoplay: true,
		autoplayTimeout: 2000,
		loop: true,
		responsiveClass: true,
		animateOut: 'slideOutDown',
		animateIn: 'flipInX',
		responsive: {
			0: {
				items: 1,
				nav: false
			},
			600: {
				items: 3,
				nav: false
			},
			1000: {
				items: 5,
				nav: false,

			}
		}
	});


	/*
	 * SCROLL BACK to Top_____________________________________/////////////.
	*/
	// browser window scroll (in pixels) after which the "back to top" link is shown
	var offset = 300,
		//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
		offset_opacity = 1200,
		//duration of the top scrolling animation (in ms)
		scroll_top_duration = 700,
		//grab the "back to top" link
		$back_to_top = $('.cd-top');

	//hide or show the "back to top" link
	$(window).scroll(function () {
		($(this).scrollTop() > offset) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if ($(this).scrollTop() > offset_opacity) {
			$back_to_top.addClass('cd-fade-out');
		}
	});

	//smooth scroll to top
	$back_to_top.on('click', function (event) {
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0,
		}, scroll_top_duration
		);
	});

	/*
	 * Sidr Menu Responsive_____________________________________/////////////.

	$('#responsive-menu-button').sidr({
			name: 'sidr-main',
			source: '#site-header-menu,.content-menus-responsive',
			renaming: false,
			onOpen: function(){
		   // Change the menu icon on open
				 $('.c-hamburger').addClass('open');
	   },
	   onClose: function(){
			 $('.c-hamburger').removeClass('open');
		   // change the menu icon on close
	   }

		});*/

	/** Menu Full Page_____________________________________/////////////.*/
	$(".c-hamburger").click(function () {
		$("#myNav").css('display', 'block');
	});

	$(".closebtn").click(function () {
		$("#myNav").fadeOut("slow");
	});

	/** FX aussi au click sur un lien du menu _____________________________________/////////////.*/

	$(".closetxt").click(function () {
		$("#myNav").fadeOut("slow");
	});
	$(".menu-item a").addClass("closetxt");

	$(".closetxt").click(function () {
		var href = $(this).attr("href");
		/** Ajout d'un delay avant cahngement de page pour l'effet _____________________________________/////////////.*/

		var animDuration = 400;

		$("#myNav").animate({

			opacity: '0.6',
			top: "-1500",
		}, 1000);

		setTimeout(function () {
			window.location = href;
			$("#myNav").css('display', 'none');
			$("#myNav").animate({

				display: 'none',
				opacity: '1',
				top: "0",


			}, 1000);

		}, animDuration);


		return false; // prevent user navigation away until animation's finished

	});


	/** pour être sur que la X fonctionne.  _____________________________________/////////////.*/
	$('.c-hamburger').click(function () {
		$(this).css('z-index', '0');
		$('#myNav .closebtn').css('z-index', '9999');
	});
	$('.closebtn').click(function () {
		$(this).css('z-index', '0');
		$('.c-hamburger').css('z-index', '9999');
	});
	/** Ajout des col au menu _____________________________________/////////////.*/
	$(".menu-item ").addClass("col-xs-12 col-md-6");


	/** Ajout des ancres au menu _____________________________________/////////////.*/
	$('#menu-main li a').attr('href', function (_, oldHref) {
		return oldHref + "#anchor";
	});


	/*
	 * Let's fire off the gravatar function
	 * You can remove this if you don't need it
	*/
	loadGravatars();


	/*
   * FONT type kit
  */
	(function (d) {
		var config = {
			kitId: 'fxq4fgv',
			scriptTimeout: 3000,
			async: true
		},
			h = d.documentElement, t = setTimeout(function () { h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive"; }, config.scriptTimeout), tk = d.createElement("script"), f = false, s = d.getElementsByTagName("script")[0], a; h.className += " wf-loading"; tk.src = 'https://use.typekit.net/' + config.kitId + '.js'; tk.async = true; tk.onload = tk.onreadystatechange = function () { a = this.readyState; if (f || a && a != "complete" && a != "loaded") return; f = true; clearTimeout(t); try { Typekit.load(config) } catch (e) { } }; s.parentNode.insertBefore(tk, s)
	})(document);




}); /* end of as page load scripts */
