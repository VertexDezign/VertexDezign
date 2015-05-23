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
        $entry = Input::all();

        if (isset($entry)){
            Project::create($entry);
            return \Redirect::route('project', array($entry['id']))->with('success', 'Project added successfully!');
        }else{
            return \Redirect::route('add_project', array($entry['id']))->with('error', 'Failed to add, invalid credentials.');
        }
    }

    public function update()
    {
        $input = Input::all();
        $id = $input['id'];

        unset($input['_token']);

        if (isset($id)){
            Project::where('id',$id)->update($input);
            return \Redirect::route('project', array($id))->with('success', Input::get('title').' updated successfully!');
        }else{
            return \Redirect::route('edit_project', array($id))->with('error', 'Failed to update, invalid credentials.');
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