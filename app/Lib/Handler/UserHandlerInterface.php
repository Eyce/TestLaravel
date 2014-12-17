<?php namespace Lib\Handler;

interface UserHandlerInterface {

    public function index($n);
    public function store();
    public function show($id);
    public function edit($id);
    public function update($id);
    public function destroy($id);

}