<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

# Ensure that only HTTPS access is possible for Wordpress
$_SERVER['HTTPS'] = 'on';
$_SERVER['SERVER_PORT'] = 443;

# Set to core wordpress url the entire site
define('WP_HOME', 'https://{{getenv "ROOT_DOMAIN"}}');
define('WP_SITEURL', 'https://{{getenv "ROOT_DOMAIN"}}');

# Disallow Plugin Uploads / Editing PHP files from all sites except Cyberspaced Core
if (strpos('{{getenv "ROOT_DOMAIN"}}', 'cyberspaced') !== false) {
  define('DISALLOW_FILE_MODS', false);
} else {
  define('DISALLOW_FILE_MODS', true);
}

// ** SQLite Settings
define('DB_DIR', '/app/uploads/database/');
define('DB_FILE', 'db.sqlite');

// ** Shared DB Settings
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
define('AUTH_KEY',         '{{getenv "AUTH_KEY"}}');
define('SECURE_AUTH_KEY',  '{{getenv "SECURE_AUTH_KEY"}}');
define('LOGGED_IN_KEY',    '{{getenv "LOGGED_IN_KEY"}}');
define('NONCE_KEY',        '{{getenv "NONCE_KEY"}}');
define('AUTH_SALT',        '{{getenv "AUTH_SALT"}}');
define('SECURE_AUTH_SALT', '{{getenv "SECURE_AUTH_SALT"}}');
define('LOGGED_IN_SALT',   '{{getenv "LOGGED_IN_SALT"}}');
define('NONCE_SALT',       '{{getenv "NONCE_SALT"}}');

/**#@-*/

/**
* Wordpress Memory Limit, plugins such as WooCommerce require a higher memory limit
*/
define( 'WP_MEMORY_LIMIT', '32M' );
define( 'WP_MAX_MEMORY_LIMIT', '48M' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');
define('DISABLE_WP_CRON', true);

/**
 * Wordpress Automatic Updates
 */
define( 'AUTOMATIC_UPDATER_DISABLED', false );

/**
 * Wordpress Storage Paths (allows for architecture moving)
 */
define( 'WP_CONTENT_DIR', dirname(__FILE__) . '/wp-content' );
define( 'WP_CONTENT_URL', 'https://{{getenv "ROOT_DOMAIN"}}/wp-content' );
define( 'WP_PLUGIN_DIR', dirname(__FILE__) . '/wp-content/plugins' );
define( 'WP_PLUGIN_URL', 'https://{{getenv "ROOT_DOMAIN"}}/wp-content/plugins' );
define( 'PLUGINDIR', dirname(__FILE__) . '/wp-content/plugins' );
define( 'UPLOADS', 'wp-content/uploads' );

/**
 * Wordpress Cache & Optimisation
 * NGINX Cache, PageSpeed & Redis
 *
 */
define('WP_CACHE', true);
define('WP_REDIS_CLIENT', predis);
#define('WP_REDIS_DATABASE', getenv('REDIS_DB'));
# Cache salt not necessary as different database can be used for each site

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);
define('DISALLOW_FILE_EDIT', true);
define('WP_POST_REVISIONS', 5);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__));

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
