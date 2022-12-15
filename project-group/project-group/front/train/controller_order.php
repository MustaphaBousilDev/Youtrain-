
<?php 


require '../classes/init.php';
if(count($_POST) > 0){
global $connection;
	$info  = [];
	$info['data_type'] = $_POST['data_type'];
    if($_POST['data_type'] == 'read'){
		$gares=new Gares();
		$g_all=$gares->get_gares();
		$info['data'] 	=$g_all;

	}
	else
	if($_POST['data_type'] == 'get-edit-row')
	{
		$id =$_POST['id'];
		$gare=new Gares();
		$data=$gare->get_gare($id);
		
        $info['data'] 	= $data;
	}
    else if($_POST['data_type'] == 'get_states'){
        $id_depart=$_POST['id'];
        $voyege=new Voyege();
        $data=$voyege->get_arrivee($id_depart);
        $info['data'] 	= $data;
    }
	else if($_POST['data_type'] == 'save'){
		$info['data'] 	= "Voyege was added  was saved!";
        $gares=new Gares();
        $data=$gares->add_gare($_POST);
        
	}
	else if($_POST['data_type'] == 'delete'){
		$id =$_POST['id'];
        $user=new Gares();
		$user->delete_gare($id);

	}
	
	if($_POST['data_type'] == 'edit'){
		$id=$_POST['id'];
		
		$voyege=new Gares();
		$voyege->edit_gare($_POST);
		$info['data'] 	= "Record was fucking edited!";
        
	}
	

	echo json_encode($info);
}


?>