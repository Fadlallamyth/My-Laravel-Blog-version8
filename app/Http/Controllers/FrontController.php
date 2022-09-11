<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Label;
use App\Models\Page;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;

class FrontController extends Controller
{

    /*****************************************************
     *****************************************************
     *****************************************************
     ******************** Index **************************
     *****************************************************
     *****************************************************
     *****************************************************/
    public function index()
    {
        /* posts quantity */
        $posts_quantity = Setting::first()->posts_quantity;
        if(is_numeric($posts_quantity)){
            $posts_quantity = Setting::first()->posts_quantity;
        }else{
            $posts_quantity = '10';
        }
        $front_all_posts = Post::orderBy('created_at', 'DESC')->paginate($posts_quantity);

        /* most views quantity */
        $most_views_quantity = Setting::first()->most_views_quantity;
        if(is_numeric($most_views_quantity) && $most_views_quantity > 0){
            $most_views_quantity = Setting::first()->most_views_quantity;
        }else{
            $most_views_quantity = '10';
        }
        $mosts_views = Post::orderBy('views', 'desc')->paginate($most_views_quantity);
        

        /* 
        ************************************************************
        ************************************************************
        ********************** Header label ************************/
        if ($header_by_label = Label::first()) {
            $header_by_label = Label::first();
        } elseif ($header_by_label = Label::skip(1)->take(1)->first()) {
            $header_by_label = Label::skip(1)->take(1)->first();
        } elseif ($header_by_label = Label::skip(2)->take(1)->first()) {
            $header_by_label = Label::skip(2)->take(1)->first();
        } elseif ($header_by_label = Label::skip(3)->take(1)->first()) {
            $header_by_label = Label::skip(3)->take(1)->first();
        } elseif ($header_by_label = Label::skip(4)->take(1)->first()) {
            $header_by_label = Label::skip(4)->take(1)->first();
        }
        $header_post_label = Category::where('name', $header_by_label->label)->first();

        /* 
        ***************************************************************
        ***************************************************************
        ******************** first by label ***************************/

        if ($get_label = Label::skip(1)->take(1)->first()) {
            $get_label = Label::skip(1)->take(1)->first();
        } elseif ($get_label = Label::skip(2)->take(1)->first()) {
            $get_label = Label::skip(2)->take(1)->first();
        } elseif ($get_label = Label::skip(3)->take(1)->first()) {
            $get_label = Label::skip(3)->take(1)->first();
        } elseif ($get_label = Label::skip(4)->take(1)->first()) {
            $get_label = Label::skip(4)->take(1)->first();
        }
        $get_one_cat = Category::where('name', $get_label->label)->first();

        /* 
        ***************************************************************
        ***************************************************************
        ****************** second by label ***************************/

        if ($get_second_cat = Label::skip(2)->take(1)->first()) {
            $get_second_cat = Label::skip(2)->take(1)->first();
        } elseif ($get_second_cat = Label::skip(2)->take(1)->first()) {
            $get_second_cat = Label::skip(2)->take(1)->first();
        } elseif ($get_second_cat = Label::skip(3)->take(1)->first()) {
            $get_second_cat = Label::skip(3)->take(1)->first();
        } elseif ($get_second_cat = Label::skip(4)->take(1)->first()) {
            $get_second_cat = Label::skip(4)->take(1)->first();
        }
        $get_sec_cat = Category::where('name', $get_second_cat->label)->first();


        /* 
        ***************************************************************
        ***************************************************************
        ****************** third by label ***************************/

        if ($get_third_cat =       Label::skip(3)->take(1)->first()) {
            $get_third_cat =       Label::skip(3)->take(1)->first();
        } elseif ($get_third_cat = Label::skip(2)->take(1)->first()) {
            $get_third_cat =       Label::skip(2)->take(1)->first();
        } elseif ($get_third_cat = Label::skip(3)->take(1)->first()) {
            $get_third_cat =       Label::skip(3)->take(1)->first();
        } elseif ($get_third_cat = Label::skip(4)->take(1)->first()) {
            $get_third_cat =       Label::skip(4)->take(1)->first();
        }
        $get_third_cat = Category::where('name', $get_third_cat->label)->first();


        /***************************************************************
         ***************************************************************
         ****************** fourth by label ***************************/

        if ($get_fourth_cat =       Label::skip(4)->take(1)->first()) {
            $get_fourth_cat =       Label::skip(4)->take(1)->first();
        } elseif ($get_fourth_cat = Label::skip(2)->take(1)->first()) {
            $get_fourth_cat =       Label::skip(2)->take(1)->first();
        } elseif ($get_fourth_cat = Label::skip(3)->take(1)->first()) {
            $get_fourth_cat =       Label::skip(3)->take(1)->first();
        } elseif ($get_fourth_cat = Label::skip(4)->take(1)->first()) {
            $get_fourth_cat =       Label::skip(4)->take(1)->first();
        }
        $get_fourth_cat = Category::where('name', $get_fourth_cat->label)->first();
        /* ************************************************************
        ***************************************************************
        ***************************************************************/

        return view('front.index')
            ->with('front_all_posts', $front_all_posts)
            ->with('pages', Page::all())
            ->with('show_categories', Category::all())
            ->with('blog_query')
            ->with('mosts_views', $mosts_views)
            ->with('get_one_cat', $get_one_cat)
            ->with('get_second_cat', $get_sec_cat)
            ->with('header_post_label', $header_post_label)
            ->with('get_third_cat', $get_third_cat)
            ->with('get_fourth_cat', $get_fourth_cat)
            ->with('website_logo', Setting::first()->website_logo)
            ->with('website_name', Setting::first()->website_name);
    }

