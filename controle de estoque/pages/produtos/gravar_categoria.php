<?php
session_start();
if(!$_SESSION['admin']){
  header('location:../admin/login.html');
}
require "../cabecalho/aside.php";
require "../config.php";

$categoria = trim($_POST['categoria']);

$sql = "INSERT INTO categoria".
       "(nome_categoria)".
       "VALUES (?)";
       $declaracaoSql = $conexao->prepare($sql);
       $declaracaoSql->bindParam(1, $categoria);
       $resultado = $declaracaoSql->execute();

?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <?php
         if($resultado){
         echo "<h1>Categoria adicionada!</h1>";
         }else{
           echo "<h1>Categoria $categoria já existe!!</h1>";
         }
          ?>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
          
          </ol>
        </section>
</div>
          

          
<?php
require "../cabecalho/footer.php";
?>