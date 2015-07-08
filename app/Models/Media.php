<?php namespace App;
use Illuminate\Database\Eloquent\Model;
use DirectoryIterator;

class Media extends Model {

    public static function getFiles($src)
    {
        return new DirectoryIterator($src);
    }

    public static function deleteFile($file){
        unlink($file);
    }

    public static function uploadFile($file, $target){
        move_uploaded_file($file, $target);
    }
}