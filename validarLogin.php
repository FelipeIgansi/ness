<?php

    require_once('config.php');
    $sql = new Sql();
    if (empty($_GET["nome"]) || empty($_GET["senha"])){

        header('Location: login.html');
        exit();
    }
    else{

    $senha = $_GET['senha'];

    $usuario = new validaUsuario();
    $usuario-> login($_GET['nome'], md5("$senha"));
}
