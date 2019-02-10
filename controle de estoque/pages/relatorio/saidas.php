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
            Saida de produtos
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">produtos</a></li>
            <li class="active">produtos que sairam</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
            <a href="saidas_pdf.php"><button class="btn btn-primary"  target="blank">Gerar PDF</button></a>
              <div class="box">
                <div class="box-header">
               
              <div class="box">
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Codigo</th>
                        <th>Produto</th>
                        <th>Categoria</th>
                        <th>Descrição de saida</th>
                        <th>Quantidade</th>
                        <th>Data da saida</th>
                        <th>Hora</th>
                        <th>ação</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                    <?php
                    require "../config.php";
                    
                    $sql = "select * from saida";
                    $declaracaoSql = $conexao->prepare($sql);
                    $declaracaoSql->execute();
                    $produtos = $declaracaoSql->fetchAll();

                  
                    foreach($produtos as $prod){
                        echo "<tr><td>$prod[id] </td>";
                        echo "<td>$prod[produto] </td>";
                        echo "<td>$prod[categoria] </td>";
                        echo "<td>$prod[descricao] </td>";
                        echo "<td>$prod[quantidade] </td>";
                        echo "<td>$prod[data_saida] </td>";
                        echo "<td>$prod[hora_saida] </td>";
    
                    ?>
   

                        <td><a href="editar_saida.php?id=<?php echo $prod['id']?>" class="btn btn-app">
                          <i class="fa fa-edit"></i>Editar</a>
                          <a href="deletar_entrada&_saida.php?id=saida,<?php echo $prod['id']?>" class="btn btn-app">
                          <i class="fa fa-times"></i>Apagar</a>
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