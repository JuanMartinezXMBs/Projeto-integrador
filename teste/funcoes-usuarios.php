<?php
require "conecta.php";
                        //PARÂMETROS
function inserirUsuario($conexao, $email, $nome, $senha){

    /* Montando uma variavel com o comando SQL de INSERT e com os dados (PARÂMETROS) recebidos peka função */
    $sql = "INSERT INTO usuarios(nome, email, senha, tipo)
    VALUES('$nome','$email','$senha')";

    /* Execute o comando SQL */
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
};

function lerUsuarios($conexao){
    // Comando SQL para fazer a leitura de dados (SELECT)
    $sql = "SELECT id, nome, email, tipo FROM usuarios ORDER BY nome";
    
    // Execução do comando e armazenamento do resultado da consulta/query
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    
    // Retornamos o resultado da query transformado em array associativo (caso seja uma matriz, pois vai relacionar muitos usuarios)
    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function letUmUsuario($conexao, $id){
    // Montamos o sql contendo o ID do usuário que queremos carregar
    $sql = "SELECT * FROM usuarios WHERE id = $id";
 
    // Executamos e guardamos o resultado da consulta
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
 
    //Retornando o resultado trasformando em um array associativo (caso seja apenas um usurario pois não é matriz)
    return mysqli_fetch_assoc($resultado);
}

function atualizarUsuario($conexao, $id, $nome, $email, $senha){
    $sql = "UPDATE usuarios SET

            nome = '$nome',
            email = '$email',
            senha = '$senha'

            WHERE id = $id ";

     mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

function excluirUsuario( $conexao, $id ){
    $sql = "DELETE FROM usuarios WHERE id = $id";
    
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

function buscandoUsuario($conexao, $email){
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
   
    $resultado = mysqli_query($conexao, $sql) 
                    or die(mysqli_error($conexao));

    return mysqli_fetch_assoc($resultado);
}