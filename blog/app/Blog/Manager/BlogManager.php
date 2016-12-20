<?php
/**
 * @description Controls the  messages between the controller and persistence
 * @author: Jose Gamboa
 * Date: 20/12/2016
 * Time: 2:23 PM
 */
namespace App\Blog\Manager;
use Illuminate\Http\Request;
use  App\Blog\Persistence\Posts;
use Illuminate\Support\Facades\Auth;

class BlogManager
{
    /**
     * @description Create a new post in the database, return id if the new post
     * has been create, null or exception if something went wrong
     * @return String Id
     * @param Request $request
     * @throws \Exception
     */
    public function createNewPost(Request $request){
        try{
            $blogMediaManager = new BlogMediaManager();
            $user = Auth::user();
            $post = new Posts();
            $post->Tittle=$request->input('tittle');
            $post->Content=$request->input('content');;
            $post->Status=true;
            $post->TimeStamp=time();
            $post->IpAddress=$_SERVER['REMOTE_ADDR'];
            $post->PostedAt=date('Y-m-d H:i:s');
            $post->PhotoExtension=$blogMediaManager->getPhotoExtension($request);
            //set user information
            $UserInfo= new \stdClass();
            $UserInfo->UserId =$user->id;
            $UserInfo->UserType ="Admin";
            $post->User=$UserInfo;
            //try to create the new post
            $post->save();
            //Save the post's photo
            $blogMediaManager->uploadPostPhoto($post->id,$request);
            return $post->id;
        }catch(\Exception $e){
            throw $e;
        }
    }
    /**
     * @description Update post in the database, return true if the new post
     * has been create, false or exception if something went wrong
     * @return String Id
     * @param Boolean $tittle Post tittle
     * @param String $content
     * @param File $photo
     * @throws \Exception
     */
    public function updatePost(Request $request){
        try{

            $post = $this->findPost($request->postid);
            //check if the post is exists in the database, if yes, then update the
            // post information
            if($post!=null){
                $post->Tittle=$request->input('tittle');
                $post->Content=$request->input('content');

                $blogMediaManager = new BlogMediaManager();
                //Update the post's photo if it is comming in the request
                $blogMediaManager->uploadPostPhoto($request->postid,$request);
                //try to update the post information
                $ext = $blogMediaManager->getPhotoExtension($request);
                if($ext!=null){
                    $post->PhotoExtension=$ext;
                }

                $post->save();
                return true;
            }else{
                return false;
            }
        }catch(\Exception $e){
            throw $e;
        }
    }
    /**
     * @description Get the post information by post Id from the database, is the record exist it returns
     * the posts information, if not returns null
     * @return  App\Blog\Post
     * @param String $id
     * @throws \Exception
     */
    public function findPost($id){
        try{
            $post = Posts::find($id);
            //Check if the post exists
            if(isset($post->id) && isset($post->Tittle) ){
               return  $post;
            }else{
               return NULL;
            }
        }catch(\Exception $e){
            throw $e;
        }
    }
    /**
     * @description Delete the post from the database by post ID
     * @return Posts
     * @param String $id
     * @param Boolean
     * @throws \Exception
     */
    public function deletePost($id){
        try{
            //Check if the post exists
            $post = $this->findPost($id);
            if($post!=null){
                $post->delete();
                return true;
            }else{
                return false;
            }
        }catch(\Exception $e){
            throw $e;
        }
    }
    /**
     * @description Get and paginate all post saved in the database from the User object persistence
     * @return Object Posts
     * @param Int $numOfPages
     * @throws \Exception
     */
    public function getPaginatedPosts($numOfPages){
        try{
            return Posts::paginate($numOfPages);
        }catch(\Exception $e){
            throw $e;
        }
    }


}