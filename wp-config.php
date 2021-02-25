<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
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
define( 'DB_NAME', 'azolozhost' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost:3306' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Qowa&zd{d4fK0aiB[EOp8U^ir#b>:ZIQ>+y|jk!^.H)Yr4Q0Izxs=4PQ/f0+rKI ' );
define( 'SECURE_AUTH_KEY',  'e-[_LEx2V!h!; 6Q+xk(#vFy,oui`|xM$Z%Cn51_lB_wu?GXEETSG*KzB<cp`g`{' );
define( 'LOGGED_IN_KEY',    'gRO:h~yrBJ@XW3bfOd6VnpAt}Hxk~4z^+9M=dw`b : LqT^/db#D.<4J}P&eF5KZ' );
define( 'NONCE_KEY',        '%M7c)zzS@EL|)NSm^Y?OPRaoL+DZPlOyZ/{xR`>sWA:-l}D<?jH~8W->NX*}l@b;' );
define( 'AUTH_SALT',        '?@gv|JtDESJ<O^^b< FxYR3N7rww256KcUBEWTvFGP!&zIbE_4-J}T;v&+al2<],' );
define( 'SECURE_AUTH_SALT', 'eEN 1Km1@CU?6gI7q-wf`ulU`shsi0w&&V`F^1Zk=]p7Pc5sJHc)vU-?1_y>=r[z' );
define( 'LOGGED_IN_SALT',   '_f6 BC J<Kl!C<srGOi=v;v;KvkzdMv^tV-zp:Y`{Dsnfuu{+VWgF0MTxGq1.O7j' );
define( 'NONCE_SALT',       'J{H!r+yl-l1pOfMCMI7Mv3`Lv=9DypMrGJ4d=O02JqjRg-aPm/VjQ5g|{&I.fgqn' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
