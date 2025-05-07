<?php

define('DB_HOST', 'mysql');
define('DB_NAME', 'enquetes');
define('DB_USER', 'root');
define('DB_PASS', 'password');

function dbConnect() {
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if(!$conn) {
        die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
    }
    return $conn;
}

dbConnect();

?>