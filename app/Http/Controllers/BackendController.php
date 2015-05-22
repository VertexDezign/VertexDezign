<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//use App\News;
use Illuminate\Http\Request;

class BackendController extends Controller {

    public function index()
    {
        return view('backend.index');
    }

}
