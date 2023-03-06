<?php
# Database Configuration
define( 'DB_NAME', 'wp_kpnwhewstg' );
define( 'DB_USER', 'kpnwhewstg' );
define( 'DB_PASSWORD', 'UBAxXCcSJyvVv229Qkt0' );
define( 'DB_HOST', '127.0.0.1:3306' );
define( 'DB_HOST_SLAVE', '127.0.0.1:3306' );
define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATE', '');
$table_prefix = 'kphew_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         's[T)}IJA(^hHNGCL{]Wfz+@ {h?WO>,odXt]Y2PK1u=uW8x#S~ SS~zVZW J7cFv');
define('SECURE_AUTH_KEY',  'S>cVwsN,D5LL*0z#3$S2+U3 C.v~DfMJ~*J5Lv|zrfe|H3&)cN]`IL(;cX-kcGIn');
define('LOGGED_IN_KEY',    'fKk >*wG?<y*0(<#Pvb9HEDI$v>ZXahu]Y{c3NeB&>&Ch7%d@ChWvfJx[Ac+mDPb');
define('NONCE_KEY',        'Vg-x<Btk7`GV>J;(GK>ujK}u4wp ;_U@Mum{(L]7n6Hw*{}e&:2T2$<R2b(i;/@{');
define('AUTH_SALT',        'xPUKMsB&*rveKZaY]DnS6H# ,2vztd2f|G>4V`k|(TBGS(,s$&;;2$&t9bg^S}xm');
define('SECURE_AUTH_SALT', '|Sap68RM)10&p^HQ~]DiAi7ldl@CzKjl@rl#l.tUd5.f>u|;p-_Ca64obJ7nKkM:');
define('LOGGED_IN_SALT',   '0m.H!L xU^o`L`IDM{]`=m97glh,E9t&}>9#< ,d^}LOkNgy||a,) gNklllvD?<');
define('NONCE_SALT',       '.ZV+y*{71$lQNC[O`-|(+]3cd/FxS+vlzq/4~!1-L<)ut|k/+a|+U|//1&n6Eu4~');

/* Settings for Post Revisions and Autosave */
define('AUTOSAVE_INTERVAL', 900 ); // seconds
define('WP_POST_REVISIONS', false);
/* Plugin: SEO Framework - Allows the Editor role access to SEO Framework settings */
define( 'THE_SEO_FRAMEWORK_SETTINGS_CAP', 'edit_pages' );

# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'kpnwhewstg' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

define( 'WPE_APIKEY', 'f8ab013efb66c5112d980c3c4c8b6fecb093ab39' );

define( 'WPE_CLUSTER_ID', '150329' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_LBMASTER_IP', '' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'kpnwhewstg.wpengine.com', 1 => 'kpnwhewstg.wpenginepowered.com', );

$wpe_varnish_servers=array ( 0 => 'pod-150329', );

$wpe_special_ips=array ( 0 => '35.237.109.17', );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( 'default' =>  array ( 0 => 'unix:///tmp/memcached.sock', ), );


# WP Engine ID


# WP Engine Settings







# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', __DIR__ . '/');
require_once(ABSPATH . 'wp-settings.php');















define( 'WPE_SFTP_ENDPOINT', '' );
