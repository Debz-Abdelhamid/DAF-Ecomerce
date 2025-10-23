<?php

namespace App\Http\Controllers\Backend;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;




class ProfileController extends Controller
{
    public function index(Request $request): View
    {
        return view('admin.profile.index',[
            'user' => $request->user(),
        ]);
    }

    public function UpdateProfile(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();
        
        
        notyf()->success(__('toastr.ProfileUpdatedsuccessfully'));
        return Redirect::route('admin.profile');

    }


    public function UpdateImage(Request $request): RedirectResponse
    {

        $request->validate([
            'image' => ['required','image','max:2048','mimes:png,jpg,jpeg'],
        ]);

        $user = $request->user();

        if($request->hasFile('image'))
        {

            $path = $request->file('image')->store('uploads','public');

            if($user->image && Storage::disk('public')->exists($user->image))
            {
                    Storage::disk('public')->delete($user->image);
            }

            $user->update(['image' => $path]);
        }

        
        notyf()->success(__('toastr.AvatarUpdatedsuccessfully'));
        return Redirect::route('admin.profile');

    }



    public function UpdatePassword(Request $request): RedirectResponse
    {


        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        notyf()->success(__('toastr.PasswordUpdatedsuccessfully'));
        return redirect()->back();
    }






}
