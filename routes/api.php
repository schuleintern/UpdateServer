<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/branches", "ApiBranchController@getAllBranches");

Route::get("/branch/{BranchName}/version", "ApiVersionController@currentVersion");

Route::get("/release/{ReleaseID}", "ApiReleaseController@getRelease");
Route::get("/release/{ReleaseID}/download", "ApiReleaseController@downloadRelease");



Route::get("/branch/{BranchName}/versions", "ApiVersionController@allVersions");
