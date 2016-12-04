<?php
class Activities_model extends CI_Model {  
    public function getActivties($activitytype)
    {
        $data = '';  
        $dbA = $this->load->database('sqlite_db', TRUE);
        $sql="select * from activities where type = ?";
        $data=$dbA->query($sql,$activitytype);
       return $data;  
    }

    public function getWeekPublic()
    {
        $data = '';  
        $dbA = $this->load->database('sqlite_db', TRUE);
        $sql="select * from activities where activtiesId >3 and activtiesId<6";
        $data=$dbA->query($sql);
        return $data;
    }
    public function getDayPublic()
    {
        $data = '';  
        $dbA = $this->load->database('sqlite_db', TRUE);
        $sql="select * from activities where activtiesId >4 and activtiesId<6";
        $data=$dbA->query($sql);
        return $data;
    }

    public function getActivty($activitiesId)
    {

        $data = '';  
        $dbA = $this->load->database('sqlite_db', TRUE);
        $sql="select * from activities where activtiesId = ?";
        $data=$dbA->query($sql,$activitiesId);
        return $data; 
    }

    public function getJoins($activitiesId)
    {
         $data = '';  
        $dbA = $this->load->database('sqlite_db', TRUE);
        $sql="select * from user ,joinActivities where activitiesId = ? and userId=user.id";
        $data=$dbA->query($sql,$activitiesId);
        return $data; 
    }

    public function getActivitySingle($activitiesId)
    {
        $data = '';  
        $dbA = $this->load->database('sqlite_db', TRUE);
        $sql="select * from joinActivities where activitiesId = ?";
        $data=$dbA->query($sql,$activitiesId);
       return $data; 
    }
    public function insertJoin($arr)
    {   
        $dbA = $this->load->database('sqlite_db', TRUE);
        $dbA->insert('joinActivities',$arr);
    }

    public function getMyActivities($userId)
    {
        $data = '';  
        $dbA = $this->load->database('sqlite_db', TRUE);
        $sql="select * from activities,joinActivities where userId = ? and joinActivities.activitiesId=activities.activtiesId";
        $data=$dbA->query($sql,$userId);
        return $data; 
    }
    public function insertActivity($arr)
    {
         $dbA = $this->load->database('sqlite_db', TRUE);
        $dbA->insert('activities',$arr);
    }
    public function deleteActivity($activitiesId)
    {
         $dbA = $this->load->database('sqlite_db', TRUE);
         $sql="delete  from activities where activtiesId = ?";
         $dbA->query($sql,$activitiesId);

    }
}
?>