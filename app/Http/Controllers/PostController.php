<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function session($key = null, $default = null)
    {
        if (is_null($key)) {
            return app('session');
        }

        if (is_array($key)) {
            return app('session')->put($key);
        }

        return app('session')->get($key, $default);
    }

    public function __construct()
    {
        $this->middleware('preventBackHistory');
    }

    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ****************index ******************* */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    public function index()
    {
        /* get all posts with paginate */
        $getallposts = Post::orderBy('created_at', 'DESC')->paginate('10');

        /* get all posts without paginate */
        $getcountallpost = Post::all()->count();
        $getpaginatecountposts = Post::paginate('15')->count();

        /* count published and drafted */
        $publishedanddraft = Post::all();
        $postbyoneorone = $publishedanddraft->where('publishandNot', '=', '1')->count();
        $postbyoneorzero = $publishedanddraft->where('publishandNot', '=', '0')->count();
        /* / count published and drafted */

        return view('posts.index')
            ->with('allposts', $getallposts)
            ->with('countallposts', $getcountallpost)
            ->with('paginatecountallposts', $getpaginatecountposts)
            ->with('postbyoneoronee', $postbyoneorone)
            ->with('postbyoneorzeroo', $postbyoneorzero)
            ->with('postquery');
    }

    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* **************** create ***************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    public function create()
    {
        return view('posts.create')
            ->with('allcategories', Category::all())
            ->with('postquery');
    }

    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* **************** store ****************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'required|regex:/(^([a-zA-z]+)(\d+)?$)/u',
        ]);
        $newpost = new Post();

        $newpost->title = $request->input('title');
        $newpost->content = $request->input('content');
        $newpost->description = $request->input('description');
        $newpost->category_id = $request->input('category_id');
        $newpost->publishandNot = $request->input('publishandNot');
        $newpost->user_id = '1';
        $newpost->slug = Str::slug($request->title) . time();

        /* slug */
        if ($request->input('slug') != NULL) {
            if (Post::where('slug', $request->slug)->exists()) {
                $newpost->slug = $request->input('slug') . time();
            } else {
                $newpost->slug = $request->input('slug');
            }
        } elseif ($request->input('slug') == NULL && $request->input('title') != NULL) {
            if (Post::where('title', $request->title)->exists()) {
                $newpost->slug = Str::slug($request->title) . time();
            } else {
                $newpost->slug = Str::slug($request->title);
            }
        } else {
            $newpost->slug = 'blogspot' . time();
        }
        /* end slug */

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . $file->getClientOriginalName();
            $file->move('uploads/posts/', $filename);
            $newpost->image = $filename;
        }

        if ($request->input('publishandNot') == '1') {
            $request->session()->flash('published_success', 'تم نشر المشاركة');
        } else if ($request->input('publishandNot') == '0') {
            $request->session()->flash('published_draft', 'تم حفظ المشاركة كمسودة');
        } else {
            $request->session()->flash('error_post', 'لم يتم إكمال العملية');
        }

        $newpost->save();


        return redirect()->route('posts.index');
    }

    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* **************** edit ******************* */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    public function edit($id)
    {
        /* get this post with id */
        $editingpost = Post::findOrFail($id);

        /* get all categories */
        $getcategories = Category::all();

        return view('posts.edit')
            ->with('editingpost', $editingpost)
            ->with('allcategories', $getcategories)
            ->with('postquery');
    }


    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* **************** update ***************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    public function update(Request $request, $id)
    {
        $editingpost = Post::findOrFail($id);
        $editingpost->title = $request->input('title');
        $editingpost->content = $request->input('content');
        $editingpost->description = $request->input('description');
        $editingpost->category_id = $request->input('category_id');
        $editingpost->publishandNot = $request->input('publishandNot');

        if ($request->hasFile('image')) {
            $destination = 'uploads/posts/' . $editingpost->image;
            if (File::exists($destination))
                File::delete($destination);
            $file = $request->file('image');
            $filename = time() . $file->getClientOriginalName();
            $file->move('uploads/posts/', $filename);
            $editingpost->image = $filename;
        }

        $editingpost->update();
        $request->session()->flash('updated_changed', 'تم حفظ التغييرات');
        return redirect()->back();
    }

    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* **************** post update ************ */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    public function postupdate(Request $request, $id)
    {
        $postupdate = Post::find($id);
        $postupdate->publishandNot = $request->input('updaterecord');

        if ($request->input('updaterecord') == '1') {
            $request->session()->flash('published_success', 'تم نشر المشاركة');
        } else if ($request->input('updaterecord') == '0') {
            $request->session()->flash('common_message_back_to_draft', 'عودة إلى المسودة');
        } else {
            $request->session()->flash('error_post', 'لم يتم إكمال العملية');
        }
        $postupdate->update();
        return redirect()->route('posts.index');
    }
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* **************** post destroy *********** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    public function destroy($id)
    {
        $deletepost = Post::findOrFail($id);
        $destination = 'uploads/posts/' . $deletepost->image;
        if (File::exists($destination))
            File::delete($destination);
        $deletepost->delete();
    }


    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* **************** delete posts *********** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */

    public function deleteposts(Request $request)
    {
        $idp = $request->idp;
        Post::whereIn('id', $idp)->delete();
    }
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* *********** posts by category *********** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    public function category($link)
    {
        $categoryid = Category::where('link', $link)->first();
        /*get all posts without paginate*/
        $getcountallpost = Post::whereIn('category_id', $categoryid)->count();
        $getpaginatecountposts = Post::paginate('15')->count();

        /*count published and drafted*/
        $publishedanddraft = Post::whereIn('category_id', $categoryid)->get();
        $postbyoneorone = $publishedanddraft->where('publishandNot', '=', '1')->count();
        $postbyoneorzero = $publishedanddraft->where('publishandNot', '=', '0')->count();

        return view('posts.category')
            ->with('category', $categoryid)
            ->with('allposts', $getpaginatecountposts)
            ->with('countallposts', $getcountallpost)
            ->with('postbyoneoronee', $postbyoneorone)
            ->with('postbyoneorzeroo', $postbyoneorzero)
            ->with('postquery');
    }



    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ****** show posts by published ********** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    public function publishedposts()
    {
        $published = Post::where('publishandNot', '=', '1')->paginate('15');

        /* get all posts without paginate */
        $getcountallpost = Post::all()->count();

        /* count published and drafted */
        $publishedanddraft = Post::all();
        $postbyoneorone = $publishedanddraft->where('publishandNot', '=', '1')->count();
        $postbyoneorzero = $publishedanddraft->where('publishandNot', '=', '0')->count();
        /* /count published and drafted */

        return view('posts.published')
            ->with('published', $published)
            ->with('countallposts', $getcountallpost)
            ->with('postbyoneoronee', $postbyoneorone)
            ->with('postbyoneorzeroo', $postbyoneorzero)
            ->with('postquery');
    }


    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ************* posts by draft ************ */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    public function draftposts()
    {
        $drafts = Post::where('publishandNot', '=', '0')->paginate('15');

        /* get all posts without paginate */
        $getcountallpost = Post::all()->count();

        /* count published and drafted */
        $publishedanddraft = Post::all();
        $postbyoneorone = $publishedanddraft->where('publishandNot', '=', '1')->count();
        $postbyoneorzero = $publishedanddraft->where('publishandNot', '=', '0')->count();
        /* /count published and drafted */


        return view('posts.draft')
            ->with('drafts', $drafts)
            ->with('countallposts', $getcountallpost)
            ->with('postbyoneoronee', $postbyoneorone)
            ->with('postbyoneorzeroo', $postbyoneorzero)
            ->with('postquery');
    }


    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* **************** search *********** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    public function search(Request $request)
    {
        $requestquery = $request->input('q');

        /* get all posts without paginate */
        $getcountallpost = Post::all()->count();

        /* count published and drafted */
        $publishedanddraft = Post::all();
        $postbyoneorone = $publishedanddraft->where('publishandNot', '=', '1')->count();
        $postbyoneorzero = $publishedanddraft->where('publishandNot', '=', '0')->count();
        /* / count published and drafted */

        if ($requestquery != NULL) {
            $search = Post::query()
                ->where('title', 'LIKE', "%{$requestquery}%")
                ->orderBy('created_at', 'DESC')->paginate('15');
        } else {
            abort(404);
        }
        return view('posts.postssearch')
            ->with('allpostssearch', $search)
            ->with('countallposts', $getcountallpost)
            ->with('postbyoneoronee', $postbyoneorone)
            ->with('postbyoneorzeroo', $postbyoneorzero)
            ->with('postquery', $requestquery);
    }
}
