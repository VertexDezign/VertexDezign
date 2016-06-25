<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class LoginController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return \View::make('auth.login');
    }
    public function login() {
        $credentials = [
            'username'	=>\Input::get('username'),
            'password'	=>\Input::get('password')
        ];
        if (\Auth::attempt($credentials)) {
            return \Redirect::action('BackendController@index');
        }
        return \Redirect::action('LoginController@index')->with('error', 'Failed to login, invalid credentials.');
    }
    public function logout() {
        \Auth::logout();
        return \Redirect::action('IndexController@index');
    }
}