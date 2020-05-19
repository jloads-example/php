<?php

function getFromArray($id)
{
    if (is_array($id) && !empty($id)) {
        if (empty(current($id))) {
            $id = key($id);
        }
    }
    return $id;
}