<?php

    include('conexao.php');

    if (empty($_GET["nome"]) || empty($_GET["senha"])){

        header('Location: login.html');
        exit();
    }

    $usuario = mysqli_real_escape_string($conexao, $_GET['nome']);
    $senha = mysqli_real_escape_string($conexao, $_GET['senha']);

    $query = "select * from usuario where nome = {$usuario} and senha = md5('{$senha}')";
    $result = mysqli_query($conexao, $query);
    echo $result;

    $arrayResultados = mysqli_fetch_assoc($result);
    $nLinhas = count($arrayResultados);


    echo $row;exit;
?>