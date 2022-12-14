<?php 

class Trains{
    private $errors=array();
    public function add_train($data){
        $DB=new Database();
        $arr=false;
        $arr['name']=$data['name'];
       
        $arr['gare_id']=$data['gare_id'];
        $arr['date_created']=date("Y-m-d H:i:s");
        $query= "INSERT INTO all_trains (name,gare_id,date_created) 
            values (:name,:gare_id,:date_created)";
        $result=$DB->write($query,$arr);
    }
    public function get_gares(){
        $DB=new Database();
        $query="SELECT * FROM gare ORDER BY id DESC";
        $arr=[];
        $result=$DB->read($query,$arr);
        if(is_array($result)){
            return $result;
        }
        return $false;
    }
    public function get_trains(){
        $DB=new Database();
        $query="SELECT * FROM all_trains ORDER BY id DESC";
        $arr=[];
        $result=$DB->read($query,$arr);
        
        if(is_array($result)){
            return $result;
        }
        return false;
    }
    
    public function get_train($id){
        $DB=new Database();
        $arr=false;
        $arr['id']=$id;
        $query="SELECT * FROM all_trains WHERE id=:id LIMIT 1";
        $result=$DB->read($query,$arr);
        if(is_array($result)){
            return $result[0];
        }
        return false;
    }
    public function edit_train($data){
       $DB=new Database();
       $arr['id']=$data['id'];
       $arr['name']=$data['name'];
       $arr['gare_id']=$data['gare_id'];
       $query="UPDATE all_trains SET name=:name , gare_id=:gare_id WHERE id=:id ";
       $DB->write($query,$arr);
    }
    public function delete_train($id){
        $DB = new Database();
		$query = "delete from all_trains where id = '$id' limit 1";
		$DB->write($query);
    }
    
}








?>