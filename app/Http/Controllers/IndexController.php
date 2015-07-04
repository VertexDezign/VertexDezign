<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\News;
use App\Slider;
use App\User;
use Illuminate\Http\Request;

class IndexController extends Controller {

	public function index()
	{
        $viewBag = array(
            'newsEntry' => News::where('trash', '=', '0')->orderBy('created_at', 'desc')->paginate(4),
            'sliderEntry' => Slider::where('trash', '=', '0')->get()
        );
        return \View::make('index', $viewBag);
	}

    public function indexAbout()
    {
        $viewBag = array(

        );
        return \View::make('about', $viewBag);
    }
}
