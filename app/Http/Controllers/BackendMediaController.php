<?php namespace App\Http\Controllers;
use App\Project;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
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


    public function getFolderContent()
    {
        $folder = Input::get('folder');
        //TODO Advanced, add CreateDate and/or modified Date
        $dirs = scandir($folder);
        unset($dirs[0]);
        unset($dirs[1]);

        $result = array();
        foreach ($dirs as $f) {
            $file = $folder . '/' . $f;
            array_push($result, array($f, is_dir($file),  date ("F d Y H:i:s.", filemtime($file)), filesize($file)));
        }
        return response()->json($result);
    }

    public function addFolder()
    {
        $folder = Input::get('name');
        return response()->json(mkdir($folder));
    }

    public function addFile($file)
    {
        //TODO
    }


    public function deleteFile($file)
    {
        return response()->json(unlink($file));
    }

}