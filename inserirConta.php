<?php


function retornaIDFK($id){
    $conn = new PDO("mysql:dbname=projetogestordesenhas;host=localhost", "root", "123456");
    $valor = $conn->prepare("SELECT * FROM usuario WHERE idUsuario = $id");
    return  $valor;
}

?>



<?php

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $url = $_POST["url"];
    $tipoConta = $_POST["tipoConta"];

    echo  ("
        <strong>Nome:          </strong>$nome 
    <br><strong>E-Mail:        </strong> $email  
    <br><strong>Senha:         </strong>  $senha 
    <br><strong>URL:           </strong> $url 
    <br><strong>Tipo de conta: </strong> $tipoConta <br> ");

    echo ("banco de dados--------------------------- <br><br><br>");

    $conn = new PDO("mysql:dbname=projetogestordesenhas;host=localhost", "root", "123456");
    
    $stmt = $conn->prepare("INSERT INTO conta
    VALUES (DEFAULT, :NOME, :EMAIL, :SENHA, :'URL', :TIPOCONTA, :IDFK)");


    $id = "1";
    $result = retornaIDFK($id);
    $stmt -> bindParam(":NOME", $nome);
    $stmt -> bindParam(":EMAIL", $email);
    $stmt -> bindParam(":SENHA", $senha);
    $stmt -> bindParam(":URL", $url);
    $stmt -> bindParam(":TIPOCONTA", $tipoConta);
    $stmt -> bindParam(":IDFK", $result);
    
    $stmt -> execute();


    echo "Dados da tabela -------------";

    $stmt = $conn->prepare("SELECT * FROM conta");

    $stmt -> execute();

    $resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);

    foreach ($resultado as $row) {
        foreach ($row as $key => $value) {
            echo "<strong>".$key."</strong>: ".$value."<br/>";
        }
        echo "--------------------------------------------<br/>";
    }
    

?>
<br/>
<a href="adicionarConta.php">Voltar</a>