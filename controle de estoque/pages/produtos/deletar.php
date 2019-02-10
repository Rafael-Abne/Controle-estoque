<?php
session_start();
if(!$_SESSION['admin']){
  header('location:../admin/login.html');
}
$codigo = $_GET["id"];

require "../config.php";

$sql = "DELETE FROM produto WHERE id_produto = ?";


$declaracaoSql = $conexao->prepare($sql);
$declaracaoSql->bindParam(1,$codigo);
$delete = $declaracaoSql->execute();

if($delete){
  $sql2 = "DELETE FROM estoque WHERE id_produto = ?";
  $declaracaoSql = $conexao->prepare($sql2);
  $declaracaoSql->bindParam(1,$codigo);
  $delete = $declaracaoSql->execute();
    echo "<script>alert('produto deletado com sucesso!!!');
    location.href='produtos.php';</script>";
}
?>
