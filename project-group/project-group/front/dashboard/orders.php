<?php 
require '../classes/init.php';
$user=new User();
$check_login=$user->check_login(true,['admin']);
$order=new Orders();
$data_order=$order->get_orders();
$data_total=$order->total_price();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="mains.css">
    <style>
        .page-item{
            
        }
        .page-link{
            color:rgb(241, 72, 72);
        }
        .active>.page-link, .page-link.active{
            background-color: rgb(241, 72, 72);
            border-color:rgb(241, 72, 72);
            padding:5px 15px;
        }
        .home-content label{
            color:transparent
        }
        .home-content input[type="search"]{
            border-radius: 20px;
            width: 500px;outline: none;
            border: none;
            border:1px solid rgb(241, 72, 72);
        }
        .home-content input:focus{
            border:1px solid rgb(241, 72, 72);
            box-shadow: 0;
        }
    </style>
</head>
<body>
    <?php require 'sidebar.php' ?>
    <section class="home-section">
        <?php require 'navbar.php'?>
        <div class="home-content bg-white">
            <div class="table-responsive">
            <table id="examplee" class=" text-nowrap table-striped" style="width:100%" >
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Voyege</th>
                        <th>User</th>
                        <th>Qty Ticket</th>
                        <th>total</th>
                        <th>date_reserved</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(is_array($data_order) && count($data_order) > 0): ?>
                    <?php foreach($data_order as $order): ?>
                    <tr class="bg-gray-100 border-b">
                    <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900"><?=$order['id']?></td>
                    <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap"><?=$order['dep'] . '/' . $order['arr']?></td>
                    <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap"><?=$order['user_id']?></td>
                    <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap"><?=$order['qty_ticket']?></td>
                    <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap"><?=$order['total']?></td>
                    <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap"><?=$order['date_reserved']?></td>
                    </tr>
                    <?php endforeach ?>
                <?php endif  ?>
                    
                </tbody>
                
            </table>
            </div>
        </div>
        
    </section>

    
    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
        sidebar.classList.toggle("active");
        if(sidebar.classList.contains("active")){
        sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
        }else
        sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="../path/to/flowbite/dist/flowbite.js"></script>
<script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
<script src="app.js"></script>
</body>

</html>