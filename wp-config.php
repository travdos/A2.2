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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'halsdatabase' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'S]fh_QMU|=gX{o_;]oQQCX@w2f*70a`USp`)yVm}e0(LqR1`-O4wG!d[}WPy:ddp' );
define( 'SECURE_AUTH_KEY',  'Hc3mhVm[De~8Q Lt{|^ W|m%D6fz+Y_0QHrsY_pk)4Gatemt6zsdR1N~q:2(s<Mu' );
define( 'LOGGED_IN_KEY',    's[vdnXqoC+vX2Y9mF<?i*)g<2`bxK;2Jb1C}#J*]~5^QFlb6d+Rp{X,j>:/=D({Q' );
define( 'NONCE_KEY',        'YtP!56/BW@FrJPn*#0tr6#x#tGxoIrQJ|Hn+5Ig.c6Sdq+0$6{dFee}#gsOVHzq8' );
define( 'AUTH_SALT',        '*oXae0T(|9<^IeJLfV]H9m~TjmZ!zjc)oK Nz`SfPb^Ay3yI)g`Vl6yYo#Jo{QG4' );
define( 'SECURE_AUTH_SALT', '>p`sf~(+]#-py/#yk-~8DZH`!ZM&rH:p*?pS#}j)}UM=v.|1TUj$B)EM;:cHr[CX' );
define( 'LOGGED_IN_SALT',   '2EAJ]zGr%YWiL2=3^b]_ps2C3r1?f%p}<Su$>Kf<gWzA2jx{)#:#W_4+jCWzym)K' );
define( 'NONCE_SALT',       'q*7{M4/(_5wI/X6+g=?E[]*;&Vz8eHyPL#ga7#1hXvlW}xR>RGkmNA7<B&mH9qK!' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
