<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function list() {
        //return view('backend.pages.categoryList');
        //read 2nd
        $Categories = Category::paginate(10);
        return view('backend.pages.category.categoryList', compact('Categories'));
    }

    public function createForm()
    {
        return view('backend.pages.category.categoryCreateForm');
    }

    public function submitForm(Request $request)
    {
        //dd($request->all());

        $fileName = null;
        if ($request->hasFile('category_image')) {
            $fileName = 'electric-shop' . '.' . date('Ymdhmsis') . '.' . $request->file('category_image')->getClientOriginalExtension();
            $request->file('category_image')->storeAs('uploads/category', $fileName);
        }

        // create 1st then read
        Category::create([
            'category_name' => $request->category_name,
            'category_image' => $fileName,
            'category_details' => $request->category_details,
            'category_status' => $request->category_status,
        ]);
        return redirect()->route('category.list')->with('message', 'Category Create Successfully.');
    }

    //edit
    public function editCategory($id)
    {
        $Category = Category::find($id);
        return view('backend.pages.category.categoryEdit', compact('Category'));
    }

    //Update

    public function updateCategory(Request $request, $id)
    {
        $updateCategory = Category::find($id);

        $fileName = null;
        if ($request->hasFile('category_image')) {
            $fileName = 'electric-shop' . '.' . date('Ymdhmsis') . '.' . $request->file('category_image')->getClientOriginalExtension();
            $request->file('category_image')->storeAs('uploads/category', $fileName);
        }

        // dd($fileName);

        $updateCategory->update([
            'category_name' => $request->category_name,
            'category_image' => $fileName,
            'category_details' => $request->category_details,
            'category_status' => $request->category_status,

        ]);
        return redirect()->route('category.list')->with('message', 'Customer Updated Successfully');
    }

    //view

    public function viewCategory($id)
    {
        $Category = Category::find($id);
        return view('backend.pages.category.categoryView', compact('Category'));
    }

    //delete

    public function deleteCategory($id)
    {
        $Category = Category::find($id)->delete();
        return redirect()->route('category.list');
    }
}
