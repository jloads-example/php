<?php

//include_once 'Crud.php';

namespace Visitor\Newsletter;


class Rest //implements Crud
{

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

    public function get($id)
    {
        return [
            "input" => [
                "id" => $id,
            ],
            "message" => [
                'info' => 'GET READ',
            ]
        ];
    }

    public function put($id, $model)
    {
        return [
            "input" => [
                "id" => $id,
                "data" => $model,
            ],
//            "output" => $put_vars,
            "message" => [
                'info' => 'PUT UPDATE',
            ]
        ];
    }

    public function delete($id)
    {
        return [
            "input" => [
                "id" => $id,
            ],
            "message" => [
                'info' => 'DELETE',
            ]
        ];
    }


}