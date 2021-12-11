<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class AdminController extends Controller
{
    //Show admin dashboard
    public function index()
    {
        return view('backend.index');
    }
    //Setting admin
    public function settings()
    {
        $data = Setting::lockForUpdate()->first();
        return view('backend.setting.setting')->with('data', $data);
    }

    public function settingsUpdate(Request $request)
    {
        // dd($request);
        // return $request->all();
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string',
            'logo' => 'required',
            'address' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
        ]);
        $data = $request->all();
        // return $data;
        $settings = Setting::lockForUpdate()->first();
        $status = false;
        // dd($settings['updated_at'] == $data['updated_at']);
        if ($settings['updated_at'] == $data['updated_at']) {
            $settings['title'] = $data['title'];
            $status = $settings->fill($data)->save();
        } else {
            request()->session()->flash('error', 'Please reload page and try again');
            return redirect()->route('setting');
        }

        if ($status) {
            request()->session()->flash('success', 'Setting successfully updated');
        } else {
            request()->session()->flash('error', 'Please try again');
        }
        return redirect()->route('setting');
    }
}
