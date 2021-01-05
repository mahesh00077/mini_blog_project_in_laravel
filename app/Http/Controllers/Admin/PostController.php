<?php

namespace App\Http\Controllers\Admin;



use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\Post;
use App\Model\admin\Images;
use App\Model\admin\Category_Posts;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckSession');
        $this->middleware('CheckMenuPost');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->session()->get('UROLE') == '1') {
            $postDetails = DB::table('posts')
                ->select('posts.id', 'posts.title', 'posts.status', 'posts.subtitle', 'posts.slug', 'posts.body', 'posts.created_at', 'images.id as img_id', 'images.image_path', 'categories.name as cat_name', 'category_posts.id as cp_id')
                ->leftjoin('images', 'posts.id', '=', 'images.post_id')
                ->leftjoin('category_posts', 'posts.id', '=', 'category_posts.post_id')
                ->leftjoin('categories', 'category_posts.category_id', '=', 'categories.id')
                ->orderBy('posts.id', 'desc')
                ->paginate(5);
        } else {
            $postDetails = DB::table('posts')
                ->select('posts.id', 'posts.title', 'posts.status', 'posts.subtitle', 'posts.slug', 'posts.body', 'posts.created_at', 'images.id as img_id', 'images.image_path', 'categories.name as cat_name', 'category_posts.id as cp_id')
                ->leftjoin('images', 'posts.id', '=', 'images.post_id')
                ->leftjoin('category_posts', 'posts.id', '=', 'category_posts.post_id')
                ->leftjoin('categories', 'category_posts.category_id', '=', 'categories.id')
                ->orderBy('posts.id', 'desc')
                ->where('posted_by', $request->session()->get('UID'))
                ->paginate(5);
        }
        // dd($postDetails);
        return view('admin_panel.master.post_show', compact('postDetails'));
        // return view('admin_panel.master.post');
    }
    public function index1($id = null)
    {
        //
        if (!empty($id)) {
            $editPostDetails = DB::table('posts')
                ->select('posts.id', 'posts.title', 'posts.status', 'posts.subtitle', 'posts.slug', 'posts.body', 'posts.created_at', 'images.id as img_id', 'images.image_path')
                ->leftjoin('images', 'posts.id', '=', 'images.post_id')
                ->where('posts.id', $id)
                ->get();
            $editPostDetails = collect($editPostDetails)->map(function ($x) {
                return (array) $x;
            })->toArray();
            $editPostDetails = $editPostDetails[0];
            // dd($editPostDetails);
        }
        $postDetails = DB::table('posts')
            ->select('posts.id', 'posts.title', 'posts.status', 'posts.subtitle', 'posts.slug', 'posts.body', 'posts.created_at', 'images.id as img_id', 'images.image_path')
            ->leftjoin('images', 'posts.id', '=', 'images.post_id')
            ->paginate(5);
        // dd($postDetails);
        return view('admin_panel.master.post', compact('editPostDetails', 'postDetails'));
        // return view('admin_panel.master.post');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_update(Request $request)
    {
        //
        // var_dump(!empty($request->status) ? '1' : '0');
        // dd($request->all());

        if (empty($request->TXTID)) {
            // echo "if";
            // img code
            $path = public_path() . '/images';
            // create new directory for uploading image if doesn't exist
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $image = $request->file('img_upload');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            // $image->move(public_path('images'), $new_name);
            if ($image->move($path, $new_name)) {
                //adding data in post tbl  
                $post['title'] = $request->post_title;
                $post['subtitle'] = $request->post_sub_title;
                $post['slug'] = $request->slug;
                $post['status'] = !empty($request->status) ? '1' : '0';
                $post['body'] = $request->body;
                $post['posted_by'] = $request->session()->get('UID');
                $post['created_at'] = date('Y-m-d H:i:s');
                $post['updated_at'] = null;
                $result = Post::create($post);
                //adding data in cat tbl
                $cat = new Category_Posts();
                $cat->post_id = $result->id;
                $cat->category_id = $request->category;
                $cat->save();
                //adding data in img tbl  
                $img = new Images();
                $img->post_id = $result->id;
                $img->image_path = $new_name;
                $img->added_by = $request->session()->get('UID');
                $d_result = $img->save();
            }

            if ($d_result) {
                return redirect('admin/post')
                    ->with('success', 'Added  successfully!');
            } else {
                return redirect('admin/post')
                    ->with('success', 'Failed to add category!');
            }
        } else {
            //updating data in post tbl  
            $post = Post::find($request->TXTID);
            $post->title = $request->post_title;
            $post->subtitle = $request->post_sub_title;
            $post->slug = $request->slug;
            $post->status = !empty($request->status) ? '1' : '0';
            $post->body = $request->body;
            $post->posted_by = $request->session()->get('UID');
            $post->created_at = null;
            $post->updated_at = date('Y-m-d H:i:s');
            $result = $post->update();
            //updating data in category_post tbl  
            DB::table('category_posts')
                ->where('post_id', $request->TXTID)
                ->update(['category_id' => $request->category]);
            //updating data in img tbl
            if (!empty($request->file('img_upload'))) {

                $path1 = public_path() . '/images/' . $request->old_img_path;
                if (file_exists($path1)) {
                    unlink($path1);
                    $path = public_path() . '/images';
                    // create new directory for uploading image if doesn't exist
                    if (!file_exists($path)) {
                        mkdir($path, 0777, true);
                    }
                    $image = $request->file('img_upload');
                    $new_name = rand() . '.' . $image->getClientOriginalExtension();
                    if ($image->move($path, $new_name)) {
                        // $img = new Images();
                        $img = Images::find($request->img_idd);
                        // $img->post_id = $result->id;
                        $img->image_path = $new_name;
                        // $img->added_by = $request->session()->get('UID');
                        $d_result = $img->update();
                    }
                } else {
                    return redirect('admin/post')
                        ->with('error', 'something wrong please again later!');
                }
            }
            if ($result) {
                return redirect('admin/post')
                    ->with('success', 'record updated successfully!');
            } else {
                return redirect('admin/post')
                    ->with('error', 'Failed to update record!');
            }
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null)
    {
        //
        if (!empty($id)) {
            $editPostDetails = DB::table('posts')
                ->select('posts.id', 'posts.title', 'posts.status', 'posts.subtitle', 'posts.slug', 'posts.body', 'posts.created_at', 'images.id as img_id', 'images.image_path', 'categories.id as cat_id')
                ->leftjoin('images', 'posts.id', '=', 'images.post_id')
                ->leftjoin('category_posts', 'posts.id', '=', 'category_posts.post_id')
                ->leftjoin('categories', 'category_posts.category_id', '=', 'categories.id')
                ->where('posts.id', $id)
                ->get();
            $editPostDetails = collect($editPostDetails)->map(function ($x) {
                return (array) $x;
            })->toArray();
            $editPostDetails = $editPostDetails[0];
            // dd($editPostDetails);
        }
        $category_data = DB::table('categories')
            ->select('id as cat_id', 'name')
            ->get();
        $tag_data = DB::table('tags')
            ->select('id as tag_id', 'name')
            ->get();

        return view('admin_panel.master.post', compact('editPostDetails', 'tag_data', 'category_data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post_id, $cp_id, $img_id, $image_path)
    {
        //
        // echo $post_id . " " . $img_id . " " . $image_path;
        $path = public_path() . '/images/' . $image_path;
        if (file_exists($path)) {
            unlink($path);
            $cat = Post::find($post_id);
            $result = $cat->delete();
            $cp_idd = Category_Posts::find($cp_id);
            $result = $cp_idd->delete();
            $cat1 = Images::find($img_id);
            $result = $cat1->delete();

            if ($result) {
                return redirect('admin/post')
                    ->with('success', 'record deleted successfully!');
            } else {
                return redirect('admin/post')
                    ->with('error', 'Failed to delete record!');
            }
        } else {
            return redirect('admin/post')
                ->with('error', 'something wrong please again later!');
        }
    }
}