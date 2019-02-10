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
            Adicionar categoria
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">categoria</li>
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
                <form role="form" method="POST" action="gravar_categoria.php">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="nome">Nome da categoria</label>
                      <input type="text" name="categoria" class="form-control" placeholder="categoria"><br>

                    </div> 
                  </div><!-- /.form group -->
                  

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Adicionar</button>
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
      