    /*****************************************************
     *****************************************************
     *****************************************************
     ******************** blog_post **********************
     *****************************************************
     *****************************************************
     *****************************************************/
    public function blog_post($slug, Request $request)
    {
        $blog_post_slug = Post::where('slug', $slug)->firstOrFail();

        /* mosts views */
        $most_views_quantity = Setting::first()->most_views_quantity;
        if(is_numeric($most_views_quantity) && $most_views_quantity > 0){
            $most_views_quantity = Setting::first()->most_views_quantity;
        }else{
            $most_views_quantity = '10';
        }
        $mosts_views = Post::orderBy('views', 'DESC')->paginate($most_views_quantity);


        $related_posts_quantity = Setting::first()->related_posts_quantity;
        if(is_numeric($related_posts_quantity) && $related_posts_quantity > 0){
            $related_posts_quantity = Setting::first()->related_posts_quantity;
        }else{
            $related_posts_quantity = '10';
        }

        $relatedpost =  Post::where('slug', '=', $slug)->firstOrFail();
        if (!empty($relatedpost->category->id)) {
            $related = Post::where('category_id', '=', $relatedpost->category->id)
                ->where('id', '!=', $relatedpost->id)
                ->take($related_posts_quantity)->get();
        } else {
            $related = '';
        }

        $blog_post_slug->views = $blog_post_slug->views + 1;
        $blog_post_slug->update();


        $title_or_blog = $blog_post_slug->title;
        if ($title_or_blog) {
            $title_or_blog = $blog_post_slug->title;
        } else {
            $title_or_blog = Setting::first()->website_name;
        }

        return view('front.blog_spot')
            ->with('this_post', $blog_post_slug)
            ->with('mosts_views', $mosts_views)
            ->with('relatedPosts', $related)
            ->with('blog_query')
            ->with('show_categories', Category::all())
            ->with('pages', Page::all())
            ->with('website_logo', Setting::first()->website_logo)
            ->with('website_name', Setting::first()->website_name)
            ->with('title_or_blog', $title_or_blog);
    }

    /*****************************************************
     *****************************************************
     *****************************************************
     ******************* search blog *********************
     *****************************************************
     *****************************************************
     *****************************************************/
    public function search_blog(Request $request)
    {
        $query_blog_word = $request->input('q');

        $blog_search = Post::query()
            ->where('title', 'LIKE', "%{$query_blog_word}%")
            ->orderBy('created_at', 'DESC')->paginate('3');

        /* most views */
        $most_views_quantity = Setting::first()->most_views_quantity;
        if(is_numeric($most_views_quantity) && $most_views_quantity > 0){
            $most_views_quantity = Setting::first()->most_views_quantity;
        }else{
            $most_views_quantity = '10';
        }
        $mosts_views = Post::orderBy('views', 'DESC')->paginate($most_views_quantity);

        return view('front.blog_search')
            ->with('blog_search', $blog_search)
            ->with('mosts_views', $mosts_views)
            ->with('blog_query', $query_blog_word)
            ->with('show_categories', Category::all())
            ->with('pages', Page::all())
            ->with('website_logo', Setting::first()->website_logo)
            ->with('website_name', Setting::first()->website_name);
    }


    /****************************************************
     *****************************************************
     *****************************************************
     ******************* blog category *******************
     *****************************************************
     *****************************************************
     *****************************************************/

    public function blogcategory($link)
    {
        /*  get categry slug or link */
        $category_posts = Category::where('link', $link)->first();


        /* most views */
        $most_views_quantity = Setting::first()->most_views_quantity;
        if(is_numeric($most_views_quantity) && $most_views_quantity > 0){
            $most_views_quantity = Setting::first()->most_views_quantity;
        }else{
            $most_views_quantity = '10';
        }
        $mosts_views = Post::orderBy('views', 'DESC')->paginate($most_views_quantity);

        return view('front.category_posts')
            ->with('category', $category_posts)
            ->with('mosts_views', $mosts_views)
            ->with('show_categories', Category::all())
            ->with('blog_query')
            ->with('pages', Page::all())
            ->with('website_logo', Setting::first()->website_logo)
            ->with('website_name', Setting::first()->website_name);
    }
}
