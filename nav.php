<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ayo Sekolah</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">AYO SEKOLAH</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
           
             
             
                        
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                
                   
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                       
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                       
                       
                      
                         <li>
                            <a href="#"><i class="fa fa-university" aria-hidden="true"></i> Kecamatan <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="kecamatan_add.php"><i class="fa fa-plus-circle" aria-hidden="true"></i>   Tambah Kecamatan</a>
                                </li>
                                <li>
                                    <a href="kecamatan.php"><i class="fa fa-table "></i>   Lihat Kecamatan</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>                
                        
                         <li>
                            <a href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i>  TK <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="tk_add.php"> <i class="fa fa-plus-circle" aria-hidden="true"></i>Tambah TK</a>
                                </li>
                                <li>
                                    <a href="tk.php"> <i class="fa fa-table "></i>Lihat TK</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i> SD <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="sd_add.php"> <i class="fa fa-plus-circle" aria-hidden="true"></i>Tambah SD</a>
                                </li>
                                <li>
                                    <a href="sd.php"> <i class="fa fa-table "></i>Lihat SD</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i> SMP <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="smp_add.php"> <i class="fa fa-plus-circle" aria-hidden="true"></i>Tambah SMP</a>
                                </li>
                                <li>
                                    <a href="smp.php"> <i class="fa fa-table "></i>Lihat SMP</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i> SMA <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="sma_add.php"> <i class="fa fa-plus-circle" aria-hidden="true"></i>Tambah SMA</a>
                                </li>
                                <li>
                                    <a href="sma.php"> <i class="fa fa-table "></i>Lihat SMA</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Kriteria <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="kriteria_add.php"> <i class="fa fa-plus-circle" aria-hidden="true"></i>Tambah Kriteria</a>
                                </li>
                                <li>
                                    <a href="kriteria.php"> <i class="fa fa-table "></i>Lihat Kriteria</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>