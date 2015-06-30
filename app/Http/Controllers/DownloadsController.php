<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Downloads;
use Illuminate\Http\Request;

class DownloadsController extends Controller {

    public function index()
    {
        return \View::make('downloads.index')->with('entry', Downloads::all());
    }

    public function show($id)
    {
        return \View::make('downloads.show')->with('entry', Downloads::findOrFail($id));
    }
}
