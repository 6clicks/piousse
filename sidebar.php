				<div id="sidebar1" class="sidebar col-xs-12 col-sm-6 col-md-3 col-lg-3 cf" role="complementary">

					<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar-1' ); ?>

					<?php else : ?>

						<?php
							/*
							 * This content shows up if there are no widgets defined in the backend.
							*/
						?>

						<div class="no-widgets">
							<p><?php _e( 'This is a widget ready area. Add some and they will appear here.', 'Snow' );  ?></p>
						</div>

					<?php endif; ?>

				</div>
