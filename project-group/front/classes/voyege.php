<?php 

class Voyege{
    private $errors=array();
   
    public function add_voyege($data){
        $DB=new Database();
        $arr=false;
        $arr['depart']=$data['depart'];
        $arr['arrivee']=$data['arrivee'];
        $arr['time_start']=$data['time_start'];
        $arr['time_end']=$data['time_end'];
        $arr['train_id']=$data['train_id'];
        $arr['price']=$data['price'];
        $arr['disponible']=1;
        $arr['date_created']=date("Y-m-d H:i:s");
        $arr['date_voyege']=$data['date_voyege'];
        $arr['qty']=$data['qty'];
        
        $query= "INSERT  INTO voyagess (depart,arrivee,time_start,time_end,train_id,price,disponible,date_created,date_voyege,qty) 
            values (:depart,:arrivee,:time_start,:time_end,:train_id,:price,:disponible,:date_created,:date_voyege,:qty)";
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
    public function get_voyeges($limit=""){
        $DB=new Database();
        $query="SELECT voyagess.*, gare.name as departname ,
        ga.name as arrivee_name , all_trains.name as train_name 
        FROM voyagess 
        INNER JOIN gare on voyagess.depart = gare.id 
        INNER JOIN gare as ga on voyagess.arrivee = ga.id 
        INNER JOIN all_trains on voyagess.train_id=all_trains.id
         $limit";
        $arr=[];
        $result=$DB->read($query,$arr);
        if(is_array($result)){
            return $result;
        }
        return false;
    }
    public function get_all_train(){
        $DB=new Database();
        $query="SELECT * FROM all_trains ORDER BY id DESC";
        $arr=[];
        $result=$DB->read($query,$arr);
        if(is_array($result)){
            return $result;
        }
        return false;
    }
    public function get_voyege($id){
        $DB=new Database();
        $arr=false;
        $arr['id']=$id;
        $query="SELECT * FROM voyagess WHERE id=:id LIMIT 1";
        $result=$DB->read($query,$arr);
        
        if(is_array($result)){
            return $result[0];
        }
        return false;
    }
    public function edit_voyege($data){
       $DB=new Database();
       $arr['id']=$data['id'];
       $arr['depart']=$data['depart'];
       $arr['arrivee']=$data['arrivee'];
       $arr['time_start']=$data['time_start'];
       $arr['time_end']=$data['time_end'];
       $arr['train_id']=$data['train_id'];
       $arr['price']=$data['price'];
       $arr['date_voyege']=$data['date_voyege'];
       $arr['qty']=$data['qty'];
       $query="UPDATE voyagess SET depart=:depart , arrivee=:arrivee , time_start=:time_start ,time_end=:time_end , train_id=:train_id ,price=:price ,date_voyege=:date_voyege ,qty=:qty WHERE id=:id ";
       $DB->write($query,$arr);
    }
    public function increa_qty($id,$qty){
        $DB=new Database();
        $arr['id']=$id;
        
        $arr['new_qty']=$qty;
        
        $query="UPDATE voyagess SET qty=:new_qty WHERE id=:id";
        $DB->write($query,$arr);


    }
    public function delete_voyege($id){
        $DB = new Database();
		$id = (int)$id;
		$query = "delete from voyagess where id = '$id' limit 1";
		$DB->write($query);
    }
    public function get_garre(){
        $DB=new Database();
        $query="SELECT * FROM gare ORDER BY id DESC";
        $arr=[];
        $result=$DB->read($query,$arr);
        if(is_array($result)){
            return $result;
        }
        return false;
    }
    public function get_arrivee($id){
        $DB=new Database();
        $arr['depart']=(int)$id;
        $connection=$DB->connect();
        $query="SELECT g.id, g.name, ar.id ,ar.name FROM `voyagess` 
        as v 
        INNER JOIN gare as g on v.depart=g.id 
        INNER JOIN gare as ar on v.arrivee=ar.id WHERE depart=:depart";
        $result=$DB->read($query,$arr);
        
        if(is_array($result)){
            return $result;
        }
        return false; 

    }
}








?>