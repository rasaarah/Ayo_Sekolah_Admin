<?php 


defined('__NOT_DIRECT')||define('__NOT_DIRECT',1);
include'cek_akses.php';
include'nav.php' ;


/* Koneksi ke Database */
                mysql_connect(DB_HOST,DB_USER,DB_PASS);
                mysql_select_db(DB_NAME);
                /*-------------------------------*/


                // $sql=mysql_query("select max(id_sekolah) as kode from sekolah");

                // $data=mysql_fetch_array($sql) or trigger_error(mysql_error().$sql);
                // $kodeawal=substr($data['kode'],2,4)+1;
                // if($kodeawal<10){
                //   $kode='S000'.$kodeawal;
                // }elseif($kodeawal > 9 && $kodeawal <=99){
                //   $kode='S00'.$kodeawal;
                // }elseif($kodeawal >99 && $kodeawal <=999) {
                //   $kode='S0'.$kodeawal;
                // }else{
                //   $kode='S'.$kodeawal;
                // }

                 $status="";
               
               if(isset($_POST['submit'])){
                  // $id = $_POST['id_sekolah'];
                  $nama_kecamatan = $_POST['kecamatan'];
         
                  $nama_sekolah = $_POST['nama_sekolah'];
                 $alamat = $_POST['alamat'];
                   $lat = $_POST['lat'];
                  $lng = $_POST['lng'];
                  $c1 = $_POST['c1'];
                  $c2 = $_POST['c2'];
                  $c3 = $_POST['c3'];
            
                  if(isset($_POST['status']))
                      {
                        $status=$_POST['status'];
                      }


                  // $error = false;
                  
                  
                  // if(!$error){
                  //   if(!empty($nama_kecamatan)  && !empty($nama_sekolah) && !empty($alamat) && !empty($status) && !empty($lat) && !empty($lng))
                  //   {
                  //     $queryadd = mysql_query("INSERT INTO sd(id_kecamatan,nama,alamat,status,lat,lng,c1,c2,c3)
                  //       VALUES ('".$nama_kecamatan."','".$nama_sekolah."','".$alamat."','".$status."','".$lat."','".$lng."','".$c1."','".$c2."','".$c3."')");
                  //     if($queryadd){
                  //     echo"<script>alert('Daftar SD tersimpan.'); location='sd.php'</script>";
                  //     }else{
                  //       echo 'Gagal query database.';
                  //     }
                  //   }else{
                  //      echo"<script>alert('lengkapi Form'); location='sd_add.php'</script>";
                  //     $retry=true;
                  //   }
                  // }else{
                  //   echo 'Input ulang.';
                  //   $retry=true;
                  // }
                    
                      if(empty($_POST['kecamatan']) || empty($_POST['nama_sekolah']) || empty($_POST['alamat'])|| $status=="" || empty($_POST['lat'])|| empty($_POST['lng'])|| empty($_POST['c1']) || empty($_POST['c2']) || empty($_POST['c3']))
                              { echo"<script>alert('jangan kosong!'); location='sd_add.php'</script>"; }
                          else
                          {
                            $query=mysql_query("INSERT INTO sd(id_kecamatan,nama,alamat,status,lat,lng,c1,c2,c3)
                              VALUES ('".$nama_kecamatan."','".$nama_sekolah."','".$alamat."','".$status."','".$lat."','".$lng."','".$c1."','".$c2."','".$c3."')");
                              if($query)
                              { echo"<script> alert('DATA BERHASIL DISIMPAN ! ');location='sd.php'</script>";}
                              else
                                { echo"<script> alert('DATA GAGAL DISIMPAN !');location='sd_add.php'</script>";}
                              
                          } 
                 }
               
               
                ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tambah SD</h1>
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
                            Tambah TK
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="post" action="">
                                        <!-- <div class="form-group">
                                            <label>Kode Sekolah</label>
                                            <input class="form-control" placeholder="Kode Sekolah" name="id_sekolah">
                                           
                                        </div> -->

                                        <div class="form-group">
                                        <label for="kecamatan" >Kecamatan</label>
                                       
                                          <select name="kecamatan" class="form-control">
                                            <option> </option>
                                            <?php
                                                  $sqlkec = mysql_query("SELECT * FROM kecamatan");
                                                  while ($row = mysql_fetch_array($sqlkec))
                                                  {
                                                    echo '<option value="'.$row['id_kecamatan'].'">'.$row['nama_kecamatan'].'</option>';
                                                  }
                                                  ?>
                                          </select>
                                      
                                      </div>


                                      <div class="form-group">
                                        <label for="status">Status</label>
                                        <div class="radio">
                                                  <label>
                                                    <input type="radio" name="status" id="optionsRadios4" value="1" >
                                                    Negeri
                                                  </label>
                                                </div>
                                                <div class="radio">
                                                  <label>
                                                    <input type="radio" name="status" id="optionsRadios5" value="0">
                                                   Swasta
                                                  </label>
                                                </div>
                                      </div>



                                        <div class="form-group">
                                            <label>Nama Sekolah</label>
                                            <input class="form-control" placeholder="Nama Sekolah" name="nama_sekolah">
                                        </div>
                                        <div class="form-group">
                                          <label for="alamat">Alamat</label>
                                          <textarea class="form-control" rows="5" id="alamat" name="alamat"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Latitude</label>
                                            <input class="form-control" placeholder="Latitude" name="lat">
                                        </div>

                                        <div class="form-group">
                                            <label>Langitude</label>
                                            <input class="form-control" placeholder="Langitude" name="lng">
                                        </div>

                                        <div class="form-group">
                                            <label>C1</label>
                                            <input class="form-control" placeholder="nilai" name="c1">
                                        </div>

                                         <div class="form-group">
                                            <label>C2</label>
                                            <input class="form-control" placeholder="akreditasi" name="c2">
                                        </div>

                                         <div class="form-group">
                                            <label>C3</label>
                                            <input class="form-control" placeholder="Sertifikasi" name="c3">
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
