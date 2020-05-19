<?php

//include_once 'MessageType.php';
namespace Visitor\Newsletter;

//use Visitor\Newsletter\MessageType;


class Message
{
    public $environment = 'Problem ze środowiskiem';

    public $list;


    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        $this->list = [
//            MessageType::$error => [],
            'error' => [],
            'warning' => [],
            'info' => []
        ];
    }


    public function error($info, $var)
    {
        $this->add($info, $var, 'error');
    }

    public function warning($info, $var)
    {
        $this->add($info, $var, 'warning');
    }

    public function info($info, $var)
    {
        $this->add($info, $var, 'info');
    }


    public function add($info, $var = null, $type = 'error')
    {
        $vars = '';
        if (!empty($var)) {
            if (!is_numeric($var)) {
                $vars = $var;
            }
            if (is_array($var)) {
                $vars = implode(',', $var);
            }
        }

        $this->list[] = $info . '( ' . $vars . ')';
    }


    public function showType($type = 'error')
    {
        return $this->list[$type];
    }

    public function showTypeAsString($type = 'error')
    {
        return implode(',', $this->list[$type]);
    }

    public function showAll()
    {
        return $this->list;
    }

    public function showAllAsString()
    {
        $result = '';

        if (empty($this->list)) {
            return $result;
        }

        foreach ($this->list as $type) {
            $result .= implode(',', $type);
        }

        return $result;
    }

}