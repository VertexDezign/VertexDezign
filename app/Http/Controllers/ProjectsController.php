<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller {

    public function index()
    {
        return \View::make('projects')->with('entry', Project::all());
    }

}
