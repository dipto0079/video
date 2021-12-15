<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notify_model extends CI_Model {
	
	function __construct()
    {
        parent::__construct();
    }

	function send_push_notification($video_id = NULL)
	{	
		$site_name			=	$this->db->get_where('config' , array('title' => 'site_name'))->row()->value;
		$video 				= 	$this->db->get_where('videos', array('videos_id' => $video_id))->row();
		$logo				= 	base_url('uploads/system_logo/logo.png');
		$thumb_image		= 	$this->common_model->get_video_thumb_url($video->videos_id);;
		$watch_url			=	base_url().'watch/'.$video->slug.'.html';		
		$headings			=	"New Movie Release-".$video->title;
		$message			=	"Watch ".$video->title." on ".$site_name;
        $data['message']    = 	$message;
        $data['url']        = 	$watch_url;
        $data['headings']   = 	$headings;
        $data['icon']       = 	$logo;        
        $data['img']        = 	$thumb_image;
        $this->send_notification($data);
        
		return TRUE;
	}

	function send_notification($data = array()){
		$onesignal_appid    = $this->db->get_where('config' , array('title' =>'onesignal_appid'))->row()->value;
        $onesignal_api_keys = $this->db->get_where('config' , array('title' =>'onesignal_api_keys'))->row()->value;
        define('APKEY',$onesignal_api_keys);
        $user_id            = '4444'; 
        $content = array(
            "en" => $data['message']
        );
        $headings = array(
            "en" => $data['headings']
        );
        $fields = array(
            'app_id' => $onesignal_appid,
            'filters' => array(array("field" => "tag", "key" => "user_id", "relation" => "=", "value" => "$user_id")),
            'url' => $data['url'],
            'contents' => $content,
            'chrome_web_icon' => $data['icon'],
            'chrome_web_image' => $data['img'],
            'headings' => $headings
        );

        $fields = json_encode($fields);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
            'Authorization: Basic '.APKEY));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
	}
}

