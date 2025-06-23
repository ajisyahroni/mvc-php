<?php
$comp_model = new SharedController;
$page_element_id = "view-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data Information from Controller
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id; //Page id from url
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_edit_btn = $this->show_edit_btn;
$show_delete_btn = $this->show_delete_btn;
$show_export_btn = $this->show_export_btn;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="view"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">View  Obat</h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="card animated fadeIn page-content">
                        <?php
                        $counter = 0;
                        if(!empty($data)){
                        $rec_id = (!empty($data['id_obat']) ? urlencode($data['id_obat']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr  class="td-id_obat">
                                        <th class="title"> Id Obat: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['id_obat']; ?>" 
                                                data-pk="<?php echo $data['id_obat'] ?>" 
                                                data-url="<?php print_link("obat/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="id_obat" 
                                                data-title="Enter Id Obat" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['id_obat']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Nama_Obat">
                                        <th class="title"> Nama Obat: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['Nama_Obat']; ?>" 
                                                data-pk="<?php echo $data['id_obat'] ?>" 
                                                data-url="<?php print_link("obat/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="Nama_Obat" 
                                                data-title="Enter Nama Obat" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['Nama_Obat']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Jumlah">
                                        <th class="title"> Jumlah: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['Jumlah']; ?>" 
                                                data-pk="<?php echo $data['id_obat'] ?>" 
                                                data-url="<?php print_link("obat/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="Jumlah" 
                                                data-title="Enter Jumlah" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['Jumlah']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Asal">
                                        <th class="title"> Asal: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['Asal']; ?>" 
                                                data-pk="<?php echo $data['id_obat'] ?>" 
                                                data-url="<?php print_link("obat/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="Asal" 
                                                data-title="Enter Asal" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['Asal']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Tgl_masuk">
                                        <th class="title"> Tgl Masuk: </th>
                                        <td class="value">
                                            <span  data-flatpickr="{ enableTime: false, minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['Tgl_masuk']; ?>" 
                                                data-pk="<?php echo $data['id_obat'] ?>" 
                                                data-url="<?php print_link("obat/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="Tgl_masuk" 
                                                data-title="Enter Tgl Masuk" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['Tgl_masuk']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Tgl_EXP">
                                        <th class="title"> Tgl Exp: </th>
                                        <td class="value">
                                            <span  data-flatpickr="{ enableTime: false, minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['Tgl_EXP']; ?>" 
                                                data-pk="<?php echo $data['id_obat'] ?>" 
                                                data-url="<?php print_link("obat/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="Tgl_EXP" 
                                                data-title="Enter Tgl Exp" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['Tgl_EXP']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                                <!-- Table Body End -->
                            </table>
                        </div>
                        <div class="p-3 d-flex">
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
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("obat/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("obat/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                    <i class="fa fa-times"></i> Delete
                                                </a>
                                            </div>
                                            <?php
                                            }
                                            else{
                                            ?>
                                            <!-- Empty Record Message -->
                                            <div class="text-muted p-3">
                                                <i class="fa fa-ban"></i> No Record Found
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
