<?php namespace App\Http\Controllers;
use App\News;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;
class BackendNewsController extends Controller {

    public function index()
    {
        return \View::make('backend.news.index')->with('entry', News::all());
    }

    public function show($id)
    {
        return \View::make('backend.news.show')->with('entry', News::findOrFail($id));
    }

    public function add()
    {
        return \View::make('backend.news.show');
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
            News::create($entry);
            return \Redirect::route('news', array($entry['id']))->with('succes', 'News added succesfully!');
        }else{
            return \Redirect::route('add_news', array($entry['id']))->with('error', 'Failed to add, invalid credentials.');
        }
    }

    public function update()
    {
        $id = Input::get('id');
        //$validation = News::validate(Input::all());

        if (isset($id)){
            News::where('id',$id)->update(array(
                'title'=>Input::get('title'),
                'body'=>Input::get('body'),
                'author_id'=>Input::get('author_id')
            ));
            return \Redirect::route('news', array($id))->with('succes', Input::get('title').' updated succesfully!');
        }else{
            return \Redirect::route('edit_news', array($id))->with('error', 'Failed to update, invalid credentials.');
        }
    }

    public function delete($id)
    {
        $entry = News::findOrFail($id);

        if (isset($entry)){
            $entry->delete();
            return \Redirect::route('news', array($id))->with('succes', $entry->title.' deleted succesfully!');
        }else{
            return \Redirect::route('news', array($id))->with('error', 'Failed to delete, invalid credentials.');
        }
    }
}