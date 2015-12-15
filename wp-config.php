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
define('DB_NAME', 'sandau');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'mickey02');

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
define('AUTH_KEY',         'qK]J:{8fk._a|Q#sjO|O &Z7DTQJF0Rv<%2t]9Mw+u(yW}U}N!/ 5M$+rC[RuqER');
define('SECURE_AUTH_KEY',  '8iiaJE5^S~_o-7aj6OP,r2n=3i7vIT-+!G}pvksASp]}OYw^]%e.B`P?|E/r2<;9');
define('LOGGED_IN_KEY',    'l.MhqI@`S3ozq~rO`$TSDAHERaShO@r}cboxt5;&Dd|j-I6.z^xn*$[,$=;0gTD-');
define('NONCE_KEY',        'y#_v-LJ>*hTE~&;cp@cFYg6_q6Xew$!qFc0W?*8+#>$8sz}lTjx!jKH<p}Oo~fIa');
define('AUTH_SALT',        'f.*au4QfK8G+,2*2f0ewBiF{x7cHyr^~E6aXha=2-ge_+B(;5f &CD@-Y+_!47|n');
define('SECURE_AUTH_SALT', '+S>:mXm^gh7ZiM<I&^4rs0Dbsj*+[t7-nZ2+|tYMyLnJ]4<&kzA|5*&@V#3/=OwD');
define('LOGGED_IN_SALT',   ',R/0[FnWCv<7-3{k$/+1cYf*uZy+juk=-6+myQ1kT4)4pGF.~-dPfm}6D*c$n@ff');
define('NONCE_SALT',       ',$HV1MWf_{b.7In5bK_X2^{5zIw3W^0Sq<%/^`B@Swiv&Pn_lTZ9iVbX(n<9-!{P');

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
