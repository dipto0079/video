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
    if ($slider_type=="movie"){
 ?>
    <div id="owl-demo" class="owl-carousel owl-theme" >
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
      itemsDesktop : [1199,4],
      itemsDesktopSmall : [979,4] 
  }); 
});
</script>
<?php }else if ($slider_type=="image"){?>
<div style="min-height: 50px; <?php if($header_templete == 'header1' || $header_templete == 'header3' || $header_templete == 'header4' ||$header_templete == 'header5'){ echo 'margin-top:-20px;';} ?>"">
    <!-- Jssor Slider Begin -->
    <div id="slider1_container" style="visibility: hidden; position: relative; margin: 0 auto;
        top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden;">
        <!-- Loading Screen -->
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block;
                top: 0px; left: 0px; width: 100%; height: 100%;">
            </div>
            <div style="position: absolute; display: block; background: url(<?php echo base_url(); ?>assets/front_end/sliders/preloader.gif) no-repeat center center;
                top: 0px; left: 0px; width: 100%; height: 100%;">
            </div>
        </div>
        <!-- Slides Container -->
        <div u="slides" style="position: absolute; left: 0px; top: 0px; width: 1300px; height: 500px; overflow: hidden;">
            <?php $all_published_slider= $this->common_model->all_published_slider();
                            foreach ($all_published_slider as $slider):
                    ?>
            <div>
                <img u="image" src2="<?php echo $slider->image_link;?>" />

                <div style="position: absolute; bottom: 90px; left: 30px; width: 30%; height: 120px; font-size: 28px; color: #fff;">
                    <a href="<?php echo $slider->video_link;?>">
                        <h2 style="color: #fff;font-weight: 600;">
                            <?php echo $slider->title;?>
                        </h2>
                    </a>
                </div>
                <div style="position: absolute; bottom: 20px; left: 30px; width: 30%; height: 120px; color: #fff; font-weight: 100;">
                    <?php echo $slider->description;?>

                </div>

            </div>
            <?php endforeach; ?>
        </div>
        <style>
            .jssorb21 {
                position: absolute;
            }

            .jssorb21 div,
            .jssorb21 div:hover,
            .jssorb21 .av {
                position: absolute;
                /* size of bullet elment */
                width: 19px;
                height: 19px;
                text-align: center;
                line-height: 19px;
                color: white;
                font-size: 12px;
                background: url(<?php echo base_url();
                ?>assets/front_end/sliders/b21.png) no-repeat;
                overflow: hidden;
                cursor: pointer;
            }

            .jssorb21 div {
                background-position: -5px -5px;
            }

            .jssorb21 div:hover,
            .jssorb21 .av:hover {
                background-position: -35px -5px;
            }

            .jssorb21 .av {
                background-position: -65px -5px;
            }

            .jssorb21 .dn,
            .jssorb21 .dn:hover {
                background-position: -95px -5px;
            }
        </style>
        <!-- bullet navigator container -->
        <div u="navigator" class="jssorb21" style="bottom: 26px; right: 6px;">
            <!-- bullet navigator item prototype -->
            <div u="prototype"></div>
        </div>
        <style>
            .jssora21l,
            .jssora21r {
                display: block;
                position: absolute;
                /* size of arrow element */
                width: 55px;
                height: 55px;
                cursor: pointer;
                background: url(<?php echo base_url();
                ?>assets/front_end/sliders/b21.png) center center no-repeat;
                overflow: hidden;
            }

            .jssora21l {
                background-position: -3px -33px;
            }

            .jssora21r {
                background-position: -63px -33px;
            }

            .jssora21l:hover {
                background-position: -123px -33px;
            }

            .jssora21r:hover {
                background-position: -183px -33px;
            }

            .jssora21l.jssora21ldn {
                background-position: -243px -33px;
            }

            .jssora21r.jssora21rdn {
                background-position: -303px -33px;
            }
        </style>
        <!-- Arrow Left -->
        <span u="arrowleft" class="jssora21l" style="top: 123px; left: 8px;">
            </span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssora21r" style="top: 123px; right: 8px;">
            </span>
        <!--#endregion Arrow Navigator Skin End -->
    </div>
    <!-- Jssor Slider End -->
</div>

 <script>
        jQuery(document).ready(function($) {
            var options = {
                $FillMode: 2, //[Optional] The way to fill image in slide, 0 stretch, 1 contain (keep aspect ratio and put all inside slide), 2 cover (keep aspect ratio and cover whole slide), 4 actual size, 5 contain for large image, actual size for small image, default value is 0
                $AutoPlay: 1, //[Optional] Auto play or not, to enable slideshow, this option must be set to greater than 0. Default value is 0. 0: no auto play, 1: continuously, 2: stop at last slide, 4: stop on click, 8: stop on user navigation (by arrow/bullet/thumbnail/drag/arrow key navigation)
                $Idle: 4000, //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1, //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                $ArrowKeyNavigation: true, //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideEasing: $Jease$.$OutQuint, //[Optional] Specifies easing for right to left animation, default value is $Jease$.$OutQuad
                $SlideDuration: 800, //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20, //[Optional] Minimum drag offset to trigger slide , default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 0, //[Optional] Space between each slide in pixels, default value is 0
                $Cols: 1, //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0, //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1, //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1, //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 1, //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $Cols is greater than 1, or parking position is not 0)

                $BulletNavigatorOptions: { //[Optional] Options to specify and enable navigator or not
                    $Class: $JssorBulletNavigator$, //[Required] Class to create navigator instance
                    $ChanceToShow: 2, //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 1, //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1, //[Optional] Steps to go for each navigation request, default value is 1
                    $Rows: 1, //[Optional] Specify lanes to arrange items, default value is 1
                    $SpacingX: 8, //[Optional] Horizontal space between each item in pixel, default value is 0
                    $SpacingY: 8, //[Optional] Vertical space between each item in pixel, default value is 0
                    $Orientation: 1, //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                    $Scale: false //Scales bullets navigator or not while slider scale
                },

                $ArrowNavigatorOptions: { //[Optional] Options to specify and enable arrow navigator or not
                    $Class: $JssorArrowNavigator$, //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 1, //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 2, //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1 //[Optional] Steps to go for each navigation request, default value is 1
                }
            };

            var jssor_slider1 = new $JssorSlider$("slider1_container", options);
            function ScaleSlider() {
                var bodyWidth = document.body.clientWidth;
                if (bodyWidth)
                    jssor_slider1.$ScaleWidth(Math.min(bodyWidth, 1920));
                else
                    window.setTimeout(ScaleSlider, 30);
            }
            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
    </script>
    <script src="<?php echo base_url(); ?>assets/front_end/js/jssor.slider.mini.js"></script>
<?php }else if ($slider_type=="disable"){
    echo '<!-- slider is disabled by administrator -->';
}

?>

