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
                  $id = $_POST['id'];
                  $id_kecamatan = $_POST['id_kecamatan'];
                  
                  $nama = $_POST['nama'];
                  $alamat = $_POST['alamat'];
                   $lat = $_POST['lat'];
                    $lng = $_POST['lng'];
                     $c1 = $_POST['c1'];
                    $c2 = $_POST['c2'];
                      $c3 = $_POST['c3'];


                  

                  $error = false;
                  if(!$error){
                    if(!empty($id_kecamatan)  && !empty($nama) && !empty($alamat)  && !empty($lat) && !empty($lng)){
                         $queryupd = mysql_query("UPDATE smp SET id_kecamatan='".$id_kecamatan."', nama='".$nama."'
                          , alamat='".$alamat."',lat='".$lat."',lng='".$lng."',c1='".$c1."',c2='".$c2."',c3='".$c3."' WHERE id_smp='".$id."'");
                   
                      if($queryupd){
                      echo"<script>alert('Daftar sekolah terupdate.'); location='smp.php'</script>";
                      }else{
                        echo 'Gagal query database.';
                      }
                    }else{
                      echo '
                                                    <div class="col-sm-5" style="margin-left:400px;">
                                                        <div class="alert alert-warning" role="alert">
                                                             harus diisi.
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
                
                 if(isset($_GET['id_smp'])){
                  $sql_id = mysql_query("SELECT * FROM smp WHERE id_smp = '".$_GET['id_smp']."'");
                  $data = mysql_fetch_array($sql_id);
                  $id = $_GET['id_smp'];
                  $nama_kecamatan = $data['id_kecamatan'];
                 
                   $nama = $data['nama'];
                  $alamat = $data['alamat'];
                  $lat = $data['lat'];
                  $lng = $data['lng'];
                  $c1 = $data['c1'];
                  $c2 = $data['c2'];
                  $c3 = $data['c3'];
                  
                  
                 
                }

               ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Edit SMP</h1>
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
                                     <form role="form" method="post" action="">
                                     
                                     <div class="form-group">
                                        <label for="id">Kode smp </label>
                                          <input type="text" class="form-control" name="id" placeholder="Kode Sekolah" <?php if(isset($id)) echo 'value="'.$id.'" readonly';?>>
                                        </div>
                                        
                                           
                                           
                                           
                                            <div class="form-group">
                                        <label for="kecamatan" >kecamatan</label>
                                      
                                          <select name="id_kecamatan" class="form-control">
                                            <option> </option>
                                            <?php
                                                    $sqlkecamatan= mysql_query("SELECT * FROM kecamatan");
                                                    while ($row = mysql_fetch_array($sqlkecamatan))
                                                    {
                                                      if($nama_kecamatan==$row['id_kecamatan']){
                                                        echo '<option value="'.$row['id_kecamatan'].'" selected>'.$row['nama_kecamatan'].'</option>';
                                                      }else{
                                                        echo '<option value="'.$row['id_kecamatan'].'">'.$row['nama_kecamatan'].'</option>';
                                                      }
                                                    }
                                                    ?>
                                          </select>
                                        
                                      </div>
                                   
                                     



                                        <div class="form-group">
                                            <label>Nama Sekolah</label>
                                            <input class="form-control" placeholder="Nama Sekolah" name="nama" <?php if(isset($nama)) echo 'value="'.$nama.'"';?>/>
                                        </div>
                                        <div class="form-group">
                                          <label for="alamat">Alamat</label>
                                          <textarea class="form-control" rows="5" id="alamat" name="alamat" > <?php if(isset($alamat)) echo $alamat;?></textarea>
                                        </div>
                                          <div class="form-group">
                                            <label>Latitude</label>
                                            <input class="form-control" placeholder="latitude" name="lat" <?php if(isset($lat)) echo 'value="'.$lat.'"';?>/>
                                        </div>
                                          <div class="form-group">
                                            <label>Langitude</label>
                                            <input class="form-control" placeholder="langitude" name="lng" <?php if(isset($lng)) echo 'value="'.$lng.'"';?>/>
                                        </div>
                                          <div class="form-group">
                                            <label>Nilai</label>
                                            <input class="form-control" placeholder="nilai" name="c1" <?php if(isset($c1)) echo 'value="'.$c1.'"';?>/>
                                        </div>
                                         <div class="form-group">
                                            <label>akreditasi</label>
                                            <input class="form-control" placeholder="akreditasi" name="c2" <?php if(isset($c2)) echo 'value="'.$c2.'"';?>/>
                                        </div>
                                         <div class="form-group">
                                            <label>Sertifikasi</label>
                                            <input class="form-control" placeholder="sertifikasi" name="c3" <?php if(isset($c3)) echo 'value="'.$c3.'"';?>/>
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
