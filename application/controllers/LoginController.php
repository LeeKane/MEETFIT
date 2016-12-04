<?php
/**
*  
*/
class LoginController extends CI_Controller
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

    public function login()
    {
        $info="";
        $data = array (
        'info' => $info);
        $this->load->view('login.html',$data);
    }
    public function check()
    {
        $name = $_POST["name"];
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
        $nameErr = "只允许字母和空格！"; 
        }
    }

    public function formsubmit() 
    {
        $this->load->library ( 'form_validation' );

        $this->form_validation->set_rules ( 'username', 'Username', 'required' );
        $this->form_validation->set_rules ( 'password', 'Password', 'required' );
        if ($this->form_validation->run () == FALSE) {
            $this->load->view ( 'login.html' );
        } 
        else 
    {
        if (isset ( $_POST ['submit'] ) && ! empty ( $_POST ['submit'] )) 
    {
            $info="";
            $data = array (
            'user' => $_POST ['username'],
            'pass' => $_POST ['password'],
            'info' => $info);
         
             $pass=0;
             $id=1;
        if ($_POST ['submit'] == 'login') {
            $query = $this->User_model->getUser($data ['user'] );
            foreach ( $query->result () as $row ) {
            $pass = $row->password;
            $id=$row->id;
            }
               $newdata = array(
            'username'  =>  $data ['user'] ,
            'id'        =>  $id,
            'userip'     => $_SERVER['REMOTE_ADDR'],
            'luptime'   =>time());
        if ($pass == $data ['pass']) {
        $this->session->set_userdata($newdata);
        $query=$this->Activities_model->getMyActivities($_SESSION['id']);
        $data['myActivities']=$query->result_array();
        $this->load->view ( 'statistic.html', $data );
        }
        else
        {
            $data['info']="用户名或密码错误！";
            $this->load->view('login.html',$data);
        }
        } 
            //else if ($_POST ['submit'] == 'register') 
        // {

        // $this->session->set_userdata($newdata);
        // $this->db->insert ( 'uc_user', $data );
        // $this->load->view ( 'usercenter', $data );
        // }    
        // else 
        // {
        // $this->session->sess_destroy();
        // $this->load->view ( 'login' );
        // }
   }
  }
 }
}
?>