<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Pengaduan Transaksi</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=tambah-pengaduan" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data Pengaduan Transaksi</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>ID Pengaduan</th>
						<th>Nomor TRX</th>
						<th>Nama pelanggan</th>
						<th>Alamat</th>
						<th>Nomor HP</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT * from tabel_penggaduan");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['id_pengaduan'];?>
						</td>
						  <td>
						  	<?php echo $data['nomor_trx'];?>
						</td>
						<td>
							<?php echo $data['nama_pelanggan']; ?>
						</td>
						<td>
							<?php echo $data['alamat']; ?>
						</td>
						<td>
							<?php echo $data['no_hp']; ?>
						</td>

						<td>
							<a href="?page=lihat-pengaduan&kode=<?php echo $data['nama_pelanggan']; ?>" title="Detail"
							 class="btn btn-info btn-sm">
								<i class="fa fa-eye"></i>
							</a>
							</a>
							<a href="?page=edit-pengaduan&kode=<?php echo $data['nama_pelanggan']; ?>" title="Ubah" class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=hapus-pengaduan&kode=<?php echo $data['nama_pelanggan']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
						</td>
					</tr>

					<?php
              }
            ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->