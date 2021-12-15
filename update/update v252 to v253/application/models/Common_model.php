<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * OVOO
 *
 * OVOO-Movie & Video Streaming CMS with Unlimited TV-Series
 *
 * @package     OVOO
 * @author      Abdul Mannan
 * @copyright   Copyright (c) 2014 - 2016 SpaGreen,
 * @license     http://codecanyon.net/wiki/support/legal-terms/licensing-terms/ 
 * @link        http://www.spagreen.net
 * @link        support@spagreen.net
 *
 **/
 

class Common_model extends CI_Model {
	
	function __construct()
    {
        parent::__construct();
    }
		/* clear cache*/	
	function clear_cache()
	{
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
	}


	function check_email_username($username='',$email='') {
      $this->db->where('email',$email);
      $this->db->or_where('username',$username);
        $rows = count($this->db->get('user')->result_array());
        if($rows >0){
        	return TRUE;
        }
        else{
        	return FALSE;
        }     
              
    }

        function check_email($email='') {
        $this->db->where('email',$email);
        $rows = count($this->db->get('user')->result_array());
        if($rows >0){
            return TRUE;
        }
        else{
            return FALSE;
        }     
              
    }

    function check_token($token='') {
        $this->db->where('token',$token);
        $rows = count($this->db->get('user')->result_array());
        if($rows >0){
            return TRUE;
        }
        else{
            return FALSE;
        }    
    }


    function slug_exist($table='',$slug='') {
        $rows = count($this->db->get_where($table, array('slug' => $slug))->result_array());
        if($rows >0){
          return TRUE;
        }
        else{
          return FALSE;
        }      
    }

    function slug_num($table='',$slug='') {
        return count($this->db->get_where($table, array('slug' => $slug))->result_array());
    }

    function get_video_type($video_type_id=''){
    	$query = $this->db->get_where('video_type', array('video_type_id' => $video_type_id));
        $res = $query->result_array();
        foreach ($res as $row)
            return $row['video_type'];
    }

    function get_category_name($category_id=''){
    	$query = $this->db->get_where('post_category', array('post_category_id' => $category_id));
        $res = $query->result_array();
        foreach ($res as $row)
            return $row['category'];
    }
		/* get image url */
	function get_img($type = '' , $id = '')
	{
		if(file_exists('uploads/'.$type.'_image/'.$id.'.jpg'))
			$image_url	=	base_url().'uploads/'.$type.'_image/'.$id.'.jpg';
		else
			$image_url	=	base_url().'uploads/user.jpg';
			
		return $image_url;
	}
		/* create and download database backup*/
	function create_backup()
    {
        $this->load->dbutil();  
        $options = array(
                'format'      => 'txt',             
                'add_drop'    => TRUE,              
                'add_insert'  => TRUE,              
                'newline'     => "\n"               
              );
        $tables   = array('');
        $file_name  =   'ovoo_backup_'.date('Y-m-d-H-i-s');
        $backup = $this->dbutil->backup(array_merge($options , $tables));
        $this->load->helper('file');
        write_file('db_backup/'.$file_name.'.sql', $backup); 
        //$this->load->helper('download');
        //force_download($file_name.'.sql', $backup);
        return 'done';
    }
	
	
		/* restore database backup*/	
	function restore_backup()
	{
		
		move_uploaded_file($_FILES['backup_file']['tmp_name'], 'uploads/backup.sql');

		$prefs = array(
            'filepath'						=> 'uploads/backup.sql',
			'delete_after_upload'			=> TRUE,
			'delimiter'						=> ';'
        );
		
		$schema = htmlspecialchars(file_get_contents($prefs['filepath']));

		$query = rtrim( trim($schema), "\n;");

		$query_list = explode(";", $query);
		$this->truncate();	
		

        foreach($query_list as $query){
        	$this->db->query($query);
        }
		/*$restore =& $this->dbutil->restore($prefs);
	*/
        unlink($prefs['filepath']);
	}
	
