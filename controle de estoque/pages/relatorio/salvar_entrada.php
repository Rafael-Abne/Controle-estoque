<?php
session_start();
if(!$_SESSION['admin']){
  header('location:../admin/login.html');
}
require "../config.php";
$id = $_POST['id'];
$quantidade = $_POST['quantidade'];
$descricao = $_POST['descricao'];
$data = $_POST['data'];

$sql = "UPDATE entrada SET descricao = ?, quantidade = ?, data_entrada = ? WHERE id = ?";
$desclaraoSql = $conexao->prepare($sql);
$desclaraoSql->bindParam(1,$descricao);
$desclaraoSql->bindParam(2,$quantidade);
$desclaraoSql->bindParam(3,$data);
$desclaraoSql->bindParam(4,$id);
$resultado = $desclaraoSql->execute();

if($resultado){
    echo "<script>alert('Dados atualizado com sucesso!');location.href='entradas.php';</script>";
}

