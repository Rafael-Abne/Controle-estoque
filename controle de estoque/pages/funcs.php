<?php

function produtos(){
    require "config.php";
    $sql = "select count(nome) from produto";
    $declaracaoSql = $conexao->prepare($sql);
    $declaracaoSql->execute();
    $num = $declaracaoSql->fetch();

    foreach ($num as $value) {
        $valor = $value;
    }
    return $valor;
}


function entradas(){
    require "config.php";
    $sql = "select count(produto) from entrada";
    $declaracaoSql = $conexao->prepare($sql);
    $declaracaoSql->execute();
    $num = $declaracaoSql->fetch();

    foreach ($num as $value) {
        $valor = $value;
    }
    return $valor;
}


function saidas(){
    require "config.php";
    $sql = "select count(quantidade) from saida";
    $declaracaoSql = $conexao->prepare($sql);
    $declaracaoSql->execute();
    $num = $declaracaoSql->fetch();

    foreach ($num as $value) {
        $valor = $value;
    }
    return $valor;
}

function relatorio(){
    require "config.php";
    $sql = "select count(quantidade) from saida";
    $declaracaoSql = $conexao->prepare($sql);
    $declaracaoSql->execute();
    $num1 = $declaracaoSql->fetch();

    foreach ($num1 as $value1) {
        $valor1 = $value1;
    }

    $sql2 = "select count(quantidade) from entrada";
    $declaracaoSql = $conexao->prepare($sql2);
    $declaracaoSql->execute();
    $num2 = $declaracaoSql->fetch();

    foreach ($num2 as $value2) {
        $valor2 = $value2;
    }
    return $valor1 + $valor2;
}


?>