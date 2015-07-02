<?php namespace App;
use Illuminate\Database\Eloquent\Model;

class News extends Model {

    protected $table = 'news';
    protected $fillable = ['title', 'body', 'author_id'];

    public function getAuthor()
    {
        return $this->hasOne('App\User', 'id', 'author_id' );
    }
}