<?php
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
class PageController extends Controller
{
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
        /* get all pages with paginate */
        $getallpages = Page::orderBy('created_at', 'DESC')->paginate('3');
        /* get all pages without paginate */
        $getcountallpage = Page::all()->count();
        $getpaginatecountpages = Page::paginate('2')->count();
        /* count published and drafted */
        $publishedanddraft = Page::all();
        $pagebyoneorone = $publishedanddraft->where('publishandNot', '=', '1')->count();
        $pagebyoneorzero = $publishedanddraft->where('publishandNot', '=', '0')->count();
        /* / count published and drafted */
        return view('pages.index')
            ->with('allpages', $getallpages)
            ->with('countallpages', $getcountallpage)
            ->with('paginatecountallpages', $getpaginatecountpages)
            ->with('pagebyoneoronee', $pagebyoneorone)
            ->with('pagebyoneorzeroo', $pagebyoneorzero)
            ->with('pagequery');
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
        return view('pages.create')
            ->with('allcategories', Category::all())
            ->with('pagequery');
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
        $newpage = new Page();
        $newpage->title = $request->input('title');
        $newpage->content = $request->input('content');
        $newpage->description = $request->input('description');
        $newpage->user_id = '1';
        $newpage->slug = Str::slug($request->title) . time();
        /* slug */
        if ($request->input('slug') != NULL) {
            if (Page::where('slug', $request->slug)->exists()) {
                $newpage->slug = $request->input('slug') . time();
            } else {
                $newpage->slug = $request->input('slug');
            }
        } elseif ($request->input('slug') == NULL && $request->input('title') != NULL) {
            if (Page::where('title', $request->title)->exists()) {
                $newpage->slug = Str::slug($request->title) . time();
            } else {
                $newpage->slug = Str::slug($request->title);
            }
        } else {
            $newpage->slug = 'blogspot' . time();
        }
        /* end slug */
        $newpage->publishandNot = $request->input('publishandNot');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . $file->getClientOriginalName();
            $file->move('uploads/pages/', $filename);
            $newpage->image = $filename;
        }
        $newpage->save();
        if ($request->input('publishandNot') == '1') {
            $request->session()->flash('page_added', 'تم نشر الصفحة');
        } else if ($request->input('publishandNot') == '0') {
            $request->session()->flash('page_as_draft', 'تم حفظ ألصفحة كمسودة');
        } else {
            $request->session()->flash('error_post', 'لم يتم إكمال العملية');
        }
        if ($newpage) {
            $request->session()->flash('page_added', 'تم نشر الصفحة');
            return redirect()->route('pages.index');
        } else {
            $request->session()->flash('error_post', 'لم يتم إكمال العملية');
        }
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
        /* get this page with id */
        $editingpage = Page::findOrFail($id);
        /* get all categories */
        $getcategories = Category::all();
        return view('pages.edit')
            ->with('editingpage', $editingpage)
            ->with('allcategories', $getcategories)
            ->with('pagequery');
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
        $editingpage = Page::findOrFail($id);
        $editingpage->title = $request->input('title');
        $editingpage->content = $request->input('content');
        $editingpage->description = $request->input('description');
        $editingpage->publishandNot = $request->input('publishandNot');
        if ($request->hasFile('image')) {
            $destination = 'uploads/pages/' . $editingpage->image;
            if (File::exists($destination))
                File::delete($destination);
            $file = $request->file('image');
            $filename = time() . $file->getClientOriginalName();
            $file->move('uploads/pages/', $filename);
            $editingpage->image = $filename;
        }
        $editingpage->update();
        $request->session()->flash('updated_changed', 'تم حفظ التغييرات');
        return redirect()->back();
    }
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* **************** page update ************ */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    public function pageupdate(Request $request, $id)
    {
        $pageupdate = Page::find($id);
        $pageupdate->publishandNot = $request->input('updaterecord');
        $pageupdate->update();
        if ($request->input('updaterecord') == '1') {
            return redirect()->back()->with('page_added', 'تم نشر الصفحة');
            $request->session()->flash('page_added', 'تم نشر الصفحة');
        } else {
            $request->session()->flash('common_message_back_to_draft', 'العودة إلى المسودة');
            return redirect()->back();
        }
    }
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* **************** page destroy *********** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    public function destroy($id)
    {
        $deletepage = Page::findOrFail($id);
        $destination = 'uploads/pages/' . $deletepage->image;
        if (File::exists($destination))
            File::delete($destination);
        $deletepage->delete();
    }
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* **************** delete pages *********** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    public function deletepages(Request $request)
    {
        $idp = $request->idp;
        Page::whereIn('id', $idp)->delete();
    }
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ****** show pages by published ********** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    public function publishedpages()
    {
        $published = Page::where('publishandNot', '=', '1')->paginate('3');
        /* get all pages without paginate */
        $getcountallpage = Page::all()->count();
        /* count published and drafted */
        $publishedanddraft = Page::all();
        $pagebyoneorone = $publishedanddraft->where('publishandNot', '=', '1')->count();
        $pagebyoneorzero = $publishedanddraft->where('publishandNot', '=', '0')->count();
        /* /count published and drafted */
        return view('pages.published')
            ->with('published', $published)
            ->with('countallpages', $getcountallpage)
            ->with('pagebyoneoronee', $pagebyoneorone)
            ->with('pagebyoneorzeroo', $pagebyoneorzero)
            ->with('pagequery');
    }
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ************* pages by draft ************ */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    public function draftpages()
    {
        $drafts = Page::where('publishandNot', '=', '0')->paginate('3');
        /* get all pages without paginate */
        $getcountallpage = Page::all()->count();
        /* count published and drafted */
        $publishedanddraft = Page::all();
        $pagebyoneorone = $publishedanddraft->where('publishandNot', '=', '1')->count();
        $pagebyoneorzero = $publishedanddraft->where('publishandNot', '=', '0')->count();
        /* /count published and drafted */
        return view('pages.draft')
            ->with('drafts', $drafts)
            ->with('countallpages', $getcountallpage)
            ->with('pagebyoneoronee', $pagebyoneorone)
            ->with('pagebyoneorzeroo', $pagebyoneorzero)
            ->with('pagequery');
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
    public function pagessearch(Request $request)
    {
        $pagessearch = $request->input('q');
        /* get all pages without paginate */
        $getcountallpage = Page::all()->count();
        /* count published and drafted */
        $publishedanddraft = Page::all();
        $pagebyoneorone = $publishedanddraft->where('publishandNot', '=', '1')->count();
        $pagebyoneorzero = $publishedanddraft->where('publishandNot', '=', '0')->count();
        /* / count published and drafted */
        if ($pagessearch != NULL) {
            $search = Page::query()
                ->where('title', 'LIKE', "%{$pagessearch}%")
                ->orderBy('created_at', 'DESC')->paginate(2);
        } else {
            abort(404);
        }
        return view('pages.pagessearch')
            ->with('allpagessearch', $search)
            ->with('countallpages', $getcountallpage)
            ->with('pagebyoneoronee', $pagebyoneorone)
            ->with('pagebyoneorzeroo', $pagebyoneorzero)
            ->with('pagequery', $pagessearch);
    }
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* **************** show *********** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    /* ***************************************** */
    public function show()
    {
        
    }
}
