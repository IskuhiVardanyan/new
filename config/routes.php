<?php
return array(
    // User control routes
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    // Admin control routes
    'newadmin'  => 'newadmin/index',
    'newadmin/register' => 'newadmin/register',
    'newadmin/login' => 'newadmin/login',
    'newadmin/logout' => 'newadmin/logout',
    // Tasks control routes:
    'tasks'  => 'task/index',
    'task/create' => 'task/create',
    'task/update/([0-9]+)' => 'task/update/$1',
    'task/delete/([0-9]+)' => 'task/delete/$1',
    'task/description/([0-9]+)' => 'task/description/$1',
    ''      => 'home/index'
);