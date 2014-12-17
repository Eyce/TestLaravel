<?php namespace Lib\Handler;

use Str;
use Config;

class PhotoHandler implements PhotoHandlerInterface {

    public function save($image)
    {
        $chemin = Config::get('image.path');
        $extension = $image->getClientOriginalExtension();
        do {
            $nom = Str::random(10) . '.' . $extension;
        } while(file_exists($chemin . '/' . $nom));
        return $image->move($chemin, $nom);
    }

}