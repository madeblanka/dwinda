<?php $this->load->view("_partials/head.php") ?>
<?php $this->load->view("_partials/sidebar.php") ?>
<div class="content-wrapper">
    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <form action="<?php echo site_url('kategori/hasilpenjualan') ?>" method="post">
                <div class="form-row">
                  <div class="col">
                    <select id="inputState" class="form-control" name="idkategori">
                    <?php foreach ($kategori as $kategori):?>
                     <option value="<?php echo $kategori->idkategori?>"><?php echo $kategori->kategori?> </option>
                     <?php endforeach?>
                    </select>
                  </div>
                  <div class="col">
                   <input type="date" class="form-control" name="tanggal">
                  </div>
                  <div class="col">
                  <button type="submit" class="btn btn-success">Cari</button>
                  </div>
                </div>
                
              </form>
              </div>
              <!-- /.card-header -->
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
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