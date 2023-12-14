<?php
if (!isset($_SESSION)) {
    // Então inicie a sessão 
    session_start();
}

function login($id, $nome){
    /*Criação de variáveis de sessão - Recursos que ficam disponíveis para o uso durante toda a duração da sessão, ou seja, enquanto o navegador não for fechado ou o usuário não clicar em sair. */

    $_SESSION["id"]= $id;
    $_SESSION["nome"]= $nome;
}