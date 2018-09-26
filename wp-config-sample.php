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
define('DB_NAME', 'fyt');

/** MySQL database username */
define('DB_USER', '');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', '217.70.189.96');

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
define('AUTH_KEY',         '');
define('SECURE_AUTH_KEY',  '');
define('LOGGED_IN_KEY',    '');
define('NONCE_KEY',        '');
define('AUTH_SALT',        '');
define('SECURE_AUTH_SALT', '');
define('LOGGED_IN_SALT',   '');
define('NONCE_SALT',       '');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
 $table_prefix  = 'wp_';

 /**
  * Pour les développeurs : le mode déboguage de WordPress.
  *
  * En passant la valeur suivante à "true", vous activez l’affichage des
  * notifications d’erreurs pendant vos essais.
  * Il est fortemment recommandé que les développeurs d’extensions et
  * de thèmes se servent de WP_DEBUG dans leur environnement de
  * développement.
  *
  * Pour plus d’information sur les autres constantes qui peuvent être utilisées
  * pour le déboguage, rendez-vous sur le Codex.
  *
  * @link https://codex.wordpress.org/Debugging_in_WordPress
  */
  define('WP_DEBUG', true);

  // Si j'active le débug
  if (WP_DEBUG) {

 	 // Ajout du fichier de debug.log
 	 define('WP_DEBUG_LOG', true);

 	 // Affichage des erreurs à l'écran
 	 define('WP_DEBUG_DISPLAY', true);

 	 // Désactiver l'installation de plugins : NON
 	 define('DISALLOW_FILE_MODS', false);

 	 // Désactivation des révision en débug
 	 define( 'WP_POST_REVISIONS', false );

 	 // Désactivation du cache
 	 define('WP_CACHE', false);

  // SI je n'active pas le débug
  } else {

 	 // Non, affichage des erreurs à l'écran
 	 define('WP_DEBUG_DISPLAY', false);

 	 // Désactivation l'installation de plugins
 	 define('DISALLOW_FILE_MODS', true);

 	 // Activation des révisions pour un maximum de 5
 	 define('WP_POST_REVISIONS', 5 );

 	 // Désactivation du cache
 	 define('WP_CACHE', true);
  }

  define( 'DISALLOW_FILE_EDIT', true );

  define('EMPTY_TRASH_DAYS', 15 );  // 15 days

  define('FS_METHOD', 'direct');


 define( 'WP_CONTENT_URL', 'http://localhost/projet_fusion/find-your-team/content' );
 define( 'WP_CONTENT_DIR', dirname( ABSPATH ) . '/content' );

 define('WP_HOME','http://localhost/projet_fusion/find-your-team/');
 define('WP_SITEURL','http://localhost/projet_fusion/find-your-team/wp/');

 /* C’est tout, ne touchez pas à ce qui suit ! */

 /** Chemin absolu vers le dossier de WordPress. */
 if ( !defined('ABSPATH') )
 	define('ABSPATH', dirname(__FILE__) . '/');

 /** Réglage des variables de WordPress et de ses fichiers inclus. */
 require_once(ABSPATH . 'wp-settings.php');
