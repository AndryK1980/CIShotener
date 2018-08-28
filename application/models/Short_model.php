<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Short_model extends CI_Model
{
        public function __construct()
	  { 
         parent::__construct(); 
         $this->load->helper('date');
      } 
        public  $url ; 
        public  $url_code ; 
        public  $short_url ;
        public  $ThisUrlCode ; 

    public  function  get_last_ten_entries() 
        { 
                $query=$this->db->get('short_table'); 
                $shortData=$query -> result_array();
                return $shortData;
        } 
        
//insert to BD model
        public  function  insert_entry($url, $userUrlCode) 
        { 
                $siteUrl=base_url();

                $dt = new Datetime();   //create object for current date/time
                $dt->modify('10 day ago');   //substract 10 day
                $sdt = $dt->format('Y-m-d H:i:s');  //format it into a datetime string
                $this->db->select('short_date');
                $this->db->from('short_table');
                $this->db->where('short_date <' , $sdt);
                $this->db->delete('short_table');

                        if ($userUrlCode!="") {
                                $this->db->select('url_code');
                                $this->db->from('short_table');
                                $this->db->where('url_code', $userUrlCode);
                                $dbUrlCode=$this->db->get()->result();
                                if (count($dbUrlCode)==0) {
                                        $shortUrl=$siteUrl.'index.php/'.$userUrlCode;
                                        $now = date('Y-m-d H:i:s');
                                        $query="insert into short_table values('','$url','$userUrlCode','$shortUrl','$now')";
                                        $this->db->query($query);
                                        //return short url
                                        $this->db->select('short_url');
                                        $this->db->from('short_table');
                                        $this->db->where('url_code', $userUrlCode);
                                        $shortUrl=$this->db->get()->row()->short_url;
                                        return $shortUrl; 
                                }
                                else{
                                        return $this->output
                                        ->set_content_type('application/json')
                                        ->set_status_header(503,'Please, enter another code!');
                                        // $err ='Please, enter another code!';
                                        // return $err; 
                                }
                        }
                        else{
                                $urlCode=$this->create_code_url(6);
                                $shortUrl=$siteUrl.'index.php/'.$urlCode;
                                $now = date('Y-m-d H:i:s');
                                $query="insert into short_table values('','$url','$urlCode','$shortUrl','$now')";
                                $this->db->query($query);
                                        $this->db->select('short_url');
                                        $this->db->from('short_table');
                                        $this->db->where('url_code', $urlCode);
                                        $shortUrl=$this->db->get()->row()->short_url;
                                        return $shortUrl; 
                        }
                

                
                //$this -> db -> insert ( 'short_table' ,  $this ); 
        } 
        //generate url code
        public function create_code_url($length)
        {
                $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
                $numChars = strlen($chars);
                $UrlCode = '';
                for ($i = 0; $i < $length; $i++) {
                $UrlCode .= substr($chars, rand(1, $numChars) - 1, 1);
                }
               return $UrlCode;
        }
        //search in BD url for redirect
        public function redirect_url($ThisUrlCode)
        {
                $this->db->select('url');
                $this->db->from('short_table');
                $this->db->where('url_code', $ThisUrlCode);
                $Url=$this->db->get()->row()->url;
              return  $Url;
        }
        
}