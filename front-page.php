<?php
/**
 * The template for displaying the front page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ortimis
 */

get_header(); ?>

<section class=hero>
	<div class="hero-wrapper">
		<div id="sketch-holder"></div>
		<div class="hero-content">
			<div class="container">
				<div class="row">
					<div class="hero-callout fade-carousel">
						<div class="slide">
							<h1 class="hero-callout-header"><span>Film</span>bewegt.</h1>
							<p>Emotional. Dicht. Vielseitig.</p>
						</div>
						<div class="slide">
							<h1 class="hero-callout-header">Web<span>verbindet!</span></h1>
							<p></p>
						</div>
					</div>


				</div>


					<!-- <a href="#" class="btn btn-transp read-more-link">Projekte</a>
					<a href="#" class="btn btn-transp read-more-link">Kontakt</a> -->
			</div>
		</div>
	</div>
</section>

<section class="featured-section primary container-fluid container-no-padding" class="content-area">
	<article class="featured-article">
		<div class="row">
			<?php // WP_Query arguments
				$args = array(
					'post_type'              => array( 'projects' ),
					'post_status'            => array( 'publish' ),
					'order'									 => 'ASC',
					'meta_query' 						 => array(
					 															array(
																					'key' => 'is_featured',
																					'compare' => '==',
																					'value' => '1'
																				)
																			),
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
												 <?php	} ?>col-md-6 featured featured-left" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">

							<div class="row">
								<div class="col-md-8 col-sm-12 box-center-bottom">
									<?php $taxonomyName = "projektart";
										$post_id = get_the_id();
										$object_terms = wp_get_object_terms( $post_id, $taxonomyName );
										$i = 0;

										echo '<span class="projektart"><p>';
										foreach ( $object_terms as $term ) {
											if ( $term->parent ) {
												$term_array[] = $term->name;
											}
										}

										echo implode( ' | ', $term_array ) . '</p></span>'; ?>

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
					// no posts found
				}

				// Restore original Post Data
				wp_reset_postdata(); ?>
			</div>
	</article>

</section>




<!--
<div class="container">
	<div class="row ms-container" id="ms-container">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	    <div class="ms-item col-lg-6 col-md-6 col-sm-6 col-xs-12">

	        <?php if (has_post_thumbnail()) : ?>

	            <div class="article-preview-image">

	                <?php the_post_thumbnail('large'); ?>

	            </div>

	        <?php else : ?>

	        <?php endif; ?>

	            <h2 class="post-title"><a href="<?php the_permalink(); ?>" class="post-title-link"><?php the_title(); ?></a></h2>

	        <?php the_excerpt(); ?>

	    <div class="clearfix"></div>

	<a href="<?php the_permalink(); ?>" class="btn btn-transp btn-block">Read More</a>

	    <div class="clearfix"></div>

	    </div>

	    <?php endwhile;

	    else : ?>

	        <article class="no-posts">

	            <h1><?php _e('No posts were found.'); ?></h1>

	        </article>
	    <?php endif; ?>

	                </div>
	<div class="clearfix"></div>
</div> -->

<?php
get_footer();
