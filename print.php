<?php 
    require_once 'dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();
    error_reporting(0);
    $submit = $_GET['submit'];
    $value = $_GET['value'];
    $jenis = $_GET['jenis'];
    $gelombang = $_GET['gelombang'];
    $kelas = $_GET['kelas'];
    $statusKelas = $_GET['statusKelas'];
    $status = $_GET['status'];
    $tingkatan = $_GET['tingkatan'];
    $username = $_GET['username'];

    if($status == "bukti"){
        $html = file_get_contents('http://localhost/github/bakor/Siswa/printReport.php?username='.$username);
        $dompdf->setPaper('A4', 'potrait');
    }else{
        $html = file_get_contents('http://localhost/github/bakor/Admin/printReport.php?submit='.$submit."&value=".$value."&jenis=".$jenis."&gelombang=".$gelombang."&kelas=".$kelas."&statusKelas=".$statusKelas."&tingkatan=".$tingkatan);
        $dompdf->setPaper('A4', 'landscape');
    }
    $dompdf->loadHtml($html);
    // (Opsional) Mengatur ukuran kertas dan orientasi kertas
    $dompdf->setPaper('A4', 'landscape');
    // Menjadikan HTML sebagai PDF
    $dompdf->render();
    // Output akan menghasilkan PDF ke Browser
    $dompdf->stream();
?>