<?php 


defined('__NOT_DIRECT')||define('__NOT_DIRECT',1);
include'cek_akses.php';
include'nav.php' ;


/* Koneksi ke Database */
                mysql_connect(DB_HOST,DB_USER,DB_PASS);
                mysql_select_db(DB_NAME);
                /*-------------------------------*/


                
               
                if(isset($_POST['submit'])){
                 
                  $profit = $_POST['profit'];
                  $bobot = $_POST['bobot'];
                  $nama_kriteria = $_POST['nama_kriteria'];
                 
                  $error = false;
                  
                  
                  if(!$error){
                    if(!empty($profit) && !empty($bobot) & !empty($nama_kriteria) ){
                      $queryadd = mysql_query("INSERT INTO kriteria(profit,bobot,nama_kriteria)
                        VALUES ('".$profit."','".$bobot."','".$nama_kriteria."')");
                      if($queryadd){
                      echo"<script>alert('Daftar kriteria   tersimpan.'); location='kriteria.php'</script>";
                      }else{
                        echo 'Gagal query database.';
                      }
                    }else{
                       echo"<script>alert('lengkapi form'); location='kriteria_add.php'</script>";
                      $retry=true;
                    }
                  }else{
                    echo 'Input ulang.';
                    $retry=true;
                  }
                }
               
               
                ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tambah kriteria</h1>
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
                                            <label>Nama kriteria</label>
                                            <input class="form-control" placeholder="Kriteria" name="nama_kriteria">
                                        </div>

                                        <div class="form-group">
                                            <label>profit</label>
                                            <input class="form-control" placeholder="profit" name="profit">
                                        </div>

                                        <div class="form-group">
                                            <label>bobot</label>
                                            <input class="form-control" placeholder="bobot" name="bobot">
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
