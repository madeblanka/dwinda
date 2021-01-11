<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Print Barang</title>
      <link rel="stylesheet" href="<?php echo base_url() ?>admin/style.css"/>
</head>
<body>
  <div class="caption"><b>ID TRANSAKSI : <?php foreach ($transaksi as $transaksi): ?> <?php echo $transaksi->idtransaksi ?><?php endforeach; ?></b></div>
<div id="table">
	<div class="header-row row">
    <span class="cell">Nama Barang</span>
    <span class="cell">Jumlah</span>
    <span class="cell">Harga Satuan</span>
    <span class="cell">Harga Total</span>
  </div>
  <div class="row">
    <?php foreach ($detail as $detail): ?>
    <span class="cell" data-label="Nama"><?php echo $detail->nama ?></span>
    <span class="cell" data-label="Jumlah"><?php echo $detail->jumlah ?></span>
    <span class="cell" data-label="Satuan"><?php echo $detail->satuan ?></span>
    <span class="cell" data-label="Total"><?php echo $detail->total ?></span>
  </div>
  <?php endforeach; ?>
  <div class="row">
  <?php foreach ($transaksi as $transaksi): ?>
  <span class="cell" data-label="Total"><?php echo $transaksi->jumlah ?></span>
  <?php endforeach; ?>
  </div>
  <div class="caption">Tanggal</div>
  <?php foreach ($transaksi as $transaksi): ?>
  <span class="cell" data-label="Total"><?php echo $transaksi->tanggal ?></span>
  <?php endforeach; ?>
</div>
<script>
  window.print();
</script>

</body>

</html>
