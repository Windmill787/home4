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
echo $obj1->getAll('University');
echo $obj1->getColumn('University')['un_name'];
require_once "main.html";