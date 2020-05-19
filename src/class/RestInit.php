<?php


namespace Visitor\Newsletter;


class RestInit
{
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


    public function fromGlobalServer()
    {
        $this->rest->setMethod($_SERVER['REQUEST_METHOD']);
        $this->rest->setRequest(explode("/", substr(@$_SERVER['PATH_INFO'], 1)));

        return $this;
    }

    /**
     * @return Rest
     */
    public function getRest()
    {
        return $this->rest;
    }

    /**
     * @param Rest $rest
     * @return RestInit
     */
    public function setRest($rest)
    {
        $this->rest = $rest;
        return $this;
    }


}