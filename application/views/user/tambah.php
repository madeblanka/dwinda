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
              <form action="<?php echo site_url('user/add') ?>" method="post" enctype="multipart/form-data" >
              <div class="card-header">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Username</label>
                    <input type="text" class="form-control" name="username" id="exampleFormControlInput1" placeholder="xxxxxx" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleFormControlInput1" placeholder="*******" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Nama</label>
                    <input type="text" class="form-control" name="nama" id="exampleFormControlInput1" placeholder="example" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Jabatan</label>
                    <select class="form-control" name="jabatan" id="exampleFormControlSelect1">
                      <option value="pegawai">Pegawai</option>
                      <option value="atasan">Eksekutif</option>
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
