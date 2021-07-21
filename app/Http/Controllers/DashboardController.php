<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

use App\Models\MedicalInfo;
use App\Models\Recommendation;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $data = Auth::user();
        $asanas_data = DB::table('asanas')->paginate(15);
        $tags =  DB::Table('diseases')->select('DName')->get();

        try {
            $users = DB::table('medical_infos')->orderBy('id', 'desc')->where('uid', $data->id)->first();
            $conditions = json_decode($users->conditions);

            $recommendations_data = DB::table('recommendations')->orderBy('id', 'desc')->where('uid', $data->id)->first();
            $recommendations = json_decode($recommendations_data->Recommendations_AID);
            $recom = array();
            for ($i = 0; $i < sizeof($recommendations); $i++) {
                array_push($recom, DB::table('asanas')->where('AID', $recommendations[$i])->first());
            }

            if (empty($conditions)) {
                return view('dashboard', ['conditions' => [], 'tags' => $tags, 'asanas_data' => $asanas_data, 'recommendations_data' => []]);
            }
            return view('dashboard', ['conditions' => $conditions, 'tags' => $tags, 'asanas_data' => $asanas_data, 'recommendations_data' => $recom]);
        } catch (Exception $e) {
            return view('dashboard', ['conditions' => [], 'tags' => $tags, 'asanas_data' => $asanas_data, 'recommendations_data' => []]);
        }
    }

    public function store(Request $request)
    {
        MedicalInfo::create([
            'uid' => Auth()->user()->id,
            'conditions' => json_encode($request->conditions)
        ]);

        $data = Auth::user();
        $users = DB::table('medical_infos')->orderBy('id', 'desc')->where('uid', $data->id)->first();
        $conditions = $users->conditions;

        $process = new Process(['python3', '../ML.py', $conditions]);
        $process->run();

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        $results = $process->getOutput();
        $array = array_filter(explode("\n", $results));
        // return dd($array);
        $Recommendations_AID = array();
        for ($i = 0; $i < sizeof($array); $i++) {
            array_push($Recommendations_AID, (int)$array[$i]);
        }
        // return dd($Recommendations_AID);
        Recommendation::create([
            'uid' => Auth()->user()->id,
            'Recommendations_AID' => json_encode($Recommendations_AID)
        ]);

        return redirect()->route('dashboard');
    }
}
