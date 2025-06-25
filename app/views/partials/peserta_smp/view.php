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
                    <h4 class="record-title">View  Peserta SMP</h4>
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
                        $rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr  class="td-id">
                                        <th class="title"> Id: </th>
                                        <td class="value"> <?php echo $data['id']; ?></td>
                                    </tr>
                                    <tr  class="td-NISN">
                                        <th class="title"> NISN: </th>
                                        <td class="value">
                                            <a size="sm" class="btn btn-sm btn-primary page-modal" href="<?php print_link("kunjungan_uks/list/NISN/" . urlencode($data['NISN'])) ?>">
                                                <i class="fa fa-eye"></i> <?php echo $data['NISN'] ?>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr  class="td-Nama">
                                        <th class="title"> Nama: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['Nama']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("peserta_smp/editfield/" . urlencode($data['id'])); ?>" 
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
                                    </tr>
                                    <tr  class="td-Jenis_Kelamin">
                                        <th class="title"> Jenis Kelamin: </th>
                                        <td class="value">
                                            <span  data-source='<?php echo json_encode_quote(Menu :: $Jenis_Kelamin2); ?>' 
                                                data-value="<?php echo $data['Jenis_Kelamin']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("peserta_smp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="Jenis_Kelamin" 
                                                data-title="Enter Jenis Kelamin" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="radiolist" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['Jenis_Kelamin']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Kelas">
                                        <th class="title"> Kelas: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['Kelas']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("peserta_smp/editfield/" . urlencode($data['id'])); ?>" 
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
                                    </tr>
                                    <tr  class="td-TTL">
                                        <th class="title"> TTL: </th>
                                        <td class="value">
                                            <span  data-flatpickr="{ enableTime: false, minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['TTL']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("peserta_smp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="TTL" 
                                                data-title="Enter TTL" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['TTL']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Alergi">
                                        <th class="title"> Alergi: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['Alergi']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("peserta_smp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="Alergi" 
                                                data-title="Enter Alergi" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['Alergi']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Inklusi">
                                        <th class="title"> Inklusi: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['Inklusi']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("peserta_smp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="Inklusi" 
                                                data-title="Enter Inklusi" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['Inklusi']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Alamat">
                                        <th class="title"> Alamat: </th>
                                        <td class="value">
                                            <span  data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("peserta_smp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="Alamat" 
                                                data-title="Enter Alamat" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="textarea" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['Alamat']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-SA">
                                        <th class="title"> Nama SA: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['SA']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("peserta_smp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="SA" 
                                                data-title="Enter Nama SA" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['SA']; ?> 
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
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("peserta_smp/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("peserta_smp/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
