<?php namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
class Project extends Model implements AuthenticatableContract, CanResetPasswordContract {
    use Authenticatable, CanResetPassword;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'projects';
    /**
 * The attributes that are mass assignable.
 *
 * @var array
 */
    protected $fillable = ['name', 'title', 'state', 'category', 'desc', 'info', 'features', 'credits', 'log', 'images', 'user_id'];

    public function user_id()
    {
        return $this->belongsTo('User');
    }

}