<?php 
include('../koneksi.php');
session_start();
if (!isset($_SESSION['id_admin'])){
     header( 'Location:../login.html');
 } else {
    $jut = $_SESSION['id_admin'];
$query = "SELECT * FROM t_user where m_id_user='$jut'";
           $result = $dbh->query($query)->fetch();
//$tes = $_SESSION['id'];// = $_POST['idview'];
//$query2 = "SELECT *  FROM member WHERE id = '$tes'";

$_SESSION['sukas'] = $_POST['id2'];
$tes = $_SESSION['sukas']; 
//$query1 = "SELECT *  FROM t_data_pinjam WHERE p_id_pinjam=$idx";
//$result1 = $dbh->query($query1)->fetch();
    $query1 = "SELECT *  FROM t_spot WHERE m_id_spot=$tes";
$result1 = $dbh->query($query1)->fetch();
//    $query2 = "select m.m_nama_barang from t_data_pinjam  p join t_fasilitas m on p.p_barang = m.t_id_fasilitas where p_id_pinjam=$idx";
//$result2 = $dbh->query($query2)->fetch();
//$stmt = $dbh->query('SELECT * FROM qcemulsifying where idx'); 
  
//$result2 = $dbh->query($query2)->fetch();

//$stmt2->setFetchMode(PDO::FETCH_ASSOC);
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Peminjaman ITS</title>
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
                <li class="active">
                    <a href="../spot/settings.php">
                        <svg class="glyph stroked dashboard-dial">
                            <use xlink:href="#stroked-dashboard-dial"></use>
                        </svg> Back</a>
                </li>
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
                    <h1 class="page-header">Dashboard</h1> </div>
            </div>
            <!--/.row-->
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">Edit</div>
                        <div class="panel-body">
                            <form class="form-horizontal" action="edit_a_spot.php" method="post" role="form">
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Nama Spot</label>
                                        <input class="form-control" value="<?php echo $result1['m_nama_spot']; ?>" name="m_nama_spot" type="text" autofocus=""> </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Kuota Spot</label>
                                        <input class="form-control" value="<?php echo $result1['m_kuota_spot']; ?>"  type="number" name="m_jml_spot" min="1" max="20" autofocus=""> </div>
                                    <div class="form-group">
                                        <label class="col-sm-5 control-label">Tinggi Spanduk</label>
                                        <input class="form-control" onkeypress="checkNumber(event)" value="<?php echo $result1['m_height_spanduk']; ?>" name="m_tinggi_spanduk" type="text" autofocus=""> </div>
                                    <div class="form-group">
                                        <label class="col-sm-5 control-label">Lebar Spanduk</label>
                                        <input class="form-control" onkeypress="checkNumber(event)" value="<?php echo $result1['m_width_spanduk']; ?>" name="m_lebar_spanduk" type="text" autofocus=""> </div>
                                    <input type="submit" value="Submit" class="btn btn-primary" name="submit_log" /> </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.col-->
            </div>
            <!--/.row-->
            <div class="row"> </div>
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
                $('#example1').DataTable();
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