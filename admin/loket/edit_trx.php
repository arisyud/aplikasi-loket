<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tabel_transaksi WHERE nama_pelanggan='".$_GET['kode']."'";
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
				<label class="col-sm-2 col-form-label">Nama Pelanggan</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="<?php echo $data_cek['nama_pelanggan']; ?>"
					 readonly/>
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
				<label class="col-sm-2 col-form-label">Nominal Transaksi</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nominal_trx" name="nominal_trx" value="<?php echo $data_cek['nominal_trx']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status Transaksi</label>
				<div class="col-sm-4">
					<select name="status_trx" id="status_trx" class="form-control">
						<option value="">-- Pilih --</option>
						<?php
                //cek data yg dipilih sebelumnya
                if ($data_cek['status'] == "Sukses") echo "<option value='Sukses' selected>Sukses</option>";
                else echo "<option value='Sukses'>Sukses</option>";

                if ($data_cek['status'] == "Pending") echo "<option value='Pending' selected>Pending</option>";
                else echo "<option value='Pending'>Pending</option>";

                if ($data_cek['status'] == "Gagal") echo "<option value='Gagal' selected>Gagal</option>";
                else echo "<option value='Gagal'>Gagal</option>";

                if ($data_cek['status'] == "Dalam Kendala") echo "<option value='Dalam kendala' selected>Dalam kendala</option>";
                else echo "<option value='Dalam kendala'>Dalam kendala</option>";
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
					<img src="struk/<?php echo $data_cek['struk']; ?>" width="160px" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Ubah Struk </label>
				<div class="col-sm-6">
					<input type="file" id="struk" name="struk">
					<p class="help-block">
						<font color="red">"Format file Jpg/Png"</font>
					</p>
				</div>
			</div>
		</div>

		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-pegawai" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
	$sumber = @$_FILES['struk']['tmp_name'];
	$target = 'struk/';
	$nama_file = @$_FILES['struk']['name'];
	$pindah = move_uploaded_file($sumber, $target.$nama_file);

	
if (isset ($_POST['Ubah'])){

    if(!empty($sumber)){
        $foto= $data_cek['struk'];
            if (file_exists("struk/$foto")){
            unlink("struk/$foto");}

        $sql_ubah = "UPDATE tabel_transaksi SET
			jenis_trx='".$_POST['jenis_trx']."',
			waktu_trx='".$_POST['waktu_trx']."',
			nominal_trx='".$_POST['nominal_trx']."',
			status_trx='".$_POST['status_trx']."',
			keterangan='".$_POST['keterangan']."',
			struk='".$nama_file."'		
            WHERE nama_pelanggan='".$_POST['nama_pelanggan']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);

    }elseif(empty($sumber)){
		$sql_ubah = "UPDATE tabel_transaksi SET
		jenis_trx='".$_POST['jenis_trx']."',
		waktu_trx='".$_POST['waktu_trx']."',
		nominal_trx='".$_POST['nominal_trx']."',
		status_trx='".$_POST['status_trx']."',
		keterangan='".$_POST['keterangan']."'		
		WHERE nama_pelanggan='".$_POST['nama_pelanggan']."'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);
        }

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data_trx';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data_trx';
            }
        })</script>";
    }
}

