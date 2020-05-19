<?php


namespace Visitor\Newsletter;


//
//HTTP Methods
//
//    GET
//    POST
//    PUT
//    HEAD
//    DELETE
//    PATCH
//    OPTIONS

class RestMethod
{
    public static $get = 'GET';
    public static $post = 'POST';

    public $method = ['GET','POST'];

    /** @var Rest */
    public $rest;


    /**
     * RestInit constructor.
     * @param Rest $rest
     */
    public function __construct(Rest $rest)
    {
        $this->rest = $rest;
    }


    public function isGet()
    {
        return $this->rest->getMethod() === self::$get;
    }

    public function isPost()
    {
        return $this->rest->getMethod() === self::$post;
    }



    public function isPut()
    {

    }

    public function isDelete()
    {

    }

    public function isPatch()
    {

    }
}