		/* empty data from table */
	function truncate() {
            $this->db->truncate('access');
            $this->db->truncate('accessories');
            $this->db->truncate('apps');
            $this->db->truncate('brand');
            $this->db->truncate('category');
            $this->db->truncate('computer');
            $this->db->truncate('ip');
            $this->db->truncate('device');
            $this->db->truncate('os');
            $this->db->truncate('supplier');  
    }

    function set_custom_value(){
    	$data['value'] = "Luke Dhaka Company Limited";
             $this->db->where('title' , 'company_name');
             $this->db->update('config' , $data);
             
             $data['value'] = "Gulshan, Dhaka-1200";
             $this->db->where('title' , 'address');
             $this->db->update('config' , $data);
             
             $data['value'] = "880100000000";
             $this->db->where('title' , 'phone');
             $this->db->update('config' , $data);
             
             $data['value'] = "support@spagreen.net";
             $this->db->where('title' , 'system_email');
             $this->db->update('config' , $data);
    }

     function reset_database(){
     	$this->set_custom_value();
     	$this->truncate();
    $prefs = array(
            'filepath'						=> 'uploads/data.sql',
			'delete_after_upload'			=> FALSE,
			'delimiter'						=> ';'
        );
		
		$schema = htmlspecialchars(file_get_contents($prefs['filepath']));

		$query = rtrim( trim($schema), "\n;");

		$query_list = explode(";", $query);
		$this->truncate();
		foreach($query_list as $query){
        	$this->db->query($query);
        }
        unlink($prefs['filepath']);

    }


    public function all_published_slider()
    {
        return $this->db->get_where('slider', array('publication'=> '1'), 8)->result();
    }

    public function all_published_videos($limit='',$page='')
    {        
        $offset = ($page*$limit)-$limit;
        if($offset<0){
            $offset = 0;
        }
        $this->db->where('is_tvseries','0');
        $this->db->where('publication', '1');
        $this->db->order_by("videos_id","desc");
        $this->db->limit($limit,$offset);
        return $this->db->get('videos')->result_array();
    }
    public function new_published_videos($limit='',$page='')
    {
        $this->db->where('publication', '1');
        $this->db->where('is_tvseries', '0');
        $this->db->order_by("videos_id","desc");
        $this->db->limit(12);
        return $this->db->get('videos')->result_array();
    }

    public function latest_published_videos($limit='',$page='')
    {
        $this->db->where('publication', '1');
        $this->db->where('is_tvseries', '0');
        $this->db->order_by("total_view","desc");
        $this->db->limit(12);
        return $this->db->get('videos')->result_array();
    }

    public function new_published_tv_series($limit='',$page='')
    {
        $this->db->where('publication', '1');
        $this->db->where('is_tvseries', '1');
        $this->db->order_by("videos_id","desc");
        $this->db->limit(12);
        return $this->db->get('videos')->result_array();
    }

    public function latest_published_tv_series($limit='',$page='')
    {
        $this->db->where('publication', '1');
        $this->db->where('is_tvseries', '1');
        $this->db->order_by("total_view","desc");
        $this->db->limit(12);
        return $this->db->get('videos')->result_array();
    }

    public function get_num_episodes_by_id($videos_id='')
    {
        return $this->db->get_where('episodes', array('videos_id'=>$videos_id))->num_rows();
    }

    public function get_num_episodes_by_seasons_id($seasons_id='')
    {
        return $this->db->get_where('episodes', array('seasons_id'=>$seasons_id))->num_rows();
    }

    public function all_published_tv_series()
    {
        $this->db->where('is_tvseries', '1');
        $this->db->where('publication', '1');
        $this->db->order_by("total_view","desc");
        $this->db->limit(12);
        $query_result = $this->db->get('videos');
        $result = $query_result->result();
        return $result;
    }

    public function all_published_request_movies()
    {
        $this->db->where("FIND_IN_SET(left(3,10),video_type)>0");
        //$this->db->where('video_type', '3');
        $this->db->where('publication', '1');
        $this->db->order_by("videos_id","desc");
        $this->db->limit(12);
        $query_result = $this->db->get('videos');
        $result = $query_result->result();
        return $result;
    }

