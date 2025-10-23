<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\GeneralSettings;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;

class SettingsController extends Controller
{
    public function index(): view
    {
        $generalsettings = GeneralSettings::first();
        return view('admin.settings.index', compact('generalsettings'));
    }

    public function updateGeneralSettings(Request $request)
    {
        $request->validate([
            'site_name' => ['required','max:200'],
            'layout' => ['required','max:200'],
            'contact_email' => ['required','email','max:200'],
            'contact_phone' => ['required', 'max:50', 'regex:/^0[5-6-7][0-9]{8}$/'],
            'currency_icon' => ['required','max:200'],
            'currency_name' => ['required','max:200', Rule::in(config('settings.currency_list'))],
            'time_zone' => ['required','max:200', Rule::in(array_keys(config('settings.time_zone')))],
        ]);

        GeneralSettings::updateOrCreate(['id' => 1],
            [
                'site_name' => $request->site_name,
                'layout' => $request->layout,
                'contact_email' => $request->contact_email,
                'contact_phone' => $request->contact_phone,
                'currency_icon' => $request->currency_icon,
                'currency_name' => $request->currency_name,
                'time_zone' => $request->time_zone,
            ]
        );

        notyf()->success(__('toastr.UpdatedSuccessfully'));

        return redirect()->back();

    }
}
