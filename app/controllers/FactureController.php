<?php
class FactureController extends BaseController {

    public function show($n)
    {
        return View::make('facture')->with('numero', $n);
    }

}