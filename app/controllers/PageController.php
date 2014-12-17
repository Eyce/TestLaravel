<?php
class PageController extends BaseController {

    public function show($n)
    {
        return Response::make('Je suis la page '.$n.' !', 200);
    }

}