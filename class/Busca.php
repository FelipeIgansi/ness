<?php


class Busca{

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


    public function loadColByParam($valorParametro = "")
    {
        $sql = new Sql();
        $result = $sql->select(
            "SELECT Usuario_idUsuario FROM conta  where Usuario_idUsuario = :VALORPARAMETRO",
            array(
                ":VALORPARAMETRO" => $valorParametro
                )
        );
        return $result;

        if (count($result) > 0) {

            $this->setData($result[0]);
        }
    }



    // public function loadColByParam($tabela = "", $coluna = "", $nomeParametro = "", $valorParametro = "")
    // {
    //     $sql = new Sql();
    //     $result = $sql->select(
    //         "SELECT ':COL' FROM ':TABELA'  where :NOMEPARAMETRO = :VALORPARAMETRO",
    //         array(
    //             ":COL" => $coluna,
    //             ":TABELA" => $tabela,
    //             ":NOMEPARAMETRO" => $nomeParametro,
    //             ":VALORPARAMETRO" => $valorParametro
    //             )
    //     );
    //     return $result;

    //     if (count($result) > 0) {

    //         $this->setData($result[0]);
    //     }
    // }



    public function setData($data)
    {
        $this->setIdConta($data['id']);
        $this->setNomeConta($data['nome']);
        $this->setSenha($data['senha']);
    }

}



?>