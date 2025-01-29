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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'builtfront_blog' );

/** Database username */
define( 'DB_USER', 'builtfront_blog' );

/** Database password */
define( 'DB_PASSWORD', 'CdAnEQIrBB089v615' );

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
define( 'AUTH_KEY',         'L@g6t|nis49WZZ`;l[J<O#YGga=OW1huMW+(7Yep)}E kbGIWky&Ks/5gWdwJbY$' );
define( 'SECURE_AUTH_KEY',  'D%r}_SQ< cbacbHxFR|;}}<14zw)}#<9;u|v]4K*A*J,/to2x8 -Ee|7*<nYhjpf' );
define( 'LOGGED_IN_KEY',    '!YU^BYgW83]h^wGgmh`qhE<MSlRATU{*Tr/@pTvV0LSPsh(:ZI@F|(pGde1YB&8t' );
define( 'NONCE_KEY',        'iVJ-!89CVpp(`PlbOAqL8Z{UnPb8T!Dk=O|%P4>E6 x&TbGw]uN@1YS.>gt8~&C`' );
define( 'AUTH_SALT',        'D<_K=]>T)3^(V1WS,`tK_BXmR4W^ad5| yAJf@M*[Aw*292:W>v4,X#MSnZhB$w8' );
define( 'SECURE_AUTH_SALT', '4_z4Z{dB^|@5&)Y(FHD]J|QPNk_ca]wrYwe3`ROuR~Zg_cQG]}%;:&_327l`AReG' );
define( 'LOGGED_IN_SALT',   'Y#6j6&V7P,&Y$uSV2VIDu=NkD{Q+u>E|Uh0c.^k{UaI2X>b#FN%3rrbVhx{V<TSr' );
define( 'NONCE_SALT',       'd5*]+uZe)u$2_I^:h.@8jv}U~W_JJ[Es8fv#0aQ0 GCd^s>_4[PcAy7jn8teG{{D' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp1_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
