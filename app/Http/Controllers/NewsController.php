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
            return \View::make('news')->with('entry', News::where('id', '=', $name)->first());
        } else {
            return \View::make('news')->with('entry', News::where('name', '=', $name)->first());
        }
    }
}
