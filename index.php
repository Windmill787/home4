<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 05.11.16
 * Time: 21:04
 */

require_once 'vendor/autoload.php';

$connect = new \Vendor\Dir\Repositories\Connector();
$obj1 = new \Vendor\Dir\Repositories\ResultRepository();
require_once "main.html";
