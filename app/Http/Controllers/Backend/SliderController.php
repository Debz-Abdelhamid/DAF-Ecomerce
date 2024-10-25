<?php

namespace App\Http\Controllers\Backend;

use App\Models\Slider;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class SliderController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */

    public function index(): View
    {
        $sliders = Slider::latest()->paginate(5);
    
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
                        'banner' => ['required','image','max:2048','mimes:png,jpg,jpeg'],
                        'type' => ['string','max:200'],
                        'title' => ['required','max:200'],
                        'starting_price' => ['max:200'],
                        'btn_url' => ['url','max:250'],
                        'serial' => ['required','integer', Rule::unique(Slider::class)],
                        'status' => ['required','boolean', Rule::in([0, 1])],
                    ]);
    
        /** Handl Image Uploaded */

        $imagePath = $this->UploadImage($request, 'banner', 'sliders');
        
        Slider::create([
            
            'banner' => $imagePath,
            'type'  => $request->type,
            'title' => $request->title,
            'starting_price' => $request->starting_price,
            'btn_url' => $request->btn_url,
            'serial' => $request->serial,
            'status' => $request->status,
        ]);

        notyf()->success('Slider Created Successfully!');
        return redirect()->route('admin.slider.index');


    }

    /**
     * Display the specified resource.
     */
    
    // public function show(string $id)
    // {
        
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit',[
            'slider' => $slider,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $slider = Slider::findOrFail($id);
        
        $request->validate([
            'banner' => ['nullable','image','max:2048','mimes:png,jpg,jpeg'],
            'type' => ['string','max:200'],
            'title' => ['required','max:200'],
            'starting_price' => ['max:200'],
            'btn_url' => ['url','max:250'],
            'serial' => ['required', 'integer', Rule::unique(Slider::class)->ignore($slider->id)], 
            'status' => ['required','boolean', Rule::in([0, 1])],
        ]);


        $imagePath = $this->UpdateImage($request, 'banner','sliders', $slider->banner);

        $slider->update([

            'banner' => $imagePath,
            'type'  => $request->type,
            'title' => $request->title,
            'starting_price' => $request->starting_price,
            'btn_url' => $request->btn_url,
            'serial' => $request->serial,
            'status' => $request->status,
        ]);

        notyf()->success('Slider Updated Successfully!');
        return redirect()->route('admin.slider.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::findOrFail($id);

        $this->DeleteImage($slider->banner);

        $slider->delete();

        return response()->json([
            'status' => 'success',
            'type' => 'slider',
            'message' => 'Slider deleted successfully!'
        ]);

    }
}
