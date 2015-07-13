<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller {

    public function index()
    {
        return \View::make('projects.index')->with('entry', Project::where('trash', '=', '0')->get());
    }

    public function filter()
    {
        $filter = \Input::get('filter');

        if($filter == 'All'){
            return \View::make('projects.index')->with('entry', Project::where('trash', '=', '0')->get());
        }elseif($filter == 'Maps'){
            return \View::make('projects.index')->with('entry', Project::where('trash', '=', '0')->where('category', '=', '4')->get());
        }elseif($filter == 'Mods'){
            return \View::make('projects.index')->with('entry', Project::where('trash', '=', '0')->where('category', '=', '1')->orWhere('category', '=', '2')->orWhere('category', '=', '3')->orWhere('category', '=', '5')->orWhere('category', '=', '7')->get());
        }elseif($filter == 'Scripts'){
            return \View::make('projects.index')->with('entry', Project::where('trash', '=', '0')->where('category', '=', '6')->get());
        }
    }

    public function show($id)
    {
        return \View::make('projects.show')->with('entry', Project::where('trash', '=', '0')->find($id));
    }
}
