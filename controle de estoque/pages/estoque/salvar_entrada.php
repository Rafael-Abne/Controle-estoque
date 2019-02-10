<?php
session_start();
if(!$_SESSION['admin']){
  header('location:../admin/login.html');
}
require "../cabecalho/aside.php";
require "../config.php";

if(!empty($_POST['quantidade']) & !empty($_POST['data'])){
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
       $entrada = $quant+$quantidade;

$sql2 = "UPDATE estoque  SET quantidade = ? WHERE  produto = ?";
       $declaracaoSql = $conexao->prepare($sql2);
       $declaracaoSql->bindParam(1, $entrada);
       $declaracaoSql->bindParam(2, $produto);

       $resultado = $declaracaoSql->execute();
//implementar tabela de relatorios de produtos que foram adicionados
?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <a href='produtos.php' ><h2>ir para o estoque</h2 ></a>
        <?php
         if($resultado){
            echo "<h1><strong>$quantidade     $produto </strong>    adicionado(a)(s) com sucesso!</h1>";
            $sql3 = "INSERT INTO entrada (produto,categoria,descricao,quantidade,data_entrada,hora_entrada) VALUES (?,?,?,?,?,?)";
            $declaracaoSql = $conexao->prepare($sql3);
            $declaracaoSql->bindParam(1, $produto);
            $declaracaoSql->bindParam(2, $categoria);
            $declaracaoSql->bindParam(3, $descricao);
            $declaracaoSql->bindParam(4, $quantidade);
            $declaracaoSql->bindParam(5, $data);
            $declaracaoSql->bindParam(6, $hora);
            $declaracaoSql->execute();
            
         }
        }else{
          echo "<h1><script>alert('Preencha os campos! :( ');
          location.href='entrada.php';</script></h1>";
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