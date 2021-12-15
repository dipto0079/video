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

class Live_tv extends CI_Controller {

	public function __construct(){
		parent::__construct();
		/* cache control */
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
	}

  public function index() {
		$data['all_published_slider']	= $this->common_model->all_published_slider();
		$data['new_videos']				= $this->common_model->new_published_videos();
		$data['latest_videos']			= $this->common_model->latest_published_videos();
		$data['new_tv_series']			= $this->common_model->new_published_tv_series();
		$data['latest_tv_series']		= $this->common_model->latest_published_tv_series();		
		$data['title'] 					= $this->db->get_where('config' , array('title' =>'home_page_seo_title'))->row()->value;
		$data['page_name']				= 'live_tv';
		$this->load->view('front_end/index',$data);
	}
  
	public function watch($slug){
		if ($slug == '' || $slug ==NULL) {        
            redirect('notfound');            
        }else if(!$this->live_tv_model->live_tv_is_published($slug)){
            redirect('notfound');
        }else {
            $data['watch_tv']               = $this->live_tv_model->get_live_tv_details_by_slug($slug);
            $data['title']                  = $data['watch_tv']->tv_name;
            $data['focus_keyword']          = $data['watch_tv']->focus_keyword;
            $data['meta_description']       = $data['watch_tv']->meta_description;
            $data['slug']                   = $slug;
            $data['page_name']              = 'watch_tv';
            $data['latest_videos']          = $this->common_model->latest_published_videos();
            $data['latest_tv_series']       = $this->common_model->latest_published_tv_series();    
            $this->load->view('front_end/index', $data);           
        }
	}
}