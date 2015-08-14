<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ncssm_sg');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'password');

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
define('AUTH_KEY', 'wH~M+e.p|w1)o3JYhkp=z&Dp-xv7o-Y/Iw9<nHLoNE2w#-n`ZxJe4b#zzZ-RkYtx');
define('SECURE_AUTH_KEY', 'B:LLTBo+#i)!x%oj>4QU8lp_hAy@g#B%[oFF8+tubgnBqacAF/ZpJCZ#-?].{O&_');
define('LOGGED_IN_KEY', 'hK/A;nXoEkVwIC9g;;m#H`V-*Eap ]&{jkU:>vBfrko4&@AB7TrkxCYfg#uIdS+`');
define('NONCE_KEY', '|&OQMxnwZdW(O@|b)>21qjnpct|FEbQ*S^cbQjjhcYM2|Cz`ug`|54wz:B2-qVTh');
define('AUTH_SALT', '?]$]pg?+-lRW6^N{(S(6HG?,)8.D5k+d+ry{]unK$pMNI:FF>vjqY<||mbE@:zv9');
define('SECURE_AUTH_SALT', 'n)?ReD);gNS~Rsg1p$!.o{c,vGerVkPs 7 3M>FVI!Bhh>S>>9_`Ld&|0{saohA+');
define('LOGGED_IN_SALT', ':v&5B+f17jm4.{V~k|Bl=z5!DL*X|+h;^NtMv^|$qr- &h;T7_Up,CG;cppHeYxg');
define('NONCE_SALT', ';CM:B[ q>M&_ ?I6oyEfu==dARRJ)Kk(|u WRl|%)H/qg}W/ w.NF4#]!W(M4Nwi');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
