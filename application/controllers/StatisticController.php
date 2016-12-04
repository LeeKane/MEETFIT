<?php
class StatisticController extends CI_Controller
{
     function __construct()
    {
         
        parent::__construct();
        $this->load->model("Activities_model"); 
        $this->load->model("User_model"); 
        $this->load->library('session'); 
        $this->load->helper ( array (
        'form',
        'url' 
        ) );
     
    }
    public function userStatistic()
    { 
        $query=$this->Activities_model->getMyActivities($_SESSION['id']);
        $data['myActivities']=$query->result_array();
        $this->load->view("statistic.html",$data);
    }
}
?>