<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\Subcategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;



class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = Category::latest()->paginate(10);

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'icon' => ['required','not_in:empty'],
            'name' => ['required','max:200', Rule::unique(Category::class)],
            'status' => ['required','boolean', Rule::in([0, 1])],
        ]);

        Category::create([
            'name' => $request->name,
            'icon' => $request->icon,
            'status' => $request->status,
            'slug' => Str::slug($request->name),
        ]);

        notyf()->success(__('toastr.CategoryCreatedSuccessfully'));
        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     */

    public function show(Category $category)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): View
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $request->validate([
            'icon' => ['required','not_in:empty'],
            'name' => ['required','max:200', Rule::unique(Category::class)->ignore($category->id)],
            'status' => ['required','boolean', Rule::in([0, 1])],
        ]);

        $category->update([

            'name' => $request->name,
            'icon' => $request->icon,
            'status' => $request->status,
            'slug' => Str::slug($request->name),
        ]);

        notyf()->success(__('toastr.CategoryUpdatedSuccessfully'));
        return redirect()->route('admin.category.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {

        if ($category->subcategories()->exists()) {
            return response()->json([
                'status' => 'error',
                'message' =>__('toastr.Thiscategorycontains'),
            ]);
        }else if($category->productscategory()->exists())
        {
            return response()->json([
                'status' => 'error',
                'message' =>__('toastr.Thiscategorycontainspro') ,
            ]);
        }

        $category->delete();

        return response()->json([
            'status' => 'success',
            'type' => 'category',
            'message' =>__('toastr.Categorydeletedsuccessfully') 
        ]);
    }


    public function ChangeStatus(Request $request)
    {
        $request->validate([

            'id' => ['required', 'integer'],
            'status' => ['required', Rule::in(['true', 'false'])],
        ]);

        $category = Category::findOrFail($request->id);
        $category->status = $request->status == 'true' ? 1 : 0 ;
        $category->save();

        return response()->json([
            'message' =>__('toastr.Statushasbeenupdated')
        ]);

    }
}
