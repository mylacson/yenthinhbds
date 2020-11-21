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
define( 'DB_NAME', 'sunnyland' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         '*JDH>.5_+3Y$C }?gj8%w55BmB3K#Q8Sfu+xo.slK./(fy}].O*xr4v=`hY}Aou[' );
define( 'SECURE_AUTH_KEY',  'CWLo]{H*y@T?F51c7zWs$@PVlypEgC$IaPbeSeBNs+@*Z.DzP--o1!Ua{]bCu!Kp' );
define( 'LOGGED_IN_KEY',    '7U,&eleC)^Olpd*2&oZg_1vnwX:7wgo)oH>qSVjix7<*1NM~$QR>#kDIW-Xv<& >' );
define( 'NONCE_KEY',        '3hERx2t (uom$M6hXG]`#@<y.jFWXdo,;Y3B-f4U`WI##Kp>`32p|St?FoCyeP`9' );
define( 'AUTH_SALT',        'x||gN<oNAY~/Ne|xW;7L]t*>whq&YH1.EjN;d.luHq{:?i)u!i5$+WQ&pn!{!}AW' );
define( 'SECURE_AUTH_SALT', 'ReNO|B|@DQQKo*=+G<*`^8{kmy4o2{b?$Wk4a4GLN3tQ@]Mlkdo&q,,xO*u9hShG' );
define( 'LOGGED_IN_SALT',   '@`MT1fDsO%ZTJ&K*mA6uO}m%wu>sUC*vnS.p_)2rje%74w4%A3QmX.uw+_Z_d%JK' );
define( 'NONCE_SALT',       'O.myJ.DtUAmZ7KyNc!8{,A#!^SZt*Zk;+gWA4i{6*Pz$=>pt=OdHxLwTSAhM%nls' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
