<?php

class Login{
    public $idusuario;
    public $nomeusuario;
    public $foto;
    public $nomecliente;
    public $cpf;
    public $sexo;
    public $email;
    public $telefone;
    public $tipo;
    public $logradouro;
    public $numero;
    public $complemento;
    public $bairro;
    public $cep;

    public function __construct($db){

        $this->conexao = $db;
    }


public function login (){

$query = "select

us.idusuario,
us.nomeusuario,
us.foto,
cl.nomecliente,
cl.cpf,
cl.sexo,
ct.email,
ct.telefone,
en.tipo,
en.logradouro,
en.numero,
en.complemento,
en.bairro,
en.cep

from usuario us inner join cliente cl on us.idusuario = cl.idusuario
inner join contato ct on ct.idcontato = cl.idcontato
inner join endereco en on en.idendereco = cl.idendereco

where nomeusuario=:n and senha=:s";

$stmt = $this ->conexao->prepare($query);
$this->senha = md5($this->senha);
$stmt->bindParam(":n",$this->nomeusuario);
$stmt->bindParam(":s",$this->senha);
$stmt->execute();
return $stmt;
}
}
?>