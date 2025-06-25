<?php
$comp_model = new SharedController;
$page_element_id = "list-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data From Controller
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_footer = $this->show_footer;
$show_pagination = $this->show_pagination;

$data = $comp_model->cek_nisn($_GET['search']);
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="list" data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if ($show_header == true) {
    ?>
        <div class="bg-light p-3 mb-3">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col ">
                        <h4 class="record-title">Cek Nisn</h4>
                    </div>

                    <div class="col-sm-4 ">
                        <form class="search" method="get">
                            <div class="input-group">
                                <input value="<?php echo get_value('search'); ?>" class="form-control" type="text" name="search" placeholder="Search" />
                                <div class="input-group-append">
                                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <div>
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <div class=" animated fadeIn page-content">
                        <div id="cek_nisn-list-records">


                            <div class="container my-5">
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <h2 class="mb-4">Hasil Pencarian NISN: <strong><?= htmlspecialchars($_GET['search']) ?></strong></h2>
                                    <script>
                                        function cetak(){
                                            window.print()
                                        }
                                    </script>
                                    <button onclick="cetak()" class="btn">cetak</button>
                                </div>

                                <!-- Peserta UKS -->
                                <?php if (!empty($data['peserta_uks'])): ?>
                                    <div class="card mb-4">
                                        <div class="card-header bg-info text-white"><strong>Peserta UKS</strong></div>
                                        <div class="card-body table-responsive">
                                            <table class="table table-bordered table-striped table-hover">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <?php foreach (array_keys($data['peserta_uks'][0]) as $key): ?>
                                                            <th><?= htmlspecialchars($key) ?></th>
                                                        <?php endforeach; ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($data['peserta_uks'] as $row): ?>
                                                        <tr>
                                                            <?php foreach ($row as $val): ?>
                                                                <td><?= htmlspecialchars($val) ?></td>
                                                            <?php endforeach; ?>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <!-- Peserta SMP -->
                                <?php if (!empty($data['peserta_smp'])): ?>
                                    <div class="card mb-4">
                                        <div class="card-header bg-info text-white"><strong>Peserta SMP</strong></div>
                                        <div class="card-body table-responsive">
                                            <?php foreach ($data['peserta_smp'] as $row): ?>
                                                <table class="table table-bordered table-striped table-hover w-100 mb-4">
                                                    <tbody>
                                                        <?php foreach ($row as $key => $val): ?>
                                                            <tr>
                                                                <th class="bg-light" style="width: 30%;"><?= htmlspecialchars($key) ?></th>
                                                                <td><?= htmlspecialchars($val) ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>


                                <!-- Peserta SMA -->
                                <?php if (!empty($data['peserta_sma'])): ?>
                                    <div class="card mb-4">
                                        <div class="card-header bg-info text-white"><strong>Peserta SMA</strong></div>
                                        <div class="card-body table-responsive">
                                            <?php foreach ($data['peserta_sma'] as $row): ?>
                                                <table class="table table-bordered table-striped table-hover w-100 mb-4">
                                                    <tbody>
                                                        <?php foreach ($row as $key => $val): ?>
                                                            <tr>
                                                                <th class="bg-light" style="width: 30%;"><?= htmlspecialchars($key) ?></th>
                                                                <td><?= htmlspecialchars($val) ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>



                                <!-- MCU Tahunan -->
                                <?php if (!empty($data['mcu_tahunan'])): ?>
                                    <div class="card mb-4">
                                        <div class="card-header bg-success text-white"><strong>MCU Tahunan</strong></div>
                                        <div class="card-body table-responsive">
                                            <table class="table table-bordered table-striped table-hover">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <?php foreach (array_keys($data['mcu_tahunan'][0]) as $key): ?>
                                                            <th><?= htmlspecialchars($key) ?></th>
                                                        <?php endforeach; ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($data['mcu_tahunan'] as $row): ?>
                                                        <tr>
                                                            <?php foreach ($row as $val): ?>
                                                                <td>
                                                                    <?php if (filter_var($val, FILTER_VALIDATE_URL)): ?>
                                                                        <a href="<?= htmlspecialchars($val) ?>" target="_blank">Lihat File</a>
                                                                    <?php else: ?>
                                                                        <?= htmlspecialchars($val) ?>
                                                                    <?php endif; ?>
                                                                </td>
                                                            <?php endforeach; ?>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <!-- Kunjungan UKS -->
                                <?php if (!empty($data['kunjungan_uks'])): ?>
                                    <div class="card mb-4">
                                        <div class="card-header bg-success text-white"><strong>Kunjungan UKS</strong></div>
                                        <div class="card-body table-responsive">
                                            <table class="table table-bordered table-striped table-hover">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <?php foreach (array_keys($data['kunjungan_uks'][0]) as $key): ?>
                                                            <th><?= htmlspecialchars($key) ?></th>
                                                        <?php endforeach; ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($data['kunjungan_uks'] as $row): ?>
                                                        <tr>
                                                            <?php foreach ($row as $val): ?>
                                                                <td><?= htmlspecialchars($val) ?></td>
                                                            <?php endforeach; ?>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <!--  -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>