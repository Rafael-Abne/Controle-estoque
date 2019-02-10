<?php
session_start();
if(!$_SESSION['admin']){
    header('location:../admin/login.html');
}
require "../cabecalho/aside.php";
require "../config.php";
$id = $_GET['id'];
$sql = "SELECT * FROM estoque WHERE id_produto = ? ";

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
            Editar Produto do estoque
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Cadastro de produto</li>
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
                <form role="form" method="POST" action="salvar_edicao.php">
                  <div class="box-body">
                    <div class="form-group">
                      
                      <label>Quantidade</label><br><br>
                      <input type="number" name="quantidade" class="col-xs-3" value="<?php echo $dados['quantidade'];?>">

                      <input type="number" style="display:none" name="id"  value="<?php echo $dados['id_produto'];?>">
                      <br>
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
      