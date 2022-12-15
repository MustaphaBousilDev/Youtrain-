<?php
require '../classes/init.php';
$user=new User();
$count_customer=$user->count_customer();
$some_user=$user->get_customers("customer","LIMIT 3");


$order=new Orders();
$count_orders=$order->count_orders();
$data_order=$order->get_orders("LIMIT 8");
$data_total=$order->total_price();
$voyege=new Voyege();
$data_voyege=$voyege->get_voyeges("LIMIT 4");

$gare=new Gares();
$train=new Trains();

$check_login=$user->check_login(true,['admin']);
$data=$user->get_customers();
$data=$data;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="mains.css">
</head>
<body>
    <?php require 'sidebar.php' ?>
    <section class="home-section">
        <?php require 'navbar.php' ?>
    
        <div class="home-content">
          <div class="overview-boxes">
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Total Users</div>
                    <div class="number"><?=$count_customer?></div>
                    <div class="indicator">
                      <i class='bx bx-up-arrow-alt'></i>
                      <span class="text">Up from yesterday</span>
                    </div>
                  </div>
                <i class='bx bxs-cart-add cart two' ></i>
            </div>
            <div class="box">
              <div class="right-side">
                <div class="box-topic">Total Sales</div>
                <div class="number"><?=$count_orders?></div>
                <div class="indicator">
                  <i class='bx bx-up-arrow-alt'></i>
                  <span class="text">Up from yesterday</span>
                </div>
              </div>
              <i class='bx bxs-cart-add cart two' ></i>
            </div>
            <div class="box">
              <div class="right-side">
                <div class="box-topic">Total Profit</div>
                <div class="number">$<?=$data_total?></div>
                <div class="indicator">
                  <i class='bx bx-up-arrow-alt'></i>
                  <span class="text">Up from yesterday</span>
                </div>
              </div>
              <i class='bx bx-cart cart three' ></i>
            </div>
            <div class="box">
              <div class="right-side">
                <div class="box-topic">Total Return</div>
                <div class="number">11,086</div>
                <div class="indicator">
                  <i class='bx bx-down-arrow-alt down'></i>
                  <span class="text">Down From Today</span>
                </div>
              </div>
              <i class='bx bxs-cart-download cart four' ></i>
            </div>
          </div>
          <div class="grid  sm:grid-cols-1 md:grid-cols-2  gap-4 p-4">
            <!--<canvas id="myChart"></canvas>-->
            <div class="one bg-white rounded-xl p-3">
                <div class="flex justify-between">
                    <h3 class="text-primary font-bold text-2xl">Recent Orders</h3>
                    <a
                      class="text-white bg-primary hover:bg-red-600 focus:ring-4 focus:ring-blue-300  rounded-md text-sm px-5 py-2 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                      href="orders.php"
                      >View All
                    </a>
                </div>
                <div class="orders">
                  <div class="order-column flex bg-slate-500 mb-3 text-base font-bold">
                    <h4 style="flex:1">Name</h4>
                    <h4 style="flex:1">Price</h4>
                    <h4 style="flex:1">Place</h4>
                    <h4 style="flex:1" class="text-right">Status</h4>
                  </div>
                  <?php if(is_array($data_order) && count($data_order) > 0):  ?>
                    <?php foreach($data_order as $order): ?>
                      <div class="order-column flex bg-slate-500 text-sm mb-3 border-b border-sky-500 pb-3">
                        <h4 style="flex:1"><?=$order['user_id']?></h4>
                        <h4 style="flex:1"><?=$order['total']?></h4>
                        <h4 style="flex:1"><?=$order['voyage_id']?></h4>
                        <h4 style="flex:1" class="text-right text-white">
                      <span class="bg-my-green px-3 rounded-md">Dilevered</span>
                    </h4>
                  </div>
                    <?php endforeach ?>
                  <?php endif  ?>
                  
                  
                </div>
            </div>
            <div class="two ">
                <canvas id="myChartP" ></canvas>
            </div>
          </div>
          <div class="grid  sm:grid-cols-1 md:grid-cols-2  gap-4 p-4">
                <!--<canvas id="myChart"></canvas>-->
                <div class="one ">
                    <canvas id="myChart"></canvas>
                </div>
                <div class="two bg-white rounded-xl p-3">
                  <div class="flex justify-between mb-6">
                    <h3 class="text-primary font-bold text-2xl">Recent Customers</h3>
                    <a
                      class="text-white bg-primary hover:bg-red-600 focus:ring-4 focus:ring-blue-300  rounded-md text-sm px-5 py-2 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                      href="customers.php"
                      >View All
                    </a>
                  </div>
                <div class="curstomers">
                  <?php if(is_array($some_user) && count($some_user)): ?>
                  <?php foreach($some_user as $user): ?>
                  <div class="customer px-5 flex mb-4">
                    <img 
                      class="rounded-full"
                      src="<?=$user['photo']?>"
                      width="50px" height="50px"/>
                    <div class="info ml-4">
                      <h5 class="font-bold"><?=$user['name']?></h5>
                      <span class="text-sm text-gray-400"><?=$user['email']?></span>
                    </div>
                  </div>
                  <?php endforeach ?>
                  <?php endif  ?>
                  
                </div>
                </div>
          </div>
          <div class="grid  sm:grid-cols-1 md:grid-cols-2  gap-4 p-4">
            <!--<canvas id="myChart"></canvas>-->
            <div class="two bg-white rounded-xl p-3">
              <div class="curstomers p-8">
                <div class="customer px-5 mb-4">
                  <div class="my-header flex w-[100%] mb-8">
                    <p class="w-[50%] flex-1">Recent Payment History</p>
                    <h5 class="w-[50%] flex-1 text-right font-bold text-lg">Weekly</h5>
                  </div>
                  <?php if(is_array($data_voyege) && count($data_voyege) > 0):  ?>
                    <?php foreach($data_voyege as $data): ?>
                      <div class="my-header flex justify-between w-[100%] py-5 text-2xl">
                        <p class=""><?=$data['depart'] .'/'. $data['arrivee']?> +</p>
                        <p class=""><?=$data['price']?>$</p>
                      </div>
                    <?php endforeach ?>
                  <?php endif  ?>
                  

                </div>
              </div>
            </div>
            <div class="one">
              <canvas id="myChartPP" width="100px" height="100px"></canvas>
            </div>
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
  
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
  <script>
     const ctx = document.getElementById('myChart');
     const ctxs = document.getElementById('myChartP');
     const ctxss = document.getElementById('myChartPP');
     
     Chart.defaults.backgroundColor = '#000';
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
            label: '# of Votes',
            data: [3, 10, 9, 10,12,13],
            backgroundColor:[
                'rgba(255,99,132,0.2)',
                'rgba(54,162,235,0.2)',
                'rgba(255,206,86,0.2)',
                'rgba(75,192,192,0.2)',
                'rgba(153,102,255,0.2)',
                'rgba(255,159,64,0.2)',
            ],
            borderColor:[
                'rgba(255,99,132,1)',
                'rgba(54,162,235,1)',
                'rgba(255,206,86,1)',
                'rgba(75,192,192,1)',
                'rgba(153,102,255,1)',
                'rgba(255,159,64,1)',
            ],
            borderWidth: 1,
            }]
        },
        options: {
            responsive:true,
        }
    });

    new Chart(ctxs, 
{
        type: 'polarArea',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor:[
                'rgba(255,99,132,0.2)',
                'rgba(54,162,235,0.2)',
                'rgba(255,206,86,0.2)',
                'rgba(75,192,192,0.2)',
                'rgba(153,102,255,0.2)',
                'rgba(255,159,64,0.2)',
            ],
            borderColor:[
                'rgba(255,99,132,1)',
                'rgba(54,162,235,1)',
                'rgba(255,206,86,1)',
                'rgba(75,192,192,1)',
                'rgba(153,102,255,1)',
                'rgba(255,159,64,1)',
            ],
            borderWidth: 1,
            }]
        },
        options: {
            responsive:true,
        }
});
    

new Chart(ctxss, {
      type: 'doughnut',
      data: {
        labels: [
          'Red',
          'Blue',
          'Yellow'
        ],
        datasets: [
            {
              label: 'My First Dataset',
              data: [200, 50, 100,50,50],
              backgroundColor: [
                'rgba(255,99,132,0.2)',
                'rgba(54,162,235,0.2)',
                'rgba(255,206,86,1)',
                'rgba(75,192,192,0.2)',
                'rgba(153,102,255,0.2)'
              ],
              hoverOffset: 4
            }
        ]
      }
    });
 

    
  </script>
  <script src="../path/to/flowbite/dist/flowbite.js"></script>
  <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
</body>

</html>