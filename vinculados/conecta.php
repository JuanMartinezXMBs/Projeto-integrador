<?php


$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "plena_paz";

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

if( !$conexao ){
die("deu ruim".mysqli_connect_error());
}else{}

?>



