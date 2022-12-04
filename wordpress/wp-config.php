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
define('DB_NAME', 'opokonse');

/** MySQL database username */
define('DB_USER', 'opokonse');

/** MySQL database password */
define('DB_PASSWORD', 'rlatjdcks12');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'kc^GBB_agS*&p4Le+*qB)@/N:5SbEW}}r;Dg)2hkb}#N~)MF2]a<lmk=cn1,4^5t');
define('SECURE_AUTH_KEY',  '90%5^X!PklQFeq^D0yYS2=I;-M:ffTHwK$kYpq=eLf& 3P[yh}3#V::k^*CJeG=V');
define('LOGGED_IN_KEY',    'mV@s;om5oUTI9kAWmGFpfGHaW6fjeA;.uAqKdlR&?I_W))H?CDe,n)_T5v(Jb6}4');
define('NONCE_KEY',        '[@]ZFZMnk!Yv0E]Pmmp`n!T:)av7aRMM&D6#POH9Z3t3g >I%-bS.XWO_v^%{J9l');
define('AUTH_SALT',        'gN_dq1|{fsxQTa7}5P7.-E<<oZ:Xs]x`=Sky(D[ckYf}.]i][1IrOA&cJ+&q[|kZ');
define('SECURE_AUTH_SALT', '1dqY$#@0E&INFgru4gw#>2IsN@@S(Es0/Q_2s37D2rj#QmcnedwfD2SN1u^Bg@:-');
define('LOGGED_IN_SALT',   'E`4>OKXd>rT~4$IGZ-XH;r/`.VQbGObh+N^XY8A*<VXrh#*P}Em=Lq9~f$;V,7o0');
define('NONCE_SALT',       '5Rlot:6}E}<,*`zztX0lHb11k%cm?qQM6>V8O-}}Agso!TWZPyl.]5C6QO=UG.U*');

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
