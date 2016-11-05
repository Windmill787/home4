<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 05.11.16
 * Time: 21:04
 */

require_once 'vendor/autoload.php';

$connect = new \Vendor\Dir\Repositories\Connector();
$connect->connectDatabase();

$obj1 = new \Vendor\Dir\Repositories\ResultRepository();
echo $obj1->getAll()['university_name'];


