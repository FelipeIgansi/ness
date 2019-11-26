<?php
    require_once('config.php');

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $url = $_POST["url"];
    $tipoConta = $_POST["tipoConta"];
    $fk_usuario = $_POST["fk_usuario"];

    echo  ("
        <strong>Nome:          </strong>$nome 
    <br><strong>E-Mail:        </strong> $email  
    <br><strong>Senha:         </strong>  $senha 
    <br><strong>URL:           </strong> $url 
    <br><strong>Tipo de conta: </strong> $tipoConta
    <br><strong>Id usuario: </strong> $fk_usuario <br> ");

    echo ("banco de dados--------------------------- <br><br><br>");

    $conta = new Conta($nome, $email, $senha, $url, $tipoConta, $fk_usuario);

    $conta-> insert();

    echo "<pre>";
    echo $conta;
    echo "</pre>";
    

?>
<br/>
<a href="adicionarConta.php">Voltar</a>