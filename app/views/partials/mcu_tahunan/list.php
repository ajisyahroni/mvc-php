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
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="list"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container-fluid">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">MCU Tahunan</h4>
                </div>
                <div class="col-sm-3 ">
                    <a  class="btn btn btn-primary my-1" href="<?php print_link("mcu_tahunan/add") ?>">
                        <i class="fa fa-plus"></i>                              
                        Add New Mcu Tahunan 
                    </a>
                </div>
                <div class="col-sm-4 ">
                    <form  class="search" action="<?php print_link('mcu_tahunan'); ?>" method="get">
                        <div class="input-group">
                            <input value="<?php echo get_value('search'); ?>" class="form-control" type="text" name="search"  placeholder="Search" />
                                <div class="input-group-append">
                                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12 comp-grid">
                        <div class="">
                            <!-- Page bread crumbs components-->
                            <?php
                            if(!empty($field_name) || !empty($_GET['search'])){
                            ?>
                            <hr class="sm d-block d-sm-none" />
                            <nav class="page-header-breadcrumbs mt-2" aria-label="breadcrumb">
                                <ul class="breadcrumb m-0 p-1">
                                    <?php
                                    if(!empty($field_name)){
                                    ?>
                                    <li class="breadcrumb-item">
                                        <a class="text-decoration-none" href="<?php print_link('mcu_tahunan'); ?>">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <?php echo (get_value("tag") ? get_value("tag")  :  make_readable($field_name)); ?>
                                    </li>
                                    <li  class="breadcrumb-item active text-capitalize font-weight-bold">
                                        <?php echo (get_value("label") ? get_value("label")  :  make_readable(urldecode($field_value))); ?>
                                    </li>
                                    <?php 
                                    }   
                                    ?>
                                    <?php
                                    if(get_value("search")){
                                    ?>
                                    <li class="breadcrumb-item">
                                        <a class="text-decoration-none" href="<?php print_link('mcu_tahunan'); ?>">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item text-capitalize">
                                        Search
                                    </li>
                                    <li  class="breadcrumb-item active text-capitalize font-weight-bold"><?php echo get_value("search"); ?></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </nav>
                            <!--End of Page bread crumbs components-->
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
        <div  class="">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-12 comp-grid">
                        <?php $this :: display_page_errors(); ?>
                        <div  class=" animated fadeIn page-content">
                            <div id="mcu_tahunan-list-records">
                                <div id="page-report-body" class="table-responsive">
                                    <table class="table  table-striped table-sm text-left">
                                        <thead class="table-header bg-light">
                                            <tr>
                                                <th class="td-checkbox">
                                                    <label class="custom-control custom-checkbox custom-control-inline">
                                                        <input class="toggle-check-all custom-control-input" type="checkbox" />
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </th>
                                                <th class="td-sno">#</th>
                                                <th  class="td-id_mcu"> Id Mcu</th>
                                                <th  class="td-NISN"> Nisn</th>
                                                <th  class="td-Nama"> Nama</th>
                                                <th  class="td-Jenis_Kelamin"> Jenis Kelamin</th>
                                                <th  class="td-Kelas"> Kelas</th>
                                                <th  class="td-Tanggal"> Tanggal</th>
                                                <th  class="td-TB"> Tb</th>
                                                <th  class="td-BB"> Bb</th>
                                                <th  class="td-Goldar"> Goldar</th>
                                                <th  class="td-Kepala"> Kepala</th>
                                                <th  class="td-Thorax"> Thorax</th>
                                                <th  class="td-Abdomen"> Abdomen</th>
                                                <th  class="td-Extremitas"> Extremitas</th>
                                                <th  class="td-Luka_terbuka"> Luka Terbuka</th>
                                                <th  class="td-Patah_tulang"> Patah Tulang</th>
                                                <th  class="td-Masalah"> Masalah</th>
                                                <th  class="td-Riwayat_kesehatan"> Riwayat Kesehatan</th>
                                                <th  class="td-Hasil_penunjang"> Hasil Penunjang</th>
                                                <th class="td-btn"></th>
                                            </tr>
                                        </thead>
                                        <?php
                                        if(!empty($records)){
                                        ?>
                                        <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                            <!--record-->
                                            <?php
                                            $counter = 0;
                                            foreach($records as $data){
                                            $rec_id = (!empty($data['id_mcu']) ? urlencode($data['id_mcu']) : null);
                                            $counter++;
                                            ?>
                                            <tr>
                                                <th class=" td-checkbox">
                                                    <label class="custom-control custom-checkbox custom-control-inline">
                                                        <input class="optioncheck custom-control-input" name="optioncheck[]" value="<?php echo $data['id_mcu'] ?>" type="checkbox" />
                                                            <span class="custom-control-label"></span>
                                                        </label>
                                                    </th>
                                                    <th class="td-sno"><?php echo $counter; ?></th>
                                                    <td class="td-id_mcu"><a href="<?php print_link("mcu_tahunan/view/$data[id_mcu]") ?>"><?php echo $data['id_mcu']; ?></a></td>
                                                    <td class="td-NISN">
                                                        <span  data-source='<?php print_link('api/json/mcu_tahunan_NISN_option_list'); ?>' 
                                                            data-value="<?php echo $data['NISN']; ?>" 
                                                            data-pk="<?php echo $data['id_mcu'] ?>" 
                                                            data-url="<?php print_link("mcu_tahunan/editfield/" . urlencode($data['id_mcu'])); ?>" 
                                                            data-name="NISN" 
                                                            data-title="Enter Nisn" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['NISN']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-Nama">
                                                        <span  data-value="<?php echo $data['Nama']; ?>" 
                                                            data-pk="<?php echo $data['id_mcu'] ?>" 
                                                            data-url="<?php print_link("mcu_tahunan/editfield/" . urlencode($data['id_mcu'])); ?>" 
                                                            data-name="Nama" 
                                                            data-title="Enter Nama" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['Nama']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-Jenis_Kelamin">
                                                        <span  data-value="<?php echo $data['Jenis_Kelamin']; ?>" 
                                                            data-pk="<?php echo $data['id_mcu'] ?>" 
                                                            data-url="<?php print_link("mcu_tahunan/editfield/" . urlencode($data['id_mcu'])); ?>" 
                                                            data-name="Jenis_Kelamin" 
                                                            data-title="Enter Jenis Kelamin" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['Jenis_Kelamin']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-Kelas">
                                                        <span  data-value="<?php echo $data['Kelas']; ?>" 
                                                            data-pk="<?php echo $data['id_mcu'] ?>" 
                                                            data-url="<?php print_link("mcu_tahunan/editfield/" . urlencode($data['id_mcu'])); ?>" 
                                                            data-name="Kelas" 
                                                            data-title="Enter Kelas" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['Kelas']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-Tanggal">
                                                        <span  data-value="<?php echo $data['Tanggal']; ?>" 
                                                            data-pk="<?php echo $data['id_mcu'] ?>" 
                                                            data-url="<?php print_link("mcu_tahunan/editfield/" . urlencode($data['id_mcu'])); ?>" 
                                                            data-name="Tanggal" 
                                                            data-title="Enter Tanggal" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['Tanggal']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-TB">
                                                        <span  data-value="<?php echo $data['TB']; ?>" 
                                                            data-pk="<?php echo $data['id_mcu'] ?>" 
                                                            data-url="<?php print_link("mcu_tahunan/editfield/" . urlencode($data['id_mcu'])); ?>" 
                                                            data-name="TB" 
                                                            data-title="Enter Tb" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['TB']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-BB">
                                                        <span  data-value="<?php echo $data['BB']; ?>" 
                                                            data-pk="<?php echo $data['id_mcu'] ?>" 
                                                            data-url="<?php print_link("mcu_tahunan/editfield/" . urlencode($data['id_mcu'])); ?>" 
                                                            data-name="BB" 
                                                            data-title="Enter Bb" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['BB']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-Goldar">
                                                        <span  data-value="<?php echo $data['Goldar']; ?>" 
                                                            data-pk="<?php echo $data['id_mcu'] ?>" 
                                                            data-url="<?php print_link("mcu_tahunan/editfield/" . urlencode($data['id_mcu'])); ?>" 
                                                            data-name="Goldar" 
                                                            data-title="Enter Goldar" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['Goldar']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-Kepala">
                                                        <span  data-source='<?php echo json_encode_quote(Menu :: $Kepala); ?>' 
                                                            data-value="<?php echo $data['Kepala']; ?>" 
                                                            data-pk="<?php echo $data['id_mcu'] ?>" 
                                                            data-url="<?php print_link("mcu_tahunan/editfield/" . urlencode($data['id_mcu'])); ?>" 
                                                            data-name="Kepala" 
                                                            data-title="Enter Kepala" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="radiolist" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['Kepala']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-Thorax">
                                                        <span  data-source='<?php echo json_encode_quote(Menu :: $Kepala); ?>' 
                                                            data-value="<?php echo $data['Thorax']; ?>" 
                                                            data-pk="<?php echo $data['id_mcu'] ?>" 
                                                            data-url="<?php print_link("mcu_tahunan/editfield/" . urlencode($data['id_mcu'])); ?>" 
                                                            data-name="Thorax" 
                                                            data-title="Enter Thorax" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="radiolist" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['Thorax']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-Abdomen">
                                                        <span  data-source='<?php echo json_encode_quote(Menu :: $Kepala); ?>' 
                                                            data-value="<?php echo $data['Abdomen']; ?>" 
                                                            data-pk="<?php echo $data['id_mcu'] ?>" 
                                                            data-url="<?php print_link("mcu_tahunan/editfield/" . urlencode($data['id_mcu'])); ?>" 
                                                            data-name="Abdomen" 
                                                            data-title="Enter Abdomen" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="radiolist" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['Abdomen']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-Extremitas">
                                                        <span  data-source='<?php echo json_encode_quote(Menu :: $Kepala); ?>' 
                                                            data-value="<?php echo $data['Extremitas']; ?>" 
                                                            data-pk="<?php echo $data['id_mcu'] ?>" 
                                                            data-url="<?php print_link("mcu_tahunan/editfield/" . urlencode($data['id_mcu'])); ?>" 
                                                            data-name="Extremitas" 
                                                            data-title="Enter Extremitas" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="radiolist" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['Extremitas']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-Luka_terbuka">
                                                        <span  data-source='<?php echo json_encode_quote(Menu :: $Luka_terbuka); ?>' 
                                                            data-value="<?php echo $data['Luka_terbuka']; ?>" 
                                                            data-pk="<?php echo $data['id_mcu'] ?>" 
                                                            data-url="<?php print_link("mcu_tahunan/editfield/" . urlencode($data['id_mcu'])); ?>" 
                                                            data-name="Luka_terbuka" 
                                                            data-title="Enter Luka Terbuka" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="radiolist" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['Luka_terbuka']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-Patah_tulang">
                                                        <span  data-source='<?php echo json_encode_quote(Menu :: $Luka_terbuka); ?>' 
                                                            data-value="<?php echo $data['Patah_tulang']; ?>" 
                                                            data-pk="<?php echo $data['id_mcu'] ?>" 
                                                            data-url="<?php print_link("mcu_tahunan/editfield/" . urlencode($data['id_mcu'])); ?>" 
                                                            data-name="Patah_tulang" 
                                                            data-title="Enter Patah Tulang" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="radiolist" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['Patah_tulang']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-Masalah">
                                                        <span  data-value="<?php echo $data['Masalah']; ?>" 
                                                            data-pk="<?php echo $data['id_mcu'] ?>" 
                                                            data-url="<?php print_link("mcu_tahunan/editfield/" . urlencode($data['id_mcu'])); ?>" 
                                                            data-name="Masalah" 
                                                            data-title="Enter Masalah" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['Masalah']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-Riwayat_kesehatan">
                                                        <span  data-value="<?php echo $data['Riwayat_kesehatan']; ?>" 
                                                            data-pk="<?php echo $data['id_mcu'] ?>" 
                                                            data-url="<?php print_link("mcu_tahunan/editfield/" . urlencode($data['id_mcu'])); ?>" 
                                                            data-name="Riwayat_kesehatan" 
                                                            data-title="Enter Riwayat Kesehatan" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['Riwayat_kesehatan']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-Hasil_penunjang">
                                                        <span  data-value="<?php echo $data['Hasil_penunjang']; ?>" 
                                                            data-pk="<?php echo $data['id_mcu'] ?>" 
                                                            data-url="<?php print_link("mcu_tahunan/editfield/" . urlencode($data['id_mcu'])); ?>" 
                                                            data-name="Hasil_penunjang" 
                                                            data-title="Browse..." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['Hasil_penunjang']; ?> 
                                                        </span>
                                                    </td>
                                                    <th class="td-btn">
                                                        <a class="btn btn-sm btn-success has-tooltip" title="View Record" href="<?php print_link("mcu_tahunan/view/$rec_id"); ?>">
                                                            <i class="fa fa-eye"></i> View
                                                        </a>
                                                        <a class="btn btn-sm btn-info has-tooltip" title="Edit This Record" href="<?php print_link("mcu_tahunan/edit/$rec_id"); ?>">
                                                            <i class="fa fa-edit"></i> Edit
                                                        </a>
                                                        <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("mcu_tahunan/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                            <i class="fa fa-times"></i>
                                                            Delete
                                                        </a>
                                                    </th>
                                                </tr>
                                                <?php 
                                                }
                                                ?>
                                                <!--endrecord-->
                                            </tbody>
                                            <tbody class="search-data" id="search-data-<?php echo $page_element_id; ?>"></tbody>
                                            <?php
                                            }
                                            ?>
                                        </table>
                                        <?php 
                                        if(empty($records)){
                                        ?>
                                        <h4 class="bg-light text-center border-top text-muted animated bounce  p-3">
                                            <i class="fa fa-ban"></i> No record found
                                        </h4>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <?php
                                    if( $show_footer && !empty($records)){
                                    ?>
                                    <div class=" border-top mt-2">
                                        <div class="row justify-content-center">    
                                            <div class="col-md-auto justify-content-center">    
                                                <div class="p-3 d-flex justify-content-between">    
                                                    <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("mcu_tahunan/delete/{sel_ids}/?csrf_token=$csrf_token&redirect=$current_page"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
                                                        <i class="fa fa-times"></i> Delete Selected
                                                    </button>
                                                    <div class="dropup export-btn-holder mx-1">
                                                        <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-save"></i> Export
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <?php $export_print_link = $this->set_current_page_link(array('format' => 'print')); ?>
                                                            <a class="dropdown-item export-link-btn" data-format="print" href="<?php print_link($export_print_link); ?>" target="_blank">
                                                                <img src="<?php print_link('assets/images/print.png') ?>" class="mr-2" /> PRINT
                                                                </a>
                                                                <?php $export_pdf_link = $this->set_current_page_link(array('format' => 'pdf')); ?>
                                                                <a class="dropdown-item export-link-btn" data-format="pdf" href="<?php print_link($export_pdf_link); ?>" target="_blank">
                                                                    <img src="<?php print_link('assets/images/pdf.png') ?>" class="mr-2" /> PDF
                                                                    </a>
                                                                    <?php $export_word_link = $this->set_current_page_link(array('format' => 'word')); ?>
                                                                    <a class="dropdown-item export-link-btn" data-format="word" href="<?php print_link($export_word_link); ?>" target="_blank">
                                                                        <img src="<?php print_link('assets/images/doc.png') ?>" class="mr-2" /> WORD
                                                                        </a>
                                                                        <?php $export_csv_link = $this->set_current_page_link(array('format' => 'csv')); ?>
                                                                        <a class="dropdown-item export-link-btn" data-format="csv" href="<?php print_link($export_csv_link); ?>" target="_blank">
                                                                            <img src="<?php print_link('assets/images/csv.png') ?>" class="mr-2" /> CSV
                                                                            </a>
                                                                            <?php $export_excel_link = $this->set_current_page_link(array('format' => 'excel')); ?>
                                                                            <a class="dropdown-item export-link-btn" data-format="excel" href="<?php print_link($export_excel_link); ?>" target="_blank">
                                                                                <img src="<?php print_link('assets/images/xsl.png') ?>" class="mr-2" /> EXCEL
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col">   
                                                                    <?php
                                                                    if($show_pagination == true){
                                                                    $pager = new Pagination($total_records, $record_count);
                                                                    $pager->route = $this->route;
                                                                    $pager->show_page_count = true;
                                                                    $pager->show_record_count = true;
                                                                    $pager->show_page_limit =true;
                                                                    $pager->limit_count = $this->limit_count;
                                                                    $pager->show_page_number_list = true;
                                                                    $pager->pager_link_range=5;
                                                                    $pager->render();
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
