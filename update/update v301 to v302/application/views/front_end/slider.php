<?php
    $header_templete                =   $this->db->get_where('config' , array('title'=>'header_templete'))->row()->value;   

    $slider_type            =   $this->db->get_where('config' , array('title'=>'slider_type'))->row()->value;
    $total_movie_in_slider  =   $this->db->get_where('config' , array('title'=>'total_movie_in_slider'))->row()->value;
    $slide_per_page         =   $this->db->get_where('config' , array('title'=>'slide_per_page'))->row()->value;
    if($total_movie_in_slider =='' || $total_movie_in_slider==NULL ||  !is_numeric($total_movie_in_slider)){
        $total_movie_in_slider = 15;
    }
    if($slide_per_page =='' || $slide_per_page==NULL ||  !is_numeric($slide_per_page)){
        $slide_per_page = 5;
    }
    if ($slider_type=="movie"):
 ?>
    <div id="owl-demo" class="owl-carousel owl-theme" style="/*padding-top: 75px*/;">
    <?php
        /*$ids = array(1194, 1094, 1093, 1092, 1091, 1090, 1089, 1088, 1087, 1086, 1085, 1084, 1083, 1082, 1081, 1080);
        $this->db->select('*');
        $this->db->from('videos');
        $this->db->where_in("videos_id", $ids);
        $this->db->where('publication', '1');
        $this->db->order_by("videos_id","desc");
        $query_result = $this->db->get();
        $slider_videos = $query_result->result();*/
        $this->db->limit($total_movie_in_slider);
        $this->db->order_by("videos_id","desc");
        $slider_videos = $this->db->get_where('videos', array('publication'=>'1'))->result();
        foreach ($slider_videos as $videos) :?> 
      <div class="item">
          <div class="latest-movie-img-container">
                <div class="movie-img"> <img class="img-responsive" src="<?php echo $this->common_model->get_video_thumb_url($videos->videos_id); ?>" alt="<?php echo $videos->title;?>"> <a href="<?php echo base_url('watch/'.$videos->slug).'.html';?>" class="ico-play ico-play-sm"> <img class="img-responsive play-svg svg" src="<?php echo base_url(); ?>assets/front_end/images/play-button.svg" alt="play" onerror="this.src='<?php echo base_url(); ?>assets/front_end/images/play-button.png'"> </a>
                    <div class="overlay-div"></div>
                </div>
            </div>
      </div>
  <?php endforeach; ?>
    </div>
<style>
    #owl-demo .item{
    margin: 3px;
    }
    #owl-demo .item img{
      display: block;
      width: 100%;
      height: 100%;
    }
</style>


<script>
$(document).ready(function() { 
  $("#owl-demo").owlCarousel({ 
      autoplay: 3000, 
      items : <?php echo $slide_per_page; ?>,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [979,3],
      video: true
  }); 
});
</script>
<?php elseif($slider_type == "image"):?>
    <div class="owl-carousel owl-theme" id="owl-demo" style="margin-top: -20px;">
    <?php $all_published_slider= $this->common_model->all_published_slider();
        foreach ($all_published_slider as $slider):
    ?>
    <div>
        <div class="owl-text-overlay hidden-xs">
            <h2 class="owl-title"><?php echo $slider->title;?></h2>
            <p class="owl-caption hidden-sm"><?php echo $slider->description;?></p>
            <a class="btn btn-primary learn-more" href="<?php echo $slider->video_link;?>">Leran More</a>
        </div><img class="owl-img" src="<?php echo $slider->image_link;?>">
    </div>
<?php endforeach; ?>
</div>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $("#owl-demo").owlCarousel({
            navigation : true, 
            slideSpeed : 300,
            paginationSpeed : 500,
            items: 1,
            singleItem: true,
            autoPlay : 4000,
            lazyLoad:true
        });
    });
</script>
<style type="text/css">
.item img {
    max-height: 100%;
}
.item .latest-movie-img-container {
    max-width: 100%;
}
    #title {
      background-color: #000;
      padding: 40px 0px;
      .fa {
        color:#fff;
        font-size:40px;
        padding-left:40px;
      }
    }
    /* Ow; Slider CSS*/

    .owl-wrapper {
      positon: relative;
    }

    .owl-controls {
      position: absolute;
      bottom: 10px;
      left: 0;
      right: 0;
      margin-left: auto;
      margin-right: auto;
    }

    .owl-theme .owl-controls .owl-page span {
      background: #fff !important;
    }

    .owl-img {
      width: 100%;
    }

    .owl-text-overlay {
        position: absolute;
        /* text-align: center; */
        width: 60%;
        top: 70%;
        transform: translateY(-50%);
        left: 0;
        /* right: 0; */
        margin-left: 20px;
        margin-right: auto;
        color: #fff;
        /*background-color: rgba(0, 0, 0, 0.2);*/
        /*background: rgba(0, 0, 0, 0.4);*/
        padding-bottom: 20px;
        padding-left: 20px;
        font-family: "Open Sans", sans-serif;
        /* border-radius: 15px 50px 30px 5px; */
    }

    h2.owl-title {
      font-size: 48px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    p.owl-caption {
      font-size: 18px;
      line-height: 24px;
    }

    .owl-theme .owl-controls .owl-page span:active {
      background: #fff !important;
    }

    /* hide previous and next */

    .owl-buttons {
      visibility: hidden;
      display: none;
    }
    .learn-more{
        background-color: #2895f3;
        border-color: #398ed8;
        padding: 10px;
        font-size: 14px;
        font-weight: 600;
    }
</style>
<?php endif; ?>