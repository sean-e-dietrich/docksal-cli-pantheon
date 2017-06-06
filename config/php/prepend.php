<?php

define('PANTHEON_INFRASTRUCTURE_ENVIRONMENT', 'live');
define('PANTHEON_SITE', getenv('PANTHEON_SITE'));
define('PANTHEON_SITE_ID', getenv('PANTHEON_SITE_ID'));
define('PANTHEON_ENVIRONMENT', getenv('PANTHEON_ENVIRONMENT'));
define('PANTHEON_BINDING', getenv('PANTHEON_BINDING'));

define('PANTHEON_DATABASE_HOST', getenv('PANTHEON_DATABASE_HOST'));
define('PANTHEON_DATABASE_PORT', getenv('PANTHEON_DATABASE_PORT'));
define('PANTHEON_DATABASE_USERNAME', getenv('PANTHEON_DATABASE_USERNAME'));
define('PANTHEON_DATABASE_PASSWORD', getenv('PANTHEON_DATABASE_PASSWORD'));
define('PANTHEON_DATABASE_DATABASE', getenv('PANTHEON_DATABASE_DATABASE'));

define('PANTHEON_REDIS_HOST', getenv('PANTHEON_REDIS_HOST'));
define('PANTHEON_REDIS_PORT', getenv('PANTHEON_REDIS_PORT'));
define('PANTHEON_REDIS_PASSWORD', getenv('PANTHEON_REDIS_PASSWORD'));
define('PANTHEON_VALHALLA_HOST', 'valhalla-02.production.cluster-01.us-central1.internal.k8s.pantheon.io');
define('PANTHEON_INDEX_HOST', getenv('PANTHEON_INDEX_HOST'));
define('PANTHEON_INDEX_PORT', getenv('PANTHEON_INDEX_PORT'));
define('DRUPAL_HASH_SALT', getenv('DRUPAL_HASH_SALT'));

# WordPress Specifc Constants
if (isset($_SERVER['SERVER_PORT']) && getenv('FRAMEWORK') == 'wordpress') {
  define('JETPACK_SIGNATURE__HTTP_PORT', $_SERVER['SERVER_PORT']);
  define('JETPACK_SIGNATURE__HTTPS_PORT', $_SERVER['SERVER_PORT']);
}

$_ENV['PANTHEON_SITE'] = PANTHEON_SITE;
$_ENV['PANTHEON_ENVIRONMENT'] = PANTHEON_ENVIRONMENT;
$_ENV['PANTHEON_BINDING'] = PANTHEON_BINDING;
$_ENV['DRUPAL_HASH_SALT'] = DRUPAL_HASH_SALT;
$_ENV['DB_HOST'] = PANTHEON_DATABASE_HOST;
$_ENV['DB_PORT'] = PANTHEON_DATABASE_PORT;
$_ENV['DB_USER'] = PANTHEON_DATABASE_USERNAME;
$_ENV['DB_PASSWORD'] = PANTHEON_DATABASE_PASSWORD;
$_ENV['DB_NAME'] = PANTHEON_DATABASE_DATABASE;
$_ENV['CACHE_HOST'] = PANTHEON_REDIS_HOST;
$_ENV['CACHE_PORT'] = PANTHEON_REDIS_PORT;
$_ENV['CACHE_PASSWORD'] = PANTHEON_REDIS_PASSWORD;
$_ENV['PANTHEON_INDEX_PORT'] = PANTHEON_INDEX_PORT;
$_ENV['PANTHEON_INDEX_HOST'] = PANTHEON_INDEX_HOST;

$_ENV['DOCROOT'] = getenv('DOCROOT');
$_ENV['FILEMOUNT'] = getenv('FILEMOUNT');
$_ENV['FRAMEWORK'] = getenv('FRAMEWORK');
$_ENV['AUTH_KEY'] = getenv('AUTH_KEY');
$_ENV['SECURE_AUTH_KEY'] = getenv('SECURE_AUTH_KEY');
$_ENV['LOGGED_IN_KEY'] = getenv('LOGGED_IN_KEY');
$_ENV['AUTH_SALT'] = getenv('AUTH_SALT');
$_ENV['SECURE_AUTH_SALT'] = getenv('SECURE_AUTH_SALT');
$_ENV['LOGGED_IN_SALT'] = getenv('LOGGED_IN_SALT');
$_ENV['NONCE_SALT'] = getenv('NONCE_SALT');

// System paths
putenv('PATH=/usr/local/bin:/bin:/usr/bin:/srv/bin');

$settings = array (
  'conf' => array (
    'pressflow_smart_start' => true,
    'pantheon_binding' => PANTHEON_BINDING,
    'pantheon_site_uuid' => PANTHEON_SITE_ID,
    'pantheon_environment' => PANTHEON_ENVIRONMENT,
    'pantheon_tier' => 'live',
    'pantheon_index_host' => PANTHEON_INDEX_HOST,
    'pantheon_index_port' => PANTHEON_INDEX_PORT,
    'redis_client_host' => PANTHEON_REDIS_HOST,
    'redis_client_port' => PANTHEON_REDIS_PORT,
    'redis_client_password' => PANTHEON_REDIS_PASSWORD,
    'file_public_path' => 'sites/default/files',
    'file_private_path' => 'sites/default/files/private',
    'file_directory_path' => 'sites/default/files',
    #'file_temporary_path' => '/tmp',
    #'file_directory_temp' => '/tmp',
    'css_gzip_compression' => false,
    'js_gzip_compression' => false,
    'page_compression' => false,
    'drupal_hash_salt' => DRUPAL_HASH_SALT,
    'config_directory_name' => 'config',
    'file_chmod_directory' => 0777,
    'file_chmod_file' => 0666
  ),
  'databases' => array (
    'default' => array (
      'default' => array (
        'host' => PANTHEON_DATABASE_HOST,
        'port' => PANTHEON_DATABASE_PORT,
        'username' => PANTHEON_DATABASE_USERNAME,
        'password' => PANTHEON_DATABASE_PASSWORD,
        'database' => PANTHEON_DATABASE_DATABASE,
        'driver' => 'mysql',
      ),
    ),
  ),
);

// Legacy Drupal Settings Block
$_SERVER['PRESSFLOW_SETTINGS'] = json_encode($settings);
