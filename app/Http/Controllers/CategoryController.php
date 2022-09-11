<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('preventBackHistory');
    }


    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ****************  ****************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    public function index()
    {

        /* get all categories with paginate */
        $getallcategories = Category::orderBy('created_at', 'DESC')->paginate('10');

        /* get all categories without paginate */
        $getcountallcategories = Category::all()->count();
        $getpaginatecountcategories = Category::paginate('10')->count();


        return view('categories.index')
            ->with('allcategories', $getallcategories)
            ->with('countallcategories', $getcountallcategories)
            ->with('paginatecountallcategories', $getpaginatecountcategories)
            ->with('category_query');
    }

    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* **************** create *******************/
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    public function create()
    {
        return view('categories.create')
            ->with('postquery');
    }

    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* **************** store **************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'link' => 'required|regex:/(^([a-zA-z]+)(\d+)?$)/u',
        ]);

        $newcategory = new Category();

        if (Category::where('name', $request->name)->exists()) {
            $request->session()->flash('category_exists', 'اسم الصنف موجود');
            return redirect()->back();
        } else {
            $newcategory->name = $request->input('name');
        }

        if (Category::where('link', $request->link)->exists()) {
            $request->session()->flash('category_url_exists', 'url موجود');
            return redirect()->back();
        } else {
            $newcategory->link = $request->input('link');
        }

        $saved = $newcategory->save();

        if ($saved) {
            $request->session()->flash('category_publish', ' تم نشر التصنيف');
        } else {
            $request->session()->flash('error_category_publish', 'فشل في اضافة التصنيف');
        }
        return redirect()->route('categories.index');
    }

    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* **************** destroy **************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    public function destroy($id)
    {
        $deletepage = Category::findOrFail($id);
        $deletepage->delete();
        $deletepage->posts()->delete();
    }

    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ****** delete mutiple categories ******** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    public function deletecategories(Request $request)
    {
        $idp = $request->idp;
        Category::whereIn('id', $idp)->delete();
        Post::whereIn('category_id', $idp)->delete();
    }


    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ****** delete mutiple categories ******** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    public function category_search(Request $request)
    {
        $query_word = $request->input('q');
        if ($query_word != NULL) {
            $search = Category::query()
                ->where('name', 'LIKE', "%{$query_word}%")
                ->orderBy('created_at', 'DESC')->paginate(2);
        } else {
            abort(404);
        }

        $getcountallcategories = Category::all()->count();

        return view('categories.category_search')
            ->with('all_search_res_cats', $search)
            ->with('countallcategories', $getcountallcategories)
            ->with('query_word', $query_word)
            ->with('category_query');
    }
}
