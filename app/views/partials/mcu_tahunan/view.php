<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("mcu_tahunan/add");
$can_edit = ACL::is_allowed("mcu_tahunan/edit");
$can_view = ACL::is_allowed("mcu_tahunan/view");
$can_delete = ACL::is_allowed("mcu_tahunan/delete");
?>
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
                    <h4 class="record-title">View  Mcu Tahunan</h4>
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
                        $rec_id = (!empty($data['id_mcu']) ? urlencode($data['id_mcu']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr  class="td-id_mcu">
                                        <th class="title"> Id Mcu: </th>
                                        <td class="value">
                                            <a size="sm" class="btn btn-sm btn-primary page-modal" href="<?php print_link("kunjungan_uks/list/NISN/" . urlencode($data['NISN'])) ?>">
                                                <i class="fa fa-eye"></i> <?php echo $data['id_mcu'] ?>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr  class="td-NISN">
                                        <th class="title"> Nisn: </th>
                                        <td class="value">
                                            <a size="sm" class="btn btn-sm btn-primary page-modal" href="<?php print_link("kunjungan_uks/list/NISN/" . urlencode($data['NISN'])) ?>">
                                                <i class="fa fa-eye"></i> <?php echo $data['NISN'] ?>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr  class="td-Nama">
                                        <th class="title"> Nama: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['Nama']; ?>" 
                                                data-pk="<?php echo $data['id_mcu'] ?>" 
                                                data-url="<?php print_link("mcu_tahunan/editfield/" . urlencode($data['id_mcu'])); ?>" 
                                                data-name="Nama" 
                                                data-title="Enter Nama" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['Nama']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Kelas">
                                        <th class="title"> Kelas: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['Kelas']; ?>" 
                                                data-pk="<?php echo $data['id_mcu'] ?>" 
                                                data-url="<?php print_link("mcu_tahunan/editfield/" . urlencode($data['id_mcu'])); ?>" 
                                                data-name="Kelas" 
                                                data-title="Enter Kelas" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['Kelas']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Tanggal">
                                        <th class="title"> Tanggal: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['Tanggal']; ?>" 
                                                data-pk="<?php echo $data['id_mcu'] ?>" 
                                                data-url="<?php print_link("mcu_tahunan/editfield/" . urlencode($data['id_mcu'])); ?>" 
                                                data-name="Tanggal" 
                                                data-title="Enter Tanggal" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['Tanggal']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-TB">
                                        <th class="title"> Tb: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['TB']; ?>" 
                                                data-pk="<?php echo $data['id_mcu'] ?>" 
                                                data-url="<?php print_link("mcu_tahunan/editfield/" . urlencode($data['id_mcu'])); ?>" 
                                                data-name="TB" 
                                                data-title="Enter Tb" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['TB']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-BB">
                                        <th class="title"> Bb: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['BB']; ?>" 
                                                data-pk="<?php echo $data['id_mcu'] ?>" 
                                                data-url="<?php print_link("mcu_tahunan/editfield/" . urlencode($data['id_mcu'])); ?>" 
                                                data-name="BB" 
                                                data-title="Enter Bb" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['BB']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Goldar">
                                        <th class="title"> Goldar: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['Goldar']; ?>" 
                                                data-pk="<?php echo $data['id_mcu'] ?>" 
                                                data-url="<?php print_link("mcu_tahunan/editfield/" . urlencode($data['id_mcu'])); ?>" 
                                                data-name="Goldar" 
                                                data-title="Enter Goldar" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['Goldar']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Anggota_tubuh">
                                        <th class="title"> Anggota Tubuh: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['Anggota_tubuh']; ?>" 
                                                data-pk="<?php echo $data['id_mcu'] ?>" 
                                                data-url="<?php print_link("mcu_tahunan/editfield/" . urlencode($data['id_mcu'])); ?>" 
                                                data-name="Anggota_tubuh" 
                                                data-title="Enter Anggota Tubuh" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['Anggota_tubuh']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Masalah">
                                        <th class="title"> Masalah: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['Masalah']; ?>" 
                                                data-pk="<?php echo $data['id_mcu'] ?>" 
                                                data-url="<?php print_link("mcu_tahunan/editfield/" . urlencode($data['id_mcu'])); ?>" 
                                                data-name="Masalah" 
                                                data-title="Enter Masalah" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['Masalah']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Riwayat_kesehatan">
                                        <th class="title"> Riwayat Kesehatan: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['Riwayat_kesehatan']; ?>" 
                                                data-pk="<?php echo $data['id_mcu'] ?>" 
                                                data-url="<?php print_link("mcu_tahunan/editfield/" . urlencode($data['id_mcu'])); ?>" 
                                                data-name="Riwayat_kesehatan" 
                                                data-title="Enter Riwayat Kesehatan" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['Riwayat_kesehatan']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Jenis_Kelamin">
                                        <th class="title"> Jenis Kelamin: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['Jenis_Kelamin']; ?>" 
                                                data-pk="<?php echo $data['id_mcu'] ?>" 
                                                data-url="<?php print_link("mcu_tahunan/editfield/" . urlencode($data['id_mcu'])); ?>" 
                                                data-name="Jenis_Kelamin" 
                                                data-title="Enter Jenis Kelamin" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['Jenis_Kelamin']; ?> 
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
                                                <?php if($can_edit){ ?>
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("mcu_tahunan/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <?php } ?>
                                                <?php if($can_delete){ ?>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("mcu_tahunan/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                    <i class="fa fa-times"></i> Delete
                                                </a>
                                                <?php } ?>
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
