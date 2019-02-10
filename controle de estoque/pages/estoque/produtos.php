<?php
session_start();
if(!$_SESSION['admin']){
  header('location:../admin/login.html');
}
require "../cabecalho/aside.php";


?>

 <!-- Right side column. Contains the navbar and content of the page -->
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Produtos em estoque
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">produtos</a></li>
            <li class="active">produtos em estoque</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        <a href="pdf_estoque.php"><button class="btn btn-primary"  target="blank">Gerar PDF</button></a>
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  
               
              <div class="box">
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Produto</th>
                        <th>Categoria</th>
                        <th>Descrição</th>
                        <th>Consumo</th>
                        <th>Quantidade</th>
                        <th>ação</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                    <?php
                    require "../config.php";
                    
                    $sql = "select * from estoque";
                    $declaracaoSql = $conexao->prepare($sql);
                    $declaracaoSql->execute();
                    $produtos = $declaracaoSql->fetchAll();

                  
                    foreach($produtos as $prod){
                        echo "<td>$prod[produto] </td>";
                        echo "<td>$prod[categoria] </td>";
                        echo "<td>$prod[descricao] </td>";
                        echo "<td>$prod[consumo] </td>";
                        echo "<td>$prod[quantidade] </td>";

    
                    ?>
   

                        <td><a href="editar.php?id=<?php echo $prod['id_produto']?>" class="btn btn-app">
                          <i class="fa fa-edit"></i>Editar</a>
                        
                      </td>
                      </tr>
                       <?php }?>
                      
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php
require "../cabecalho/footer.php";
?>