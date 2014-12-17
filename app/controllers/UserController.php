<?php

use Lib\Validation\UserCreateValidator as UserCreateValidator;
use Lib\Validation\UserUpdateValidator as UserUpdateValidator;
use Lib\Handler\UserHandler as UserHandler;

class UserController extends BaseController {

    protected $create_validation;
    protected $update_validation;
    protected $user_handler;

    public function __construct(
        UserCreateValidator $create_validation,
        UserUpdateValidator $update_validation,
        UserHandler $user_handler
    )
    {
        parent::__construct();
        $this->beforeFilter('auth');
        $this->create_validation = $create_validation;
        $this->update_validation = $update_validation;
        $this->user_handler = $user_handler;
    }

    public function index()
    {
        return View::make('user/index', $this->user_handler->index(4));
    }

    public function create()
    {
        return View::make('user/create');
    }

    public function store()
    {
        if ($this->create_validation->fails()) {
            return Redirect::route('user.create')
                ->withInput()
                ->withErrors($this->create_validation->errors());
        } else {
            $this->user_handler->store();
            return Redirect::route('user.index')
                ->with('ok','L\'utilisateur a bien été créé.');
        }
    }

    public function show($id)
    {
        return View::make('user/show',  $this->user_handler->show($id));
    }

    public function edit($id)
    {
        return View::make('user/edit',  $this->user_handler->edit($id));
    }

    public function update($id)
    {
        if ($this->update_validation->fails($id)) {
            return Redirect::route('user.edit', array($id))
                ->withInput()
                ->withErrors($this->update_validation->errors());
        } else {
            $this->user_handler->update($id);
            return Redirect::route('user.index')
                ->with('ok','L\'utilisateur a bien été modifié.');
        }
    }

    public function destroy($id)
    {
        $this->user_handler->destroy($id);
        return Redirect::back();
    }

}