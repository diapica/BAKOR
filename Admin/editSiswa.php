<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siswa Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/editSiswa1.css">
</head>
<?php
    include "../connection.php";
    $id = $_GET['id']; 
    $username = $_GET['username']; 
    include "header.php";
    $sql = "select * from tbregistrasi where idregistrasi='$id'";
    $query = mysqli_query($conn,$sql);
    $re = mysqli_fetch_array($query);
    $indonesia = $re['namaIndonesia'];
    $mandarin = $re['namaMandarin'];
    $jenisKelamin = $re['jenisKelamin'];
    $tempatLahir = $re['tempatLahir'];
    $tanggalLahir = $re['tanggalLahir'];
    $pendidikanTerakhir = $re['pendidikanTerakhir'];
    $alamat = $re['alamat'];
    $email = $re['email'];
    $no = $re['noWA'];
    $pekerjaan = $re['pekerjaan'];
    $tingkatan = $re['tingkatan'];
    $waktuBelajar = $re['waktuBelajar'];
    $pasFoto = $re['pasFoto'];
    $identitasDiri = $re['identitasDiri'];
    $ijazah = $re['ijazah'];
    $hsk = $re['hsk'];
    $tahunMasuk = $re['tahunMasuk'];
    $gelombang = $re['gelombang'];
    $statusKelas = $re['statusKelas'];
    ?>
