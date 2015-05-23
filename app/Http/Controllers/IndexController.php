<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\News;
use App\User;
use Illuminate\Http\Request;

class IndexController extends Controller {

	public function index()
	{
        $user = User::find(1);
        return \View::make('index')->with('entry', News::all());
	}
}
