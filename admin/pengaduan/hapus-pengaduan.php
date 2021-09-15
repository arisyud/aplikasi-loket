<?php

if(isset($_GET['kode'])){
    $sql_cek = "select * from tabel_penggaduan where nama_pelanggan='".$_GET['kode']."'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>

<?php
    $struk_trx_peng= $data_cek['struk_trx_peng'];
    if (file_exists("struk_trx_peng/$struk_trx_peng")){
        unlink("struk/$struk");
    }

    $sql_hapus = "DELETE FROM tabel_pengaduan WHERE nama_pelanggan='".$_GET['kode']."'";
    $query_hapus = mysqli_query($koneksi, $sql_hapus);
    if ($query_hapus) {
        echo "<script>
        Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=data-pengaduan'
        ;}})</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=data-pengaduan'
        ;}})</script>";
    }
