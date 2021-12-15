
<!-- Main Section -->
<div id="section-opt">
    <div class="container">
        <div class="row">
        <div class="col-md-3 col-xs-12"></div>
            <div class="col-md-6 col-xs-12">
                <h2 class="block-title text-center">Password Recovery<br>
                    <small>Recover your password by existing email.</small>
                </h2>
                <div class="sendus">
                    <div class="movie-heading m-b-20"> <span>Enter Email</span>
                        <div class="disable-bottom-line"></div>
                    </div>
                    <?php if($this->session->flashdata('success') !=''):?>
                        <div class="alert alert-success">
                           <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if($this->session->flashdata('error') !=''):?>
                        <div class="alert alert-danger">
                          <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif; ?>
                    <div id="contact-form">                        
                        <form class="custom-form" id="recovery-form" method="post" action="<?php echo base_url().'user/forget_password/do_reset'; ?>">
                            <input type="email" name="email" id="email" data-parsley-type="email" class="form-control half-wdth-field" placeholder="Enter your email" required>                            
                            <p> Back to <a href="<?php echo base_url().'user/login'; ?>">Login</a></p>
                            <div>
                                <button type="submit" value="submit" id="submit-btn" class="btn btn-success pull-right"> <span class="btn-label"><i class="fi ion-ios-unlocked-outline"></i></span>Recover</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xs-12"></div>
        </div>
    </div>
</div>
<!-- End Main Section -->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/parsleyjs/dist/parsley.min.js"></script> 
<script type="text/javascript">
    $(document).ready(function() {
        $('#recovery-form').parsley();
    });
</script>
<style>
    .parsley-required, .parsley-type{
        color:red;
        list-style:none;
        margin-left:-30px;
    }
</style> 




