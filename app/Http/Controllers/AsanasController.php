<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsanasController extends Controller
{
    public function index($AID)
    {
        $asan = DB::table('asanas')->orderBy('AID', 'desc')->where('AID', $AID)->first();
        return view('asanas', ['asan' => $asan]);
    }

    public function store($request)
    {
    }
}
