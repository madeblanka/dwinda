<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Print Barang</title>
      <link rel="stylesheet" href="<?php echo base_url() ?>admin/style.css"/>
</head>
<body>
  <div class="caption">Data Barang</div>
<div id="table">
	<div class="header-row row">
    <span class="cell primary">ID Barang</span>
    <span class="cell">Nama Barang</span>
    <span class="cell">Harga Jual</span>
    <span class="cell">Harga Beli</span>
  </div>
	<?php foreach ($barang as $barang): ?>
  <div class="row">
	<input type="radio" name="expand">
    <span class="cell primary" data-label="ID Barang"><?php echo $barang->idbarang ?></span>
    <span class="cell" data-label="Nama"><?php echo $barang->nama ?></span>
    <span class="cell" data-label="Harga"><?php echo $barang->harga ?></span>
    <span class="cell" data-label="Hargabeli"><?php echo $barang->hargabeli ?></span>
  </div>
  <?php endforeach; ?>
</div>
<script>
  window.print();
</script>

</body>

</html>
