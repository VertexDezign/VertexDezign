<?php namespace App\Http\Controllers;
use App\Project;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;
class BackendProjectsController extends Controller {

    public function index()
    {
        return \View::make('backend.projects.index')->with('entry', Project::all());
    }

    public function show($id)
    {
        return \View::make('backend.projects.show')->with('entry', Project::findOrFail($id));
    }

    public function add()
    {
        return \View::make('backend.projects.show');
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
//            'images'=>\Input::get('images'),
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
            // 'images'=>\Input::get('images'),
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
        $entry = Project::findOrFail($id);

        if (isset($entry)){
            $entry->delete();
            return \Redirect::route('project', array($id))->with('success', $entry->title.' deleted successfully!');
        }else{
            return \Redirect::route('project', array($id))->with('error', 'Failed to delete, invalid credentials.');
        }
    }
}