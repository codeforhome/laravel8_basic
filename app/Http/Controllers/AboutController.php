<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeAbout;
use App\Models\Multipic;
use Illuminate\Support\Carbon;
use Image;
use Auth;


class AboutController extends Controller
{
    //
    public function __construct(){
      $this->middleware('auth');
    }

    public function HomeAbout(){
      $homeabout = HomeAbout::latest()->get();
      return view('admin.home.index', compact('homeabout'));
    }

    public function AddAbout(){
      return view('admin.home.create');
    }

    public function StoreAbout(Request $request){
        $validated = $request->validate([
        'title' => 'required|min:4',
        'short_dis' => 'required|min:4',
        'long_dis' => 'required|min:4',
      ]);

      HomeAbout::insert([
        'title' => $request -> title,
        'short_dis' => $request -> short_dis,
        'long_dis' => $request -> long_dis,
        'created_at' => Carbon::now()
      ]);

        return redirect()->route('home.about')-> with('success', 'About Inserted Successfully');
    }

    public function Delete($id){
      $homeabout = HomeAbout::find($id)->delete();
      return redirect()->back()-> with('success', 'About Deleted Successfully');
    }

    public function Edit($id){
      $homeabout = HomeAbout::find($id);
      return view('admin.home.edit', compact('homeabout'));
    }

    public function Update(Request $request, $id){
      HomeAbout::find($id)->update([
        'title' => $request -> title,
        'short_dis' => $request -> short_dis,
        'long_dis' => $request -> long_dis
      ]);
      return redirect()->route('home.about')->  with('success', 'About Update Successfully');
    }

    public function Portfolio(){
      $images = Multipic::all();

      return view('pages.portfolio', compact('images'));
    }

}
