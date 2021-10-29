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
      $categories = Category::latest()->paginate(5);
      $trashCat = Category::onlyTrashed()->latest()->paginate(3);
      //Query builder
      // $categories = DB::table('categories')->latest()->paginate(5);
      // $categories = DB::table('categories')
      //           ->join('users', 'categories.user_id', 'users.id')
      //           ->select('categories.*','users.name')
      //           ->latest()->paginate(5);

      return view('admin.category.index', compact('categories','trashCat'));
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

    public function Edit($id){
      // $categories = Category::find($id);
      $categories = DB::table('categories')->where('id', $id)->first();
      return view('admin.category.edit',compact('categories'));
    }

    public function Update(Request $request, $id){
      // $update = Category::find($id)->update(
      //   [
      //     'category_name' => $request->category_name,
      //     'user_id' => Auth::user()->id
      //   ]);
      //
      $data = array();
      $data['category_name'] = $request->category_name;
      $data['user_id'] =Auth::user()->id;
      DB::table('categories')
                ->where('id', $id)
                ->update($data);

      return redirect()->route('all.category')->with('success', 'Category Updated Successfull');

    }

    public function Softdelete($id){
      $delete = Category::find($id)->delete();
      return redirect()->back()->with('success', 'Category Soft Delete Successfull');

    }

    public function Restore($id){
      $delete = Category::withTrashed()->find($id)->restore();
      return redirect()->back()->with('success', 'Category Restore Successfull');

    }

    public function Pdelete($id){
      $delete = Category::onlyTrashed()->find($id)->forceDelete();
      return redirect()->back()->with('success', 'Category Permanently Delete Successfull');

    }
}
