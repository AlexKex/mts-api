<?php
/**
 * Created by PhpStorm.
 * User: Alex Pryakhin
 */

define("SALT", "alk%#nq12HJ");

$pair = [
    'login' => 'test',
    'pass' => ''
];

if(isset($_POST['pass']) && isset($_POST['login'])){
    $salted = $_POST['pass'] . SALT;
    if(md5($salted) == $pair['pass']){
        echo $token;
    }
}
else{
    echo md5('test'.SALT);
}