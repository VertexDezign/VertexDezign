<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model {
    protected $table = 'permissions';
    protected $guarded = ['id'];
    protected $fillable = ['name', 'timestamps'];

    public function users()
    {
        return $this->hasMany('App\User', 'permission_id', 'id');
    }
}