<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Permission;
use Illuminate\Http\Request;

class BackendController extends Controller {

    public function index()
    {
        $viewBag = array(
            'permission' => \Auth::user()->permission->name,
        );
        return \View::make('backend.index', $viewBag);
    }

}
