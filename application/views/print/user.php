<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Print User</title>
      <link rel="stylesheet" href="<?php echo base_url() ?>admin/style.css"/>


</head>

<body>

  <div class="caption">Data User</div>
<div id="table">
	<div class="header-row row">
    <span class="cell primary">ID User</span>
    <span class="cell">Username</span>
    <span class="cell">Nama</span>
    <span class="cell">Jabatan</span>
  </div>
	<?php foreach ($user as $user): ?>
  <div class="row">
	<input type="radio" name="expand">
    <span class="cell primary" data-label="ID user"><?php echo $user->iduser ?></span>
    <span class="cell" data-label="Username"><?php echo $user->username ?></span>
    <span class="cell" data-label="Nama"><?php echo $user->nama ?></span>
    <span class="cell" data-label="Jabatan"><?php echo $user->jabatan ?></span>
  </div>
  <?php endforeach; ?>
</div>
<script>
  window.print();
</script>

</body>

</html>
