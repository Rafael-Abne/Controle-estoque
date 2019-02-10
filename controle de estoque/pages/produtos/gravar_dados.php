<?php
session_start();
if(!$_SESSION['admin']){
  header('location:../admin/login.html');
}
require "../cabecalho/aside.php";
require "../config.php";

if(!empty($_POST['produto'])){

$produto = $_POST['produto'];
$categoria = $_POST['categoria'];
$descricao = $_POST['descricao'];
$consumo = $_POST['consumo'];


$sql = "INSERT INTO produto".
  "(nome,categoria,descricao,consumo)".
  "VALUES (?,?,?,?)";
$declaracaoSql = $conexao->prepare($sql);
$declaracaoSql->bindParam(1, $produto);
$declaracaoSql->bindParam(2, $categoria);
$declaracaoSql->bindParam(3, $descricao);
$declaracaoSql->bindParam(4, $consumo);
$resultado = $declaracaoSql->execute();

$sql2 = "INSERT INTO estoque".
"(produto,categoria,descricao,consumo,quantidade)".
"VALUES (?,?,?,?,?)";
$quantidade = 0;
$declaracaoSql = $conexao->prepare($sql2);
$declaracaoSql->bindParam(1, $produto);
$declaracaoSql->bindParam(2, $categoria);
$declaracaoSql->bindParam(3, $descricao);
$declaracaoSql->bindParam(4, $consumo);
$declaracaoSql->bindParam(5, $quantidade);
$result = $declaracaoSql->execute();



?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <?php
         if($resultado && $result){
         echo "<h1>Produto cadastrado com sucesso! (*-*)</h1>";
         }else{
           echo "<h1>Não foi possivel cadastrar! O produto <strong>$produto</strong> já existe! :(</h1>";
         }
        }else{
          echo "<script>alert('Nome do produto não informado! :(');
          location.href='add_produto.php';</script>";
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