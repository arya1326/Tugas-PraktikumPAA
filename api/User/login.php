<?php

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:POST');
header('Content-Type:application/json');
include '../config/database.php';
include '../vendor/autoload.php';

use \Firebase\JWT\JWT;

$obj = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input", true));
    $username = htmlentities($data->username);
    $password = htmlentities($data->password);

    $obj->select('users', '*', "username='{$username}'", null, null);
    $datas = $obj->getResult();
    foreach ($datas as $data) {
        $id = $data['id'];
        $username = $data['username'];
        $password = $data['password'];
        if (!password_verify($password, $data['password'])) {
            $payload = [
                'iss' => "localhost",
                'aud' => 'localhost',
                'exp' => time() + 1000, //10 mint
                'data' => [
                    'id' => $id,
                    'username' => $username,
                    'password' => $password,
                ],
            ];
            $secret_key = "Gustian Arya";
            $jwt = JWT::encode($payload, $secret_key, 'HS256');
            echo json_encode([
                'status' => 1,
                'jwt' => $jwt,
                'message' => 'Login Successfully',
            ]);
        } else {
            echo json_encode([
                'status' => 0,
                'message' => 'Invalid Carditional',
            ]);
        }
    }
} else {
    echo json_encode([
        'status' => 0,
        'message' => 'Access Denied',
    ]);
}
// header("Location:index.php");
?>
