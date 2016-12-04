<?php
class Blog_model extends CI_Model 
{  
    public function insertComment($arr)
    {
         $dbA = $this->load->database('sqlite_db', TRUE);
            $dbA->insert('comments',$arr);
    }
    public function getComments($blogId)
    {
         $data = '';  
        $dbA = $this->load->database('sqlite_db', TRUE);
        $blogId=intval($blogId);
        $sql="select * from comments where blogId = ?";
        $data=$dbA->query($sql,$blogId);
        return $data; 
    }
    public function updataZans($id,$zans)
    {
        $dbA = $this->load->database('sqlite_db', TRUE);
        $zans=intval($zans);
        $id=intval($id);
        $sql="update comments set zans=zans+1 where id = ?";
        $dbA->query($sql,$id);     
    }
}
?>
