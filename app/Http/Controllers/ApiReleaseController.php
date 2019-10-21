<?php

namespace App\Http\Controllers;

use App\Release;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ApiReleaseController extends Controller
{
    public function getRelease(Request $request, $releaseID) {
        $release = Release::where("id", $releaseID)->first();
        if($release === null) return response()->json([], 404);
        else return response()->json($release, 200);
    }

    public function downloadRelease(Request $request, $releaseID) {
        $release = Release::where("id", $releaseID)->first();
        if($release === null) return response()->json([], 404);


        else {
            return response()->download("../storage/app/release/release" . $release->id . ".zip","schuleintern.zip");
        }
    }
}
