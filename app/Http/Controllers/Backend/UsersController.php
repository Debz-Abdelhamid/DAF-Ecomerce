<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function index(): View
    {
        $users = User::where('role','vendor')->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function create(): View
    {
       
        return view('admin.users.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'role' => ['required', Rule::in('vendor')],
            'status' => ['required', Rule::in('active','inactive')],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'status' => $request->status,
            'password' => Hash::make($request->password),
        ]);

        notyf()->success('Created Successfully');
        return redirect()->route('admin.users.index');
    }

    public function edit(string $id): View
    {
        $user= User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
            'role' => ['required', Rule::in('vendor')],
            'status' => ['required', Rule::in('active','inactive')], 
        ]);



        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'status' => $request->status,
            
        ]);   

        notyf()->success('Updated Successfully');
        return redirect()->route('admin.users.index');
    }


    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        if($user->products()->exists())
        {
            return response()->json([
                'status' => 'error',
                'message' => 'This Admin Have Products. You have to delete the Products Of this Admin first!',
            ]);
        }

        $user->delete();

        notyf()->success('Deleted Successfully');

        return response()->json([
            'status' => 'success',
            'type' => 'user',
            'message' => 'User deleted successfully!'
        ]);
    }


    
} 
