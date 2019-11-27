<?php

class Usuario
{
    private $id;
    private $nome;
    private $email;
    private $senha;


    // Getters

    public function getID()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getSenha()
    {
        return $this->senha;
    }


    //Setters

    public function setID($value)
    {
        $this->id = $value;
    }

    public function setNome($value)
    {
        $this->nome = $value;
    }
    public function setEmail($value)
    {
        $this->email = $value;
    }

    public function setSenha($value)
    {
        $this->senha = $value;
    }



    public function loadById($id)
    {
        $sql = new Sql();
        $result = $sql->select(
            "SELECT * FROM usuario where idUsuario = :ID",
            array(":ID" => $id)
        );


        if (count($result) > 0) {

            $this->setData($result[0]);
        }
    }


    public static function getList()
    {
        $sql = new Sql();

        return $sql->select("SELECT * FROM usuario ORDER BY idUsuario;");
    }

    public static function search($login)
    {
        $sql = new Sql();

        return $sql->select("SELECT * FROM usuario where nome like :SEARCH 
        ORDER BY nome ", array(
            ':SEARCH' => "%" . $login . "%"

        ));
    }

    public function login($login, $pwd)
    {
        $sql = new Sql();
        $result = $sql->select(
            "SELECT * FROM usuario WHERE nome = :NOME AND senha = :PWD",
            array(
                ":NOME" => $login,
                ":PWD" => $pwd
            )
        );


        if (count($result) > 0) {

            $this->setData($result[0]);
        } else {

            throw new Exception("Login e/ou senha invalidos!");
        }
    }

    public function __construct($nome = "", $email = "", $senha = "")
    {
        $this->setNome($nome);
        $this->setEmail($email);
        $this->setSenha($senha);
    }

    public function insert()
    {
        $sql = new Sql();
        $result = $sql->select(
            "CALL proc_usuarios_insert(:NOME, :EMAIL, md5(:PWD))",
            array(
                ':NOME' => $this->getNome(),
                ':EMAIL' => $this->getEmail(),
                ':PWD' => $this->getSenha()
            )
        );

        if (count($result) > 0) {
            $this->setData($result[0]);
        }
    }
    public function update($nome, $email, $pwd)
    {

        $this->setNome($nome);
        $this->setEmail($email);
        $this->setSenha($pwd);

        $sql = new Sql();

        $sql->query(
            "UPDATE usuario SET nome = :NOME, email = :EMAIL, senha = md5(:SENHA) 
            where idUsuario = :ID",
            array(
                ':NOME' => $this->getNome(),
                ':EMAIL' => $this->getEmail(),
                ':SENHA' => $this->getSenha(),
                ':ID' => $this->getID()
            )

        );
    }

    public function delete()
    {
        $sql = new Sql();
        $sql->query(
            "DELETE from usuario WHERE id = :ID",
            array(
                ':ID' => $this->getID()
            )
        );
        $this->setID(0);
        $this->setNome("");
        $this->setEmail("");
        $this->setSenha("");
    }


    public function setData($data)
    {
        $this->setID($data['id']);
        $this->setNome($data['nome']);
        $this->setEmail($data['email']);
        $this->setSenha($data['senha']);
    }
    // Mostrar as informações
    public function __toString()
    {
        return json_encode(
            array(

                "nome" => $this->getNome(),
                "email" => $this->getEmail(),
                "senha" => $this->getSenha(),
            )
        );
    }
}
