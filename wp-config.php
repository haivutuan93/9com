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
define('DB_NAME', '9com');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'Rikaki1492');

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
define('AUTH_KEY',         'PKwPszh%]jxpY|n|*BXF<428k~}b-e!H)MB3*I?@O;<JBKnenm?4^:P{e(TOza<?');
define('SECURE_AUTH_KEY',  ':OH]Yyw?mzP^C $$O=QN6|}YNHP/<aePUmyC<B8og&:6a)8XEC}jF*XD bpf^]$b');
define('LOGGED_IN_KEY',    '2H4]BmZx&v#+!~?A&zY9(5U)!oH.()j!?I<Z/!G#6$pW!dH8$eun9;JR:*4$]ZvQ');
define('NONCE_KEY',        'AnV#-&j=|*uTm:T!;me8z1iuxfJz,RBzRV<qsaG5.Yym=ie|2_*kJ1$0ji`] !&q');
define('AUTH_SALT',        'Q+=T=;H0b+]O*;F957%JJLQCP]eF{s `v;m&sL{S}v-Wpv}^$zUP/LM:JFcNv!Ih');
define('SECURE_AUTH_SALT', 'G;K8_Vg|h8|heNRW-<Z0%j ?~WS;:L=gh>Ux{zz>Z@8[{IkdZJVEL0N3jHiy}Gne');
define('LOGGED_IN_SALT',   '!P?QTda69<*4K |RBz7Z(S~;>;`7{FrI89]6VIT~n{DsXvT.i5I_.6Onxus1h{Zl');
define('NONCE_SALT',       'rMq^;nU!@$j@ChLx7vZ6jM87W(8_V-<v`p~e>h-8&$*h2Y%xAaoNNhSrn</6*/?W');

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
