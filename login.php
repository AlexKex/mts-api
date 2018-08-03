<?php
/**
 * Created by PhpStorm.
 * User: Alex Pryakhin
 */

define("SALT", "alk%#nq12HJ");

$pair = [
    'login' => 'test',
    'pass' => 'bc8e51c8dd2e98a9a0a792ce87416b59'
];

if(isset($_POST['pass']) && isset($_POST['login'])){
    $salted = $_POST['pass'] . SALT;
    if(md5($salted) == $pair['pass']){
        echo md5(date('Y-m-d').$salted);
    }
}
else{
    echo 0;
}