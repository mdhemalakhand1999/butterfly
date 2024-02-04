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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '4jBL.! cj6czpw7}fz%{g?`?ho1,.YI<D3B^F>L> M3=<&[A/{YZzY,sYv.J^fnc' );
define( 'SECURE_AUTH_KEY',   'Sf B&B kv*cU_~3[HpIWcMXf3to*R)$z?_i,GM!#MsHmab4wCfV+o+;!Qa,0Gc4d' );
define( 'LOGGED_IN_KEY',     'UVw*/l8{<Y],)0:RsEV1ibXY^rc]BvIJ9rHCc@C;z@9_z_o#*HSw8$9pAFmzD~w)' );
define( 'NONCE_KEY',         'b*<^Sx*JJ;9?|Yjp?Z<[KrQa4~h*QrU19BQ-_3Nox+)isw;(9.|Pd$TA&.*0l310' );
define( 'AUTH_SALT',         '[uy{Jmd{}DTb+@> +0&_H4y+>0>o0w]K(i+&D;(!Hnj(5g[]L^ OU#7c-QATKHz3' );
define( 'SECURE_AUTH_SALT',  ' e)vF-CeF2Tj*8%x3#+xcHh(4JnFBk*u*aos<d1>z8rU@G!RSu,)UNxJhI:.&VCi' );
define( 'LOGGED_IN_SALT',    ' a{d mVPW[(:!_VcSn__f4A*Lcx$9U HmsuCGPt.{{L_5%{k  @R1heM:;Gu<V_M' );
define( 'NONCE_SALT',        'Ro>tobINz5U+:8Xt~~Ch02cm]p)v</WxxYZ!,NpjAJ#+A{og}ds O2d2eBk#[fK1' );
define( 'WP_CACHE_KEY_SALT', 'h{[4BSHVBC])tT?I3f2(OC|M:p_mU}h+&jSjsD.x|S E~ccbn+7#:/34$k&LjzKT' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', true );
	define( 'WP_DEBUG_LOG', true );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
