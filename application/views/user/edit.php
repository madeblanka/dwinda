<?php $this->load->view("_partials/head.php") ?>
<?php $this->load->view("_partials/sidebar.php") ?>
<div class="content-wrapper">
    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit user</h3>
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
                  <form action="<?php echo site_url('user/update') ?>" method="post" enctype="multipart/form-data" >
                    <tr>
                      <th>ID user</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Nama</th>
                      <th>Jabatan</th>
                    </tr>
                  </thead>
                  <?php foreach ($user as $user): ?>
                  <tbody id="myTable">
                      <tr>
                          <td><input type="text" name="iduser" value="<?php echo $user->iduser?>" readonly ></td>
                          <td><input type="text" name="username" value="<?php echo $user->username?>" ></td>
                          <td><input type="text" name="password" value="<?php echo $user->password?>" ></td>
                          <td><input type="text" name="nama" value="<?php echo $user->nama?>" ></td>
                          <td><input type="text" name="jabatan" value="<?php echo $user->jabatan?>" readonly ></td>
                          </td>
                          <?php endforeach?>
                      </tr>
                      <tr> <th> <button type="submit" class="btn btn-outline-success" onclick="return confirm('Apakah Anda Yakin Ingin Menyimpan Data Ini ?');">Simpan</button></th></tr>
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
  