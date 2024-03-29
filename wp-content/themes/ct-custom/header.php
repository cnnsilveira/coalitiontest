<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CT_Custom
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ct-custom' ); ?></a>
	
	<div class="ctd__top-bar">
		<div class="ctd__top-bar--inner">
			<div class="left">
				<p><?php esc_html_e( 'Call us now!', 'ct-custom' ); ?><span><?php echo esc_html( get_option( 'ctdev__phone_number' ) ); ?></span></p>
			</div><!-- .left-->
			<div class="right">
				<a title="Login" href="<?php echo esc_url( wp_login_url() ); ?>">Login</a>
				<a title="Signup" href="#">Signup</a>
			</div><!--.right -->
		</div><!-- .ctd__top-bar--inner -->
	</div><!-- .ctd__top-bar -->

	<header id="masthead" class="site-header">
		<div class="site-header--inner">
			<div class="site-branding">
				<?php
				$header_logo = ! empty( get_option( 'ctdev__header_logo' ) ) ? get_option( 'ctdev__header_logo' ) : get_template_directory_uri() . '/assets/img/default-logo.png';
				echo '<a href="' . esc_url( home_url() ) . '"><img src="' . esc_url( $header_logo ) . '" alt="' . esc_html( get_bloginfo( 'name' ) ) . '" width="173" height="38"></a>';
				// the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$ct_custom_description = get_bloginfo( 'description', 'display' );
				if ( $ct_custom_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $ct_custom_description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="Main Menu">
					<svg width="50" height="50" viewBox="0 0 100 100">
						<path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
						<path class="line line2" d="M 20,50 H 80" />
						<path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
					</svg>
				</button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
			</nav><!-- #site-navigation -->
		</div><!-- .site-header--inner -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
