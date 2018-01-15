<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ortimis
 */

?>

	</div><!-- #content -->
	<footer id="colophon" class="site-footer container-fluid" role="contentinfo">
		<div class="container">
			<div class="row justify-center">
				<div class="col-md-4">
				</div>
				<div class="col-md-4 text-center">
					<ul class="text-center">
						<li><a href="<?php echo home_url(); ?>/impressum">Impressum</a></li>
						<li><a href="<?php echo home_url(); ?>/disclaimer">Disclaimer</a></li>
					</ul>
				</div>
				<div class="col-md-4">
				</div>
			</div>
			<div class="row justify-center">
				<p>Jakob Ortmann &copy; 2016 – <?php echo date('Y'); ?></p>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->


<?php wp_footer(); ?>

</body>
</html>
