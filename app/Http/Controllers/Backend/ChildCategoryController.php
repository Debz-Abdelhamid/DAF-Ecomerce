<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\ChildCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $childcategories = ChildCategory::with(['subCategory', 'category'])->latest()->paginate(10);
        return view('admin.child-category.index', compact('childcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::pluck('name','id');
        return view('admin.child-category.create', compact('categories'));
    }

    public function getSubCategories(Request $request)
    {
        $request->validate([
            'id' => ['required', 'integer'],
        ]);
        $category = Category::findOrFail($request->id);
        $subcategories = $category->subcategories()->where('status', 1)->pluck('name','id');

        return response()->json($subcategories);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'category' => ['required', Rule::exists('categories', 'id')],
            'sub_category' => ['required', Rule::exists('subcategories', 'id')],
            'name' => ['required','max:200', Rule::unique(ChildCategory::class)],
            'status' => ['required','boolean', Rule::in([0, 1])],
        ]);

        $category = Category::findOrFail($request->category);
        $subcategory = Subcategory::findOrFail($request->sub_category);

        

        if ($subcategory->status!== 1 || $subcategory->category_id !== $category->id) {

            notyf()->error(__('toastr.Thesselected'));
            return redirect()->back();
        }


        ChildCategory::create([
            'category_id' => $category->id,
            'subcategory_id' => $subcategory->id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => $request->status,
        ]);

        notyf()->success(__('toastr.ChildCategoryCreatedSuccessfully'));
        return redirect()->route('admin.child-category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $childcategory = ChildCategory::findOrFail($id);
        $categories = Category::pluck('name','id');
        $subcategories = Subcategory::where('category_id', $childcategory->category_id )->get();
        return view('admin.child-category.edit', compact(['childcategory', 'categories', 'subcategories']) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $childcategory = ChildCategory::findOrFail($id);

        $request->validate([
            'category' => ['required', Rule::exists('categories', 'id')],
            'sub_category' => ['required', Rule::exists('subcategories', 'id')],
            'name' => ['required','max:200', Rule::unique(ChildCategory::class)->ignore($childcategory->id)],
            'status' => ['required','boolean', Rule::in([0, 1])],
        ]);

        $category = Category::findOrFail($request->category);
        $subcategory = Subcategory::findOrFail($request->sub_category);

        
        if ($subcategory->status!== 1 || $subcategory->category_id !== $category->id) {

            notyf()->error(__('toastr.Theselectedsubcategory'));
            return redirect()->back();
        }

        $childcategory->update([
            'category_id' => $category->id,
            'subcategory_id' => $subcategory->id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => $request->status,
        ]);

        notyf()->success(__('toastr.ChildCategoryUpdatedSuccessfully'));
        return redirect()->route('admin.child-category.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $childcategory = ChildCategory::findOrFail($id);

        $childcategory->delete();

        return response()->json([
            'status' => 'success',
            'type' => 'childcategory',
            'message' =>__('toastr.ChildCategorydeletedsuccessfully')
        ]);
    }


    public function ChangeStatus(Request $request)
    {
        $request->validate([
            
            'id' => ['required', 'integer'], 
            'status' => ['required', Rule::in(['true', 'false'])],
        ]);

        $childcategory = ChildCategory::findOrFail($request->id);
        $childcategory->status = $request->status == 'true' ? 1 : 0 ;
        $childcategory->save();

        return response()->json([
            'message' =>__('toastr.Statushasbeenupdated')
        ]);

    }
}
