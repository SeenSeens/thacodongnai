<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package thacodongnai
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
<?php
$tp_hotline = get_option('tp_hotline');
?>
<?php wp_body_open(); ?>
	<header id="menu_header">
	    <div class="menu desktop">
	        <nav class="menu-header container-customize">
	            <div class="menu-header__logo menu-logo__tenant">
	                <?php tp_logo(); ?>
	            </div>
	            <div class="menu-header__wrapper">
	            	<?php tp_menu(); ?>
	            </div>
	            <div class="menu-header__info">
	                <ul class="menu-header__info-list">
	                    <li>
	                        <a href="tel:<?= $tp_hotline; ?>" class="menu-header__info-list-phone">
	                            <div class="menu-header__info-list-icon">
	                                <svg width="18" height="18" viewBox="0 0 27 28" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                    <path
	                                        d="M25.5176 19.9656L19.6494 18.1057C19.4069 18.0285 19.1477 18.0196 18.9004 18.08C18.6531 18.1404 18.4273 18.2678 18.2476 18.4481L16.1459 20.5492C16.0597 20.6349 15.9478 20.69 15.8274 20.7061C15.7069 20.7222 15.5845 20.6983 15.4789 20.6382C13.655 19.5742 11.9807 18.2725 10.5001 16.7672C8.99476 15.2865 7.69303 13.6123 6.62912 11.7884C6.568 11.6831 6.54348 11.5606 6.55937 11.4399C6.57526 11.3193 6.63067 11.2072 6.71694 11.1214L8.70134 9.13642C8.91717 8.92073 9.0695 8.64983 9.14165 8.35335C9.21381 8.05688 9.20301 7.74627 9.11045 7.45552L7.29892 1.74746C7.19193 1.40974 6.98017 1.11486 6.69434 0.905581C6.4085 0.6963 6.06344 0.583487 5.70918 0.583496H4.36234C3.09722 0.600172 0 4.39888 0 6.87743C0 8.36935 0.505827 13.7433 7.01099 20.2485C13.5161 26.7537 18.8952 27.2645 20.3871 27.2645C22.8656 27.2645 26.6643 24.1673 26.681 22.8949V21.5553C26.681 21.2011 26.5683 20.8561 26.3591 20.5703C26.15 20.2845 25.8552 20.0727 25.5176 19.9656Z"
	                                        fill="white"
	                                    ></path>
	                                </svg>
	                            </div>
	                            <span class="text-white Roboto-Regular c-text-lg"><?= $tp_hotline; ?></span>
	                        </a>
	                    </li>
	                </ul>
	            </div>
	        </nav>
	    </div>
	    <div class="menu mobile">
	        <div class="nav-mobile mobile">
	            <div class="menu-mobile-container">
	                <div class="navigation">
	                	<?php tp_logo_mobile(); ?>
	                </div>
	                <div class="menu-mobile__tenant">
	                    <a href="tel:<?= $tp_hotline; ?>">
	                        <span>
	                            <?= $tp_hotline; ?>
	                        </span>
	                    </a>
	                </div>
	                <nav role="navigation navigation-icon" class="navigation navigation-icon">
	                    <div id="menuToggle">
	                        <input type="checkbox" /> <span></span> <span></span> <span></span>
	                        <?php tp_menu_mobile(); ?>
	                    </div>
	                </nav>
	            </div>
	        </div>
	    </div>
	</header>
	<div class="margin-header">