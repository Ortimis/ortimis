<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ortimis
 */

get_header(); ?>

<div class="container">


			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

					<?php

					/* Start the Loop */
					while ( have_posts() ) : the_post();

						get_template_part( 'views/content', get_post_type() );

						the_post_navigation();


					endwhile;

					?>

				</main><!-- #main -->
			</div><!-- #primary -->


</div><!-- .container -->

<?php
get_footer();
