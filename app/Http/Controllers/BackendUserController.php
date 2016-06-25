<?php namespace App\Http\Controllers;
use App\User;
use App\Http\Requests;
use Input;

class BackendUserController extends Controller {

    public function __CONSTRUCT() {
        if( \Auth::user()->permission->name != 'admin') {
            exit;
        }
    }

    public function index() {
        $viewBag = array(
            'permission' => \Auth::user()->permission->name,
            'entry' => User::where('trash', '=', '0')->get()
//            todo: add index page
        );
        return \View::make('backend.users.index', $viewBag);
    }

    public function accountManagement($username) {
        $viewBag = array(
            'permission' => \Auth::user()->permission->name,
            'entry' => User::where('username', '=', $username)->first()
        );
        return \View::make('backend.user.show', $viewBag);
    }
}