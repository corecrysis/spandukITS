<?php
include('../koneksi.php');
session_start();
       

           if(isset($_POST['submit'])){
               $m_judul_spnjam     = $_POST['p_judul'];
              // $tes = $_SESSION['id_admin'];
if(!empty($_POST['check_list'])) {
    foreach($_POST['check_list'] as $selected) {
        $kueri="Select m_id_spjam from t_spot_pinjam ORDER BY m_id_spjam DESC LIMIT 1";
        $hasil = $dbh->query($kueri)->fetch();      
        $hasil = $hasil['m_id_spjam'] + 1;
$table = 't_spot_temp'; // ubah ke nama tabel
        $field = '`m_id_spot`,`m_id_spjam`'; // kolomnya, kalo > 1 pisahkan pakai koma
        $val = '?,?'; // ini sesuai jumlah kolomnya, pakai koma
        $array = array( $selected, $hasil ); // sesuai jumlah kolom juga
 
        $sth = $dbh->prepare( "INSERT INTO $table ($field) VALUES ($val)" );
        $input = $sth->execute( $array );
}
}
               $rand_text = rand(99999,239028302);
               if (is_uploaded_file($_FILES ['upload1'] ['tmp_name'])) {
               $nama_gambar = $_FILES['upload1']['name'];
		$tmp_gambar = $_FILES['upload1']['tmp_name'];
                   $rand_gambar= $rand_text.$nama_gambar;
                   $new_location1 = "img_bukti/".$rand_gambar;
               }
               if (is_uploaded_file($_FILES ['upload2'] ['tmp_name'])) {
        $nama_gambar2 = $_FILES['upload2']['name'];
		$tmp_gambar2 = $_FILES['upload2']['tmp_name'];
                   $rand_gambar2= $rand_text.$nama_gambar2;
                   $new_location2 = "img_bukti/".$rand_gambar2;
               }
               if (is_uploaded_file($_FILES ['upload3'] ['tmp_name'])) {
        $nama_gambar3 = $_FILES['upload3']['name'];
		$tmp_gambar3 = $_FILES['upload3']['tmp_name'];
                   $rand_gambar3= $rand_text.$nama_gambar3;
                   $new_location3 = "img_bukti/".$rand_gambar3;
               }
               
		
               
               $imageFileType = pathinfo($new_location1,PATHINFO_EXTENSION);
		$check = getimagesize($tmp_gambar);
	    if($check !== false) {
	        $uploadOk = 1;
	    } else {
	        $uploadOk = 0;
	    }
	    if (($_FILES['upload1']['size'] > 15000000000000)&&($_FILES['upload2']['size'] > 15000000000000)&&($_FILES['upload3']['size'] > 15000000000000)) {
            echo "<script type='text/javascript'>alert('Sorry, your file is too large. size upload must less than 100 KB');document.location='form_pengajuan.php'</script>";
		   // echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
             $cek_judul= "SELECT * FROM `t_spot_pinjam` WHERE m_judul_spnjam = '$m_judul_spnjam'";
               $result_cek_judul = $dbh->query($cek_judul)->fetch();
               if($result_cek_judul==true){
                   echo "<script type='text/javascript'>alert('Judul Tidak Boleh sama');document.location='form_pengajuan.php '</script>";
               } else {
               
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "PNG" && $imageFileType != "JPG" && $imageFileType != "JPEG"
		 ) {
            echo "<script type='text/javascript'>alert('Sorry, only JPG, JPEG, & PNG files are allowed.');document.location='form_pengajuan.php '</script>";
		   // echo "Sorry, only JPG, JPEG, & PNG files are allowed.";
		    $uploadOk = 0;
		}
		if ($uploadOk == 1){
            if (move_uploaded_file($tmp_gambar, $new_location1)){
               $m_unit_spnjam         = $_POST['p_unit'];
               $m_pasang_spnjam     = $_POST['p_m_pasang'];
               
               
              // echo $p_barang;
            //   echo $p_m_pinjam;
               $m_copot_spnjam    = $_POST['p_m_copot'];
           //    echo $p_m_kembali;
//               $m_lokasi_spnjam       = $_POST['p_lokasi'];
               $m_cp_spnjam       = $_POST['p_cp'];
    $post_status = "draft";
    $post_type="draft";
$date2 = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
$p_timest= $date2->format('Y-m-d H:i:s');
//echo $p_timest;
    //$r_author_data = $result['m_name'];           
           
$table = 't_spot_pinjam'; // ubah ke nama tabel
        $field = '`m_unit_spnjam`,`m_pasang_spnjam`,`m_copot_spnjam`,`m_judul_spnjam`,`m_cp_spnjam`, `m_tmstamp`, `p_tmp_pict_1`'; // kolomnya, kalo > 1 pisahkan pakai koma
        $val = '?,?,?,?,?,?,?'; // ini sesuai jumlah kolomnya, pakai koma
        $array = array( $m_unit_spnjam, $m_pasang_spnjam, $m_copot_spnjam, $m_judul_spnjam, $m_cp_spnjam, $p_timest, $new_location1  ); // sesuai jumlah kolom juga
 
        $sth = $dbh->prepare( "INSERT INTO $table ($field) VALUES ($val)" );
        $input = $sth->execute( $array );
if (is_uploaded_file($_FILES ['upload2'] ['tmp_name'])) 
{
     $ax="select m_id_spjam from t_spot_pinjam order by m_id_spjam desc limit 1";
     $result_ambil = $dbh->query($ax)->fetch();
     $id_gambar_ambil = $result_ambil['m_id_spjam'];
   // echo 'sukses';
    move_uploaded_file($tmp_gambar2, $new_location2);
    $query1 = "UPDATE t_spot_pinjam SET p_tmp_pict_2 = '$new_location2' WHERE m_id_spjam = '$id_gambar_ambil'";
        
if($dbh->exec($query1))  
       
{
    echo "<script type='text/javascript'>alert('Anda berhasil memasukkan data.');document.location='form_pengajuan.php'</script>";
}
      else
{
    echo "<script type='text/javascript'>alert('upload failed, please check your internet connection or image files ');document.location='form_pengajuan.php'</script>";
       }
 }
   if (is_uploaded_file($_FILES ['upload3'] ['tmp_name'])) 
{
   // echo 'sukses';
   $ax="select m_id_spjam from t_spot_pinjam order by m_id_spjam desc limit 1";
     $result_ambil = $dbh->query($ax)->fetch();
     $id_gambar_ambil = $result_ambil['m_id_spjam'];
   // echo 'sukses';
    move_uploaded_file($tmp_gambar3, $new_location3);
    $query2 = "UPDATE t_spot_pinjam SET p_tmp_pict_3 = '$new_location3' WHERE m_id_spjam = '$id_gambar_ambil'";
        
if($dbh->exec($query2))  
       
{
    echo "<script type='text/javascript'>alert('Anda berhasil memasukkan data .');document.location='form_pengajuan.php'</script>";
}
      else
{
    echo "<script type='text/javascript'>alert('upload failed, please check your internet connection or image files ');document.location='form_pengajuan.php'</script>";
       }
 }
                echo "<script type='text/javascript'>alert('Anda berhasil memasukkan data.');document.location='form_pengajuan.php'</script>";
    } else {
		// upload gagal
                echo "<script type='text/javascript'>alert('upload failed, please check your internet connection or image files');document.location='form_pengajuan.php'</script>";
				//echo 'upload failed, please check your internet connection or image files';
			}
            echo "<script type='text/javascript'>alert('Anda berhasil memasukkan data.');document.location='form_pengajuan.php'</script>";
    }else{
            echo "<script type='text/javascript'>alert('Format foto yang di upload tidak sesuai!');document.location='form_pengajuan.php'</script>";
			//echo "Format foto yang di upload tidak sesuai!";
		}
               }
           }

?>