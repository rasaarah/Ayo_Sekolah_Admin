<?php
defined('__NOT_DIRECT')||define('__NOT_DIRECT',1);
include'cek_akses.php';
include'nav.php';

?>
          <?php
                /* Koneksi ke Database */
                mysql_connect(DB_HOST,DB_USER,DB_PASS);
                mysql_select_db(DB_NAME);
                /*-------------------------------*/
               
                if(isset($_POST['submit'])){
                  $id = $_POST['kode_jenjang'];
                  $nama_jenjang = $_POST['nama_jenjang'];
                       $error = false;
                  if(!$error){
                    if(!empty($nama_jenjang) ){
                         $queryupd = mysql_query("UPDATE jenjang SET nama_jenjang='".$nama_jenjang."'WHERE id_jenjang='".$id."'");
                   
                      if($queryupd){
                      echo"<script>alert('Daftar jenjang terupdate.'); location='jenjang.php'</script>";
                      }else{
                        echo 'Gagal query database.';
                      }
                    }else{
                      echo '
                                                    <div class="col-sm-5" style="margin-left:400px;">
                                                        <div class="alert alert-warning" role="alert">
                                                            Nama jenjang harus diisi.
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

                if(isset($_GET['id_jenjang'])){
                  $sql_id = mysql_query("SELECT * FROM jenjang WHERE id_jenjang = '".$_GET['id_jenjang']."'");
                  $data = mysql_fetch_array($sql_id);
                  $id = $_GET['id_jenjang'];
                  $nama_jenjang = $data['nama_jenjang'];
                  
                 
                }?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tambah Jenjang</h1>
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
                                            <label>Kode Kecamatan</label>
                                            <input class="form-control" placeholder="Kode Jenjang" name="kode_jenjang" <?php if(isset($id)) echo 'value="'.$id.'" readonly';?>>
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Kecamatan</label>
                                            <input class="form-control" placeholder="Nama Jenjang" name="nama_jenjang"  <?php if(isset($nama_jenjang)) echo 'value="'.$nama_jenjang.'"';?> >
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
