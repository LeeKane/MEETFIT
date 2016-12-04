<?php
class BlogController extends CI_Controller
{
    function __construct()
    {
         
        parent::__construct();
        $this->load->model("User_model"); 
        $this->load->model("Blog_model"); 
        $this->load->library('session');  
        $this->load->helper ( array (
        'form',
        'url' 
        ) );
     
    }
    public function blog()
    {
        $query=$this->User_model->getUserFriends($_SESSION['id']);
        $data['myFriends']=$query->result_array();
        $this->load->view("blog.html",$data);
    }

    public function blogSingle($blogId)
    {
        $query=$this->User_model->getUserFriends($_SESSION['id']);
        $data['myFriends']=$query->result_array();
         $query=$this->Blog_model->getComments($blogId);
        $data['comments']=$query->result_array();
        $data['blogId']=$blogId;
        $this->load->view("blog-single.html",$data);
    }
    public function comment()
    {
        $author=$_POST['author'];
        $zans=$_POST['zans'];
        $blogId=$_POST['blogId'];
        $content=$_POST['content'];
        $arr = array('author' => $author,'zans'=>$zans,'blogId'=>$blogId,'content'=>$content,);
        $this->Blog_model->insertComment($arr);
        echo $author;
    }
    public function zans()
    {
        $id=$_POST['id'];
        $zans=$_POST['zans'];
        $query=$this->Blog_model->updataZans($id,$zans);
        echo $id;
    }
}
?>