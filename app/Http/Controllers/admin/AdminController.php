<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use File;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Notifications\Console\NotificationTableCommand;
use Illuminate\Testing\Fluent\Concerns\Has;

class AdminController extends Controller
{
    public function index()
    {

        return view('admin.index');
    }
    public function profile()
    {
        $admin = Auth::user();
        return view('admin.profile', compact('admin'));
    }
    public function profile_data(Request $request)
    {
        /**
         * @var User $admin
         */
        $admin = Auth::user();
        $data = ['name' => $request->name];
        if ($request->has('password')) {
            $data['password'] = Hash::make($request->password);
        }
        $request->validate([
            'name' => 'required|string|max:255',
            'current_password' => 'required_with:password',
            'password' => 'nullable|string|min:8|confirmed',
        ]);
        $admin->update($data);
        if ($request->hasFile('image')) {
            if ($admin->image) {
                File::delete(public_path('images/' . $admin->image->path));
                $admin->image()->delete();
            }
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'), $imageName);
            $admin->image()->updateOrCreate(
                ['path' => $imageName]
            );
        }

        return redirect()->route('admin.profile')->with('msg', 'Profile updated successfully.');
    }
    public function check_password(Request $request)
    {
        return Hash::check($request->password, Auth::user()->password);
    }
    public function order()
    {
        if (request()->has('id')) {
            $id = request()->get('id');
            Auth::user()->notifications()->find($id)->markAsRead();

            return $id;

        }
        return 'order';
    }
    public function notification()
    {
        Auth::user()->notifications->markAsRead();
        return view('admin.notifications');
    }
}
