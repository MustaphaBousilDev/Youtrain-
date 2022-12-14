<?php 

class Gares{
    private $errors=array();
    public function add_gare($data){
        $DB=new Database();
        $arr=false;
        $arr['name']=$data['name'];
        $arr['ville_id']=$data['ville_id'];
        $arr['date_created']=date("Y-m-d H:i:s");
        $query= "INSERT  INTO gare (name,ville_id,date_created) 
            values (:name,:ville_id,:date_created)";
        $result=$DB->write($query,$arr);
    }
    public function get_ville(){
        $DB=new Database();
        $query="SELECT * FROM ville ORDER BY id DESC";
        $arr=[];
        $result=$DB->read($query,$arr);
        if(is_array($result)){
            return $result;
        }
        return $false;
    }
    public function get_gares(){
        $DB=new Database();
        $query="SELECT * FROM gare ORDER BY id DESC";
        $arr=[];
        $result=$DB->read($query,$arr);
        if(is_array($result)){
            return $result;
        }
        return false;
    }
    
    public function get_gare($id){
        $DB=new Database();
        $arr=false;
        $arr['id']=$id;
        $query="SELECT * FROM gare WHERE id=:id LIMIT 1";
        $result=$DB->read($query,$arr);
        if(is_array($result)){
            return $result[0];
        }
        return false;
    }
    public function edit_gare($data){
       $DB=new Database();
       $arr['id']=$data['id'];
       
       #echo $arr['id'];
       #die;
       $arr['name']=$data['name'];
       $arr['ville_id']=$data['ville_id'];
       $query="UPDATE gare SET name=:name , ville_id=:ville_id WHERE id=:id ";
       $DB->write($query,$arr);
    }
    public function delete_gare($id){
        $DB = new Database();
		$query = "delete from gare where id = '$id' limit 1";
		$DB->write($query);
    }
    
}








?>