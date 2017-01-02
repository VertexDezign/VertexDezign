<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{

    public function index()
    {
        if (\Auth::check()) {
            if (\Auth::user()->permission->name == 'admin') {
                return \View::make('projects.index')->with('entry', Project::where('trash', '=', '0')->orderBy('created_at', 'desc')->get());
            }
        } else {
            return \View::make('projects.index')->with('entry', Project::where('trash', '=', '0')->where('state', '=', '1')->orderBy('created_at', 'desc')->get());
        }
    }

    public function filter()
    {
        $filter = \Input::get('filter');

        if (\Auth::check()) {
            if (\Auth::user()->permission->name == 'admin') {
                if ($filter == 'All') {
                    return \View::make('projects.index')->with('entry', Project::where('trash', '=', '0')->orderBy('created_at', 'desc')->get());
                } elseif ($filter == 'Maps') {
                    return \View::make('projects.index')->with('entry', Project::where('trash', '=', '0')->where('category', '=', '4')->orderBy('created_at', 'desc')->get());
                } elseif ($filter == 'Mods') {
                    return \View::make('projects.index')->with('entry', Project::where('trash', '=', '0')->where(function ($query) {$query->where('category', '=', '1')->orWhere('category', '=', '2')->orWhere('category', '=', '3')->orWhere('category', '=', '5')->orWhere('category', '=', '7');})->orderBy('created_at', 'desc')->get());
                } elseif ($filter == 'Scripts') {
                    return \View::make('projects.index')->with('entry', Project::where('trash', '=', '0')->where('category', '=', '6')->orderBy('created_at', 'desc')->get());
                }
            }
        } else {
            if ($filter == 'All') {
                return \View::make('projects.index')->with('entry', Project::where('trash', '=', '0')->where('state', '=', '1')->orderBy('created_at', 'desc')->get());
            } elseif ($filter == 'Maps') {
                return \View::make('projects.index')->with('entry', Project::where('trash', '=', '0')->where('state', '=', '1')->where('category', '=', '4')->orderBy('created_at', 'desc')->get());
            } elseif ($filter == 'Mods') {
                return \View::make('projects.index')->with('entry', Project::where('trash', '=', '0')->where('state', '=', '1')->where(function ($query) {$query->where('category', '=', '1')->orWhere('category', '=', '2')->orWhere('category', '=', '3')->orWhere('category', '=', '5')->orWhere('category', '=', '7');})->orderBy('created_at', 'desc')->get());
            } elseif ($filter == 'Scripts') {
                return \View::make('projects.index')->with('entry', Project::where('trash', '=', '0')->where('state', '=', '1')->where('category', '=', '6')->orderBy('created_at', 'desc')->get());
            }
        }
    }

    public function show($name)
    {
        if (\Auth::check() && \Auth::user()->permission->name == 'admin') {
            if (is_numeric($name)) {
                $p = Project::where('id', '=', $name)->where('trash', '=', '0')->first();
                if (is_null($p)) {
                    return \Redirect::to('404');
                }
                return \View::make('projects.show')->with('entry', $p);
            } else {
                $p = Project::where('name', '=', $name)->where('trash', '=', '0')->first();
                if (is_null($p)) {
                    return \Redirect::to('404');
                }
                return \View::make('projects.show')->with('entry', $p);
            }
        } else {
            if (is_numeric($name)) {
                $p = Project::where('id', '=', $name)->where('trash', '=', '0')->where('state', '=', '1')->first();
                if (is_null($p)) {
                    return \Redirect::to('404');
                }
                return \View::make('projects.show')->with('entry', $p);
            } else {
                $p = Project::where('name', '=', $name)->where('trash', '=', '0')->where('state', '=', '1')->first();
                if (is_null($p)) {
                    return \Redirect::to('404');
                }
                return \View::make('projects.show')->with('entry', $p);
            }
        }
    }
}
