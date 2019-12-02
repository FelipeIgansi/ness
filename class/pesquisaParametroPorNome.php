<?php


class pesquisaParametroPorNome{

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
        $this->id = $value;
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


    public function loadParamByName($tabela = "", $param = "", $nome = "")
    {
        $sql = new Sql();
        $result = $sql->select(
            "SELECT '$param' FROM '$tabela'  where nomeUsuario = :NOME",
            array(":NOME" => $nome)
        );
        return $result;

        if (count($result) > 0) {

            $this->setData($result[0]);
        }
    }

    public function setData($data)
    {
        $this->setIdConta($data['id']);
        $this->setNomeConta($data['nome']);
        $this->setSenha($data['senha']);
    }

}



?>