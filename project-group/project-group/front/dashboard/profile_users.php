<?php 

require '../classes/init.php';
$user=new User();
$order=new Orders();
$data_order=$order->get_order($_SESSION['id']);

$check_login=$user->check_login(true);
$data=$user->get_user($_SESSION['email']);
$link=isset($_GET['do']) ? $_GET['do'] : '';

if($link=="logout"){
  $logout=$user->logout();
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
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
        <?php require 'navbar.php' ?>
        <div class="home-content p-8 bg-white" style="min-height:100vh;">
            <?php if(isset($data) && is_array($data)): ?>
            <div class="grid  sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-3">
                <div class="one">
                    <header class=" pb-4 border-b-2 border-gray-100">
                        <h3 class="font-bold text-xl">Account</h3>
                        <div class="avatar w-[200px]   flex justify-between mt-4">
                            <div class="w-[80%] mx-auto text-center">
                                <span class="text-sm">Mugiwara</span>
                                <img 
                                src="<?=$data['photo']?>" 
                                class="w-12 h-12 rounded-full mx-auto js-edit-image"/>
                            </div>
                            <div class="flex items-end">
                                <button class="h-11 upload  hover:bg-blue-500 text-blue-700 font-semibold hover:text-white  py-1 px-4 mx-2 border border-blue-500 hover:border-transparent rounded">
                                    Upload 
                                </button>
                                <button type="submit" onclick="delete_row('<?=$data['id']?>')" class="h-11 upload  hover:bg-red-500 bg-red-700 font-semibold hover:text-white  py-1 px-4 mx-2 border border-red-500 hover:border-transparent rounded">
                                    Delete 
                                </button>
                            </div>
                        </div>
                    </header>
                    <section>
                        <form method="POST" onsubmit="edit_row(event)" class="w-full max-w-lg">
                            <div class="flex flex-wrap -mx-3 mb-6">
                            <input type="hidden" id="id" value=<?=$data["id"]?> />
                            <input onchange="display_edit_image(this.files[0])"  type="file" id="photo"  name="image" hidden /><br>
            
                              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                  Name
                                </label>
                                <input value="<?=$data["name"]?>"  name="name" id="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Jane">
                                <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                              </div>
                              <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                  email 
                                </label>
                                <input  value="<?=$data["email"]?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" type="text" placeholder="exemle@email.com">
                              </div>
                            </div>
                            <button class="h-11   hover:bg-blue-500 text-blue-700 font-semibold hover:text-white  py-1 px-4 mx-2 border border-blue-500 hover:border-transparent rounded" type="submit">Edit</button>
                          </form>
                    </section>
                    <script>
                      document.querySelector('.upload').addEventListener('click',()=>{
                        document.querySelector('#photo').click()
                      })
                    </script>
                </div>
                <div class="two mt-5">
                    <canvas id="myChartPPP"></canvas>
                </div>
            </div>
            <?php endif  ?>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                      <h3 class="mt-4 text-xl font-bold">Order Details</h3>
                      <table class="min-w-full">
                        <thead class="bg-white border-b">
                          <tr>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-3 text-left">
                              #
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-3 text-left">
                              Voyege
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-3 text-left">
                              user 
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-3 text-left">
                              ticket QTY
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-3 text-left">
                              total
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-3 text-left">
                              date_reserved
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          
                            <?php if(is_array($data_order) && count($data_order) > 0): ?>
                              <?php foreach($data_order as $order): ?>
                                <tr class="bg-gray-100 border-b">
                                <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900"><?=$order['id']?></td>
                                <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap"><?=$order['voyage_id']?></td>
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

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script src="../path/to/flowbite/dist/flowbite.js"></script>
<script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    Chart.defaults.backgroundColor = '#000';
    const ctxsss = document.getElementById('myChartPPP');
    new Chart(ctxsss, {
        type: 'radar',
        data: {
            labels: [
                'Eating',
                'Drinking',
                'Sleeping',
                'Designing',
                'Coding',
                'Cycling',
                'Running'
            ],
            datasets: [{
                label: 'My First Dataset',
                data: [65, 59, 90, 81, 56, 55, 40],
                fill: true,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgb(255, 99, 132)',
                pointBackgroundColor: 'rgb(255, 99, 132)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(255, 99, 132)'
            },{
                label: 'My Second Dataset',
                data: [28, 48, 40, 19, 96, 27, 100],
                fill: true,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgb(54, 162, 235)',
                pointBackgroundColor: 'rgb(54, 162, 235)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(54, 162, 235)'
            }]
        },
        options: {
            elements: {
                line: {
                    borderWidth: 3
                }
            }
        }
    });
    /////////////////////////////////////////////////////////////////
    function send_data(obj,type){
		var form = new FormData();
		for(key in obj){
			form.append(key,obj[key]);
		}
		form.append('data_type',type);
		var ajax = new XMLHttpRequest();
		ajax.addEventListener('readystatechange',function(){
			if(ajax.readyState == 4){
				if(ajax.status == 200){
					handle_result(ajax.responseText);
				}else{
					alert("an error occured");
				}
			}
		});
		ajax.open('POST','controller_portf.php',true);
		ajax.send(form);
	}
    function handle_result(result){
		var obj = JSON.parse(result);
		console.log('fuck');
		console.log(obj);
		if(typeof obj == 'object'){
			if(obj.data_type == 'read'){
				let form = document.querySelector("form");
				//let name=form.querySelector('name').value
				let str = "";
				if(typeof obj.data == 'object'){
					
				}
			}else
			if(obj.data_type == 'save')
			{
				alert(obj.data);
				send_data({},'read');
			}else
			if(obj.data_type == 'edit')
			{
				alert('fucking succes modifie data')
				//alert(obj.data);
				//send_data({},'read');
			}else
			if(obj.data_type == 'delete')
			{
				//alert(obj.data);
				//send_data({},'read');
			}
		}
	}
    image_added=false 
    function display_edit_image(file){
            let allowed = ['jpg','jpeg','png'];
		    let ext = file.name.split(".").pop();
		    if(allowed.includes(ext.toLowerCase())){
                image_added=true
		        document.querySelector('.js-edit-image').src = URL.createObjectURL(file);
		    }else {
		        alert("Only the following image types are allowed:"+ allowed.toString(", "));
		    }
    }

    function edit_row(e){
		e.preventDefault();
		let obj = {};
		let inputs = e.currentTarget.querySelectorAll("input");
		//console.log(inputs[0].value)

		for (var i = 0; i < inputs.length; i++) {
			if(inputs[i].type == 'file' && image_added){
				obj[inputs[i].id] = inputs[i].files[0];

				console.log(inputs[i])
			}else{
				obj[inputs[i].id] = inputs[i].value;
				console.log(inputs[i])
			}
			obj['id'] = inputs[0].value;
			obj[inputs[1].id] = inputs[1].files[0];
			//console.log(obj)
		}

		
		image_added= false;
		//document.querySelector(".js-edit-image").src = "../public/images.png";
    //console.log(obj)
    //return 
		send_data(obj,'edit');
		
	}


    function delete_row(id){
		if(!confirm("Are you sure you want to delete row number "+id+"?!")){
			return;
		}
		send_data({id:id},'delete');
	}
</script>
<script src="app.js"></script>
</body>

</html>