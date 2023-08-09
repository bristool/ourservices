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
define( 'DB_NAME', 'www.dance.uw.edu' );

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
define( 'AUTH_KEY',         '0[(02lNt+l[/{biyGG;`W/ve[^j7F~2J5zYRS;%<[.:xJsGv/Aug4*?`l9F{sW;e' );
define( 'SECURE_AUTH_KEY',  '_OP[hE@K`)`Cj8- Ao_>s 7d(TCTaqjLi)dil~MuO>qpA&tb-R23=L7Cfk>c%/Yd' );
define( 'LOGGED_IN_KEY',    '$G_g?yp&+~H!,* a;(UM>ST0I}K9?;x)Tj(I2/.O(/)$2k2mj)tNUH64J#A,^< 6' );
define( 'NONCE_KEY',        's;P$kvPH3dPuN;8Y}?_F~7-[a9|(6$.FzW7obX2{:6V$`JCmi3>E*>]I~G E[C,*' );
define( 'AUTH_SALT',        'AD3cx&|RG0t;Rk<n|`BDcU*larB3;Mp?muQI|bb6OlkR>BC28;A<Z? ^Cv^01[,`' );
define( 'SECURE_AUTH_SALT', '2!+71U#4}>3:=vvG)>UOrGq*HsHCqQndZOZMyMwP]YG^nU3B]!4]$+_Ri=#8,``H' );
define( 'LOGGED_IN_SALT',   'C1f(fk??JYjyl]@1pG@_5P{@-{GLOjl%mt{GYShmis6J,oVux^R+Jb6:JZ$<RTrc' );
define( 'NONCE_SALT',       'k?uOu|i(`_ukf*ezw(Q%Ub9-V&_zEO/,r?}0@;,gf(pe=3Iv/.KslI#Hz.fzX1,-' );

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
