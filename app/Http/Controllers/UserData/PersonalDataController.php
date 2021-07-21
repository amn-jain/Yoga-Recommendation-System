<?php

namespace App\Http\Controllers\UserData;

use App\Http\Controllers\Controller;
use App\Models\PersonalData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Exception;

class PersonalDataController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $data = Auth::user();
        try {
            $users = DB::table('personal_data')->orderBy('id', 'desc')->where('uid', $data->id)->first();
            return view('Profile.index', ['first_name' => $users->first_name, 'last_name' => $users->last_name, 'weight' => $users->weight, 'height' => $users->height, 'DOB' => $users->DOB, 'gender' => $users->gender, 'level' => $users->level, 'profile_image' => $users->profile_image]);
        } catch (Exception $e) {
            $users = DB::table('personal_data')->orderBy('id', 'desc')->where('uid', $data->id)->first();
            return view('Profile.index');
        }
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $personal_data = DB::table('personal_data')->orderBy('id', 'desc')->where('uid', $user->id)->first();
        if ($request->has('image_form')) {
            $this->validate($request, [
                'profile_image' => 'required'
            ]);

            if ($request->hasFile('profile_image')) {
                $image = $request->file('profile_image');
                $name = $image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension();
                $filename = uniqid() . $name . $extension;
                $image->storeAs('profile_images', $filename, 'public');
                if (is_null($personal_data)) {
                    PersonalData::create([
                        'uid' => Auth()->user()->id,
                        'profile_image' => $filename
                    ]);
                } else {
                    DB::update('update personal_data set profile_image = ? where uid = ?', [$filename, $user->id]);
                }
            }
        }

        if ($request->has('image_reset_form')) {
            if (!is_null($personal_data)) {
                $filename = "user.png";
                DB::update('update personal_data set profile_image = ? where uid = ?', [$filename, $user->id]);
            }
        }

        if ($request->has('profile_form')) {
            $this->validate($request, [
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'level' => 'required',
                'DOB' => ['required', 'date_format:Y-m-d', 'before:today'],
                'gender' => ['required', 'string'],
                'height' => 'required',
                'weight' => 'required'

            ]);
            if (is_null($personal_data)) {
                PersonalData::create([
                    'uid' => Auth()->user()->id,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'level' => $request->level,
                    'DOB' => $request->DOB,
                    'gender' => $request->gender,
                    'height' => $request->height,
                    'weight' => $request->weight
                ]);
            } else {
                DB::update('update personal_data set first_name = ?, last_name = ?, level = ?, DOB = ?, gender = ?, height = ?, weight = ? where uid = ?', [$request->first_name, $request->last_name, $request->level, $request->DOB, $request->gender, $request->height, $request->weight, $user->id]);
            }
        }

        return redirect()->route('Profile.index');
    }
}
