<?php
$comp_model = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="add"  data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Add New MCU Tahunan</h4>
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
                        <form id="mcu_tahunan-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("mcu_tahunan/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="NISN">Nisn <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                            <select required=""  id="ctrl-NISN" name="NISN"  placeholder="Select a value ..."   class="selectize"  >
                                                <option value="">Select a value ...</option>
                                                        <?php 
                                                        $NISN_options = $comp_model -> distinct_nisn();
                                                        if(!empty($NISN_options)){
                                                        foreach($NISN_options as $option){
                                                        $value = (!empty($option['value']) ? $option['value'] : null);
                                                        // XCUSTOMCODE
                                                        $label = (!empty($option['label']) ? '(' . $option['scope'] . ') ' . $option['homebase'] . ' - ' . $option['label'] . ' ' . $option['nama'] : $value);
                                                        ?>
                                                        <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                            <?php echo $label; ?>
                                                        </option>
                                                        <?php
                                                        }
                                                        }
                                                        ?>
                                                    </select>
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
                                                    <input id="ctrl-Nama"  value="<?php  echo $this->set_field_value('Nama',""); ?>" type="text" placeholder="Enter Nama"  required="" name="Nama"  class="form-control " />
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
                                                        <input id="ctrl-Jenis_Kelamin"  value="<?php  echo $this->set_field_value('Jenis_Kelamin',""); ?>" type="text" placeholder="Enter Jenis Kelamin"  required="" name="Jenis_Kelamin"  class="form-control " />
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
                                                            <input id="ctrl-Kelas"  value="<?php  echo $this->set_field_value('Kelas',""); ?>" type="text" placeholder="Enter Kelas"  required="" name="Kelas"  class="form-control " />
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
                                                                <input id="ctrl-TB"  value="<?php  echo $this->set_field_value('TB',""); ?>" type="number" placeholder="Enter Tb" step="1"  required="" name="TB"  class="form-control " />
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
                                                                    <input id="ctrl-BB"  value="<?php  echo $this->set_field_value('BB',""); ?>" type="text" placeholder="Enter Bb"  required="" name="BB"  class="form-control " />
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
                                                                        <input id="ctrl-Goldar"  value="<?php  echo $this->set_field_value('Goldar',""); ?>" type="text" placeholder="Enter Goldar"  required="" name="Goldar"  class="form-control " />
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
                                                                            if(!empty($Kepala_options)){
                                                                            foreach($Kepala_options as $option){
                                                                            $value = $option['value'];
                                                                            $label = $option['label'];
                                                                            //check if current option is checked option
                                                                            $checked = $this->set_field_checked('Kepala', $value, "");
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
                                                                                if(!empty($Thorax_options)){
                                                                                foreach($Thorax_options as $option){
                                                                                $value = $option['value'];
                                                                                $label = $option['label'];
                                                                                //check if current option is checked option
                                                                                $checked = $this->set_field_checked('Thorax', $value, "");
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
                                                                                    if(!empty($Abdomen_options)){
                                                                                    foreach($Abdomen_options as $option){
                                                                                    $value = $option['value'];
                                                                                    $label = $option['label'];
                                                                                    //check if current option is checked option
                                                                                    $checked = $this->set_field_checked('Abdomen', $value, "");
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
                                                                                        if(!empty($Extremitas_options)){
                                                                                        foreach($Extremitas_options as $option){
                                                                                        $value = $option['value'];
                                                                                        $label = $option['label'];
                                                                                        //check if current option is checked option
                                                                                        $checked = $this->set_field_checked('Extremitas', $value, "");
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
                                                                                            if(!empty($Luka_terbuka_options)){
                                                                                            foreach($Luka_terbuka_options as $option){
                                                                                            $value = $option['value'];
                                                                                            $label = $option['label'];
                                                                                            //check if current option is checked option
                                                                                            $checked = $this->set_field_checked('Luka_terbuka', $value, "");
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
                                                                                                if(!empty($Patah_tulang_options)){
                                                                                                foreach($Patah_tulang_options as $option){
                                                                                                $value = $option['value'];
                                                                                                $label = $option['label'];
                                                                                                //check if current option is checked option
                                                                                                $checked = $this->set_field_checked('Patah_tulang', $value, "");
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
                                                                                                    <input id="ctrl-Masalah"  value="<?php  echo $this->set_field_value('Masalah',""); ?>" type="text" placeholder="Enter Masalah"  required="" name="Masalah"  class="form-control " />
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
                                                                                                        <input id="ctrl-Riwayat_kesehatan"  value="<?php  echo $this->set_field_value('Riwayat_kesehatan',""); ?>" type="text" placeholder="Enter Riwayat Kesehatan"  required="" name="Riwayat_kesehatan"  class="form-control " />
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
                                                                                                                <input name="Hasil_penunjang" id="ctrl-Hasil_penunjang" class="dropzone-input form-control" value="<?php  echo $this->set_field_value('Hasil_penunjang',""); ?>" type="text"  />
                                                                                                                    <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                                                                                    <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group form-submit-btn-holder text-center mt-3">
                                                                                                <div class="form-ajax-status"></div>
                                                                                                <button class="btn btn-primary" type="submit">
                                                                                                    Submit
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

                                                                <!-- XCUSTOMCODE -->
                                                                <script src="/assets/js/xcustomcode/cari_peserta.js" ></script>
                                                                <script> XCustomCode.init() </script>