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
        if (self::checkPath($folder)) {
            $result = array();

            $it = Media::getFiles($folder);
            foreach ($it as $m) {
                if ($m->isDot()) {
                    continue;
                }
                if ($m->isDir()) {
                    array_push($result, array($m->getFilename(), true, date("F d Y H:i:s", $m->getMTime()), $m->getSize()));
                }
            }

            foreach ($it as $m) {
                if ($m->isDot()) {
                    continue;
                }
                if (!$m->isDir()) {
                    array_push($result, array($m->getFilename(), false, date("F d Y H:i:s", $m->getMTime()), $m->getSize()));
                }
            }

            return response()->json($result);
        }
        return response()->json(false);
    }

    public function addFolder()
    {
        $folder = Input::get('name');
        $path = Input::get('path');
        if (self::checkPath($path)) {
            if (Str::endsWith($path, "/")) {
                $newFolder = $path . $folder;
            } else {
                $newFolder = $path . "/" . $folder;
            }
            return response()->json(mkdir($newFolder));
        }
        return response()->json(false);
    }

    public function addFile()
    {
        $path = Input::get('path');
        if (self::checkPath($path)) {
            $files = Input::file('files');
            //$files = $files['files'];

            foreach ($files as $f) {
                if ($f->isValid()) {
                    $f->move($path, $f->getClientOriginalName());
                }
            }
            return print_r($files, true);
        }
        return response()->json(false);
    }

    public function edit() {
        $oldName = Input::get('oldName');
        $newName = Input::get('newName');
        if (self::checkPath($oldName)) {
            return response()->json(rename($oldName, $newName));
        }
        return response()->json(false);
    }

    public function delete()
    {
        $file = Input::get('file');
        if (self::checkPath($file)) {
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
        } else {
            return response()->json(array('error' => "Wrong Path!"));
        }
    }

    public static function checkPath($path) {
        if (env('APP_ENV') != 'local') {
            $realpath = realpath($path);
            return Str::startsWith($realpath, '/home/www/web376/html/vertexdezign_new/www/media'); //Specific check for my Server
        }
        return true;
    }

}