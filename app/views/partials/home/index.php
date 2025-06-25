<?php 
$page_id = null;
$comp_model = new SharedController;
$current_page = $this->set_current_page_link();
?>
<div>
    <div  class="bg-light p-3 mb-3">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <h4 >Jumlah Kunjungan Siswa di UKS BMD</h4>
                </div>
            </div>
        </div>
    </div>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-3 col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_kunjunganuks();  ?>
                    <a class="animated zoomIn record-count card bg-light text-dark"  href="<?php print_link("kunjungan_uks/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-globe"></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Kunjungan UKS</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-sm-6 comp-grid">
                    <div class="bg-light">
                        <?php 
                        $chartdata = $comp_model->doughnutchart_kunjunganuksberdasarkangender();
                        ?>
                        <div>
                            <h4>Kunjungan UKS berdasarkan gender</h4>
                            <small class="text-muted"></small>
                        </div>
                        <hr />
                        <canvas id="doughnutchart_kunjunganuksberdasarkangender"></canvas>
                        <script>
                            $(function (){
                            var chartData = {
                            labels : <?php echo json_encode($chartdata['labels']); ?>,
                            datasets : [
                            {
                            label: 'Gender',
                            // XCUSTOMCODE
                            backgroundColor: ['#007bff', '#e83e8c'],
                            borderWidth:3,
                            data : <?php echo json_encode($chartdata['datasets'][0]); ?>,
                            }
                            ]
                            }
                            var ctx = document.getElementById('doughnutchart_kunjunganuksberdasarkangender');
                            var chart = new Chart(ctx, {
                            type:'doughnut',
                            data: chartData,
                            options: {
                            responsive: true,
                            scales: {
                            yAxes: [{
                            ticks:{display: false},
                            gridLines:{display: false},
                            scaleLabel: {
                            display: true,
                            labelString: ""
                            }
                            }],
                            xAxes: [{
                            ticks:{display: false},
                            gridLines:{display: false},
                            scaleLabel: {
                            display: true,
                            labelString: ""
                            }
                            }],
                            },
                            }
                            ,
                            })});
                        </script>
                    </div>
                </div>
                <div class="col-md-6 comp-grid">
                    <div class="card card-body">
                        <?php 
                        $chartdata = $comp_model->piechart_kunjunganuksberdasarkankelompok();
                        ?>
                        <div>
                            <h4>Kunjungan UKS berdasarkan kelompok</h4>
                            <small class="text-muted"></small>
                        </div>
                        <hr />
                        <canvas id="piechart_kunjunganuksberdasarkankelompok"></canvas>
                        <script>
                            $(function (){
                            var chartData = {
                            labels : <?php echo json_encode($chartdata['labels']); ?>,
                            datasets : [
                            {
                            label: 'Dataset 1',
                            // XCUSTOMCODE
                            backgroundColor:[ 'rgb(54, 229, 235)', 'rgb(33, 122, 182)', 'rgb(188, 50, 223)' ],
                            borderWidth:3,
                            data : <?php echo json_encode($chartdata['datasets'][0]); ?>,
                            }
                            ]
                            }
                            var ctx = document.getElementById('piechart_kunjunganuksberdasarkankelompok');
                            var chart = new Chart(ctx, {
                            type:'pie',
                            data: chartData,
                            options: {
                            responsive: true,
                            scales: {
                            yAxes: [{
                            ticks:{display: false},
                            gridLines:{display: false},
                            scaleLabel: {
                            display: true,
                            labelString: ""
                            }
                            }],
                            xAxes: [{
                            ticks:{display: false},
                            gridLines:{display: false},
                            scaleLabel: {
                            display: true,
                            labelString: ""
                            }
                            }],
                            },
                            }
                            ,
                            })});
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                </div>
                <div class="col-sm-8 comp-grid">
                    <div class="card card-body">
                        <?php 
                        $chartdata = $comp_model->barchart_kunjunganpertanggal();
                        ?>
                        <div>
                            <h4>Kunjungan per tanggal</h4>
                            <small class="text-muted">Bulan MEI</small>
                        </div>
                        <hr />
                        <canvas id="barchart_kunjunganpertanggal"></canvas>
                        <script>
                            $(function (){
                            var chartData = {
                            labels : <?php echo json_encode($chartdata['labels']); ?>,
                            datasets : [
                            {
                            label: 'Kunjungan per tanggal',
                            backgroundColor:'rgba(64 , 0 , 64, 0.5)',
                            type:'',
                            borderWidth:3,
                            data : <?php echo json_encode($chartdata['datasets'][0]); ?>,
                            }
                            ]
                            }
                            var ctx = document.getElementById('barchart_kunjunganpertanggal');
                            var chart = new Chart(ctx, {
                            type:'bar',
                            data: chartData,
                            options: {
                            scaleStartValue: 0,
                            responsive: true,
                            scales: {
                            xAxes: [{
                            ticks:{display: true},
                            gridLines:{display: true},
                            categoryPercentage: 1.0,
                            barPercentage: 0.8,
                            scaleLabel: {
                            display: true,
                            labelString: ""
                            },
                            }],
                            yAxes: [{
                            ticks: {
                            beginAtZero: true,
                            display: true
                            },
                            scaleLabel: {
                            display: true,
                            labelString: ""
                            }
                            }]
                            },
                            }
                            ,
                            })});
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <div class=""><div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-sm-8 comp-grid">
                    <div class="card card-body">
                        <?php 
                        $chartdata = $comp_model->piechart_keluhan();
                        ?>
                        <div>
                            <h4>Keluhan </h4>
                            <small class="text-muted"></small>
                        </div>
                        <hr />
                        <canvas id="piechart_keluhan"></canvas>
                        <script>
                            $(function (){
                            var chartData = {
                            labels : <?php echo json_encode($chartdata['labels']); ?>,
                            datasets : [
                            {
                            label: 'Dataset 1',
                            // XCUSTOMCODE
                            backgroundColor:["#FF6384", "#36A2EB", "#FFCE56", "#4BC0C0", "#9966FF", "#FF9F40", "#E7E9ED", "#8E44AD", "#3498DB", "#1ABC9C", "#2ECC71", "#F1C40F", "#E67E22", "#E74C3C", "#ECF0F1", "#95A5A6", "#34495E", "#D35400", "#C0392B", "#7F8C8D"],
                            borderWidth:3,
                            data : <?php echo json_encode($chartdata['datasets'][0]); ?>,
                            }
                            ]
                            }
                            var ctx = document.getElementById('piechart_keluhan');
                            var chart = new Chart(ctx, {
                            type:'pie',
                            data: chartData,
                            options: {
                            responsive: true,
                            scales: {
                            yAxes: [{
                            ticks:{display: false},
                            gridLines:{display: false},
                            scaleLabel: {
                            display: true,
                            labelString: ""
                            }
                            }],
                            xAxes: [{
                            ticks:{display: false},
                            gridLines:{display: false},
                            scaleLabel: {
                            display: true,
                            labelString: ""
                            }
                            }],
                            },
                            }
                            ,
                            })});
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
