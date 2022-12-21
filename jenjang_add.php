<?php 


defined('__NOT_DIRECT')||define('__NOT_DIRECT',1);
include'cek_akses.php';
include'nav.php' ;


/* Koneksi ke Database */
                mysql_connect(DB_HOST,DB_USER,DB_PASS);
                mysql_select_db(DB_NAME);
                /*-------------------------------*/


                $sql=mysql_query("select max(id_jenjang) as kode from jenjang");

                $data=mysql_fetch_array($sql) or trigger_error(mysql_error().$sql);
                $kodeawal=substr($data['kode'],2,4)+1;
                if($kodeawal<10){
                  $kode='J000'.$kodeawal;
                }elseif($kodeawal > 9 && $kodeawal <=99){
                  $kode='J00'.$kodeawal;
                }elseif($kodeawal >99 && $kodeawal <=999) {
                  $kode='J0'.$kodeawal;
                }else{
                  $kode='J'.$kodeawal;
                }
               
                if(isset($_POST['submit'])){
                  $id = $_POST['kode_jenjang'];
                  $nama_jenjang = $_POST['nama_jenjang'];
                 
                  $error = false;
                  
                  
                  if(!$error){
                    if(!empty($nama_jenjang) ){
                      $queryadd = mysql_query("INSERT INTO jenjang(id_jenjang,nama_jenjang)
                        VALUES ('".$_POST['kode_jenjang']."','".$nama_jenjang."')");
                      if($queryadd){
                      echo"<script>alert('Daftar jenjang   tersimpan.'); location='jenjang.php'</script>";
                      }else{
                        echo 'Gagal query database.';
                      }
                    }else{
                       echo"<script>alert('nama jenjang  harus diisi'); location='jenjang_add.php'</script>";
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
                                            <label>Kode Jenjang</label>
                                            <input class="form-control" placeholder="Kode Jenjang" name="kode_jenjang" value="<?php echo $kode;?>">
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Jenjang</label>
                                            <input class="form-control" placeholder="Nama Jenjang" name="nama_jenjang">
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
