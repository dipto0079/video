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
                                        <h2><?php echo trans('my_favorite'); ?></h2>
                                        <p><?php echo trans('my_favorite_movies_and_videos'); ?></p>
                                    </div><!-- header -->
                                    <div class="tab-body"> 
                                        <?php 
                                            foreach($wl_videos as $favorite_videos):
                                            $all_fav_videos = $this->db->get_where('videos', array('videos_id'=>$favorite_videos['videos_id']))->result_array();
                                            foreach ($all_fav_videos as $videos) :
                                        ?>
                                        <div class="sg-video"  id="sg-video-<?php echo $favorite_videos['wish_list_id'];?>">
                                            <span onclick="wish_list_remove('<?php echo $favorite_videos['wish_list_id'];?>')" class="mdi mdi-close remove-icon"></span>
                                            <div class="thumb">
                                                <a href="<?php echo base_url('watch/'.$videos['slug'].'.html');?>">
                                                <img src="<?php echo $this->common_model->get_video_thumb_url($videos['videos_id']); ?>" alt="<?php echo $videos['title'];?>" class="img-fluid"></a>
                                            </div>     
                                            <div class="text">
                                                <a href="<?php if($videos['is_tvseries'] =='1'){ echo base_url('tv-series/watch/'.$videos['slug'].'.html');}else{  echo base_url('watch/'.$videos['slug'].'.html');}?>"><h3><?php echo $videos['title'];?></h3></a>
                                                <p><?php echo $videos['description'];?></p>
                                            </div>                                               
                                        </div>
                                        <?php endforeach; endforeach; ?>

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


<!--sweet alert2 JS -->
<!-- ajax add to wish-list -->
<script type="text/javascript">
    function wish_list_remove(wish_list_id='') {
        var table_row = '#row_' + wish_list_id;
        var base_url = '<?php echo base_url();?>'
        url = base_url + 'user/remove_wish_list/'
        swal({
            title: "Are you confirm to remove?",
            text: "It will remove from your wish-list parmanently!!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3CB371',
            cancelButtonText: "Cancel",
            confirmButtonText: "Delete",
            showLoaderOnConfirm: true,
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                            url: url,
                            type: 'POST',
                            data: 'wish_list_id=' + wish_list_id,
                            dataType: 'json'
                        })
                        .done(function(response) {
                            if(response.status =='success'){
                                swal("Success", "Removed successfully!", "success");
                                $('#sg-video-'+wish_list_id).fadeOut(2000);
                            }else if(response.status =='login_error') {
                                swal('Login Error', "Please login to remove", "error");
                            }else {
                                swal('Fail!!', "Unable to remove!", "error");
                            }
                            
                        })
                        .fail(function() {
                            swal('Oops...', response.message, response.status);
                        });
                });
            },
            allowOutsideClick: false
        });
    }
</script>
<!-- End ajax add to wish-list -->