<?php $this->load->view("_partials/head.php") ?>
<?php $this->load->view("_partials/sidebar.php") ?>
<div class="content-wrapper">
<section class="content">
      <div class="container-fluid">
    <div class="row">
              <!-- /.card-header -->
              <script type="text/javascript" src="<?php echo base_url().'chart.min.js'?>"></script>
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
    <!-- /.content -->
    </div><!-- /.container-fluid -->
    </section>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg==" crossorigin="anonymous"></script>
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
  