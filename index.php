<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 05.11.16
 * Time: 21:04
 */

require_once 'vendor/autoload.php';

$connect = new \Vendor\Dir\Repositories\Connector();
$obj3 = new \Vendor\Dir\Repositories\ResultRepository();

ini_set('display_errors', 1);
error_reporting(E_ALL);

$obj1 = new \Vendor\Dir\Components\Router();
$obj1->run();

require_once "main.html";
