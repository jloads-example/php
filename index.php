<?php
$start = (string) microtime(true);

/*
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
        header('Access-Control-Allow-Headers: token, Content-Type');
        header('Access-Control-Max-Age: 1728000');
        header('Content-Length: 0');
        header('Content-Type: text/plain');
        die();
    }
*/
/*
    var_dump($_SERVER['HTTP_ORIGIN']);
    var_dump($_SERVER);
    return 0;
*/

    if(!empty($_SERVER['HTTP_ORIGIN'])){
        $http_origin = $_SERVER['HTTP_ORIGIN'];
    } else {
        //var_dump( $_SERVER );
        //$http_origin = $_SERVER['HTTP_REFERER'];
        $http_origin = 'http://' . $_SERVER['HTTP_HOST'];
    }

    $allowed_origins = [
        "https://app.jloads.com",
        "http://app.jloads.com",
        "https://js.jloads.com",
        "http://js.jloads.com",
        "https://localhost",
        "https://localhost:8000",
        "http://localhost",
        "http://localhost:3000",
        "http://localhost:8000",
        "http://localhost:8080",
        "http://localhost:80",
    ];

    if (in_array($http_origin, $allowed_origins))
    {
        header("Access-Control-Allow-Origin: $http_origin");
    }

    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    header('Access-Control-Expose-Headers: Content-Length, X-JSON');
    header('Access-Control-Max-Age: 86400');
    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Requested-With, X-Auth-Token , Authorization, Access-Control-Allow-Headers, Access-Control-Expose-Headers, Access-Control-Allow-Methods');
    header('Content-Type: application/json');

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



$message = new Visitor\Newsletter\Message();
$json = '{}';

$rest = new Visitor\Newsletter\Rest();

$method = 'GET';
if (!empty($_SERVER['REQUEST_METHOD'])) {
    $method = $_SERVER['REQUEST_METHOD'];
}

$result = [];

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
        $result = $rest->get();
        break;

    case 'PUT':
        parse_str(file_get_contents("php://input"), $put_vars);
        $model = getFromArray($put_vars);
        $model = json_decode($model, true);
        $result = $rest->put($model);
        break;

    case 'DELETE':
        $result = $rest->delete();
        break;

    default:
        $message->error('Problem z połączeniem, metoda nie rozpoznana', $method);
        break;
}


$result['message']['error'] = $message->showType('error');

$result['time'] = [];
$result['time']['start'] = $start;
$result['time']['stop'] = (string) microtime(true);
$result['time']['during'] = $result['time']['stop'] - $result['time']['start'];

$json = json_encode($result);

echo $json;
