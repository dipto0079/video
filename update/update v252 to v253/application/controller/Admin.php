<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * Ovoo-Movie & Video Stremaing CMS Pro
 * ---------------------- OVOO --------------------
 * ------- Movie & Video Stremaing CMS Pro --------
 * - Professional video content management system -
 *
 * @package     OVOO-Movie & Video Stremaing CMS Pro
 * @author      Abdul Mannan/Spa Green Creative
 * @copyright   Copyright (c) 2014 - 2017 SpaGreen,
 * @license     http://codecanyon.net/wiki/support/legal-terms/licensing-terms/ 
 * @link        http://www.spagreen.net
 * @link        support@spagreen.net
 *
 **/


class Admin extends CI_Controller {   
    
    function __construct() {
        parent::__construct();
        $this->load->model('common_model');
        $this->load->database();
        //cache controling
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        
    }
    
    //default index function, redirects to login/dashboard 
    public function index(){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($this->session->userdata('admin_is_login') == 1)
            redirect(base_url() . 'admin/dashboard', 'refresh');
    }
    
    //dashboard
    function dashboard(){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
		/* start menu active/inactive section*/
        $this->session->unset_userdata('active_menu');
        $this->session->set_userdata('active_menu', '1');
        /* end menu active/inactive section*/
        $data['page_name']             = 'dashboard';
        $data['page_title']            = 'Admin Dashboard';
        $this->load->view('admin/index', $data);		
			
    }


    //  country
    function country($param1 = '', $param2 = ''){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
        // start menu active/inactive section
        $this->session->unset_userdata('active_menu');
        $this->session->set_userdata('active_menu', '2');
        // end menu active/inactive section
        
        if ($param1 == 'add') {
            $data['name']           = $this->input->post('name');
            $data['description']    = $this->input->post('description');
            $data['slug']           = url_title($this->input->post('name'), 'dash', TRUE);
            $data['publication']    = $this->input->post('publication');          
            
            $this->db->insert('country', $data);
            $this->session->set_flashdata('success', 'Country added successed');
            redirect(base_url() . 'admin/country/', 'refresh');
        }
            
        if ($param1 == 'update') {
            $data['name']           = $this->input->post('name');
            $data['description']    = $this->input->post('description');
            $data['slug']           = url_title($this->input->post('name'), 'dash', TRUE);
            $data['publication']    = $this->input->post('publication');

            $this->db->where('country_id', $param2);
            $this->db->update('country', $data);
            $this->session->set_flashdata('success', 'Country update successed.');
            redirect(base_url() . 'admin/country/', 'refresh');
        }        
        $data['page_name']      = 'country_manage';
        $data['page_title']     = 'Country Management';
        $data['countries']    = $this->db->get('country')->result_array(); 
        $this->load->view('admin/index', $data);
    }

    // genre
    function genre($param1 = '', $param2 = ''){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
        /* start menu active/inactive section*/
        $this->session->unset_userdata('active_menu');
        $this->session->set_userdata('active_menu', '3');
        /* end menu active/inactive section*/ 
        
        if ($param1 == 'add') {
            $data['name']           = $this->input->post('name');
            $data['description']    = $this->input->post('description');
            $data['slug']           = url_title($this->input->post('name'), 'dash', TRUE);
            $data['publication']    = $this->input->post('publication');          
            
            $this->db->insert('genre', $data);
            $this->session->set_flashdata('success', 'Genre added successed');
            redirect(base_url() . 'admin/genre/', 'refresh');
        }
            
        if ($param1 == 'update') {
            $data['name']           = $this->input->post('name');
            $data['description']    = $this->input->post('description');
            $data['slug']           = url_title($this->input->post('name'), 'dash', TRUE);
            $data['publication']    = $this->input->post('publication');

            $this->db->where('genre_id', $param2);
            $this->db->update('genre', $data);
            $this->session->set_flashdata('success', 'Genre update successed.');
            redirect(base_url() . 'admin/genre/', 'refresh');
        }        
        $data['page_name']      = 'genre_manage';
        $data['page_title']     = 'Genre Management';
        $data['genres']    = $this->db->get('genre')->result_array(); 
        $this->load->view('admin/index', $data);
    }

    function slider_setting($param1 = '', $param2 = ''){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
            /* start menu active/inactive section*/
            $this->session->unset_userdata('active_menu');
            $this->session->set_userdata('active_menu', '5');
            /* end menu active/inactive section*/
        if ($param1 == 'update') {
            $slider_type  = $this->input->post('slider_type');
            if($slider_type=='movie'){
                $data['value']    =   $slider_type;
                $this->db->where('title' , 'slider_type');
                $this->db->update('config' , $data);
                $data['value'] =   $this->input->post('total_movie_in_slider');
                $this->db->where('title' , 'total_movie_in_slider');
                $this->db->update('config' , $data);
                
                $data['value'] =   $this->input->post('slide_per_page');
                $this->db->where('title' , 'slide_per_page');
                $this->db->update('config' , $data);
                $this->session->set_flashdata('success', 'Slider setting update successed');
                redirect(base_url() . 'admin/slider_setting/', 'refresh');
            }else if($slider_type=='image'){
                $data['value']= 'image';
                $this->db->where('title' , 'slider_type');
                $this->db->update('config' , $data);
                $this->session->set_flashdata('success', 'Slider setting update successed');
                redirect(base_url() . 'admin/slider_setting/', 'refresh');
            }else if($slider_type=='disable'){
                $data['value']= 'disable';
                $this->db->where('title' , 'slider_type');
                $this->db->update('config' , $data);
                $this->session->set_flashdata('success', 'Slider setting update successed');
                redirect(base_url() . 'admin/slider_setting/', 'refresh');
            }            
        }
        $data['page_name']      = 'slider_setting';
        $data['page_title']     = 'Slider Setting';
        $this->load->view('admin/index', $data);
    }

    // slider
    function slider($param1 = '', $param2 = ''){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
            /* start menu active/inactive section*/
            $this->session->unset_userdata('active_menu');
            $this->session->set_userdata('active_menu', '4');
            /* end menu active/inactive section*/ 
        
        if ($param1 == 'add') {
            $data['title']              =   $this->input->post('title');
            $data['description']        =   $this->input->post('description');
            $data['video_link']         =   $this->input->post('video_link');
            $data['image_link']         =   base_url().'uploads/no_image.jpg';
            
            if($this->input->post('image_link')!=''){                
                $data['image_link']     =   $this->input->post('image_link');
            } 

            $data['slug']               =   url_title($this->input->post('title'), 'dash', TRUE);
            $data['publication']        =   $this->input->post('publication');          
            
            $this->db->insert('slider', $data);
            $insert_id = $this->db->insert_id();
            if(isset($_FILES['image']) && $_FILES['image']['name']!=''){
                move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/sliders/slider-'.$insert_id.'.jpg');
                $data['image_link']     =       base_url().'uploads/sliders/slider-'.$insert_id.'.jpg';
            }
            $this->db->where('slider_id', $insert_id);
            $this->db->update('slider', $data);
            
            $this->session->set_flashdata('success', 'Slider added successed');
            redirect(base_url() . 'admin/slider/', 'refresh');
        }
           
        if ($param1 == 'update') {
            $data['title']              =   $this->input->post('title');
            $data['description']        =   $this->input->post('description');
            $data['video_link']         =   $this->input->post('video_link');
            //$data['image_link']         =   base_url().'uploads/no_image.jpg';
            
            if($this->input->post('image_link')!=''){                
                $data['image_link']  = $this->input->post('image_link');
            }

            if(isset($_FILES['image']) && $_FILES['image']['name']!=''){
                move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/sliders/slider-'.$param2.'.jpg');
                $data['image_link']     =       base_url().'uploads/sliders/slider-'.$param2.'.jpg';
            }
            $data['slug']               = url_title($this->input->post('title'), 'dash', TRUE);
            $data['publication']        = $this->input->post('publication');

            $this->db->where('slider_id', $param2);
            $this->db->update('slider', $data);
            $this->session->set_flashdata('success', 'Slider update successed.');
            redirect(base_url() . 'admin/slider/', 'refresh');
        }        
        $data['page_name']      = 'slider_manage';
        $data['page_title']     = 'Slider Management';
        $data['sliders']    = $this->db->get('slider')->result_array(); 
        $this->load->view('admin/index', $data);
    }
    // add videos or movies 
    function videos_add(){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
        // start menu active/inactive section
        $this->session->unset_userdata('active_menu');
        $this->session->set_userdata('active_menu', '6');
        // end menu active/inactive section
        $data['page_name']      = 'videos_add';
        $data['page_title']     = 'Videos Add'; 
        $this->load->view('admin/index', $data);
    }

    // edit videos or movies 
    function videos_edit($param1='',$param2=''){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
            /* start menu active/inactive section*/
            $this->session->unset_userdata('active_menu');
            $this->session->set_userdata('active_menu', '6');
            /* end menu active/inactive section*/
            $data['param1']         = $param1;
            $data['param2']         = $param2;
            $data['page_name']      = 'videos_edit';
            $data['page_title']     = 'Videos Edit => <strong>'.$this->common_model->get_title_by_videos_id($param1).'</strong>';
            $this->load->view('admin/index', $data);
    }

    // add,edit videos or movies 
    function videos($param1 = '', $param2 = ''){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
        /* start menu active/inactive section*/
        $this->session->unset_userdata('active_menu');
        $this->session->set_userdata('active_menu', '8');
        /* end menu active/inactive section*/             
        
        if ($param1 == 'add') {
            $data['imdbid']                 = $this->input->post('imdbid');          
            $data['title']                  = $this->input->post('title');
            $data['description']            = $this->input->post('description');            
            $actors                         = $this->input->post('actor');            
            $directors                      = $this->input->post('director');            
            $writers                        = $this->input->post('writer');            
            $countries                      = $this->input->post('country');            
            $genres                         = $this->input->post('genre');
            $video_types                    = $this->input->post('video_type');
            if($actors !='' && $actors !=NULL){
                $data['stars']              = implode(',',$actors);
            }
            if($directors !='' && $directors !=NULL){
                $data['director']           = implode(',',$directors);
            }
            if($writers !='' && $writers !=NULL){
                $data['writer']             = implode(',',$writers);
            }
            if($countries !='' && $countries !=NULL){
                $data['country']            = implode(',',$countries);
            }
            if($genres !='' && $genres !=NULL){
                $data['genre']              = implode(',',$genres);
            }
            if($video_types !='' && $video_types !=NULL){
                $data['video_type']              = implode(',',$video_types);
            }

            $data['imdb_rating']        = $this->input->post('rating');
            $data['release']            = $this->input->post('release');
            
            
            $data['runtime']            = $this->input->post('runtime');
            $data['video_quality']      = $this->input->post('video_quality');
            $data['publication']        = '0';
            if(isset($_POST['publication'])) {
                $data['publication']    = '1';
            }
            
            $data['enable_download']    = '0';
            if(isset($_POST['enable_download'])) {
                $data['enable_download']    = '1';
            }
            $data['focus_keyword']      = $this->input->post('focus_keyword');
            $data['meta_description']   = $this->input->post('meta_description');
            $data['tags']               = $this->input->post('tags');       
                        
            $this->db->insert('videos', $data);
            $insert_id = $this->db->insert_id();
            $slug                       = url_title($this->input->post('slug'), 'dash', TRUE);
            $slug_num                   = $this->common_model->slug_num('videos',$slug);
            if($slug_num > 0){
                $slug= $slug.'-'.$insert_id;
            }
            $data_update['slug']               = $slug;            
            if(isset($_FILES['thumbnail']) && $_FILES['thumbnail']['name']!=''){
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], 'uploads/video_thumb/'.$insert_id.'.jpg');                
            }

            if(isset($_FILES['poster_file']) && $_FILES['poster_file']['name']!=''){
                move_uploaded_file($_FILES['poster_file']['tmp_name'], 'uploads/poster_image/'.$insert_id.'.jpg');                                
            }

            if($this->input->post('thumb_link')!=''){ 
                $image_source =$this->input->post('thumb_link');
                $save_to = 'uploads/video_thumb/'.$insert_id.'.jpg';           
                $this->common_model->grab_image($image_source,$save_to);
            }

            if($this->input->post('poster_link')!=''){ 
                $image_source =$this->input->post('poster_link');
                $save_to = 'uploads/poster_image/'.$insert_id.'.jpg';           
                $this->common_model->grab_image($image_source,$save_to);
            }

