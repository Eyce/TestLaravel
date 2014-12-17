<?php
class UsersController extends BaseController {

    public function __construct()
    {
        parent::__construct();
    }

    public function getInfos()
    {
        return View::make('infos');
    }

    public function postInfos()
    {
        echo 'Le nom est ' . Input::get('nom');
    }

}