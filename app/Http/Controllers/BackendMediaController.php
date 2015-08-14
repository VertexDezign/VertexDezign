<?php namespace App\Http\Controllers;
use App\Media;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\URL;
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
        if (Media::checkPath($folder)) {
            $result = array();

            $it = Media::getFiles($folder);
            foreach ($it as $m) {
                if ($m->isDot()) {
                    continue;
                }
                if ($m->isDir()) {
                    array_push($result, array($m->getFilename(), true, date("F d Y H:i:s", $m->getMTime()), $m->getSize(), URL('images/backend/extensions/folder.png')));
                }
            }

            foreach ($it as $m) {
                if ($m->isDot()) {
                    continue;
                }
                if (!$m->isDir()) {
                    $icon = 'images/backend/extensions/' . $m->getExtension() . '.png';
                    if (!file_exists($icon)) {
                        $icon = 'images/backend/extensions/_blank.png';
                    }
                    array_push($result, array($m->getFilename(), false, date("F d Y H:i:s", $m->getMTime()), $m->getSize(), URL($icon)));
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
        if (Media::checkPath($path)) {
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
        $success = false;
        if (Media::checkPath($path)) {
            $files = Input::file('files');
            $success = true;
            foreach ($files as $f) {
                if (!Media::uploadFile($f, $path)){
                    $success = false;
                    break;
                }
            }
        }
        return response()->json($success);
    }

    public function edit() {
        $oldName = Input::get('oldName');
        $newName = Input::get('newName');
        if (Media::checkPath($oldName)) {
            return response()->json(rename($oldName, $newName));
        }
        return response()->json(false);
    }

    public function delete()
    {
        $file = Input::get('file');
        if (Media::checkPath($file)) {
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
                return response()->json(array('type' => 'file', 'done' => Media::deleteFile($file)));
            }
        } else {
            return response()->json(array('error' => "Wrong Path!"));
        }
    }

    public function getImages() {
        $path = Input::get('path');
        if (Media::checkPath('media/' . $path)) {
            $it = Media::getFiles('media/' . $path);
            $result = array();
            foreach ($it as $file) {
                if (Media::checkIfImage($file->getPath() . '/' . $file->getFilename())) {
                    array_push($result, $file->getPath() . '/' . $file->getFilename());
                }
            }
            return response()->json($result);
        }
        return response()->json(false);
    }

}