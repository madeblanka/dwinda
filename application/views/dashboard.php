<?php $this->load->view("_partials/head.php") ?>
<?php $this->load->view("_partials/sidebar.php") ?>
<div class="content-wrapper">
    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel Transaksi 
                <a href="<?php echo site_url('transaksi/tambah/') ?>"
                href="#!"  class="btn btn-outline-success"><strong>Tambah</strong></a></h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" id="myInput" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table id="myTable" class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID Transaksi</th>
                      <th>Tanggal/Bulan/Tahun</th>
                      <th>Jumlah</th>
                      <th>Laba</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <?php foreach ($transaksi as $transaksi): ?>
                  <tbody id="myTable">
                      <tr>
                          <td><?php echo $transaksi->idtransaksi?></td>
                          <td><?php $a = $transaksi->tanggal; echo date('d/m/Y H:i:s',strtotime($a));?></td>
                          <td><?php echo $transaksi->jumlah?></td>
                          <td><?php echo $transaksi->laba?></td>
                          <td> 

                          <a href="<?php echo site_url('detail/index/'.$transaksi->idtransaksi) ?>"
                          href="#!" class="btn btn-small text-info"><i class="fas fa-search"></i> Detail</a>

                          <a href="<?php echo site_url('transaksi/print/'.$transaksi->idtransaksi) ?>"
                          href="#!" class="btn btn-small text-secondary"><i class="fas fa-copy"></i> Print</a>

                          <a href="<?php echo site_url('transaksi/edit/'.$transaksi->idtransaksi) ?>"
                           href="#!" class="btn btn-small text-primary"><i class="fas fa-edit"></i> Edit</a>

                           <a href="<?php echo site_url('transaksi/delete/'.$transaksi->idtransaksi) ?>"
                           onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?');" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>

                          </td>
                      </tr>
                <?php endforeach?>
                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
<?php $this->load->view("_partials/footer.php") ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
  