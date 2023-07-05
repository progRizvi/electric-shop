<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
    public function list()
    {
        //return view('backend.pages.subCategoryList');
        $Subcategory = Subcategory::with('categories')->get();
        return view('backend.pages.subcategory.subCategoryList', compact('Subcategory'));
    }


    public function createForm()
    {
        $Categories = Category::all();
        return view('backend.pages.subcategory.subCategoryCreateForm', compact('Categories'));
    }


    public function submitForm(Request $request)
    {
        //return view('backend.pages.subCategoryForm');
        Subcategory::create([
            'subcategory_name' => $request->subcategory_name,
            'subcategory_details' => $request->subcategory_details,
            'category_id' => $request->category_id,
            'subcategory_status' => $request->subcategory_status
        ]);
        return redirect()->route('sub.category.list')->with('message','Sub-Category Create Successfully.');
    }

    //edit
    public function editSubCategory($id)
    {
        $Subcategory = Subcategory::find($id);
        return view('backend.pages.subcategory.subCategoryEdit', compact('Subcategory'));
    }

    public function updateSubCategory(Request $request, $id)
    {
        $Subcategory = Subcategory::find($id)->update([
            'subcategory_name' => $request->subcategory_name,
            'subcategory_details' => $request->subcategory_details,
            'subcategory_status' => $request->subcategory_status
        ]);
        return redirect()->route('sub.category.list');
    }

    //view
    public function viewSubCategory($id)
    {
        $Subcategory = Subcategory::find($id);
        return view('backend.pages.subcategory.subCategoryView', compact('Subcategory'));
    }

    //delete
    public function deleteSubCategory($id)
    {
        $SubCategory = Subcategory::find($id)->delete();
        return redirect()->back();
    }
}
