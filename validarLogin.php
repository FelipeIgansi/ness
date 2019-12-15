<?php
    session_start();
    require_once('config.php');
    $sql = new Sql();

    if (empty($_GET["nome"]) || empty($_GET["senha"])){

        header('location: login.html');
        exit();

    }
    else{
        
        $senha = $_GET['senha'];

        $usuario = new validaLoginClass();
        $usuario-> login( $_GET['nome'], base64_decode("$senha"));
        $nome = $_GET['nome'];
        
        $_SESSION['usuario'] = $nome;
        header('location: index.php');
    }
?>