    public function all_page_on_primary_menu()
    {
        $this->db->where('primary_menu', '1');
        $this->db->order_by("page_id","ASC");
        $query_result = $this->db->get('page');
        $result = $query_result->result();
        return $result;
    }

    public function all_video_type_on_primary_menu()
    {
        $this->db->where('primary_menu', '1');
        $this->db->order_by("video_type_id","ASC");
        $query_result = $this->db->get('video_type');
        $result = $query_result->result();
        return $result;
    }
    public function all_video_type_on_footer_menu()
    {
        $this->db->where('footer_menu', '1');
        $this->db->order_by("video_type_id","ASC");
        $query_result = $this->db->get('video_type');
        $result = $query_result->result();
        return $result;
    }

    public function all_page_on_footer_menu()
    {
      $this->db->select('*');
        $this->db->from('page');
        $this->db->where('footer_menu', '1');
        $this->db->order_by("page_id","ASC");
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }    
    
    public function all_published_trailers()
    {
        $this->db->select('*');
        $this->db->from('videos');
        //$this->db->where("FIND_IN_SET(left(4,10),video_type)>0");
        $this->db->where('is_tvseries', '0');
        $this->db->where('publication', '1');
        $this->db->order_by("videos_id","desc");
        $this->db->limit(6);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
   

    public function get_videos_by_slug($slug)
    {
        return $this->db->get_where('videos', array('slug' => $slug))->row();
    }
    public function get_videos_id_by_slug($slug)
    {
        return $this->db->get_where('videos', array('slug' => $slug))->row()->videos_id;
    }
    public function watch_count_by_slug($slug)
    {
        $videos_id          =   $this->db->get_where('videos', array('slug' => $slug))->row()->videos_id;
        $total_view         =   $this->db->get_where('videos', array('slug' => $slug))->row()->total_view;
        $data['total_view'] =    $total_view +   1;
        $this->db->where('videos_id', $videos_id);
        $this->db->update('videos', $data);
    }    

    public function type_is_exist($slug)
    {
        $num_rows = $this->db->get_where('video_type', array('slug' => $slug))->num_rows();
        if($num_rows > 0):
            return true;
        else:
            return false;
        endif;
    }

    public function get_star_id_by_slug($slug)
    {
        if(count($this->db->get_where('star', array('slug' => $slug))->result_array())> 0):
            $star_id = $this->db->get_where('star', array('slug' => $slug))->row()->star_id;
        else:
            $star_id =0;
        endif;
        return $star_id;
    }

    public function get_video_by_star($limit, $start,$star_id)
    {
        $data =array();
        $this->db->group_start();
        $this->db->where("FIND_IN_SET($star_id,stars)>0");
        $this->db->or_where("FIND_IN_SET($star_id,director)>0");
        $this->db->or_where("FIND_IN_SET($star_id,writer)>0");
        $this->db->group_end();
        $this->db->where('publication', '1');
        $this->db->order_by("videos_id","desc");
        $this->db->limit($limit,$start);
        $query = $this->db->get('videos');
        //var_dump($this->db->last_query());
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return $data;
    }

    public function convert_star_ids_to_names($ids='')
    {
        $names = '';
        if($ids !='' && $ids !=NULL):
            $i = 0;
            $stars =explode(',', $ids);                                                
            foreach ($stars as $star_id):
                if($i>0){ $names .=',';} $i++;
                $names .= $this->common_model->get_star_name_by_id($star_id);
            endforeach;
        endif;
        return $names;
    }

    public function get_video_by_star_record_count($star_id)
    {
        $this->db->select('*');
        $this->db->from('videos');
        $this->db->group_start();
        $this->db->where("FIND_IN_SET($star_id,stars)>0");
        $this->db->or_where("FIND_IN_SET($star_id,director)>0");
        $this->db->or_where("FIND_IN_SET($star_id,writer)>0");
        $this->db->group_end();
        $this->db->where('publication', '1');
        $this->db->order_by("videos_id","desc");
        $query = $this->db->get();        
        return $query->num_rows();
    }

    public function get_video_by_director($limit, $start,$director)
    {
        
        $this->db->select('*');
        $this->db->from('videos');
        $this->db->like('director', $director);
        $this->db->where('publication', '1');
        $this->db->order_by("videos_id","desc");
        $this->db->limit(24);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return '';
    }

    public function get_videos_num_rows($array=array())
    {
        if($array !='' && $array !=NULL && !empty($array))
            $this->db->like($array);
        $query = $this->db->get('videos');
        return $query->num_rows();
    }

     public function get_videos($array=array(),$limit=NULL, $start=NULL)
    {
        if($array !='' && $array !=NULL && !empty($array))
            $this->db->like($array);
        $this->db->order_by("videos_id","desc");
        $this->db->limit($limit,$start);
        $query = $this->db->get('videos');
        if ($query->num_rows() > 0){
            return $query->result_array();        
        }else{
            return array();
        }
    }

    public function get_stars($limit=10, $start=0)
    {
        $this->db->order_by("star_id","DESC");
        $this->db->limit($limit,$start);
        $query = $this->db->get_where('star', array('status'=>'1'));
        $data = $query->result_array(); 
        if ($query->num_rows() > 0){
            return $data;        
        }
    }



    public function get_tvseries($limit=NULL, $start=NULL)
    {        
        $this->db->select('*');
        $this->db->from('videos');
        $this->db->where('is_tvseries', '1');
        $this->db->order_by("videos_id","desc");
        $this->db->limit($limit,$start);
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result_array();        
        }
    }

