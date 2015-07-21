<?php namespace App;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model {

    protected $table = 'partner';
    protected $fillable = ['title', 'link', 'image'];
}