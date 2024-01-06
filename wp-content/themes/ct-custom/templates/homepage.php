<?php
/**
 * Template name: Homepage
 */

$address_title  = ! empty( get_option( 'ctdev__address_1' ) ) ? get_option( 'ctdev__address_1' ) : 'Coalition Skills Test';
$address_line_1 = ! empty( get_option( 'ctdev__address_2' ) ) ? get_option( 'ctdev__address_2' ) : '535 La Plata Street';
$address_line_2 = ! empty( get_option( 'ctdev__address_3' ) ) ? get_option( 'ctdev__address_3' ) : '4200 Argentina';
$phone_number   = ! empty( get_option( 'ctdev__phone_number' ) ) ? get_option( 'ctdev__phone_number' ) : '385.154.11.28.38';
$fax_number     = ! empty( get_option( 'ctdev__fax' ) ) ? get_option( 'ctdev__fax' ) : '385.154.35.66.78';


$social_facebook  = ! empty( get_option( 'ctdev__social_facebook' ) ) ? get_option( 'ctdev__social_facebook' ) : '#';
$social_twitter   = ! empty( get_option( 'ctdev__social_twitter' ) ) ? get_option( 'ctdev__social_twitter' ) : '#';
$social_linkedin  = ! empty( get_option( 'ctdev__social_linkedin' ) ) ? get_option( 'ctdev__social_linkedin' ) : '#';
$social_pinterest = ! empty( get_option( 'ctdev__social_pinterest' ) ) ? get_option( 'ctdev__social_pinterest' ) : '#';

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
							<p class="location--title">' . esc_html( $address_title ) . '</p>
							<p class="location--line-1">' . esc_html( $address_line_1 ) . '</p>
							<p class="location--line-2">' . esc_html( $address_line_2 ) . '</p>
						</div><!-- .location -->

						<div class="contact">
							<p class="contact--phone">Phone: ' . esc_html( $phone_number ) . '</p>
							<p class="contact--fax">Fax: ' . esc_html( $fax_number ) . '</p>
						</div><!-- .contact -->

						<div class="social">
							<a title="Facebook" href="' . esc_url( $social_facebook ) . '" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
							<a title="Twitter" href="' . esc_url( $social_twitter ) . '" target="_blank"><i class="fa-brands fa-twitter"></i></a>
							<a title="Linkedin" href="' . esc_url( $social_linkedin ) . '" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
							<a title="Pinterest" href="' . esc_url( $social_pinterest ) . '" target="_blank"><i class="fa-brands fa-pinterest-p"></i></a>
						</div><!-- .social -->

					</div><!-- .reach-content -->
				</div><!-- .ctd__section--reach -->
			</div><!-- .ctd__section--contact -->
		</article><!-- .ctd__section--inner -->
	</section><!-- .ctd__section -->
';

get_footer();
