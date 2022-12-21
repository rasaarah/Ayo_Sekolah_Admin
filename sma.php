<?php
defined('__NOT_DIRECT')||define('__NOT_DIRECT',1);
include'cek_akses.php';
include'nav.php' ; 
$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"> Data SMA</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
            <div class="row">
                  <div class="col-lg-12"  >
                      <form method="get" action="" class="form-inline" >
                        <div class="form-group">
                       <input type="text" class="form-control" id="usersearch" name="usersearch" placeholder="Nama SMP">
                  </div>  
                    <button type="submit" class="btn btn-default">OK</button>
                       </form>
                  </div>
              </div>
              <br />
              <br />
         
               <?php
              
   

                if(isset($_GET['id_sma'])){
                                    $querydel = mysqli_query($dbc,"DELETE FROM sma WHERE id_sma = '".$_GET['id_sma']."'");
                                    if($querydel){
                                         echo"<script>alert('Daftar SMA ".$_GET['id_smp']." terhapus.'); location='sma.php'</script>";
                                    }
                                }

              // $tampil=mysql_query("SELECT * FROM gubernur INNER JOIN provinsi on gubernur.id_provinsi = provinsi.id_provinsi ORDER BY id_gubernur");
              // $total = mysql_num_rows($tampil);
              // if($total > 0)
              // {
              ?>
           <div class="row">
                <div class="col-lg-10" margin-top="40px">
                    <div class="panel panel-default" >
                        <div class="panel-heading">
                            <h4>Daftar Nama SMA</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                           
                                            <th>Nama sekolah</th>
                                             <th>status</th>
                                            <th> kecamatan</th>
                                            <th>alamat</th>
                                          
                                            <th> Edit</th>
                                            <th>Hapus</th>
                                            
                                        </tr>
                                    </thead>
                                 
                                       
                                    
                   <?php

                 include'search_sma.php';

                    ?>  
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div> <!--row-->
         
           
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
