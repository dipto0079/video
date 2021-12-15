<?php $active_menu=$this->session->userdata('active_menu');
?>
 <!-- Side-Nav-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <ul class="app-menu">
    <li><a class="app-menu__item <?php if($active_menu==1) {echo "active"; } ?>" href="<?php echo base_url()."admin/dashboard";?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">DASHBOARD</span></a> </li>
    <li class="treeview <?php if($active_menu==6 || $active_menu==8 || $active_menu==9) {echo "is-expanded"; } ?>"> <a href="#" class="app-menu__item" data-toggle="treeview"><i class="app-menu__icon fa fa-video-camera" aria-hidden="true"></i><span class="app-menu__label">MOVIE :: VIDEOS</span><i class="treeview-indicator fa fa-angle-right"></i> </a>
      <ul class="treeview-menu">
        <li><a class="treeview-item <?php if($active_menu==6) {echo "active"; } ?>" href="<?php echo base_url().'admin/videos_add/'?>"><i class="app-menu__icon fa fa-plus"></i>NEW MOVIE / VIDEO</span> </a></li>
        <li><a class="treeview-item <?php if($active_menu==8) {echo "active"; } ?>" href="<?php echo base_url().'admin/videos/'?>"><i class="app-menu__icon fa fa-list"></i> ALL MOVIE / VIDEOS</span> </a></li>
        <li><a class="treeview-item <?php if($active_menu==9) {echo "active"; } ?>" href="<?php echo base_url().'admin/video_type/'?>"><i class="app-menu__icon fa fa-tags"></i> MOVIE / VIDEO TYPE </span> </a></li>
      </ul>
    </li>
    <li class="treeview <?php if($active_menu==28 || $active_menu==29 || $active_menu==30) {echo "is-expanded"; } ?>"> <a href="#" class="app-menu__item" data-toggle="treeview"><i class="app-menu__icon fa fa-film" aria-hidden="true"></i><span class="app-menu__label">TV SERIES</span><i class="treeview-indicator fa fa-angle-right"></i> </a>
      <ul class="treeview-menu">
        <li><a class="treeview-item <?php if($active_menu==29) {echo "active"; } ?>" href="<?php echo base_url().'admin/tvseries_add/'?>"><i class="app-menu__icon fa fa-plus" aria-hidden="true"></i>NEW TV SERIES</span> </a></li>
        <li><a class="treeview-item <?php if($active_menu==30) {echo "active"; } ?>" href="<?php echo base_url().'admin/tvseries/'?>"><i class="app-menu__icon fa fa-list" aria-hidden="true"></i> ALL TV SERIES</span> </a></li>
        <li><a class="treeview-item <?php if($active_menu==28) {echo "active"; } ?>" href="<?php echo base_url().'admin/tv_series_setting/'?>"><i class="app-menu__icon fa fa-gear" aria-hidden="true"></i>SETTING</span> </a></li>
      </ul>
    </li>
    <li class="treeview <?php if($active_menu==26 || $active_menu==27 || $active_menu==35 || $active_menu==39) {echo "is-expanded"; } ?>"> <a href="#" class="app-menu__item" data-toggle="treeview"><i class="app-menu__icon fa fa-tv" aria-hidden="true"></i><span class="app-menu__label">TV&nbsp;<span class="label label-danger">Live</span></span><i class="treeview-indicator fa fa-angle-right"></i> </a>
      <ul class="treeview-menu">
        <li><a class="treeview-item <?php if($active_menu==35) {echo "active"; } ?>" href="<?php echo base_url().'admin/manage_live_tv/new'?>"><i class="app-menu__icon fa fa-plus" aria-hidden="true"></i>NEW TV CHANNEL</span> </a></li>
        <li><a class="treeview-item <?php if($active_menu==26) {echo "active"; } ?>" href="<?php echo base_url().'admin/manage_live_tv/'?>"><i class="app-menu__icon fa fa-list" aria-hidden="true"></i> ALL TV CHANNEL</span> </a></li>
        <li><a class="treeview-item <?php if($active_menu==39) {echo "active"; } ?>" href="<?php echo base_url().'admin/live_tv_category/'?>"><i class="app-menu__icon fa fa-tags" aria-hidden="true"></i> CATEGORY </span> </a></li>
        <li> <a class="treeview-item <?php if($active_menu==27) {echo "active"; } ?>" href="<?php echo base_url().'admin/live_tv_setting/'?>"><i class="app-menu__icon fa fa-gear" aria-hidden="true"></i>SETTING</span> </a></li>
      </ul>
    </li>
    <li><a class="app-menu__item <?php if($active_menu==7) {echo "active"; } ?>" href="<?php echo base_url().'admin/movie_importer/'?>"><i class="app-menu__icon fa fa-search" aria-hidden="true"></i><span class="app-menu__label">SEARCH & IMPORT</span> </a></li>
    <li><a class="app-menu__item <?php if($active_menu==77) {echo "active"; } ?>" href="<?php echo base_url().'admin/movie_scrapper_manage/'?>"><i class="app-menu__icon fa fa-clone" aria-hidden="true"></i><span class="app-menu__label">MOVIE SCRAPPER</span> </a></li>
    <li><a class="app-menu__item <?php if($active_menu==2) {echo "active"; } ?>" href="<?php echo base_url();?>admin/country"><i class="app-menu__icon fa fa-globe"></i><span class="app-menu__label">COUNTRY</span></a> </li>
    <li><a class="app-menu__item <?php if($active_menu==3) {echo "active"; } ?>" href="<?php echo base_url();?>admin/genre"><i class="app-menu__icon fa fa-archive"></i><span class="app-menu__label">GENRE</span></a> </li>
    <li class="treeview <?php if($active_menu==4 || $active_menu==5 ) {echo "is-expanded"; } ?>"> <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-stack-overflow"></i><span class="app-menu__label">SLIDER</span><i class="treeview-indicator fa fa-angle-right"></i> </a>
      <ul class="treeview-menu">
        <li><a class="treeview-item <?php if($active_menu==4) {echo "active"; } ?>" href="<?php echo base_url().'admin/slider/'?>"><i class="app-menu__icon fa fa-stack-overflow"></i>IMAGE SLIDER</span> </a></li>
        <li><a class="treeview-item <?php if($active_menu==5) {echo "active"; } ?>" href="<?php echo base_url().'admin/slider_setting/'?>"><i class="app-menu__icon fa fa-gears" aria-hidden="true"></i>SLIDER SETTING</span> </a></li>
      </ul>
    </li>
    <li class="treeview <?php if($active_menu==31 || $active_menu==32 || $active_menu==33) {echo "is-expanded"; } ?>"> <a href="#" class="app-menu__item" data-toggle="treeview"><i class="app-menu__icon fa fa-comment"></i><span class="app-menu__label">COMMENTS</span><i class="treeview-indicator fa fa-angle-right"></i> </a>
      <ul class="treeview-menu">
        <li><a class="treeview-item <?php if($active_menu==31) {echo "active"; } ?>" href="<?php echo base_url().'admin/comments/'?>"><i class="app-menu__icon fa fa-comments"></i>MOVIE/TV COMMENTS</span> </a></li>
        <li><a class="treeview-item <?php if($active_menu==33) {echo "active"; } ?>" href="<?php echo base_url().'admin/comments/post_comments'?>"><i class="app-menu__icon fa fa-comments"></i>POST COMMENTS</span> </a></li>
        <li><a class="treeview-item <?php if($active_menu==32) {echo "active"; } ?>" href="<?php echo base_url().'admin/comments_setting/'?>"><i class="app-menu__icon fa fa-gears"></i>COMMENTS SETTING</span> </a></li>
      </ul>
    </li>
                 
    <li class="treeview <?php if($active_menu==10 || $active_menu==11) {echo "is-expanded"; } ?>"> <a href="#" class="app-menu__item" data-toggle="treeview"><i class="app-menu__icon fa fa-file" aria-hidden="true"></i><span class="app-menu__label">PAGES</span><i class="treeview-indicator fa fa-angle-right"></i> </a>
      <ul class="treeview-menu">
        <li><a class="treeview-item <?php if($active_menu==10) {echo "active"; } ?>" href="<?php echo base_url().'admin/pages_add/'?>"><i class="app-menu__icon fa fa-plus" aria-hidden="true"></i>NEW PAGE</span> </a></li>
        <li><a class="treeview-item <?php if($active_menu==11) {echo "active"; } ?>" href="<?php echo base_url().'admin/pages/'?>"><i class="app-menu__icon fa fa-list" aria-hidden="true"></i> ALL PAGE </span> </a></li>
      </ul>
    </li>
    <li class="treeview <?php if($active_menu==12 || $active_menu==13 || $active_menu==14) {echo "is-expanded"; } ?>"> <a href="#" class="app-menu__item" data-toggle="treeview"><i class="app-menu__icon  fa fa-pencil-square-o" aria-hidden="true"></i><span class="app-menu__label">POST</span> <i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item <?php if($active_menu==12) {echo "active"; } ?>" href="<?php echo base_url().'admin/posts_add/'?>"><i class="app-menu__icon fa fa-plus" aria-hidden="true"></i>NEW POST</span> </a></li>
        <li><a class="treeview-item <?php if($active_menu==13) {echo "active"; } ?>" href="<?php echo base_url().'admin/posts/'?>"><i class="app-menu__icon fa fa-list" aria-hidden="true"></i> ALL POST </span> </a></li>
        <li><a class="treeview-item <?php if($active_menu==14) {echo "active"; } ?>" href="<?php echo base_url().'admin/post_category/'?>"><i class="app-menu__icon fa fa-tags" aria-hidden="true"></i> CATEGORY </span> </a></li>
      </ul>
    </li>
    
    <li><a class="app-menu__item <?php if($active_menu==25) {echo "active"; } ?>" href="<?php echo base_url().'admin/manage_star'?>"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">ACTOR / DIRECTOR..</span></a></li>
    <li><a class="app-menu__item <?php if($active_menu==15) {echo "active"; } ?>" href="<?php echo base_url().'admin/manage_user'?>"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">USERS</span></a></li>
    <li class="treeview <?php if($active_menu==16 || $active_menu==17 || $active_menu==18 || $active_menu==19 || $active_menu==20 || $active_menu==21 || $active_menu==22 || $active_menu==24 || $active_menu==34 || $active_menu==35 || $active_menu==78 || $active_menu==160) {echo "is-expanded"; } ?>"> <a href="#" class="app-menu__item" data-toggle="treeview"><i class="app-menu__icon fa fa-gears" aria-hidden="true"></i><span class="app-menu__label">SETTING</span> <i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item <?php if($active_menu==160) {echo "active"; } ?>" href="<?php echo base_url().'admin/system_setting/'?>"><i class="app-menu__icon fa fa-gear" aria-hidden="true"></i>SYSTEM SETTING</span> </a></li>
        <li><a class="treeview-item <?php if($active_menu==16) {echo "active"; } ?>" href="<?php echo base_url().'admin/theme_options/'?>"><i class="app-menu__icon fa fa-gear" aria-hidden="true"></i>THEME OPTIONS</span> </a></li>
        <li><a class="treeview-item <?php if($active_menu==17) {echo "active"; } ?>" href="<?php echo base_url().'admin/email_setting/'?>"><i class="app-menu__icon fa fa-envelope" aria-hidden="true"></i>EMAIL SETTING</span> </a></li>
        <li><a class="treeview-item <?php if($active_menu==18) {echo "active"; } ?>" href="<?php echo base_url().'admin/logo_setting/'?>"><i class="app-menu__icon fa fa-picture-o" aria-hidden="true"></i> LOGO &amp; FAVICON</span> </a></li>
        <li><a class="treeview-item <?php if($active_menu==19) {echo "active"; } ?>" href="<?php echo base_url().'admin/footer_setting/'?>"><i class="app-menu__icon fa fa-list-alt" aria-hidden="true"></i> FOOTER CONTENT </span> </a></li>
        <li><a class="treeview-item <?php if($active_menu==20) {echo "active"; } ?>" href="<?php echo base_url().'admin/seo_setting/'?>"><i class="app-menu__icon fa fa-facebook" aria-hidden="true"></i> SEO &amp; SOCIALS </span> </a></li>
        <li><a class="treeview-item <?php if($active_menu==21) {echo "active"; } ?>" href="<?php echo base_url().'admin/ad_setting/'?>"><i class="app-menu__icon fa fa-dollar" aria-hidden="true"></i> ADS &amp; BANNER </span> </a></li>
        <li><a class="treeview-item <?php if($active_menu==22) {echo "active"; } ?>" href="<?php echo base_url().'admin/social_login_setting/'?>"><i class="app-menu__icon fa fa-dollar" aria-hidden="true"></i> SOCIAL LOGIN</span> </a></li>
        <li><a class="treeview-item <?php if($active_menu==24) {echo "active"; } ?>" href="<?php echo base_url().'admin/video_quality/'?>"><i class="app-menu__icon fa fa-signal" aria-hidden="true"></i> MOVIE / VIDEO QUALITY </span> </a></li>
        <li><a class="treeview-item <?php if($active_menu==34) {echo "active"; } ?>" href="<?php echo base_url().'admin/player_setting/'?>"><i class="app-menu__icon fa fa-gear" aria-hidden="true"></i>PLAYER OPTIONS</span> </a></li>
        <li><a class="treeview-item <?php if($active_menu==35) {echo "active"; } ?>" href="<?php echo base_url().'admin/copyright_privacy/'?>"><i class="app-menu__icon fa fa-copyright" aria-hidden="true"></i>COPYRIGHT & PRIVACY</span> </a></li>
        <li><a class="treeview-item <?php if($active_menu==78) {echo "active"; } ?>" href="<?php echo base_url().'admin/cron_setting/'?>"><i class="app-menu__icon fa fa-clock-o" aria-hidden="true"></i>CRON SETTING</span> </a></li>
        <li><a class="treeview-item <?php if($active_menu==161) {echo "active"; } ?>" href="<?php echo base_url().'admin/update/'?>"><i class="app-menu__icon fa fa-upload" aria-hidden="true"></i>UPDATE</span> </a></li>

      </ul>
      <li class="treeview <?php if($active_menu == 36 || $active_menu == 37) {echo "is-expanded"; } ?>"> <a href="#" class="app-menu__item" data-toggle="treeview"><i class="app-menu__icon fa fa-bell" aria-hidden="true"></i><span class="app-menu__label">NOTIFICATION</span> <i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a class="treeview-item <?php if($active_menu==37) {echo "active"; } ?>" href="<?php echo base_url().'admin/send_push_notification/'?>"><i class="app-menu__icon fa fa-paper-plane-o" aria-hidden="true"></i>SEND NOTIFICATION</span> </a></li>
          <li><a class="treeview-item <?php if($active_menu==36) {echo "active"; } ?>" href="<?php echo base_url().'admin/push_notification_setting/'?>"><i class="app-menu__icon fa fa-gear" aria-hidden="true"></i>PUSH NOTIFICATION</span> </a></li>
        </ul>
      </li>
    </li>
    <li><a class="app-menu__item <?php if($active_menu==23) {echo "active"; } ?>" href="<?php echo base_url().'admin/backup_restore'?>"><i class="app-menu__icon fa fa-database"></i><span class="app-menu__label">BACKUP</span></a></li>
  </ul>
</aside>
        