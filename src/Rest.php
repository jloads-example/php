<?php

//include_once 'Crud.php';

namespace Visitor\Newsletter;


class Rest //implements Crud
{

    public function getId() {
        return $id = getFromArray($_GET);
    }

//    public function getTime() {
//        return $id = getFromArray($_GET);
//    }

    public function post($model)
    {
        return [
            "input" => [
                "data" => $model,
            ],
            "message" => [
                'info' => 'POST CREATE',
            ]
        ];
    }

    public function get()
    {
        return [
            "input" => [
                "id" => $this->getId(),
            ],
            "message" => [
                'info' => 'GET READ',
            ]
        ];
    }

    public function put($model)
    {
        return [
            "input" => [
                "id" => $this->getId(),
                "data" => $model,
            ],
//            "output" => $put_vars,
            "message" => [
                'info' => 'PUT UPDATE',
            ]
        ];
    }

    public function delete()
    {
        return [
            "input" => [
                "id" => $this->getId(),
            ],
            "message" => [
                'info' => 'DELETE',
            ]
        ];
    }


}