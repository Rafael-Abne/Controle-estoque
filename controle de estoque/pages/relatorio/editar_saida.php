<?php
session_start();
if(!$_SESSION['admin']){
  header('location:../admin/login.html');
}
require "../cabecalho/aside.php";
require "../config.php";
$id = $_GET['id'];
$sql = "SELECT * FROM saida WHERE id = ? ";

$declaracaoSql = $conexao->prepare($sql);
$declaracaoSql->bindParam(1,$id);
$declaracaoSql->execute();
$dados = $declaracaoSql->fetch();
      

?>
      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Editar saida de produto
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Editar</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">

                <!-- form start -->
                <form role="form" method="POST" action="salvar_saida.php">
                <div class="box-body">
                    <div class="form-group">
                        
                       <label for="entrada">Quanto saiu</label><br>
                       <input type="number" name="quantidade" class="col-xs-3" value="<?php echo $dados['quantidade'];?>"><br><br>

                       <label for="data">Data</label><br>
                       <input type="date" name="data" class="form-control" value ="<?php echo $dados['data_saida'];?>"><br>

                      <label>Descrição</label>
                      <textarea class="form-control" name="descricao"><?php echo $dados['descricao'];?>
                      </textarea>

                       <input type="number" style="display:none" name="id"  value="<?php echo $dados['id'];?>">

                    </div> 
                  </div><!-- /.form group -->
                  
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Editar</button>
                  </div>
                </form>
              </div><!-- /.box -->

            </div><!--/.col (left) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
     <?php
      require "../cabecalho/footer.php";
      ?>
      