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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp_basic1');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '2BC=JvPr%0&+`ckB(V^ZK?;G%!^0KN7Yv$xdh<OF)]} N1UNvXGw/Cc^0=*7c_*W');
define('SECURE_AUTH_KEY',  '=7 tmt/OKWKAR7AW*y/Gc0V&<&Xj/;#wu`d6c=aSuOQ!6l0RUn@om=,~[1]WCp.&');
define('LOGGED_IN_KEY',    'yQgnt/CgDky$c}mK1S)i]%25fX(;U],GHw*?x^6;q!P`mD9!sY[D#[1#-KNL_c2h');
define('NONCE_KEY',        'm!2|Eo1cCNIDr&4cxIVN)<Vz)+fYm6`9J0%ZPQ3@}SH}zNp8i3%13~Z%=3],@c0(');
define('AUTH_SALT',        '|S0)8WMw3a]I.HyN9J/Uq#vAh`1[3FIfq7NC>R110Dx.y|n1d^5Ef[oE).qNsam_');
define('SECURE_AUTH_SALT', '87p&J/cD8Y5O0$$6a@)(w{(o]a;(u=$$=7e,qIrX+ 9gxT2q(c^P/ZB{wSJYR1c8');
define('LOGGED_IN_SALT',   '7?g0?y#oa9%cg?-;$K,iYNTqBbrt$*~hl>c9hg_{DFnVsuz]5ySNkI61oqe36[Rl');
define('NONCE_SALT',       'pDMI:%+s#2i,h^Uf=~rNHVGavx2,38Gj%M_;C(x,n}Pn&8vycH7`86J{BLtad6/e');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
