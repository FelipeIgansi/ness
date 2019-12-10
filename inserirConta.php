<?php
    require_once('config.php');

    $nome = $_GET["nome"];
    $email = $_GET["email"];
    $senha = $_GET["senha"];
    $url = $_GET["url"];
    $tipoConta = $_GET["tipoConta"];
    $fk_usuario = $_GET["fk_usuario"];

    $conta = new ClassConta($nome, $email, md5("$senha"), $url, $tipoConta, $fk_usuario);

    $conta-> insert();

    header("Location: index.php");
    exit();
    

?>
<br/>
<a href="adicionarConta.php">Voltar</a>