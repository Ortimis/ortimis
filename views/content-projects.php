<?php
/**
 * Template part for displaying content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ortimis
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="row justify-center">
			<?php if ( get_field( 'show_featured_image' ) == 1 ) { ?>
			<div class="col-md-5 col-sm-12 col-xs-12">

					<?php the_post_thumbnail('large'); ?>

			</div> <?php
			} ?>
			<div class=" col-md-5 col-sm-12 col-xs-12">
				<?php
						if ( is_single() ) :
								the_title( '<h1 class="entry-title">', '</h1>' );
						else :
								the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						endif;

						if ( 'post' === get_post_type() ) : ?>
							<div class="entry-meta">
								<?php // config\Core\Tags::posted_on(); ?>
							</div><!-- .entry-meta -->
				<?php
						endif; ?>

            <?php
              $taxonomyName = "projektart";
              $post_terms = wp_get_post_terms( $post->ID, $taxonomyName, array("fields" => "names", "orderby" => "parent") );
              array_shift( $post_terms ); //remove parent term ?>
							<div class="datum"> <?php the_date('m / Y')  ?></div> <?php
              print_r( '<span class="projektart">' . implode( ' | ', $post_terms ) . '</span>' ); ?>



						<?php if (has_excerpt() ) {
							?><h5><?php the_excerpt( '<h1>' . '</h1>' ); ?></h5><?php
						} ?>
          </p>


			</div>
		</div><!-- .row -->
	</header><!-- .entry-header -->
	<div class="entry-content container">
		<div class="row  justify-center">
			<div class="col-sm-5">
		    <?php the_field('video_iframe'); ?>
				<?php
					the_content( sprintf(
							/* translators: %s: Name of current post. */
							wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'ortimis' ), array(
								'span' => array(
									'class' => array(),
								),
							) ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false ) ) );


				?>
			</div>
		</div>

	</div><!-- .entry-content -->

	<footer class="entry-footer container-narrow">
		<?php // ortimis\Core\Tags::entry_footer();
		wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ortimis' ),
				'after' => '</div>',
			) ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
