<!-- Breadcrumb -->
<div id="title-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-8 col-xs-12">
                <div class="page-title">
                    <h1 class="text-uppercase">
                        <?php echo $post_details->post_title; ?>
                    </h1>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12 text-right">
                <ul class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url();?>"><i class="fi ion-ios-home"></i>Home</a>
                    </li>
                    <li><a href="<?php echo base_url('blog');?>"><i class="fi ion-edit"></i>Blog</a></li>
                    <li class="active">
                        <?php echo $post_details->slug; ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->


<div id="post-listing">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-8">
                <div class="movie-details-container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="blog-detail-img">
                                <img class="img-responsive" src="<?php echo $post_details->image_link; ?>" alt="<?php echo $post_details->post_title; ?>">
                            </div>
                            <div>
                                <h1 class="blog-title">
                                    <?php echo $post_details->post_title; ?>
                                </h1>
                            </div>
                            <div class="post-video-info">
                                <div class="row">
                                    <div class="col-md-6"><span class="by-in">By</span>
                                        <a href="#"><?php echo $this->common_model->get_name_by_id($post_details->user_id);?></a>
                                        <span>&#47;</span>
                                        <span class="by-in"> In</span>
                                        <?php $category=explode(',', $post_details->category_id);
                                            foreach ($category as $category):
                                        ?>
                                        <a href="<?php echo base_url().'blog/category/'.$this->common_model->get_slug_by_category_id($category).'.html'; ?>">
                                            <?php echo $this->common_model->get_category_name_by_id($category);?>
                                        </a>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <span><?php echo date('d M Y',strtotime($post_details->post_at));?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="movie-details-text">
                                <?php echo $post_details->content; ?>
                                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                    <div class="addthis_inline_share_toolbox_yl99 m-t-30 m-b-10" data-url="<?php echo base_url().'blog/'.$post_details->slug.'.html';?>" data-title="Watch & Download <?php echo $post_details->post_title;?>"></div>
                                    <!-- Addthis Social tool -->
                            </div>
                            <div class="movie-details-container">
                                <?php   
                                    $comments_method = $this->db->get_where('config' , array('title' =>'comments_method'))->row()->value;
                                    $facebook_comment_appid = $this->db->get_where('config' , array('title' =>'facebook_comment_appid'))->row()->value;
                                    if(($comments_method =='both' || $comments_method =='facebook') && $facebook_comment_appid !='') :
                                ?>
                                <!-- facebook comments -->
                                <div class="row">
                                    <div class="col-md-12">                        
                                    <h2 class="border">Facebook Comments</h2>
                                    <div class="fb-comments" data-href="<?php echo base_url();?>/blog/<?php echo $post_details->slug;?>.html" data-width="800" data-numposts="30"></div>
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
                        </div>

                            <?php $total_comments = count($this->db->get_where('post_comments', array('post_id' =>$post_details->posts_id , 'comment_type'=>'1'))->result_array());
                                if ($total_comments >0) :
                            ?>
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
                                            $comments =   $this->db->get_where('post_comments', array('post_id' =>$post_details->posts_id , 'comment_type'=>'1'))->result_array();
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
                                                $comment_replays =   $this->db->get_where('post_comments', array('post_id' =>$post_details->posts_id , 'comment_type'=>'2', 'replay_for'=>$comment['comments_id']))->result_array();
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
                                                    <form class="custom-form" method="post" action="<?php echo base_url('comments/post_replay'); ?>">
                                                        <textarea name="comment" id="comment" class="form-control" rows="2" placeholder="Repay" required></textarea>
                                                        <input type="hidden" name="post_id" value="<?php echo $post_details->posts_id; ?>">
                                                        <input type="hidden" name="replay_for" value="<?php echo $comment['comments_id']; ?>">
                                                        <input type="hidden" name="url" value="<?php echo base_url(uri_string()).'.html'; ?>">
                                                        <div>
                                                            <?php if($this->session->userdata('login_status') == 1){ ?>
                                                            <button type="submit" value="submit" class="btn btn-success btn-sm pull-right m-t-20"> <span class="btn-label"><i class="fi ion-ios-undo-outline"></i></span>Replay </button>
                                                            <?php }else{ ?>
                                                            <a class="btn btn-success btn-sm pull-right m-t-20" href="<?php echo base_url('login'); ?>"> <span class="btn-label"><i class="fi ion-log-in"></i></span>Login to Replay </a>
                                                            <?php } ?>
                                                        </div>
                                                    </form>
                                                </div>
                                            <?php endif; ?>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>

                            <div class="row">
                                <div class="col-md-12">
                                    <?php   
                                        if(($comments_method =='both' || $comments_method =='ovoo')) :
                                    ?>
                                    <div id="comment-container">
                                        <div class="movie-heading overflow-hidden"> <span class="wow fadeInUp" data-wow-duration="0.8s">Leave a comment</span>
                                            <div class="disable-bottom-line wow zoomIn" data-wow-duration="0.8s"></div>
                                        </div>
                                        <form class="comment-form" method="post" action="<?php echo base_url('comments/post_comment'); ?>">
                                            <input type="hidden" name="post_id" value="<?php echo $post_details->posts_id; ?>">
                                            <input type="hidden" name="url" value="<?php echo base_url(uri_string()).'.html'; ?>">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <textarea name="comment" id="cmnt-user-msg" rows="4" class="form-control" placeholder="MESSAGE" required></textarea>
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
                                <?php endif; ?>
                                </div>
                            </div>
                            <div class="similler-movie">
                                <div class="movie-heading overflow-hidden">
                                    <span>
                                            Related Blog
                                        </span>
                                    <div class="disable-bottom-line">
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- All post -->
                                    <?php
                                    $category_id = explode(',', $post_details->category_id);
                                    $related_posts = $this->common_model->related_posts($category_id[0]);
                                    //var_dump($related_posts);
                         foreach ($related_posts as $posts) :?>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="post-list-container">
                                                <div class="movie-img">
                                                    <img class="img-responsive" src="<?php echo $posts->image_link; ?>" alt="video image">
                                                </div>
                                                <div class="post-video-info">
                                                    <p class="post-video-aut-name">
                                                        <span class="by-in">By</span>
                                                        <a href="#"><?php echo $this->common_model->get_name_by_id($posts->user_id);?></a>
                                                        <span>&#47;</span>
                                                        <span class="by-in"> In</span>
                                                        <?php $category=explode(',', $posts->category_id);
                        foreach ($category as $category):
                        ?>
                                                        <a href="<?php echo base_url().'blog/'.$category; ?>">
                                                            <?php echo $this->common_model->get_category_name_by_id($category);?>
                                                        </a>
                                                        <?php endforeach; ?>
                                                    </p>
                                                    <p class="blog-movie-desc text-right">
                                                        <span><?php echo $this->common_model->time_ago($posts->post_at);?></span>
                                                        <span>&#47;</span>
                                                        <span><?php echo $this->common_model->post_comments_record_count_by_id($posts->posts_id);?> <i class="fa fa-commenting-o"></i></span>
                                                    </p>
                                                </div>
                                                <div class="post-text">
                                                    <div class="sm-heading">
                                                        <a href="<?php echo  base_url().'blog/'.$posts->slug.'.html'; ?>">
                                                            <h2>
                                                                <?php echo $posts->post_title;?>
                                                            </h2>
                                                        </a>
                                                    </div>
                                                    <?php 
                                                        $html = strip_tags($posts->content);
                                                        $html = html_entity_decode($html, ENT_QUOTES, 'UTF-8');
                                                        $html = mb_substr($html, 0, 100, 'UTF-8');
                                                        $html .= "…";
                                                     ?>
                                                    <p>
                                                        <?php echo $html;?>
                                                    </p>
                                                    <a href="<?php echo  base_url().'blog/'.$posts->slug.'.html'; ?>" class="btn btn-success pull-right">Read More<i class="fa fa-angle-double-right m-l-10" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                        <!-- End All post -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('front_end/blog_sidebar'); ?>   
        </div>
    </div>
</div>

<!-- Secondary Section -->