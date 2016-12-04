<?php  
     class User_model extends CI_Model {  
    //获取用户信息  
    public function get()  
    {  
        $data = '';  
        $dbA = $this->load->database('sqlite_db', TRUE);
        $data=$dbA->query("select * from user");
       return $data;  
     }

     public function getUser($username) 
     {
        $data = '';  
        $dbA = $this->load->database('sqlite_db', TRUE);
        $data=$dbA->get_where ( 'user', array (
            'username' => $username
            ), 1, 0 );
       return $data;  
     }

     public function getUserById($userid)
     {
        $data = '';  
        $dbA = $this->load->database('sqlite_db', TRUE);
        $sql="select * from user where id = ?";
        $data=$dbA->query($sql,$userid);
       return $data; 
     } 
     public function settingUser($name)
     {
        $data = '';  
        $dbA = $this->load->database('sqlite_db', TRUE);
        $sql="update user set username=? where username = ?";
        $data=$dbA->query($sql,$name,$_SESSION['username']);
        $_SESSION['username']=$name;
     }
     public function getUserFriends($userid)
     {
        $data = '';  
        $dbA = $this->load->database('sqlite_db', TRUE);
        $sql="select * from user,friends where friends.userId = ? and friends.friendId=user.id";
        $data=$dbA->query($sql,$userid);
        return $data;
     }
     public function addFriend($arr)
     {
        $dbA = $this->load->database('sqlite_db', TRUE);
        $dbA->insert('friends',$arr);
     }

     }  
?>