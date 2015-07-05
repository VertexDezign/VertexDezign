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
        $dirs = scandir($folder);
        unset($dirs[0]);
        unset($dirs[1]);

        $result = array();
        $i = 0;
        foreach ($dirs as $f) {
            $file = $folder . '/' . $f;
            $isDir = is_dir($file);
            if ($isDir) {
                array_push($result, array($f, $isDir, date("F d Y H:i:s", filemtime($file)), filesize($file)));
                unset($dirs[$i]);
            }
            $i++;
        }

        foreach ($dirs as $f) {
            $file = $folder . '/' . $f;
            array_push($result, array($f, false, date("F d Y H:i:s", filemtime($file)), filesize($file)));
        }

        return response()->json($result);
    }

    public function addFolder()
    {
        $folder = Input::get('name');
        return response()->json(mkdir($folder));
    }

    public function addFile()
    {
        $path = Input::get('path');
        $files = Input::file('files');
        //$files = $files['files'];

        foreach($files as $f) {
            if ($f->isValid()) {
                $f->move($path, $f->getClientOriginalName());
            }
        }

        return print_r($files, true);
    }


    public function deleteFile($file)
    {
        return response()->json(unlink($file));
    }

}