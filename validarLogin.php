<?php
    session_start();
    require_once('config.php');
    $sql = new Sql();
    if (empty($_GET["nome"]) || empty($_GET["senha"])){

        echo "<script>
                alert('Senhas não são iguais!');
              </script>";
        header('location: login.html');

    }
    else{

        

    $senha = $_GET['senha'];

    $usuario = new validaLoginClass();
    $usuario-> login( $_GET['nome'], md5("$senha"));
    $nome = $_GET['nome'];
    
    $_SESSION['Usuario'] = $nome;
    header('location: index.php');
    }
?>