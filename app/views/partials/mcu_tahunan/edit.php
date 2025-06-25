<?php
$comp_model = new SharedController;
$page_element_id = "edit-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="edit"  data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Edit  MCU Tahunan</h4>
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
                <div class="col-md-7 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="bg-light p-3 animated fadeIn page-content">
                        <form novalidate  id="" role="form" enctype="multipart/form-data"  class="form page-form form-horizontal needs-validation" action="<?php print_link("mcu_tahunan/edit/$page_id/?csrf_token=$csrf_token"); ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="NISN">Nisn <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-NISN"  value="<?php  echo $data['NISN']; ?>" type="number" placeholder="Enter Nisn" step="1" list="NISN_list"  required="" name="NISN"  class="form-control " />
                                                    <datalist id="NISN_list">
                                                        <?php 
                                                        $NISN_options = $comp_model -> mcu_tahunan_NISN_option_list();
                                                        if(!empty($NISN_options)){
                                                        foreach($NISN_options as $option){
                                                        $value = (!empty($option['value']) ? $option['value'] : null);
                                                        $label = (!empty($option['label']) ? $option['label'] : $value);
                                                        ?>
                                                        <option value="<?php echo $value; ?>"><?php echo $label; ?></option>
                                                        <?php
                                                        }
                                                        }
                                                        ?>
                                                    </datalist>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="Nama">Nama <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input id="ctrl-Nama"  value="<?php  echo $data['Nama']; ?>" type="text" placeholder="Enter Nama"  required="" name="Nama"  class="form-control " />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="control-label" for="Jenis_Kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="">
                                                        <input id="ctrl-Jenis_Kelamin"  value="<?php  echo $data['Jenis_Kelamin']; ?>" type="text" placeholder="Enter Jenis Kelamin"  required="" name="Jenis_Kelamin"  class="form-control " />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="control-label" for="Kelas">Kelas <span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="">
                                                            <input id="ctrl-Kelas"  value="<?php  echo $data['Kelas']; ?>" type="text" placeholder="Enter Kelas"  required="" name="Kelas"  class="form-control " />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="TB">Tb <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <input id="ctrl-TB"  value="<?php  echo $data['TB']; ?>" type="number" placeholder="Enter Tb" step="1"  required="" name="TB"  class="form-control " />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label class="control-label" for="BB">Bb <span class="text-danger">*</span></label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="">
                                                                    <input id="ctrl-BB"  value="<?php  echo $data['BB']; ?>" type="text" placeholder="Enter Bb"  required="" name="BB"  class="form-control " />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label class="control-label" for="Goldar">Goldar <span class="text-danger">*</span></label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <div class="">
                                                                        <input id="ctrl-Goldar"  value="<?php  echo $data['Goldar']; ?>" type="text" placeholder="Enter Goldar"  required="" name="Goldar"  class="form-control " />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <label class="control-label" for="Kepala">Kepala <span class="text-danger">*</span></label>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="">
                                                                            <?php
                                                                            $Kepala_options = Menu :: $Kepala;
                                                                            $field_value = $data['Kepala'];
                                                                            if(!empty($Kepala_options)){
                                                                            foreach($Kepala_options as $option){
                                                                            $value = $option['value'];
                                                                            $label = $option['label'];
                                                                            //check if value is among checked options
                                                                            $checked = $this->check_form_field_checked($field_value, $value);
                                                                            ?>
                                                                            <label class="custom-control custom-radio custom-control-inline">
                                                                                <input id="ctrl-Kepala" class="custom-control-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio" required=""   name="Kepala" />
                                                                                    <span class="custom-control-label"><?php echo $label ?></span>
                                                                                </label>
                                                                                <?php
                                                                                }
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <label class="control-label" for="Thorax">Thorax <span class="text-danger">*</span></label>
                                                                        </div>
                                                                        <div class="col-sm-8">
                                                                            <div class="">
                                                                                <?php
                                                                                $Thorax_options = Menu :: $Kepala;
                                                                                $field_value = $data['Thorax'];
                                                                                if(!empty($Thorax_options)){
                                                                                foreach($Thorax_options as $option){
                                                                                $value = $option['value'];
                                                                                $label = $option['label'];
                                                                                //check if value is among checked options
                                                                                $checked = $this->check_form_field_checked($field_value, $value);
                                                                                ?>
                                                                                <label class="custom-control custom-radio custom-control-inline">
                                                                                    <input id="ctrl-Thorax" class="custom-control-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio" required=""   name="Thorax" />
                                                                                        <span class="custom-control-label"><?php echo $label ?></span>
                                                                                    </label>
                                                                                    <?php
                                                                                    }
                                                                                    }
                                                                                    ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group ">
                                                                        <div class="row">
                                                                            <div class="col-sm-4">
                                                                                <label class="control-label" for="Abdomen">Abdomen <span class="text-danger">*</span></label>
                                                                            </div>
                                                                            <div class="col-sm-8">
                                                                                <div class="">
                                                                                    <?php
                                                                                    $Abdomen_options = Menu :: $Kepala;
                                                                                    $field_value = $data['Abdomen'];
                                                                                    if(!empty($Abdomen_options)){
                                                                                    foreach($Abdomen_options as $option){
                                                                                    $value = $option['value'];
                                                                                    $label = $option['label'];
                                                                                    //check if value is among checked options
                                                                                    $checked = $this->check_form_field_checked($field_value, $value);
                                                                                    ?>
                                                                                    <label class="custom-control custom-radio custom-control-inline">
                                                                                        <input id="ctrl-Abdomen" class="custom-control-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio" required=""   name="Abdomen" />
                                                                                            <span class="custom-control-label"><?php echo $label ?></span>
                                                                                        </label>
                                                                                        <?php
                                                                                        }
                                                                                        }
                                                                                        ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group ">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <label class="control-label" for="Extremitas">Extremitas <span class="text-danger">*</span></label>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <div class="">
                                                                                        <?php
                                                                                        $Extremitas_options = Menu :: $Kepala;
                                                                                        $field_value = $data['Extremitas'];
                                                                                        if(!empty($Extremitas_options)){
                                                                                        foreach($Extremitas_options as $option){
                                                                                        $value = $option['value'];
                                                                                        $label = $option['label'];
                                                                                        //check if value is among checked options
                                                                                        $checked = $this->check_form_field_checked($field_value, $value);
                                                                                        ?>
                                                                                        <label class="custom-control custom-radio custom-control-inline">
                                                                                            <input id="ctrl-Extremitas" class="custom-control-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio" required=""   name="Extremitas" />
                                                                                                <span class="custom-control-label"><?php echo $label ?></span>
                                                                                            </label>
                                                                                            <?php
                                                                                            }
                                                                                            }
                                                                                            ?>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group ">
                                                                                <div class="row">
                                                                                    <div class="col-sm-4">
                                                                                        <label class="control-label" for="Luka_terbuka">Luka Terbuka <span class="text-danger">*</span></label>
                                                                                    </div>
                                                                                    <div class="col-sm-8">
                                                                                        <div class="">
                                                                                            <?php
                                                                                            $Luka_terbuka_options = Menu :: $Luka_terbuka;
                                                                                            $field_value = $data['Luka_terbuka'];
                                                                                            if(!empty($Luka_terbuka_options)){
                                                                                            foreach($Luka_terbuka_options as $option){
                                                                                            $value = $option['value'];
                                                                                            $label = $option['label'];
                                                                                            //check if value is among checked options
                                                                                            $checked = $this->check_form_field_checked($field_value, $value);
                                                                                            ?>
                                                                                            <label class="custom-control custom-radio custom-control-inline">
                                                                                                <input id="ctrl-Luka_terbuka" class="custom-control-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio" required=""   name="Luka_terbuka" />
                                                                                                    <span class="custom-control-label"><?php echo $label ?></span>
                                                                                                </label>
                                                                                                <?php
                                                                                                }
                                                                                                }
                                                                                                ?>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group ">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label class="control-label" for="Patah_tulang">Patah Tulang <span class="text-danger">*</span></label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="">
                                                                                                <?php
                                                                                                $Patah_tulang_options = Menu :: $Luka_terbuka;
                                                                                                $field_value = $data['Patah_tulang'];
                                                                                                if(!empty($Patah_tulang_options)){
                                                                                                foreach($Patah_tulang_options as $option){
                                                                                                $value = $option['value'];
                                                                                                $label = $option['label'];
                                                                                                //check if value is among checked options
                                                                                                $checked = $this->check_form_field_checked($field_value, $value);
                                                                                                ?>
                                                                                                <label class="custom-control custom-radio custom-control-inline">
                                                                                                    <input id="ctrl-Patah_tulang" class="custom-control-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio" required=""   name="Patah_tulang" />
                                                                                                        <span class="custom-control-label"><?php echo $label ?></span>
                                                                                                    </label>
                                                                                                    <?php
                                                                                                    }
                                                                                                    }
                                                                                                    ?>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group ">
                                                                                        <div class="row">
                                                                                            <div class="col-sm-4">
                                                                                                <label class="control-label" for="Masalah">Masalah <span class="text-danger">*</span></label>
                                                                                            </div>
                                                                                            <div class="col-sm-8">
                                                                                                <div class="">
                                                                                                    <input id="ctrl-Masalah"  value="<?php  echo $data['Masalah']; ?>" type="text" placeholder="Enter Masalah"  required="" name="Masalah"  class="form-control " />
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group ">
                                                                                            <div class="row">
                                                                                                <div class="col-sm-4">
                                                                                                    <label class="control-label" for="Riwayat_kesehatan">Riwayat Kesehatan <span class="text-danger">*</span></label>
                                                                                                </div>
                                                                                                <div class="col-sm-8">
                                                                                                    <div class="">
                                                                                                        <input id="ctrl-Riwayat_kesehatan"  value="<?php  echo $data['Riwayat_kesehatan']; ?>" type="text" placeholder="Enter Riwayat Kesehatan"  required="" name="Riwayat_kesehatan"  class="form-control " />
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group ">
                                                                                                <div class="row">
                                                                                                    <div class="col-sm-4">
                                                                                                        <label class="control-label" for="Hasil_penunjang">Hasil Penunjang </label>
                                                                                                    </div>
                                                                                                    <div class="col-sm-8">
                                                                                                        <div class="">
                                                                                                            <div class="dropzone " input="#ctrl-Hasil_penunjang" fieldname="Hasil_penunjang"    data-multiple="false" dropmsg="Choose files or drag and drop files to upload"    btntext="Browse" filesize="3" maximum="1">
                                                                                                                <input name="Hasil_penunjang" id="ctrl-Hasil_penunjang" class="dropzone-input form-control" value="<?php  echo $data['Hasil_penunjang']; ?>" type="text"  />
                                                                                                                    <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                                                                                    <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <?php Html :: uploaded_files_list($data['Hasil_penunjang'], '#ctrl-Hasil_penunjang'); ?>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-ajax-status"></div>
                                                                                            <div class="form-group text-center">
                                                                                                <button class="btn btn-primary" type="submit">
                                                                                                    Update
                                                                                                    <i class="fa fa-send"></i>
                                                                                                </button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </section>
