<?php

use Lib\Validation\PhotoValidator as PhotoValidator;
use Lib\Handler\PhotoHandler as PhotoHandler;

class PhotoController extends BaseController {

    protected $photohandler;

    public function __construct(PhotoValidator $validation, PhotoHandler $photohandler)
    {
        parent::__construct();
        $this->validation = $validation;
        $this->photohandler = $photohandler;
    }

    public function getForm()
    {
        return View::make('photo');
    }

    public function postForm()
    {
        if ($this->validation->fails()) {
            return Redirect::to('photo/form')
                ->withErrors($this->validation->errors());
        } else {
            if($this->photohandler->save(Input::file('image'))) {
                return View::make('photoconfirm');
            } else {
                return Redirect::to('photo/form')
                    ->with('error','Désolé mais votre image ne peut pas être envoyée !');
            }
        }
    }

}