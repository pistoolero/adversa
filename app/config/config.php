<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2016-12-15
 * Time: 19:04
 */

setlocale( LC_ALL, array( 'pl_PL', 'pl_PL.ISO8859-2', 'polish_pol' ) );
/*
 *
 * AUTOLOADER KLAS
 *
 */

// First, define your auto-load function.
function LGAutoload(string $className) {
    include_once(CORE_PATH .$className . '.php');
}

// Next, register it with PHP.
spl_autoload_register('LGAutoload');
/*
 *
 * STALE DOTYCZACE SCIEZEK
 *
 */
define('APP_PATH', $_SERVER['DOCUMENT_ROOT'].'/app/');
define('CORE_PATH', APP_PATH.'core/');
define('CONFIG_PATH', APP_PATH.'config/');
define('TEMPLATES_PATH', APP_PATH.'templates/');
define('VIEWS_PATH', APP_PATH.'views/');
define('CACHE_PATH', $_SERVER['DOCUMENT_ROOT'].'/cache/');
define('STORAGE_PATH', $_SERVER['DOCUMENT_ROOT'].'/storage/');
define('HELPERS_PATH', CORE_PATH.'helpers/');
define('EXTERNAL_PATH',CORE_PATH.'external/');
define('HTML_PATH', '/public_html/');
define('CSS',HTML_PATH.'css/');
define('FONTS',HTML_PATH.'fonts/');
define('JS',HTML_PATH.'js/');
define('UPLOAD',HTML_PATH.'upload/');
define('IMAGES',HTML_PATH.'images/');

/*
 *
 *
 * INNE STALE
 *
 *
 */

define('DATE_FORMAT', 'd.m.Y H:i');
define('DATE_FORMAT_SH', 'd.m.Y');
define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);
define('TB', 1099511627776);
define('SteamAPI', "2EEA0A6A937F4F5436B89D31D325CC76");
define('SHAKey',"#%tewvf32q532SDAFASP@3ES");
define('TwitchClientID','fztwtpemvg9h449f6wbz232vjfgz4j0');
define('TwitchClientSecret','4juk1gwci1ha8kgrk3gl8gix4lczesm');
define('ErrorCode',http_response_code());
/*
 *
 *
 * CONFIG VARIABLES
 *
 *
 */
$_ENV['db_name'] = Site::$db_name ?? 'adversa';
$_ENV['db_host'] = Site::$db_host ?? 'localhost';
$_ENV['db_user'] = Site::$db_user ?? 'root';
$_ENV['db_pass'] = Site::$db_pass ?? '';
$config = [];
$config['app_name'] = null;
$config['db_name'] = $_ENV['db_name'] ?? 'league';
$config['db_host'] = $_ENV['db_host'] ?? 'localhost';
$config['db_user'] = $_ENV['db_user'] ?? 'root';
$config['db_pass'] = $_ENV['db_pass'] ?? '';

