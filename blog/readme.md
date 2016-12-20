Laravel 5.3 Example
PHP 7
MYSQL
MongoDB
Composer package manager


Example: how to integrate Mysql and Mongo to create, update and delete post from the 
admin console.

Plase install the mongo db driver if it is not installed:
https://pecl.php.net/package/mongodb/1.2.2/windows

Import the databases mockdat example: blog/database/dumps

Change the databse credentials : config/database.php

 'mongodb' => [
            'driver'   => 'mongodb',
            'host'     => env('DB_HOST', 'localhost'),
            'port'     => 27017,
            'database'=>'blog',
        ],

        'mysql' => [
            'driver' => 'mysql',
            'host'      => 'localhost',
            'database'  => 'blogusers',
            'username'  => 'root',
            'password'  => 'root',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],

user: jose_9515@hotmail.com pass:123456 or jose9515@gmail.com pass:123456

