<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//use App\Projects;
use Illuminate\Http\Request;

class ProjectsController extends Controller {

    public function index()
    {
        return view('index');
    }

}
