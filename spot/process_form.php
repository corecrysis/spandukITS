<?php
include('../koneksi.php');
$p_m_from         = $_POST['p_m_from'];
$_SESSION['p_m_from'] = $p_m_from;
$p_m_to         = $_POST['p_m_to'];
$_SESSION['p_m_to'] = $p_m_to;
$query1 = "SELECT * FROM t_spot_temp  p join t_spot m on p.m_id_spot = m.m_id_spot join t_spot_pinjam t on p.m_id_spjam = t.m_id_spjam where (t.m_pasang_spnjam BETWEEN '" . $p_m_from . "' AND  '" . $p_m_to . "') and t.m_stat_spnjam !='0'  ORDER by p.a_id_spot ASC";
        $result1 = $dbh->query($query1)->fetchAll();
//    $query2 = "select m.m_nama_spot from t_spot_temp  p  join t_spot m on p.m_id_spot = m.m_id_spot join t_spot_pinjam t on p.m_id_spjam = t.m_id_spjam ";
//$result2 = $dbh->query($query2)->fetch();


echo'<script>
    function printDiv() {
     var printContents = document.getElementById("printableArea").innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<div id="printableArea"><table id="example1" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
<img src="img/kop_laporan_spanduk.png" width="100%">
    <thead>
        <tr>
            <th>No.</th>
            <th>Waktu Peminjaman</th>
            <th>Waktu Pengembalian</th>
            <th>Nama Spot</th>
            <th>Unit Peminjam</th>
            <th>Judul Spanduk</th>
            <th>Contact Person</th>
            <th>Status</th>
            <th>Alasan</th>
        </tr>
    </thead>
    <tbody>
        <tr>';
            foreach ( $result1 as $r1 ) 
            {
                
                
       echo '         <tr>
                    <td> ';
                                $originalaDate = $r1['m_pasang_spnjam'];
                                $oriaDate = $r1['m_copot_spnjam'];
                                $newaDate = date("d-m-Y H:i:s", strtotime($originalaDate));
                                $lastaDate = date("d-m-Y H:i:s", strtotime($oriaDate));
                        echo $r1['a_id_spot'];
//                echo $newaDate;
                  echo '  </td>
                    <td> ';
                       echo $newaDate;
                    echo '  </td>
                    <td> ';
                       echo $lastaDate;
                    echo '  </td>
                    <td> ';
                        echo $r1['m_nama_spot'];
                    echo '  </td>
                    <td> ';
                         echo $r1['m_unit_spnjam'];
                    echo '  </td>
                    <td> ';
                       echo $r1['m_judul_spnjam'];
                   echo ' </td>
                   <td> ';
                       echo $r1['m_cp_spnjam'];
                   echo ' </td>
                   <td> ';
                       if($r1['m_stat_spnjam']=='1'){
                $aku = 'ON';
                    echo $aku;
                } else if($r1['m_stat_spnjam']=='2')
                {
                    $aku = 'BATAL';
                    echo $aku;
                } else if($r1['m_stat_spnjam']=='3')
                {
                    $aku = 'SEGERA LEPAS';
                    echo $aku;
                } else if($r1['m_stat_spnjam']=='4')
                {
                    $aku = 'SUDAH LEPAS';
                    echo $aku;
                }
                   echo ' </td>
                       <td> ';
                        echo $r1['m_alasan'];
                   echo ' </td>';
                    } 
               echo ' </tr>
    </tbody>
</table>
<div class="col-md-10">
<img src="img/mengetahui.png" class="pull-right img-responsive" width="30%">
</div>
</div>
<input type="button"  class="btn btn-primary" onclick="printDiv()" value="Print" style="float:right;" />';
?>