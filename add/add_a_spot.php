<?php
include('../koneksi.php');
session_start();
  $jut = $_SESSION['id_admin'];
$query = "SELECT * FROM t_user where m_id_user='$jut'";
           $result = $dbh->query($query)->fetch();     

           if(isset($_POST['submit'])){
              // $tes = $_SESSION['id_admin'];

               $m_nama_spot         = $_POST['m_nama_spot'];
               $m_kuota_spot     = $_POST['m_jml_spot'];
               $m_lebar_spot     = $_POST['m_lebar_spot'];
               $m_tinggi_spot     = $_POST['m_tinggi_spot'];
               
               $date2 = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
               $p_timest= $date2->format('Y-m-d H:i:s');
               
               
               
               
//echo $p_timest;
    //$r_author_data = $result['m_name'];           
           
$table = 't_spot'; // ubah ke nama tabel
        $field = '`m_nama_spot`,`m_kuota_spot`,`m_kuota_spot_dinamis`,`m_width_spanduk`,`m_height_spanduk`'; // kolomnya, kalo > 1 pisahkan pakai koma
        $val = '?,?,?,?,?'; // ini sesuai jumlah kolomnya, pakai koma
        $array = array( $m_nama_spot, $m_kuota_spot, $m_kuota_spot, $m_lebar_spot, $m_tinggi_spot ); // sesuai jumlah kolom juga
 
        $sth = $dbh->prepare( "INSERT INTO $table ($field) VALUES ($val)" );
        $input = $sth->execute( $array );

   header( 'Location:../index.php');
       
       }
?>