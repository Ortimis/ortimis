<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ortimis
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">

		<header id="masthead" class="site-header <?php if ( is_front_page() ) : ?>blue-bg <?php else : ?> white-bg <?php endif; ?>" role="banner">

			<div class="container">

				<div class="row">
					<div class="col-xs-12 col-sm-4">
						<div class="subtitle-wrapper">
							<h1 class="myname">Jakob Ortmann | Webdesign & Filmemacher</h1>
						</div>

						<!-- <div class="site-branding">
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
							$description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
							<?php
						endif; ?>
					</div>-->

				</div>

				<div class="col-xs-12 col-sm-8">

					<nav id="site-navigation" class="main-navigation" role="navigation">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">&#9776;</button>
						<?php
						if ( has_nav_menu( 'primary' ) ) :
							wp_nav_menu( array(
								'theme_location' => 'primary',
								'menu_id' => 'primary-menu',
								'walker' => new ortimis\Core\WalkerNav(),
							) );
						endif;
						?>

					</nav>

				</div><!-- .col -->

			</div><!-- .row -->
		</div><!-- .container-fluid -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
