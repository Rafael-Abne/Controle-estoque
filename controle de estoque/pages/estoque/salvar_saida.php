<?php
session_start();
if(!$_SESSION['admin']){
  header('location:../admin/login.html');
}
require "../cabecalho/aside.php";
require "../config.php";

$produto = $_POST['produto'];
$quantidade = $_POST['quantidade'];
$data = $_POST['data'];
$hora = $_POST['hora'];
$descricao = trim($_POST['descricao']);

$sql1 = "SELECT categoria,quantidade FROM estoque WHERE produto = ?";
       $declaracaoSql = $conexao->prepare($sql1);
       $declaracaoSql->bindParam(1, $produto);
       $declaracaoSql->execute();
       $dado = $declaracaoSql->fetch();
       $quant = $dado['quantidade'];
       $categoria = $dado['categoria'];
       if($quantidade > $quant){
         echo "<script>alert('Aviso! Produto em estoque está em quantidade $quant!');
         location.href='produtos.php';</script>";
       }else{
           $entrada = $quant-$quantidade;
           $sql = "UPDATE estoque  SET quantidade = ? WHERE  produto = ?";
           $declaracaoSql = $conexao->prepare($sql);
           $declaracaoSql->bindParam(1, $entrada);
           $declaracaoSql->bindParam(2, $produto);
           $resultado = $declaracaoSql->execute();
       }
      
//implementar tabela de relatorios de produtos que foram adicionados
?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <?php
         if($resultado){
            
            echo "<h1><strong>$quantidade     $produto </strong> saiu do estoque</h1>";
            $sql3 = "INSERT INTO saida (produto,categoria,descricao,quantidade,data_saida,hora_saida) VALUES (?,?,?,?,?,?)";
            $declaracaoSql = $conexao->prepare($sql3);
            $declaracaoSql->bindParam(1, $produto);
            $declaracaoSql->bindParam(2, $categoria);
            $declaracaoSql->bindParam(3, $descricao);
            $declaracaoSql->bindParam(4, $quantidade);
            $declaracaoSql->bindParam(5, $data);
            $declaracaoSql->bindParam(6, $hora);
            $declaracaoSql->execute();
            
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