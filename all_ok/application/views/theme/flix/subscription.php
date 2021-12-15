<?php
    $header_templete                =   ovoo_config('header_templete');
    $theme_dir                      =   'theme/'.ovoo_config('active_theme').'/';
    $assets_dir                     =   'assets/theme/'.ovoo_config('active_theme').'/';
    $registration_enable            =   ovoo_config('registration_enable');    
    $frontend_login_enable          =   ovoo_config('frontend_login_enable');    
    $country_to_primary_menu        =   ovoo_config('country_to_primary_menu');    
    $genre_to_primary_menu          =   ovoo_config('genre_to_primary_menu');
    $release_to_primary_menu        =   ovoo_config('release_to_primary_menu');    
    $contact_to_primary_menu        =   ovoo_config('contact_to_primary_menu');
    $privacy_policy_to_primary_menu =   ovoo_config('privacy_policy_to_primary_menu');
    $dmca_to_primary_menu           =   ovoo_config('dmca_to_primary_menu');
    $az_to_primary_menu             =   ovoo_config('az_to_primary_menu');
    $az_to_footer_menu              =   ovoo_config('az_to_footer_menu');
    $movie_request_enable           =   ovoo_config('movie_request_enable');
    $facebook_url                   =   ovoo_config('facebook_url');
    $twitter_url                    =   ovoo_config('twitter_url');
    $vimeo_url                      =   ovoo_config('vimeo_url');
    $linkedin_url                   =   ovoo_config('linkedin_url');
    $youtube_url                    =   ovoo_config('youtube_url');
    $business_phone                 =   ovoo_config('business_phone');
    $contact_email                  =   ovoo_config('contact_email');   
?>

<section class="sg-section">
    <div class="section-content profile-content">
        <div class="container">
            <div class="title">
                <h2>profile information</h2>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="profile-tabs">

                        <?php $this->load->view($theme_dir .'profile_menu'); ?>

                        <div class="tab-content">
                            <div class="tab-pane show active">
                                <div class="profile-section">
                                    <div class="tab-header">
                                        <h2><?php echo trans("my_subscription");?></h2>
                                        <p><?php echo trans("add_information_and_subscription");?></p>
                                    </div><!-- header -->
                                    <div class="tab-body">

                                        <?php 
                                            $query = $this->subscription_model->get_active_subscription();
                                            if($query->num_rows() > 0):                           
                                         ?>
                                            <h3 class="text-center"><?php echo trans("active_subscription");?></h3>
                                            <div class="sg-table">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>                            
                                                            <th><?php echo trans("subscription_plan");?></th>
                                                            <th><?php echo trans("purchase_date");?></th>
                                                            <th><?php echo trans("from");?></th>
                                                            <th><?php echo trans("to");?></th>
                                                            <th><?php echo trans("action");?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                            $sl = 1;

                                            foreach ($query->result_array() as $subscription):
                                                ?>
                                                <tr id='row_<?php echo $subscription['subscription_id'];?>'>
                                                    <td><?php echo $sl++;?></td>
                                                    <td><strong><?php echo $this->subscription_model->get_plan_name_by_id($subscription['plan_id']);?><?php if(time() > $subscription['timestamp_to']){ echo '(expired)'; }?></strong>
                                                    </td>
                                                    <td><?php echo date('d-m-Y',$subscription['payment_timestamp']);?></td>
                                                    <td><?php echo date('d-m-Y',$subscription['timestamp_from']);?></td>
                                                    <td><?php echo date('d-m-Y',$subscription['timestamp_to']);?></td>                                        
                                                    <td><a id="cancel-btn" class="btn btn-link btn-sm" href="#" onclick="subscription_remove('<?php echo $subscription['subscription_id'];?>')">Cancel</td>
                                                    
                                                </tr>
                                                <?php endforeach;?>
                                                    </tbody>
                                                </table>                                                    
                                            </div>

                                        <?php else: ?>

                                            <div class="d-flex justify-content-between">
                                                <div class="left-contant">
                                                    <h3><?php echo trans("no_active_subscription_found_subscription_history");?></h3>
                                                </div>
                                                <div class="right-contant">
                                                    <a href="<?php echo base_url('subscription/upgrade'); ?>" class="btn btn-primary"><?php echo trans("upgrade_membership");?></a>
                                                </div>
                                            </div>


                                        <?php endif; ?>

                                        <?php 
                                            $query = $this->subscription_model->get_inactive_subscription();
                                            if($query->num_rows() > 0):                     
                                         ?>
                                         <h3 class="text-center"><?php echo trans("subscription_history");?></h3>
                                         <div class="sg-table">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>                            
                                                        <th><?php echo trans("subscription_plan");?></th>
                                                        <th><?php echo trans("purchase_date");?></th>
                                                        <th><?php echo trans("from");?></th>
                                                        <th><?php echo trans("to");?></th>
                                                        <th><?php echo trans("action");?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $sl = 1;

                                                        foreach ($query->result_array() as $subscription):
                                                    ?>
                                                    <tr id='row_<?php echo $subscription['subscription_id'];?>'>
                                                        <td><?php echo $sl++;?></td>
                                                        <td><strong><?php echo $this->subscription_model->get_plan_name_by_id($subscription['plan_id']);?></strong>
                                                        </td>
                                                        <td><?php echo date('d-m-Y',$subscription['payment_timestamp']);?></td>
                                                        <td><?php echo date('d-m-Y',$subscription['timestamp_from']);?></td>
                                                        <td><?php echo date('d-m-Y',$subscription['timestamp_to']);?></td>
                                                        <td><?php if(time() > $subscription['timestamp_to'] && $subscription['status'] =='1'){ echo 'Expired';}else{ echo "Cancelled";}?></td>
                                                    </tr>
                                                    <?php endforeach;?>
                                                </tbody>
                                            </table>                                                    
                                        </div>

                                        

                                        <?php endif; ?>



                                    </div><!-- tab-body -->
                                </div> 
                            </div>
                        </div>                            
                    </div>                             
                </div>
            </div><!-- /.row -->                       
        </div><!-- /.container -->
    </div><!-- /.section-content -->
</section><!-- /.sg-section -->  