<?php 


require '../classes/init.php';
if(!isset($_SESSION['order_reservie'])){
    header('Location:index.php');
    die;
}
$user=new User();
$check_login=$user->check_login(true);



//  echo "<pre>";
//  print_r($_SESSION['order_reservie']);
// echo "</pre>";
// die;
// echo $_SESSION['id'];
// echo "rrr";
$id= $_SESSION['order_reservie']['id_voyege'];
$new_qty=$_SESSION['order_reservie']['qty_voyege'] - $_SESSION['order_reservie']['qty_ticket_order'];
#echo $new_qty;
#die;

$voyege=new Voyege();
$data=$voyege->increa_qty($id,$new_qty);
$order=new Orders();
$order->add_order($arr);

// echo "<pre>";
// print_r($data);
// echo"</pre>";
// die;





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Thanks for Recervie </h2>
</body>
</html>