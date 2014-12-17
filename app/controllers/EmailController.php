<?php

use Lib\Validation\EmailValidator as EmailValidator;
use Lib\Handler\EmailHandler as EmailHandler;

class EmailController extends BaseController {

    protected $emailhandler;

    public function __construct(EmailValidator $validation, EmailHandler $emailhandler)
    {
        parent::__construct();
        $this->validation = $validation;
        $this->emailhandler = $emailhandler;
    }

    public function getForm()
    {
        return View::make('email');
    }

    public function postForm()
    {
        if ($this->validation->fails()) {
            return Redirect::to('email/form')
                ->withErrors($this->validation->errors());
        } else {
            $this->emailhandler->save();
            return View::make('email_ok');
        }
    }

}