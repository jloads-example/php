<?php

//include_once 'MessageType.php';
namespace Visitor\Newsletter;

//use Visitor\Newsletter\MessageType;


class Config
{
    /*
     * communication method
     * ajax: GET, POST
     * rest: GET, POST, PUT, DELETE
     *
     */
    public $method = 'rest';


    /*
     * which server
     */
    public $backend = 'php';

}