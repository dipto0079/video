        <div class="card">
            <div class="row">
                <?php echo form_open(base_url() . 'admin/ad_setting/update/' , array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data'));?>
                <!-- panel  -->
                <div class="col-md-12">
                    <div class="panel panel-border panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <?php echo tr_wd('ads_setting'); ?>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <!-- panel  -->

                            <h4>300x250 Add Setting</h4>
                            <hr>

                            <div class="form-group">
                                <label class="control-label col-md-3"><?php echo tr_wd('ads_(_300x250_)'); ?></label>
                                <div class="col-sm-3">
                                    <select class="form-control m-bot15" id="ad1_option" name="ad_250x300_type">
                            <option value="1" <?php if($this->db->get_where('config' , array('title' =>'ad_250x300_type'))->row()->value=='1'){echo 'selected';}?> id="ad1_image_selection"><?php echo tr_wd('image'); ?></option>
                            <option value="2" <?php if($this->db->get_where('config' , array('title' =>'ad_250x300_type'))->row()->value=='2'){echo 'selected';}?> id="ad1_code_selection"><?php echo tr_wd('ads_code'); ?></option>
                            <option value="0" <?php if($this->db->get_where('config' , array('title' =>'ad_250x300_type'))->row()->value=='0'){echo 'selected';}?> id="ad1_disable"><?php echo tr_wd('disable'); ?></option>
                            </select>
                                </div>
                            </div>
                            <div id="ad1_image_section">

                                <div class="form-group">
                                    <label class="control-label col-sm-3"><?php echo tr_wd('Image'); ?></label>
                                    <div class="col-sm-8">
                                        <div class="profile-info-name"> <img id="thumb_image" src="<?php echo $this->db->get_where('config' , array('title' =>'ad_250x300_image_url'))->row()->value.'?'.time(); ?>" class="img-thumbnail" alt=""> </div>
                                        <br>
                                        <div id="thumbnail_content">
                                            <input type="file" id="thumbnail_file" onchange="showImg(this);" name="ad_250x300_image" class="filestyle" data-input="false" accept="image/*"></div><br>
                                        <p class="btn btn-white" id="thumb_link" href="#"><span class="btn-label"><i class="fa fa-link"></i></span>
                                            <?php echo tr_wd('link') ?>
                                        </p>
                                        <p class="btn btn-white" id="thumb_file" href="#"><span class="btn-label"><i class="fa fa-file-o"></i></span>
                                            <?php echo tr_wd('file') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class=" col-sm-3 control-label"><?php echo tr_wd('ad_url(_300x250_)'); ?></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="ad_250x300_url" class="form-control" value="<?php echo $this->db->get_where('config' , array('title' =>'ad_250x300_url'))->row()->value;?>" required>
                                    </div>
                                </div>
                            </div>
                            <div id="ad1_code_section">

                                <div class="form-group">
                                    <label class="control-label col-md-3"><?php echo tr_wd('ad_code_(_300x250_)'); ?></label>
                                    <div class="col-md-8">
                                        <textarea class="wysihtml5 form-control" name="ad_250x300_code" id="footer-1" rows="10"><?php echo $this->db->get_where('config' , array('title' =>'ad_250x300_code'))->row()->value;?></textarea>
                                    </div>
                                </div>
                            </div>
                            <h4>160x600 Add Setting</h4>
                            <hr>

                            <div class="form-group">
                                <label class="control-label col-md-3"><?php echo tr_wd('ads_(_160x600_)'); ?></label>
                                <div class="col-sm-3">
                                    <select class="form-control m-bot15" id="ad2_option" name="ad_160x600_type">
                            <option value="1" <?php if($this->db->get_where('config' , array('title' =>'ad_160x600_type'))->row()->value=='1'){echo 'selected';}?> id="ad1_image_selection"><?php echo tr_wd('image'); ?></option>
                            <option value="2" <?php if($this->db->get_where('config' , array('title' =>'ad_160x600_type'))->row()->value=='2'){echo 'selected';}?> id="ad1_code_selection"><?php echo tr_wd('ads_code'); ?></option>
                            <option value="0" <?php if($this->db->get_where('config' , array('title' =>'ad_160x600_type'))->row()->value=='0'){echo 'selected';}?> id="ad1_disable"><?php echo tr_wd('disable'); ?></option>
                            </select>
                                </div>
                            </div>
                            <div id="ad2_image_section">

                                <div class="form-group">
                                    <label class="control-label col-sm-3"><?php echo tr_wd('Image'); ?></label>
                                    <div class="col-sm-8">
                                        <div class="profile-info-name"> <img id="thumb_image2" src="<?php echo $this->db->get_where('config' , array('title' =>'ad_160x600_image_url'))->row()->value.'?'.time(); ?>" class="img-thumbnail" alt=""> </div>
                                        <br>
                                        <div id="thumbnail_content2">
                                            <input type="file" id="thumbnail_file2" onchange="showImg2(this);" name="ad_160x600_image" class="filestyle" data-input="false" accept="image/*"></div><br>
                                        <p class="btn btn-white" id="thumb_link2" href="#"><span class="btn-label"><i class="fa fa-link"></i></span>
                                            <?php echo tr_wd('link') ?>
                                        </p>
                                        <p class="btn btn-white" id="thumb_file2" href="#"><span class="btn-label"><i class="fa fa-file-o"></i></span>
                                            <?php echo tr_wd('file') ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class=" col-sm-3 control-label"><?php echo tr_wd('ad_url(_160x600_)'); ?></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="ad_160x600_url" class="form-control" value="<?php echo $this->db->get_where('config' , array('title' =>'ad_160x600_url'))->row()->value;?>" required>
                                    </div>
                                </div>
                            </div>
                            <div id="ad2_code_section">

                                <div class="form-group">
                                    <label class="control-label col-md-3"><?php echo tr_wd('ad_code_(_160x600_)'); ?></label>
                                    <div class="col-md-8">
                                        <textarea class="wysihtml5 form-control" name="ad_160x600_code" id="footer-1" rows="10"><?php echo $this->db->get_where('config' , array('title' =>'ad_160x600_code'))->row()->value;?></textarea>
                                    </div>
                                </div>
                            </div>



                            <div class="col-sm-offset-3 col-sm-9 m-t-15">
                                <button type="submit" class="btn btn-sm btn-primary"><span class="btn-label"><i class="fa fa-floppy-o"></i></span><?php echo tr_wd('save_changes'); ?> </button>
                            </div>
                            </form>
                        </div>
                        <!--end panel body -->
                    </div>
                    <!--end panel -->
                </div>
                <!--end col-6 -->
            </div>
        </div>


<script>
    jQuery(document).ready(function() {
        $('#thumb_link').click(function() {
            $('#thumbnail_content').html('<input type="text" name="ad_250x300_image_url" class="form-control">');
        });

        $('#thumb_file').click(function() {
            $('#thumbnail_content').html('<input type="file" id="thumbnail_file" onchange="showImg(this);" name="ad_250x300_image" class="filestyle" data-input="false" accept="image/*"></div>');
        });
        $('#thumb_link2').click(function() {
            $('#thumbnail_content2').html('<input type="text" name="ad_160x600_image_url" class="form-control">');
        });

        $('#thumb_file2').click(function() {
            $('#thumbnail_content2').html('<input type="file" id="thumbnail_file" onchange="showImg(this);" name="ad_160x600_image" class="filestyle" data-input="false" accept="image/*"></div>');
        });

    });
</script>

<!--instant image dispaly-->
<script type="text/javascript">
    function showImg(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#thumb_image')
                    .attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    function showImg2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#thumb_image2')
                    .attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<!--end instant image dispaly-->

<script>
    $(document).ready(function() {
        <?php $ad_250x300=$this->db->get_where('config' , array('title' =>'ad_250x300_type'))->row()->value;
              $ad_160x600=$this->db->get_where('config' , array('title' =>'ad_160x600_type'))->row()->value;
if ($ad_250x300==0):?>
        $("#ad1_image_section").fadeOut("slow");
        $("#ad1_code_section").fadeOut("slow");
        <?php endif; if ($ad_250x300==1):?>
        $("#ad1_image_section").fadeIn("slow");
        $("#ad1_code_section").fadeOut("slow");
        <?php endif; if ($ad_250x300==2):?>
        $("#ad1_image_section").fadeOut("slow");
        $("#ad1_code_section").fadeIn("slow");
        <?php endif; if ($ad_160x600==0):?>
        $("#ad2_image_section").fadeOut("slow");
        $("#ad2_code_section").fadeOut("slow");
        <?php endif; if ($ad_160x600==1):?>
        $("#ad2_image_section").fadeIn("slow");
        $("#ad2_code_section").fadeOut("slow");
        <?php endif; if ($ad_160x600==2):?>
        $("#ad2_image_section").fadeOut("slow");
        $("#ad2_code_section").fadeIn("slow");
        <?php endif; ?>
    });
    $("#ad1_option").change(function() {
        var ad1_val = $("#ad1_option option:selected").val();
        if (ad1_val == 1) {
            $("#ad1_image_section").fadeIn("slow");
            $("#ad1_code_section").fadeOut("slow");
        } else if (ad1_val == 0) {
            $("#ad1_image_section").fadeOut("slow");
            $("#ad1_code_section").fadeOut("slow");
        } else if (ad1_val == 2) {
            $("#ad1_image_section").fadeOut("slow");
            $("#ad1_code_section").fadeIn("slow");
        }
    });

    $("#ad2_option").change(function() {
        var ad1_val = $("#ad2_option option:selected").val();
        if (ad1_val == 1) {
            $("#ad2_image_section").fadeIn("slow");
            $("#ad2_code_section").fadeOut("slow");
        } else if (ad1_val == 0) {
            $("#ad2_image_section").fadeOut("slow");
            $("#ad2_code_section").fadeOut("slow");
        } else if (ad1_val == 2) {
            $("#ad2_image_section").fadeOut("slow");
            $("#ad2_code_section").fadeIn("slow");
        }
    });
</script>