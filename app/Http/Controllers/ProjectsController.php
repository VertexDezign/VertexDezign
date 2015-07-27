<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller {

    public function index()
    {
        if(\Auth::check()){
            if( \Auth::user()->permission->name == 'admin') {
                return \View::make('projects.index')->with('entry', Project::where('trash', '=', '0')->get());
            }
        }else{
            return \View::make('projects.index')->with('entry', Project::where('trash', '=', '0')->where('state', '=', '1')->get());
        }
    }

    public function filter()
    {
        $filter = \Input::get('filter');

        if(\Auth::check()){
            if( \Auth::user()->permission->name == 'admin') {
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
        }else{
            if($filter == 'All'){
                return \View::make('projects.index')->with('entry', Project::where('trash', '=', '0')->where('state', '=', '1')->get());
            }elseif($filter == 'Maps'){
                return \View::make('projects.index')->with('entry', Project::where('trash', '=', '0')->where('state', '=', '1')->where('category', '=', '4')->get());
            }elseif($filter == 'Mods'){
                return \View::make('projects.index')->with('entry', Project::where('trash', '=', '0')->where('state', '=', '1')->where('category', '=', '1')->orWhere('category', '=', '2')->orWhere('category', '=', '3')->orWhere('category', '=', '5')->orWhere('category', '=', '7')->get());
            }elseif($filter == 'Scripts'){
                return \View::make('projects.index')->with('entry', Project::where('trash', '=', '0')->where('state', '=', '1')->where('category', '=', '6')->get());
            }
        }
    }

    public function show($id)
    {
        if(\Auth::check()){
            if( \Auth::user()->permission->name == 'admin') {
                return \View::make('projects.show')->with('entry', Project::where('trash', '=', '0')->find($id));
            }
        }else{
            return \View::make('projects.show')->with('entry', Project::where('trash', '=', '0')->where('state', '=', '1')->find($id));
        }
    }
}
