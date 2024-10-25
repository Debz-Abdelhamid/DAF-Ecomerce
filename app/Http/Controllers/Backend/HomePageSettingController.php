<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\HomePage;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;

class HomePageSettingController extends Controller
{
    public function index(): View
    {
        $categories = Category::where('status', 1)->get();
        $popularCategorySection = HomePage::where('key', 'popular_category_section')->first();
    
        $popularCategory = $popularCategorySection ? json_decode($popularCategorySection->value) : [];
    
        return view('admin.home-page-setting.index', compact('categories', 'popularCategory'));
    }
    

    public function UpdatePopularCategorySection(Request $request)
    {
        $request->validate([

            'cat_one' => ['nullable', 'integer', Rule::exists('categories', 'id')],
            'sub_cat_one' => ['nullable', 'integer', Rule::exists('subcategories', 'id')],
            'child_cat_one' => ['nullable', 'integer', Rule::exists('child_categories', 'id')],

            'cat_two' => ['nullable', 'integer', Rule::exists('categories', 'id')],
            'sub_cat_two' => ['nullable', 'integer', Rule::exists('subcategories', 'id')],
            'child_cat_two' => ['nullable', 'integer', Rule::exists('child_categories', 'id')],

            'cat_three' => ['nullable', 'integer', Rule::exists('categories', 'id')],
            'sub_cat_three' => ['nullable', 'integer', Rule::exists('subcategories', 'id')],
            'child_cat_three' => ['nullable', 'integer', Rule::exists('child_categories', 'id')],

            'cat_four' => ['nullable', 'integer', Rule::exists('categories', 'id')],
            'sub_cat_four' => ['nullable', 'integer', Rule::exists('subcategories', 'id')],
            'child_cat_four' => ['nullable', 'integer', Rule::exists('child_categories', 'id')],

            'cat_five' => ['nullable', 'integer', Rule::exists('categories', 'id')],
            'sub_cat_five' => ['nullable', 'integer', Rule::exists('subcategories', 'id')],
            'child_cat_five' => ['nullable', 'integer', Rule::exists('child_categories', 'id')],


        ]);

        $data = [

            [
                'category' => $request->cat_one,  
                'sub_category' => $request->sub_cat_one,  
                'child_category' => $request->child_cat_one,  
            ],

            [
                'category' => $request->cat_two,  
                'sub_category' => $request->sub_cat_two,  
                'child_category' => $request->child_cat_two,  
            ],

            [
                'category' => $request->cat_three,  
                'sub_category' => $request->sub_cat_three,  
                'child_category' => $request->child_cat_three,  
            ],

            [
                'category' => $request->cat_four,  
                'sub_category' => $request->sub_cat_four,  
                'child_category' => $request->child_cat_four,  
            ],

            [
                'category' => $request->cat_five,  
                'sub_category' => $request->sub_cat_five,  
                'child_category' => $request->child_cat_five,  
            ],
        ];

        HomePage::updateOrCreate(
            [
                'key' => 'popular_category_section',
            ],
            [
                'value' => json_encode($data),
            ],
        );

        notyf()->success('Updated Successfully!');

        return redirect()->back();
    }
}
