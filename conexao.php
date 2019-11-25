<?php

    define('HOST', '127.0.0.1');
    define('USUARIO', 'root');
    define('SENHA', "");
    define('DB', 'projetogestordesenhas');
    define('PORTA', '3306');

    $conexao = mysqli_connect(HOST, USUARIO, SENHA, DB, PORTA) or die('Não foi possivel conectar.');

?>