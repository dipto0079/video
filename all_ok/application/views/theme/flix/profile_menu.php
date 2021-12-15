<?php
    $header_templete                =   ovoo_config('header_templete');
    $theme_dir                      =   'theme/'.ovoo_config('active_theme').'/';
    $profile_info                   = $this->db->get_where('user', array('user_id' => $this->session->userdata('user_id')))->row();
?>
<ul class="nav nav-tabs">
    <li>
        <div class="user-info">
            <div class="profile-picture">
                <img src="<?php echo $this->common_model->get_img('user', $profile_info->user_id).'?'.time(); ?>" alt="<?php echo $profile_info->name; ?>">
            </div>
            <span class="user-name"><?php echo $profile_info->name; ?></span>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo $page_name == 'profile'? 'active':''?>" href="<?php echo base_url('my-account/profile'); ?>"><?php echo trans("profile");?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo $page_name == 'subscription'? 'active':''?>" href="<?php echo base_url('my-account/subscription'); ?>"><?php echo trans("my_subscription");?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo $page_name == 'favorite'? 'active':''?>" href="<?php echo base_url('my-account/favorite'); ?>"><?php echo trans("favorite");?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo $page_name == 'watch_later'? 'active':''?>" href="<?php echo base_url('my-account/watch-later'); ?>"><?php echo trans("watch_later");?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo $page_name == 'update_profile'? 'active':''?>" href="<?php echo base_url('my-account/update'); ?>"><?php echo trans("update_profile");?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo $page_name == 'change_password'? 'active':''?>" href="<?php echo base_url('my-account/change-password'); ?>"> <?php echo trans("change_password");?></a>
    </li>
</ul>