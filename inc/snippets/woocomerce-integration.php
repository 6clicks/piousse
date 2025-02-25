//Insert a few lines in your theme’s functions.php file.

//First unhook the WooCommerce wrappers:

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

// Then hook in your own functions to display the wrappers your theme requires:

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<section class="entry-content cf" itemprop="articleBody">';
}

function my_theme_wrapper_end() {
  echo '</section>';
}
