<?php
/**
 * Created by PhpStorm.
 * User: Alex Pryakhin
 */

define("SALT", "alk%#nq12HJ");

$pair = [
    'login' => 'test@test.ru',
    'pass' => '6023eb1f49efc0dfe20868fc6d4c270f'
];

if(isset($_POST['pass']) && isset($_POST['login'])){
    $salted = $_POST['pass'] . SALT;
    if($_POST['login'] == $pair['login'] && md5($salted) == $pair['pass']){
        $response = [
            'username' => "test",
            'token' => md5(date('Y-m-d').$salted),
            'tokenExpire' => time() + 86400
        ];

        echo json_encode($response);
    }
    else{
        header("HTTP/1.1 401 Unauthorized");
    }
}
else{
    header("HTTP/1.1 401 Unauthorized");
}