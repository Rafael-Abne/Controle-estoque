<?php
session_start();
if(!$_SESSION['admin']){
  header('location:../admin/login.html');
}
require "../config.php";
$id = $_POST['id'];

$produto = $_POST['produto'];
$categoria = $_POST['categoria'];
$descricao = $_POST['descricao'];
$consumo = $_POST['consumo'];



$sql = "UPDATE produto SET nome = ?, categoria = ?, descricao = ?, consumo = ? WHERE id_produto = ?";
$desclaraoSql = $conexao->prepare($sql);
$desclaraoSql->bindParam(1,$produto);
$desclaraoSql->bindParam(2,$categoria);
$desclaraoSql->bindParam(3,$descricao);
$desclaraoSql->bindParam(4,$consumo);
$desclaraoSql->bindParam(5,$id);
$resultado = $desclaraoSql->execute();

 
if($resultado){
    $sql2 = "UPDATE estoque SET produto = ?, categoria = ?, descricao = ?, consumo = ? WHERE id_produto = ?";
    $declaracaoSql = $conexao->prepare($sql2);
    $declaracaoSql->bindParam(1, $produto);
    $declaracaoSql->bindParam(2, $categoria);
    $declaracaoSql->bindParam(3, $descricao);
    $declaracaoSql->bindParam(4, $consumo);
    $declaracaoSql->bindParam(5, $id);
    $declaracaoSql->execute();
    echo "<script>alert('Dados atualizado com sucesso!');location.href='produtos.php';</script>";
}
