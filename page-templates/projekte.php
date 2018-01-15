<?php
/**
 * Template Name: Projekte
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package ortimis
 */

get_header(); ?>


			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
					<div class="row">


					<header>
						<!-- <?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="archive-description">', '</div>' );
						?> -->
					</header>

          <?php // WP_Query arguments
    				$args = array(
    					'post_type'              => array( 'projects' ),
    					'post_status'            => array( 'publish' ),
    					'order'									 => 'DESC',
    				);

    				// The Query
    				$query = new WP_Query( $args );

    				// The Loop
    				if ( $query->have_posts() ) {
    					while ( $query->have_posts() ) {
    						$query->the_post(); ?>

								<div class="<?php if ( get_field( 'is_big' ) == 1 ) { ?>
															 col-lg-8
														 <?php } else { ?>
															 col-lg-4
														 <?php	} ?>col-md-6 featured featured-left dark" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">

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
							}
						} else {
							//no posts found
						} ?>

            <?php // Restore original Post Data
    				wp_reset_postdata(); ?>
					</div>

				</main><!-- #main -->
			</div><!-- #primary -->


<?php
get_footer();
