<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 07.11.16
 * Time: 13:57
 */

require_once 'vendor/autoload.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));
require_once (ROOT.'/components/Router.php');
include_once (ROOT.'/connector/Connector.php');

$router = new Router();
$router->run();
