<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Adress;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

class UserAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $addresses = Adress::where('user_id', auth()->user()->id)->paginate(4);
        return view('frontend.dashboard.address.index', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('frontend.dashboard.address.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required','max:200','string'],
            'email' => ['required','email','max:200'],
            'phone' => ['required','max:50', 'regex:/^0[5-6-7][0-9]{8}$/'],
            'country' => ['required','max:200', Rule::in(config('settings.country_list'))],
            'state' => ['required','max:200','string'],
            'city' => ['required','max:200','string'],
            'zip' => ['required','max:200', 'string'],
            'address' => ['required','max:500', 'string'],
        ]);

        $user = $request->user();

        $adress = $user->addresses()->count();

        if($adress >= 2)
        {
            notyf()->error("You can't add more than 2 Addresses!");
            return redirect()->route('user.address.index');
        }

        $user->addresses()->create([
            'name' => $request->name ,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'zip' => $request->zip,
            'address' => $request->address,
        ]);

        notyf()->success('Created Successfully!');
        return redirect()->route('user.address.index');
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
    public function edit(Adress $address): View
    {
        Gate::authorize('update', $address);
        return view('frontend.dashboard.address.edit', compact('address'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Adress $address)
    {

        Gate::authorize('update', $address);

        $request->validate([
            'name' => ['required','max:200', 'string'],
            'email' => ['required','email','max:200'],
            'phone' => ['required','max:50', 'regex:/^0[5-6-7][0-9]{8}$/'],
            'country' => ['required','max:200', Rule::in(config('settings.country_list'))],
            'state' => ['required','max:200', 'string'],
            'city' => ['required','max:200', 'string'],
            'zip' => ['required','max:200', 'string'],
            'address' => ['required','max:500', 'string'],
        ]);

        $address->update([
            'name' => $request->name ,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'zip' => $request->zip,
            'address' => $request->address,
        ]);

        notyf()->success('Updated Successfully!');
        return redirect()->route('user.address.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Adress $address)
    {
        Gate::authorize('delete', $address);

        $address->delete();

        notyf()->success('Address Deleted Successfully!');

        return redirect()->back();
         
    }
}
