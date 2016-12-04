<?php
class ActivityController extends CI_Controller
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
    public function activity($activitytype=1)
    {  
        $query=$this->Activities_model->getActivties($activitytype);
        $data['activitieslist']=$query->result_array();
        $query=$this->Activities_model->getWeekPublic();
        $data['weekPublic']=$query->result_array();
         $query=$this->Activities_model->getDayPublic();
        $data['dayPublic']=$query->result_array();
        $query=$this->Activities_model->getMyActivities($_SESSION['id']);
        $data['myActivities']=$query->result_array();
        $this->load->view("activity.html",$data);
    }

    public function activitySingle($activitiesId)
    {
        $query=$this->Activities_model->getWeekPublic();
        $data['weekPublic']=$query->result_array();
        $query=$this->Activities_model->getDayPublic();
        $data['dayPublic']=$query->result_array();
        $query=$this->Activities_model->getActivitySingle($activitiesId);
        $data['activitySingle']=$query->result_array();
        $query=$this->Activities_model->getActivty($activitiesId);
        $data['activity']=$query->result_array();
        $query=$this->Activities_model->getJoins($activitiesId);
        $data['joins']=$query->result_array();
        $query=$this->Activities_model->getMyActivities($_SESSION['id']);
        $data['myActivities']=$query->result_array();
        $this->load->view("activity-single.html",$data);
    }

    public function activitySinglePoints($activitiesId)
    {
        $query=$this->Activities_model->getJoins($activitiesId);
        $data['joins']=$query->result_array();
        $joinsdata=array();
        foreach ($data['joins'] as $item) {
           array_push($joinsdata, array("tn"=>$item['username'],"points"=>$item['points'])); 
        }
        echo json_encode($joinsdata);
    }

    public function joinActivity($userId,$activitiesId)
    {
        $arr = array('userId' => $userId,'activitiesId'=>$activitiesId,'points'=>0);
        $this->Activities_model->insertJoin($arr);
        $this->activitySingle($activitiesId);
    }

    public function createActivity()
    {
        $query=$this->Activities_model->getWeekPublic();
        $data['weekPublic']=$query->result_array();
         $query=$this->Activities_model->getDayPublic();
        $data['dayPublic']=$query->result_array();
        $query=$this->Activities_model->getMyActivities($_SESSION['id']);
        $data['myActivities']=$query->result_array();
        $this->load->view("createActivity.html",$data);
    }

    public function createNewActivity()
    {
        $type=$_POST['type'];
        $endtime=$_POST['endtime'];
        $startime=$_POST['startime'];
        $reward=$_POST['reward'];
        $name=$_POST['name'];
        $arr = array('type' => $type,'startime'=>$startime,'endtime'=>$endtime,'reward'=>$reward,'name'=>$name);
        $this->Activities_model->insertActivity($arr);
        echo $endtime;

    }

    public function deleteActivity($activitiesId)
    {
        $this->Activities_model->deleteActivity($activitiesId);
        $this->activity();
    }
}
?>