<body onload="getChecked(<?php echo "'$jenisKelamin','$pendidikanTerakhir','$tingkatan','$waktuBelajar','$alamat','$statusKelas'" ?>)">
    
      <div class="content-1">
        <?php include "sidebar.php" ?>
        <div class="content">
            <h3>Form Pendaftaran Online</h3>
            <div class="form">
            <form action="pendaftaran_edit.php" method="GET">
                <div style="width:100%;display:flex;">
                    <div class="form-2">
                        <div class="group-form">
                            <label>Nama Mandarin</label>
                            <div class="box"></div>
                            <input type="text" name="mandarin" id="mandarin" value="<?php echo $mandarin ?>">
                        </div>
                        <div class="group-form a">
                            <label>Nama Indonesia</label>
                            <div class="box"></div>
                            <input type="text" name="indonesia" id="indonesia" value="<?php echo $indonesia ?>">
                        </div>
                        <div class="group-form a">
                            <label>Jenis Kelamin</label>
                            <div class="radio">
                                <input type="radio" id="laki" name="jenisKelamin" value="L">Laki-laki
                                <input type="radio" id="perempuan" name="jenisKelamin" value="P">Perempuan
                            </div>
                        </div>
                        <div class="group-form a">
                            <label>Tempat Lahir</label>
                            <div class="box"></div>
                            <input type="text" name="tempatLahir" id="tempatLahir" value="<?php echo $tempatLahir ?>">
                        </div>
                        <div class="group-form a">
                            <label>Tanggal Lahir</label>
                            <div class="box"></div>
                            <input type="date" name="tanggalLahir" id="tanggalLahir" value="<?php echo $tanggalLahir ?>">
                        </div>
                        <div class="group-form a">
                            <label>Pendidikan Terakhir</label>
                            <select class="select" name="pendidikanTerakhir" id="pendidikanTerakhir">
                                <option value="smp">SMP</option>
                                <option value="sma">SMA</option>
                                <option value="d3">D3</option>
                                <option value="s1">S1</option>
                                <option value="s2">S2</option>
                                <option value="s3">S3</option>
                            </select>
                        </div>
                        <div class="group-form a">
                            <label>Alamat Lengkap</label>
                            <div class="box"></div>
                            <textarea name="alamat" id="alamat" cols="18" rows="2"></textarea>
                        </div>
                        <div class="group-form a">
                            <label>Alamat Email</label>
                            <div class="box"></div>
                            <input type="text" name="email" id="email" value="<?php echo $email ?>">
                        </div>
                        <div class="group-form a">
                            <label>No WA</label>
                            <div class="box"></div>
                            <input type="text" name="no" id="no" value="<?php echo $no ?>">
                        </div>
                        <div class="group-form a">
                            <label>Pekerjaan</label>
                            <div class="box"></div>
                            <input type="text" name="pekerjaan" id="pekerjaan" value="<?php echo $pekerjaan ?>">
                        </div>
                    </div>
                    <div class="form-3" >
                        <div class="group-form-1 a">
                            <label>Tingkatan</label>
                            <select class="select" name="tingkatan" id="tingkatan">
                                <option value="dasar">Dasar</option>
                                <option value="menengah">Menengah</option>
                                <option value="tingkat lanjut">Tingkat Lanjut</option>
                            </select>
                        </div>
                        <div class="group-form-1 a">
                            <label>Waktu Belajar</label>
                            <select class="select" name="waktuBelajar" id="waktuBelajar">
                                <option value="pagi">Pagi</option>
                                <option value="sore">Sore</option>
                            </select>
                        </div>
                        <div class="group-form-1 a">
                            <label>Pas Foto 3 x 4 <br>(Harus pakai softfile asli)</label>
                            <input class="input form-control"type="file" name="foto" id="foto" >
                        </div>
                        <div class="group-form-1 a">
                            <label>KTP / Kartu Pelajar</label>
                            <input class="input form-control" type="file" name="ktp" id="ktp">
                        </div>
                        <div class="group-form-1 a">
                            <label>Ijazah Terakhir <br>(Lampirkan bagian nilainya)</label>
                            <input class="input form-control" type="file" name="ijazah" id="ijazah">
                        </div>
                        <div class="group-form-1 a">
                            <label>IjHSK Terakhir (jika ada) <br>(Lampirkan bagian nilainya)</label>
                            <input class="input form-control" type="file" name="hsk" id="hsk">
                        </div>
                        <div class="ketentuan">
                            <p>Dengan ini saya menyetujui bahwa:<br>1. Telah memahami syarat dan ketentuan pendaftaran;<br>2. Akan menaati tata tertib Diklat Bakorpend;<br>3. Memahami bahwa dana partisipasi Diklat tidak dapat dikembalikan apabila mengundurkan diri.</p>
                        </div>
                        <div class="group-form-2 a">
                            <label>Tahun Masuk</label>
                            <input type="text" name="tahunMasuk" value="<?php echo $tahunMasuk ?>">
                            <label style="margin-left:20px;">Online / Tatap Muka</label>
                            <select name="statusKelas" id="statusKelas">
                                <option value="tatap_muka">Tatap Muka</option>
                                <option value="online">Online</option>
                            </select>
                        </div>
                        <div class="group-form a">
                            <label style="width:160px;">Gelombang</label>
                            <input type="text" style="width:20%" name="gelombang" value="<?php echo $gelombang ?>">
                        </div>
                    </div>
                </div>
                <div class="bt" style="margin-top: 20px;width: 500px;display: flex;justify-content: flex-end;">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="hidden" name="username" value="<?php echo $username ?>">
                    <input type="submit" name="submit" value="Approved" class="btn btn-info" style="color:white;">
                    <input type="submit" name="submit" value="Update" class="btn btn-info" style="color:white;">
                    <input type="submit" name="submit" value="Reject" class="btn btn-info" style="color:white;">
                </div>
             </form>
        </div>
      </div>
      <div class="footer fixed-bottom">
          <p>&#169;2021 Copyright: <u>BAKORPEND_Pontianak.com</u></p>
      </div>
</body>
</html>

<script>
    function getChecked(jenisKelamin,pendidikanTerakhir,tingkatan,waktuBelajar,alamat,statusKelas){
        if(jenisKelamin == 'L'){
            document.getElementById('laki').checked = true;
        }else if(jenisKelamin == 'P'){
            document.getElementById('perempuan').checked = true;
        }
        document.getElementById("pendidikanTerakhir").value = pendidikanTerakhir;
        document.getElementById("tingkatan").value = tingkatan;
        document.getElementById("waktuBelajar").value = waktuBelajar;
        document.getElementById("alamat").value = alamat;
        document.getElementById("statusKelas").value = statusKelas;
    }
</script>