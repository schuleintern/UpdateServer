<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;

class ApiBranchController extends Controller
{
    public function getAllBranches(Request $request) {

        $response = [];

        $branches = Branch::all();

        foreach($branches as $branch) {
            $response[] = [
                'Name' => $branch->name,
                'IsStable' => $branch->isStable > 0,
                'Desc' => $branch->desc
            ];
        }

        return response()->json($response, 200);
    }
}
