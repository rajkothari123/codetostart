<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Blog;

use App\Category;

use App\Subcategory;

use App\Photo;

use Session;

use Cookie;

use DB;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;

use App\User;

class BlogController extends Controller
{

	public function __construct(){
        $this->middleware('both',['only'=>['create','store','edit','update']]);
		$this->middleware('admin',['only'=>['publish','destroy','bin','restore','destroyBlog','draft']]);
	}


    public function index(Request $request){        
        $blog_count=Blog::where('status',1)->count();
        $blogs = Blog::where(function($query) use ($request) {
            if (($term = $request->get('term'))) {
                $query->orWhere('title', 'like', '%' . $term . '%');
            }
        })
        ->orderBy("id", "desc")
        ->whereStatus(1)
        ->paginate(2);

        $category=Category::pluck('name','id');     

        $blog_views = DB::table('blogs')->sum('views');
        return view('blog.index',compact('blogs','blog_count','category','blog_views'));
    	
    }




    public function publish(Request $request,$id){

        $input=$request->all();
        $blog=Blog::findorFail($id);
        $input['status']=1;
        $blog->update($input);
        return redirect('blog');
        
    }


    public function draft(){        
        $blogs=Blog::where('status',0)->latest()->get();
        return view('blog.draft',compact('blogs'));
    }


    public function create(){

    	$category=Category::pluck('name','id');    	
    	return view('blog.create',compact('category'));
    }


    public function store(Request $request){
        $rules=[
        'title' => ['required','min:10','max:40'],
        'body' => ['required'],
        'photo_id' =>['mimes:jpeg,jpg,png'],
        
        ];

        $message=[

        'photo_id.mimes' =>'Your Image Must Be In jpeg,jpg or png',
        'title.required' => 'Please Enter Title',
        'title.min' => 'Title is a bit short bro',

        ];

        $this->validate($request,$rules,$message);


    	$input=$request->all();
    	$input['slug']=str_slug($request->title);
    	$input['meta_title']=$request->title;
        $input['user_id']=Auth::user()->id;

    	if($file=$request->file('photo_id')){
    	$name=$file->getClientOriginalName();
    	$file->move('images',$name);
    	$photo=Photo::create(['photo'=>$name,'name'=>$name]);
    	$input['photo_id']=$photo->id;

    	}


    	$blog=Blog::create($input);
    	if($categoryIds=$request->category_id){
    		$blog->category()->sync($categoryIds);
    	}


        $users=User::all();
        foreach ($users as $user) {

            Mail::send('emails.newblog',['blog'=>$blog,'user'=>$user],function($message) use ($user){
            $message->to($user->email)->from('raj.kothari90@gmail.com','Raj Kothari')->subject('A New Blog Has been posted');    
            });
            
        }
        /*Session::flash('flash_message','You have just created a blog !!');*/

        notify()->flash('New Blog Created','success',['timer'=>2000]);

    	return redirect('blog');
    }



    public function show($slug){
    	
    	$blog = Blog::whereSlug($slug)->first();

        $blog->views=$blog->views + 1;

        DB::table('blogs')
        ->where('slug', $slug)
        ->update(['views' => $blog->views]);


        



    	return view('blog.show',compact('blog'));
    }


    public function edit($id){
    	$category=Category::pluck('name','id');    	
    	$blog = Blog::findorFail($id);
    	return view('blog.edit',compact('blog','category'));
    }




    public function update(Request $request,$id){
    	
    	$input=$request->all();
    	$blog=Blog::findorFail($id);


    	if($file=$request->file('photo_id')){

    	if($blog->photo){
    		unlink('images/' .$blog->photo->photo);
    		$blog->photo->delete('photo');
    	}	


    	$name=$file->getClientOriginalName();
    	$file->move('images',$name);
    	$photo=Photo::create(['photo'=>$name,'name'=>$name]);
    	$input['photo_id']=$photo->id;
    }

    	$blog->update($input);
    	if($categoryIds=$request->category_id){
    		$blog->category()->sync($categoryIds);
    	}

        notify()->flash('Blog Updated','success',['timer'=>2000]);
    	return redirect('blog');
    }


    public function destroy(Request $request,$id){
    	
    	$blog=Blog::findorFail($id);

    	//For removing rows from the database table blog_category
    	$categoryIds=$request->category_id;
    	$blog->category()->detach($categoryIds);

    	
    	$blog->delete($request->all());
    	return redirect('/blog/bin');
    }

    public function bin(){

    	$deletedBlogs=Blog::onlyTrashed()->get();
    	return view('blog.bin',compact('deletedBlogs'));
    }


    public function restore($id){

    	$restoredBlogs=Blog::onlyTrashed()->findorFail($id);
    	$restoredBlogs->restore($restoredBlogs);
    	return redirect('/blog');
    }

    public function destroyBlog($id){
    	$destroyBlog=Blog::onlyTrashed()->findorFail($id);


    	if($destroyBlog->photo){
    		unlink('images/' .$destroyBlog->photo->photo);
    		$destroyBlog->photo()->delete('photo');
    	}	

    	$destroyBlog->forceDelete();
    	return redirect('/blog/bin');
    }




}
