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

$_SESSION['asik']=$_POST['id2'];
    $ax = $_SESSION['asik'];

//$stmt = $dbh->query('SELECT * FROM qcemulsifying where idx'); 
  
//$result2 = $dbh->query($query2)->fetch();

//$stmt2->setFetchMode(PDO::FETCH_ASSOC);
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
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> <a class="navbar-brand" href="#"><span>Peminjaman</span>ITS</a>
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
                    <a href="index.php">
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
                <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-md-8 ">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">Detail</div>
                        <div class="panel-body">
                            <fieldset>
                                <div class="form-group">
                                    <form class="form-horizontal" action="tolak_verif.php" method="post">
                                        <div class="form-group">
                                            <label for="email" class="col-sm-3 control-label">Alasan penolakan</label>
                                            <div class="col-sm-4">
                                                <textarea class="form-control" id="message" name="p_tujuan" placeholder="alasan" rows="5" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-4 control-label"></label>
                                            <div class="col-sm-4">
                                                <button type="submit" name="submit" class="btn btn-primary" value="simpan">Submit</button>
                                                <button type="reset" class="btn btn-primary" value="reset" onclick="return confirm('hapus data yang telah diinput?')">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </fieldset>
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