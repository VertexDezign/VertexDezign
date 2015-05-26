<?php namespace App\Http\Controllers;
use App\Downloads;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;
class BackendDownloadsController extends Controller {

    public function index()
    {
        return \View::make('backend.downloads.index')->with('entry', Downloads::all());
    }

    public function show($id)
    {
        return \View::make('backend.downloads.show')->with('entry', Downloads::findOrFail($id));
    }

    public function add()
    {
        return \View::make('backend.downloads.show');
    }

    public function insert()
    {
        $entry = array(
            'id'=>Input::get('id'),
            'title'=>Input::get('title'),
            'body'=>Input::get('body'),
            'author_id'=>Input::get('author_id')
        );

        if (isset($entry)){
            Downloads::create($entry);
            return \Redirect::route('downloads', array($entry['id']))->with('succes', 'Download added succesfully!');
        }else{
            return \Redirect::route('add_downloads', array($entry['id']))->with('error', 'Failed to add, invalid credentials.');
        }
    }

    public function update()
    {
        $id = Input::get('id');
        //$validation = News::validate(Input::all());

        if (isset($id)){
            Downloads::where('id',$id)->update(array(
                'title'=>Input::get('title'),
                'body'=>Input::get('body'),
                'author_id'=>Input::get('author_id')
            ));
            return \Redirect::route('downloads', array($id))->with('succes', Input::get('title').' updated succesfully!');
        }else{
            return \Redirect::route('edit_downloads', array($id))->with('error', 'Failed to update, invalid credentials.');
        }
    }

    public function delete($id)
    {
        $entry = Downloads::findOrFail($id);

        if (isset($entry)){
            $entry->delete();
            return \Redirect::route('downloads', array($id))->with('succes', $entry->title.' deleted succesfully!');
        }else{
            return \Redirect::route('downloads', array($id))->with('error', 'Failed to delete, invalid credentials.');
        }
    }
}