<?php
/** Enable W3 Total Cache Edge Mode */
define('W3TC_EDGE_MODE', true); // Added by W3 Total Cache

/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

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
define('DB_NAME', 'woocommerce');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'aira123');

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
define('AUTH_KEY',         '^wvAKY$P+xbiIyh 3<@*Q-.rhq)]GUZ$m1)GU9/TZpvU9&ctlX^Gw#|M~3Z9#rTG');
define('SECURE_AUTH_KEY',  '{Rwe-V*B+[6:,OCoD%n*Qy0VUP2QVq]?@q`_yWW(%-26m}hkXqroc[iP}[lia;E>');
define('LOGGED_IN_KEY',    'M13;Yl1d5%Sl1&LH-8J($vgr>O$p@^bes9ffndO|:lT2HxsPnsV `{?@[trc_?@e');
define('NONCE_KEY',        '_z[gb7K]|_R9ot_IL>TOOb%V-~}(pJ.&`=w8ng+;;(-rn<(dF%)Oqx=))Kj-=r:c');
define('AUTH_SALT',        'xZ77) Lv+>bDxFjX1c>2}x|6a1VyP%t;t|n:>@8_|u_2PK>S9IH=ih/H8yp%)iM<');
define('SECURE_AUTH_SALT', '*H/s;:b*WD(+Xcy+>~JqR^B~,|q!X=%.V]cb7qZz/NYt9.)<_:]:n0;;& ,*VzeA');
define('LOGGED_IN_SALT',   '&E;Rd?ar:(P)j/[OTq-7J(k(LREU-C*8}h|bxLea~1(j5[683@4j,t-s$]SRYJAj');
define('NONCE_SALT',       '1].?QCd/|Rzd{{u6s/,u?j+DjPjdzBfx4{K2FLR*nG[N1^dD/?aYT/.U-&v?@M*+');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
