<?php
/**
*  
*/
class FirstController extends CI_Controller
{
    
    function __construct()
    {
         
        parent::__construct();
        $this->load->model("User_model");   
    }

    public function index(){

        $data['title']="first view";
        $data['content']=array(
            'info'=>array('code' =>"123" ,
            'id'=>"1",),
        'name' => "first view",
        'creatTime' => "2016/10/25",
        'forWhat'=>"MEETFIT",);
        $query=$this->User_model->get();
        $data['userlist']=$query->result_array();
        $this->load->view('index.html',$data);
    }
}
?>