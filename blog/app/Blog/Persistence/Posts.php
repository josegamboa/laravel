<?php
/**
 * @description Posts model for mapping all posts stored on MongoDB, this is the general object to access to the post
 * @author: Jose Gamboa
 * Date: 18/12/2016
 * Time: 2:23 PM
 */
namespace App\Blog\Persistence;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Posts extends Eloquent {
    /**
     * @description Defines the database engine
     * @var string
     */
    protected $connection = 'mongodb';
    /**
     * @description Name of the table that is being mapped
     * @var string
     */
    protected $collection = 'posts';

}