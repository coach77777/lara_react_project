<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function HomeSlider(){

        // $sliders = Slider::latest()->get()
        // $sliders = Slider::orderBy('id', 'asc')->get();
        $sliders = Slider::orderBy('title', 'asc')->get();

       return view('admin.slider.index', compact('sliders'));
    }
    public function AddSlider(){

        return view('admin.slider.create');
    }


    public function StoreSlider(Request $request){

        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);

        $slider_image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
        Image::make($slider_image)->resize(1920,1088)->save('image/slider/'.$name_gen);
        $last_img = 'image/slider/'.$name_gen;

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_img,
             'updated_at' => Carbon::now()
        ]);

        return redirect()->route('home.slider')->with('success', 'Slider Inserted Successfully');
    }

    public function Edit($id){
        $sliders = Slider::find($id);

        return view('admin.slider.edit', compact('sliders'));
    }

    public function Update(Request $request, $id){
        $validated = $request->validate([
            'title' => 'required|min:5',
        ],
        [
            'title.required' => 'Please Input  A Title ',
         'title.min' => 'Title should be at least 5 characters',
        ]);

        $old_image = $request->old_image;

        $slider_image = $request->file('image');

        if($slider_image){
          $name_gen = hexdec(uniqid());
          $img_ext = strtolower($slider_image->getClientOriginalExtension());
          $img_name = $name_gen.'.'.$img_ext;
 // $name_gen = hexdec(uniqid()).'.'.strtolower($brand_image->getClientOriginalExtension());

             $up_location = 'image/slider/';
             $last_img = $up_location.$img_name;
             $slider_image->move($up_location, $img_name);

             if (file_exists($old_image)) {
                 if (file_exists($old_image)) {
                     unlink($old_image);
                 }
             }

             Slider::find($id)->update([
                 'title' => $request->title,
                    'description' => $request->description,
                 'image' => $last_img,
                     'updated_at' => Carbon::now()
                 ]);

         return Redirect()->route('home.slider')->with('success', 'Slider updated successfully');
         }else{
             Slider::find($id)->update([
                 'title' => $request->title,
                     'updated_at' => Carbon::now(),
                 'image' => $old_image,
                     'created_at' => Carbon::now()
                 ]);

         return Redirect()->route('home.slider')->with('success', 'Slider updated successfully');
         }
     }

     public function Delete($id){

         $image = Slider::find($id);
         $old_image = $image->image;
         unlink($old_image);

         Slider::find($id)->delete();

         return Redirect()->back()->with('success', 'Slider Deleted successfully');
     }
}
