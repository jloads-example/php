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

class Rest
{
    public $method;
    public $request;
    public $variable;

    /**
     * Rest constructor.
     * @param $method
     * @param $request
     * @param $variable
     */
    public function fill($method, $request, $variable)
    {
        $this->method = $method;
        $this->request = $request;
        $this->variable = $variable;
    }


    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param mixed $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @return mixed
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param mixed $request
     */
    public function setRequest($request)
    {
        $this->request = $request;
    }

    /**
     * @return mixed
     */
    public function getVariable()
    {
        return $this->variable;
    }

    /**
     * @param mixed $variable
     */
    public function setVariable($variable)
    {
        $this->variable = $variable;
    }

}