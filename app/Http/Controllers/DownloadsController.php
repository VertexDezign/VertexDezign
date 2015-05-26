<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//use App\Downloads;
use Illuminate\Http\Request;

class DownloadsController extends Controller {

    public function index()
    {
        return view('download');
    }

}
