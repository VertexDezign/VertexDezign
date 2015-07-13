<?php namespace App\Http\Controllers;
use App\Project;
use App\Media;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;
class BackendProjectsController extends Controller {

    public function __CONSTRUCT(){
        if( \Auth::user()->permission->name != 'admin'){
            exit;
        }
    }

    public function index()
    {
        $viewBag = array(
            'permission' => \Auth::user()->permission->name,
            'entry' => Project::where('trash', '=', '0')->get()
        );
        return \View::make('backend.projects.index', $viewBag);
    }

    public function show($id)
    {
        $path = base_path() .'/www/media/';
        $viewBag = array(
            'permission' => \Auth::user()->permission->name,
            'entry' => Project::find($id),
            'files' => Media::getFiles($path),
        );
        return \View::make('backend.projects.show', $viewBag);
    }

    public function add()
    {
        $path = base_path() .'/www/media/';
        $viewBag = array(
            'permission' => \Auth::user()->permission->name,
            'files' => Media::getFiles($path),
        );
        return \View::make('backend.projects.show', $viewBag);
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
            'images'=>\Input::get('pathString'),
            'user_id'=>\Input::get('user_id'),
            // --*
            '_token'=>\Input::get('_token')
        );
        unset($entry['_token']);

        if (isset($entry)){
            Project::create($entry);
            return \Redirect::route('project')->with('success', 'Project added successfully!');
        }else{
            return \Redirect::route('add_project')->with('error', 'Failed to add, invalid credentials.');
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
            'images'=>\Input::get('pathString'),
            'user_id'=>\Input::get('user_id'),
            // --*
            '_token'=>\Input::get('_token')
        );
        unset($entry['_token']);
        $id = \Input::get('id');

        if (isset($id)){
            Project::where('id',$id)->update($entry);
            return \Redirect::route('project')->with('success', $entry['name'].' updated successfully!');
        }else{
            return \Redirect::route('edit_project')->with('error', 'Failed to update, invalid credentials.');
        }
    }

    public function delete($id)
    {
        $entry = Project::find($id);

        if (isset($entry)){
            Project::where('id',$id)->update(array('trash' => 1));
            return \Redirect::route('project', array($id))->with('success', $entry->title.' deleted successfully!');
        }else{
            return \Redirect::route('project', array($id))->with('error', 'Failed to delete, invalid credentials.');
        }
    }
}