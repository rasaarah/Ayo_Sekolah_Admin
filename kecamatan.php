<?php 
defined('__NOT_DIRECT')||define('__NOT_DIRECT',1);
include'cek_akses.php';
include('nav.php'); 

       
               mysql_connect(DB_HOST,DB_USER,DB_PASS);
                mysql_select_db(DB_NAME);

                if(isset($_GET['id_kecamatan'])){
                                    $querydel = mysql_query("DELETE FROM kecamatan WHERE id_kecamatan = '".$_GET['id_kecamatan']."'");
                                    if($querydel){
                                         echo"<script>alert('Daftar kecamatan ".$_GET['id_kecamatan']." terhapus.'); location='kecamatan.php'</script>";
                                    }
                                }
              $tampil=mysql_query("SELECT * FROM kecamatan  ORDER BY id_kecamatan");
              $total = mysql_num_rows($tampil);
              if($total > 0)
              {
              ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <br />
                        <br />
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
           <div class="row">
                <div class="col-lg-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>Kecamatan</h3>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th> Kode Kecamatan</th>
                                            <th>Nama Kecamatan</th>
                                            <th> Edit</th>
                                            <th>Hapus</th>
                                            
                                        </tr>
                                    </thead>

                                    <?php 
                   
                          while($baris=mysql_fetch_array($tampil)){
                            

                          ?> 
                                    <tbody>
                                        <tr>
                                            <td><?php echo $baris['id_kecamatan']; ?></td>
                                            <td><?php echo $baris['nama_kecamatan']; ?></td>
                                            <td><a href="<?php echo 'kecamatan_edit.php'."?id_kecamatan=".$baris['id_kecamatan'] ?>"> <i style="color: black;" class="fa fa-pencil-square-o"></i></a></td>
                                            <td><a href="<?php echo 'kecamatan.php'."?id_kecamatan=".$baris['id_kecamatan'] ?>"><i  style="color: black;" class="fa fa-trash-o"></i></a></td>
                                            
                                        </tr>
                                       
                                    </tbody>
                                     <?php
                   
                    }
                    ?>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
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
    <?php

    }
    else
        echo"<h4> Tidak ada data </h4>"
  ?>

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
