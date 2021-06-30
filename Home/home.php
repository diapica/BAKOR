<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <title>BAKORPEND Pontianak</title>

    <link rel="stylesheet" href="style.css">

  </head>
  <body>

<nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="img/logo.png" width="30" height="24"> BAKORPEND Pontianak
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#About">Tentang kami</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle" href="#" role="button" id="navbarScrollingDropdown" data-bs-toggle="dropdown" aria-expanded="false">Berita</a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="#Berita">HSK</a></li>
            <li><a class="dropdown-item" href="#Berita">Kegiatan dan lomba-lomba</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="#Contact">Kontak</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#Pendaftaran">Pendaftaran</a>
        </li>
         <li class="nav-item">
          <a class="nav-link active" href="../Login/Login.php">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid banner">
  <div class="container text-center">
    <h1 class="display">Selamat Datang di</h1>
    <h3 class="display-3">Bakorpend Kalbar</h3>
    <a href="#Home"></a>
    <a href="../Home/home.php#Pendaftaran"><button type="button" class="btn btn-danger btn-lg">Yok Daftar!</button></a>
   </div> 
</div>

<div class="container-fluid About pt-2 pb-2">
  <div class="container text-center">
    <h1 class="display-5" id="About" style="color: white; background-color: orange;">Tentang kami</h1>
     <div class="row">
        <img src="img/tentang.jpg">
        <div style="text-align: left; margin-top: 10px;">
          <h3 >Visi :</h3>
          <p>Terwujudnya masyarakat Kalimantan Barat yang mampu berkomunikasi dalam bahasa mandarin baik lisan maupun tulisan.</p>
          <hr></hr>
          <h3 >Misi :</h3>
          <p style="text-align: left;">a. Meningkatkan mutu dan jumlah tenaga pengajar bahasa mandarin.<br>b. Meningkatkan sumber daya manusia masyarakat Kalimantan Barat melalui bahasa mandarin<br>c. Mengembangkan sistem pembelajaran bahasa mandarin yang diharapkan dapat menjadi acuan bagi berbagai lembaga pendidikan<br>d. Turut serta dalam berbagai kegiatan dalam rangka pendidikan dan pengembangan bahasa mandarin.<br>e. Harmonisasi komunikasi bahasa dan budaya dalam kebhinnekaan masyarakat Kalimantan Barat khususnya dan bangsa Indonesia pada umunya.</p> 
        </div>
      </div>
      <div class="row">
        <img src="img/program.jpg">
      </div>

      <div class="row">
       <div class="col-md-6">
          <img class="img-responsive" src="img/fasilitas.jpeg" height="150" width="300" alt="">
          <h4>Fasilitas</h4>
          <p>
            Berikut fasilitas-fasilitas yang tersedia di Bakorpend Pontianak, yang membuat mu semakin betah untuk belajar disini.
          </p>
          <div class="modal fade" id="fasilitas" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-fullscreen-sm-down">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalToggleLabel">FASILITAS</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="container-fluid">
                    <div class="row">
                      Berikut fasilitas-fasilitas yang tersedia di Bakorpend Pontianak, yang membuat mu semakin betah untuk belajar disini.<br><br>
                      <p>
                        <h4>Fasilitas</h4>
                      </p>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="card h-100">
                          <div class="card-body">
                            <h5 class="card-title"></h5>
                            <p class="card-text">
                              - Ruang kelas full AC, visual audio, dan perpustakaan.<br>- Mendapatkan sertifikat HSK (Hanyu Shuiping kaoshi) resmi dari Confucius Institute Head Quarters (hanban), RRT.<br>- Kelas Chinese Arts (wushu, kaligrafi, Chinese knots, Chinese paper cutting, dll)<br>- Program dana pinjaman pendidikan( Daixuejin) untuk yang memenuhi syarat.<br>- Kesempatan pendidikan dan pelatihan yang lebih luas untuk siswa yang berprestasi
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <a class="btn btn-primary" data-bs-toggle="modal" href="#fasilitas" role="button">Baca selengkapnya</a>
       </div>

       <div class="col-md-6">
         <img class="img-responsive" src="img/standar.jpeg" height="150" width="300" alt="">
         <h4>Standar Pembelajaran</h4>
         <p>
           Gambaran capaian pembelajaran minimal bahasa mandarin peserta saat masuk dan setelah menyelesaikan penddikan dengan acuan HSK.
         </p>
         <div class="modal fade" id="standar" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-fullscreen">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalToggleLabel">Standar Pembelajaran</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="container-fluid">
                    <div class="row">
                      Gambaran capaian pembelajaran minimal bahasa mandarin peserta saat masuk dan setelah menyelesaikan penddikan dengan acuan HSK.<br><br>
                      <p>
                        <h4>Standar Pembelajaran</h4>
                      </p>
                    </div>
                    <div class="row">
                      <table class="table table-bordered">
                    <thead class="table-dark">
                    <tr>
                      <th scope="col">Kelas</th>
                      <th scope="col">Kemampuan saat masuk</th>
                      <th scope="col">Kemampuan setelah lulus</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Kelas dasar <br>Pre basic <br>Sedikit basic</td>
                      <td><br>0<br>HSK Level 2</td>
                      <td><br>HSK level 3 (dinilai di atas 180)<br>HSK level 3-4 (dinilai di atas 180)</td>
                    </tr>
                    <tr>
                      <td>Kelas menengah</td>
                      <td>HSL level 3</td>
                      <td>HSK level 4-5 (dinilai di atas 180)</td>
                    </tr>
                    <tr>
                      <td>Kelas tingkat lanjut</td>
                      <td>HSK leve 4</td>
                      <td>HSK level 5-6 (dinilai di atas 180)</td>
                    </tr>
                  </tbody>
                </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
         <a class="btn btn-primary" data-bs-toggle="modal" href="#standar" role="button">Baca selengkapnya</a>
       </div>
     </div>
  </div> 
