<?php

class Usuario {

    private $idusuario;
    private $nome;
    private $sobrenome;
    private $momento_cadastro;

    public function getIdusuario(){

        return $this->idusuario;

    }

    public function setIdusuario($value){

        $this->idusuario = $value;

    }

    public function getNome(){

        return $this->nome;

    }

    public function setNome($value){

        $this->nome = $value;

    }

    public function getSobrenome(){

        return $this->sobrenome;

    }

    public function setSobrenome($value){

        $this->sobrenome = $value;

    }

    public function getMomento_cadastro(){

        return $this->momento_cadastro;

    }

    public function setMomento_cadastro($value){

        $this->momento_cadastro = $value;

    }

    public function loadById($id){

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM clientes WHERE idusuario = :ID", array(

            ":ID"=>$id

        ));

        if (count($results) > 0) {

            $row = $results[0];

            $this->setIdusuario($row['idusuario']);
            $this->setNome($row['nome']);
            $this->setSobrenome($row['sobrenome']);
            $this->setMomento_cadastro(new DateTime($row['momento_cadastro']));

        }

    }

    public function __toString(){

        return json_encode(array(

            "idusuario"=>$this->getIdusuario(),
            "nome"=>$this->getNome(),
            "sobrenome"=>$this->getSobrenome(),
            "momento_cadastro"=>$this->getMomento_cadastro()->format("d/m/Y H:i:s")

        ));

    }

}

?>