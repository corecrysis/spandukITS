<?php
include('../koneksi.php');
session_start();
            $dx = $_GET['id'];
           $_SESSION['loop']=$dx;
//echo $_SESSION['loop'];

//header( 'Location:coba.php');
$date2 = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
$date2->modify('-2 day');
$p_timest= $date2->format('Y-m-d H:i:s');

$date1 = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
//$date1->modify('+52 hours');
$p_timest_now= $date1->format('Y-m-d H:i:s');


$query2= "select * from t_spot_pinjam  ";
           $result2 = $dbh->query($query2)->fetchAll();
//header( 'Location:index.php');
foreach($result2 as $r2){
    $ceking_date = $r2['m_copot_spnjam'];
    $ceking_stat = $r2['m_stat_spnjam'];
    
    if($ceking_date <= $p_timest_now && $ceking_stat != '4' ){
        $m_stat_spnjam = '3';
    $coba_id = $r2['m_id_spjam'];
        $query = "UPDATE t_spot_pinjam SET m_stat_spnjam = '$m_stat_spnjam' where m_id_spjam = $coba_id  ";
//var_dump();
   // echo $query;
if($dbh->exec($query))
{
    header( 'Location:index.php');
    
}
    } else {
        header( 'Location:index.php');
    }

    
//if($ceking_date <= $p_timest AND $r2['m_stat_spnjam'] != '2'){
//    //echo '3';
//       // var_dump();
//    $m_stat_spnjam = '4';
//    $coba_id = $r2['m_id_spjam'];
//    $query = "UPDATE t_spot_pinjam SET m_stat_spnjam = '$m_stat_spnjam' where m_id_spjam = $coba_id  ";
////var_dump();
//   // echo $query;
//if($dbh->exec($query))
//{
//    header( 'Location:index.php');
//    
//}
//    
//} 
//else {
//     //   echo '1';
//    header( 'Location:index.php');
    header( 'Location:index.php');
}
   header( 'Location:index.php');

?>