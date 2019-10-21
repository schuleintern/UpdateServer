<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Release;
use http\Env\Response;
use Illuminate\Http\Request;

class ApiVersionController extends Controller
{
    public function currentVersion(Request $request, $branch) {
        /** @var Branch $branch */
        $branch = Branch::where("name", $branch)->first();

        if($branch === null) return response()->json([], 404);


        $currentRelease = $branch->getCurrentRelease();

        if($currentRelease != null) {
            return \response()->json($currentRelease, 200);

        }
        else return \response()->json([], 404);




    }
}
