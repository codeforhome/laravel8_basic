<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Carbon;
use Image;
use Auth;

class HomeController extends Controller
{

  public function __construct(){
      $this->middleware('auth');
    }

  public function HomeSlider(){

    $sliders = Slider::latest()->get();
    return view('admin.slider.index', compact('sliders'));
  }

  public function AddSlider(){

    return view('admin.slider.create');
  }

  public function StoreSlider(Request $request){
      $validated = $request->validate(
      [
        'image' => 'required|mimes:jpg,jpeg,png',
      ],
        );

        $slider_image = $request->file('image');

        $name_gen = hexdec(uniqid()).'.'.$slider_image -> getClientOriginalExtension();
        Image::make($slider_image)->resize(1920,1088)->save('image/slider/'.$name_gen);
        $last_img = 'image/slider/'.$name_gen;

        Slider::insert([
          'title' => $request -> title,
          'description' => $request -> description,
          'image' => $last_img,
          'created_at' => Carbon::now()
        ]);

        return Redirect()->route('home.slider')-> with('success', 'Slider Inserted Successfully');
  }


  public function Delete($id){
    $image = Slider::find($id);
    $old_image = $image -> image;
    unlink($old_image);

    Slider::find($id)->delete();
    return redirect()->back()-> with('success', 'Slider Deleted Successfully');
  }
}
