<?php namespace App\Http\Controllers;
use App\News;
use App\Media;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;
class BackendNewsController extends Controller {

    public function __CONSTRUCT(){
        if( \Auth::user()->permission->name != 'admin'){
            exit;
        }
    }

    public function index()
    {
        $viewBag = array(
            'permission' => \Auth::user()->permission->name,
            'entry' => News::where('trash', '=', '0')->get(),
        );
        return \View::make('backend.news.index', $viewBag);
    }

    public function show($id)
    {
        $viewBag = array(
            'permission' => \Auth::user()->permission->name,
            'entry' => News::find($id),
        );
        return \View::make('backend.news.show', $viewBag);
    }

    public function add()
    {
        $viewBag = array(
            'permission' => \Auth::user()->permission->name,
        );
        return \View::make('backend.news.show', $viewBag);
    }

    public function insert()
    {
        $entry = array(
            'id'=>Input::get('id'),
            'name'=>strtolower(Input::get('name')),
            'title'=>Input::get('title'),
            'body'=>Input::get('body'),
            'image'=>Input::get('image'),
            'author_id'=>Input::get('author_id')
        );

        if (isset($entry)){
            News::create($entry);
            return \Redirect::route('news')->with('success', $entry['title'].' added succesfully!');
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
                'name'=>strtolower(Input::get('name')),
                'title'=>Input::get('title'),
                'body'=>Input::get('body'),
                'image'=>Input::get('image'),
                'author_id'=>Input::get('author_id')
            ));
            return \Redirect::route('news')->with('success', Input::get('title').' updated succesfully!');
        }else{
            return \Redirect::route('edit_news', array($id))->with('error', 'Failed to update, invalid credentials.');
        }
    }

    public function delete($id)
    {
        $entry = News::find($id);

        if (isset($entry)){
            News::where('id',$id)->update(array('trash' => 1));
            return \Redirect::route('news')->with('success', $entry->title.' deleted succesfully!');
        }else{
            return \Redirect::route('news')->with('error', 'Failed to delete, invalid credentials.');
        }
    }
}