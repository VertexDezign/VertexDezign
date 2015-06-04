<?php namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
class Downloads extends Model implements AuthenticatableContract, CanResetPasswordContract {
    use Authenticatable, CanResetPassword;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'downloads';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'body', 'author_id'];

    public function getAuthor()
    {
        return $this->hasOne('App\User', 'id', 'author_id' );
    }
}