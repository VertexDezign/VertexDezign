<?php namespace App;
use Illuminate\Database\Eloquent\Model;

class Downloads extends Model {

    protected $table = 'downloads';
    protected $fillable = ['name', 'title', 'state', 'category', 'desc', 'info', 'features', 'credits', 'log', 'images', 'download', 'user_id'];

    public function getAuthor()
    {
        return $this->hasOne('App\User', 'id', 'author_id' );
    }
}