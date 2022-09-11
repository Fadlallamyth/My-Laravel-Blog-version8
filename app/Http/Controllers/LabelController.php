<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Setting;
use Illuminate\Http\Request;

class LabelController extends Controller
{
   public function index()
   {

      return view('labels.index')

         /* posts by label */
         ->with('label', Label::first())
         ->with('label2', Label::skip(1)->take(1)->first())
         ->with('label3', Label::skip(2)->take(1)->first())
         ->with('label4', Label::skip(3)->take(1)->first())
         ->with('label5', Label::skip(4)->take(1)->first())

         /* posts quantity */
         ->with('posts_quantity', Setting::first()->posts_quantity)

         /* most views posts */
         ->with('most_views_quantity', Setting::first()->most_views_quantity)

         /* related_posts */
         ->with('related_posts_quantity', Setting::first()->related_posts_quantity)


         /* website_name */
         ->with('website_name', Setting::first()->website_name)

         /* website_description */
         ->with('website_description', Setting::first()->website_description)

         /* website_logo */
         ->with('website_logo', Setting::first()->website_logo);
   }

   public function labelsupdatelabel1(Request $request)
   {
      $label = Label::first();
      $label2 = Label::skip(1)->take(1)->first();
      $label3 = Label::skip(2)->take(1)->first();
      $label4 = Label::skip(3)->take(1)->first();
      $label5 = Label::skip(4)->take(1)->first();

      if ($request->input('label')) {
         $label->label = $request->input('label');
         $label->quantity = $request->input('quantity1');
         $label->update();
      }
      if ($request->input('label2')) {
         $label2->label = $request->input('label2');
         $label2->quantity = $request->input('quantity2');
         $label2->update();
      }
      if ($request->input('label3')) {
         $label3->label = $request->input('label3');
         $label3->quantity = $request->input('quantity3');
         $label3->update();
      }

      if ($request->input('label4')) {
         $label4->label = $request->input('label4');
         $label4->quantity = $request->input('quantity4');
         $label4->update();
      }
      if ($request->input('label5')) {
         $label5->label = $request->input('label5');
         $label5->quantity = $request->input('quantity5');
         $label5->update();
      }





      return redirect()->back();
   }
}
