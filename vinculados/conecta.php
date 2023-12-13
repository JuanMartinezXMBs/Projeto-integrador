<?php


$servidor = "localhost";
$usuario = "seu_usuario";
$senha = "sua_senha";
$banco = "projeto_integrador";

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

if( !$conexao ){
die("deu ruim".mysqli_connect_error());
}else{}

echo "Conexão bem-sucedida!";
?>



