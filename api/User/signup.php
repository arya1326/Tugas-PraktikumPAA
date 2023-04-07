<?php
 
// get koneksi database
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:POST');
header('Content-Type:application/json');
include '../config/database.php';

$obj = new Database();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  echo json_encode([
    'status' => 0,
    'message' => 'Access Denied',
]);
} else {
    $data = json_decode(file_get_contents("php://input", true));
    $username = htmlentities($data->username);
    $password = htmlentities($data->password);
    $new_password = password_hash($password, PASSWORD_DEFAULT);
    // check user by username
    $obj->select("users", "username='{$username}'", null, null);
    $is_username = $obj->getResult();
    if (isset($is_username[0]['username']) == $username) {
        echo json_encode([
            'status' => 2,
            'message' => 'Email already Exists',
        ]);
    }else{
        $obj->insert('users', ['username' => $username, 'password' => $new_password, ]);
        $data = $obj->getResult();
        if ($data[0] == 1) {
            echo json_encode([
                'status' => 1,
                'message' => 'User add Successfully',
            ]);
        } else {
            echo json_encode([
                'status' => 0,
                'message' => 'Server Problem',
            ]);
        }
    }
}