    public function get_video_by_director_record_count($director)
    {
        $this->db->select('*');
        $this->db->from('videos');
        $this->db->like('director', $director);
        $this->db->where('publication', '1');
        $this->db->order_by("videos_id","desc");
        $this->db->limit(24);
        $query = $this->db->get();        
        return $query->num_rows();
    }

    public function get_video_by_tags($limit, $start,$tags)
    {
        $this->db->like('tags', $tags);
        $this->db->where('publication', '1');
        $this->db->order_by("videos_id","desc");
        $this->db->limit($limit,$start);
        $query = $this->db->get("videos");        
        return $query->result_array();

    }

    public function get_video_by_year($limit, $start,$year)
    {
        $this->db->like('release', $year);
        $this->db->where('publication', '1');
        $this->db->order_by("videos_id","desc");
        $this->db->limit($limit,$start);
        $query = $this->db->get("videos");
        return $query->result_array();
    }

    public function get_video_by_tags_record_count($tag)
    {
        $this->db->select('*');
        $this->db->from('videos');
        $this->db->like('tags', $tag);
        $this->db->where('publication', '1');
        $this->db->order_by("videos_id","desc");
        $this->db->limit(24);
        $query = $this->db->get();        
        return $query->num_rows();
    }
    public function get_video_by_year_record_count($year)
    {
        $this->db->select('*');
        $this->db->from('videos');
        $this->db->like('release', $year);
        $this->db->where('publication', '1');
        $this->db->order_by("videos_id","desc");
        $this->db->limit(24);
        $query = $this->db->get();        
        return $query->num_rows();
    }
    
    // star
    public function get_star_ids($type='',$stars='')
    {
        $stars          = explode(',', $stars);
        $ids            = '';
        $i=0;
        foreach ($stars as $star) {
            $i++;
            if($i>1){
               $ids .=',';
            }
            $ids .=$this->get_star_id_by_name($type,$star);
        }
        return $ids;
    }
    function get_star_name_by_id($star_id)
    {
        $query  =   $this->db->get_where('star' , array('star_id' => $star_id));
        $res    =   $query->result_array();
        foreach($res as $row)           
            return $row['star_name'];
    }

    function get_star_slug_by_id($star_id)
    {
        $query  =   $this->db->get_where('star' , array('star_id' => $star_id));
        $res    =   $query->result_array();
        foreach($res as $row)           
            return $row['slug'];
    }

