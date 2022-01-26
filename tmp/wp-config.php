<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
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
define('DB_NAME', 'cnfamiliesinnl_com_200215080_app');

/** MySQL database username */
define('DB_USER', 'cnfamiliesinnl_com_200215080_app');

/** MySQL database password */
define('DB_PASSWORD', 'GxdMvNf6gp2F');

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
define('AUTH_KEY',         'P*p!twK%6jPff^DYCp@BWd@r2l76A^zKXi7B8Lj#2ht*O^c5N%nrB4bbKWXZEDNz');
define('SECURE_AUTH_KEY',  '9$iXSlosHQNnPG%0IOhOBDdqaUfoLt@hNTE88*3fJVe8h%bEgxHLx%AAMRtAWVm3');
define('LOGGED_IN_KEY',    'ps(8FNCK73BH1v55Ftd1w#I4s6vsooCYwr$us8H8C!c%FXj%OoJHzFoBtlWL@yn^');
define('NONCE_KEY',        '8bn(C^ibfx7w$hm37juR7lV0jQjRrQ9idczp6d$K4^tII8kOatUfSIYR7dvox27C');
define('AUTH_SALT',        'c#%Ww@i@6(mBkS7jG)sV4^D6OpLSl2qed)pt98dme%10$KOwe2DatHHvFy8#x))f');
define('SECURE_AUTH_SALT', 'SCKe3HMhAvKb9@wAvqEehDloo(GUoMTWE0i#n6LzB6(*T8QxMnn34)nn@mdBat5J');
define('LOGGED_IN_SALT',   'i(rw85ZAel$0fWWNCg3Xye6XsAYIX!d)H7wIDJEWvZre9TkT(MPpsd7KE1cYSz66');
define('NONCE_SALT',       'DfDpc3I)j!T8oKZWP35)5(MBJ54YC@lslTgw50y1)iq#ksQ#uTwtRKcld3Cww!vN');

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

/**
 * These settings were added by TransIP for your ease
 */
define('FTP_USER', 'cnfamiliesinnl.com');
define('FTP_HOST', 'ftp.cnfamiliesinnl.com');
define('FTP_SSL', false);
if (isset($_SERVER['HTTP_X_TRANSIP_TRANSURL'])) {
    define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '.transurl.nl');
    define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] . '.transurl.nl');
} else {
    define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST']);
    define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST']);
}
define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

/** TransIP fix: sendmail does not support flags. This fix is needed in order to make mailing work. */
global $phpmailer;
if ((!is_object( $phpmailer ) || !is_a( $phpmailer, 'PHPMailer' )) &&
     file_exists(ABSPATH . '/wp-includes/class-phpmailer.php') &&
     file_exists(ABSPATH . '/wp-includes/class-smtp.php')) {
	require_once ABSPATH . '/wp-includes/class-phpmailer.php';
	require_once ABSPATH . '/wp-includes/class-smtp.php';
	$phpmailer = new PHPMailer( true );
}
$phpmailer->UseSendmailOptions = false;
