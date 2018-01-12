<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ortimis
 */

get_header(); ?>


			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
					<div class="row">


				<?php
				if ( have_posts() ) : ?>

					<header>
						<!-- <?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="archive-description">', '</div>' );
						?> -->
					</header>

					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post(); ?>

						<div class="<?php if ( get_field( 'is_big' ) == 1 ) { ?>
													 col-lg-8
												 <?php } else { ?>
													 col-lg-4
												 <?php	} ?>col-md-6 featured featured-left" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">

							<div class="row">
								<div class="col-md-8 col-sm-12 box-center-bottom">
									<?php
										$taxonomyName = "projektart";
										$post_terms = wp_get_post_terms( $post->ID, $taxonomyName, array("fields" => "names", "orderby" => "parent") );
										array_shift( $post_terms ); //remove parent term
										print_r( '<span class="projektart"><p>' . implode( ' | ', $post_terms ) . '</p></span>' ); ?>

									<h2 class="featured-title"><?php the_title(); ?></h2>
									<p class="featured-p"><?php the_excerpt(); ?><br></p>
									<a href="<?php the_permalink(); ?>" class="btn btn-transp">Mehr</a>
								</div>
							</div>

							<div class="row">
								<div class="col-md-8 col-sm-12 box-center-bottom">

								</div>
							</div>

						</div>
					<?php
					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'views/content', 'none' );

				endif; ?>
					</div>

				</main><!-- #main -->
			</div><!-- #primary -->


<?php
get_footer();
