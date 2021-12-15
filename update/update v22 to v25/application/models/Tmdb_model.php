<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tmdb_model extends CI_Model {
	
	function __construct()
    {
        parent::__construct();
    }
    function get_movie_info($tmdb_id='')
    {
      $purchase_code  = trim($this->db->get_where('config' , array('title'=>'purchase_code'))->row()->value);
      if($purchase_code =='' || $purchase_code==NULL):
        $purchase_code  = '123456987123';
      endif;
      if($tmdb_id =='' || $tmdb_id==NULL):
        $tmdb_id  = '00000000';
      endif;
      //$data           = file_get_contents('http://ovoo.spagreen.net/scrapper/v20/get_movie_json/8917095a-cf88-448f-af0e-5f5318a55fe7/'.$tmdb_id);
      $data           = file_get_contents('http://ovoo.spagreen.net/scrapper/v20/get_movie_json/'.$purchase_code.'/'.$tmdb_id);
	  	$data           = json_decode($data, true);
      if(isset($data['error_message'])){
        $response['status']    = 'fail';
      }else{
        $actors         = array();
        $directors      = array();
        $writters       = array();
        $countries      = array();
        $genres         = array();
        if(count($data) >0){
    	  	$actors        = $this->filter_actors($data['credits']['cast']);
    	  	$directors     = $this->filter_directors($data['credits']['crew']);
    	  	$writters      = $this->filter_writters($data['credits']['crew']);
    	  	$countries     = $this->filter_countries($data['production_countries']);
    	  	$genres        = $this->filter_genres($data['genres']);
        }
    		$response      = array();
    		if(count($data) >0 && $data['title'] !='' && $data['title'] !=NULL){
          $response['status']         = 'success';
          $response['imdbid']         = $data['imdb_id'];//$data['imdbID'];
          $response['title']          = $data['title'];
          $response['plot']           = $data['overview'];
          $response['runtime']        = $data['runtime'].' Min';
          $response['actor']          = $actors;//$this->common_model->get_star_ids('actor',$data['Actors']);
          $response['director']       = $directors;//$this->common_model->get_star_ids('director',$data['Director']);
          $response['writer']         = $writters;//$this->common_model->get_star_ids('writer',$data['Writer']);
          $response['country']        = $countries;//$this->common_model->get_country_ids($data['Country']);
          $response['genre']          = $genres;//$this->common_model->get_genre_ids($movie->getGenres());
          $response['rating']         = $data['vote_average'];
          $response['release']        = $data['release_date'];
          $response['poster']         = 'https://image.tmdb.org/t/p/original/'.$data['poster_path'];
        }else{
          $response['status']    = 'fail';
        }
      }
  	return $response;
    
  }

  function get_tvseries_info($tmdb_id='')
    {
      $purchase_code  = trim($this->db->get_where('config' , array('title'=>'purchase_code'))->row()->value);
      if($purchase_code =='' || $purchase_code==NULL):
        $purchase_code  = '123456987123';
      endif;
      if($tmdb_id =='' || $tmdb_id==NULL):
        $tmdb_id  = '00000000';
      endif;
      //$data           = file_get_contents('http://ovoo.spagreen.net/scrapper/v20/get_movie_json/8917095a-cf88-448f-af0e-5f5318a55fe7/'.$tmdb_id);
      $data           = file_get_contents('http://ovoo.spagreen.net/scrapper/v20/get_tvshow_json/'.$purchase_code.'/'.$tmdb_id);
      $data           = json_decode($data, true);
      if(isset($data['error_message'])){
        $response['status']    = 'fail';
      }else{
        $actors         = array();
        $directors      = array();
        $writters       = array();
        $countries      = array();
        $genres         = array();
        if(count($data) >0){
          $actors       = $this->filter_actors($data['credits']['cast']);
          $directors    = $this->filter_directors($data['credits']['crew']);
          $writters     = $this->filter_writters($data['credits']['crew']);
          $countries    = $this->filter_tv_countries($data['origin_country']);
          $genres       = $this->filter_genres($data['genres']);
        }
        $response       = array();
        if(count($data) >0 && $data['original_name'] !='' && $data['original_name'] !=NULL){
          $response['status']         = 'success';
          $response['imdbid']         = '';//$data['imdb_id'];//$data['imdbID'];
          $response['title']          = $data['original_name'];
          $response['plot']           = $data['overview'];
          $response['runtime']        = '';///$data['episode_run_time'].' Min';
          $response['actor']          = $actors;//$this->common_model->get_star_ids('actor',$data['Actors']);
          $response['director']       = $directors;//$this->common_model->get_star_ids('director',$data['Director']);
          $response['writer']         = $writters;//$this->common_model->get_star_ids('writer',$data['Writer']);
          $response['country']        = $countries;//$this->common_model->get_country_ids($data['Country']);
          $response['genre']          = $genres;//$this->common_model->get_genre_ids($movie->getGenres());
          $response['rating']         = $data['vote_average'];
          $response['release']        = $data['first_air_date'];
          $response['poster']         = 'https://image.tmdb.org/t/p/original/'.$data['poster_path'];
        }else{
          $response['status']    = 'fail';
        }
      }
    return $response;
    
  }


  function get_movie_actor_info($tmdb_id='')
    {
      $added_star     = 0;
      $purchase_code  = trim($this->db->get_where('config' , array('title'=>'purchase_code'))->row()->value);
      if($purchase_code =='' || $purchase_code==NULL):
        $purchase_code  = '123456987123';
      endif;
      if($tmdb_id =='' || $tmdb_id==NULL):
        $tmdb_id  = '00000000';
      endif;
      //$data           = file_get_contents('http://ovoo.spagreen.net/scrapper/v20/get_movie_json/8917095a-cf88-448f-af0e-5f5318a55fe7/'.$tmdb_id);
      $data           = file_get_contents('http://ovoo.spagreen.net/scrapper/v20/get_movie_json/'.$purchase_code.'/'.$tmdb_id);
      $data           = json_decode($data, true);
      if(isset($data['error_message'])){
        $response['status']    = 'fail';
      }else{
        //var_dump($data);
        $actors         = array();
        $directors      = array();
        $writters       = array();        
        if(count($data) >0){
          $actors       = $this->update_actors($data['credits']['cast']);
          $stars        = $this->update_directors_writers($data['credits']['crew']);
          $added_star   = $actors + $stars;
        }
      }
      return $added_star;    
  }

  function get_tvshow_actor_info($tmdb_id='')
    {
      $added_star     = 0;
      $purchase_code  = trim($this->db->get_where('config' , array('title'=>'purchase_code'))->row()->value);
      if($purchase_code =='' || $purchase_code==NULL):
        $purchase_code  = '123456987123';
      endif;
      if($tmdb_id =='' || $tmdb_id==NULL):
        $tmdb_id  = '00000000';
      endif;
      //$data           = file_get_contents('http://ovoo.spagreen.net/scrapper/v20/get_movie_json/8917095a-cf88-448f-af0e-5f5318a55fe7/'.$tmdb_id);
      $data           = file_get_contents('http://ovoo.spagreen.net/scrapper/v20/get_tvshow_json/'.$purchase_code.'/'.$tmdb_id);
      $data           = json_decode($data, true);
      if(isset($data['error_message'])){
        $response['status']    = 'fail';
      }else{
        //var_dump($data);
        $actors         = array();
        $directors      = array();
        $writters       = array();        
        if(count($data) >0){
          $actors       = $this->update_actors($data['credits']['cast']);
          $stars        = $this->update_directors_writers($data['credits']['crew']);
          $added_star   = $actors + $stars;
        }
      }
      return $added_star;    
  }


    function get_movie_actor_info55($tmdb_id='')
    {
      include('tmdb/tmdb-api.php');
      $tmdb           = new TMDB(); 
      $tmdb->setAPIKey('ce97a27c0c72e4b774655681c455c877');
      $tvshow         = $tmdb->getMovie($tmdb_id);
      $data           = $tvshow->getJSON();


      $data           = json_decode($data, true);
      //var_dump($data);
      $actors         = array();
      $directors      = array();
      $writters       = array();
      $added_star     = 0;
      if(count($data) >0){
        $actors       = $this->update_actors($data['credits']['cast']);
        $stars        = $this->update_directors_writers($data['credits']['crew']);
        $added_star   = $actors + $stars;
      }
      return $added_star;    
  }


  function update_actors($actors){
    $added_star =0;
    for ($i=0; $i<sizeof($actors); $i++) {      
      $actors_name  = trim($actors[$i]['name']);
      $org_profile_path = trim($actors[$i]['profile_path']);
      $profile_path = 'https://image.tmdb.org/t/p/w138_and_h175_bestv2'.$org_profile_path;
      $num_rows     = $this->db->get_where('star', array('star_name'=>$actors_name))->num_rows();
      if($num_rows==0):
        $added_star++;
        $data['star_type']  ='actor';
        $data['star_name']  = $actors_name;
        $data['slug']       = $this->common_model->get_seo_url($actors_name);
        $this->db->insert('star',$data);
        $insert_id = $this->db->insert_id();
        if($org_profile_path !='' && $org_profile_path !=NULL && $org_profile_path !='null'):
          $save_to = 'uploads/star_image/'.$insert_id.'.jpg';           
          $this->common_model->grab_image($profile_path,$save_to);
        endif;
      endif;
    }
    return $added_star;
  }
  function update_directors_writers($stars){
    $added_star =0;
    for ($i=0; $i<sizeof($stars); $i++) {      
      $actors_name = trim($stars[$i]['name']);
      $org_profile_path = trim($stars[$i]['profile_path']);
      $profile_path = 'https://image.tmdb.org/t/p/w138_and_h175_bestv2'.$org_profile_path;
      $num_rows = $this->db->get_where('star', array('star_name'=>$actors_name))->num_rows();
      if($num_rows==0):
        $added_star++;
        if($stars[$i]['department'] =='Directing' && $stars[$i]['job'] =='Director'){
          $data['star_type']  ='director';
        }else if($stars[$i]['department'] =='Writing'){
          $data['star_type']  ='writer';
        }else{
          $data['star_type']  ='actor';
        }
        $data['star_name']  = $actors_name;
        $data['slug']       = $this->common_model->get_seo_url($actors_name);
        $this->db->insert('star',$data);
        $insert_id = $this->db->insert_id();
        if($org_profile_path !='' && $org_profile_path !=NULL && $org_profile_path !='null'):
          $save_to = 'uploads/star_image/'.$insert_id.'.jpg';           
          $this->common_model->grab_image($profile_path,$save_to);
        endif;
      endif;
    }
    return $added_star;
  }




    
	//echo $movie->getJSON();
  function filter_actors($actors){
    $actors_name = '';
    for ($i=0; $i<sizeof($actors); $i++) {
      if($i>0){
         $actors_name .=',';
      }
      $actors_name .= trim($actors[$i]['name']);
    }
    return $actors_name;
  }

  function filter_directors($directors){
    $j=0;
    $directors_name = '';
    for ($i=0; $i<sizeof($directors); $i++) {        
      if($directors[$i]['department'] =='Directing' && $directors[$i]['job'] =='Director'){
        if($j>0){
           $directors_name .=',';
        }
        $j++;
        $directors_name .= trim($directors[$i]['name']);
      }
    }
    return $directors_name;
  }
  function filter_writters($writters){
    $writter_name = '';
    $j=0;
    for ($i=0; $i<sizeof($writters); $i++) {        
      if($writters[$i]['department'] =='Writing'){
        if($j>0){
           $writter_name .=',';
        }
        $j++;
        $writter_name .= trim($writters[$i]['name']);
      }
    }
    return $writter_name;
  }

  function filter_genres($genres){
    $genres_name = '';
    for ($i=0; $i<sizeof($genres); $i++) {
      if($i>0){
         $genres_name .=',';
      }
      $genres_name .= trim($genres[$i]['name']);
    }
    return $genres_name;
  }

  function filter_countries($countries){
    $countries_name = '';
    for ($i=0; $i<sizeof($countries); $i++) {
      if($i>0){
         $countries_name .=',';
      }
      $countries_name .= trim($countries[$i]['name']);
    }
    return $countries_name;
  }

  function filter_tv_countries($countries){
    $countries_name = '';
    for ($i=0; $i<sizeof($countries); $i++) {
      if($i>0){
         $countries_name .=',';
      }
      $countries_name .= trim($countries[$i]);
    }
    return $countries_name;
  }

	
	

	
}