            $this->db->where('videos_id', $insert_id);
            $this->db->update('videos', $data_update);
            $this->load->model('email_model');
            $this->email_model->new_movie_notification($insert_id);
            $this->session->set_flashdata('success', 'Video added successed');
            redirect(base_url() . 'admin/file_and_download/'.$insert_id, 'refresh');
        }
        else if ($param1 == 'update') {

            $data['imdbid']                 = $this->input->post('imdbid');          
            $data['title']                  = $this->input->post('title');
            $data['description']            = $this->input->post('description');            
            $actors                         = $this->input->post('actor');            
            $directors                      = $this->input->post('director');            
            $writers                        = $this->input->post('writer');            
            $countries                      = $this->input->post('country');            
            $genres                         = $this->input->post('genre');
            $video_types                    = $this->input->post('video_type');
            if($actors !='' && $actors !=NULL){
                $data['stars']              = implode(',',$actors);
            }
            if($directors !='' && $directors !=NULL){
                $data['director']           = implode(',',$directors);
            }
            if($writers !='' && $writers !=NULL){
                $data['writer']             = implode(',',$writers);
            }
            if($countries !='' && $countries !=NULL){
                $data['country']            = implode(',',$countries);
            }
            if($genres !='' && $genres !=NULL){
                $data['genre']              = implode(',',$genres);
            }
            if($video_types !='' && $video_types !=NULL){
                $data['video_type']              = implode(',',$video_types);
            }            
            
            $data['imdb_rating']        = $this->input->post('rating');
            $data['release']            = $this->input->post('release');            
            $data['runtime']            = $this->input->post('runtime');
            $data['video_quality']      = $this->input->post('video_quality');
            $publication = $this->input->post('publication');
            if($publication =='on'){
                $data['publication'] = '1';
            }else{
                $data['publication'] = '0';
            }
            $enable_download            = $this->input->post('enable_download');
            if($enable_download =='on'){
                $data['enable_download'] = '1';
            }else{
                $data['enable_download'] = '0';
            }            
            $data['focus_keyword']      = $this->input->post('focus_keyword');
            $data['meta_description']   = $this->input->post('meta_description');
            $data['tags']               = $this->input->post('tags');
            $this->db->where('videos_id', $param2);
            $this->db->update('videos', $data);
            $this->db->where('videos_id', $param2);

            $slug                       = url_title($this->input->post('slug'), 'dash', TRUE);
            $slug_num                   = $this->common_model->slug_num('videos',$slug);
            if($slug_num > 1){
                $slug= $slug.'-'.$param2;
            }
            $data_update['slug']               = $slug;            
            if(isset($_FILES['thumbnail']) && $_FILES['thumbnail']['name']!=''){
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], 'uploads/video_thumb/'.$param2.'.jpg');                
            }

            if(isset($_FILES['poster_file']) && $_FILES['poster_file']['name']!=''){
                move_uploaded_file($_FILES['poster_file']['tmp_name'], 'uploads/poster_image/'.$param2.'.jpg');                                
            }

            if($this->input->post('thumb_link')!=''){ 
                $image_source =$this->input->post('thumb_link');
                $save_to = 'uploads/video_thumb/'.$param2.'.jpg';           
                $this->common_model->grab_image($image_source,$save_to);
            }

            if($this->input->post('poster_link')!=''){ 
                $image_source =$this->input->post('poster_link');
                $save_to = 'uploads/poster_image/'.$param2.'.jpg';           
                $this->common_model->grab_image($image_source,$save_to);
            }

            $this->db->where('videos_id', $param2);
            $this->db->update('videos', $data_update);
            $this->session->set_flashdata('success', 'Video updated successed');
            redirect(base_url() . 'admin/videos_edit/'.$param2, 'refresh');
        }
        // filter
        $title          = $this->input->get('title');
        $release        = $this->input->get('release');
        $publication    = $this->input->get('publication');
        $filter = array();
        $filter['is_tvseries '] = 0;
        $search_string = '';
        if($title !="" && $title !=NULL){
            $filter['title '] = $title;
            $search_string.= 'title='.$title.'&';
            $data['title'] = $title;
        }
        if($release !="" && $release !=NULL){
            $filter['release'] = $release;
            $search_string.= 'release='.$release.'&';
            $data['release'] = $release;
        }
        if($publication !="" && $publication !=NULL){
            $filter['publication'] = $publication;
            $search_string.= '&&publication='.$publication;
            $data['publication'] = $publication;            

        }
        $total_rows = $this->common_model->get_videos_num_rows($filter);
        //var_dump($total_rows,$filter);
        // page
        $config = array();
        $config["base_url"] = base_url() . "admin/videos?".$search_string;
        $config["total_rows"] = $total_rows;
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config['full_tag_open'] = '<ul class ="pagination">';
        $config['full_tag_close'] = '</ul><!--pagination-->';

        $config['first_link'] = '«';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = '»';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&rarr;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&larr;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a><div class="pagination-hvr"></div></li>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '<div class="pagination-hvr"></div></li>';  
        //$config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;      

        $this->pagination->initialize($config);
        $data['last_row_num']=$this->uri->segment(3);
        $page = $this->input->get('per_page');//($this->uri->segment(3)) ? $this->uri->segment(3) : 0;   
        $data["videos"] = $this->common_model->get_videos($filter,$config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['total_rows']=$config["total_rows"];
        $data['page_name']      = 'videos_manage';
        $data['page_title']     = 'Videos Management';             
        $this->load->view('admin/index', $data);
    }



    // add videos or movies 
    function tvseries_add(){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
        // start menu active/inactive section
        $this->session->unset_userdata('active_menu');
        $this->session->set_userdata('active_menu', '29');
        // end menu active/inactive section
        $data['page_name']      = 'tvseries_add';
        $data['page_title']     = 'TV-series Add'; 
        $this->load->view('admin/index', $data);
    }

    // edit videos or movies 
    function tvseries_edit($param1='',$param2=''){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
            /* start menu active/inactive section*/
            $this->session->unset_userdata('active_menu');
            $this->session->set_userdata('active_menu', '29');
            /* end menu active/inactive section*/


            $data['param1']         = $param1;
            $data['param2']         = $param2;
            $data['page_name']      = 'tvseries_edit';
            $data['page_title']     = 'TV-series Edit';
            $this->load->view('admin/index', $data);
    }

     // add,edit videos or movies 
    function tvseries($param1 = '', $param2 = ''){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
        /* start menu active/inactive section*/
        $this->session->unset_userdata('active_menu');
        $this->session->set_userdata('active_menu', '30');
        /* end menu active/inactive section*/             
        
        if ($param1 == 'add') {
            $data['imdbid']             = $this->input->post('imdbid');          
            $data['title']              = $this->input->post('title');
            $data['description']        = $this->input->post('description');
            $data['stars']              = implode(',',$this->input->post('actor'));
            $data['director']           = implode(',',$this->input->post('director'));
            $data['writer']             = implode(',',$this->input->post('writer'));
            $data['imdb_rating']        = $this->input->post('rating');
            $data['release']            = $this->input->post('release');
            $data['country']            = implode(',',$this->input->post('country'));
            $data['genre']              = implode(',',$this->input->post('genre'));
            $data['is_tvseries']        = '1';
            $data['runtime']            = $this->input->post('runtime');
            $data['video_quality']      = $this->input->post('video_quality');
            $data['publication']        = '0';
            if(isset($_POST['publication'])) {
                $data['publication']    = '1';
            }
            
            $data['enable_download']    = '0';
            if(isset($_POST['enable_download'])) {
                $data['enable_download']    = '1';
            }
            $data['focus_keyword']      = $this->input->post('focus_keyword');
            $data['meta_description']   = $this->input->post('meta_description');
            $data['tags']               = $this->input->post('tags');       
                        
            $this->db->insert('videos', $data);
            $insert_id = $this->db->insert_id();
            $slug                       = url_title($this->input->post('slug'), 'dash', TRUE);
            $slug_num                   = $this->common_model->slug_num('videos',$slug);
            if($slug_num > 0){
                $slug= $slug.'-'.$insert_id;
            }
            $data_update['slug']               = $slug;            
            if(isset($_FILES['thumbnail']) && $_FILES['thumbnail']['name']!=''){
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], 'uploads/video_thumb/'.$insert_id.'.jpg');                
            }

            if(isset($_FILES['poster_file']) && $_FILES['poster_file']['name']!=''){
                move_uploaded_file($_FILES['poster_file']['tmp_name'], 'uploads/poster_image/'.$insert_id.'.jpg');                                
            }

            if($this->input->post('thumb_link')!=''){ 
                $image_source =$this->input->post('thumb_link');
                $save_to = 'uploads/video_thumb/'.$insert_id.'.jpg';           
                $this->common_model->grab_image($image_source,$save_to);
            }

            if($this->input->post('poster_link')!=''){ 
                $image_source =$this->input->post('poster_link');
                $save_to = 'uploads/poster_image/'.$insert_id.'.jpg';           
                $this->common_model->grab_image($image_source,$save_to);
            }

            $this->db->where('videos_id', $insert_id);
            $this->db->update('videos', $data_update);
            $this->load->model('email_model');
            $this->email_model->new_movie_notification($insert_id);
            $this->session->set_flashdata('success', 'Tv Series added successed');
            redirect(base_url() . 'admin/seasons_manage/'.$insert_id, 'refresh');
        }
        else if ($param1 == 'update') {
            $data['imdbid']             = $this->input->post('imdbid');          
            $data['title']              = $this->input->post('title');
            $data['description']        = $this->input->post('description');
            $data['stars']              = implode(',',$this->input->post('actor'));
            $data['director']           = implode(',',$this->input->post('director'));
            $data['writer']             = implode(',',$this->input->post('writer'));
            $data['imdb_rating']        = $this->input->post('rating');
            $data['release']            = $this->input->post('release');
            $data['country']            = implode(',',$this->input->post('country'));
            $data['genre']              = implode(',',$this->input->post('genre'));
            $data['is_tvseries']        = '1';
            $data['runtime']            = $this->input->post('runtime');
            $data['video_quality']      = $this->input->post('video_quality');
            $publication = $this->input->post('publication');
            if($publication =='on'){
                $data['publication'] = '1';
            }else{
                $data['publication'] = '0';
            }
            $enable_download            = $this->input->post('enable_download');
            if($enable_download =='on'){
                $data['enable_download'] = '1';
            }else{
                $data['enable_download'] = '0';
            }            
            $data['focus_keyword']      = $this->input->post('focus_keyword');
            $data['meta_description']   = $this->input->post('meta_description');
            $data['tags']               = $this->input->post('tags');
            $this->db->where('videos_id', $param2);
            $this->db->update('videos', $data);
            $this->db->where('videos_id', $param2);

            $slug                       = url_title($this->input->post('slug'), 'dash', TRUE);
            $slug_num                   = $this->common_model->slug_num('videos',$slug);
            if($slug_num > 1){
                $slug= $slug.'-'.$param2;
            }
            $data_update['slug']               = $slug;            
            if(isset($_FILES['thumbnail']) && $_FILES['thumbnail']['name']!=''){
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], 'uploads/video_thumb/'.$param2.'.jpg');                
            }

            if(isset($_FILES['poster_file']) && $_FILES['poster_file']['name']!=''){
                move_uploaded_file($_FILES['poster_file']['tmp_name'], 'uploads/poster_image/'.$param2.'.jpg');                                
            }

            if($this->input->post('thumb_link')!=''){ 
                $image_source =$this->input->post('thumb_link');
                $save_to = 'uploads/video_thumb/'.$param2.'.jpg';           
                $this->common_model->grab_image($image_source,$save_to);
            }

            if($this->input->post('poster_link')!=''){ 
                $image_source =$this->input->post('poster_link');
                $save_to = 'uploads/poster_image/'.$param2.'.jpg';           
                $this->common_model->grab_image($image_source,$save_to);
            }

            $this->db->where('videos_id', $param2);
            $this->db->update('videos', $data_update);
            $this->session->set_flashdata('success', 'TV Series updated successed');
            redirect(base_url() . 'admin/tvseries_edit/'.$param2, 'refresh');
        }
        // filter
        $title          = $this->input->get('title');
        $release        = $this->input->get('release');
        $publication    = $this->input->get('publication');
        $filter = array();
        $filter['is_tvseries '] = 1;
        $search_string = '';
        if($title !="" && $title !=NULL){
            $filter['title '] = $title;
            $search_string.= 'title='.$title.'&';
            $data['title'] = $title;
        }
        if($release !="" && $release !=NULL){
            $filter['release'] = $release;
            $search_string.= 'release='.$release.'&';
            $data['release'] = $release;
        }
        if($publication !="" && $publication !=NULL){
            $filter['publication'] = $publication;
            $search_string.= '&&publication='.$publication;
            $data['publication'] = $publication;            

        }
        $total_rows = $this->common_model->get_videos_num_rows($filter);
        //var_dump($total_rows,$filter);
        // page
        $config = array();
        $config["base_url"] = base_url() . "admin/tvseries?".$search_string;
        $config["total_rows"] = $total_rows;
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config['full_tag_open'] = '<ul class ="pagination">';
        $config['full_tag_close'] = '</ul><!--pagination-->';

        $config['first_link'] = '«';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = '»';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&rarr;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&larr;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a><div class="pagination-hvr"></div></li>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '<div class="pagination-hvr"></div></li>';  
        //$config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;      

        $this->pagination->initialize($config);
        $data['last_row_num']=$this->uri->segment(3);
        $page = $this->input->get('per_page');//($this->uri->segment(3)) ? $this->uri->segment(3) : 0;   
        $data["videos"] = $this->common_model->get_videos($filter,$config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['total_rows']=$config["total_rows"];
        $data['page_name']      = 'tvseries_manage';
        $data['page_title']     = 'Videos Management';             
        $this->load->view('admin/index', $data);
    }

    function seasons_manage($param1='',$param2=''){
        //$this->common_model->clear_cache();
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
            /* start menu active/inactive section*/
            $this->session->unset_userdata('active_menu');
            $this->session->set_userdata('active_menu', '30');
            /* end menu active/inactive section*/

            /*if($param2 =='' || $param2 ==NULL){
                redirect(base_url() . 'error', 'refresh');
            }*/
            //var_dump($param1,$param2);
            if ($param1 == 'add') {            
            $data['videos_id']             = $this->input->post('videos_id');
            $data['seasons_name']        = $this->input->post('seasons_name');            
            
            $this->db->insert('seasons', $data);
            $this->session->set_flashdata('success', 'Seasons added successed');
            redirect(base_url() . 'admin/seasons_manage/'.$data['videos_id'], 'refresh');
        }
        if ($param1 == 'update') {
            
            
            $data['videos_id']             = $this->input->post('videos_id');
            $data['seasons_name']        = $this->input->post('seasons_name');
            
            $this->db->where('seasons_id', $param2);
            $this->db->update('seasons', $data);
            $this->session->set_flashdata('success', 'Seasons update successed.');
            redirect(base_url() . 'admin/seasons_manage/'.$data['videos_id'], 'refresh');
        }

            $data['param1']         = $param1;
            $data['param2']         = $param2;
            $data['slug']           = $this->common_model->get_slug_by_videos_id($param1);
            $data['page_name']      = 'seasons_manage';
            $data['page_title']     = $this->common_model->get_title_by_videos_id($param1);
            $this->load->view('admin/index', $data);
    }

    function episodes_manage($param1='',$param2=''){
        //$this->common_model->clear_cache();
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
            /* start menu active/inactive section*/
            $this->session->unset_userdata('active_menu');
            $this->session->set_userdata('active_menu', '30');
            /* end menu active/inactive section*/


            $data['param1']         = $param1;
            $data['param2']         = $param2;
            $data['slug']           = $this->common_model->get_slug_by_videos_id($param1);
            $data['page_name']      = 'episodes_manage';
            $data['page_title']     = 'Eisodes for '.$this->common_model->get_title_by_videos_id($param1).' <strong>'.$this->common_model->get__seasons_name_by_id($param2).'</strong>';
            $this->load->view('admin/index', $data);
    }




    function file_and_download($param1 = '', $param2 = ''){
    if ($this->session->userdata('admin_is_login') != 1)
        redirect(base_url(), 'refresh');
        /* start menu active/inactive section*/
        $this->session->unset_userdata('active_menu');
        $this->session->set_userdata('active_menu', '8');
        /* end menu active/inactive section*/
        if ($param1 == 'update') {
            $video_id = $param2;
            $file_type= 'upload';
            $video_file_type    = $this->input->post('video_file_type');
            $video_file         = $this->input->post('video_file');
            $link_name          = $this->input->post('link_name');
            $link               = $this->input->post('link');            
            $this->db->where('videos_id', $video_id);
            $this->db->delete('video_file');
            for($i=0;$i<sizeof($video_file_type);$i++){                
                $file_data['videos_id']     = $video_id;
                $file_data['file_source']   = $video_file_type[$i];
                $file_data['source_type']   = 'link';
                if($video_file_type[$i]     == 'upload'){
                   $file_data['source_type'] = $this->common_model->get_extension($video_file[$i]);
                   copy('uploads/temp/'.$video_file[$i], 'uploads/videos/'.$video_file[$i]);
                }
                $file_data['file_url'] = $video_file[$i];
                $this->db->insert('video_file', $file_data);
                //var_dump($file_data);
            }
            $this->db->where('videos_id', $video_id);
            $this->db->delete('download_link');
            for($i=0;$i<sizeof($link);$i++){
                $download_data['videos_id'] = $video_id;
                $download_data['link_name'] = $link_name[$i];
                $download_data['link']      = $link[$i];
            }
        }
        $data['param1']         = $param1;
        $data['param2']         = $param2;
        $data['slug']           = $this->common_model->get_slug_by_videos_id($param1);
        $data['page_name']      = 'file_and_download';
        $data['page_title']     = 'Video upload & Download => <strong>'.$this->common_model->get_title_by_videos_id($param1).'</strong>';            
        $this->load->view('admin/index', $data);
    }
    // subtitles
    function subtitle($param1 = '', $param2 = ''){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');

        $video_file_id      = $this->input->post('video_file_id');
        $videos_id          = $this->input->post('videos_id');
        $language           = $this->input->post('language');
        $srclang            = $this->common_model->get_srclang($language);
        $kind               = $this->input->post('kind');
        $vtt_file           = $this->input->post('vtt_file');
        $vtt_url            = $this->input->post('vtt_url');
        $is_subtitle        = FALSE;

        if(isset($_FILES['vtt_file']) && $_FILES['vtt_file']['name']!=''){
            $ext = $this->common_model->get_extension($_FILES['vtt_file']['name']);
            if($ext =='vtt')
                $is_subtitle        = TRUE;
            $subtitle_path = 'uploads/subtitles/'.$videos_id.'_'.$video_file_id.'_'.$this->generate_random_string().'.vtt';
            move_uploaded_file($_FILES['vtt_file']['tmp_name'], $subtitle_path);
            $data['src'] = base_url().$subtitle_path;                               
        }else if(isset($vtt_url) && $vtt_url !=''){
            $data['src'] = $vtt_url;
            $is_subtitle        = TRUE;
        }
        if($is_subtitle){          
            $data['video_file_id']      = $video_file_id;
            $data['videos_id']          = $videos_id;
            $data['language']           = $language;
            $data['kind']               = $kind;
            $data['srclang']            = $srclang;
            $this->db->insert('subtitle', $data);
            $this->session->set_flashdata('success', 'Subtitle Added Successfully.');
            redirect(base_url() . 'admin/file_and_download/'.$videos_id, 'refresh'); 
        }else{
            $this->session->set_flashdata('error', 'Fail.Only .vtt is supported.');
            redirect(base_url() . 'admin/file_and_download/'.$videos_id, 'refresh'); 
        }
    }

    // videos or movies types
    function video_type($param1 = '', $param2 = ''){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
            /* start menu active/inactive section*/
            $this->session->unset_userdata('active_menu');
            $this->session->set_userdata('active_menu', '9');
            /* end menu active/inactive section*/ 
        
        if ($param1 == 'add') {
            
            $data['video_type']             = $this->input->post('video_type');
            $data['video_type_desc']        = $this->input->post('video_type_desc');
            $data['primary_menu']           = $this->input->post('primary_menu');
            $data['footer_menu']            = $this->input->post('footer_menu');           
            
            $this->db->insert('video_type', $data);

            $insert_id                      = $this->db->insert_id();
            $slug                           = url_title($this->input->post('video_type'), 'dash', TRUE);
            $slug_num                       = $this->common_model->slug_num('video_type',$slug);
            if($slug_num > 0){
                $slug= $slug.'-'.$insert_id;
            }
            $data_update['slug']               = $slug;
            $this->db->where('video_type_id', $insert_id);
            $this->db->update('video_type', $data_update);

            $this->session->set_flashdata('success', 'Video type added successed');
            redirect(base_url() . 'admin/video_type/', 'refresh');
        }
        if ($param1 == 'update') {         
            
            $data['video_type']             = $this->input->post('video_type');
            $data['video_type_desc']        = $this->input->post('video_type_desc');
            $data['primary_menu']           = $this->input->post('primary_menu');
            $data['footer_menu']            = $this->input->post('footer_menu');            
            $this->db->where('video_type_id', $param2);
            $this->db->update('video_type', $data);
            $this->session->set_flashdata('success', 'Video type update successed.');
            redirect(base_url() . 'admin/video_type/', 'refresh');
        }      
        
            $data['page_name']      = 'video_type_manage';
            $data['page_title']     = 'Videos Type Management';
            $data['video_types']    = $this->db->get('video_type')->result_array();             
            $this->load->view('admin/index', $data);


    }
    // videos or movies types
    function video_quality($param1 = '', $param2 = ''){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
            /* start menu active/inactive section*/
            $this->session->unset_userdata('active_menu');
            $this->session->set_userdata('active_menu', '24');
            /* end menu active/inactive section*/ 
        
        if ($param1 == 'add') {
            
            $data['quality']                = $this->input->post('quality');
            $data['description']            = $this->input->post('description');            
            
            $this->db->insert('quality', $data);
            $this->session->set_flashdata('success', 'Video quality added successed');
            redirect(base_url() . 'admin/video_quality/', 'refresh');
        }
        if ($param1 == 'update') {
            
            
            $data['quality']                = $this->input->post('quality');
            $data['description']            = $this->input->post('description'); 
            
            $this->db->where('quality_id', $param2);
            $this->db->update('quality', $data);
            $this->session->set_flashdata('success', 'Video quality update successed.');
            redirect(base_url() . 'admin/video_quality/', 'refresh');
        }
        $data['page_name']      = 'video_quality_manage';
        $data['page_title']     = 'Videos quality Management';
        $data['quality']        = $this->db->get('quality')->result_array();             
        $this->load->view('admin/index', $data);
    }

    // live tv
        function manage_live_tv($param1 = '', $param2 = ''){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
            /* start menu active/inactive section*/
            $this->session->unset_userdata('active_menu');
            $this->session->set_userdata('active_menu', '26');
            /* end menu active/inactive section*/ 

        if ($param1 == 'new') {
            /* start menu active/inactive section*/
            $this->session->unset_userdata('active_menu');
            $this->session->set_userdata('active_menu', '35');
            /* end menu active/inactive section*/

            $data['page_name']      = 'live_tv_add';
            $data['page_title']     = 'Add New TV Channel';
            $this->load->view('admin/index', $data);
        }        
        else if ($param1 == 'edit') {
            $data['page_name']      =   'live_tv_edit';
            $data['page_title']     =   'Edit TV Channel';
            $data['param2']         =   $param2;
            $data['live_tvs']       = $this->db->get_where('live_tv' , array('live_tv_id' => $param2) )->result_array(); 
            $this->load->view('admin/index', $data);
        }        
        else if ($param1 == 'add') {
            $data['tv_name']            = $this->input->post('tv_name');
            $data['slug']               = $this->common_model->generate_slug('live_tv',$this->input->post('tv_name'));
            $data['stream_from']        = $this->input->post('stream_from');
            $data['stream_label']       = $this->input->post('stream_label');
            $data['stream_url']         = $this->input->post('stream_url');   
            $data['description']        = $this->input->post('description');   
            $data['focus_keyword']      = $this->input->post('focus_keyword');   
            $data['meta_description']   = $this->input->post('meta_description');   
            $data['tags']               = $this->input->post('tags');
            $publish = $this->input->post('publish');
            $featured = $this->input->post('featured');
            if($publish =='on'){
                $data['publish'] = '1';
            }else{
                $data['publish'] = '0';
            }

            if($featured =='on'){
                $data['featured'] = '1';
            }else{
                $data['featured'] = '0';
            }

            $this->db->insert('live_tv', $data);
            $insert_id = $this->db->insert_id();
            if(isset($_FILES['thumbnail']) && $_FILES['thumbnail']['name']!=''){
                $extention = '.'.$this->common_model->get_extension($_FILES['poster']['name']);
                $file_name = $data['slug'].$extention;
                $file_path = 'uploads/tv_image/sm/'.$file_name;                
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], $file_path);
                $data_update['thumbnail'] = $file_name;
                $this->db->where('live_tv_id', $insert_id);
                $this->db->update('live_tv', $data_update);
            }

            if(isset($_FILES['poster']) && $_FILES['poster']['name']!=''){
                $extention = '.'.$this->common_model->get_extension($_FILES['poster']['name']);
                $file_name = $data['slug'].$extention;
                $file_path = 'uploads/tv_image/'.$file_name;                
                move_uploaded_file($_FILES['poster']['tmp_name'], $file_path);
                $data_update['poster'] = $file_name;
                $this->db->where('live_tv_id', $insert_id);
                $this->db->update('live_tv', $data_update);
            }

            $data1['source']        = $this->input->post('stream_from1');
            $data1['label']         = $this->input->post('stream_label1');
            $data1['url']           = $this->input->post('stream_url1');
            $data1['quality']       = 'SD';
            $data1['stream_key']    = $this->generate_random_string();
            $data1['live_tv_id']    = $insert_id;
            $data1['url_for']       = 'opt1';
            $this->db->insert('live_tv_url', $data1);

            $data2['source']        = $this->input->post('stream_from2');
            $data2['label']         = $this->input->post('stream_label2');
            $data2['url']           = $this->input->post('stream_url2');
            $data2['quality']       = 'LQ';
            $data2['stream_key']    = $this->generate_random_string();
            $data2['live_tv_id']    = $insert_id;
            $data2['url_for']       = 'opt2';
            $this->db->insert('live_tv_url', $data2);


            $this->session->set_flashdata('success', 'TV added successed');
            redirect(base_url() . 'admin/manage_live_tv/', 'refresh');
        }
        else if ($param1 == 'update') {
            $data['tv_name']            = $this->input->post('tv_name');
            $data['slug']               = $this->common_model->regenerate_slug('live_tv',$param2,$this->input->post('tv_name'));
            $data['stream_from']        = $this->input->post('stream_from');
            $data['stream_label']       = $this->input->post('stream_label');
            $data['stream_url']         = $this->input->post('stream_url');   
            $data['description']        = $this->input->post('description');   
            $data['focus_keyword']      = $this->input->post('focus_keyword');   
            $data['meta_description']   = $this->input->post('meta_description');   
            $data['tags']               = $this->input->post('tags');
            $publish = $this->input->post('publish');
            $featured = $this->input->post('featured');
            if($publish =='on'){
                $data['publish'] = '1';
            }else{
                $data['publish'] = '0';
            }

            if($featured =='on'){
                $data['featured'] = '1';
            }else{
                $data['featured'] = '0';
            }

            $this->db->where('live_tv_id', $param2);
            $this->db->update('live_tv', $data);
            if(isset($_FILES['thumbnail']) && $_FILES['thumbnail']['name']!=''){
                $extention = '.'.$this->common_model->get_extension($_FILES['poster']['name']);
                $file_name = $data['slug'].$extention;
                $file_path = 'uploads/tv_image/sm/'.$file_name;                
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], $file_path);
                $data_update['thumbnail'] = $file_name;
                $this->db->where('live_tv_id', $param2);
                $this->db->update('live_tv', $data_update);
            }

            if(isset($_FILES['poster']) && $_FILES['poster']['name']!=''){
                $extention = '.'.$this->common_model->get_extension($_FILES['poster']['name']);
                $file_name = $data['slug'].$extention;
                $file_path = 'uploads/tv_image/'.$file_name;                
                move_uploaded_file($_FILES['poster']['tmp_name'], $file_path);
                $data_update['poster'] = $file_name;
                $this->db->where('live_tv_id', $param2);
                $this->db->update('live_tv', $data_update);
            }
            
            $this->db->where('live_tv_id', $param2);
            $this->db->delete('live_tv_url');
            $data1['source']        = $this->input->post('stream_from1');
            $data1['label']         = $this->input->post('stream_label1');
            $data1['url']           = $this->input->post('stream_url1');
            $data1['quality']       = 'SD';
            $data1['stream_key']    = $this->generate_random_string();
            $data1['live_tv_id']    = $param2;
            $data1['url_for']       = 'opt1';
            $this->db->insert('live_tv_url', $data1);

            $data2['source']        = $this->input->post('stream_from2');
            $data2['label']         = $this->input->post('stream_label2');
            $data2['url']           = $this->input->post('stream_url2');
            $data2['quality']       = 'LQ';
            $data2['stream_key']    = $this->generate_random_string();
            $data2['live_tv_id']    = $param2;
            $data2['url_for']       = 'opt2';
            $this->db->insert('live_tv_url', $data2);


            $this->session->set_flashdata('success', 'TV added successed');
            redirect(base_url() . 'admin/manage_live_tv/', 'refresh');
        }else{
            $total_rows = $this->live_tv_model->num_live_tv();
            $config = array();
            $config["base_url"] = base_url() . "admin/manage_live_tv/";
            $config["total_rows"] = $total_rows;
            $config["per_page"] = 10;
            $config["uri_segment"] = 3;
            $config['full_tag_open'] = '<ul class ="pagination">';
            $config['full_tag_close'] = '</ul><!--pagination-->';

            $config['first_link'] = '«';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';

            $config['last_link'] = '»';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';

            $config['next_link'] = '&rarr;';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';

            $config['prev_link'] = '&larr;';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';

            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a><div class="pagination-hvr"></div></li>';

            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '<div class="pagination-hvr"></div></li>';  
            //$config['use_page_numbers'] = TRUE;
            $config['page_query_string'] = TRUE;      

            $this->pagination->initialize($config);
            $data['last_row_num']   =   $this->uri->segment(3);
            $page                   =   $this->input->get('per_page');//($this->uri->segment(3)) ? $this->uri->segment(3) : 0;   
            $data["tvs"]            =   $this->live_tv_model->get_live_tvs($config["per_page"], $page);
            $data["links"]          =   $this->pagination->create_links();
            $data['total_rows']     =   $config["total_rows"];
            $data['page_name']      =   'live_tv_manage';
            $data['page_title']     =   'Live TV Management';             
            $this->load->view('admin/index', $data);
        }
    }
    function live_tv_setting($param1 = '', $param2 = ''){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
        /* start menu active/inactive section*/
        $this->session->unset_userdata('active_menu');
        $this->session->set_userdata('active_menu', '27');
        /* end menu active/inactive section*/
        if ($param1 == 'update') {
            $publish = $this->input->post('live_tv_publish');
            if($publish =='on'){
                $data['value'] = '1';
                $this->db->where('title' , 'live_tv_publish');
                 $this->db->update('config' , $data);
            }else{
                $data['value'] = '0';
                 $this->db->where('title' , 'live_tv_publish');
                 $this->db->update('config' , $data);
            }

            $live_tv_pin_primary_menu = $this->input->post('live_tv_pin_primary_menu');
            if($live_tv_pin_primary_menu =='on'){
                $data['value'] = '1';
                $this->db->where('title' , 'live_tv_pin_primary_menu');
                 $this->db->update('config' , $data);
            }else{
                $data['value'] = '0';
                 $this->db->where('title' , 'live_tv_pin_primary_menu');
                 $this->db->update('config' , $data);
             }

             $live_tv_pin_footer_menu = $this->input->post('live_tv_pin_footer_menu');
            if($live_tv_pin_footer_menu =='on'){
                $data['value'] = '1';
                $this->db->where('title' , 'live_tv_pin_footer_menu');
                 $this->db->update('config' , $data);
            }else{
                $data['value'] = '0';
                 $this->db->where('title' , 'live_tv_pin_footer_menu');
                 $this->db->update('config' , $data);
             }             
             $data['value'] = $this->input->post('live_tv_title');
             $this->db->where('title' , 'live_tv_title');
             $this->db->update('config' , $data);

             $data['value'] = $this->input->post('live_tv_meta_description');
             $this->db->where('title' , 'live_tv_meta_description');
             $this->db->update('config' , $data);
             
             $data['value'] = $this->input->post('live_tv_keyword');
             $this->db->where('title' , 'live_tv_keyword');
             $this->db->update('config' , $data);

             $this->session->set_flashdata('success', 'Setting update successed.');           
             redirect(base_url() . 'admin/live_tv_setting/', 'refresh');
        } 

        $data['page_name']      = 'live_tv_setting';
        $data['page_title']     = 'Live TV Setting'; 
        $this->load->view('admin/index', $data);
    }

    // videos or movies types
    function comments($param1 = '', $param2 = ''){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
            /* start menu active/inactive section*/
            $this->session->unset_userdata('active_menu');
            $this->session->set_userdata('active_menu', '31');
            /* end menu active/inactive section*/ 
        if ($param1 == 'update_movie') {
            $data['comment']             = $this->input->post('comment');
            $data['publication']        = $this->input->post('publication');                        
            $this->db->where('comments_id', $param2);
            $this->db->update('comments', $data);
            $this->session->set_flashdata('success', 'Comments update successed.');
            redirect(base_url() . 'admin/comments/', 'refresh');
        }else if ($param1 == 'update_post') {
            $data['comment']             = $this->input->post('comment');
            $data['publication']        = $this->input->post('publication');                        
            $this->db->where('post_comments_id', $param2);
            $this->db->update('post_comments', $data);
            $this->session->set_flashdata('success', 'Comments update successed.');
            redirect(base_url() . 'admin/comments/', 'refresh');
        }else if($param1 == 'post_comments'){
            $this->session->unset_userdata('active_menu');
            $this->session->set_userdata('active_menu', '33');
            if($param2 != '' && $param2!=NULL ){
                $data['type']      = $param2;
            }
            else{
                $data['type']      = '';
            }     
        
            $data['page_name']      = 'post_comments_manage';
            $data['page_title']     = 'Post Comments Management';             
            $this->load->view('admin/index', $data);
        }else{
            if($param1 != '' && $param1!=NULL ){
                $data['type']      = $param1;
            }
            else{
                $data['type']      = '';
            }     
        
            $data['page_name']      = 'comments_manage';
            $data['page_title']     = 'Movie/TV-Series Comments Management';             
            $this->load->view('admin/index', $data);
        }
    }

    function comments_setting($param1 = '', $param2 = ''){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
            /* start menu active/inactive section*/
            $this->session->unset_userdata('active_menu');
            $this->session->set_userdata('active_menu', '32');
            /* end menu active/inactive section*/
        if ($param1 == 'update') {
            $data['value'] = $this->input->post('comments_method');
            $this->db->where('title' , 'comments_method');
            $this->db->update('config' , $data);

            $data['value'] = $this->input->post('comments_approval');
            $this->db->where('title' , 'comments_approval');
            $this->db->update('config' , $data);

            $data['value'] = $this->input->post('facebook_comment_appid');
            $this->db->where('title' , 'facebook_comment_appid');
            $this->db->update('config' , $data);

            $this->session->set_flashdata('success', 'Comments setting update successed');
            redirect(base_url() . 'admin/comments_setting/', 'refresh');
                       
        }
            $data['page_name']      = 'comments_setting';
            $data['page_title']     = 'Comments Setting';
            $this->load->view('admin/index', $data);
        }



    // add custom page
    function pages_add(){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
            /* start menu active/inactive section*/
            $this->session->unset_userdata('active_menu');
            $this->session->set_userdata('active_menu', '10');
            /* end menu active/inactive section*/


            $data['page_name']      = 'pages_add';
            $data['page_title']     = 'Page Add'; 
            $this->load->view('admin/index', $data);
    }
    // edit custom page
    function pages_edit($param1='',$param2=''){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
            /* start menu active/inactive section*/
            $this->session->unset_userdata('active_menu');
            $this->session->set_userdata('active_menu', '9');
            /* end menu active/inactive section*/


            $data['param1']         = $param1;
            $data['param2']         = $param2;
            $data['page_name']      = 'pages_edit';
            $data['page_title']     = 'page Edit';
            $this->load->view('admin/index', $data);
    }

    // add,update custom page
    function pages($param1 = '', $param2 = ''){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
            /* start menu active/inactive section*/
            $this->session->unset_userdata('active_menu');
            $this->session->set_userdata('active_menu', '11');
            /* end menu active/inactive section*/ 

         
        
        if ($param1 == 'add') {            
            $data['page_title']         = $this->input->post('page_title');
            $data['content']            = $this->input->post('content');
            $data['primary_menu']       = $this->input->post('primary_menu');
            $data['footer_menu']        = $this->input->post('footer_menu');
            $data['focus_keyword']      = $this->input->post('focus_keyword');
            $data['meta_description']   = $this->input->post('meta_description');
            $data['publication']        = $this->input->post('publication');
            
            $this->db->insert('page', $data);
            $insert_id = $this->db->insert_id();

            $slug                       = url_title($this->input->post('slug'), 'dash', TRUE);
            $slug_num                 = $this->common_model->slug_num('page',$slug);
            if($slug_num > 0){
                $slug= $slug.'-'.$insert_id;
            }
            $data['slug']               = $slug;
            $this->db->where('page_id', $insert_id);
            $this->db->update('page', $data);


            $this->session->set_flashdata('success', 'Page added successed');
            redirect(base_url() . 'admin/pages/', 'refresh');
        }
        else if ($param1 == 'update') {
            $slug                       = url_title($this->input->post('slug'), 'dash', TRUE);           
            $data['page_title']         = $this->input->post('page_title');
            $data['content']            = $this->input->post('content');
            $data['primary_menu']       = $this->input->post('primary_menu');
            $data['footer_menu']        = $this->input->post('footer_menu');
            $data['focus_keyword']      = $this->input->post('focus_keyword');
            $data['meta_description']   = $this->input->post('meta_description');                      
            $data['slug']               = $slug;
            $data['publication']        = $this->input->post('publication');      


            $this->db->where('page_id', $param2);
            $this->db->update('page', $data);

            $slug_num                 = $this->common_model->slug_num('page',$slug);
            if($slug_num > 1){
                $slug= $slug.'-'.$param2;
            }
            $data['slug']               = $slug;
            $this->db->where('page_id', $param2);
            $this->db->update('page', $data);

            $this->session->set_flashdata('success', 'Page update successed.');
            redirect(base_url() . 'admin/pages/', 'refresh');
        }
        else{
            if($param1 != '' && $param1!=NULL ){
                $data['type']      = $param1;
            }
            else{
                $data['type']      = '';
            }
        }
        
            $data['page_name']      = 'pages_manage';
            $data['page_title']     = 'Post Management';          
            $this->load->view('admin/index', $data);


    }

    // add blog post

    function posts_add(){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
            /* start menu active/inactive section*/
            $this->session->unset_userdata('active_menu');
            $this->session->set_userdata('active_menu', '12');
            /* end menu active/inactive section*/


            $data['page_name']      = 'posts_add';
            $data['page_title']     = 'Posts Add'; 
            $this->load->view('admin/index', $data);
    }
    // edit blog post
    function posts_edit($param1='',$param2=''){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
            /* start menu active/inactive section*/
            $this->session->unset_userdata('active_menu');
            $this->session->set_userdata('active_menu', '12');
            /* end menu active/inactive section*/


            $data['param1']         = $param1;
            $data['param2']         = $param2;
            $data['page_name']      = 'posts_edit';
            $data['page_title']     = 'Post Edit';
            $this->load->view('admin/index', $data);
    }

    // add,update blog post
    function posts($param1 = '', $param2 = ''){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
            /* start menu active/inactive section*/
            $this->session->unset_userdata('active_menu');
            $this->session->set_userdata('active_menu', '13');
            /* end menu active/inactive section*/   
        
        if ($param1 == 'add') {            
            $data['post_title']              = $this->input->post('post_title');
            $data['content']        = $this->input->post('content');
            $data['focus_keyword']      = $this->input->post('focus_keyword');
            $data['meta_description']   = $this->input->post('meta_description');
            $data['category_id']         = implode(',',$this->input->post('category_id'));
            $data['publication']        = $this->input->post('publication');
            if($this->input->post('thumb_link')!=''){                
                $data['image_link']     = $this->input->post('thumb_link');
            }     

            
            $this->db->insert('posts', $data);
            $insert_id = $this->db->insert_id();          

            $slug                       = url_title($this->input->post('slug'), 'dash', TRUE);
            $slug_num                   = $this->common_model->slug_num('videos',$slug);
            if($slug_num > 0){
                $slug= $slug.'-'.$insert_id;
            }
            $data['slug']            = $slug;
            $data['image_link']         = base_url().'uploads/no_image.jpg';
            if(isset($_FILES['thumbnail']) && $_FILES['thumbnail']['name']!=''){
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], 'uploads/post_thumb/'.$slug.'.jpg');
                $data['image_link']     = base_url().'uploads/post_thumb/'.$slug.'.jpg';
                $source='uploads/post_thumb/'.$slug.'.jpg';
                $destination='uploads/post_thumb/small/'.$slug.'.jpg';
                $this->common_model->create_small_thumbnail($source, $destination, "150","150");
            }
            $this->db->where('posts_id', $insert_id);
            $this->db->update('posts', $data);


            
            
            $this->session->set_flashdata('success', 'Post added successed');
            redirect(base_url() . 'admin/posts/', 'refresh');
        }
        else if ($param1 == 'update') {
            $data['post_title']              = $this->input->post('post_title');
            $data['content']        = $this->input->post('content');
            $data['focus_keyword']      = $this->input->post('focus_keyword');
            $data['meta_description']   = $this->input->post('meta_description');
            $data['category_id']         = implode(',',$this->input->post('category_id'));
            $data['publication']        = $this->input->post('publication');
            if($this->input->post('thumb_link')!=''){                
                $data['image_link']     = $this->input->post('thumb_link');
            }
            $this->db->where('posts_id', $param2);
            $this->db->update('posts', $data);
            $slug                       = url_title($this->input->post('slug'), 'dash', TRUE);
            $slug_num                   = $this->common_model->slug_num('videos',$slug);
            if($slug_num > 1){
                $slug= $slug.'-'.$param2;
            }
            $data['slug']            = $slug;
            if(isset($_FILES['thumbnail']) && $_FILES['thumbnail']['name']!=''){
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], 'uploads/post_thumb/'.$slug.'.jpg');
                $data['image_link']     = base_url().'uploads/post_thumb/'.$slug.'.jpg';
                $source='uploads/post_thumb/'.$slug.'.jpg';
                $destination='uploads/post_thumb/small/'.$slug.'.jpg';
                $this->common_model->create_small_thumbnail($source, $destination, "150","150");
            }
            $this->db->where('posts_id', $param2);
            $this->db->update('posts', $data);


            $this->session->set_flashdata('success', 'Post update successed.');
            redirect(base_url() . 'admin/posts/', 'refresh');
        }
        else{
            if($param1 != '' && $param1!=NULL ){
                $data['type']      = $param1;
            }
            else{
                $data['type']      = '';
            }
        }
        
            $data['page_name']      = 'posts_manage';
            $data['page_title']     = 'Post Management';          
            $this->load->view('admin/index', $data);


    }
    // post category
    function post_category($param1 = '', $param2 = ''){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
            /* start menu active/inactive section*/
            $this->session->unset_userdata('active_menu');
            $this->session->set_userdata('active_menu', '14');
            /* end menu active/inactive section*/   
        
        if ($param1 == 'add') {
            
            $data['category']             = $this->input->post('category');
            $data['category_desc']        = $this->input->post('category_desc');           
            
            $this->db->insert('post_category', $data);
            $this->session->set_flashdata('success', 'Post Category added successed');
            redirect(base_url() . 'admin/post_category/', 'refresh');
        }
        if ($param1 == 'update') {           
            
            $data['category']             = $this->input->post('category');
            $data['category_desc']        = $this->input->post('category_desc');
            
            $this->db->where('post_category_id', $param2);
            $this->db->update('post_category', $data);
            $this->session->set_flashdata('success', 'Post category update successed.');
            redirect(base_url() . 'admin/post_category/', 'refresh');
        }  
        
            $data['page_name']      = 'post_category_manage';
            $data['page_title']     = 'Post Category Management';
            $data['post_categories']    = $this->db->get('post_category')->result_array();             
            $this->load->view('admin/index', $data);
    }

    // users
    function manage_user($param1 = '', $param2 = ''){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
            /* start menu active/inactive section*/
            $this->session->unset_userdata('active_menu');
            $this->session->set_userdata('active_menu', '15');
            /* end menu active/inactive section*/ 

            /* add new access */   
        
        if ($param1 == 'add') {
            $data['name']           = $this->input->post('name');
            $data['username']       = $this->input->post('username');
            $data['password']       = md5($this->input->post('password'));
            $data['email']          = $this->input->post('email');
            $data['role']           = $this->input->post('role');           
            
            $this->db->insert('user', $data);
            $this->session->set_flashdata('success', 'User added successed');
            redirect(base_url() . 'admin/manage_user/', 'refresh');
        }
        if ($param1 == 'update') {
            $data['name']           = $this->input->post('name');
            $data['username']       = $this->input->post('username');
            if($this->input->post('password')!='' || $this->input->post('password')!=NULL){
                $data['password']   = md5($this->input->post('password'));
            }
            
            $data['email']          = $this->input->post('email');
            $data['role']           = $this->input->post('role');

            $this->db->where('user_id', $param2);
            $this->db->update('user', $data);
            $this->session->set_flashdata('success', 'User update successed.');
            redirect(base_url() . 'admin/manage_user/', 'refresh');
        }       

        if ($param1 == 'delete') {
            $response = array();
            $user_id           = $this->input->post('user_id');
            $this->db->where('user_id', $user_id);
            $run=$this->db->delete('user');
            if($run){
				$response['status']  = 'success';
				$response['message'] = 'Product Deleted Successfully ...';
			}
			else {
				$response['status']  = 'error';
				$response['message'] = 'Unable to delete product ...';
			}
				echo json_encode($response);
        }
        
            $data['page_name']      = 'user_manage';
            $data['page_title']     = 'User Management';
            $data['users']    = $this->db->get('user')->result_array(); 
            $this->load->view('admin/index', $data);
    }

    // users
    function manage_star($param1 = '', $param2 = ''){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
        /* start menu active/inactive section*/
        $this->session->unset_userdata('active_menu');
        $this->session->set_userdata('active_menu', '25');
        /* end menu active/inactive section*/  
        
        if ($param1 == 'add') {
            $star_name                      = trim($this->input->post('star_name'));
            if($this->db->get_where('star',array('star_name'=>$star_name))->num_rows() > 0){
                $this->session->set_flashdata('error', 'Star Already exist.');
                redirect(base_url() . 'admin/manage_star/', 'refresh');
            }else{
                $data['star_name']              = $star_name;
                $data['slug']                   = $this->common_model->get_seo_url($star_name);
                $data['star_type']              = $this->input->post('star_type');
                $data['star_desc']              = $this->input->post('star_desc');   
                $this->db->insert('star', $data);
                $insert_id = $this->db->insert_id();
                if(isset($_FILES['photo']) && $_FILES['photo']['name']!=''){
                    move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/star_image/'.$insert_id.'.jpg');
                }
            }
            redirect(base_url() . 'admin/manage_star/', 'refresh');          
            
        }
        if ($param1 == 'update') {
            $star_name                      = trim($this->input->post('star_name'));
            if($this->db->get_where('star',array('star_name'=>$star_name))->num_rows() > 1){
                $this->session->set_flashdata('error', 'Duplicate Star exist.');
                redirect(base_url() . 'admin/manage_star/', 'refresh');
            }else{
                $data['star_name']              = $star_name;
                $data['slug']                   = $this->common_model->get_seo_url($star_name);
                $data['star_type']              = $this->input->post('star_type');
                $data['star_desc']              = $this->input->post('star_desc');
                $this->db->where('star_id', $param2);
                $this->db->update('star', $data);
                if(isset($_FILES['photo']) && $_FILES['photo']['name']!=''){
                    move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/star_image/'.$param2.'.jpg');
                }
                redirect(base_url() . 'admin/manage_star/', 'refresh');
            }            
        }


        $config = array();
        $config["base_url"] = base_url() . "admin/manage_star";
        $config["total_rows"] = $this->db->get_where('star', array('status'=>'1'))->num_rows();
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
        $config['full_tag_open'] = '<ul class ="pagination">';
        $config['full_tag_close'] = '</ul><!--pagination-->';

        $config['first_link'] = '«';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = '»';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&rarr;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&larr;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a><div class="pagination-hvr"></div></li>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '<div class="pagination-hvr"></div></li>';        

        $this->pagination->initialize($config);
        $data['last_row_num']=$this->uri->segment(3);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;   
        $data["stars"] = $this->common_model->get_stars($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['total_rows']=$config["total_rows"];
        $data['page_name']      = 'star_manage';
        $data['page_title']     = 'Star Management';
        $this->load->view('admin/index', $data);
    }

    function tv_series_setting($param1 = '', $param2 = ''){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
        /* start menu active/inactive section*/
        $this->session->unset_userdata('active_menu');
        $this->session->set_userdata('active_menu', '28');
        /* end menu active/inactive section*/
        if ($param1 == 'update') {
            $publish = $this->input->post('tv_series_publish');
            if($publish =='on'){
                $data['value'] = '1';
                $this->db->where('title' , 'tv_series_publish');
                 $this->db->update('config' , $data);
            }else{
                $data['value'] = '0';
                 $this->db->where('title' , 'tv_series_publish');
                 $this->db->update('config' , $data);
             }

             $tv_series_pin_primary_menu = $this->input->post('tv_series_pin_primary_menu');
            if($tv_series_pin_primary_menu =='on'){
                $data['value'] = '1';
                $this->db->where('title' , 'tv_series_pin_primary_menu');
                 $this->db->update('config' , $data);
            }else{
                $data['value'] = '0';
                 $this->db->where('title' , 'tv_series_pin_primary_menu');
                 $this->db->update('config' , $data);
             }

             $tv_series_pin_footer_menu = $this->input->post('tv_series_pin_footer_menu');
            if($tv_series_pin_footer_menu =='on'){
                $data['value'] = '1';
                $this->db->where('title' , 'tv_series_pin_footer_menu');
                 $this->db->update('config' , $data);
            }else{
                $data['value'] = '0';
                 $this->db->where('title' , 'tv_series_pin_footer_menu');
                 $this->db->update('config' , $data);
             }

             
             $data['value'] = $this->input->post('tv_series_title');
             $this->db->where('title' , 'tv_series_title');
             $this->db->update('config' , $data);
             
             $data['value'] = $this->input->post('tv_series_keyword');
             $this->db->where('title' , 'tv_series_keyword');
             $this->db->update('config' , $data);

             $data['value'] = $this->input->post('tv_series_meta_description');
             $this->db->where('title' , 'tv_series_meta_description');
             $this->db->update('config' , $data);

             $this->session->set_flashdata('success', 'Setting update successed.');           
             redirect(base_url() . 'admin/tv_series_setting/', 'refresh');
        } 

        $data['page_name']      = 'tv_series_setting';
        $data['page_title']     = 'Live TV Setting'; 
        $this->load->view('admin/index', $data);
    }


    // theme options
    function theme_options($param1 = '', $param2 = ''){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
            /* start menu active/inactive section*/
            $this->session->unset_userdata('active_menu');
            $this->session->set_userdata('active_menu', '16');
            /* end menu active/inactive section*/

            if ($param1 == 'update') {     
             

             $data['value'] = $this->input->post('purchase_code');
             $this->db->where('title' , 'purchase_code');
             $this->db->update('config' , $data);

             $data['value'] = $this->input->post('site_name');
             $this->db->where('title' , 'site_name');
             $this->db->update('config' , $data);
             
             $data['value'] = $this->input->post('site_url');
             $this->db->where('title' , 'site_url');
             $this->db->update('config' , $data);
             
             $data['value'] = $this->input->post('system_email');
             $this->db->where('title' , 'system_email');
             $this->db->update('config' , $data);
             
             $data['value'] = $this->input->post('business_address');
             $this->db->where('title' , 'business_address');
             $this->db->update('config' , $data);

             $data['value'] = $this->input->post('business_phone');
             $this->db->where('title' , 'business_phone');
             $this->db->update('config' , $data);

             $data['value'] = $this->input->post('contact_email');
             $this->db->where('title' , 'contact_email');
             $this->db->update('config' , $data);

             $data['value'] = $this->input->post('map_api');
             $this->db->where('title' , 'map_api');
             $this->db->update('config' , $data);

             $data['value'] = $this->input->post('map_lat');
             $this->db->where('title' , 'map_lat');
             $this->db->update('config' , $data);

             $data['value'] = $this->input->post('map_lng');
             $this->db->where('title' , 'map_lng');
             $this->db->update('config' , $data);

             $data['value'] = $this->input->post('front_end_theme');
             $this->db->where('title' , 'front_end_theme');
             $this->db->update('config' , $data);

             $data['value'] = $this->input->post('blog_enable');
             $this->db->where('title' , 'blog_enable');
             $this->db->update('config' , $data);             

             $data['value'] = $this->input->post('dark_theme');
             $this->db->where('title' , 'dark_theme');
             $this->db->update('config' , $data);

             $data['value'] = $this->input->post('header_templete');
             $this->db->where('title' , 'header_templete');
             $this->db->update('config' , $data);

             $data['value'] = $this->input->post('footer_templete');
             $this->db->where('title' , 'footer_templete');
             $this->db->update('config' , $data);


             $this->session->set_flashdata('success', 'Setting update successed.');           
             redirect(base_url() . 'admin/theme_options/', 'refresh');
        }
            $data['page_name']      = 'theme_options';
            $data['page_title']     = 'Theme Options';
            $this->load->view('admin/index', $data);
    }

    // player setting
    function player_setting($param1 = '', $param2 = ''){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
            /* start menu active/inactive section*/
            $this->session->unset_userdata('active_menu');
            $this->session->set_userdata('active_menu', '34');
            /* end menu active/inactive section*/

            if ($param1 == 'update') {     
             

             $data['value'] = $this->input->post('player_color_skin');
             $this->db->where('title' , 'player_color_skin');
             $this->db->update('config' , $data);

             $data['value'] = '0';
             if(!empty($this->input->post('player_volume_remember')) && $this->input->post('player_volume_remember') !='' && $this->input->post('player_volume_remember') !=NULL){
                $data['value'] = $this->input->post('player_volume_remember');
             }                
             $this->db->where('title' , 'player_volume_remember');
             $this->db->update('config' , $data);

             $data['value'] = '0';
             if(!empty($this->input->post('player_watermark')) && $this->input->post('player_watermark') !='' && $this->input->post('player_watermark') !=NULL){
                $data['value'] = $this->input->post('player_watermark');
            }
             $this->db->where('title' , 'player_watermark');
             $this->db->update('config' , $data);

            if(!empty($_FILES['player_watermark_logo']) && $_FILES['player_watermark_logo']['name']!=''){
                move_uploaded_file($_FILES['player_watermark_logo']['tmp_name'], 'uploads/watermark_logo.'.$this->common_model->get_extension($_FILES['player_watermark_logo']['name']));
                $data['value'] = 'uploads/watermark_logo.'.$this->common_model->get_extension($_FILES['player_watermark_logo']['name']);
                $this->db->where('title' , 'player_watermark_logo');
                $this->db->update('config' , $data);
            }
             
             $data['value'] = $this->input->post('player_watermark_url');
             $this->db->where('title' , 'player_watermark_url');
             $this->db->update('config' , $data);
             
             $data['value'] = $this->input->post('player_share');
             $this->db->where('title' , 'player_share');
             $this->db->update('config' , $data);

             $data['value'] = $this->input->post('player_share_fb_id');
             $this->db->where('title' , 'player_share_fb_id');
             $this->db->update('config' , $data);

             $data['value'] = '0';
             if(!empty($this->input->post('player_seek_button')) && $this->input->post('player_seek_button') !='' && $this->input->post('player_seek_button') !=NULL){
                $data['value'] = $this->input->post('player_seek_button');
            }
             $this->db->where('title' , 'player_seek_button');
             $this->db->update('config' , $data);

             $data['value'] = $this->input->post('player_seek_forward');
             $this->db->where('title' , 'player_seek_forward');
             $this->db->update('config' , $data);

             $data['value'] = $this->input->post('player_seek_back');
             $this->db->where('title' , 'player_seek_back');
             $this->db->update('config' , $data);
             
             $this->session->set_flashdata('success', 'Setting update successed.');           
             //redirect(base_url() . 'admin/player_setting/', 'refresh');
        }
            $data['page_name']      = 'player_setting';
            $data['page_title']     = 'Player Setting';
            $this->load->view('admin/index', $data);
    }

    // general setting
    function email_setting($param1 = '', $param2 = ''){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
            /* start menu active/inactive section*/
            $this->session->unset_userdata('active_menu');
            $this->session->set_userdata('active_menu', '17');
            /* end menu active/inactive section*/

        if ($param1 == 'update') {
            $protocol = $this->input->post('protocol');            
            if($protocol=='smtp')
            {
                $data['value'] = $this->input->post('protocol');
                $this->db->where('title' , 'protocol');
                $this->db->update('config' , $data);

                $data['value'] = $this->input->post('smtp_host');
                $this->db->where('title' , 'smtp_host');
                $this->db->update('config' , $data);

                $data['value'] = $this->input->post('smtp_user');
                $this->db->where('title' , 'smtp_user');
                $this->db->update('config' , $data);


                $data['value'] = $this->input->post('smtp_pass');
                $this->db->where('title' , 'smtp_pass');
                $this->db->update('config' , $data);

                $data['value'] = $this->input->post('smtp_port');
                $this->db->where('title' , 'smtp_port');
                $this->db->update('config' , $data);

                $data['value'] = $this->input->post('smtp_crypto');
                $this->db->where('title' , 'smtp_crypto');
                $this->db->update('config' , $data); 
            }
            else if($protocol=='sendmail')
            {
                $data['value'] = $this->input->post('protocol');
                $this->db->where('title' , 'protocol');
                $this->db->update('config' , $data);

                $data['value'] = $this->input->post('mailpath');
                $this->db->where('title' , 'mailpath');
                $this->db->update('config' , $data);
            }

             $data['value'] = $this->input->post('contact_email');
             $this->db->where('title' , 'contact_email');
             $this->db->update('config' , $data);

             $this->session->set_flashdata('success', 'Setting update successed.');           
             redirect(base_url() . 'admin/email_setting/', 'refresh');
        }
            $data['page_name']      = 'email_setting';
            $data['page_title']     = 'Email Setting';
            $this->load->view('admin/index', $data);
    }


    // logo setting
    function logo_setting($param1 = '', $param2 = ''){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
            /* start menu active/inactive section*/
            $this->session->unset_userdata('active_menu');
            $this->session->set_userdata('active_menu', '18');
            /* end menu active/inactive section*/

        if ($param1 == 'update') {
            move_uploaded_file($_FILES['website_logo']['tmp_name'], 'uploads/system_logo/logo.png');            
            move_uploaded_file($_FILES['website_favicon']['tmp_name'], 'uploads/system_logo/favicon.ico');

            $this->session->set_flashdata('success', 'Logo update successed');

            redirect(base_url() . 'admin/logo_setting/', 'refresh');
        }

            $data['page_name']      = 'logo_setting';
            $data['page_title']     = 'Logo Setting';
            $this->load->view('admin/index', $data);
    }

    //footer setting
    function footer_setting($param1 = '', $param2 = ''){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
            /* start menu active/inactive section*/
            $this->session->unset_userdata('active_menu');
            $this->session->set_userdata('active_menu', '19');
            /* end menu active/inactive section*/

        if ($param1 == 'update') {
            $data['value'] = $this->input->post('footer1_title');
            $this->db->where('title' , 'footer1_title');
            $this->db->update('config' , $data);

            $data['value'] = $this->input->post('footer1_content');
            $this->db->where('title' , 'footer1_content');
            $this->db->update('config' , $data);

            $data['value'] = $this->input->post('footer2_title');
            $this->db->where('title' , 'footer2_title');
            $this->db->update('config' , $data);

            $data['value'] = $this->input->post('footer2_content');
            $this->db->where('title' , 'footer2_content');
            $this->db->update('config' , $data);

            $data['value'] = $this->input->post('footer3_title');
            $this->db->where('title' , 'footer3_title');
            $this->db->update('config' , $data);

            $data['value'] = $this->input->post('footer3_content');
            $this->db->where('title' , 'footer3_content');
            $this->db->update('config' , $data);

            $data['value'] = $this->input->post('copyright_text');
            $this->db->where('title' , 'copyright_text');
            $this->db->update('config' , $data);


            $this->session->set_flashdata('success', 'Footer update successed');

            redirect(base_url() . 'admin/footer_setting/', 'refresh');
        }

            $data['page_name']      = 'footer_setting';
            $data['page_title']     = 'Footer Content Management';
            $this->load->view('admin/index', $data);
    }
    //seo setting
    function seo_setting($param1 = '', $param2 = ''){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
            /* start menu active/inactive section*/
            $this->session->unset_userdata('active_menu');
            $this->session->set_userdata('active_menu', '20');
            /* end menu active/inactive section*/

        if ($param1 == 'update') {
            $data['value'] = $this->input->post('author');
            $this->db->where('title' , 'author');
            $this->db->update('config' , $data);

            $data['value'] = $this->input->post('home_page_seo_title');
            $this->db->where('title' , 'home_page_seo_title');
            $this->db->update('config' , $data);

            $data['value'] = $this->input->post('focus_keyword');
            $this->db->where('title' , 'focus_keyword');
            $this->db->update('config' , $data);


            $data['value'] = $this->input->post('meta_description');
            $this->db->where('title' , 'meta_description');
            $this->db->update('config' , $data);

            $data['value'] = $this->input->post('google_analytics_id');
            $this->db->where('title' , 'google_analytics_id');
            $this->db->update('config' , $data);

            $data['value'] = $this->input->post('blog_title');
             $this->db->where('title' , 'blog_title');
             $this->db->update('config' , $data);

             $data['value'] = $this->input->post('blog_meta_description');
             $this->db->where('title' , 'blog_meta_description');
             $this->db->update('config' , $data);

             $data['value'] = $this->input->post('blog_keyword');
             $this->db->where('title' , 'blog_keyword');
             $this->db->update('config' , $data);

            $data['value'] = $this->input->post('social_share_enable');
            $this->db->where('title' , 'social_share_enable');
            $this->db->update('config' , $data);            

            $data['value'] = $this->input->post('facebook_url');
            $this->db->where('title' , 'facebook_url');
            $this->db->update('config' , $data);

            $data['value'] = $this->input->post('twitter_url');
            $this->db->where('title' , 'twitter_url');
            $this->db->update('config' , $data);

            $data['value'] = $this->input->post('linkedin_url');
            $this->db->where('title' , 'linkedin_url');
            $this->db->update('config' , $data);

            $data['value'] = $this->input->post('vimeo_url');
            $this->db->where('title' , 'vimeo_url');
            $this->db->update('config' , $data);

            $data['value'] = $this->input->post('youtube_url');
            $this->db->where('title' , 'youtube_url');
            $this->db->update('config' , $data);

            




            $this->session->set_flashdata('success', 'SEO & social setting update successed');

            redirect(base_url() . 'admin/seo_setting/', 'refresh');
        }

            $data['page_name']      = 'seo_setting';
            $data['page_title']     = 'SEO Configuration Management';
            $this->load->view('admin/index', $data);
    }


    //seo setting
    function social_login_setting($param1 = '', $param2 = ''){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
            /* start menu active/inactive section*/
            $this->session->unset_userdata('active_menu');
            $this->session->set_userdata('active_menu', '22');
            /* end menu active/inactive section*/

        if ($param1 == 'update_facebook') {
            $facebook_login_enable = $this->input->post('facebook_login_enable');
            if($facebook_login_enable ==''){
                $data['value'] = '0';
            }else{
               $data['value'] = $facebook_login_enable;
            }
            $this->db->where('title' , 'facebook_login_enable');
            $this->db->update('config' , $data);

            $data['value'] = $this->input->post('facebook_app_id');
            $this->db->where('title' , 'facebook_app_id');
            $this->db->update('config' , $data);

            $data['value'] = $this->input->post('facebook_app_secret');
            $this->db->where('title' , 'facebook_app_secret');
            $this->db->update('config' , $data);

            $data['value'] = $this->input->post('facebook_graph_version');
            $this->db->where('title' , 'facebook_graph_version');
            $this->db->update('config' , $data);

            $this->session->set_flashdata('success', 'Facebook login setting update successed');
            redirect(base_url() . 'admin/social_login_setting/', 'refresh');
        }
        if ($param1 == 'update_google') {
            $google_login_enable = $this->input->post('google_login_enable');
            if($google_login_enable ==''){
                $data['value'] = '0';
            }else{
               $data['value'] = $google_login_enable;
            }
            $this->db->where('title' , 'google_login_enable');
            $this->db->update('config' , $data);

            $data['value'] = $this->input->post('google_application_name');
            $this->db->where('title' , 'google_application_name');
            $this->db->update('config' , $data);

            $data['value'] = $this->input->post('google_client_id');
            $this->db->where('title' , 'google_client_id');
            $this->db->update('config' , $data);

            $data['value'] = $this->input->post('google_client_secret');
            $this->db->where('title' , 'google_client_secret');
            $this->db->update('config' , $data);

            $data['value'] = $this->input->post('google_redirect_uri');
            $this->db->where('title' , 'google_redirect_uri');
            $this->db->update('config' , $data);

            $this->session->set_flashdata('success', 'Google login setting update successed');
            redirect(base_url() . 'admin/social_login_setting/', 'refresh');
        }

            $data['page_name']      = 'social_login_setting';
            $data['page_title']     = 'Facebook & Google Login Setting';
            $this->load->view('admin/index', $data);
    }

    //ads setting
    function ad_setting($param1 = '', $param2 = ''){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
            /* start menu active/inactive section*/
            $this->session->unset_userdata('active_menu');
            $this->session->set_userdata('active_menu', '21');
            /* end menu active/inactive section*/

        if ($param1 == 'update') {
            $ads_type = $this->input->post('ads_type');
            if($ads_type =='0'){
                $data['enable']     = '0';
                $this->db->where('ads_id' , $param2);
                $this->db->update('ads' , $data);
            }
            else{
                if ($ads_type=='image') {
                    //$data['ads_image_url']         = base_url().'uploads/no_image.jpg';
                    if(isset($_FILES['ads_image']) && $_FILES['ads_image']['name']!=''){
                        move_uploaded_file($_FILES['ads_image']['tmp_name'], 'uploads/ads/'.$param2.'.jpg');
                        $data['ads_image_url']     = base_url().'uploads/ads/'.$param2.'.jpg';
                    }
                    if($this->input->post('ads_image_url')!=''){                
                        $data['ads_image_url']  = $this->input->post('ads_image_url');
                    }
                    if($this->input->post('ads_url')!=''){                
                        $data['ads_url']  = $this->input->post('ads_url');
                    }
                    $data['enable']     = '1';
                    $data['ads_type']   = 'image';
                    $this->db->where('ads_id' , $param2);
                    $this->db->update('ads' , $data);
                }else if ($ads_type=='code') {
                    $data['enable']     = '1';
                    $data['ads_type']   = 'code';                   
                    $data['ads_code']   = $this->input->post('ads_code');
                    $this->db->where('ads_id' , $param2);
                    $this->db->update('ads' , $data);
                }else{
                    $data['enable']     = '0';
                    $this->db->where('ads_id' , $param2);
                    $this->db->update('ads' , $data);
                }
            }
			$this->session->set_flashdata('success', 'Ads setting update successed');
            redirect(base_url() . 'admin/ad_setting/edit/'.$param2, 'refresh');
        }
        if($param1=="edit"){
            $data['ads_info']    = $this->common_model->get_single_ads($param2);
            $data['page_name']      = 'ad_edit';
            $data['ads_id']         = $param2;
            $data['page_title']     = 'Edit Ads';
            $this->load->view('admin/index', $data);
        }else{
            $data['page_name']     = 'ad_setting';
            $data['page_title']     = 'Ads Management';
            $this->load->view('admin/index', $data);
        }        
	}

    function test_mail(){
        $email  =    $this->input->post('email');
        if($email !=''){
            $this->load->model('email_model');
            if($this->email_model->test_mail($email)){
                $this->session->set_flashdata('success', 'Mail Configuration is perfect');
                $this->session->set_flashdata('send_success', 'Mail Configuration is perfect.Please check your mail to confirm');
                redirect(base_url() . 'admin/email_setting/', 'refresh');
            }else{
                $this->session->set_flashdata('send_error', 'Mail Configuration is perfect');
                redirect(base_url() . 'admin/email_setting/', 'refresh');
            }
            
        }
        
        $this->session->set_flashdata('error', 'Please enter a valid email.');
        redirect(base_url() . 'admin/email_setting/', 'refresh');
        
    }

	// database backup and restore management
    function backup_restore($operation = '', $type = ''){

        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
            /* start menu active/inactive section*/
            $this->session->unset_userdata('active_menu');
            $this->session->set_userdata('active_menu', '22');
            /* end menu active/inactive section*/   
        
        if ($operation == 'create') {            
            $this->common_model->create_backup();
            $this->session->set_flashdata('success', 'Backup created..');
            redirect(base_url() . 'admin/backup_restore/', 'refresh');
        }
        if ($operation == 'download') {
            $this->load->helper('download');
            force_download('db_backup/'.$type, TRUE);
        }
        if ($operation == 'delete') {
            $this->load->helper('file');
            $path_to_file = 'db_backup/'.$type;
            if(unlink($path_to_file)) {
                $this->session->set_flashdata('success', 'Deleted');
                redirect(base_url() . 'admin/backup_restore/', 'refresh');
            }
            else {
                $this->session->set_flashdata('error', 'File not found..');
                redirect(base_url() . 'admin/backup_restore/', 'refresh');
            }
        }
        if ($operation == 'restore') {
            $this->common_model->restore_backup();
            $this->session->set_flashdata('backup_message', 'Backup Restored');
            redirect(base_url() . 'admin/backup_restore/', 'refresh');
        }
        
            $data['page_info']  = 'Create backup / restore from backup';
            $data['page_name']  = 'backup_restore';
            $data['page_title'] = 'Manage Backup and Restore';
            $this->load->view('admin/index', $data);
    }

    function view_modal($page_name = '' , $param2 = '' , $param3 = ''){
            $account_type       =   $this->session->userdata('login_type');
            $data['param2']     =   $param2;
            $data['param3']     =   $param3;
            $this->load->view('admin/'.$page_name.'.php' ,$data);        
        
    }

    //profile
	function manage_profile(){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
            /* start menu active/inactive section*/
            $this->session->unset_userdata('active_menu');
            $this->session->set_userdata('active_menu', '12');
            /* end menu active/inactive section*/
            $data['page_name']      = 'manage_profile';
            $data['page_title']     = 'Update profile information';
            $data['profile_info']   = $this->db->get_where('user', array(
            'user_id' => $this->session->userdata('user_id')))->result_array();
            $this->load->view('admin/index', $data);
    }

    // profile
    function profile($param1 = '', $param2 = '', $param3 = ''){
        /* start menu active/inactive section*/
            $this->session->unset_userdata('active_menu');
            $this->session->set_userdata('active_menu', '12');
            /* end menu active/inactive section*/
            $user_id=$this->session->userdata('user_id');
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($param1 == 'update') {
            $data['name']  = $this->input->post('name');
            $data['email'] = $this->input->post('email');
            
            $this->db->where('user_id', $user_id);
            $this->db->update('user', $data);
            $this->common_model->clear_cache();
            move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/user_image/' .$user_id.'.jpg');
            $this->common_model->clear_cache();
            $this->session->set_flashdata('success', 'Profile information updated.');
            redirect(base_url() . 'admin/manage_profile/', 'refresh');
        }
        if ($param1 == 'change_password'){
            $password               = md5($this->input->post('password'));
            $new_password           = md5($this->input->post('new_password'));
            $retype_new_password    = md5($this->input->post('retype_new_password'));
            
            $current_password       = $this->db->get_where('user', array(
                'user_id' => $this->session->userdata('user_id')
            ))->row()->password;
            
            if ($current_password == $password && $new_password == $retype_new_password) {
                $this->db->where('user_id', $this->session->userdata('user_id'));
                $this->db->update('user', array(
                    'password' => $new_password
                ));
                $this->session->set_flashdata('success', 'Password changed.');
            }
            elseif ($current_password !=$password ){
                $this->session->set_flashdata('error', 'Old password not correct.');

            } else {
                $this->session->set_flashdata('error', 'Password not match.');
            }
            redirect(base_url() . 'admin/manage_profile/', 'refresh');
        }
    }
    //theme
    function manage_theme(){
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');
            /* start menu active/inactive section*/
            $this->session->unset_userdata('active_menu');
            $this->session->set_userdata('active_menu', '12');
            /* end menu active/inactive section*/
            $data['page_name']  = 'manage_theme';
            $data['page_title'] = 'Manage theme color';
            $this->load->view('admin/index', $data);
    }

    //universal delete function
    function delete_record(){
            $response           = array();
            $row_id             = $this->input->post('row_id');
            $table_name         = $this->input->post('table_name');
            $table_row_id       =$table_name.'_id';
            $this->db->where($table_row_id , $row_id);
            $query=$this->db->delete($table_name);
            if($query==true){
            $response['status']  = 'success';
            $response['message'] = tr_wd('Deleted successfully !');
            }
            else{
            $response['status']  = 'error';
            $response['message'] = 'Unable to delete record ...';
            }        
            echo json_encode($response);
        
    }

    //imdb import
    function import_movie(){
        $response                   = array();        
        $id                         =   trim($_POST["id"]);
        $from                       =   $_POST["from"];
        //$id = 1402;
        //$from ='tv';
        $response['submitted_data'] = $_POST;
        $this->load->model('tmdb_model');
        if($from=='tv'){
            $data = $this->tmdb_model->get_tvseries_info($id);
        }else{
            $data = $this->tmdb_model->get_movie_info($id);
        }
        //var_dump($data);      
        if(isset($data['status']) && $data['status']=='success'){
            $response['imdb_status']    = 'success';
            $response['imdbid']         = $data['imdbid'];
            $response['title']          = $data['title'];
            $response['plot']           = $data['plot'];
            $response['runtime']        = $data['runtime'];
            $response['actor']          = $this->common_model->get_star_ids('actor',$data['actor']);
            $response['director']       = $this->common_model->get_star_ids('director',$data['director']);
            $response['writer']         = $this->common_model->get_star_ids('writer',$data['writer']);
            $response['country']        = $this->country_model->get_country_ids($data['country']);
            $response['genre']          = $this->genre_model->get_genre_ids($data['genre']);
            $response['rating']         = $data['rating'];
            $response['release']        = $data['release'];
            $response['poster']         = $data['poster'];
            $response['response']       = 'yes';
        }
        else{
            $response['imdb_status']    = 'fail';
            $response['title']          = '';
            $response['plot']           = '';
            $response['runtime']        = '';
            $response['actor']          = '';
            $response['director']       = '';
            $response['writer']         = '';
            $response['country']        = '';
            $response['genre']          = '';
            $response['rating']         = '';
            $response['release']        = '';
            $response['poster']         = '';
            $response['response']       = 'no';
        }
        echo json_encode($response);
    }

    function fetch_actor_from_tmdb(){
        $response                   = array();        
        $id                         =   trim($_POST["id"]);
        $from                       =   $_POST["from"];
        //$id = 284053;
        //$from ='tvww';
        $response['submitted_data'] = $_POST;
        $this->load->model('tmdb_model');
        if($from=='tv'){
            $data = $this->tmdb_model->get_tvshow_actor_info($id);
        }else{
            $data = $this->tmdb_model->get_movie_actor_info($id);
        }
        $this->session->set_flashdata('success', $data.' Stars imported from TMDB..');
        redirect(base_url() . 'admin/manage_star/', 'refresh');
        //var_dump($data);
    }

    function download_link(){
        $response = array();
        $data['videos_id']          = $_POST["videos_id"];            
        $data['link_title']         = $_POST["link_title"];
        $data['download_url']       = str_replace('"','',$_POST["download_url"]);
        $this->db->insert('download_link', $data);
        $response['row_id']         = $this->db->insert_id();
        $response['post_status']    = "success";
        $response['link_title']     = $_POST["link_title"];
        $response['download_url']   = str_replace('"','',$_POST["download_url"]);         
        echo json_encode($response);    
    }
    function video_file(){
        $response = array();
        $file_data['videos_id']         = $_POST["videos_id"];            
        $file_data['file_source']       = $_POST["type"];
        $file_data['file_url']          = $_POST["url"];
        $file_data['source_type']       = 'link';
        $file_data['stream_key']        = $this->generate_random_string();
        $this->db->insert('video_file', $file_data);
        $response['row_id']             = $this->db->insert_id();
        $response['post_status']        = "success";
        $response['type']               = $_POST["type"];
        $response['url']                = $_POST["url"];         
        $response['watch_url']          = base_url('watch/').$this->common_model->get_slug_by_videos_id($_POST["videos_id"]).'.html?key='.$file_data['stream_key'];         
        echo json_encode($response);    
    }

    function episodes_url(){
        $response = array();
        $file_data['videos_id']         = $_POST["videos_id"];
        $file_data['seasons_id']        = $_POST["seasons_id"];
        $file_data['episodes_name']     = $_POST["episodes_name"];            
        $file_data['file_source']       = $_POST["type"];
        $file_data['file_url']          = $_POST["url"];
        $file_data['stream_key']             = $this->generate_random_string();
        $file_data['source_type']       = 'link';
        $this->db->insert('episodes', $file_data);
        $response['row_id']             = $this->db->insert_id();
        $response['post_status']        = "success";
        $response['type']               = $_POST["type"];
        $response['url']                = $_POST["url"];         
        $response['episodes_name']      = $_POST["episodes_name"];         
        echo json_encode($response);    
    }

    // rating
    function rating(){
        $response = array();            
        $rate                       = $_POST["rate"];
        $video_id                       = $_POST["video_id"];
        $post_status = $this->post_rating( $rate , $video_id);
        $response['post_status'] = $post_status; 
        $response['rate'] = $rate; 
        $response['video_id'] = $video_id; 
        echo json_encode($response);
    
    }

    // post rating
    function post_rating( $rate , $video_id){

        $ip=$_SERVER['REMOTE_ADDR'];

        $verify_data = array(
                            'video_id'    => $video_id,                             
                            'ip'      => $ip                                                    
                            );

        $data = array(
                      'video_id'    => $video_id,
                      'rating'    => $rate,                             
                       'ip'      => $ip                                                   
                    );

        $query = $this->db->get_where('rating' , $verify_data);        
            $rating = $query->result_array();
            $num_row = $query->num_rows();
            if($num_row>0){        
                $this->db->where($verify_data);
				$this->db->update('rating', $data);
			}
            else{                
                $this->db->insert('rating', $data);
                $current_rating =$this->db->get_where('videos' , array('videos_id'=>$video_id))->row()->total_rating;
				$rating=$current_rating+1;
				$this->db->where('videos_id', $video_id);
				$this->db->update('videos', array('total_rating' => $rating));                
            }
           return "success"; 
        }

        //movie scraper

        function movie_scrapper_manage(){
			if ($this->session->userdata('admin_is_login') != 1)
				redirect(base_url(), 'refresh');
				/* start menu active/inactive section*/
				$this->session->unset_userdata('active_menu');
				$this->session->set_userdata('active_menu', '7');
				/* end menu active/inactive section*/
				$data['page_name']  = 'movie_scrapper';
				$data['page_title'] = 'Movie Scrapper';
				$this->load->view('admin/index', $data);
		}
        //movie scraper management
		
		public function movie_scrapper() {
			$message            =   '';
            $list               =   trim($this->input->post('movie_list'));
            $publication        =   trim($this->input->post('publication'));
			$fetch_trailer      =   trim($this->input->post('fetch_trailer'));
			if($list =='' || $list==NULL){
            $message        =   '<div class="alert alert-warning"><strong>Note:</strong> Enter a least one movie title..</div>';
            $this->session->set_flashdata('message', $message);
            redirect(base_url() . 'admin/videos_add/', 'refresh');
        }
        $explode            = explode(',', $list); 
        foreach($explode as $movieName) {    
        $url = 'http://ovoo.spagreen.net/movie-scrapper/get_movie_info_title.php?title='.urlencode($movieName);
        $curl               =   curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt( $curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1" );
        $data      =   curl_exec($curl);
        curl_close($curl);
        $data = json_decode($data, true);
		if(isset($data['Title'])){
                $imdbid                         = $data['imdbID'];
                $title                          = $data['Title'];
                $type                           = $data['Type'];
                $imdb_data['imdbid']            = $imdbid;
                $imdb_data['title']             = $title;
                $imdb_data['description']       = $data['Plot'];
                $imdb_data['runtime']           = $data['Runtime'];
                $imdb_data['stars']             = $this->common_model->get_star_ids('actor',$data['Actors']);
                $imdb_data['director']          = $this->common_model->get_star_ids('director',$data['Director']);
                $imdb_data['writer']            = $this->common_model->get_star_ids('writer',$data['Writer']);
                $imdb_data['country']           = $this->country_model->get_country_ids($data['Country']);
                $imdb_data['genre']             = $this->genre_model->get_genre_ids($data['Genre']);
                $imdb_data['imdb_rating']       = $data['imdbRating'];
                $imdb_data['release']           = date("Y-m-d",strtotime($data['Released']));
                $imdb_data['enable_download']   = '0';
                $poster                         = $data['Poster'];
                if($type=='series'){
                    $imdb_data['is_tvseries']   = '1';                    
                }

                if(isset($fetch_trailer) && $publication =='1'){
                    $imdb_data['trailer']       = '1';                    
                }else{
                    $imdb_data['trailer']       = '0';
                }
                if(isset($publication) &&  $publication =='1'){
                    $imdb_data['publication']   = '1';                    
                }else{
                    $imdb_data['publication']   = '0';
                }
				$result_row     =   count($this->db->get_where('videos', array('imdbid' =>$imdbid))->result_array());
			
			if($result_row == 0){
				$this->db->insert('videos', $imdb_data);
                $insert_id = $this->db->insert_id();
                //save poster
                $save_to = 'uploads/video_thumb/'.$insert_id.'.jpg';           
                $this->common_model->grab_image($poster,$save_to);
				
				$slug                       = url_title($title, 'dash', TRUE);
				$slug_num                   = $this->common_model->slug_num('videos',$slug);
				if($slug_num > 0){
				$slug= $slug.'-'.$insert_id;
				}
				$slug_data['slug']          = $slug;
				$this->db->where('videos_id', $insert_id);
				$this->db->update('videos', $slug_data);
				$message    .= '<div class="alert alert-success"><strong>'.$movieName.' </strong> Successfully added on your system.</div>';
			}
			else if($result_row > 0){
				$message    .= '<div class="alert alert-warning"><strong>'.$movieName.' </strong> already exist on your system.</div>';
			}
			
		}else{
                $message    .= '<div class="alert alert-warning"><strong>'.$movieName.' </strong>not found.</div>';

        }   
	}
	$this->session->set_flashdata('message', $message);
	redirect(base_url() . 'admin/movie_scrapper_manage/', 'refresh');
	}

    public function video_upload(){
        $response = array();
        $videos_id             = $_POST["videos_id"];
        if(isset($_FILES["FileInput"]) && $_FILES["FileInput"]["error"]== UPLOAD_ERR_OK)
            {
                ############ Edit settings ##############
                $UploadDirectory    = 'uploads/videos/'; //specify upload directory ends with / (slash)                
                //check if this is an ajax request
                if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
                    $response['status'] = 'error';
                    $response['errors'] = 'Not ajax requiest';                    
                }            
                
                //Is file size is less than allowed size.
                if ($_FILES["FileInput"]["size"] > 50000000000242880) {
                    $response['status'] = 'error';
                    $response['errors'] = 'File size is too big!';
                }
                
                //allowed file type Server side check
                switch(strtolower($_FILES['FileInput']['type']))
                {
                    /*
                    case 'image/png': 
                    case 'image/gif': 
                    case 'image/jpeg': 
                    case 'image/pjpeg':
                    case 'text/plain':
                    case 'text/html': //html file
                    case 'application/x-zip-compressed':
                    case 'application/pdf':
                    case 'application/msword':
                    case 'application/vnd.ms-excel':*/
                    case 'video/avi':
                    case 'video/msvideo':
                    case 'video/x-msvideo':
                    case 'video/mp4':
                    case 'video/mpeg':
                    case 'video/x-matroska':
                    case 'application/x-mpegurl':
                    case 'video/x-flv':
                    case 'video/webm':
                        break;
                    default:
                        $response['status'] = 'error';
                        $response['errors'] = 'Unsupported File!';
                }                
                $File_Name          = strtolower($_FILES['FileInput']['name']);
                $File_Ext           = substr($File_Name, strrpos($File_Name, '.')); //get file extention
                $Random_Number      = rand(0, 9999999999); //Random number to be added to name.
                $NewFileName        = $videos_id.'_'.$Random_Number.$File_Ext; //new file name
                
                if(move_uploaded_file($_FILES['FileInput']['tmp_name'], $UploadDirectory.$NewFileName ))
                {
                    $data['videos_id']      = $videos_id;
                    $data['file_source']    = $this->common_model->get_extension($NewFileName);
                    $data['source_type']    = 'upload';
                    $data['stream_key']     = $this->generate_random_string();
                    $data['file_url']       = base_url().'uploads/videos/'.$NewFileName;
                    $this->db->insert('video_file', $data);
                    $insert_id              = $this->db->insert_id();
                    $response['status']     = 'success';
                    //$response['video_info'] = '<tr id="row_'.$videos_id.'"><td><strong>Upload</strong></td><td>'.base_url().'uploads/videos/'.$NewFileName.'</a></td><td><a title="delete" class="btn btn-icon" onclick="delete_row('."'video_file',".$videos_id.')" class="delete"><i class="fa fa-remove"></i></td></tr>';
                    $response['video_info'] = '<tr id="row_'.$insert_id.'">
                                                <td>#</td>
                                                <td><a href="'.base_url('watch/').$this->common_model->get_slug_by_videos_id($videos_id).'.html?key='.$data['stream_key'].'">Server</a></td>
                                                <td>'.base_url().'uploads/videos/'.$NewFileName.'</td>
                                                <td></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-white btn-sm dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li><a target="_blank" href="'.base_url('watch/').$this->common_model->get_slug_by_videos_id($videos_id).'.html?key='.$data['stream_key'].'">Watch Now</a></li>
                                                            <li><a data-toggle="modal" data-target="#mymodal" data-id="http://mannan-nb/ovoo_v25/admin/view_modal/subtitle_add/'.$videos_id.'/'.$insert_id.'" id="menu">Add Subtitle</a> </li>
                                                            <li><a title="Delete" href="#" onclick="delete_row('."'video_file',".$insert_id.')" class="delete">Delete</a> </li>

                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>';
                }else{
                    $response['status'] = 'error';
                    $response['errors'] = 'error uploading File!';
                }                
            }
            else
            {
                $response['status'] = 'error';
                $response['errors'] = 'Something wrong with upload! Is "upload_max_filesize" set correctly?';
            }
        echo json_encode($response);
    }

     public function episodes_upload(){
        $response = array();
        $videos_id              = $_POST["videos_id"];
        $seasons_id             = $_POST["seasons_id"];
        $episodes_name          = $_POST["episodes_name"];
        if(isset($_FILES["FileInput"]) && $_FILES["FileInput"]["error"]== UPLOAD_ERR_OK)
            {
                ############ Edit settings ##############
                $UploadDirectory    = 'uploads/videos/'; //specify upload directory ends with / (slash)                
                //check if this is an ajax request
                if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
                    $response['status'] = 'error';
                    $response['errors'] = 'Not ajax requiest';                    
                }            
                
                //Is file size is less than allowed size.
                if ($_FILES["FileInput"]["size"] > 50000000000242880) {
                    $response['status'] = 'error';
                    $response['errors'] = 'File size is too big!';
                }
                
                //allowed file type Server side check
                switch(strtolower($_FILES['FileInput']['type']))
                {
                    /*
                    case 'image/png': 
                    case 'image/gif': 
                    case 'image/jpeg': 
                    case 'image/pjpeg':
                    case 'text/plain':
                    case 'text/html': //html file
                    case 'application/x-zip-compressed':
                    case 'application/pdf':
                    case 'application/msword':
                    case 'application/vnd.ms-excel':*/
                    case 'video/avi':
                    case 'video/msvideo':
                    case 'video/x-msvideo':
                    case 'video/mp4':
                    case 'video/mpeg':
                    case 'video/x-matroska':
                    case 'application/x-mpegurl':
                    case 'video/x-flv':
                    case 'video/webm':
                        break;
                    default:
                        $response['status'] = 'error';
                        $response['errors'] = 'Unsupported File!';
                }                
                $File_Name          = strtolower($_FILES['FileInput']['name']);
                $File_Ext           = substr($File_Name, strrpos($File_Name, '.')); //get file extention
                $Random_Number      = rand(0, 9999999999); //Random number to be added to name.
                $NewFileName        = $videos_id.'_'.$seasons_id.'_'.$Random_Number.$File_Ext; //new file name
                
                if(move_uploaded_file($_FILES['FileInput']['tmp_name'], $UploadDirectory.$NewFileName ))
                {
                    $data['videos_id']      = $videos_id;
                    $data['seasons_id']     = $seasons_id;
                    $data['episodes_name']  = $episodes_name;
                    $data['file_source']    = $this->common_model->get_extension($NewFileName);
                    $data['source_type']    = 'upload';
                    $data['stream_key']     = $this->generate_random_string();
                    $data['file_url']       = base_url().'uploads/videos/'.$NewFileName;
                    $this->db->insert('episodes', $data);
                    $episodes_id = $this->db->insert_id();
                    $response['status'] = 'success';
                    $response['video_info'] = '<tr id="row_'.$episodes_id.'"><td><strong>'.$episodes_name.'</strong><td><strong>Upload</strong></td><td>'.base_url().'uploads/videos/'.$NewFileName.'</a></td><td><a title="delete" class="btn btn-icon" onclick="delete_row('."'episodes',".$episodes_id.')" class="delete"><i class="fa fa-remove"></i></td></tr>';
                }else{
                    $response['status'] = 'error';
                    $response['errors'] = 'error uploading File!';
                }                
            }
            else
            {
                $response['status'] = 'error';
                $response['errors'] = 'Something wrong with upload! Is "upload_max_filesize" set correctly?';
            }
        echo json_encode($response);
    }

    public function load_stars(){
        $users_arr = array();
        $stars = $this->db->get('star')->result_array();
        foreach( $stars as $star){
            $userid = $star['star_id'];
            $name = $star['star_name'];
            $users_arr[] = array("id" => $userid, "name" => $name);
        }
        echo json_encode($users_arr);
    }

    public function load_stars2(){
        $users_arr = array();
        $stars = $this->db->get('star')->result_array();
        foreach( $stars as $star){
            //$userid = $star['star_id'];
            //$name = $star['star_name'];
            //$users_arr[] = array("id" => $userid, "name" => $name);
            echo '<option value="'.$star['star_id'].'">'.$star['star_name'].'</option>';
        }
        //echo json_encode($users_arr);
    }

    function generate_random_string($length=12) {
      $str = "";
        $characters = array_merge(range('a','z'), range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }

    function regenerate_stream_key($length=12) {
        if ($this->session->userdata('admin_is_login') != 1)
            redirect(base_url(), 'refresh');

        $video_files = $this->db->get('video_file')->result_array();
        foreach ($video_files as $video_file):
            $data['stream_key'] = $this->generate_random_string();
            $this->db->where('video_file_id',$video_file['video_file_id']);
            $this->db->update('video_file', $data);
        endforeach;
        $episodes = $this->db->get('episodes')->result_array();
        foreach ($episodes as $episode):
            $data['stream_key'] = $this->generate_random_string();
            $this->db->where('episodes_id',$episode['episodes_id']);
            $this->db->update('episodes', $data);
        endforeach;
        redirect(base_url() . 'admin/dashboard', 'refresh');
    }
    
}
