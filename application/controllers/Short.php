<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Short extends CI_Controller {

    public function __construct()
   {
        parent::__construct();
        $this->load->database();
        $this->load->helper('form');
        $this->load->model('Short_model');
        $this->load->helper('date');
        $this->load->library('ion_auth');
        if ($this-> ion_auth-> in_group ('members')) 
            { 
                $this -> load -> view ( 'short_view' );
            } 
            $this-> ion_auth-> logged_in();
        if (!$this-> ion_auth-> logged_in()) 
            { 
            redirect ('index.php/auth/login', 'refresh'); 
            } 
            elseif ($this-> ion_auth-> is_admin()) 
            { 
                redirect ('index.php/auth/index', 'refresh');
            } 
           
        
   }

	public function index()//method show home view
	{
        
        $this -> load -> view ( 'short_view' );
    }
    public function insert()//method insert data in DB
	{
       $u=$this->input->post(null,true);
       $u['url']=prep_url($u['url']);
       $response =get_headers($u['url']) ;
       if($response!=false){
            $mydata['myVar']=$this->Short_model->insert_entry($u['url'],$u['userUrlCode']);
       }
       else{
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(503,'You enter no valid URL');
       }     
            $this->output->set_output(json_encode($mydata));
        
    }
    //redirect url
    public function redirect_url(){
        $ThisUrlCode=$this->uri->segment(1);//get the first segment
        $dataUrl['myUrl']=$this->Short_model->redirect_url($ThisUrlCode);
      redirect($dataUrl['myUrl']);//direct the user to the long URL the short URL is connected
    }
    public function showDB()//show DB
	{
        $Shortdata['short_table']  =  $this -> Short_model -> get_last_ten_entries();
        $this -> load -> view ( 'all_url_show' ,  $Shortdata );
    }
}