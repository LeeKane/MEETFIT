<?php

class UserController extends CI_Controller
{
    private $pass = "";
    function __construct()
    {
         
        parent::__construct();
        $this->load->model("User_model"); 
        $this->load->model("Activities_model");
        $this->load->library('session');  
        $this->load->helper ( array (
        'form',
        'url' 
        ) );
    }
    function userSetting()
    {
         $query=$this->Activities_model->getMyActivities($_SESSION['id']);
        $data['myActivities']=$query->result_array();
        $this->load->view("userSetting.html",$data);
    }
    function setting()
    {
        $name=$_POST['name'];
        $this->User_model->settingUser($name);
        echo $_SESSION['username']=$name;
    }
    function addFriend()
    {
        $userId=$_POST['userId'];
        $friendId=$_POST['friendId'];
        $arr = array('userId' => $userId,'friendId'=>$friendId);
        $this->User_model->addFriend($arr);
        echo $friendId;
    }
}

?>