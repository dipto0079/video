<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Ovoo-Movie & Video Stremaing CMS Pro
 * ----------------------------- OVOO -----------------------------
 * -------------- Movie & Video Stremaing CMS Pro -----------------
 * -------- Professional video content management system ----------
 *
 * @package     OVOO-Movie & Video Stremaing CMS Pro
 * @author      Abdul Mannan/Spa Green Creative
 * @copyright   Copyright (c) 2014 - 2017 SpaGreen,
 * @license     http://codecanyon.net/wiki/support/legal-terms/licensing-terms/ 
 * @link        http://www.spagreen.net
 * @link        support@spagreen.net
 *
 **/

 
class Watch extends CI_Controller{
    public function index($slug='',$param1='',$param2=''){

        if ($slug == '') {        
         redirect('notfound');            
        }else if(count($this->db->get_where('videos', array('slug' => $slug))->result_array())<1){
            redirect('notfound');
        }else {        	
            $data['videos_id']              = $this->common_model->get_videos_id_by_slug($slug);
            if(!$this->common_model->is_video_published($data['videos_id']))
                redirect('notfound');
            $this->common_model->watch_count_by_slug($slug);
            $data['watch_videos']           = $this->common_model->get_videos_by_slug($slug);
            $data['title']                  = $data['watch_videos']->title;
            $data['focus_keyword']          = $data['watch_videos']->focus_keyword;
            $data['meta_description']       = $data['watch_videos']->meta_description;
            $data['download_links']         = $this->db->get_where('download_link', array("videos_id"=>$data['videos_id']))->result_array();
            $data['total_download_links']   = count($data['download_links']);
            $data['video_files']            = $this->db->get_where('video_file', array('videos_id'=> $data['videos_id']))->result_array();
            $data['total_video_files']      = count($data['video_files']);
            $data['total_episodes']         = $this->db->get_where('episodes', array('videos_id'=> $data['videos_id']))->num_rows();
            $data['slug']                   = $slug;
            $data['param1']                 = $param1;
            $data['param2']                 = $param2;
            $data['page_name']              = 'watch';
            $this->load->view('front_end/index', $data);           
        }
    }

}