<?php
include('../koneksi.php');
session_start();
       if (!isset($_SESSION['id_admin'])){
     header( 'Location:../login.html');
 } else {
$jut = $_SESSION['id_admin'];
$query = "SELECT * FROM t_user where m_id_user='$jut'";
           $result = $dbh->query($query)->fetch();
           
               $ax = $_SESSION['loop'];
           
          
           
//$query1= "SELECT COUNT(*) AS masuk FROM b_member where m_id_member > 1";ORDER BY r_id_news DESC LIMIT 10 OFFSET 0
//           $result1 = $dbh->query($query1)->fetch();  where t_nama_mobil =''  
            
           $query1= "SELECT * FROM t_spot  ";
           $result1 = $dbh->query($query1)->fetchAll();
           
           $query2= "select * from t_spot_temp  p  join t_spot m on p.m_id_spot = m.m_id_spot join t_spot_pinjam t on p.m_id_spjam = t.m_id_spjam where p.m_id_spot = $ax and m_stat_spnjam != '2' and m_stat_spnjam != '4' order by t.m_id_spjam desc";
           $result2 = $dbh->query($query2)->fetchAll();
           $query3= "select * from t_spot_temp  p  join t_spot m on p.m_id_spot = m.m_id_spot join t_spot_pinjam t on p.m_id_spjam = t.m_id_spjam where p.m_id_spot = $ax and m_stat_spnjam != '2' and m_stat_spnjam != '4' order by t.m_id_spjam desc";
           $result3 = $dbh->query($query2)->fetch();
           
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Spanduk ITS</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="../css/responsive.bootstrap.min.css">
        <link href="../css/datepicker3.css" rel="stylesheet">
        <link href="../css/styles.css" rel="stylesheet">
        <!--Icons-->
        <script src="../js/lumino.glyphs.js"></script>
        <!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
    </head>
    <style>
        .btn-warning {
            float: right;
        }
    </style>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> <a class="navbar-brand" href="#"><span>Spanduk</span>ITS</a>
                    <ul class="user-menu">
                        <li class="dropdown pull-right">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <svg class="glyph stroked male-user">
                                    <use xlink:href="#stroked-male-user"></use>
                                </svg>
                                <?php echo $result['m_user'];  ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="../logout.php">
                                        <svg class="glyph stroked cancel">
                                            <use xlink:href="#stroked-cancel"></use>
                                        </svg> Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.container-fluid -->
        </nav>
        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
            <form role="search">
                <div class="form-group">
                    <!--				<input type="text" class="form-control" placeholder="Search">-->
                </div>
            </form>
            <ul class="nav menu">
                <li>
                    <a href="../index.php">
                        <svg class="glyph stroked dashboard-dial">
                            <use xlink:href="#stroked-dashboard-dial"></use>
                        </svg> Halaman Utama </a>
                </li>
                <li class="active">
                    <a href="index.php">
                        <svg class="glyph stroked dashboard-dial">
                            <use xlink:href="#stroked-dashboard-dial"></use>
                        </svg> Informasi</a>
                </li>
                <li>
                    <a href="form_pengajuan.php">
                        <svg class="glyph stroked table">
                            <use xlink:href="#stroked-table"></use>
                        </svg> Form Pengajuan</a>
                </li>
                <li>
                    <a href="report.php">
                        <svg class="glyph stroked table">
                            <use xlink:href="#stroked-table"></use>
                        </svg> Pelaporan</a>
                </li>
                <?php if($result['m_id_user']==1){} else { ?>

                <li>
                    <a href="settings.php">
                        <svg class="glyph stroked app-window">
                            <use xlink:href="#stroked-app-window"></use>
                        </svg> Setting </a>
                </li>
                <?php } ?>
            </ul>
        </div>
        <!--/.sidebar-->
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php">
                            <svg class="glyph stroked home">
                                <use xlink:href="#stroked-home"></use>
                            </svg>
                        </a>
                    </li>
                </ol>
            </div>
            <!--/.row-->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><center>Informasi di <?php echo $result3['m_nama_spot'];  ?></center></h1> </div>
            </div>
            <!--/.row-->
            <div class="row"> </div>
            <!--/.row-->
            <center>
                <style>
                    .col-centered {
                        float: none;
                        margin: 0 auto;
                    }
                </style>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-centered">
                            <table id="example1" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th> Judul </th>
                                        <th> Tanggal Pemasangan</th>
                                        <th>Tanggal Pencopotan</th>
                                        <th> Status </th>
                                        <th>Detail Data </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($result2 as $r2){
                                    $originalaDate = $r2['m_pasang_spnjam'];
                                    $oriaDate = $r2['m_copot_spnjam'];
                                    $ver = $r2['m_stat_spnjam'];
                                    $newaDate = date("d-m-Y H:i:s", strtotime($originalaDate));
                                    $lastaDate = date("d-m-Y H:i:s", strtotime($oriaDate));
                                    ?>
                                        <tr>
                                            <td>
                                                <?php echo $r2['m_judul_spnjam']; ?>
                                            </td>
                                            <td>
                                                <?php echo $newaDate; ?>
                                            </td>
                                            <td>
                                                <?php echo $lastaDate; ?>
                                            </td>
                                            <td>
                                                <?php $aku = $r2['m_stat_spnjam']; 
                                                if($aku=='0'){echo 'PROSES';}else if($aku=='1'){echo 'ON';}
                                                else if($aku=='2'){echo 'OFF';} else if($aku=='3'){echo 'SEGERA DILEPAS';} else if($aku=='4'){echo 'SUDAH LEPAS';}
                                                ?>
                                            </td>
                                            <td>
                                                <br>
                                                <br>
                                                <div class="form-group">
                                                    <label class="control-label col-md-6">Judul Spanduk</label>
                                                    <div class="col-md-6">
                                                        <?php echo $r2['m_judul_spnjam']; ?>
                                                    
                                                    </div>
                                                    <br>
                                                    <?php 
               $mx = $r2['m_id_spjam'];
                                                    $query4 = "select * from t_spot_temp  p join t_spot_pinjam t on p.m_id_spjam = t.m_id_spjam join t_spot m on p.m_id_spot = m.m_id_spot where m_stat_spnjam != '2' and p.m_id_spjam = $mx order by t.m_id_spjam desc ";
           $result4 = $dbh->query($query4)->fetchAll();
                                                    
                                                    ?>
                                                
                                               
                                                    <label class="control-label col-md-6">Tempat</label>
                                                    <div class="col-md-6" word-wrap="break-word" >
                                                      
                                                          <?php foreach($result4 as $ana){
                                                       echo $ana['m_nama_spot'].", ";
                                                    } ?>  
                                                            

                                                        
                                                    </div>
                                                        
                                                    </div>
                                                    <br>
                                                    <label class="control-label col-md-6">Unit Pemasang</label>
                                                    <div class="col-md-6">
                                                        <?php echo $r2['m_unit_spnjam']; ?>
                                                    </div>
                                                    <br>
                                                    <label class="control-label col-md-6">Tanggal Pemasangan</label>
                                                    <div class="col-md-6">
                                                        <?php echo $newaDate; ?>
                                                    </div>
                                                    <br>
                                                    <label class="control-label col-md-6">Tanggal Pencopotan</label>
                                                    <div class="col-md-6">
                                                        <?php echo $lastaDate; ?>
                                                    </div>
                                                    <br>
                                                    <label class="control-label col-md-6">Contact Person</label>
                                                    <div class="col-md-6">
                                                       <?php echo $r2['m_cp_spnjam']; ?>
                                                    </div>
                                                    <label class="control-label col-md-6">Bukti Foto 1</label>
                                                    <div class="col-md-6">
                                                         <img src="<?php echo $r2['p_tmp_pict_1']; ?>" width='20%'>
                                                    </div>
                                                    <label class="control-label col-md-6">Bukti Foto 2</label>
                                                    <div class="col-md-6">
                                                        <img src="<?php echo $r2['p_tmp_pict_2']; ?>" width='20%'>
                                                    </div>
                                                    <label class="control-label col-md-6">Bukti Foto 3</label>
                                                    <div class="col-md-6">
                                                        <img src="<?php echo $r2['p_tmp_pict_3']; ?>" width='20%'>
                                                    </div>
                                                
                                                </div>
                                                <br>
                                                <br>
                                                <br>
                                                <?php 
               if($result['m_id_user']==1){
                   
                   if($ver=='1'){ ?>
<!--
                                                    <div class="form-group">
                                                        <form action="alasan.php" method="post">
                                                            <label class="control-label col-md-6" style="padding-right:50px;">Tolak verifikasi</label>
                                                            
                                                                <input type="hidden" name="id2" value="<?php echo $r2['m_id_spjam']; ?>">
                                                                <button name="tolak" id="id1" class="btn-warning">Tolak/Kadaluarsa</button>
                                                           
                                                        </form>
                                                    </div>
                                                    <br>
-->
                                                    <?php  }
               } else {
               if($ver=='0'){ ?>
                                                <center><div class="col-md-7">
                                                        <form action="check_verif.php" method="post">
<!--                                                            <label>Konfirmasi Pemasangan</label>-->
                                                            
                                                            <input type="hidden" name="id1" value="<?php echo $r2['m_id_spjam']; ?>">
                                                            <button name="verif" id="id1" class="btn-success">Verifikasi</button>
                                                        </form>
                                                        <br><br>
                                                        </div>
                                                            <form action="alasan.php" method="post">
<!--                                                            <label>Tolak verifikasi/Pencopotan spanduk</label>-->
                                                            <button name="tolak" id="id1" class="btn-warning">Tolak/Kadaluarsa</button>
                                                            <input type="hidden" name="id2" value="<?php echo $r2['m_id_spjam']; ?>"> </form>
                                                        <?php } else if($ver=='1'){ ?>
                                                            
                                                                
                                                                <form action="alasan.php" method="post">
<!--                                                                    <label class="control-label col-md-6" style="padding-right:50px;">Tolak verifikasi</label>-->
                                                                    
                                                                        <input type="hidden" name="id2" value="<?php echo $r2['m_id_spjam']; ?>">
                                                                        <button name="tolak" id="id1" class="btn-warning">Tolak/Kadaluarsa</button>
                                                                    
                                                                </form>
                                                            
                                                            <br>
                                                            <?php  }else if($ver == '3'){ ?>
                                                                <form action="off_verif.php" method="post">
<!--                                                                    <label>Konfirmasi Pemasangan</label>-->
                                                                    
                                                                    <input type="hidden" name="id1" value="<?php echo $r2['m_id_spjam']; ?>">
                                                                    <button name="verif" id="id1" class="btn-success">Verifikasi Lepas</button>
                                                                    
                                                                </form>
                                                                <br>
                                                                <?php } } ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                </div>
                <!--/.row-->
        </div>
        </div>
        </center>
        <!--/.row-->
        <div class="row"> </div>
        <!--/.row-->
        <div class="row"> </div>
        <!--/.row-->
        </div>
        <!--/.main-->
        <script src="../js/jquery-1.11.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/chart.min.js"></script>
        <script src="../js/chart-data.js"></script>
        <script src="../js/easypiechart.js"></script>
        <script src="../js/easypiechart-data.js"></script>
        <script src="../js/bootstrap-datepicker.js"></script>
        <script src="../js/bootstrap-table.js"></script>
        <!-- DataTables -->
        <script src="https://code.jquery.com/jquery-1.12.3.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.1.0/js/responsive.bootstrap.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#example1').DataTable({
                    //                    bFilter: false
                                         bPaginate: false
//                                        , bSort: false
                                        , bInfo: false
                });
            });
        </script>
        <!-- Menu Toggle Script -->
        <script>
            $("#menu-toggle").click(function (e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>
        <script>
            ! function ($) {
                $(document).on("click", "ul.nav li.parent > a > span.icon", function () {
                    $(this).find('em:first').toggleClass("glyphicon-minus");
                });
                $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
            }(window.jQuery);
            $(window).on('resize', function () {
                if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
            })
            $(window).on('resize', function () {
                if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
            })
        </script>
    </body>

    </html>
    <?php } ?>