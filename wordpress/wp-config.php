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
define('DB_NAME', 'cnpm_data');

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
define('AUTH_KEY',         'G|gCmWjWj]]1=C30zLn&1Y&:RY28e~BsL-$Eoe_gJtw)9JU/Ynz:cg*q-K|4`Xm%');
define('SECURE_AUTH_KEY',  'N%F-d$=.B^_:VV.~32eew!^M3BLP-ntuc8`XF2+<R>}C`E+1X^h~)*c&q`5E&rJ+');
define('LOGGED_IN_KEY',    '0;K]Y4pttRm)z{o{I<[9?B[[F@$-3A6S;}34eoXx*]KaWaL9jhRnCXK(To+3o5f$');
define('NONCE_KEY',        'w_w5KVP-CNnnu*bhN}/0WK*OE53lh{&{DBdEG,U{,0&K-}xo^[x.*Od7;uqzet-F');
define('AUTH_SALT',        '<o4UUe8%*!RgotO) ,PiN7XwTXt5-wHh/5N/8#)Tp4GBdJO?(~Cxn,|qmU*5gK ]');
define('SECURE_AUTH_SALT', '9|c57.~Q`kbTS>|[0E</,g13%rH(Af,fqbxc(f71arXK0Z+<:ORZAkI%BnSkOCTe');
define('LOGGED_IN_SALT',   '4@d7m?UG*ztrEXN24YR}29Dmjr^A#SLQ4Y!^hcPX|g>*r@s7J1b$Vu/0#P7k;&Cp');
define('NONCE_SALT',       'oOp~0Rz{ZMl=kX9XK SO?Q{BcIP]<(2Nmx)q{6T_R6PD=8}9#xbrcYHKc(r@>oy{');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'db_';

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
