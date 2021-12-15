<?php
    $show_star_image    =   $this->db->get_where('config' , array('title'=>'show_star_image'))->row()->value;
    $theme_dir          =   'theme/'.ovoo_config('active_theme').'/';
    $assets_dir         =   'assets/theme/'.ovoo_config('active_theme').'/';
?>


<?php if($this->common_model->get_ads_status('player_top')=='1'): ?>
<!-- header ads -->
    <section class="sg-section">
        <div class="section-content text-center">
            <div class="container">
                <?php echo $this->common_model->get_ads('player_top'); ?>
            </div><!-- /.container -->
        </div><!-- /.section-content -->
    </section><!-- /.sg-section -->
<!-- header ads -->
<?php endif; ?>


<?php
    if($watch_videos->is_tvseries =='1'):
        $this->load->view($theme_dir.'tvseries_player');
    else:
        $this->load->view($theme_dir.'movie_player');
    endif;
?>
            


<!--sweet alert2 JS -->
<!-- ajax add to wish-list -->
<script type="text/javascript">
    function wish_list_add(list_type = '', videos_id = '') {

        if (list_type == 'fav') {
            list_name = 'Favorite';
        } else {
            list_name = 'Wish';
        }
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>user/add_to_wish_list',
            data: "list_type=" + list_type + "&videos_id=" + videos_id,
            dataType: 'json',
            beforeSend: function() {},
            success: function(response) {
                var status = response.status;
                console.log(status);
                if (status == "success") {
                    swal('Good job!', 'Added to your ' + list_name + ' List.', 'success');
                } else if (status == "login_fail") {
                    swal('OPPS!', 'Please login to add your ' + list_name + ' list.', 'error');
                } else {
                    swal('OPPS!', 'Already exist on your ' + list_name + ' list.', 'error');
                }
            }
        });
    }
</script>
<!-- End ajax add to wish-list -->
<!-- Ajax Rating -->
<script>
    $('.rate_now').click(function() {

        rate = $(this).val();
        video_id = "<?php echo $watch_videos->videos_id;?>";
        current_rating = "<?php echo $watch_videos->total_rating;?>";
        total_rating = Number(current_rating) + Number(1);
        if (parseInt(rate) && parseInt(video_id)) {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url().'admin/rating';?>",
                data: "rate=" + rate + "&video_id=" + video_id,
                dataType: 'json',
                success: function(response) {
                    var post_status = response.post_status;
                    var rate = response.rate;
                    var video_id = response.video_id;
                    if (post_status == "success") {
                        $('#rated').html('Rating(' + total_rating + ')');
                    } else {
                        alert('Fail to submit rating'); 
                    }
                }
            });
        }
    });
</script>
<!-- End ajax Rating -->