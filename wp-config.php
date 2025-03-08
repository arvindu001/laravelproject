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
define( 'DB_NAME', 'hq' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'WU$NZ=&F.S%o3u^qj`eh4=)J|$[si.mAmVF:u7Y4scn:D:v0>WtE.$Y:jpo8uo9R' );
define( 'SECURE_AUTH_KEY',  ';DDUe]eJHunzf*}dy<H0w/_0GQI[10BLJT$B*UY/ PS=D 3OO)fZ>{}3GLihB/su' );
define( 'LOGGED_IN_KEY',    '=iWz dk8nok dnrU:Bj|sJ/<,V1]{pI)j>bBAMq)S(W@aCumF4Y?s@=s=$ym5*~G' );
define( 'NONCE_KEY',        '/~N_d|0y3T6%=7l3v>4R>kZP*Guw/mey)*a/[*kId&E*9wv!]wZ^6Z(1LH2]~fD+' );
define( 'AUTH_SALT',        'u_J^|r@2xU cA|V7YW+BYS/qz[cJaym+E3Tje0JJ*v>VX:2^%H!@9(?_D8w-twSQ' );
define( 'SECURE_AUTH_SALT', 'e}<`wgZ0~UIQ7yBhGF-Wu%>ZO>U2dE*O=a}TkEY`lWR8tWeT0#u`B1z3o|;):dD_' );
define( 'LOGGED_IN_SALT',   '#2|<ogih#BSbghyUN]iKfv8m631/Gc^7D8XsHpSE FHM4cxNZ=i4j0f_x*|{<FT8' );
define( 'NONCE_SALT',       '5};xO8+SmYWddM@!bo7fJ))?+#;.2R8U3vfDr}d;A48g#0KynAJ WL#Yh}Urkz#Y' );

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
