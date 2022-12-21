<?php
defined('__NOT_DIRECT')||define('__NOT_DIRECT',1);
include'cek_akses.php';
// include'nav.php';

?>
          <?php
                /* Koneksi ke Database */
                mysql_connect(DB_HOST,DB_USER,DB_PASS);
                mysql_select_db(DB_NAME);
                /*-------------------------------*/
               
                if(isset($_POST['submit'])){
                  $id = $_POST['id'];
                  $nama_kriteria = $_POST['nama_kriteria'];
                  $profit = $_POST['profit'];
                  $bobot = $_POST['bobot'];
                       $error = false;
                  if(!$error){
                    if(!empty($nama_kriteria) && !empty($profit)&&!empty($bobot)){
                         $queryupd = mysql_query("UPDATE kriteria SET profit='".$profit."', bobot='".$bobot."',nama_kriteria='".$nama_kriteria."'WHERE id_kriteria='".$id."'");
                   
                      if($queryupd){
                      echo"<script>alert('Daftar kriterai terupdate.'); location='kriteria.php'</script>";
                      }else{
                        echo 'Gagal query database.';
                      }
                    }else{
                      echo '
                                                    <div class="col-sm-5" style="margin-left:400px;">
                                                        <div class="alert alert-warning" role="alert">
                                                          lengkapi form.
                                                        </div>
                                                    </div>
                                            ';
                      $retry=true;
                    }
                  }else{
                    echo 'Input ulang.';
                    $retry=true;
                  }
                }

                if(isset($_GET['id_kriteria'])){
                  $sql_id = mysql_query("SELECT * FROM kriteria WHERE id_kriteria = '".$_GET['id_kriteria']."'");
                  $data = mysql_fetch_array($sql_id);
                  $id = $_GET['id_kriteria'];
                  $nama_kriteria = $data['nama_kriteria'];
                   $profit = $data['profit'];
                    $bobot = $data['bobot'];
                  
                 
                }?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Edit Kriteria</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Basic Form Elements
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="post" action="" >
                                        <div class="form-group">
                                            <label>Kode Kriteria</label>
                                            <input class="form-control" placeholder="Kode kriteria" name="id" <?php if(isset($id)) echo 'value="'.$id.'" readonly';?>>
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Nama kriteria</label>
                                            <input class="form-control" placeholder="Nama kriteria" name="nama_kriteria"  <?php if(isset($nama_kriteria)) echo 'value="'.$nama_kriteria.'"';?> >
                                        </div>
                                        <div class="form-group">
                                            <label>profit</label>
                                            <input class="form-control" placeholder="profit" name="profit"  <?php if(isset($profit)) echo 'value="'.$profit.'"';?> >
                                        </div>
                                        <div class="form-group">
                                            <label>bobot</label>
                                            <input class="form-control" placeholder="bobot" name="bobot"  <?php if(isset($bobot)) echo 'value="'.$bobot.'"';?> >
                                        </div>
                                        
                                        <button type="submit" name="submit"  class="btn btn-default">Submit </button>
                                        <button type="reset" class="btn btn-default">Reset </button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
