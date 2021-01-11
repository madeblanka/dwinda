<?php $this->load->view("_partials/head.php") ?>
<?php $this->load->view("_partials/sidebar.php") ?>
<script type="text/javascript" src="<?php echo base_url().'chart.min.js'?>"></script>
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
     <!-- Main content -->
     <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $this->Transaksi_model->hitungtotaltransaksi(); ?></h3>
                <p>Total Transaksi Tahun 2020</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php foreach ($totallaba as $totallaba): ?><?php echo $totallaba->laba;?><?php endforeach?><sup style="font-size: 20px"></sup></h3>
                <p>Total Penghasilan Bersih Tahun 2020</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $this->Transaksi_model->totaluser(); ?></h3>
                <p>Total User Keseluruhan</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $this->Transaksi_model->totalkategori(); ?></h3>
                <p>Total Kategori</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  Tabel Transaksi
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table id="myTable" class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID Transaksi</th>
                      <th>Tanggal/Bulan/Tahun</th>
                      <th>Total Penjualan</th>
                      <th>Laba Penjualan</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <?php foreach ($transaksi as $transaksi): ?>
                  <tbody id="myTable">
                      <tr>
                          <td><?php echo $transaksi->idtransaksi?></td>
                          <td><?php $a = $transaksi->tanggal; echo date('d/m/Y H:i:s',strtotime($a));?></td>
                          <td><?php echo $transaksi->jumlah?></td>
                          <td><?php echo $transaksi->laba?></td>
                          <td> 

                          <a href="<?php echo site_url('detail/index/'.$transaksi->idtransaksi) ?>"
                          href="#!" class="btn btn-small text-info"><i class="fas fa-search"></i> Detail</a>

                          <a href="<?php echo site_url('transaksi/print/'.$transaksi->idtransaksi) ?>"
                          href="#!" class="btn btn-small text-secondary"><i class="fas fa-copy"></i> Print</a>
                          </td>
                      </tr>
                <?php endforeach?>
                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <button type="button" class="btn btn-info float-right"><i class="fas fa-plus"></i> Add item</button>
              </div>
            </div>
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">
            <!-- solid sales graph -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Grafik Transaksi 
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart"
                       style="position: relative; height: 300px;">
                       
                        <canvas id="myChart" width="100%" height="50"></canvas>
                        <script>
                        var ctx = document.getElementById('myChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels:  ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November','Desember'],
                                datasets: [{
                              
                                    label: 'Grafik Data Transaksi',
                                    data: [
                              <?= $this->Transaksi_model->carigrafik('2020-01');?>,
                              <?= $this->Transaksi_model->carigrafik('2020-02');?>,
                              <?= $this->Transaksi_model->carigrafik('2020-03');?>,
                              <?= $this->Transaksi_model->carigrafik('2020-04');?>,
                              <?= $this->Transaksi_model->carigrafik('2020-05');?>,
                              <?= $this->Transaksi_model->carigrafik('2020-06');?>,
                              <?= $this->Transaksi_model->carigrafik('2020-07');?>,
                              <?= $this->Transaksi_model->carigrafik('2020-08');?>,
                              <?= $this->Transaksi_model->carigrafik('2020-09');?>,
                              <?= $this->Transaksi_model->carigrafik('2020-10');?>,
                              <?= $this->Transaksi_model->carigrafik('2020-11');?>,
                              <?= $this->Transaksi_model->carigrafik('2020-12');?>,],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)',
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)',
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                      </script>                        
                   </div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                    <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>                         
                  </div>  
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- Calendar -->
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
    <!-- /.content -->
</div>
<?php $this->load->view("_partials/footer.php") ?>

