<?php namespace App;
use Illuminate\Database\Eloquent\Model;
use DirectoryIterator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Illuminate\Support\Str;

class Media extends Model {

    public static function getFiles($src)
    {
        //return new RecursiveIteratorIterator(new RecursiveDirectoryIterator($src));
        return new DirectoryIterator($src);
    }

    public static function deleteFile($file){
        return unlink($file);
    }

    public static function uploadFile($file, $target){
        if ($file->isValid()) {
            $file->move($target, $file->getClientOriginalName());
            return true;
        }
        return false;
    }

    public static function checkPath($path) {
        if (env('APP_ENV') != 'local') {
            $realpath = realpath($path);
            return Str::startsWith($realpath, '/home/www/web376/html/vertexdezign_new/www/media'); //Specific check for my Server
        }
        return true;
    }
}