<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from tabel_penggaduan WHERE nama_pelanggan='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<div class="row">

	<div class="col-md-8">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Detail Pengaduan Transaksi</h3>

				<div class="card-tools">
				</div>
			</div>
			<div class="card-body p-0">
				<table class="table">
					<tbody>
						<tr>
							<td style="width: 150px">
								<b>ID Pengaduan</b>
							</td>
							<td>:
								<?php echo $data_cek['id_pengaduan']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Nomor TRX</b>
							</td>
							<td>:
								<?php echo $data_cek['nomor_trx']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Nama Pelanggan</b>
							</td>
							<td>:
								<?php echo $data_cek['nama_pelanggan']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Alamat</b>
							</td>
							<td>:
								<?php echo $data_cek['alamat']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Nomor HP</b>
							</td>
							<td>:
								<?php echo $data_cek['nomor_hp']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Jenis Transaksi</b>
							</td>
							<td>:
								<?php echo $data_cek['jenis_trx']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Waktu Transaksi</b>
							</td>
							<td>:
								<?php echo $data_cek['waktu_trx']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Kendala Transaksi</b>
							</td>
							<td>:
								<?php echo $data_cek['kendala_trx']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Status Penanganan</b>
							</td>
							<td>:
								<?php echo $data_cek['status_peng']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Keterangan</b>
							</td>
							<td>:
								<?php echo $data_cek['keterangan']; ?>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="card-footer">
					<a href="?page=data-pengaduan" class="btn btn-warning">Kembali</a>

					<a href="./report/cetak-pengaduan.php?nama_pelanggan=<?php echo $data_cek['nama_pelanggan']; ?>" target=" _blank"
					 title="Cetak Data Pengaduan" class="btn btn-primary">Print</a>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="card card-success">
			<div class="card-header">
				<center>
					<h3 class="card-title">
						Struk Transaksi Pengaduan
					</h3>
				</center>

				<div class="card-tools">
				</div>
			</div>
			<div class="card-body">
				<div class="text-center">
					<img src="struk_trx_peng/<?php echo $data_cek['struk_trx_peng']; ?>" width="280px" />
				</div>

				<h3 class="profile-username text-center">
					<?php echo $data_cek['nama_pelanggan']; ?>
					-
					<?php echo $data_cek['status_peng']; ?>
				</h3>
			</div>
		</div>
	</div>

</div>