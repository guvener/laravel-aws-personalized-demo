<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Viewer;
use Illuminate\Support\Arr;

class PersonalizeController extends Controller
{
    // https://docs.aws.amazon.com/aws-sdk-php/v3/api/api-personalize-runtime-2018-05-22.html
    public function show(Viewer $viewer){
        $recommendations = $viewer->personalizedMovies();
        return view('viewers.personalize', compact('viewer', 'recommendations'));
    }
}
