
<?php 


require '../classes/init.php';
if(count($_POST) > 0){
global $connection;
	$info  = [];
	$info['data_type'] = $_POST['data_type'];
    if($_POST['data_type'] == 'read'){
		$gares=new Trains();
		$g_all=$gares->get_trains();
		$info['data'] 	=$g_all;

	}
	else
	if($_POST['data_type'] == 'get-edit-row')
	{
		$id =$_POST['id'];
		
		$gare=new Trains();
		$data=$gare->get_train($id);
		
        $info['data'] 	= $data;
	}
	else if($_POST['data_type'] == 'save'){
		$info['data'] 	= "Voyege was added  was saved!";
        $gares=new Trains();
        $data=$gares->add_train($_POST);

        
	}
	else if($_POST['data_type'] == 'delete'){
		$id =$_POST['id'];
        $user=new Trains();
		$user->delete_train($id);

	}
	
	if($_POST['data_type'] == 'edit'){
		$id=$_POST['id'];
		/*
		
		die;
		*/
		$voyege=new Trains();
		$voyege->edit_train($_POST);
		$info['data'] 	= "Record was fucking edited!";
        
	}
	

	echo json_encode($info);
}


?>