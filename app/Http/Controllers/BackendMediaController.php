<?php namespace App\Http\Controllers;
use App\Project;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;
class BackendMediaController extends Controller {

    public function index()
    {
        return \View::make('backend.media.index');//->with('entry', Project::all());
    }


}