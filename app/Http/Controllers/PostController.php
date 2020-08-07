<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Category;
use Image;
use Session;
use Storage;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // create a variable and store all the blog posts in it from the database
        $posts = Post::orderBy('id','desc')->paginate(5);
        // return a view and pass in the above variable
        return view('posts/index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts/create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data
        $this->validate($request,array(
            'title' => 'required|max:50',
            'slug' => 'required|alpha_dash|min:3|max:255|unique:posts,slug',
            'category_id' => 'required|integer',
            'body' => 'required',
            'featured_image' => 'sometimes|image|mimes:jpeg,png'
        ));
        //store in the database
        
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = $request->body;
        $post->user_name = Auth::user()->name;

        //save image
        if ($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension(); 
            $location = public_path('images/' . $filename); 
            $post->image = $filename;
            $img = Image::make($image)->orientate();
            Image::make($img)->save($location);
        }
        
        // create a unique name that images won't conflict 
        $post->save();

        //flash暫存資料，更新即消失
        Session::flash('success','新增成功');

        //redirect to another page

        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts/show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post in the database and save as a var
        $post = Post::find($id);
        $categories = Category::all();
        $cats = array();
        foreach ($categories as $category){
            $cats [$category->id] = $category->name;
        }
        //return the view and pass in the var we previously created
        return view('posts/edit')->withPost($post)->withCategories($cats);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        //Validate the data
        $this->validate($request, array(
                'title' => 'required|max:255',
                'slug'  => "required|alpha_dash|min:3|max:255|unique:posts,slug,$id",
                'category_id' => 'required|integer',
                'body'  => 'required',
                'featured_image' => 'image'
            ));
        //Save the data to the database

        //find the specific post that users want to edit

        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = $request->input('body');
        
        if ($request->hasFile('featured_image')){
            // add the new photo
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension(); 
            $location = public_path('images/' . $filename);
            $img = Image::make($image)->orientate();
            Image::make($img)->save($location);
            
            $oldFilename = $post->image;
            //update the database
            $post->image = $filename;
            //delete the old photo
            Storage::delete($oldFilename);
        }

        $post->save();
        //set flash the data with success message
        Session::flash('success','更新成功');
        //redirect with flash data to posts.show
        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // alert()->warning('確定要刪除文章?','要想清楚喔~~~~')->showConfirmButton('確認刪除','#3085d6')->showCancelButton('取消', '#aaa');
        $post = Post::find($id);
        $post->delete();
        Storage::delete($post->image);
        Session::flash('success','刪除成功!!!');
        return redirect()->route('posts.index');
        // return view('posts/show')->withPost($post);
    }
}

// echo '
//         <script type="text/javascript">

//         $(document).ready(function(){

//             swal({
//                 position: "top-end",
//                 type: "warning",
//                 title: "確定要刪除文章?",
//                 showConfirmButton: true,
//                 showCancelButton: true,
//             })
//         });

//         </script>
//     ';
