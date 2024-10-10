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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'anhvu' );

/** Database username */
define( 'DB_USER', 'dungnh' );

/** Database password */
define( 'DB_PASSWORD', 'admin123' );

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
define( 'AUTH_KEY',         ')4M%!YmQbDesU{-*pd!6UabA9WB{xc9~fzvKch,pCR;EVw?p?j/>)Y;%kk_$6ums' );
define( 'SECURE_AUTH_KEY',  ',;CUI.nCRK4#;l&+jstET2uLcOq&Hbb{b]|m3shqn@A_X>(r1H3B0tg=45MOMFZl' );
define( 'LOGGED_IN_KEY',    '5oe~QFixdvBEp+4_CM6c!]$}t&^Th(:.aIvgj`}o@<jCMlySR#{V2{g[j&{1Wjya' );
define( 'NONCE_KEY',        'X,GC)IbVt68PIb?+RIlQE}`x_1.3{$LX5?aGWoY?~EY|2x0kpMOyxhfhQRs;gY*&' );
define( 'AUTH_SALT',        ')}?8wxM~X@JSjS4u3$a$Xkxz7+R[uVh|j[lg$gfGf}CDm;>9/Jiy.+GA6/=4=aI]' );
define( 'SECURE_AUTH_SALT', '`4XQ5IPKbT/ch#OT^?kUn}57EL#%fg-gkIVz:;])Znj,qlDc|JZu9j*0t: Y[}TI' );
define( 'LOGGED_IN_SALT',   'OgOCfzp/45Jrg?ZZY+fOJ$Czkhw5lY%U75P*smOa?QV|w{BSX#t|_2S=-0LIAcJI' );
define( 'NONCE_SALT',       'TqSa{z#fp;m>_TkTy -Y3<JVd:sA[HGQ{(gCn~a,Q9|7<Xz)F[aeab+jDp1nH$e)' );

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


// Tắt hiển thị thông báo lỗi không nghiêm trọng và cảnh báo

// Tắt hiển thị thông báo lỗi
@ini_set('display_errors', 'Off');
@ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_WARNING & ~E_DEPRECATED);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
