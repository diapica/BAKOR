<?php 
    session_start();
    error_reporting(0);
    $username = $_SESSION['username'];
    $updateData = FALSE;

    include "../connection.php";
    
    $sql = "SELECT * FROM tbregistrasi WHERE username='$username' ORDER BY idregistrasi DESC LIMIT 1";
    $query = mysqli_query($conn, $sql);
    $re = mysqli_fetch_array($query);

    if(count($re) > 0) {
        $updateData = TRUE;
    }

    $idRegistrasi = $re['idregistrasi'];
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAKORPEND Pontianak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/pendaftaran.css">
</head>
<body <?php if($updateData){ ?> onload="getChecked(<?php echo "'$jenisKelamin','$pendidikanTerakhir','$tingkatan','$waktuBelajar','$alamat','$statusKelas'" ?>)" <?php } ?>>
    <?php include "header.php" ?>
      <div class="content-1">
        <?php include "sidebar.php" ?>
        <div class="content">
            <h3>Form Pendaftaran Online</h3>
            <div class="form">
             <form action=<?php if(!$updateData) { echo "pendaftaran_save.php"; } else { echo "../Admin/pendaftaran_edit.php"; } ?> method="POST" enctype="multipart/form-data">
                <div style="width:100%;display:flex;">
                    <div class="form-2">
                        <div class="group-form">
                            <label>Nama Mandarin</label>
                            <div class="box"></div>
                            <input type="text" name="mandarin" id="mandarin" value="<?php if($updateData) { echo $mandarin; }?>">
                        </div>
                        <div class="group-form a">
                            <label>Nama Indonesia</label>
                            <div class="box"></div>
                            <input required type="text" name="indonesia" id="indonesia" value="<?php if($updateData) { echo $indonesia; }?>">
                        </div>
                        <div class="group-form a">
                            <label>Jenis Kelamin</label>
                            <select required class="select" name="jenisKelamin" id="jenisKelamin">
                                <option value="" disabled selected>-- Jenis Kelamin --</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="group-form a">
                            <label>Tempat Lahir</label>
                            <div class="box"></div>
                            <input required type="text" name="tempatLahir" id="tempatLahir" value="<?php if($updateData) { echo $tempatLahir; }?>">
                        </div>
                        <div class="group-form a">
                            <label>Tanggal Lahir</label>
                            <div class="box"></div>
                            <input required type="date" name="tanggalLahir" id="tanggalLahir" value="<?php if($updateData) { echo $tanggalLahir; }?>">
                        </div>
                        <div class="group-form a">
                            <label>Pendidikan Terakhir</label>
                            <select required class="select" name="pendidikanTerakhir" id="pendidikanTerakhir">
                                <option value="" disabled selected>-- Pendidikan Terakhir --</option>
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
                            <textarea required name="alamat" id="alamat" style="margin-top: 0px; margin-bottom: 0px; height: 90px; width: 200px;"><?php if($updateData) { echo $alamat; }?></textarea>
                        </div>
                        <div class="group-form a">
                            <label>Alamat Email</label>
                            <div class="box"></div>
                            <input required type="email" name="email" id="email" value="<?php if($updateData) { echo $email; }?>">
                        </div>
                        <div class="group-form a">
                            <label>No WA</label>
                            <div class="box"></div>
                            <input required type="number" name="no" id="no" value="<?php if($updateData) { echo $no; }?>">
                        </div>
                        <div class="group-form a">
                            <label>Pekerjaan</label>
                            <div class="box"></div>
                            <input required type="text" name="pekerjaan" id="pekerjaan" value="<?php if($updateData) { echo $pekerjaan; }?>">
                        </div>
                    </div>
                    <div class="form-3" >
                        <div class="group-form-1 a">
                            <label>Tingkatan</label>
                            <select required class="select" name="tingkatan" id="tingkatan">
                                <option value="" disabled selected>-- Tingkatan --</option>
                                <option value="dasar">Dasar</option>
                                <option value="menengah">Menengah</option>
                                <option value="tingkat lanjut">Tingkat Lanjut</option>
                            </select>
                        </div>
                        <div class="group-form-1 a">
                            <label>Waktu Belajar</label>
                            <select required class="select" name="waktuBelajar" id="waktuBelajar">
                                <option value="" disabled selected>-- Waktu Belajar --</option>
                                <option value="pagi">Pagi</option>
                                <option value="sore">Sore</option>
                            </select>
                        </div>
                        <div class="group-form-1 a">
                            <label>Pas Foto 3 x 4 <br>(Harus pakai softfile asli)</label>
                            <input class="input form-control"type="file" name="foto" id="foto" value="<?php if(!$updateData) { echo 'required'; }?>">
                        </div>
                        <div class="group-form-1 a">
                            <label>KTP / Kartu Pelajar</label>
                            <input class="input form-control" type="file" name="ktp" id="ktp" value="<?php if(!$updateData) { echo 'required'; }?>">
                        </div>
                        <div class="group-form-1 a">
                            <label>Ijazah Terakhir <br>(Lampirkan bagian nilainya)</label>
                            <input class="input form-control" type="file" name="ijazah" id="ijazah" value="<?php if(!$updateData) { echo 'required'; }?>">
                        </div>
                        <div class="group-form-1 a">
                            <label>IjHSK Terakhir (jika ada) <br>(Lampirkan bagian nilainya)</label>
                            <input class="input form-control" type="file" name="hsk" id="hsk" value="<?php if($updateData) { echo $hsk; }?>">
                        </div>
                        <div class="ketentuan">
                            <p>
                            Dengan ini saya menyetujui bahwa:<br>
                            1. Telah memahami syarat dan ketentuan pendaftaran;<br>
                            2. Akan menaati tata tertib Diklat Bakorpend;<br>
                            3. Memahami bahwa dana partisipasi Diklat tidak dapat dikembalikan apabila mengundurkan diri.</p>
                            <br>
                            Biaya Pendaftaran dapat dilihat <a target="_blank" href="../Home/home.php#Pendaftaran">di sini</a>
                        </div>
                    </div>
                </div>
                <div style="margin-top: 20px;width: 250px;display: flex;justify-content: flex-end;">
                    <input type="hidden" id="username" name="username" value="<?php echo $username ?>">
                    <input type="hidden" id="page" name="page" value="pendaftaranSiswa">
                    <?php if($updateData) { ?> 
                        <input type="hidden" id="id" name="id" value="<?php echo $idRegistrasi; ?>"> 
                    <?php } ?>
                    <input type="submit" value="<?php if($updateData) { echo 'Update'; } else { echo 'Submit';} ?>" id="submit" name="submit" class="btn btn-info" style="color:white;">
                </div>
             </form>
            </div>
            
        </div>
      </div>
      <div class="footer fixed-bottom">
          <p>&#169;2021 Copyright: <u>BAKORPEND_Pontianak.com</u></p>
      </div>
</body>
</html>

<script>
    function getChecked(jenisKelamin,pendidikanTerakhir,tingkatan,waktuBelajar,alamat,statusKelas){
        document.getElementById("jenisKelamin").value = jenisKelamin;
        document.getElementById("pendidikanTerakhir").value = pendidikanTerakhir;
        document.getElementById("tingkatan").value = tingkatan;
        document.getElementById("waktuBelajar").value = waktuBelajar;
        document.getElementById("alamat").value = alamat;
        document.getElementById("statusKelas").value = statusKelas;
    }
</script>