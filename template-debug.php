<?php
/**
 * Template Name: Debug
 *
 * @package gen2
 */

get_header();
?>

	<div id="primary" class="col">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<div class="col-12"></div>

<!-- START your debug code -->

	<?php
	// list all image sizes
	print_r( get_intermediate_image_sizes() );
	echo '<hr>';

	global $_wp_additional_image_sizes;
	print_r( $_wp_additional_image_sizes );

	//included files listing
	function display_all_includes(){
		$included_files = get_included_files();
		foreach ($included_files as $filename) {
			echo "<li>$filename</li>";
		}
	} ?>

	<div class="output" style="border: solid 1px black; background-color:#F3F4F5; width: 900px; margin:50px auto; padding: 30px;">
		<code contenteditable spellcheck="false" >
		<ol>
			<?php //display_all_includes(); ?>
		</code>
		</ol>
	</div>


<!-- END your debug code -->

<?php

get_footer();