</div>

<div class="container-fluid Berita pt-2 pb-2">
  <div class="container text-center">
    <h1 class="display-5" id="Berita" style="color: white; background-color: orange;">Berita</h1>
     <div class="row">

       <div class="col-md-6">
          <img class="img-responsive" src="img/hsklogo.jpg" height="150" width="300" alt="">
          <h4>HSK</h4>
          <p>
            Hanyu Shuiping Kaoshi (HSK) adalah ujian standardisasi untuk kemahiran berbahasa mandarin bagi penutur asing, seperti mahasiswa internasional, pendatang dari luar, dan anggota kelompok etnis minoritas di Cina.
          </p>
          <div class="modal fade" id="hsk" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-fullscreen">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalToggleLabel">HSK</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="container-fluid">
                    <div class="row">
                      Hanyu Shuiping Kaoshi (HSK) adalah ujian standardisasi untuk kemahiran berbahasa mandarin bagi penutur asing, seperti mahasiswa internasional, pendatang dari luar, dan anggota kelompok etnis minoritas di Cina. Sertifikat dari tes HSK memiliki fungsi sama dan SETARA dengan tes TOEFL dan IELTS untuk bahasa Inggris. Bentuk tesnya pun hampir sama, ada reading (membaca) dan listening (mendengar). Jika ingin mendaftar ke program kuliah berbahasa mandarin, perlu mencapai HSK level 3-8 tergantung jurusan. Untuk dapat diterima bekerja di Cina, setidaknya perlu mencapai HSK level 5.<br><br>
                      <p>
                        <h4>Level Dalam Test HSK</h4>
                      </p>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="card h-100">
                          <div class="card-body">
                            <h5 class="card-title">HSK Level 1 (Minimal 150 kata)</h5>
                            <p class="card-text">
                              Mengenal dan menggunakan kosakata dalam bahasa Mandarin yang sangat sederhana, yang akan digunakan untuk belajar Mandarin di level selanjutnya.
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="card h-100">
                          <div class="card-body">
                            <h5 class="card-title">HSK Level 2 (Minimal 300 kata)</h5>
                            <p class="card-text">
                              Dapat menggunakan bahasa Mandarin untuk topik-topik sederhana sehari-hari.
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="card h-100">
                          <div class="card-body">
                            <h5 class="card-title">HSK Level 3 (Minimal 600 kata)</h5>
                            <p class="card-text">
                              Dapat berkomunikasi secara dasar dalam bahasa Mandarin dalam kehidupan sehari-hari, contohnya untuk belajar dan bekerja.
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="card h-100">
                          <div class="card-body">
                            <h5 class="card-title">HSK Level 4 (Minimal 1200 kata) </h5>
                            <p class="card-text">
                              Dapat berkomunikasi dalam bahasa Mandarin untuk topik-topik yang lebih kompleks, mengekspresikan diri dalam standar yang lebih kompleks.
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="card h-100">
                          <div class="card-body">
                            <h5 class="card-title">HSK Level 5 (Minimal 2500 kata) </h5>
                            <p class="card-text">
                             Dapat mendiskusikan topik yang lebih abstrak dan profesional, mudah untuk merespon berbagai pembicaraan, seperti memberikan komentar.
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="card h-100">
                          <div class="card-body">
                            <h5 class="card-title">HSK Level 6 (Minimal 5000 kata)</h5>
                            <p class="card-text">
                              Dapat berkomunikasi secara luas dalam bahasa Mandarin dengan penuturan dan kefasihan mendekati penutur asli.
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <a class="btn btn-primary" data-bs-toggle="modal" href="#hsk" role="button">Baca selengkapnya</a>
       </div>

       <div class="col-md-6">
         <img class="img-responsive" src="img/lomba.jpeg" height="150" width="300" alt="">
         <h4>Kegiatan dan Lomba</h4>
         <p>
           Bukan cuman belajar aja disini! tapi kita juga mengembangkan diri lewat kegiatan dan lomba-lomba yang ada agar keterampilan juga berkembang selaras dengan ilmu kita.
         </p>
         <div class="modal fade" id="kegiatanlomba" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-fullscreen">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalToggleLabel">Kegiatan dan Lomba</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="container-fluid">
                    <div class="row">
                      Bukan cuman belajar aja disini! tapi kita juga mengembangkan diri lewat kegiatan dan lomba-lomba yang ada agar keterampilan juga berkembang selaras dengan ilmu kita<br><br>
                      <p>
                        <h4>Jadwal kegiatan dan lomba</h4>
                      </p>
                    </div>
                    <div class="row">
                      <div class="col-6 col-md-6">
                        <div class="card h-100">
                          <div class="card-body">
                            <img class="img-responsive" src="img/lomba1.jpg" height="150" width="300" alt="">
                            <h5 class="card-title">Lomba menulis dan mengarang</h5>
                            <p class="card-text">
                              Lomba menulis hanzi tanggal 17 – 19 mei 2021<br>Lomba mengarang tanggal 24 – 28 mei 2021
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-6 col-md-6">
                        <div class="card h-100">
                          <div class="card-body">
                            <img class="img-responsive" src="img/lomba2.jpg" height="150" width="300" alt="">
                            <h5 class="card-title">lomba keterampilan berbahasa mandarin</h5>
                            <p class="card-text">
                              Lomba pidato : kemampuan berbicara <br>Chinese art : pengetahuan budaya<br>Waktu lomba : maret 2021<br>CP : 0812 5325 3882<br>Batas akhir pendaftaran : 29 maret 2021
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-6 col-md-6">
                        <div class="card h-100">
                          <div class="card-body">
                            <img class="img-responsive" src="img/lomba3.jpg" height="150" width="300" alt="">
                            <h5 class="card-title">Sosialisasi lomba keterampilan berbahasa mandarin</h5>
                            <p class="card-text">
                              Kamis, 25 maret 2021<br>13.00 – 14.00 WIB<br>Via ZOOM<br>Meeting ID : 858 6774<br>Password : 888888
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-6 col-md-6">
                        <div class="card h-100">
                          <div class="card-body">
                            <img class="img-responsive" src="img/lomba4.jpg" height="150" width="300" alt="">
                            <h5 class="card-title">Lomba bernyanyi dan lomba bercerita Lomba bernyanyi </h5>
                            <p class="card-text">
                              Lomba Bernyanyi : CP : 0895-7017-00866 <br>Lomba bercerita : CP : 0896-9120-5799 <br>Waktu pendaftaran & Pengumpulan video <br>5 februari – 28 februari 2021 <br>Benefit : angpau dan plakat <br>Terbuka untuk umum<br>Pengumuman pemenang di pertengahan maret
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
         <a class="btn btn-primary" data-bs-toggle="modal" href="#kegiatanlomba" role="button">Baca selengkapnya</a>
       </div>
     </div>
  </div> 
