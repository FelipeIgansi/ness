<?php

class validaLoginClass
{
    private $nome;
    private $senha;


    // Getters



    public function getNome()
    {
        return $this->nome;
    }
    public function getSenha()
    {
        return $this->senha;
    }


    //Setters

    public function setNome($value)
    {
        $this->nome = $value;
    }
    public function setSenha($value)
    {
        $this->senha = $value;
    }
    public function login($login, $pwd)
    {
        $sql = new Sql();
        $result = $sql->select(
            "SELECT * FROM usuario WHERE nomeUsuario = :NOME AND senha = :PWD",
            array(
                ":NOME" => $login,
                ":PWD" => $pwd
            )
        );


        if (count($result) > 0) {

            $this->setData($result[0]);
        } else {

            header('Location: login.html');
            exit();
        }
    }
    public function setData($data)
    {
        $this->setNome($data['nomeUsuario']);
        $this->setSenha($data['senha']);
    }
}
