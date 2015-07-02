<?php namespace App\Http\Controllers;
use App\Downloads;
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
        $viewBag = array(
            'permission' => \Auth::user()->permission->name,
            'entry' => Downloads::find($id)
        );
        return \View::make('backend.downloads.show', $viewBag);
    }

    public function add()
    {
        $viewBag = array(
            'permission' => \Auth::user()->permission->name
        );
        return \View::make('backend.downloads.show', $viewBag);
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
        $entry = Downloads::find($id);

        if (isset($entry)){
            Downloads::where('id',$id)->update(array('trash' => 1));
            return \Redirect::route('downloads', array($id))->with('succes', $entry->title.' deleted succesfully!');
        }else{
            return \Redirect::route('downloads', array($id))->with('error', 'Failed to delete, invalid credentials.');
        }
    }
}