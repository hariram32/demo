<?php
/**
 * Created by PhpStorm.
 * User: DEVOP
 * Date: 6/24/2018
 * Time: 8:18 PM
 */

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
header('Content-Type: application/json');

session_start();

include_once("lib/ApiCRUD.php");
include_once("lib/ValidData.php");

$crud = new ApiCRUD();
$validation = new ValidData();



$_POST = json_decode(file_get_contents('php://input'),true);



if(isset($_POST['register'])){

    $ip= $crud->escape_string($_POST['ip-address']);
    $names= $crud->escape_string($_POST['names']);
    $email = $crud->escape_string($_POST['email']);
    $pass = $crud->escape_string($_POST['password']);

    $msg = $validation->check_empty_filed($_POST, array('names', 'ip-address', 'email', 'password'));
    $check_ip = $validation->is_valid_ip($ip);
    $check_email = $validation->is_valid_email($email);

    // check for empty fields
    if($msg != null) {
        
        echo json_encode(["msg"=> "One of the following filed: ".$msg." is empty, empty filed is not allowed"]);
    } elseif (!$check_ip) {
        
        echo json_encode(["msg"=> "Please provide valid ip address."]);
    } elseif (!$check_email) {
        
        echo json_encode(["msg"=> "Please provide valid email address."]);
    } else {
        // if all the fields are filled (not empty)
        //insert data to database
        $result = $crud->execute("INSERT INTO users_tb(names,ip_address,role,email,password) VALUES('$names','$ip',1,'$email','$pass')");

        //display success message
        
        echo json_encode(["msg"=> "You have successfully registered!!!."],JSON_FORCE_OBJECT);
    }

}

if(isset($_POST['add-user'])){

    $ip= $crud->escape_string($_POST['ip-address']);
    $names= $crud->escape_string($_POST['names']);
    $email = $crud->escape_string($_POST['email']);
    $pass = $crud->escape_string($_POST['password']);
    $perm = $crud->escape_string($_POST['permission']);

    $msg = $validation->check_empty_filed($_POST, array('names', 'ip-address', 'email', 'password', 'permission'));
    $check_ip = $validation->is_valid_ip($ip);
    $check_email = $validation->is_valid_email($email);

    // check for empty fields
    if($msg != null) {
        
        echo json_encode(["msg"=> "One of the following filed: ".$msg." is empty, empty filed is not allowed"],JSON_FORCE_OBJECT);
    } elseif (!$check_ip) {
        
        echo json_encode(["msg"=> "Please provide valid ip address."],JSON_FORCE_OBJECT);
    } elseif (!$check_email) {
        
        echo json_encode(["msg"=> "Please provide valid email address."],JSON_FORCE_OBJECT);
    } else {
        // if all the fields are filled (not empty)
        //insert data to database
        $result = $crud->execute("INSERT INTO users_tb(names,ip_address,role, permission,email,password) VALUES('$names','$ip',0,'$perm','$email','$pass')");

        //display success message
        
        echo json_encode(["msg"=> "User Added!!!."],JSON_FORCE_OBJECT);
    }

}


if(isset($_POST['login'])){

    $email = $crud->escape_string($_POST['email']);
    $pass = $crud->escape_string($_POST['password']);
    $msg = $validation->check_empty_filed($_POST, ['email', 'password']);

    $check_email = $validation->is_valid_email($email);

    // check for empty fields
    if($msg != null) {
        
        echo json_encode(["msg"=> "One of the following filed: ".$msg." is empty, empty filed is not allowed"]);

    }elseif (!$check_email) {
        echo json_encode(["msg"=> "Please provide valid email address."]);
    } else {

        $_SESSION['user'] = $email;

        $result = $crud->getData("SELECT * FROM users_tb WHERE email = '$email' AND password = '$pass'");


        //display success message
        echo json_encode($result);
    }

}



