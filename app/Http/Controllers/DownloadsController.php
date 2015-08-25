<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Downloads;
use Illuminate\Http\Request;

class DownloadsController extends Controller {

    public function index()
    {
        if(\Auth::check()){
            if( \Auth::user()->permission->name == 'admin') {
                return \View::make('downloads.index')->with('entry', Downloads::where('trash', '=', '0')->get());
            }
        }else{
            return \View::make('downloads.index')->with('entry', Downloads::where('trash', '=', '0')->where('state', '=', '1')->orderBy('created_at', 'desc')->get());
        }
    }

    public function filter()
    {
        $filter = \Input::get('filter');

        if(\Auth::check()){
            if( \Auth::user()->permission->name == 'admin') {
                if($filter == 'All'){
                    return \View::make('downloads.index')->with('entry', Downloads::where('trash', '=', '0')->orderBy('created_at', 'desc')->get());
                }elseif($filter == 'Maps'){
                    return \View::make('downloads.index')->with('entry', Downloads::where('trash', '=', '0')->where('category', '=', '4')->orderBy('created_at', 'desc')->get());
                }elseif($filter == 'Mods'){
                    return \View::make('downloads.index')->with('entry', Downloads::where('trash', '=', '0')->where('category', '=', '1')->orWhere('category', '=', '2')->orWhere('category', '=', '3')->orWhere('category', '=', '5')->orWhere('category', '=', '7')->orderBy('created_at', 'desc')->get());
                }elseif($filter == 'Scripts'){
                    return \View::make('downloads.index')->with('entry', Downloads::where('trash', '=', '0')->where('category', '=', '6')->orderBy('created_at', 'desc')->get());
                }
            }
        }else{
            if($filter == 'All'){
                return \View::make('downloads.index')->with('entry', Downloads::where('trash', '=', '0')->where('state', '=', '1')->orderBy('created_at', 'desc')->get());
            }elseif($filter == 'Maps'){
                return \View::make('downloads.index')->with('entry', Downloads::where('trash', '=', '0')->where('state', '=', '1')->where('category', '=', '4')->orderBy('created_at', 'desc')->get());
            }elseif($filter == 'Mods'){
                return \View::make('downloads.index')->with('entry', Downloads::where('trash', '=', '0')->where('state', '=', '1')->where('category', '=', '1')->orWhere('category', '=', '2')->orWhere('category', '=', '3')->orWhere('category', '=', '5')->orWhere('category', '=', '7')->orderBy('created_at', 'desc')->get());
            }elseif($filter == 'Scripts'){
                return \View::make('downloads.index')->with('entry', Downloads::where('trash', '=', '0')->where('state', '=', '1')->where('category', '=', '6')->orderBy('created_at', 'desc')->get());
            }
        }
    }

    public function show($id)
    {
        if(\Auth::check()){
            if( \Auth::user()->permission->name == 'admin') {
                return \View::make('downloads.show')->with('entry', Downloads::where('trash', '=', '0')->find($id));
            }
        }else{
            return \View::make('downloads.show')->with('entry', Downloads::where('trash', '=', '0')->where('state', '=', '1')->find($id));
        }
    }
}
