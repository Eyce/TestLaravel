<?php namespace Lib\Handler;

use Email;
use Input;

class EmailHandler implements EmailHandlerInterface{

    protected $email;

    public function __construct(Email $email)
    {
        $this->email = $email;
    }

    public function save()
    {
        $email = new $this->email;
        $email->email = Input::get('email');
        $email->save();
    }

}