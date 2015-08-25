<?php namespace App\Http\Controllers;
use App\Downloads;
use App\Media;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;
class BackendDownloadsController extends Controller {

    public function __CONSTRUCT(){
        if( \Auth::user()->permission->name != 'admin'){
            exit;
        }
    }

    public function index()
    {
        $viewBag = array(
            'permission' => \Auth::user()->permission->name,
            'entry' => Downloads::where('trash', '=', '0')->get()
        );
        return \View::make('backend.downloads.index', $viewBag);
    }

    public function show($id)
    {
        $path = base_path() .'/www/media/';
        $viewBag = array(
            'permission' => \Auth::user()->permission->name,
            'entry' => Downloads::find($id),
            'files' => Media::getFiles($path),
        );
        return \View::make('backend.downloads.show', $viewBag);
    }

    public function add()
    {
        $path = base_path() .'/www/media/';
        $viewBag = array(
            'permission' => \Auth::user()->permission->name,
            'files' => Media::getFiles($path),
        );
        return \View::make('backend.downloads.show', $viewBag);
    }

    public function insert()
    {
        $entry = array(
            'name'=>\Input::get('name'),
            'title'=>\Input::get('title'),
            'state'=>\Input::get('state'),
            'category'=>\Input::get('category'),
            'desc'=>\Input::get('desc'),
            'info'=>\Input::get('info'),
            'features'=>\Input::get('features'),
            'credits'=>\Input::get('credits'),
            'log'=>\Input::get('log'),
            'images'=>\Input::get('images'),
            'download'=>\Input::get('download'),
            'downloadExtern'=>\Input::get('downloadExtern'),
            'user_id'=>\Input::get('user_id'),
            // --*
            '_token'=>\Input::get('_token')
        );
        unset($entry['_token']);

        if (isset($entry)){
            Downloads::create($entry);
            return \Redirect::route('downloads')->with('success', 'Download added succesfully!');
        }else{
            return \Redirect::route('add_downloads')->with('error', 'Failed to add, invalid credentials.');
        }
    }

    public function update()
    {
        $entry = array(
            'name'=>\Input::get('name'),
            'title'=>\Input::get('title'),
            'state'=>\Input::get('state'),
            'category'=>\Input::get('category'),
            'desc'=>\Input::get('desc'),
            'info'=>\Input::get('info'),
            'features'=>\Input::get('features'),
            'credits'=>\Input::get('credits'),
            'log'=>\Input::get('log'),
            'images'=>\Input::get('images'),
            'download'=>\Input::get('download'),
            'downloadExtern'=>\Input::get('downloadExtern'),
            'user_id'=>\Input::get('user_id'),
            // --*
            '_token'=>\Input::get('_token')
        );
        unset($entry['_token']);
        $id = \Input::get('id');

        if (isset($id)){
            Downloads::where('id',$id)->update($entry);
            return \Redirect::route('downloads')->with('success', Input::get('title').' updated succesfully!');
        }else{
            return \Redirect::route('edit_downloads', array($id))->with('error', 'Failed to update, invalid credentials.');
        }
    }

    public function delete($id)
    {
        $entry = Downloads::find($id);

        if (isset($entry)){
            Downloads::where('id',$id)->update(array('trash' => 1));
            return \Redirect::route('downloads', array($id))->with('success', $entry->title.' deleted succesfully!');
        }else{
            return \Redirect::route('downloads', array($id))->with('error', 'Failed to delete, invalid credentials.');
        }
    }
}