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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'CxRHqzTv2ahYVysFqT5p/surmrBZXJ126h/R4h9/p5S7jDAgnpxZc+8IE9Fy4xquErl2/Ideo7/0eIiWlK9aJA==');
define('SECURE_AUTH_KEY',  'AhcKF00TUYEAl/kptEiHbhJyaWfoqRQDBRNSvXUOPe+TP6wRfm6g10D6sUDrp1Mu6ld5fuHRs96BRw/nx6hHAg==');
define('LOGGED_IN_KEY',    'WkP57re+Nx/+VgaLHgQRnW2YFULFbnAS+FhRGeQU/U/RTQ32vFxaOY6xEB7UpA9Xq9EJ434swxxzkRmfUjPCWw==');
define('NONCE_KEY',        'qPQON5agXz+6IdFR/Q17PwRlBoqa8CIKrzkhocoNDSnDwTfehxFEqfcS2kDR0EHAgcbJr/VX7DOCjkrKwLVW1Q==');
define('AUTH_SALT',        'V8Pk2eULP/rrnhLruGj3TKQk/DvVlESQa56sm6By3qnvPvJMtV7gD4I8g5WsoDkHbADqU4FsXH4DeZ5/xVH2Ew==');
define('SECURE_AUTH_SALT', 'eeFlTA59sSB5xqKnLz9ose+/lRfJ0nu5vlmOs0DqtLBmQ5GyQPfdoC4u7bswb5yrNrUe6/0SZiqjIq166M0xcQ==');
define('LOGGED_IN_SALT',   'OVdPwria3r0Yi1uMK8z8YNH/TwezQlGGcpxobXsMjF3KFQ7wSkFhx4vpP32oku6ST3TnNiodxgwXlGZ4bz0BUg==');
define('NONCE_SALT',       '+cDzXwUKtZ9jmHZ8kIP6hU8vDkbP6uVlu3bA/hfwDrIuR6Cw0KTuFa6RH10W7R08A7LdNc10K/TJQiVSjt37xw==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';





/* Inserted by Local by Flywheel. See: http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy */
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
	$_SERVER['HTTPS'] = 'on';
}
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
