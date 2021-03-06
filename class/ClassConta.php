<?php

class ClassConta
{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $url;
    private $tipoconta;
    private $fk_idUsuario;

    // Getters

    
    public function getIdConta()
    {
        return $this->id;
    }

    public function getNomeConta()
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

    public function getURL()
    {
        return $this->url;
    }
    public function getTipoConta()
    {
        return $this->tipoconta;
    }
    public function getFKIdUsuario()
    {
        return $this->fk_idUsuario;
    }

    //Setters

    public function setIdConta($value)
    {
        $this->id = $value;
    }

    public function setNomeConta($value)
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

    public function setURL($value)
    {
        $this->url = $value;
    }

    public function setTipoConta($value)
    {
        $this->tipoconta = $value;
    }
    public function setFKIdUsuario($value)
    {
        $this->fk_idUsuario = $value;
    }


    public function loadParamByName($param = "", $nome = "")
    {
        $sql = new Sql();
        $result = $sql->select(
            "SELECT $param FROM conta where nomeConta = :NOME",
            array(":NOME" => $nome)
        );
        

        if (count($result) > 0) {

            $this->setData($result[0]);
        }
    }
    
    public static function getListIds()
    {
        $sql = new Sql();

        return $sql->select("SELECT idConta FROM conta ORDER BY idConta;");
    }


    public function loadById($id)
    {
        $sql = new Sql();
        $result = $sql->select("SELECT * FROM conta where idConta = :ID", array(":ID" => $id));


        if (count($result) > 0) {

            $this->setData($result[0]);
        }
    }
    public function loadByFk($fk) : array
    {
        $sql = new Sql();
        $result = $sql->select("SELECT * FROM conta where Usuario_idUsuario = :FK", array(":FK" => $fk));

        return $result;
        if (count($result) > 0) {

            $this->setData($result[0]);
        }
    }

    public static function getList()
    {
        $sql = new Sql();

        return $sql->select("SELECT * FROM conta ORDER BY idConta;");
    }

    public static function search($login)
    {
        $sql = new Sql();

        return $sql->select("SELECT * FROM conta where nomeConta like :SEARCH ORDER BY nomeConta ", array(
            ':SEARCH' => "%" . $login . "%"

        ));
    }

    public function login($login, $pwd)
    {
        $sql = new Sql();
        $result = $sql->select(
            "SELECT * FROM conta WHERE nomeConta = :NOME AND senha = :PWD",
            array(
                ":NOME" => $login,
                ":PWD" => base64_decode($pwd)
            )
        );


        if (count($result) > 0) {

            $this->setData($result[0]);
        } else {

            throw new Exception("Login e/ou senha invalidos!");
        }
    }

    public function __construct($nome = "", $email = "", $senha = "", $url = "", $tipoconta = "", $fk_idUsuario = "")
    {
        $this->setNomeConta($nome);
        $this->setEmail($email);
        $this->setSenha($senha);
        $this->setURL($url);
        $this->setTipoConta($tipoconta);
        $this->setFKIdUsuario($fk_idUsuario);
        
    }

    public function insert()
    {
        $sql = new Sql();
        $result = $sql->select(
            "CALL proc_contas_insert(:NOME, :EMAIL, :PWD, :URL, :TIPOCONTA, :FK_USUARIO)",
            array(
                ':NOME' => $this->getNomeConta(),
                ':EMAIL' => $this->getEmail(),
                ':PWD' => base64_encode($this->getSenha()),
                ':URL' => $this->getURL(),
                ':TIPOCONTA' => $this->getTipoConta(),
                ':FK_USUARIO' => $this->getFKIdUsuario()
            )
        );

        if (count($result) > 0) {
            $this->setData($result[0]);
        }
    }
    public function update($nome, $email, $pwd, $url, $tipoconta, $fk_idUsuario)
    {

        $this->setNomeConta($nome);
        $this->setEmail($email);
        $this->setSenha($pwd);
        $this->setURL($url);
        $this->setTipoConta($tipoconta);
        $this->setFKIdUsuario($fk_idUsuario);

        $sql = new Sql();

        $sql->query(
            "UPDATE conta SET nomeConta = :NOME, email = :EMAIL, senha = :SENHA, 
                url = :URL, tipoConta = :TIPOCONTA, Usuario_idUsuario = :FK_USUARIO  
            where idConta = :ID",
            array(
                ':NOME' => $this->getNomeConta(),
                ':EMAIL' => $this->getEmail(),
                ':SENHA' => base64_decode(''.$this->getSenha().''),
                ':URL' => $this->getURL(),
                ':TIPOCONTA' => $this->getTipoConta(),
                ':FK_USUARIO' => $this->getFKIdUsuario(),
                ':ID' => $this->getIdConta()
            )

        );
    }

    public function delete()
    {
        $sql = new Sql();
        $sql-> query("DELETE from conta WHERE idConta = :ID", 
        array(
            ':ID'=>$this->getIdConta()
        ));
        $this-> setIdConta(0);
        $this-> setNomeConta("");
        $this-> setSenha("");
    }


    public function setData($data)
    {
        $this->setIdConta($data['idConta']);
        $this->setNomeConta($data['nomeConta']);
        $this->setSenha(base64_decode($data['senha']));
    }
    // Mostrar as informações
    public function __toString()
    {
        return json_encode(
            array(
                "idConta" => $this->getIdConta(),
                "nomeConta" => $this->getNomeConta(),
                "email" => $this->getEmail(),
                "senha" => base64_decode($this->getSenha()),
                "url" => $this->getURL(),
                "tipoconta" => $this->getTipoConta(),
                "fk_usuario" => $this->getFKIdUsuario(),
            )
        );
    }
}
