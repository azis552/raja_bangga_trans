<!DOCTYPE html>
<html>
<head>
<title>Download Resi</title>
<style>
    #tabel {
        font-size: 15px;
        border-collapse: collapse;
    }
    #tabel td {
        padding-left: 5px;
        border: 1px solid black;
    }
</style>
<script>
    window.onload = function() {
        window.print();
    }
</script>
</head>
<body style='font-family:tahoma; font-size:8pt;'>
<center>
<table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border = '0'>
<td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
<span style='font-size:12pt'><b>Raja Bangga Trans</b></span></br>
Alamat Toko Alamat Toko Alamat Toko Alamat Toko Alamat Toko Alamat Toko Alamat Toko Alamat Toko Alamat Toko Alamat Toko </br>
Telp : 0594094545 <br>
No Resi : {{ $pengiriman_detail->resi }}
</td>
<td style='vertical-align:top' width='30%' align='left'>
<b><span style='font-size:12pt'>Bukti Penerimaan Barang</span></b></br>
No Trans. : {{ $pengiriman_detail->id }} </br>
Tanggal : {{ $pengiriman_detail->updated_at }}</br>
</td>
</table>
<table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border = '0'>
<td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
Id Admin : {{ $pengiriman_detail->id_admin }}</br>
Id Kurir : {{ $pengiriman_detail->id_kurir }}
</td>
<td style='vertical-align:top' width='30%' align='left'>
Nama Pengirim : {{ $pengiriman_detail->nama_pengirim }}<br>
Nama Penerima : {{ $pengiriman_detail->nama_penerima }}
</td>
</table>

<br>
<table cellspacing='0' style='width:550px; font-size:8pt; font-family:calibri;  border-collapse: collapse;' border='1'>
 
<tr align='center'>
<td width='30%'>Nama Barang</td>
<td width='10%'>Berat barang</td>
<td width='30%'>Harga</td>
<td width='30%'>Estimasi</td>
<tr align='center'><td>{{ $barang->nama_barang }}</td>
<td>{{ $barang->berat_barang }} Kg</td>
<td>Rp  {{ $pengiriman_detail->total_bayar }}</td>
<td>{{ $estimasi }} Hari</td>
<tr>
<td colspan = '5'><div >
    Nama Pengirim : {{ $pengiriman_detail->nama_pengirim }} <br>
    Alamat Pengirim : {{ $pengiriman_detail->alamat_pengirim }} <br>
    Telepon Pengirim : {{ $pengiriman_detail->tlpn_pengirim }}
</div></td></tr>
<tr>
<td colspan = '5'><div >
    Nama Penerima : {{ $pengiriman_detail->nama_penerima }} <br>
    Alamat Penerima : {{ $pengiriman_detail->alamat_penerima }} <br>
    Telepon Penerima : {{ $pengiriman_detail->tlpn_penerima }}
</div></td>
</tr>
<tr>
</table>
 
<table style='width:650; font-size:7pt;' cellspacing='2'>
    <tr>
    <td align='center'>Diterima Oleh,</br></br><u>(............)</u></td>
    <td style='border:1px solid rgb(255, 255, 255); padding:5px; text-align:left; width:70%'></td>
    <td align='center'>TTD,</br></br><u>(...........)</u></td>
    </tr>
    </table>
</center>
</body>
</html>
