<?php $this->load->view("_partials/head.php") ?>
<?php $this->load->view("_partials/sidebar.php") ?>
<div class="content-wrapper">
    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>

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
                      <th>ID detail</th>
                      <th>Nama</th>
                      <th>Jumlah</th>
                      <th>Harga Satuan</th>
                      <th>Harga Beli</th>
                      <th>Total Harga Beli</th>
                      <th>Total Jual</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <?php foreach ($detail as $detail): ?>
                  <tbody id="myTable">
                      <tr>
                          <td><?php echo $detail->idtransaksi?></td>
                          <td><?php echo $detail->idbarang?></td>
                          <td><?php echo $detail->nama?></td>
                          <td><?php echo $detail->jumlah?></td>
                          <td><?php echo $detail->satuan?></td>
                          <td><?php echo $detail->hargabeli?></td>
                          <td><?php echo $detail->totalbeli?></td>
                          <td><?php echo $detail->total?></td>
                          <td> 
                            
                          <a href="<?php echo site_url('detail/print/'.$detail->idtransaksi) ?>"
                           href="#!" class="btn btn-small text-primary"><i class="fas fa-edit"></i> Edit</a>

                           <a href="<?php echo site_url('detail/delete/'.$detail->idtransaksi) ?>"
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
  