<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>




        <?php

        function gerar_senha($tamanho, $numeros, $maiusculas, $minusculas, $simbolos)
        {
            $ma = "ABCDEFGHIJKLMNOPQRSTUVYXWZ"; // $ma contem as letras maiúsculas
            $mi = "abcdefghijklmnopqrstuvyxwz"; // $mi contem as letras minusculas    
            $si = array("[","]","{","}","^","~","!","@","#","$","%","&","*","(",")","_","+","-","/","="); // $si contem os símbolos

            if ($maiusculas == "true") {
                // se $maiusculas for "true", a variável $ma é embaralhada e adicionada para a variável $senha
                $senha .= str_shuffle($ma);
            }

            if ($minusculas == "true") {
                // se $minusculas for "true", a variável $mi é embaralhada e adicionada para a variável $senha
                $senha .= str_shuffle($mi);
            }

            if ($numeros == "true") {
                // se $numeros for "true", a variável $nu é embaralhada e adicionada para a variável $senha
                for($i = 0; $i < $tamanho; $i++){
                    $senha .= rand(0,9);
                }
                
            }

            if ($simbolos == "true") {
                // se $simbolos for "true", a variável $si é embaralhada e adicionada para a variável $senha
                do{
                    for($i = 0; $i < $tamanho; $i++){
                        $senha .= $si[rand(0,count($si))];
                    }   
                }while(count($senha) == $tamanho);
                
            }
 
            // retorna a senha embaralhada com "str_shuffle" com o tamanho definido pela variável $tamanho
            return substr(str_shuffle($senha), 0, $tamanho);
        }

        ?>
        <?php

            // Variaveis 
            $digitos = $_GET['digi'];
            $numeros = $_GET['num'];
            $maiuscula = $_GET['maius'];
            $minuscula = $_GET['minus'];
            $carac = $_GET['caracespeciais'];

            for ($i=0; $i < 10; $i++) { 
                echo '<br><br>  Senha:  ', gerar_senha($digitos, $numeros, $maiuscula, $minuscula, $carac), "   <br>Tamanho:  ",strlen(gerar_senha($digitos, $numeros, $maiuscula, $minuscula, $carac));

            }


            //echo 'Senha:  ', gerar_senha($digitos, $numeros, $maiuscula, $minuscula, $carac), "   <br>Tamanho:  ",strlen(gerar_senha($digitos, $numeros, $maiuscula, $minuscula, $carac));

            echo '<br/><br/><br/><br/>';

            echo ("Digito: {$digitos}<br> Numeros: {$numeros}<br/>  Maiusculas: {$maiuscula}<br/> Minusculas: {$minuscula}<br/> Caracteres especiais: {$carac}");

        ?>
        <br/><br/><br/>
        <a class="btn btn-primary" href="GeradordeSenhas.php"> Voltar</a>


    
    </body>
</html>
