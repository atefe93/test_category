<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    // Display a listing of the resource.

    public function index()
    {
        $categories = Category::latest()->paginate(20);
        return view('admin.categories.index', compact('categories'));
    }


    // Show the form for creating a new resource.

    public function create()
    {
        $parentCategories = Category::all();

        return view('admin.categories.create', compact('parentCategories'));
    }


    // Store a newly created resource in storage.

    public function store(Request $request)
    {
        $this->validateTitleIsValid($request);
        try {
            DB::beginTransaction();

            $category = Category::create([
                'title' => $request->title,
                'parent_id' => $request->parent_id,

            ]);


            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();

             redirect()->back()->throwResponse();
        }
        return redirect()->route('admin.categories.index');
    }


    // Show the form for editing the specified resource.

    public function edit(Category $category)
    {
        $parentCategories = Category::all();

        return view('admin.categories.edit', compact('category', 'parentCategories'));
    }


    // Update the specified resource in storage.

    public function update(Request $request, Category $category)
    {
        $this->validateTitleIsValid($request);
        try {
            DB::beginTransaction();

            $category->update([
                'title' => $request->title,
                'parent_id' => $request->parent_id
            ]);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();

             redirect()->back()->throwResponse();
        }
        return redirect()->route('admin.categories.index');
    }


    //Remove the specified resource from storage.

    public function destroy(Category $category)
    {
        try {
            DB::beginTransaction();
            $this->deleteCategory($category);
            DB::commit();


        }catch (\Exception $ex) {
            DB::rollBack();

           redirect()->back()->throwResponse();
        }

        return redirect()->route('admin.categories.index');
    }

    private function deleteCategory($category)
    {
        if ($category->children()->count()>0){
            foreach ($category->children as $child){
                $this->deleteCategory($child);
            }
        }

        $category->delete();
    }
    /**
     * @param Request $request
     */
    private function validateTitleIsValid(Request $request)
    {
        $request->validate([
            'title' => 'required',

        ]);
    }
}
