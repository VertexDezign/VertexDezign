<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Downloads;
use App\Rating;
use Illuminate\Http\Request;

class DownloadsController extends Controller {

    public function index()
    {
        if(\Auth::check()){
            if( \Auth::user()->permission->name == 'admin') {
                return \View::make('downloads.index')->with('entry', Downloads::where('trash', '=', '0')->orderBy('created_at', 'desc')->get());
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

    public function show($name)
    {
        if(\Auth::check() && \Auth::user()->permission->name == 'admin'){
            if (is_numeric($name)) {
                return \View::make('downloads.show')->with('entry', Downloads::where('id', '=', $name)->where('trash', '=', '0')->first());
            } else {
                return \View::make('downloads.show')->with('entry', Downloads::where('name', '=', $name)->where('trash', '=', '0')->first());
            }
        }else{
            if (is_numeric($name)) {
                return \View::make('downloads.show')->with('entry', Downloads::where('id', '=', $name)->where('trash', '=', '0')->where('state', '=', '1')->first());
            } else {
                return \View::make('downloads.show')->with('entry', Downloads::where('name', '=', $name)->where('trash', '=', '0')->where('state', '=', '1')->first());
            }
        }
    }

    public function rate($id) {
        $wbbUId = \Input::get('wbbUId');
        $i = explode('_',explode(' ',\Input::get('clickedOn'))[0])[1];
        $c = Rating::where('downloadId', $id)->where('WbbUId', $wbbUId)->count();
        if ($c > 0) {
            Rating::where('downloadId', $id)->where('WbbUId', $wbbUId)->update(array('value'=>$i));
        } else {
            Rating::create(array('value'=>$i, 'downloadId'=>$id, 'WbbUId'=>$wbbUId));
        }
        return response(array('avg'=>intval(round(Rating::getAvg($id)))));
    }
}
