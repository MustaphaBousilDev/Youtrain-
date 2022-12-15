<?php 
require '../classes/init.php';
if(!isset($_SESSION['orders'])){
    header('Location:index.php');
    die;
}


if($_SERVER['REQUEST_METHOD']=="POST"){
    
    $_SESSION['order_reservie']=$_POST;
    header('Location:finnaly.php');
    die;

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="css/main.css">
    
    
    <link rel="stylesheet" href="mains.css">
    <link rel="stylesheet" href="ticket.css">
</head>
<body>
    <div class="ticket shadow-sm">
       <div class="header">
          <h1 style="font-size: 30px;">Search results</h1>
          <p class="text-gray-400 text-sm">We Found 15 results</p>
          <div class="flex my-3 items-center">
            <h1 class="mx-2" style="font-size: 30px;"><?=$_SESSION['orders'][0]['departname']?></h1>
            <i class='bx bx-right-arrow-alt ' style="font-size: 30px;"></i>
            <h1 class="mx-2" style="font-size: 30px;"><?=$_SESSION['orders'][0]['arrivee_name']?></h1>
            
          </div>
       </div>
       <div class="body">
       <?php $i=1; foreach($_SESSION['orders'] as $order): ?>
       <form method="POST"> 
        <div class="cards shadow-md mb-2">
            <div style="padding:0 10px "><input style="width:50px" type="number" name="qty_ticket_order" /></div>
            <div>
                <span style="font-size: 12px;color:rgb(194, 188, 188)">Depart</span>
                <p style="font-size: 14;"><?=$order['date_voyege'] ." " ?></p>
                <strong><p class="font-weight:bolder"><?=$order['time_start']?></p></strong>
            </div>
            <div>
                <button type="submit"  class="bg-black text-white rounded-full"
                >0 Stops
                </button>
            </div>
            <div>
                <span style="font-size: 12px;color:rgb(194, 188, 188)">Arrivé</span>
                <p style="font-size: 14;"><?=$order['date_voyege']?></p>
                <strong><p><?=$order['time_end']?></p></strong>
            </div>
            <div>
                <span style="font-size: 12px;color:rgb(194, 188, 188);" class="mt-1">price</span>
                <h1>$ <?=$order['price']?></h1>
            </div>
            <div>
                <span style="font-size: 12px;color:rgb(194, 188, 188);" class="mt-1">Quantity free:<?=$order['qty']?></span>
                <h1>$ <?=$order['price']?></h1>
            </div>
        </div>
        <input name="id_voyege" type="hidden" value="<?=$order['id']?>"/>
        <input name="qty_voyege" type="hidden" value="<?=$order['qty']?>"/>
        <input name="price_voyege" type="hidden" value="<?=$order['price']?>"/>
        
       </form>
       <?php endforeach ?>
       </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="../path/to/flowbite/dist/flowbite.js"></script>
    <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
    <script src="app.js"></script>
</body>
</html>