    public function get_star_id_by_name($type,$name)
    {
        $name =$this->get_filtered_string($name);
        $result =   count($this->db->get_where('star', array('star_name' => $name))->result_array());
        if($result >    0){
        $star_id = $this->db->get_where('star', array('star_name' => $name))->row();
        return $star_id->star_id;
        }else{            
            $data['slug']                   = $this->get_seo_url($name);
            $data['star_name']              = $name;
            $data['star_type']              = $type;
            $data['star_desc']              = ' ';
            $data['status']                 = '1';
            $this->db->insert('star', $data);
            return $this->db->insert_id();
        }
    }

    
    public function movies_record_count()
    {
        $this->db->where("is_tvseries !=","1");
		$this->db->where("publication","1");
        $query = $this->db->get('videos');
        return $query->num_rows();
    }
    public function search_movies_record_count($search='')
    {
        $query = $this->db->like('title', $search)->get('videos');
        
        return $query->num_rows();
    }
    
    public function tv_series_record_count()
    {
        return $this->db->get_where('videos', array('is_tvseries'=>'1'))->num_rows();
    }

    public function is_video_published($videos_id)
    {
        $publication                    =   $this->db->get_where('videos' , array('videos_id'=>$videos_id))->row()->publication;
        
        if($publication =='1')
            return true;
        else
            return false;        
    }
    
    public function requested_movie_record_count()
    {
        $query = $this->db->where("FIND_IN_SET(left(3,10),video_type)>0")->get('videos');
        //$query = $this->db->where('video_type', '3')->get('videos');
        
        return $query->num_rows();
    }
    
    public function trailers_record_count()
    {
        $query = $this->db->where("FIND_IN_SET(left(4,10),video_type)>0")->get('videos');
        //$query = $this->db->where('video_type', '4')->get('videos');
        
        return $query->num_rows();
    }
    
   public function fetch_videos($limit, $start) {
        $this->db->limit($limit, $start);
        
        $this->db->select('*');
        $this->db->from('videos');
        //$this->db->where('video_type', '1');
        $this->db->where("FIND_IN_SET(left(1,10),video_type)>0");
        $this->db->where('publication', '1');
        $this->db->order_by("videos_id","desc");
        $this->db->limit(24);
        $query = $this->db->get();
        

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }

   public function fetch_search_videos($limit, $start,$search) {
        $this->db->limit($limit, $start);
        $this->db->like('title',$search);
        $this->db->where('publication', '1');
        $this->db->order_by("videos_id","desc");
        return $this->db->get('videos')->result_array();        
   }

   
   public function fetch_tv_series($limit, $start) {
        $this->db->where('is_tvseries','1');
        $this->db->where('publication', '1');
        $this->db->order_by("videos_id","desc");
        $this->db->limit($limit,$start);
        $query = $this->db->get("videos");
        return $query->result_array();
   }
   
