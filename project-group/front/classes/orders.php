<?php 


class Orders{
    public function add_order($arr){
        $DB=new Database();
        $query="INSERT INTO orders (voyage_id,user_id,qty_ticket,total,date_reserved) VALUES (:voyage_id,:user_id,:qty_ticket,:total,:date_reserved)";
        $arr['voyage_id']=$_SESSION['order_reservie']['id_voyege'];
        $arr['user_id']=$_SESSION['id'];
        $arr['qty_ticket']=$_SESSION['order_reservie']['qty_ticket_order'];
        $arr['total']=$arr['qty_ticket']*$_SESSION['order_reservie']['price_voyege'];
        $arr['date_reserved']=date("Y:m:d H:i:s");
        $DB->write($query,$arr);
        header('Location:../train/index.php');
        die;
    }
    public function get_order($id){
        $DB=new Database();
        $query="SELECT * FROM orders WHERE user_id=:id";
        $arr['id']=$id;
        $result=$DB->read($query,$arr);
        if(is_array($result)){
            return $result;
        }
        return false;
        }
    public function get_orders($limit=""){
        $DB=new Database();
        $query="SELECT ord.* , voyagess.depart ,voyagess.arrivee ,gare.name as dep , ar.name as arr FROM orders as ord INNER JOIN voyagess on ord.voyage_id=voyagess.id INNER JOIN gare on voyagess.depart = gare.id INNER JOIN gare as ar on voyagess.arrivee = ar.id $limit";
        $arr=[];
        $result=$DB->read($query,$arr);
        if(is_array($result)){
            return $result;
        }
        return false;
    }
    public function count_orders(){
        
        $DB=new Database();
        $connection=$DB->connect();
        $query2="SELECT * FROM orders";
        $stmt2=$connection->prepare($query2);
        $check2=$stmt2->execute();
        $count=$stmt2->rowCount();
        if($count >0){
            return $count;
        }
        return false;
    }
    public function total_price(){
        $DB=new Database();
        $connection=$DB->connect();
        $total="SELECT SUM(total) AS prix_total FROM orders";
        $stmt=$connection->prepare($total);
        $nbr=$stmt->execute();
        $total_profite=$stmt->fetch();
        $total_profite=$total_profite[0];
        if($total_profite > 0){
            return $total_profite;
        }
        return false;
    }
}










?>