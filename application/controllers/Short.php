<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Short extends CI_Controller {

    public function __construct()
   {
        parent::__construct();
        $this->load->database();
        $this->load->helper('form');
        $this->load->model('Short_model');
       // $this->load->helper('url');
        $this->load->helper('date');
        //$this->load->library('form_validation');
   }

	public function index()//method 1
	{

        $Shortdata['short_table']  =  $this -> Short_model -> get_last_ten_entries(); 
        
        $this -> load -> view ( 'short_view' ,  $Shortdata );
    }
    public function insert()//method 2
	{
        $u=$this->input->post(null,true);
        //$ucode=$this->input->post('userUrlCode');
        
       $u['url']=prep_url($u['url']);
       $response =get_headers($u['url']) ;
       if($response!=false){
            $mydata['myVar']=$this->Short_model->insert_entry($u['url'],$u['userUrlCode']);
       }
       else{
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(500,'You enter no valid URL');
            
       }     

            $this->output->set_output(json_encode($mydata));
        

        
    }
    public function redirect_url(){
        $ThisUrlCode=$this->uri->segment(1);//get the segment the user requested e.g. Nw from http://short.local/Nw
        $dataUrl['myUrl']=$this->Short_model->redirect_url($ThisUrlCode);
      redirect($dataUrl['myUrl']);//direct the user to the long URL the short URL is connected to 🙂 MAGIC
      //$this -> load -> view('test_short_view',$dataUrl);
    }
    public function showDB()//show DB
	{

        $Shortdata['short_table']  =  $this -> Short_model -> get_last_ten_entries(); 
        
        $this -> load -> view ( 'all_url_show' ,  $Shortdata );
    }
}