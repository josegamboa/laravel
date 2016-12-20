<?php
/**
 * @description Represents the mapping all users stored on Mysql
 * @author: Jose Gamboa
 * Date: 18/12/2016
 * Time: 2:23 PM
 */
namespace App\Blog\Persistence;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\HybridRelations;
class Users extends Eloquent {
    use HybridRelations;
    /**
     * @description Defines the database engine
     * @var string
     */
    protected $connection = 'mysql';
    /**
     * @description Name of the table that is being mapped
     * @var string
     */
    protected $collection = 'users';

}