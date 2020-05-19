<?php

namespace Visitor\Newsletter;


interface Crud
{

    public function create();

    public function read();

    public function update();

    public function delete();
}