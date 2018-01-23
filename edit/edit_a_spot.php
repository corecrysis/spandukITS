<?php
include('../koneksi.php');
session_start();
       if (!isset($_SESSION['id_admin'])){
     header( 'Location:../login.html');
 } else {

           
           if(isset($_POST['submit_log'])){
               $tes = $_SESSION['sukas'];
    $m_nama_spot   = $_POST['m_nama_spot'];
    $m_kuota_spot   = $_POST['m_jml_spot'];
 $m_height_spanduk   = $_POST['m_tinggi_spanduk'];
 $m_width_spanduk   = $_POST['m_lebar_spanduk'];
        
           
$query = "UPDATE t_spot SET m_nama_spot = '$m_nama_spot' , m_kuota_spot = '$m_kuota_spot' , m_width_spanduk = '$m_width_spanduk' , m_height_spanduk = '$m_height_spanduk' WHERE m_id_spot = '$tes'";

if($dbh->exec($query))
{
    
    echo "<script type='text/javascript'>alert('Anda berhasil Edit settings.');document.location='../spot/settings.php'</script>";
}
else
    
    echo "<script type='text/javascript'>document.location='../spot/settings.php'</script>";
       }
       }
?>