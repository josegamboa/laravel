<?php
/**
 * @description Controls the files management process, upload and remove files in the serva
 * @author: Jose Gamboa
 * Date: 20/12/2016
 * Time: 2:23 PM
 */
namespace App\Blog\Manager;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
class BlogMediaManager
{
    /**
     * It Saves the exceptions saving and deleting
     * @var \Exception
     */
     private $exception=null;
    /**
     * Storage location path
     * @var null|string
     */
    private $storageLocation =null;
    /**
     * Return all exceptions during uploading and deleting photos
     * @return \Exception
     */
    public function getException(){
        return $this->exception;
    }
    /**
     * BlogMeadiaManager constructor.
     */
    public function __construct()
    {
        $this->storageLocation = base_path() . '/public/images/uploads/posts/';
    }
    /**
     * Get the extension of the photo
     * @param Request $request
     * @return String
     */
    public function getPhotoExtension(Request $request){
        if ($request->hasFile('photo')) {
            return $request->file('photo')->getClientOriginalExtension();
        }else{
            return false;
        }
    }
    /**
     * @description Upload a post photo to the server, it uses the id of the post to name the file.
     * @return Bollean $success
     * @param Request $request
     */
   public function uploadPostPhoto($postId,Request $request){
     try{
         if ($request->hasFile('photo')) {
             $photo = $postId.'.'. $request->file('photo')->getClientOriginalExtension();
             $destination =  $this->storageLocation;
             $request->file('photo')->move($destination, $photo);
             return true;
         }else{
             return false;
         }
     }catch(\Exception $e){
         $this->exception =$e;
       return false;
     }
   }
    /**
     * @description Delete the post's file fron the disk by postId.
     * @return Bollean $success
     * @param $postId $request
     */
    public function deletePostPhoto($postId){
        try{
             $photo = $postId;
             $destination =  $this->storageLocation;
             Storage::delete($destination);
             return true;
        }catch(\Exception $e){
            $this->exception =$e;
            return false;
        }
    }
}