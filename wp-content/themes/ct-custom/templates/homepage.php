<?php
/**
 * Template name: Homepage
 */

add_action( 'body_class', 'ctdev__body_class' );
/**
 * Adds custom class to the body for reference.
 *
 * @param array $wp_classes WP body classes array.
 * @return array $wp_classes Modified classes array.
 */
function ctdev__body_class( $wp_classes ) {
	$wp_classes[] = 'ctd';

	return $wp_classes;
}

get_header();

echo '
	<section class="ctd__section">
		<article class="ctd__section--inner">
	';

// Breadcrumbs.
echo '<div class="ctd__breadcrumb"><ul>';
echo '<li><a href="' . esc_url( get_home_url() ) . '">Home</a></li>';

if ( is_category() || is_single() ) { // Categories and single posts.
	echo '<li>';
	the_category( ' </li><li> ' );

	if ( is_single() ) {

		the_title( '</li><li>', '</li>' );

	}
} elseif ( is_page() && ! is_front_page() ) { // Single pages.

	the_title( '<li>', '</li>' );

} elseif ( is_404() ) { // 404 page.

	echo '<li>Not found</li>';

} elseif ( is_search() ) { // Search results page.

	echo '<li>Search for "';
	the_search_query();
	echo '"</li>';

} elseif ( is_archive() ) { // Archives pages.

	echo '<li>Archives for ';

	if ( is_author() ) {

		the_author();

	} elseif ( is_category() ) {

		the_category();
	}

	echo '</li>';

} elseif ( is_home() && ! is_front_page() ) { // Blog index.

	echo '<li>Blog</li>';

}

// List end.
echo '</ul></div><!-- .breadcrumb -->';


if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();

		echo '
			<div class="ctd__section--heading">
				<h1>' . esc_html( get_the_title() ) . '</h1>
			</div><!-- .ctd__section--heading -->
			<div class="ctd__section--content">
				' . wp_kses_post( get_the_content() ) . '
			</div><!-- .ctd__section--content -->
		';
	}
}

echo '
			<div class="ctd__section--contact">
				<div class="ctd__section--form">
					<h2>Contact us</h2>
					' . do_shortcode( '[contact-form-7 id="3ec1610" title="Contact form 1"]' ) . '
				</div><!-- .ctd__section--form -->
				<div class="ctd__section--reach">
					<h2>Reach us</h2>
					<div class="reach-content">

						<div class="location">
							<p class="location--title">Coalition Skills Test</p>
							<p class="location--line-1">La Plata Street</p>
							<p class="location--line-2">Argentina</p>
						</div><!-- .location -->

						<div class="contact">
							<p class="contact--phone">Phone: 289382</p>
							<p class="contact--fax">Fax: 392932</p>
						</div><!-- .contact -->

						<div class="social">
							<a title="Facebook" href="#" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
							<a title="Twitter" href="#" target="_blank"><i class="fa-brands fa-twitter"></i></a>
							<a title="Linkedin" href="#" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
							<a title="Pinterest" href="#" target="_blank"><i class="fa-brands fa-pinterest-p"></i></a>
						</div><!-- .social -->

					</div><!-- .reach-content -->
				</div><!-- .ctd__section--reach -->
			</div><!-- .ctd__section--contact -->
		</article><!-- .ctd__section--inner -->
	</section><!-- .ctd__section -->
';

get_footer();
