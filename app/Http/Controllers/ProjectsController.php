<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller {

    public function index()
    {
        return \View::make('projects.index')->with('entry', Project::all());
    }

    public function show($id)
    {
        return \View::make('projects.show')->with('entry', Project::findOrFail($id));
    }
}
