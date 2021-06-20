<?php include "../connection.php";
    $sql = "select status_register from tbuser where username= '$username'";
    $query = mysqli_query($conn,$sql);
    $re = mysqli_fetch_array($query);
    $status = $re['status_register'];
?>
<div class="sidebar">
    <ul>
        <a href="index.php"><li>Dashboard</li></a>
        <?php if($status != 'a' ){ ?> 
        <a><li class="disable">Form Pendaftaran</li></a>
        <?php }else{ ?>
        <a href="pendaftaran.php"><li>Form Pendaftaran</li></a>
        <?php }?>
        <?php if($status != 'c'){ ?>
        <a><li class="disable">Pembayaran</li></a>
        <?php }else{ ?>
        <a href="pembayaran.php"><li>Pembayaran</li></a>
        <?php } ?>
        <a href="index.php"><li>Status Siswa</li></a>
    </ul>
</div>

<style>
    .sidebar .disable{
        width:100%;
        padding:20px;
        color:black;
        background-color:rgba(0,0,0,0.5);
    }
    a:hover{
        cursor:pointer;
    }
</style>