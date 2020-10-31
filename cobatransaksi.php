<?php
  $idtransaksi = ['123', '123', '123'];
  $idbarang = ['2', '2', '2'];
  $namabarang = ['coba2', 'coba2', 'coba2'];
  $jumlahbarang = ['22', '1', '1'];
  $hargasatuan = ['2', '2', '2'];
  $total = ['44', '2', '2'];

  $data = array(
    'idtransaksi' => $idtransaksi,
    'idbarang' => $idbarang,
    'nama' => $namabarang,
    'jumlah' => $jumlahbarang,
    'satuan' => $hargasatuan,
    'total' => $total,
  );

  var_dump($data) ;
  echo '<br>';

  $array = [];
  for ($i = 0; $i < count($data['idtransaksi']); $i++) {
    $array[] = array(
      'idtransaksi' => $data['idtransaksi'][$i],
      'idbarang' => $data['idbarang'][$i],
      'nama' => $data['nama'][$i],
      'jumlah' => $data['jumlah'][$i],
      'satuan' => $data['satuan'][$i],
      'total' => $data['total'][$i]
    );
  }
  var_dump($array);
?>