</div>

<div class="container-fluid Pendaftaran pt-2 pb-2">
  <div class="container text-center">
    <h2 class="display-5" id="Pendaftaran" style="color: white; background-color: orange;" >Pendaftaran</h2>
   <div class="row">
    <div class="col text-center col-sm-5">
     <img src="img/pendaftaran.png" style="height: 520px; width: 100%;">
    </div>
    <div class="col text-center col-sm-7" style="font-size: 13px;">
      <h6>PENDAFTARAN KELAS DIKLAT BAKORPEND MUSIM GUGUR 2021/2022</h6>
      <div class="col-sm-6" style="margin-top: 10px; text-align: left; float:left">
        <b>Jadwal Pendaftaran : </b>
        <table>
          <tr>
            <td>Gel 1:</td>
            <td>7 Juni 2021 – 30 Juli 2021</td>
          </tr>
          <tr>
            <td>Gel 2:</td>
            <td>2 Agustus 2021 – 14 agustus 2021</td>
          </tr>
          <tr>
            <td colspan="2" style="color:red; font-weight: bold;">Mulai belajar : 6 September 2021</td>
          </tr>
        </table>
      </div>
      <div class="col-sm-6" style="margin-top: 10px; float:left; text-align: center;">
        <b>Waktu belajar : <br>
          Senin-jumat
        </b>
       <p>
         Kelas pagi : 08.30 – 12.00 <br>
         Kelas sore : 17.30 – 21.00
       </p>
      </div>

      <div class="col-sm-12" style="margin-top: 10px; text-align: left">
        <b>Kelas yang Dibuka : </b>
        <table  style="width:100%">
          <tr>
            <td colspan=2 style="width:50%"><b>*KELAS TATAP MUKA</b></td>
            <td colspan=2 style="border-left: 3px solid black;"><b>*KELAS ONLINE</b></td>
          </tr>
          <tr>
            <td width=25%>KELAS DASAR PAGI </td> <td width=15%><b> RP 6.830.000 </b></td>
            <td style="border-left: 3px solid black;">KELAS DASAR SORE (PAKET 1 SEMESTER) </td> <td><b> RP 4.730.000 </b></td>
          </tr>
          <tr>
            <td>KELAS DASAR SORE </td> <td><b> RP 7.030.000 </b></td>
            <td style="border-left: 3px solid black;">KELAS DASAR SORE (PAKET 2 SEMESTER) </td> <td><b> RP 4.670.000 </b></td>
          </tr>
          <tr>
            <td>KELAS MENENGAH PAGI </td> <td><b> RP 7.150.000 </b></td>
            <td style="border-left: 3px solid black;">KELAS MENENGAH SORE (PAKET 2 SEMESTER) </td> <td><b> RP 7.350.000 </b></td>
          </tr>
          <tr>
            <td>KELAS MENENGAH SORE </td> <td><b> RP 7.350.000 </b></td>
            <td></td>
          </tr>
        </table>
      </div>
      <hr></hr>

      <div class="col-sm-12" style="margin-top: 10px; text-align: left">
        <b>Syarat Pendaftaran : </b> <br>
        1. Mengisi Formulir pendaftaran <br>
        2. Melampirkan : <br>
        <ul>
          <li>1 lembar fotokopi KTP (kartu pelajar bagi yang belum memiliki KTP)</li>
          <li>1 lembar fotokopi ijasah pendidikan terakhir</li>
          <li>2 lembar pas foto latar biru ukuran 3x4</li>
        </ul>        
      </div>
      <hr></hr>

      <div class="col-sm-12" style="margin-top: 10px; text-align: center">
        <p style="text-align: left;">
          Dengan ini saya menjelaskan bahwa: <br>
          1. Telah memahami syarat dan ketentuan pendaftaran.<br>
          2. Akan menaati tata tertib di lingukangan Diklat Bakorpend Kalbar.<br>
          <span style="color:red">
          3. memahami bahwa dana partisipasi tidak dapat dikembalikan apabila mengundurkan diri.<br>
          4. peserta yang sudah terdaftar tidak bisa digantikan oleh orang lain.<br>
          </span>
        </p>
      </div>
    </div>
    <div>
      <br>
      <h4>Langkah Pendaftaran</h4>
      <br>
      <ul class="step">
        <li class="list-step"><span class="marker-number">1</span> <span class="marker-text">Informasi Pendaftaran</span></li>
        <li class="list-step"><span class="marker-number">2</span> <span class="marker-text">Syarat Pendaftaran</span></li>
        <li class="list-step"><span class="marker-number">3</span> <span class="marker-text">Melakukan Pendaftaran</span></li>
        <li class="list-step"><span class="marker-number">4</span> <span class="marker-text">Pembayaran</span></li>
        <li class="list-step"><span class="marker-number">5</span> <span class="marker-text">Selesai</span></li>
      </ul> 
    </div>
    <a href="../Login/Login.php#Login"><button type="button" class="btn btn-danger btn-lg">DAFTAR</button></a>
  </div> 
  </div>
</div>

<div class="container Contact"></div>
<div class="row text-center" style= "background-color: #3c3a3a; color: #fff;">
  <h2 id="Contact" >Hubungi Kami :</h2>
  <div class="col">
      <a style="color:white" href="https://www.google.com/maps/dir//maps+google+bakor/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x2e1d5854494f2cf1:0x41cddfed3551c9d?sa=X&ved=2ahUKEwiPy4ml_6DxAhW7ILcAHeQIDrcQ9RcwFHoECDQQAw" target="_blank"> 
      <span class="fa fa-map-marker" aria-hidden="true"> : Jalan Teuku Umar NO. 45 Pontianak  </span> </a><br>
      <span class="fa fa-phone" aria-hidden="true"> : 0561-749258/081253253882 </span><br>
      <a style="color:white" href="https://www.instagram.com/bakorpendkalbar/" target="_blank"> <span class="fa fa-instagram" aria-hidden="true"> : bakorpendkalbar </a></span>
  </div>
</div>

<div class="footer">
  <p>© 2021 Copyright:<a class="text-reset fw-bold" href="../Home/home.php"> BAKORPEND Pontianak.com</a></p>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  </body>
</html>
