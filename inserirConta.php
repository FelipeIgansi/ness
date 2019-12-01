<?php
    require_once('config.php');

    $nome = $_GET["nome"];
    $email = $_GET["email"];
    $senha = $_GET["senha"];
    $url = $_GET["url"];
    $tipoConta = $_GET["tipoConta"];
    $fk_usuario = $_GET["fk_usuario"];

    echo  ("
        <strong>Nome:          </strong>$nome 
    <br><strong>E-Mail:        </strong> $email  
    <br><strong>Senha:         </strong>  $senha 
    <br><strong>URL:           </strong> $url 
    <br><strong>Tipo de conta: </strong> $tipoConta
    <br><strong>Id usuario: </strong> $fk_usuario <br> ");

    echo ("banco de dados--------------------------- <br><br><br>");

    $conta = new Conta($nome, $email, md5("$senha"), $url, $tipoConta, $fk_usuario);

    $conta-> insert();

    echo "<pre>";
    print_r($conta);
    echo "</pre>";
    

?>
<br/>
<a href="adicionarConta.php">Voltar</a>