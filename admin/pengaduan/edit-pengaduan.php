<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tabel_penggaduan WHERE nama_pelanggan='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data Transaksi</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nomor TRX</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nomor_trx" name="nomor_trx" value="<?php echo $data_cek['nomor_trx']; ?>"/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Pelanggan</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="<?php echo $data_cek['nama_pelanggan']; ?>"
					 readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data_cek['alamat']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nomor HP</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nomor_hp" name="nomor_hp" value="<?php echo $data_cek['nomor_hp']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Transaksi</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="jenis_trx" name="jenis_trx" value="<?php echo $data_cek['jenis_trx']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Waktu Transaksi</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="waktu_trx" name="waktu_trx" value="<?php echo $data_cek['waktu_trx']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kendala Transaksi</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="kendala_trx" name="kendala_trx" value="<?php echo $data_cek['kendala_trx']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status Penanganan</label>
				<div class="col-sm-4">
					<select name="status_peng" id="status_peng" class="form-control">
						<option value="">-- Pilih --</option>
						<?php
                //cek data yg dipilih sebelumnya
                if ($data_cek['status_peng'] == "Selesai") echo "<option value='Selesai' selected>Selesai</option>";
                else echo "<option value='Selesai'>Selesai</option>";

                if ($data_cek['status_peng'] == "Dalam penanganan") echo "<option value='dalam penanganan' selected>Dalam Penanganan</option>";
                else echo "<option value='Dalam penanganan'>Dalam penanganan</option>";

                if ($data_cek['status_peng'] == "Gagal") echo "<option value='Gagal' selected>Gagal</option>";
                else echo "<option value='Gagal'>Gagal</option>";

                if ($data_cek['status_peng'] == "Pending") echo "<option value='Pending' selected>Pending</option>";
                else echo "<option value='Pending'>Pending</option>";
            			?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Keterangan</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo $data_cek['keterangan']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Struk Transaksi</label>
				<div class="col-sm-6">
					<img src="struk_trx_peng/<?php echo $data_cek['struk_trx_peng']; ?>" width="160px" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Ubah Struk </label>
				<div class="col-sm-6">
					<input type="file" id="struk_trx_peng" name="struk_trx_peng">
					<p class="help-block">
						<font color="red">"Format file Jpg/Png"</font>
					</p>
				</div>
			</div>
		</div>

		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-pengaduan" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
	$sumber = @$_FILES['struk_trx_peng']['tmp_name'];
	$target = 'struk_trx_peng/';
	$nama_file = @$_FILES['struk_trx_peng']['name'];
	$pindah = move_uploaded_file($sumber, $target.$nama_file);

	
if (isset ($_POST['Ubah'])){

    if(!empty($sumber)){
        $foto= $data_cek['struk_trx_peng'];
            if (file_exists("struk_trx_peng/$foto")){
            unlink("struk_trx_peng/$foto");}

        $sql_ubah = "UPDATE tabel_penggaduan SET
			nomor_trx='".$_POST['nomor_trx']."',
			alamat='".$_POST['alamat']."',
			nomor_hp='".$_POST['nomor_hp']."',
			jenis_trx='".$_POST['jenis_trx']."',
			waktu_trx='".$_POST['waktu_trx']."',
			kendala_trx='".$_POST['kendala_trx']."',
			status_peng='".$_POST['status_peng']."',
			keterangan='".$_POST['keterangan']."',
			struk_trx_peng='".$nama_file."'		
            WHERE nama_pelanggan='".$_POST['nama_pelanggan']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);

    }elseif(empty($sumber)){
		$sql_ubah = "UPDATE tabel_penggaduan SET
		nomor_trx='".$_POST['nomor_trx']."',
		alamat='".$_POST['alamat']."',
		nomor_hp='".$_POST['nomor_hp']."',
		jenis_trx='".$_POST['jenis_trx']."',
		waktu_trx='".$_POST['waktu_trx']."',
		kendala_trx='".$_POST['kendala_trx']."',
		status_peng='".$_POST['status_peng']."',
		keterangan='".$_POST['keterangan']."'		
		WHERE nama_pelanggan='".$_POST['nama_pelanggan']."'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);
        }

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-pengaduan';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-pengaduan';
            }
        })</script>";
    }
}

