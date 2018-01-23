<?php
include('../koneksi.php');
session_start();
//       if (!isset($_SESSION['id_admin'])){
//     header( 'Location:../login.html');
// } else {
 
$tes  = $_POST['id1'];        
       
//$query1 = "select * from t_spot_pinjam where m_id_spjam = $tes ";
//           $result1 = $dbh->query($query1)->fetch();
//      if($result1['m_stat_spnjam'] == '1'){
//         $ax= $result1['m_lokasi_spnjam'];
//          $query3 = "select * from t_spot where m_id_spot = '$ax' ";
//           $result3 = $dbh->query($query3)->fetch();
//$sx = $result3['m_kuota_spot'];
//          $sx = $sx - 1;
//          $query4 = "UPDATE t_spot SET m_kuota_spot = '$sx' WHERE m_id_spot = '$ax'";
//
//if($dbh->exec($query4))
//{
//   
//}
//      }
//      $query12 = "select * from t_spot_pinjam where m_id_spjam = $tes ";
//           $result12 = $dbh->query($query12)->fetch();
//      if($result12['m_stat_spnjam'] == '1'){
//         $ax= $result12['m_lokasi_spnjam'];
//          $query31 = "select * from t_spot where m_id_spot = '$ax' ";
//           $result31 = $dbh->query($query31)->fetch();
//$sx = $result31['m_kuota_spot'];
//          $sx = $sx - 1;
//          $query5 = "UPDATE t_spot SET m_kuota_spot = '$sx' WHERE m_id_spot = '$ax'";
//
//if($dbh->exec($query5))
//{
//   
//}
//    
//      }
      
$publish = "1";

$query = "UPDATE t_spot_pinjam SET m_stat_spnjam = '$publish' WHERE m_id_spjam = $tes";

if($dbh->exec($query))
{
    echo 'sukses';
    echo "<script type='text/javascript'>alert('Anda berhasil Verifikasi.');document.location='index.php'</script>";
}
else
    echo 'gagal';
    echo '<a href="index.php">Kembali</a>';
     //  }

?>