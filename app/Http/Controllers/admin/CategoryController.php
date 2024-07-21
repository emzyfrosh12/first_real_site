<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
   public function index(){
        // $categories = [];
    //   if(auth()->check()) {
  //    $posts = Post::where('user_id', auth()->id())->get();
//   $categories = Auth::user()->userCoolPost()->latest()->get();

    return view('admin.categories',['categories' => Category::paginate(5)]);       

   }

public function display(Request $request){
    $products = $request->validate([
    'name' => 'required',
    'status' => 'required'
    ]);

$products['name'] = strip_tags($products['name']);
$products['status'] = strip_tags($products['status']);
    Category::create($products);
    
return view('admin.categories',['categories' => Category::all()]);

}

// public function fhfhfhhf($id){

//     return view('admin.edit', ['category' => User::findOrfail($id)

//     ] );

// }

public function delete($id){
    Category::where('id', $id)->delete();
    return redirect()->route('admin.category');
}


public function edit(Request $request)
{

    Category::find($request->id)->update( $request->all());

    return redirect()->route('admin.category');
}


public function search(Request $request)
{
    $categories = Category::query();

    if ($request->has('search')) {
        $categories->where('name', 'like', '%' . $request->search . '%');
    }

    $categories = $categories->get();

    return redirect()->route('admin.category', compact('categories'));
}


}
