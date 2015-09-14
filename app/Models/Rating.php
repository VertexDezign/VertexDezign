<?php namespace App;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model {

    protected $table = 'rating';
    protected $fillable = ['value', 'downloadId', 'WbbUId'];

    public static function getAvg($downloadId) {
        $avg = self::where('downloadId', $downloadId)->avg('value');
        if ($avg == '' || $avg == null) {
            $avg = 0;
        }
        return $avg;
    }
}