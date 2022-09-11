<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function index()
    {

        $settings = Setting::firstOrFail();
        return view('settings.index')
            ->with('settings', $settings);
    }


    public function storesettings(Request $request)
    {
        $settings = Setting::firstOrFail();
        $settings->website_name = $request->input('website_name');
        $settings->website_description = $request->input('website_description');

        if ($request->hasFile('website_logo')) {
            $destination = 'uploads/logo' . $settings->website_logo;
            if (File::exists($destination))
                File::delete($destination);
            $file = $request->file('website_logo');
            $filename = time() . $file->getClientOriginalName();
            $file->move('uploads/logo', $filename);
            $settings->website_logo = $filename;
        }
        $settings->update();
        return redirect()->back()->with('success_msg', 'تم حفظ التغييرات');
    }


    /* posts quantity update */
    public function settings_update(Request $request)
    {
        if ($request->input('posts_quantity')) {
            $posts_quantity_update = Setting::firstOrFail();
            $posts_quantity_update->posts_quantity = $request->input('posts_quantity');
            $posts_quantity_update->update();
        }


        if ($request->input('most_views_posts')) {
            $most_quantity_update = Setting::firstOrFail();
            $most_quantity_update->most_views_quantity = $request->input('most_views_posts');
            $most_quantity_update->update();
        }


        if ($request->input('related_posts_quantity')) {
            $related_posts_quantity = Setting::firstOrFail();
            $related_posts_quantity->related_posts_quantity = $request->input('related_posts_quantity');
            $related_posts_quantity->update();
        }


        if ($request->input('website_name')) {
            $website_name = Setting::firstOrFail();
            $website_name->website_name = $request->input('website_name');
            $website_name->update();
        }

        if ($request->input('website_description')) {
            $website_description = Setting::firstOrFail();
            $website_description->website_description = $request->input('website_description');
            $website_description->update();
        }

        if ($request->hasFile('website_logo')) {
            $website_logo = Setting::firstOrFail();
            $destination = 'uploads/logo/' . $website_logo->website_logo;
            if (File::exists($destination))
                File::delete($destination);
            $file = $request->file('website_logo');
            $name = $file->getClientOriginalName();
            $filename = explode('.', $name)[0] . time();
            $extenstion = $file->getClientOriginalExtension(); 
            $extention_and_name = $filename .'.'. $extenstion;
            $file->move('uploads/logo/',$extention_and_name);
            $website_logo->website_logo = $extention_and_name;
            $website_logo->update();
        }





        return redirect()->back()->with('success_msg', 'تم حفظ التغييرات');
    }
}
