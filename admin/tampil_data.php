<?php 
include 'konfig.php';


$query = "SELECT max(no_transaksi) as maxKode FROM head_transaksi";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($hasil);
$notrans = $data['maxKode'];
$noUrut = (int) substr($notrans, 3, 3);
$noUrut++;
$char = "TRS";
$noTransaksi = $char . sprintf("%03s", $noUrut);

$queryData = "SELECT buku.judul as dataBuku, detail_transaksi.jumlah_beli as dataQty, detail_transaksi.subtotal as dataSubtotal from detail_transaksi INNER JOIN buku";
$queryData.= "on detail_transaksi.ID_buku = buku.ID WHERE no_transaksi='$noTransaksi'";
$result = mysqli_query($koneksi, $queryData);
while($row=mysqli_fetch_array($queryData)){
?>
<tbody>
    <tr>
        <td><?php echo $row['dataBuku']; ?></td>
        <td><?php echo $row['dataQty']; ?></td>
        <td><?php echo $row['dataSubtotal']; ?></td>
    </tr>
</tbody>
<?php } ?>