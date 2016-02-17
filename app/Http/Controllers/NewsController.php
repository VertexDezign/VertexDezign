<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller {

    public function index()
    {
        return \View::make('index')->with('entry', News::where('trash', '=', '0')->get());
    }

    public function show($name)
    {
        if (is_numeric($name)) {
            $n = News::where('id', '=', $name)->first();
            if (is_null($n)) {
                return \Redirect::to('404');
            }
            return \View::make('news')->with('entry', $n);
        } else {
            $n = News::where('name', '=', $name)->first();
            if (is_null($n)) {
                return \Redirect::to('404');
            }
            return \View::make('news')->with('entry', $n);
        }
    }
}
