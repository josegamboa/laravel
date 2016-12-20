<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Exception;
use Illuminate\Support\Facades\Auth;
use App\Blog\Manager\BlogManager;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Returns an object with all posts information and the basic pagination object
     * @return App\Blog\Persistence\Posts
     * @throws Exception
     */
    public  function getAllPosts(){
        try{
            //Get and paginate all post saved in the database from the User object persistence
            $blogManager = new BlogManager();
            return $blogManager->getPaginatedPosts(6);
        }catch(Exception $e){
            throw $e;
        }
    }
    /**
     * Close the currently session id.
     *
     * @return \Illuminate\Http\Response
     */
    public function logOut()
    {
        // Get the currently authenticated user...
        Auth::logout();
        return redirect()->route('login');
    }
    /**
     * @Description Check the form information when inserting
     * @param Request $request
     */
    private function validateNewPost(Request $request){
        $this->validate($request, [
            'tittle' => 'required|max:255',
            'content' => 'required',
            'photo' => 'required|dimensions:min_width=100,min_height=300|mimes:jpeg,jpg,png',
        ]);
    }
    /**
     * @Description Check the form information when updating
     * @param Request $request
     */
    private function validateUpdatePost(Request $request){
        $this->validate($request, [
            'tittle' => 'required|max:255',
            'content' => 'required',
        ]);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function openBlogForm(Request $request)
    {
        $post=null;
        $blogManager = new BlogManager();
        $postInfo =null;
         if(isset($request->id))
         {
             $postInfo = $blogManager->findPost($request->id);
         }
        // Get the currently authenticated user...
        $user = Auth::user();
         return view('admin-blogform',["user"=>$user,"postInfo"=>$postInfo]);
    }
    /**
     * @description Add/Update the  post  in the database
     * @return Boolean
     * @param  Request $request
     * @param Boolean
     * @throws \Exception
     */
    public function addPost(Request $request)
    {
        $blogManager = new BlogManager();
        //check if the post exists, if the posts id exists
        // then update the post, if not then insert new one
        if(isset($request->postid) && !empty($request->postid))
        {
            $this->validateUpdatePost($request);
            $blogManager->updatePost($request);
        }else{
            $this->validateNewPost($request);
            $blogManager->createNewPost($request);
        }
        $user = Auth::user();
        //return view('admin-panel',['posts'=>$this->getAllPosts(),"user"=>$user]);
        return redirect()->route('login');
    }
    /**
     * @description Delete the post from the database by post ID
     * @return Boolean
     * @param Request $request
     * @param Boolean
     * @throws \Exception
     * **/
    public function deletePost(Request $request)
    {
        $blogManager = new BlogManager();
        //check if the post exists, if the posts id exists
        // then delete the post
        if(isset($request->postid) && !empty($request->postid)) {
            $blogManager->deletePost($request->postid);
        }
        $user = Auth::user();
        return view('admin-panel',['posts'=>$this->getAllPosts(),"user"=>$user]);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get the currently authenticated user...
        $user = Auth::user();
        return view('admin-panel',['posts'=>$this->getAllPosts(),"user"=>$user]);
    }
}
