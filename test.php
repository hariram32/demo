<?php
/**
 * Created by PhpStorm.
 * User: DEVOP
 * Date: 6/25/2018
 * Time: 5:13 AM
 */

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
header('Content-Type: application/json');

$_POST = json_decode($_POST['data'],true);

echo json_encode($_POST);