<?php   
    $comments_method 			= $this->db->get_where('config' , array('title' =>'comments_method'))->row()->value;
    $facebook_comment_appid 	= $this->db->get_where('config' , array('title' =>'facebook_comment_appid'))->row()->value;
    $total_comments 			= $this->db->get_where('comments', array('video_id' =>$watch_videos->videos_id , 'comment_type'=>'1','publication'=>'1'))->num_rows();

    if(($comments_method =='both' || $comments_method =='facebook') && $facebook_comment_appid !='') :
?>
<!-- facebook comments -->
<div class="row">
    <div class="col-md-12">                        
    	<h2 class="border">Facebook Comments</h2>
    	<div class="fb-comments" data-href="<?php echo base_url();?>/watch/<?php echo $watch_videos->slug;?>.html" data-width="800" data-numposts="30"></div>
		<div id="fb-root"></div>
	    <script>
	        (function(d, s, id) {
	            var js, fjs = d.getElementsByTagName(s)[0];
	            if (d.getElementById(id)) return;
	            js = d.createElement(s);
	            js.id = id;
	            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=<?php echo $this->db->get_where('config' , array('title' =>'facebook_comment_appid'))->row()->value; ?>";
	            fjs.parentNode.insertBefore(js, fjs);
	        }(document, 'script', 'facebook-jssdk'));
	    </script>                        
    </div>
</div>
<!-- END facebook comments -->
<?php endif; ?>
<?php if ($total_comments >0) :?>
<div class="row">
    <div class="col-md-12">
        <div class="page-sidebar">
            <!--Comments Area-->
            <div class="comments-section">
                <div class="section-title">
                    <h4 class="text-left title-bottom text-uppercase tp-mb30 tp-pb5">
                        <?php echo $total_comments; ?> Comments found</h4>
                </div>
                <div class="comment-box">
                    <?php   $this->db->order_by('comments_id','DESC');
                        $comments =   $this->db->get_where('comments', array('video_id' =>$watch_videos->videos_id , 'comment_type'=>'1','publication'=>'1'))->result_array();
                    foreach ($comments as $comment):
                 ?>
                    <div class="comment" id="comment<?php echo $comment['user_id']; ?>">
                        <div class="author-thumbnail"><img src="<?php echo $this->common_model->get_image_url('user',$comment['user_id']); ?>" alt="<?php echo $this->common_model->get_name_by_id($comment['user_id']); ?>"></div>
                        <div class="comment-text"><strong><?php echo $this->common_model->get_name_by_id($comment['user_id']); ?></strong> - posted
                            <?php echo $this->common_model->time_ago($comment['comment_at'], false); ?>
                        </div>
                        <div class="text">
                            <?php echo $comment['comment']; ?>
                        </div>
                    </div>

                    <?php   $this->db->order_by('comments_id','ASC');
                            $comment_replays =   $this->db->get_where('comments', array('video_id' =>$watch_videos->videos_id , 'comment_type'=>'2', 'replay_for'=>$comment['comments_id'],'publication'=>'1'))->result_array();
                    foreach ($comment_replays as $comment_replay):
                 ?>
                    <div class="comment coment-replay">
                        <div class="author-thumbnail"><img src="<?php echo $this->common_model->get_image_url('user',$comment_replay['user_id']); ?>" alt="<?php echo $this->common_model->get_name_by_id($comment_replay['user_id']); ?>"></div>
                        <div class="comment-text"><strong><?php echo $this->common_model->get_name_by_id($comment_replay['user_id']); ?></strong> - posted
                            <?php echo $this->common_model->time_ago($comment_replay['comment_at'], false); ?>
                        </div>
                        <div class="text">
                            <?php echo $comment_replay['comment']; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php   
                        if(($comments_method =='both' || $comments_method =='ovoo')) :
                    ?>
                    <div class="comment coment-replay">
                        <form class="custom-form" method="post" action="<?php echo base_url('comments/replay'); ?>">
                            <textarea name="comment" id="comment" class="form-control" rows="2" placeholder="Repay" required></textarea>
                            <input type="hidden" name="video_id" value="<?php echo $watch_videos->videos_id; ?>">
                            <input type="hidden" name="replay_for" value="<?php echo $comment['comments_id']; ?>">
                            <input type="hidden" name="url" value="<?php echo base_url(uri_string());; ?>">
                            <div>
                                <?php if($this->session->userdata('login_status') == 1){ ?>
                                <button type="submit" value="submit" class="btn btn-success btn-sm pull-right m-t-20"> <span class="btn-label"><i class="fi ion-ios-undo-outline"></i></span>Replay </button>
                                <?php }else{ ?>
                                <a class="btn btn-success btn-sm pull-right m-t-20" href="<?php echo base_url('login'); ?>"> <span class="btn-label"><i class="fi ion-log-in"></i></span>Login to Replay </a>
                                <?php } ?>
                            </div>
                        </form>
                    </div>
                    <?php endif; endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<?php if(($comments_method =='both' || $comments_method =='ovoo')) :?>
<div class="row">
    <div class="col-sm-12">
        <div id="comment-container">
            <div class="movie-heading overflow-hidden"> <span class="wow fadeInUp" data-wow-duration="0.8s">Leave a comment</span>
                <div class="disable-bottom-line wow zoomIn" data-wow-duration="0.8s"></div>
            </div>
            <form class="comment-form" method="post" action="<?php echo base_url('comments/comment'); ?>">
            <input type="hidden" name="video_id" value="<?php echo $watch_videos->videos_id; ?>">
            <input type="hidden" name="url" value="<?php echo base_url(uri_string()); ?>">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <textarea name="comment" id="cmnt-user-msg" rows="4" class="form-control" placeholder="Write comment here" required></textarea>
                            <div class="input-top-line"></div>
                            <div class="input-bottom-line"></div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <?php if($this->session->userdata('login_status') == 1){ ?>
                        <button type="submit" value="submit" class="btn btn-success"> <span class="btn-label"><i class="fi ion-ios-compose-outline"></i></span>Post Comments </button>
                        <?php }else{ ?>
                        <a class="btn btn-success" href="<?php echo base_url('login'); ?>"> <span class="btn-label"><i class="fi ion-log-in"></i></span>Login to Comments </a>
                        <?php } ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>