<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAKORPEND Pontianak</title></title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/laporan_siswa.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
</head>
<style>
    #hari{
        display:none;
    }
    #bulan{
        display:none;
    }
    #tahun{
        display:none;
    }
</style>
<body>
    <?php 
    include "header.php";
    include "../connection.php";
    $sql = "select tbregistrasi.*,tbuser.status_register from tbuser inner join tbregistrasi on tbuser.username = tbregistrasi.username where tbuser.status_register='f'";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_num_rows($query);
    ?>
      <div class="content-1">
          <?php include "sidebar.php" ?>
          <div class="content" style="height:755px;overflow-y:scroll;padding-bottom:40px;">

              <div class="top" style="display:flex;justify-content:space-between;width:100%;">
                <h1>Cetak Laporan</h1>
                <div id="hari">
                    <div style="display:flex;">
                        <input type="date" id="hari1" name="hari" class="form-control" style="width:200px;">
                        <button class="btn btn-info" style="color:white" onclick="filter()">Filter</button>
                    </div>
                </div>
                <select name="bulan" id="bulan" style="width:150px" onchange="filter()">
                    <option value="99">Semua Bulan</option>
                    <option value="01">Januari</option>
                    <option value="02">Febuari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
                <select name="tahun" id="tahun" style="width:150px" onchange="filter()">
                    <option value="99">Semua Tahun</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                </select>
                <select id="gelombang" style="width:150px;" onchange="filter()">
                    <option value="">Gelombang</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                <select id="kelas" style="width:150px;" onchange="filter()">
                    <option value="">Waktu Belajar</option>
                    <option value="pagi">Pagi</option>
                    <option value="sore">Sore</option>
                </select>
                <select id="statusKelas" style="width:150px;" onchange="filter()">
                    <option value="">Status Kelas</option>
                    <option value="online">Online</option>
                    <option value="tatap_muka">Tatap Muka</option>
                </select>
                <select name="target" id="target" style="width:150px" onchange="test()">
                    <option>Pilih</option>
                    <option value="hari">Hari</option>
                    <option value="bulan">Bulan</option>
                    <option value="tahun">Tahun</option>
                </select>
               </div>
            <div class="table" id="data">
            <form action="../print.php" method="GET">
                <input type="hidden" name="submit" id="submit_print" value="">
                <input type="hidden" name="value" id="submit_value" value="">
                <input type="hidden" name="jenis" value="siswa">
                <input type="hidden" name="gelombang" value="">
                <input type="hidden" name="kelas" value="">
                <input type="hidden" name="statusKelas" value="">
                <button type="submit" class="btn btn-danger">PRINT PDF</button>
            </form>
                <p class="text-center">Laporan Daftar Siswa BAKORPEND PONTIANAK</p>
                <table border=1px class="table table-striped text-center" id="tableData">
                    <thead class="thead">
                        <tr class="align-middle">
                            <th rowspan="2">No</th>
                            <th colspan="2">Nama</th>
                            <th rowspan="2">Jenis Kelamin</th>
                            <th rowspan="2">Tempat</th>
                            <th rowspan="2">Tanggal lahir</th>
                            <th rowspan="2">Alamat</th>
                            <th rowspan="2">No HP</th>
                            <th rowspan="2">Pendidikan Terakhir</th>
                        </tr>
                        <tr>
                            <th>Mandarin</th>
                            <th>Indonesia</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        for($x = 1 ; $x <= $row; $x++){ 
                            $re = mysqli_fetch_array($query);
                            $namaMandarin = ucwords(strtolower($re['namaMandarin']));
                            $namaIndonesia = ucwords(strtolower($re['namaIndonesia']));
                            $jenisKelamin = $re['jenisKelamin'];
                            $tempatLahir = ucwords(strtolower($re['tempatLahir']));
                            $tanggalLahir = $re['tanggalLahir'];
                            $alamat = $re['alamat'];
                            $noWA = $re['noWA'];
                            $pendidikanTerakhir = strtoupper($re['pendidikanTerakhir']);
                        ?>
                        <tr class="align-middle">
                            <td><?php echo $x ?></td>
                            <td><?php echo $namaMandarin ?></td>
                            <td><?php echo $namaIndonesia ?></td>
                            <td><?php echo $jenisKelamin ?></td>
                            <td><?php echo $tempatLahir ?></td>
                            <td><?php echo date('d-m-Y',strtotime($tanggalLahir)) ?></td>
                            <td><?php echo $alamat ?></td>
                            <td><?php echo $noWA ?></td>
                            <td><?php echo $pendidikanTerakhir ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
          </div>
      </div>
      <div class="footer fixed-bottom">
          <p>&#169;2021 Copyright: <u>BAKORPEND_Pontianak.com</u></p>
      </div>
</body>
</html>

<script>   
    $(document).ready(function () {
        $('#tableData').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });

    function goImage(bukti){
        window.open('../Siswa/'+bukti,'_blank');
    }
    function test(){
        var target = document.getElementById("target").value;
        document.getElementById("hari1").value = "";
        document.getElementById("bulan").value = "99";
        document.getElementById("tahun").value = "99";
        var hari = document.getElementById("hari");
        var bulan = document.getElementById("bulan");
        var tahun = document.getElementById("tahun");
        if(target == 'hari'){
            hari.style.display = "block";
            bulan.style.display = "none";
            tahun.style.display = "none";
        }else if(target == 'bulan'){
            hari.style.display = "none";
            bulan.style.display = " block";
            tahun.style.display = "none";
        }else if(target == 'tahun'){
            hari.style.display = "none";
            bulan.style.display = "none";
            tahun.style.display = "block";
        }else{
            hari.style.display = "none";
            bulan.style.display = "none";
            tahun.style.display = "none"; 
        }
    }

	function buatajax(){
		if(window.XMLHttpRequest){
			return new XMLHttpRequest();
		}
		if(window.ActiveXObject){
			return new ActiveXObject('Microsoft.XMLHttp');
		}
		return null;
	}
	function tampil(){
		if(ajaxku.readyState == 4){
			data = ajaxku.responseText;	
			document.getElementById("data").innerHTML = data;
            $('#tableData').DataTable();
            $('.dataTables_length').addClass('bs-select');
		}	
	}
    function filter(){
        var hari = document.getElementById("hari1").value;
        var bulan = document.getElementById("bulan").value;
        var tahun = document.getElementById("tahun").value;
        var gelombang = document.getElementById("gelombang").value;
        var kelas = document.getElementById("kelas").value;
        var statusKelas = document.getElementById("statusKelas").value;
        if(hari != ""){
            var url = "filter.php?hari="+hari+"&submit=hari&gelombang="+gelombang+"&kelas="+kelas+"&statusKelas="+statusKelas;
        }else if(bulan != "99"){
            var url = "filter.php?bulan="+bulan+"&submit=bulan&gelombang="+gelombang+"&kelas="+kelas+"&statusKelas="+statusKelas;
        }else if(tahun != "99"){
            var url = "filter.php?tahun="+tahun+"&submit=tahun&gelombang="+gelombang+"&kelas="+kelas+"&statusKelas="+statusKelas;
        }else{
            var url = "filter.php?gelombang="+gelombang+"&kelas="+kelas+"&statusKelas="+statusKelas;
        }
        url = url + "&sid=" + Math.random();
        ajaxku = buatajax();
        ajaxku.onreadystatechange = tampil;
        ajaxku.open("GET",url,true);
        ajaxku.send(null);
    }
</script>
