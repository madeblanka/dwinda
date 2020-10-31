<?php $this->load->view("_partials/head.php") ?>
<?php $this->load->view("_partials/sidebar.php") ?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Transaksi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Transaksi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md">
            <!-- general form elements -->
              <!-- /.card-header -->
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">Input Barang</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col">
                  <div class="form-group">
                  <form action="<?php echo site_url('transaksi/addsementara') ?>" method="post" enctype="multipart/form-data" >
                  <select name="idbarang" id="idbarang" class="form-control select2" style="width: 100%;">
                    <option selected="selected">Kode barang</option>
                    <?php foreach ($barang as $barang): ?>
                    <option value="<?php echo $barang->idbarang?>" required><?php echo $barang->idbarang?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                  </div>
                  <div class="col">
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Barang" readonly>
                  </div>
                  <div class="col">
                    <input type="text" class="form-control" name="satuan" id="harga" placeholder="Harga Satuan"  readonly>
                  </div>
                  <div class="col">
                    <input type="number" class="form-control" name="hargabeli" id="hargabeli" placeholder="Harga Beli" readonly>
                  </div>
                  <div class="col">
                    <input type="number" class="form-control" name="jumlah" placeholder="Jumlah" name="jumlah">
                  </div>
                  <div class="col">
                  <input class="btn btn-success" type="submit" name="btn" value="Tambah" />
                  </div>
                </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="row">
          <!-- left column -->
          <div class="col-md">
            <!-- general form elements -->
              <!-- /.card-header -->
              <div class="card">
              <div class="card-header">
              <div class="row">
              <?php foreach ($transaksi as $transaksi): ?>
              <div class="col-md-1">
                    <label for="kodetransaksi">Kode Transaksi</label>
                  </div>
                <div class="col-md-1">
                    <input type="text" class="form-control" name="idtransaksi" value="<?php echo $transaksi->idtransaksi +1; ?>" placeholder="<?php echo $transaksi->idtransaksi +1; ?>" readonly>
                  </div>
              </div>
              </div>
              <form action="<?php echo site_url('transaksi/create') ?>" method="post" enctype="multipart/form-data" >
              <input type="hidden"name="idtransaksi" value="<?php echo $transaksi->idtransaksi +1; ?>">
              <?php endforeach; ?>
              <div class="card-body">
              <div class="row">
              <div class="col-2"><th>Id Barang</th></div>
              <div class="col-2"><th>Nama Barang</th></div>
              <div class="col-2"><th>Jumlah Barang</th></div>
              <div class="col-2"><th>Harga Satuan</th></div>
              <div class="col"><th>Total </th></div>
              <div class="col"><th>Harga Beli </th></div>
              <div class="col"><th>Total Harga Beli </th></div>
              <input class="btn btn-success" type="submit" onclick="return confirm('Apakah Anda Yakin Ingin Menyimpan Data Ini ?');" name="btn" value="Simpan" />
                </div> 
                <?php foreach ($sementara as $sementara): ?>
                <div class="row">
                  <div class="col-2">
                  <input type="text" class="form-control" value="<?php echo $sementara->idbarang?>" name="idbarang[]" readonly>
                  </div>
                  <div class="col-2">
                    <input type="text" class="form-control" value="<?php echo $sementara->nama?>" name="nama[]" readonly>
                  </div>
                  <div class="col-2">
                    <input type="text" class="form-control" value="<?php echo $sementara->jumlah?>" name="jumlah[]" readonly>
                  </div>
                  <div class="col-2">
                    <input type="number" class="form-control" value="<?php echo $sementara->satuan?>" name="satuan[]" readonly>
                  </div>
                  <div class="col">
                    <input type="text" class="form-control" value="<?php echo $sementara->total?>" name="total[]" readonly>
                  </div>
                  <div class="col">
                    <input type="text" class="form-control" value="<?php echo $sementara->hargabeli?>" name="hargabeli[]" readonly>
                  </div>
                  <div class="col">
                    <input type="text" class="form-control" value="<?php echo $sementara->totalbeli?>" name="totalbeli[]" readonly>
                  </div>
                  <a href="<?php echo site_url('transaksi/deletesementara/'.$sementara->idsementara) ?>"
                    onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?');" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                </div>
                <?php endforeach; ?>
              </div>
              </form>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#idbarang').change(function(){
            var id=$(this).val();
            //console.log({ idbarang: idbarang.value })
            $.ajax({
                url : "<?php echo site_url('transaksi/isibarang');?>",
                method : "POST",
                data : {idbarang: idbarang.value},
                async : false,
                dataType : 'json',
                //processData: false,
                success: function(data){
                    // var i;
                    console.log(data)
                    $('#nama').val(data.nama);
                    $('#harga').val(data.harga);
                    $('#hargabeli').val(data.hargabeli);
                }
            });
        });
    });
  </script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>
<script>
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
<script>
function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}
</script>
