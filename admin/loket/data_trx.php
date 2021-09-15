<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Transaksi</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add_trx" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data Transaksi</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>ID TRX</th>
						<th>Struk Transaksi</th>
						<th>Nama pelanggan</th>
						<th>Jenis Transaksi</th>
						<th>Waktu Transaksi</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT * from tabel_transaksi");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['id_trx'];?>
						</td>
						  <td align="center">
							<img src="struk/<?php echo $data['struk']; ?>" width="70px" />
						</td>
						<td>
							<?php echo $data['nama_pelanggan']; ?>
						</td>
						<td>
							<?php echo $data['jenis_trx']; ?>
						</td>
						<td>
							<?php echo $data['waktu_trx']; ?>
						</td>

						<td>
							<a href="?page=view_trx&kode=<?php echo $data['nama_pelanggan']; ?>" title="Detail"
							 class="btn btn-info btn-sm">
								<i class="fa fa-eye"></i>
							</a>
							</a>
							<a href="?page=edit_trx&kode=<?php echo $data['nama_pelanggan']; ?>" title="Ubah" class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del_trx&kode=<?php echo $data['nama_pelanggan']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
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