<?php

namespace App\Http\Controllers\Backend;

use App\Models\Subcategory;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;



class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $subcategories = Subcategory::with('category')->latest()->paginate(10);
        return view('admin.sub-category.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::pluck('name','id');
        return view('admin.sub-category.create', compact('categories'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        
            $request->validate([
                'category' => ['required', Rule::exists('categories', 'id')],
                'name' => ['required','max:200', Rule::unique(Subcategory::class)],
                'status' => ['required','boolean', Rule::in([0, 1])],
            ]);

            $category = Category::findOrFail($request->category);

            $category->subcategories()->create([

                'name' => $request->name,
                'status' => $request->status,
                'slug' => Str::slug($request->name),
           ]);


            notyf()->success('Sub Category Created Successfully!');
            return redirect()->route('admin.sub-category.index');

                
           
    }

    /**
     * Display the specified resource.
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $subcategory = Subcategory::findOrFail($id);
        $categories = Category::pluck('name','id');

        return view('admin.sub-category.edit', compact(['subcategory', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $subcategory = Subcategory::findOrFail($id);
        
        $request->validate([
            'category' => ['required', Rule::exists('categories', 'id')],
            'name' => ['required','max:200', Rule::unique(Subcategory::class)->ignore($subcategory->id)],
            'status' => ['required','boolean', Rule::in([0, 1])],
        ]);


        $subcategory->update([
            
            'name' => $request->name,
            'category_id' => $request->category,
            'status' => $request->status,
            'slug' => Str::slug($request->name),
        ]);

        notyf()->success('Sub Category Updated Successfully!');
        return redirect()->route('admin.sub-category.index');
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subcategory = Subcategory::findOrFail($id);

        if ($subcategory->childCategories()->exists()) {
            return response()->json([
                'status' => 'error',
                'message' => 'This subcategory contains child categories. You have to delete the child categories first!',
            ]);
        }

        $subcategory->delete();

        return response()->json([
            'status' => 'success',
            'type' => 'subcategory',
            'message' => 'Sub Category deleted successfully!'
        ]);

    }

    public function ChangeStatus(Request $request)
    {
        $request->validate([
            
            'id' => ['required', 'integer'], 
            'status' => ['required', Rule::in(['true', 'false'])],
        ]);

        $subcategory = Subcategory::findOrFail($request->id);
        $subcategory->status = $request->status == 'true' ? 1 : 0 ;
        $subcategory->save();

        return response()->json([
            'message' => 'Status has been updated!'
        ]);

    }
}
