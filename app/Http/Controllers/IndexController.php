<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\News;
use App\Project;
use App\User;
use Illuminate\Http\Request;

class IndexController extends Controller {

	public function index()
	{
        return \View::make('index')->with('newsEntry', News::all())->with('projectsEntry', Project::all());
	}
}
