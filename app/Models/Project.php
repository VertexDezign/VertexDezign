<?php namespace App;
use Illuminate\Database\Eloquent\Model;

class Project extends Model {

    protected $table = 'projects';
    protected $fillable = ['name', 'title', 'state', 'category', 'desc', 'info', 'features', 'credits', 'log', 'images', 'user_id'];

    public function user_id()
    {
        return $this->belongsTo('User');
    }

}