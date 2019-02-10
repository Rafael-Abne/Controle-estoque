<?php
require "../config.php";
session_start();
$usuarioform = $_POST['usuario'];
$senha = $_POST['senha'];


$declaracaoSql = $conexao->prepare("SELECT * FROM admin WHERE usuario = ?");
$declaracaoSql->bindParam(1, $usuarioform);
$declaracaoSql->execute();
$usuario = $declaracaoSql->fetch(PDO::FETCH_ASSOC);

if (password_verify($senha , $usuario['senha'])) {
    $_SESSION['admin'] = $usuario; 
      header('location:../../index.php');
      
}else{
     header('location:login.html');

}
