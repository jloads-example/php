<?php
/*
 * Handle All Requests from Frontend
 * defualt Ajax / REST requests
 */
//http://localhost/origini-app/visitor/newsletter/php/index.php
//http://localhost/origini-app/visitor/newsletter/page/index.html

include_once 'src/helpers.php';
include_once 'src/Config.php';
include_once 'src/Message.php';
include_once 'src/Rest.php';

//var_dump($_SERVER);

//if(!empty($_GET)){
//    $method = $_SERVER['REQUEST_METHOD'];
//}

//$id = explode('/', substr(@$_SERVER['PATH_INFO'], 1));


$id = getFromArray($_GET);

$message = new Visitor\Newsletter\Message();
$json = '{}';
$result = [];
$rest = new Visitor\Newsletter\Rest();

$method = 'GET';
if (!empty($_SERVER['REQUEST_METHOD'])) {
    $method = $_SERVER['REQUEST_METHOD'];
}
switch ($method) {
    case 'POST':
//        $model = getFromArray($_REQUEST);
        parse_str(file_get_contents("php://input"), $put_vars);
        $model = getFromArray($put_vars);
        $model = json_decode($model, true);
//        var_dump($_REQUEST);
        $result = $rest->post($model);
        break;

    case 'GET':
        $result = $rest->get($id);
        break;

    case 'PUT':
        parse_str(file_get_contents("php://input"), $put_vars);
        $model = getFromArray($put_vars);
        $model = json_decode($model, true);
        $result = $rest->put($id, $model);
        break;

    case 'DELETE':
        $result = $rest->delete($id);
        break;

    default:
        $message->error('Problem z połączeniem, methoda nie rozpoznana', $id);
        break;
}

$result['message']['error'] = $message->showType('error');
$json = json_encode($result);
echo $json;
