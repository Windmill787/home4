<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 07.11.16
 * Time: 1:26
 */

return array(
    'student/edit/([0-9]+)' => 'student/edit/$1',
    'student/delete/([0-9]+)' => 'student/delete/$1',
    'student/add' => 'student/add',
    'student' => 'student/index',

    'university/edit/([0-9]+)' => 'university/edit/$1',
    'university/delete/([0-9]+)' => 'university/delete/$1',
    'university/add' => 'university/add',
    'university' => 'university/index',

    'department/edit/([0-9]+)' => 'department/edit/$1',
    'department/delete/([0-9]+)' => 'department/delete/$1',
    'department/add' => 'department/add',
    'department' => 'department/index',

    'homework/edit/([0-9]+)' => 'homework/edit/$1',
    'homework/delete/([0-9]+)' => 'homework/delete/$1',
    'homework/add' => 'homework/add',
    'homework' => 'homework/index',
);