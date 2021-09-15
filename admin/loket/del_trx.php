<?php

if(isset($_GET['kode'])){
    $sql_cek = "select * from tabel_transaksi where nama_pelanggan='".$_GET['kode']."'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>

<?php
    $struk= $data_cek['struk'];
    if (file_exists("struk/$struk")){
        unlink("struk/$struk");
    }

    $sql_hapus = "DELETE FROM tabel_transaksi WHERE nama_pelanggan='".$_GET['kode']."'";
    $query_hapus = mysqli_query($koneksi, $sql_hapus);
    if ($query_hapus) {
        echo "<script>
        Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=data_trx'
        ;}})</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=data_trx'
        ;}})</script>";
    }
