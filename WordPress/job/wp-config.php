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
define( 'DB_NAME', 'job' );

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
define( 'AUTH_KEY',         'Y!<bOYrgDrr!^W0`G.Jk[Pp|ONV0$ ,;=S2FJwFR/P9V*_wXg=QDr!Wl&gqyA4vv' );
define( 'SECURE_AUTH_KEY',  '/O+,5cXz.y?z_MjN2g}N]t)[cJ%H(.-*hZ5%,p=`<Ify`!Y3Lm<j,Kp!@+4beiWt' );
define( 'LOGGED_IN_KEY',    'VB uZX;Xsk|K)c]i%^u;nvN}iVC;L!Pw)4uUq{s1K4:5D1q.Vx$F.DIIHSm#9+?K' );
define( 'NONCE_KEY',        ']zA?5|G &0WweuYfQn|^f^ XE~ko1,#owW`h{%(8=,$m`=(7:}O-T)gEC_!nT[l$' );
define( 'AUTH_SALT',        'bmPJSc>;GSZ:: B $j<=E%/POphJJY|=gLPtN 12Ku=Ea?<[F([G8cG6$718[hi|' );
define( 'SECURE_AUTH_SALT', 'sB#+?&n{:v?!`xN51?(m<7K(N5/{zVM-!~}$OdbJSnrB*wuuL4Q <#O+v$/E-<mP' );
define( 'LOGGED_IN_SALT',   '1c1Z&F;=Crv09%CHj?yQ)``Bj$M0=DI3=RAj8!4rVW{Y]uI)I? >ulP@5?h^rQ/6' );
define( 'NONCE_SALT',       'GiF3~=#@a1PhQ}piFMnNQpXtr:FHmr1JY#(><S_~{c51uww;Ow_,[zXx+{OnHCN{' );

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
