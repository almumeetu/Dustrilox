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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'd([xy.7.n7`Hv:N317Kb)8eO#U~<tC7+*esji%lau`)8;H7j])<=5C/RvN7(3A&m' );
define( 'SECURE_AUTH_KEY',   'cbbIgq>EXj[_f#MZP.qk3[U3/%o~-<nu|<)|V*#;4[GiF;xMR#X*blewbyKz&^L(' );
define( 'LOGGED_IN_KEY',     'ACC?=+R_r5Uo.XobA?+O*@zOYt(,l2q4)N+P#H#lFg~!9+nbwy!;fJ1%-3z2kkkK' );
define( 'NONCE_KEY',         'rXa-DvvmN*[Q>pNtrSJ] c,rz8}J,Kw.IMi%BJ0b,,k`r}=MpNiRh91~:|EQy)Jq' );
define( 'AUTH_SALT',         '0*mpVahcsO)!ssu`_3V<Vn]WiOHK<2&fj:i[0P{E`[h%U$(h h2#c[gD&PT<y_af' );
define( 'SECURE_AUTH_SALT',  'j[I5|r^)ANScX= !6ojeBiV(eK#2w`|3C0k?]ES,aC!9Y;j`gLR$cUkb@3?q,Km^' );
define( 'LOGGED_IN_SALT',    't.<!6P[Q!:v1m5xEx!cxc[SYpyt~g# ,6oFUm:%A1%d_Vk).#~` _:BWz#nrx{h4' );
define( 'NONCE_SALT',        '$bPovcTI!OpT/aW]m_R?xe3]dg}xQ,9/y,GXR#B)EsMxqzrkqP[)~-sz0+*6NTC ' );
define( 'WP_CACHE_KEY_SALT', 'e_`ANtV +xA8osczk=eSn3Ahk?zmRU+fHrU)lgoBp<fNk;VAY-/NA?^Ey!e*&.F^' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
