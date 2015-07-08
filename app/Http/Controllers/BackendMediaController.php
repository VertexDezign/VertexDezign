<?php namespace App\Http\Controllers;
use App\Media;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Exception;
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

        $result = array();

        $it = Media::getFiles($folder);
        foreach ($it as $m) {
            if($m->isDot()) {
                continue;
            }
            if ($m->isDir()) {
                array_push($result, array($m->getFilename(), true, date("F d Y H:i:s", $m->getMTime()), $m->getSize()));
            }
        }

        foreach ($it as $m) {
            if($m->isDot()) {
                continue;
            }
            if (!$m->isDir()) {
                array_push($result, array($m->getFilename(), false, date("F d Y H:i:s", $m->getMTime()), $m->getSize()));
            }
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

    public function edit() {
        $oldName = Input::get('oldName');
        $newName = Input::get('newName');

        return response()->json(rename($oldName, $newName));
    }

    public function delete()
    {

        $file = Input::get('file');
        if (is_dir($file)) {
            $result = false;
            $msg = "";
            try {
                $result = rmdir($file);
            } catch (Exception $e) {
                $msg = $e->getMessage();
            }
            return response()->json(array('type' => 'dir', 'done' => $result, 'msg' => $msg));
        } else {
            return response()->json(array('type' => 'file', 'done' => unlink($file)));
        }
    }

}