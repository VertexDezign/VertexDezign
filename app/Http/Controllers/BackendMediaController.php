<?php namespace App\Http\Controllers;
use App\Project;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;
class BackendMediaController extends Controller {

    public function __CONSTRUCT(){
        if( \Auth::user()->permission->name != 'admin'){
            exit;
        }
    }

    public function index()
    {
        $viewBag = array(
            'permission' => \Auth::user()->permission->name,
//            'entry' => Downloads::where('trash', '=', '0')->get()
        );
        return \View::make('backend.media.index', $viewBag);
    }


}