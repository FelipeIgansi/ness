<?php

$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$re_senha = $_POST["re-senha"];

if ($senha =! $re_senha) {
    echo "<script>
                alert('Senha Incorreta!');
                window.location.href='register.html';
             </script>";
} else {

    $conn = new PDO("mysql:dbname=projetogestordesenhas;host=localhost", "root", "");

    $stmt = $conn->prepare("INSERT INTO usuario
    VALUES (DEFAULT, :NOME, :EMAIL, :SENHA)");

    $stmt->bindParam(":NOME", $nome);
    $stmt->bindParam(":EMAIL", $email);
    $stmt->bindParam(":SENHA", $senha);


    $stmt->execute();

    echo "
        <form action='index.php' method='get'>
            <input type='hidden' name='nome' value='$nome'>
            <input type='hidden' name='email' value='$email'>
            <input type='hidden' name='senha' value='$senha'>
        </form> 
        ";

    
}
?>

