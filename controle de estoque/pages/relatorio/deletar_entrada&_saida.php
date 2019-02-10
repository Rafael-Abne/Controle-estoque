<?php
session_start();
if(!$_SESSION['admin']){
  header('location:../admin/login.html');
}
$codigo = $_GET["id"];
$tabela = "";
$array = explode(",",$codigo);
$url  = "";


if($array[0] == "entrada"){
    $tabela = "entrada";
    $url = "entradas";
}else if($array[0] == "saida"){
    $tabela = "saida";
    $url = "saidas";
}

require "../config.php";
$sql = "DELETE FROM $tabela WHERE id = ?";
$declaracaoSql = $conexao->prepare($sql);
$declaracaoSql->bindParam(1,$array[1]);
$delete = $declaracaoSql->execute();

if($delete){
    echo "<script>alert('$array[0] deletada com sucesso!!!');
    location.href='$url.php';</script>";
}
?>
