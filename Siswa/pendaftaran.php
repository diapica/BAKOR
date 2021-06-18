<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siswa Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/pendaftaran.css">
</head>
<body>
    <?php include "header.php" ?>
      <div class="content-1">
        <?php include "sidebar.php" ?>
        <div class="content">
            <h3>Form Pendaftaran Online</h3>
            <div class="form">
                <form>
                    <div class="group-form">
                        <label>Nama Mandarin</label>
                        <div class="box"></div>
                        <input type="text">
                    </div>
                    <div class="group-form a">
                        <label>Nama Indonesia</label>
                        <div class="box"></div>
                        <input type="text">
                    </div>
                    <div class="group-form a">
                        <label>Jenis Kelamin</label>
                        <div class="radio">
                            <input type="radio">Laki-laki
                            <input type="radio">Perempuan
                        </div>
                    </div>
                    <div class="group-form a">
                        <label>Tempat Lahir</label>
                        <div class="box"></div>
                        <input type="text">
                    </div>
                    <div class="group-form a">
                        <label>Tanggal Lahir</label>
                        <div class="box"></div>
                        <input type="date">
                    </div>
                    <div class="group-form a">
                        <label>Pendidikan Terakhir</label>
                        <select class="select" name="" id="">
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
                        <textarea name="" id="" cols="18" rows="2"></textarea>
                    </div>
                    <div class="group-form a">
                        <label>Alamat Email</label>
                        <div class="box"></div>
                        <input type="text">
                    </div>
                    <div class="group-form a">
                        <label>No WA</label>
                        <div class="box"></div>
                        <input type="text">
                    </div>
                    <div class="group-form a">
                        <label>Pekerjaan</label>
                        <div class="box"></div>
                        <input type="text">
                    </div>
                </form>
                <form class="form-2">
                    <div class="group-form-1 a">
                        <label>Tingkatan</label>
                        <select class="select" name="" id="">
                            <option value="dasar">Dasar</option>
                            <option value="menengah">Menengah</option>
                            <option value="tingkatlanjut">Tingkat Lanjut</option>
                        </select>
                    </div>
                    <div class="group-form-1 a">
                        <label>Waktu Belajar</label>
                        <select class="select" name="" id="">
                            <option value="pagi">Pagi</option>
                            <option value="sore">Sore</option>
                        </select>
                    </div>
                    <div class="group-form-1 a">
                        <label>Pas Foto 3 x 4 <br>(Harus pakai softfile asli)</label>
                        <input class="input" type="file" value="Browse.">
                    </div>
                    <div class="group-form-1 a">
                        <label>KTP / Kartu Pelajar</label>
                        <input class="input" type="file" value="Browse.">
                    </div>
                    <div class="group-form-1 a">
                        <label>Ijazah Terakhir <br>(Lampirkan bagian nilainya)</label>
                        <input class="input" type="file" value="Browse.">
                    </div>
                    <div class="group-form-1 a">
                        <label>IjHSK Terakhir (jika ada) <br>(Lampirkan bagian nilainya)</label>
                        <input class="input" type="file" value="Browse.">
                    </div>
                    <div class="ketentuan">
                        <p>Dengan ini saya menyetujui bahwa:<br>1. Telah memahami syarat dan ketentuan pendaftaran;<br>2. Akan menaati tata tertib Diklat Bakorpend;<br>3. Memahami bahwa dana partisipasi Diklat tidak dapat dikembalikan apabila mengundurkan diri.</p>
                    </div>
                </form>
            </div>
            <div style="margin-top: 20px;width: 250px;display: flex;justify-content: flex-end;">
                <input type="submit" value="Submit" class="btn btn-info" style="color:white;">
            </div>
        </div>
      </div>
      <div class="footer fixed-bottom">
          <p>&#169;2021 Copyright: <u>BAKORPEND_Pontianak.com</u></p>
      </div>
</body>
</html>