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
        $viewBag = array(
            'newsEntry' => News::where('trash', '=', '0')->get()
        );
        return \View::make('index', $viewBag);
	}
}
