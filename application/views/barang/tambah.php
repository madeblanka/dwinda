<?php $this->load->view("_partials/head.php") ?>
<?php $this->load->view("_partials/sidebar.php") ?>
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Barang</li>
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
              <form action="<?php echo site_url('barang/add') ?>" method="post" enctype="multipart/form-data" >
              <div class="card-header">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Kode Barang</label>
                    <input type="number" class="form-control" name="idbarang" id="exampleFormControlInput1" placeholder="00000" required>
                  </div>
                  <div class="form-group">
								  <label for="name">Id Kategori</label>
								    <select name="idkategori">
									 <optgroup class="form-control" label="(empty)">
                     <?php foreach ($kategori as $kategori):?>
                     <option value="<?php echo $kategori->idkategori?>"><?php echo $kategori->kategori?> </option>
                     <?php endforeach?>
									 </optgroup>
                   </select>
                   </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Nama Barang</label>
                    <input type="text" class="form-control" name="nama" id="exampleFormControlInput1" placeholder="*****" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Harga Jual</label>
                    <input type="number" class="form-control" name="harga" id="exampleFormControlInput1" placeholder="00000" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Harga Beli</label>
                    <input type="number" class="form-control" name="hargabeli" id="exampleFormControlInput1" placeholder="00000" required>
                  </div>
                  <button type="submit" class="btn btn-outline-success" onclick="return confirm('Apakah Anda Yakin Ingin Menyimpan Data Ini ?');">Simpan</button>
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
<?php $this->load->view("_partials/footer.php") ?>
