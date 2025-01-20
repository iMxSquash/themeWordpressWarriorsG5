<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'vvnrwyxu_amidtv' );

/** Database username */
define( 'DB_USER', 'vvnrwyxu_celia' );

/** Database password */
define( 'DB_PASSWORD', 'AmidFifi2024!BDD' );

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
define( 'AUTH_KEY',         'SDc5^0dc#0z~LAJBZ!;+T[gBC(O9mvf)[It|Ro}b3TpF@Te&gp%3O4VD}I8*7L;&' );
define( 'SECURE_AUTH_KEY',  'RTd@U![MSjh56%63Kz Z@+7[X||Uos9q|B;d6aqX^$2O 95Uw1cvty8?Z?|)X!10' );
define( 'LOGGED_IN_KEY',    'y0&h/~Jrc=;R+|)tZ/Sy%<yE!xc(l{69Qv4%sIBmaa{fed%#7k>8H4v5t_D7 dQD' );
define( 'NONCE_KEY',        ' Rp A7u4grHTjNR*.yo(Qq!+OJtbd7MC&og,I~g7{#.@WsYq{.ZMd+q;}6bvSv9z' );
define( 'AUTH_SALT',        ')KAXHN8fp,=41vjW(R0g!U?*iUbtVke8]?AgD!e>*RN-~tb@]v9u[,DBw_OoUoJh' );
define( 'SECURE_AUTH_SALT', 'U;FAFR5#=&H5gRn?7nYCQ0Y~QFQahgePDvmD-Rgt,$Y:?_blZ:EA1-gm6Y#fFN:c' );
define( 'LOGGED_IN_SALT',   '1,k-/)qz9FaQ1W=4H]0l1E?~R6n3p4JZvp&bU}$tBqfMdFn>KaehoB5@m- D|/Fm' );
define( 'NONCE_SALT',       '.=@bGEqaN=@cz4Y8[~huXH}(.P[k}+0obTb2eAJ4UHiYJXM<V5ZNsX2>Am.Frc[F' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'warrior_';

/* Modification/Sécurisation du nom et de l'accès au dossier 'wp-content' */
define( 'WP_CONTENT_DIR', '/home/vvnrwyxu/public_html/contenu' );
define( 'WP_CONTENT_URL', 'https://amid-tourisme-voyage.dz/contenu' );

/* Modification/Sécurisation du nom et de l'accès au dossier 'uploads' */
define( 'UPLOADS',  'contenu/img' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', true);
define('DISALLOW_FILE_EDIT', true);

define('FORCE_SSL_ADMIN', true);

/* Add any custom values between this line and the "stop editing" line. */

/* Augmenter la limite de mémoire php*/
define( 'WP_MEMORY_LIMIT', '256M' );
define( 'WP_MAX_MEMORY_LIMIT', '320' );


/* Désactiver les MAJ mineur*/
define('WP_AUTO_UPDATE_CORE', 'minor');

define('WP_CACHE', false);

define('COMPRESS_CSS', true);
define('COMPRESS_SCRIPTS', true);
define('ENFORCE_GZIP', true);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

// Configuration email PHP
@ini_set('SMTP', 'localhost');
@ini_set('smtp_port', '25');
@ini_set('sendmail_from', 'wordpress@' . $_SERVER['HTTP_HOST']);
