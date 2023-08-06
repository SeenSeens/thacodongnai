<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'thacodongnai' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '12345678' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ',W3vlKe~gP4Q7^.{7Cski4`}Yt1[Sos,qbIGoWhgDO8;pCX8TwfY{pq(N8H)HrjH' );
define( 'SECURE_AUTH_KEY',  ']cQ>p;1#n+KXK@*GqU0LyK?jD4&QoCc0By|TJ464e*co~>i}+@ZTnu?Lyb0ganH:' );
define( 'LOGGED_IN_KEY',    '/xSZ[67^E<iEsZ+vLvG/5Q=iWPm++,4dFyyh1>,xcgm[?K3>b4XliW&!`u_*TwCS' );
define( 'NONCE_KEY',        '8mVO/J|yPqA!i=z1LrSo@qlWloSck uPco]*a.4!=KB-//X<Pg6},1yz]s:]tK6O' );
define( 'AUTH_SALT',        'ca |O5`J<6odu|msk!Xk}C4h/<gJ{_8JE3Q4Z}*vkK87Y5p+xu>mV%cqTP6}~1*b' );
define( 'SECURE_AUTH_SALT', 'p0Rfve<g~[pjO?8sy~FEGn{|pQN83}0q+jVsCUnrXMI3mH,)jIL:#7>x[BnsK;d9' );
define( 'LOGGED_IN_SALT',   '* A%U5SU<V_/bgb/4S5&D.r,c;77[NT!96kMHyuZ>u6Ox)zQeE>oPZ8%q7ykz|lI' );
define( 'NONCE_SALT',       ':k7(f/3OHPS.H@pl:Zu&Tp_IOX_r?-a@J|d@U>P9b(6ZvQHNm&!s^Le})|aVmVg^' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
