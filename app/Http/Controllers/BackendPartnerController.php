<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Partner;
use App\Media;
use Input;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendPartnerController extends Controller {

    public function __CONSTRUCT(){
        if( \Auth::user()->permission->name != 'admin'){
            exit;
        }
    }

    public function index()
    {
        $viewBag = array(
            'permission' => \Auth::user()->permission->name,
            'entry' => Partner::where('trash', '=', '0')->get()
        );
        return \View::make('backend.partner.index', $viewBag);
    }

    public function show($id)
    {
        $path = base_path() .'/www/media/';
        $viewBag = array(
            'permission' => \Auth::user()->permission->name,
            'entry' => Partner::find($id),
            'files' => Media::getFiles($path),
        );
        return \View::make('backend.partner.show', $viewBag);
    }

    public function add()
    {
        $path = base_path() .'/www/media/';
        $viewBag = array(
            'permission' => \Auth::user()->permission->name,
            'files' => Media::getFiles($path),
        );
        return \View::make('backend.partner.show', $viewBag);
    }

    public function insert()
    {
        $entry = array(
            'title'=>Input::get('title'),
            'image'=>Input::get('image'),
            'link'=>Input::get('link')
        );

        if (isset($entry)){
            Partner::create($entry);
            return \Redirect::route('partner')->with('success', $entry['title'].' added succesfully!');
        }else{
            return \Redirect::route('add_partner', array($entry['id']))->with('error', 'Failed to add, invalid credentials.');
        }
    }
    public function update()
    {
        $id = Input::get('id');
        //$validation = News::validate(Input::all());

        if (isset($id)){
            Partner::where('id',$id)->update(array(
                'title'=>Input::get('title'),
                'image'=>Input::get('image'),
                'link'=>Input::get('link')
            ));
            return \Redirect::route('partner')->with('success', Input::get('title').' updated succesfully!');
        }else{
            return \Redirect::route('edit_partner', array($id))->with('error', 'Failed to update, invalid credentials.');
        }
    }

    public function delete($id)
    {
        $entry = Partner::find($id);

        if (isset($entry)){
            Partner::where('id',$id)->update(array('trash' => 1));
            return \Redirect::route('partner')->with('success', $entry->title.' deleted succesfully!');
        }else{
            return \Redirect::route('partner')->with('error', 'Failed to delete, invalid credentials.');
        }
    }
}
