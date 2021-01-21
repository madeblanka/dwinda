<?php $this->load->view("_partials/head.php") ?>
<?php $this->load->view("_partials/sidebar.php") ?>
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Kategori</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Kategori</li>
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
              <form action="<?php echo site_url('kategori/add') ?>" method="post" enctype="multipart/form-data" >
              <div class="card-header">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Kode Kategori</label>
                    <input type="number" class="form-control" name="idkategori" id="exampleFormControlInput1" placeholder="00000" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Nama kategori</label>
                    <input type="text" class="form-control" name="kategori" id="exampleFormControlInput1" placeholder="contoh : makanan" required>
                  </div>
                  <div class="form-group">
                                <label for="exampleFormControlSelect1">Status</label>
                                <select class="form-control" name="status" id="exampleFormControlSelect1">
                                  <option value="Aktif">Aktif</option>
                                  <option value="Non-Aktif">Non Aktif</option>
                                </select>
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
