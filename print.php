<?php 
    require_once 'dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();

    $submit = $_GET['submit'];
    $value = $_GET['value'];
    $jenis = $_GET['jenis'];
    $gelombang = $_GET['gelombang'];
    $kelas = $_GET['kelas'];
    $statusKelas = $_GET['statusKelas'];

    $html = file_get_contents('http://localhost/github/bakor/Admin/printReport.php?submit='.$submit."&value=".$value."&jenis=".$jenis."&gelombang=".$gelombang."&kelas=".$kelas."&statusKelas=".$statusKelas);
    $dompdf->loadHtml($html);
    // (Opsional) Mengatur ukuran kertas dan orientasi kertas
    $dompdf->setPaper('A4', 'landscape');
    // Menjadikan HTML sebagai PDF
    $dompdf->render();
    // Output akan menghasilkan PDF ke Browser
    $dompdf->stream();
?>