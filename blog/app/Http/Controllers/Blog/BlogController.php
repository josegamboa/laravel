<?php
/**
 * Blog home page controller, this class gets and customizes all information from the blog model and return to the view
 * User: Jose Gamboa
 * Date: 19/12/2016
 * Time: 8:05 PM
 */
namespace App\Http\Controllers\Blog;
use  App\Blog\Manager\BlogManager;
use App\Http\Controllers\Controller;
use League\Flysystem\Exception;

class BlogController extends  Controller
{
    /**
     * Returns an object with all posts information and the basic pagination object
     * @return App\Blog\Persistence\Posts
     * @throws Exception
     */
    public  function getAllPosts(){
        try{
            //Get and paginate all post saved in the database from the User object persistence
            $blogManager = new BlogManager();
            return $blogManager->getPaginatedPosts(3);
            return $posts;
        }catch(Exception $e){
            throw $e;
        }
    }
}