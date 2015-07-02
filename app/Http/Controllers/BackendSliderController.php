<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Slider;
use Input;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendSliderController extends Controller {

    public function __CONSTRUCT(){
        if( \Auth::user()->permission->name != 'admin'){
            exit;
        }
    }

    public function index()
    {
        $viewBag = array(
            'permission' => \Auth::user()->permission->name,
            'entry' => Slider::where('trash', '=', '0')->get()
        );
        return \View::make('backend.slider.index', $viewBag);
    }

    public function show($id)
    {
        $viewBag = array(
            'permission' => \Auth::user()->permission->name,
            'entry' => Slider::find($id)
        );
        return \View::make('backend.slider.show', $viewBag);
    }

    public function add()
    {
        $viewBag = array(
            'permission' => \Auth::user()->permission->name
        );
        return \View::make('backend.slider.show', $viewBag);
    }

    public function insert()
    {
        $entry = array(
            'title'=>Input::get('title'),
            'desc'=>Input::get('desc'),
            'image'=>Input::get('image'),
            'link'=>Input::get('link')
        );

        if (isset($entry)){
            Slider::create($entry);
            return \Redirect::route('slider')->with('success', $entry['title'].' added succesfully!');
        }else{
            return \Redirect::route('add_slider', array($entry['id']))->with('error', 'Failed to add, invalid credentials.');
        }
    }
    public function update()
    {
        $id = Input::get('id');
        //$validation = News::validate(Input::all());

        if (isset($id)){
            Slider::where('id',$id)->update(array(
                'title'=>Input::get('title'),
                'desc'=>Input::get('desc'),
                'image'=>Input::get('image'),
                'link'=>Input::get('link')
            ));
            return \Redirect::route('slider')->with('success', Input::get('title').' updated succesfully!');
        }else{
            return \Redirect::route('edit_slider', array($id))->with('error', 'Failed to update, invalid credentials.');
        }
    }

    public function delete($id)
    {
        $entry = Slider::find($id);

        if (isset($entry)){
            Slider::where('id',$id)->update(array('trash' => 1));
            return \Redirect::route('slider')->with('success', $entry->title.' deleted succesfully!');
        }else{
            return \Redirect::route('slider')->with('error', 'Failed to delete, invalid credentials.');
        }
    }
}
