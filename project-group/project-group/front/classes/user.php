<?php 

class User{
    private $errors=array();
    public function signup($POST){
        //validation 
        $DB = new Database();
        $data=array();
        $data['name']=trim($POST['name']);
        $data['email']=trim($POST['email']);
        $data['password']=trim($POST['password']);
        $password_confirm=trim($POST['password_confirm']);
        if(empty($data['email']) || !preg_match("/^[a-zA-Z]+@[a-zA-Z]+.[a-zA-Z]+$/",$data['email'])){
            $this->errors[]="Please Enter A valid email";
        }
        if(empty($data['name']) || !preg_match("/^[a-zA-Z]+$/",$data['name'])){
            $this->errors[]="Please Enter A Valid Name";
        }
        if($data['password'] !==$password_confirm){
            $this->errors[]="Password not match";
        }
        if(strlen($data['password']) < 4){
            $this->errors[]="Password must be at least 4 character";
        }
        #check email if exists
        $arr=false;
        $sql="SELECT * FROM users WHERE email=:email LIMIT 1";
        $arr['email']=$data['email'];
        $check=$DB->read($sql,$arr);
        if(is_array($check)){
            //die;
            $this->errors[]="That Email is already in use";
        }
        
        if(count($this->errors)==0){
            $data['status']="customer";
            $data['date']=date("Y-m-d H:i:s");
            $data['password']=hash('sha1',$data['password']);
            $data['photo']="images.png";
            $query="INSERT INTO users (name,photo,email,password,status,created_date) VALUES (:name,:photo,:email,:password,:status,:date)";
            $result=$DB->write($query,$data);
            if($result){
                header('Location:login.php');
                die;
            }
        }
        return $this->errors;
    }
    public function login($POST){
        $DB=new Database();
       
        $data=array();
        #echo "one";
        $data['email']=trim($POST['email']);
        $data['password']=trim($POST['password']);
        if(empty($data['email']) || !preg_match("/^[a-zA-Z]+@[a-zA-Z]+.[a-zA-Z]+$/",$data['email'])){
            $this->errors[]="Please Enter a valid Email";
        }
        if(empty($data['password'])){
            $this->errors[]="please Enter a valid password";
        }
        if(count($this->errors)==0){
            $data['password']=hash('sha1',$data['password']);
            $query="SELECT * FROM users WHERE email=:email AND password=:password AND disabled=0 LIMIT 1";
            $result=$DB->read($query,$data);
            if(is_array($result)){
                $result=$result[0];
                
                $_SESSION['id']=$result['id'];
                $_SESSION['name']=$result['name'];
                $_SESSION['photo']=$result['photo'];
                $_SESSION['status']=$result['status'];
                $_SESSION['email']=$result['email'];
                header('Location:../train/index.php');
                die;
            }
            
            $this->errors[]="Wrong Email or Password";
        }
        return $this->errors;
    }
    public function logout(){
        if(isset($_SESSION['name'])){
            session_unset();
            session_destroy();
         }
         header('Location:login.php');
         die;
    }
    public function get_customers($allow="",$limit=""){
        $DB=new Database();
        $arr=false;
        $arr['status']=$allow;
        $query="SELECT * FROM users WHERE status=:status $limit";
        $result=$DB->read($query,$arr); 
        if(is_array($result)){
            return $result;
        }
        return false;
    }
    public function approve_function($id){
        $DB=new Database();
        $arr=false;
        $arr['id']=$id;
        $query="UPDATE users SET status='admin'  WHERE id=:id LIMIT 1";
        $DB->write($query,$arr);
    }
    public function get_admins(){
        $DB=new Database();
        $arr=false;
        $arr['status']="admin";
        $query="SELECT * FROM users WHERE status=:status";
        $result=$DB->read($query,$arr);
        if(is_array($result)){
            return $result;
        }
        return false;
    }
    public function check_login($redirect=false,$allowed=array()){
        $DB=new Database();
        
        if(count($allowed) > 0){
            $arr['email']=$_SESSION['email'];
            $query="SELECT * FROM users WHERE email=:email AND disabled=0 LIMIT 1";
            $result=$DB->read($query,$arr);
            if(is_array($result)){
                $result=$result[0];
                if(in_array($result['status'],$allowed)){
                    return $result;
                }
            }
            header('Location:login.php');
            die;
        }else{
            if(isset($_SESSION['email']) &&  $_SESSION['email'] !=""){
                $arr=false;
                $arr['email']=$_SESSION['email'];
                $query="SELECT * FROM users WHERE email=:email AND disabled=0 LIMIT 1";
                $result=$DB->read($query,$arr);
                if(is_array($result)){
                    return $result[0];
                }
            }
            if($redirect){
                header('Location:login.php');
                die;
            }
        }

        return false;
    }
    public function get_user($email){
        $DB=new Database();
        $arr=false;
        $arr['email']=$email;
        $query="SELECT * FROM users WHERE email=:email AND disabled=0 LIMIT 1";
        $result=$DB->read($query,$arr);
        if(is_array($result)){
            return $result[0];
        }
        return false;
    }
    public function edit_profile($data,$FILES){
        $DB=new Database();
        $image = "";
        if(!empty($FILES['photo']['name'])){
			$allowed = ['image/jpeg','image/png'];
			if(in_array($FILES['photo']['type'], $allowed)){
				$folder = "uploads/";
				if(!file_exists($folder)){
					mkdir($folder,0777,true);
				}
				$path = $folder . time() . $FILES['photo']['name'];
				
				move_uploaded_file($FILES['photo']['tmp_name'], $path);
				$image = $path;
                
			}
		}
        $arr['id']=$data['id'];
        $arr['email']=$data['email'];
        $arr['name']=$data['name'];
        if(empty($image)){
            $query="UPDATE users SET name=:name , email=:email   WHERE id=:id LIMIT 1";
            $DB->write($query,$arr);
		}else{
            $arr['photo']=$image;
            $_SESSION['photo']=$image;
            $query="UPDATE users SET name=:name , email=:email , photo=:photo   WHERE id=:id LIMIT 1";
			$DB->write($query,$arr);
			
		}
    }
    public function delete_profile($id){
        $DB=new Database();
        $id=$id;
        $arr['id']=$id;
        $query="UPDATE users SET disabled=1 WHERE id=:id LIMIT 1";
        
        $DB->write($query,$arr);
    }
    public function get_user_dashb($id){
        $DB=new Database();
        $arr=false;
        $arr['id']=$id;
        $query="SELECT * FROM users WHERE id=:id LIMIT 1";
        $result=$DB->read($query,$arr);
        if(is_array($result)){
            return $result[0];
        }
        return false;
    }
    public function drop_user($id){
        $DB = new Database();
		$id = (int)$id;
		$query = "delete from users where id = '$id' limit 1";
		$DB->write($query);
    }
    public function count_customer(){
        
        $DB=new Database();
        $connection=$DB->connect();
        $query2="SELECT * FROM users";
        $stmt2=$connection->prepare($query2);
        $check2=$stmt2->execute();
        $count=$stmt2->rowCount();
        if($count >0){
            return $count;
        }
        return false;
    }

}








?>