<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data Transaksi</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Pelanggan</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="Nama Pelanggan" required>
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
				<label class="col-sm-2 col-form-label">Nominal Transaksi</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nominal_trx" name="nominal_trx" placeholder="Nominal Transaksi" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status Transaksi</label>
				<div class="col-sm-5">
					<select name="status_trx" id="status_trx" class="form-control">
						<option>- Pilih -</option>
						<option>Sukses</option>
						<option>Pending</option>
						<option>Gagal</option>
						<option>Dalam Kendala</option>
						
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
				<label class="col-sm-2 col-form-label">Bukti Transaksi</label>
				<div class="col-sm-6">
					<input type="file" id="struk" name="struk">
					<p class="help-block">
						<font color="red">"Format file di dukung JPG atau PNG"</font>
					</p>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data_trx" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
	$sumber = @$_FILES['struk']['tmp_name'];
	$target = 'struk/';
	$nama_file = @$_FILES['struk']['name'];
	$pindah = move_uploaded_file($sumber, $target.$nama_file);

    if (isset ($_POST['Simpan'])){

		if(!empty($sumber)){
        $sql_simpan = "INSERT INTO tabel_transaksi (nama_pelanggan, jenis_trx, waktu_trx, nominal_trx, status_trx, keterangan, struk) VALUES (
            '".$_POST['nama_pelanggan']."',
			'".$_POST['jenis_trx']."',
			'".$_POST['waktu_trx']."',
			'".$_POST['nominal_trx']."',
			'".$_POST['status_trx']."',
			'".$_POST['keterangan']."',
            '".$nama_file."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data_trx';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add_trx';
          }
      })</script>";
	}
	}elseif(empty($sumber)){
		echo "<script>
		Swal.fire({title: 'Gagal, Foto Wajib Diisi',text: '',icon: 'error',confirmButtonText: 'OK'
		}).then((result) => {
			if (result.value) {
				window.location = 'index.php?page=add_trx';
			}
		})</script>";
	}
	}
     //selesai proses simpan data