   public function fetch_request_movies($limit, $start) {
        $this->db->limit($limit, $start);
        
        $this->db->select('*');
        $this->db->from('videos');
        $this->db->where("FIND_IN_SET(left(3,10),video_type)>0");
        //$this->db->where('video_type', '3');
        $this->db->where('publication', '1');
        $this->db->order_by("videos_id","desc");
        $this->db->limit(32);
        $query = $this->db->get();
        

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   
   public function fetch_trailers($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->where("FIND_IN_SET(left(4,10),video_type)>0");
        $this->db->where('publication', '1');
        $this->db->order_by("videos_id","desc");
        $this->db->limit(32);
        $query = $this->db->get('videos');
        

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }   

   public function fetch_video_type_video_by_slug($limit, $start, $slug)
   {
        $video_type = $this->db->get_where('video_type', array('slug' => $slug))->row()->video_type_id;
        $this->db->limit($limit, $start);
        $this->db->where("find_in_set(".$video_type.",video_type) >",0);
        $this->db->where('publication', '1');
        $this->db->order_by("videos_id","desc");;
        $query = $this->db->get("videos");
        return $query->result_array();
    }

  public function fetch_video_type_video_by_slug_record_count($slug)
    {
        $video_type = $this->db->get_where('video_type', array('slug' => $slug))->row();
        $query = $this->db->where(array('video_type'=>$video_type->video_type_id))->get('videos');        
        return $query->num_rows();
    }

    public function fetch_country_video_by_slug($limit, $start, $slug) {
        $country_id = $this->db->get_where('country', array('slug' => $slug))->row();
        $this->db->limit($limit, $start);        
        $this->db->select('*');
        $this->db->from('videos');
        $this->db->where("FIND_IN_SET(left($country_id->country_id,10),country)>0");
        //$this->db->where('country', $country_id->country_id);
        //$this->db->where('video_type', '3');
        $this->db->where('publication', '1');
        $this->db->order_by("videos_id","desc");
        $this->db->limit(24);
        $query = $this->db->get();
        

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return '';
   }

   public function fetch_country_video_by_slug_record_count($slug)
    {
        $country_id = $this->db->get_where('country', array('slug' => $slug))->row();
        $query = $this->db->where(array('country'=>$country_id->country_id))->get('videos');
        
        return $query->num_rows();
    }


    public function fetch_blog_post($limit, $start) {
        $this->db->limit($limit, $start);        
        $this->db->select('*');
        $this->db->from('posts');
        $this->db->where('publication', '1');
        $this->db->order_by("posts_id","DESC");
        $this->db->limit(10);
        $query = $this->db->get();
        

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return '';
   }

   public function fetch_blog_post_record_count()
    {
        
        $query = $this->db->where(array('publication'=>'1'))->get('posts');
        
        return $query->num_rows();
    }
    public function post_comments_record_count_by_id($id='')
    {
        
        $query = $this->db->where(array('post_id'=>$id, 'comment_type'=>'1','publication'=>'1'))->get('post_comments');
        
        return $query->num_rows();
    }

    public function fetch_blog_post_by_category_record_count($slug)
    {        
        $category_id = $this->db->get_where('post_category', array('slug' => $slug))->row();
        $this->db->where("FIND_IN_SET(left($category_id->post_category_id,10),category_id)>0");
        $this->db->where('publication', '1');
        $query = $this->db->get('posts');        
        return $query->num_rows();
    }
    public function fetch_blog_post_by_category($limit, $start, $slug)
    {
        $category_id = $this->db->get_where('post_category', array('slug' => $slug))->row();
        $this->db->limit($limit, $start);        
        $this->db->select('*');
        $this->db->where("FIND_IN_SET(left($category_id->post_category_id,10),category_id)>0");
        $this->db->where('publication', '1');
        $this->db->order_by("posts_id","desc");
        $this->db->limit(10);
        $query = $this->db->get('posts');        
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return '';
    }

    public function fetch_blog_post_by_author_record_count($slug)
    {        
        $author_id = $this->db->get_where('user', array('slug' => $slug))->row();
        $this->db->where('user_id',$author_id->user_id);
        $this->db->where('publication', '1');
        $query = $this->db->get('posts');        
        return $query->num_rows();
    }
    public function fetch_blog_post_by_author($limit, $start, $slug)
    {
        $author_id = $this->db->get_where('user', array('slug' => $slug))->row();
        $this->db->limit($limit, $start);        
        $this->db->select('*');
        $this->db->where('user_id',$author_id->user_id);
        $this->db->where('publication', '1');
        $this->db->order_by("posts_id","desc");
        $this->db->limit(10);
        $query = $this->db->get('posts');        
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return '';
    }
   
   public function search_result($search)
   {
     $this->db->like('title',$search);
     $query  =   $this->db->get('videos');
         return $query->result();
   }


   function get_image_url($type = '' , $id = '')
    {
        if(file_exists('uploads/'.$type.'_image/'.$id.'.jpg'))
            $image_url  =   base_url().'uploads/'.$type.'_image/'.$id.'.jpg';
        else
            $image_url  =   base_url().'uploads/user.jpg';
            
        return $image_url;
    }

    function get_video_thumb_url($videos_id = '')
    {
        if(file_exists('uploads/video_thumb/'.$videos_id.'.jpg'))
            $image_url  =   base_url().'uploads/video_thumb/'.$videos_id.'.jpg';
        else
            $image_url  =   base_url().'uploads/default_image/thumbnail.jpg';
            
        return $image_url;
    }

    function get_video_poster_url($videos_id = '')
    {
        if(file_exists('uploads/poster_image/'.$videos_id.'.jpg'))
            $image_url  =   base_url().'uploads/poster_image/'.$videos_id.'.jpg';
        else if(file_exists('uploads/video_thumb/'.$videos_id.'.jpg'))
            $image_url  =   base_url().'uploads/video_thumb/'.$videos_id.'.jpg';
        else
            $image_url  =   base_url().'uploads/default_image/poster.jpg';            
        return $image_url;
    }

    function get_video_poster_admin_url($videos_id = '')
    {
        if(file_exists('uploads/poster_image/'.$videos_id.'.jpg'))
            $image_url  =   base_url().'uploads/poster_image/'.$videos_id.'.jpg';
        
        else
            $image_url  =   base_url().'uploads/default_image/poster.jpg';
            
        return $image_url;
    }    


   function get_name_by_id($user_id)
    {
        $query  =   $this->db->get_where('user' , array('user_id' => $user_id));
        $res    =   $query->result_array();
        foreach($res as $row)           
            return $row['name'];
    }

    

    function get_slug_by_user_id($user_id)
    {
        $query  =   $this->db->get_where('user' , array('user_id' => $user_id));
        $res    =   $query->result_array();
        foreach($res as $row)           
            return $row['slug'];
    }

    function get_category_name_by_id($category_id)
    {
        $query  =   $this->db->get_where('post_category' , array('post_category_id' => $category_id));
        $res    =   $query->result_array();
        foreach($res as $row)           
            return $row['category'];
    }

    function get_slug_by_category_id($category_id)
    {
        $query  =   $this->db->get_where('post_category' , array('post_category_id' => $category_id));
        $res    =   $query->result_array();
        foreach($res as $row)           
            return $row['slug'];
    }

    public function post_is_exist($slug='')
    {
        $num_rows = $this->db->get_where('posts', array('slug' => $slug))->num_rows();
        if($num_rows > 0):
            return true;
        else:
            return false;
        endif;

    }

    public function get_posts_by_slug($slug)
    {
        return $this->db->get_where('posts', array('slug' => $slug))->row();
    }

    public function related_posts($id='')
    {
        $this->db->select('*');
        $this->db->from('posts');
        $this->db->where("FIND_IN_SET(left($id,10),category_id)>0");
        $this->db->where('publication', '1');
        $this->db->order_by("posts_id","desc");
        $this->db->limit(2);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function create_small_thumbnail($source='', $destination='', $width='',$height=''){
        $this->load->library('image_lib');
        $config['image_library'] = 'gd2';
        $config['source_image'] = $source;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['height']   = $height;
        $config['width'] = $width;
        $config['new_image'] = $destination;//you should have write permission here..
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
    }

    public function resize_image($source='', $destination='', $width=110,$height=110)
    {
        //$filename = $this->input->post('new_val');
        //$source_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/avatar/tmp/' . $filename;
        //$target_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/avatar/';
        $config_manip = array(
            'image_library' => 'gd2',
            'source_image' => $source,
            'new_image' => $destination,
            'maintain_ratio' => FALSE,
            'width' => $width,
            'height' => $height
        );
        $this->load->library('image_lib', $config_manip);
        if (!$this->image_lib->crop()) {
            echo $this->image_lib->display_errors();
        }
        // clear //
        $this->image_lib->clear();
    }

    public function get_page_details_by_slug($slug='')
    {
        return $this->db->get_where('page', array('slug' => $slug))->row();
    }

    public function page_is_exist($slug='')
    {
        $num_rows = $this->db->get_where('page', array('slug' => $slug))->num_rows();
        if($num_rows > 0):
            return true;
        else:
            return false;
        endif;

    }

    function get_video_title_by_id($videos_id)
    {
        $query  =   $this->db->get_where('videos' , array('videos_id' => $videos_id));
        $res    =   $query->result_array();
        foreach($res as $row)           
            return $row['title'];
    }


    function escapeString($val) {
    $db = get_instance()->db->conn_id;
    $val = mysqli_real_escape_string($db, $val);
    return $val;
    }

    function time_ago($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

    public function grab_image($file_url,$save_to){

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $file_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 140);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2); 
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        $output = curl_exec($ch);
        $file = fopen($save_to, "w+");
        fputs($file, $output);
        fclose($file);
    }
    function get_extension($file) {
     $extension = explode(".", $file);
     $ext = end($extension);
     return $ext ? $ext : 'link';
    }
    function get_filtered_string($string) {
        $string = trim($string);
        $string = preg_replace("/[^ \w]+/", "", $string);
        return $string;
    }
    function get_seo_url($string) {
        //Lower case everything
        $string = strtolower($string);
        //Make alphanumeric (removes all other characters)
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        //Clean up multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);
        return $string;
    }

    function get_total_episods_by_seasons_id($seasons_id){
        return count($this->db->get_where('episodes', array('seasons_id'=>$seasons_id))->result_array());
    }
    function get__seasons_name_by_id($seasons_id=''){
        $seasons =$this->db->get_where('seasons' , array('seasons_id'=>$seasons_id));
        if($seasons->num_rows() >0){
            return $seasons->row()->seasons_name;
        }else{
            return 'Seasons Not Found';
        }
    }

    function get_title_by_videos_id($videos_id=''){
        $video =$this->db->get_where('videos' , array('videos_id'=>$videos_id));
        if($video->num_rows() >0){
            return $video->row()->title;
        }else{
            return 'Title Not Found';
        }
    }

    function get_srclang($language=''){
        $languages =$this->db->get_where('languages_iso' , array('name'=>$language));
        if($languages->num_rows() >0){
            return $languages->row()->iso;
        }else{
            return 'en';
        }
    }

    function get_slug_by_videos_id($videos_id=''){
        $video =$this->db->get_where('videos' , array('videos_id'=>$videos_id));
        if($video->num_rows() >0){
            return $video->row()->slug;
        }else{
            return '';
        }
    }

    function get_title_by_posts_id($posts_id){
         $total = count($this->db->get_where('posts' , array('posts_id'=>$posts_id))->result_array());
         if($total > 0){
            return $this->db->get_where('posts' , array('posts_id'=>$posts_id))->row()->post_title;        
         }else{
            return "Not Found";
        }
    }

    function get_ads_status($unique_name = ''){
         return $this->db->get_where('ads' , array('unique_name'=>$unique_name),1)->row()->enable;
    }

    function get_ads($unique_name = ''){
        $ads_content    =   '';
         $ads      =   $this->db->get_where('ads' , array('unique_name'=>$unique_name),1)->row();
         if($ads->ads_type == 'image' && $ads->enable !='0'){
            $ads_content .= "<a href='".$ads->ads_url."'><img src='".$ads->ads_image_url."' class='img-fluid mx-auto d-block'>";
        }else if($ads->ads_type == 'code' && $ads->enable !='0'){
            $ads_content .= $ads->ads_code;       
         }
         return $ads_content;
    }

    function get_all_ads($unique_name = ''){
        return $this->db->get('ads')->result_array();
    }

    function get_single_ads($ads_id = ''){
        return $this->db->get_where('ads', array('ads_id'=>$ads_id),1)->row();
    }

    function generate_slug($table='',$slug='')
    {
       $slug = url_title($slug, 'dash', TRUE);
       $rows = $this->db->get_where($table, array('slug'=>$slug))->num_rows();
       if($rows > 0){
        $slug = $slug.'-'.$this->generate_random_string();
       }
       return $slug;
    }

    function regenerate_slug($table='',$id='',$slug='')
    {
        $column_name = $table.'_id !=';
        $slug = url_title($slug, 'dash', TRUE);
        $rows = $this->db->get_where($table, array('slug'=>$slug,$column_name=>$id))->num_rows();
        if($rows > 0){
            $slug = $slug.'-'.$this->generate_random_string();
        }
        return $slug;
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

}


