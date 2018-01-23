<?php
include('../koneksi.php');
session_start();
       if (!isset($_SESSION['id_admin'])){
     header( 'Location:../login.html');
 } else {
$jut = $_SESSION['id_admin'];
$query = "SELECT * FROM t_user where m_id_user='$jut'";
           $result = $dbh->query($query)->fetch();
$query1 = "SELECT * FROM t_user where m_id_user=1";
           $result1 = $dbh->query($query1)->fetch();
$query3= "SELECT * FROM t_spot";
           $result3 = $dbh->query($query3)->fetchAll();
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

    <body>
        <script type="text/javascript">
            function checkNumber(e) {
                var key = e.which || e.keyCode || e.charCode;
                if (key == 8 || key == 9 || key == 44 || key == 13 || key == 27 || key == 190 || (key >= 35 && key <= 38) || (key >= 48 && key <= 57)) return;
                else {
                    e.preventDefault();
                }
            }
        </script>
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
                                <?php echo $result['m_user'];?> <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="../logout.php">
                                        <svg class="glyph stroked cancel">
                                            <use xlink:href="#stroked-cancel"></use>
                                        </svg> Logout</a>
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
                        </svg> Halaman Utama</a>
                </li>
                <li>
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
                <li class="active">
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
                    <h1 class="page-header">Setting</h1> </div>
            </div>
            <!--/.row-->
            <div class="container">
                <div class="col-md-8"> </div>
                <!--/.row-->
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <center>
                                <h3>Tambah / Hapus Spot Spanduk</h3></center>
                            <div class="form-group">
                                <table id="example1" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Nama Spot</th>
                                            <th>Kuota Spanduk</th>
                                            <th>Edit</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ( $result3 as $r3 ) 
            { ?>
                                            <tr>
                                                <td>
                                                    <?php echo $r3['m_nama_spot']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $r3['m_kuota_spot']; ?>
                                                </td>
                                                <form method="POST" action="../edit/edit_spot.php">
                                                    <td>
                                                        <input type="hidden" name="id2" id="hx" value="<?php echo $r3['m_id_spot']; ?>">
                                                        <input type="submit" name="submit" value="Edit" class="btn btn-primary"> </td>
                                                </form>
                                                <form method="POST" action="../delete/delete_a_spot.php">
                                                    <td>
                                                        <input type="hidden" name="id1" id="hx" value="<?php echo $r3['m_id_spot']; ?>">
                                                        <input type="submit" name="submit" value="Hapus" class="btn btn-primary"> </td>
                                                </form>
                                            </tr>
                                            <?php }?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <form class="form-horizontal" action="p_spot.php" method="post" role="form">
                                    <label>Tambah Spot Spanduk</label>
                                    <div class="form-group">
                                        <td>
                                            <input class="form-control" placeholder="spot" name="m_nama_spot" type="text" autofocus="" required> </td>
                                        <br> </div>
                                    <label>Kuota Spanduk</label>
                                    <div class="form-group">
                                        <td>
                                            <input type="number" autofocus="" class="form-control" name="m_jml_spot" min="1" max="20" required> </td>
                                        <br> </div>
                                    <label>Lebar Spanduk</label>
                                    <div class="form-group">
                                        <td>
                                            <input type="text" class="form-control" name="m_lebar_spot" placeholder="Masukkan lebar spanduk" onkeypress="checkNumber(event)" required> </td>
                                        <br> </div>
                                    <label>Tinggi Spanduk</label>
                                    <div class="form-group">
                                        <td>
                                            <input type="text" class="form-control" name="m_tinggi_spot" onkeypress="checkNumber(event)" placeholder="Masukkan lebar spanduk" required> </td>
                                        <br> </div>
                                    
                                    <input type="submit" value="Tambah" class="btn btn-primary" name="submit_spot" /> </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/.row-->
                <div class="container">
                    <div class="col-md-8">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="col-md-5">
                                    <form class="form-horizontal" action="p_pass.php" method="post" role="form">
                                        <div class="form-group">
                                            <label><b>Ubah Password <?php echo $result['m_user'];?></b></label>
<!--
                                            <td>
                                                <p>Password lama</p>
                                                <input class="form-control" placeholder="pass" name="m_pass_lama" type="password" autofocus=""> </td>
                                            <br>
-->
                                            <td>
                                                <p>Password baru</p>
                                                <input class="form-control" placeholder="pass baru" name="m_pass_baru" type="password" autofocus="" required> </td>
                                            <br>
                                            <input type="submit" value="Ubah Password" class="btn btn-primary" name="submit_pass" /> </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--/.col-->
                    </div>
                </div>
                <div class="container">
                    <div class="col-md-8">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="col-md-5">
                                    <form class="form-horizontal" action="p_pass1.php" method="post" role="form">
                                        <div class="form-group">
                                            <label><b>Ubah Password <?php echo $result1['m_user'];?></b></label>
<!--
                                            <td>
                                                <p>Password lama</p>
                                                <input class="form-control" placeholder="pass" name="m_pass_lama" type="password" autofocus=""> </td>
                                            <br>
-->
                                            <td>
                                                <p>Password baru</p>
                                                <input class="form-control" placeholder="pass baru" name="m_pass_baru" type="password" autofocus="" required> </td>
                                            <br>
                                            <input type="submit" value="Ubah Password" class="btn btn-primary" name="submit_pass" /> </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--/.col-->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8"> </div>
                    <!--/.col-->
                    <div class="col-md-4"> </div>
                    <!--/.col-->
                </div>
                <!--/.row-->
            </div>
            <!--/.main-->
            <script src="../js/jquery-1.11.1.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
            <script src="../js/chart.min.js"></script>
            <script src="../js/chart-data.js"></script>
            <script src="./js/easypiechart.js"></script>
            <script src="../js/easypiechart-data.js"></script>
            <script src="../js/bootstrap-datepicker.js"></script>
            <script>
                $('#calendar').datepicker({});
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