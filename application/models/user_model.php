<?php  
     class User_model extends CI_Model {  
    //获取用户信息  
    public function get()  
    {  
        $data = '';  
                    $dbA = $this->load->database('sqlite_db', TRUE);
                
                $data=$dbA->query("select * from test");
                
              
       return $data;  
     }  
     }  
?>