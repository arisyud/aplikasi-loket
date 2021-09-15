<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Pengaduan Transaksi</h3>
	</div>
	<form action="inc/simpan.php" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nomor TRX</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nomor_trx" name="nomor_trx" placeholder="Nomor Transaksi" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Pelanggan</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="Nama Pelanggan" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Pelanggan" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nomor HP</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nomor_hp" name="nomor_hp" placeholder="Nomor HP Pelanggan" required>
				</div>
			</div>

		    <div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Transaksi</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="jenis_trx" name="jenis_trx" placeholder="Jenis Transaksi" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Waktu Transaksi</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="waktu_trx" name="waktu_trx" placeholder="Waktu Transaksi" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kendala Transaksi</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="kendala_trx" name="kendala_trx" placeholder="Kendala Transaksi" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status Penanganan</label>
				<div class="col-sm-5">
					<select name="status_peng" id="status_peng" class="form-control">
						<option>- Pilih -</option>
						<option>Selesai</option>
						<option>Dalam Penanganan</option>
						<option>Gagal</option>
						<option>Pending</option>
						
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Keterangan</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Bukti Struk Transaksi</label>
				<div class="col-sm-6">
					<input type="file" id="struk_trx_peng" name="struk_trx_peng">
					<p class="help-block">
						<font color="red">"Format file di dukung JPG atau PNG"</font>
					</p>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-pengaduan" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
	$sumber = @$_FILES['struk_trx_peng']['tmp_name'];
	$target = 'struk_trx_peng/';
	$nama_file = @$_FILES['struk_trx_peng']['name'];
	$pindah = move_uploaded_file($sumber, $target.$nama_file);

    if (isset ($_POST['Simpan'])){

		if(!empty($sumber)){
        $sql_simpan = "INSERT INTO tabel_penggaduan (nomor_trx, nama_pelanggan, alamat, nomor_hp, jenis_trx, waktu_trx, kendala_trx, status_peng, keterangan, struk_trx_peng) VALUES 
              (
            '".$_POST['nomor_trx']."',
            '".$_POST['nama_pelanggan']."',
            '".$_POST['alamat']."',
            '".$_POST['nomor_hp']."',
			'".$_POST['jenis_trx']."',
			'".$_POST['waktu_trx']."',
			'".$_POST['kendala_trx']."',
			'".$_POST['status_peng']."',
			'".$_POST['keterangan']."',
            '".$nama_file."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);


    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-pengaduan';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=tambah-pengaduan';
          }
      })</script>";
	}
	}elseif(empty($sumber)){
		echo "<script>
		Swal.fire({title: 'Gagal, Foto Wajib Diisi',text: '',icon: 'error',confirmButtonText: 'OK'
		}).then((result) => {
			if (result.value) {
				window.location = 'index.php?page=tambah-pengaduan';
			}
		})</script>";
	}
	}
     //selesai proses simpan data
