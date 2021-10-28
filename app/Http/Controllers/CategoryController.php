<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function AllCat(){
      // $categories = Category::all();
      $categories = Category::latest()->get();


      return view('admin.category.index', compact('categories'));
    }

    public function AddCat(Request $request){
      $validated = $request->validate([
        'category_name' => 'required|unique:categories|max:255',
      ],
      [
        'category_name.required' => 'Please input category name',
        'category_name.max' => 'Category less than 255',
      ]
    );

      Category::insert([
        'category_name' => $request->category_name,
        'user_id' =>  Auth::user()->id,
        'created_at' => Carbon::now()
      ]);

      //method below no need create at and update at
      // $category = new Category;
      // $category->category_name = $request->category_name;
      // $category->user_id =Auth::user()->id;
      // $category->created_at =Carbon::now();
      // $category->save();


      //insert using query builder
      // $data = array();
      // $data['category_name'] = $request->category_name;
      // $data['user_id'] =Auth::user()->id;
      // $data['created_at'] = Carbon::now()
      // DB::table('categories')->insert($data);


      return redirect()->back()->with('success', 'Category Inserted Successfull');

    }
}
