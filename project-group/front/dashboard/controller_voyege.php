
<?php 


require '../classes/init.php';
if(count($_POST) > 0){
global $connection;
	$info  = [];
	$info['data_type'] = $_POST['data_type'];
    if($_POST['data_type'] == 'read'){
		$voyege=new Voyege();
		$v_all=$voyege->get_voyeges();
        
        
		$info['data'] 	=$v_all;

	}
	else
	if($_POST['data_type'] == 'get-edit-row')
	{
		$id =$_POST['id'];
		$user=new Voyege();
		$data=$user->get_voyege($id);
        $info['data'] 	= $data;
	}
	else if($_POST['data_type'] == 'save'){
		$info['data'] 	= "Voyege was added  was saved!";
        $voyege=new Voyege();
        $data=$voyege->add_voyege($_POST);
        
        
	}
	else if($_POST['data_type'] == 'delete'){
		$id =$_POST['id'];
        $user=new User();
		$user->delete_profile($id);

	}
	else if($_POST['data_type'] == 'drope'){
		$id =$_POST['id'];
        $user=new Voyege();
		$user->delete_voyege($id);

	}
	if($_POST['data_type'] == 'edit'){
		$id=$_POST['id'];
		/*
		echo "<pre>";
		print_r($_POST);
		echo "</pre>";
		die;
		*/
		$voyege=new Voyege();
		$voyege->edit_voyege($_POST);
		$info['data'] 	= "Record was fucking edited!";
        
	}
	

	echo json_encode($info);
}


?>