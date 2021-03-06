<?php
/**
 * Loader
 *
 * @package    Database Web API
 * @author     Marco Cesarato <cesarato.developer@gmail.com>
 * @copyright  Copyright (c) 2018
 * @license    http://opensource.org/licenses/gpl-3.0.html GNU Public License
 * @link       https://github.com/marcocesarato/Database-Web-API
 */

// PHP Errors

ini_set("zend.ze1_compatibility_mode", "0");
ini_set('memory_limit', '512M');

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0); // E_ALL

set_time_limit(3600);

define("__ROOT__", realpath(dirname(__FILE__) . '/..'));

include __ROOT__ . '/includes/compatibility.php';
include __ROOT__ . '/includes/functions.php';
if(!class_exists('PDO'))
	include __ROOT__ . '/includes/classes/PDO/PDO.class.php';
include __ROOT__ . '/includes/classes/db_errorparser.class.php';
include __ROOT__ . '/includes/classes/request.class.php';
include __ROOT__ . '/includes/classes/auth.class.php';
include __ROOT__ . '/includes/classes/api.class.php';
include __ROOT__ . '/config.php';

$datasets = unserialize(__DATASETS__);
foreach ($datasets as $db_name => $db_config) {
	register_db_api($db_name, $db_config);
}
