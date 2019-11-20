<?php

class con{
    public function conectar(){
        return $conn = new PDO("mysql:dbname=projetogestordesenhas;host=localhost", "root", "123456");
    }

}


?>