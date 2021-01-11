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
                  <form action="<?php echo site_url('transaksi/update') ?>" method="post" enctype="multipart/form-data" >
                    <tr>
                      <th>ID Transaksi</th>
                      <th>ID detail</th>
                      <th>Nama</th>
                      <th>Jumlah</th>
                      <th>Satuan</th>
                      <th>Total</th>
                      <th>Harga Beli</th>
                      <th>Total Beli</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <?php foreach ($detail as $detail): ?>
                  <tbody id="myTable">
                      <tr>
                          <td><input type="text" name="idtransaksi[]" value="<?php echo $detail->idtransaksi?>" readonly></td>
                          <td><input type="text" name="idbarang[]" value="<?php echo $detail->idbarang?>" readonly></td>
                          <td><input type="text" name="nama[]" value="<?php echo $detail->nama?>" readonly></td>
                          <td><input type="number" value="<?php echo $detail->jumlah?>" name="jumlah" ></td>
                          <td><input type="text" name="satuan[]" value="<?php echo $detail->satuan?>" readonly></td>
                          <td><input type="text" name="total[]" value="<?php echo $detail->total?>" readonly></td>
                          <td><input type="text" name="hargabeli[]" value="<?php echo $detail->hargabeli?>" readonly></td>
                          <td><input type="text" name="totalbeli[]" value="<?php echo $detail->totalbeli?>" readonly></td>
                          <td> 
                           <a href="<?php echo site_url('detail/delete/'.$detail->idtransaksi) ?>"
                           onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?');" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>

                          </td>
                          <?php endforeach?>
                      </tr>
                      <tr> <th> <input  onclick="return confirm('Apakah Anda Yakin Ingin Menyimpan Data Ini ?');" type="submit" name="btn" value="Save" /></th></tr>
                
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
  