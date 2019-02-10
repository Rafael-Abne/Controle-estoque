<?php
session_start();
if(!$_SESSION['admin']){
  header('location:../admin/login.html');
}
require "../config.php";
$id = $_POST['id'];
$quantidade = $_POST['quantidade'];

$sql = "UPDATE estoque SET quantidade = ? WHERE id_produto = ?";
$desclaraoSql = $conexao->prepare($sql);
$desclaraoSql->bindParam(1,$quantidade);
$desclaraoSql->bindParam(2,$id);
$resultado = $desclaraoSql->execute();

if($resultado){
    echo "<script>alert('Dados atualizado com sucesso!');location.href='produtos.php';</script>";
}