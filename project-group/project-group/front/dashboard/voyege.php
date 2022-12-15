
<?php 
require '../classes/init.php';
$user=new User();
$voyege=new  Voyege();
$check_login=$user->check_login(true,['admin']);
$gares=$voyege->get_garre();
$all_train=$voyege->get_all_train();

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
<body class="" style="background-color:#fff;">

    <?php require 'sidebar.php' ?>
    <section class="home-section">
        <?php require 'navbar.php' ?>
        <div class="home-content p-8 bg-white">
                <!-- Modal toggle -->

<button style="color:#000" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat">Add</button>
<div class="modal fade myModal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="space-y-6" onsubmit="add_row(event)">
                    <div>
                        <select style="width:100%" id="depart" name="depart" class="js-example-basic-multiple-limit-depart">
                            <?php foreach($gares as $gare):  ?>
                                <option value="<?=$gare['id']?>"><?=$gare['name']?></option>
                            <?php endforeach ?>
                        </select>
                        
                    </div>
                    <div>
                         <select style="width:100%" id="arrivee" name="arrivee" class="js-example-basic-multiple-limit-arrivee">
                            <?php foreach($gares as $gare):  ?>
                                <option value="<?=$gare['id']?>"><?=$gare['name']?></option>
                            <?php endforeach ?>
                        </select>
                       
                    </div>
                    <div>
                        <input  style="padding:5px" name="date_voyege" id="date_voyege" type="date"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"/>
                    </div>
                    <div>
                        <input style="padding:5px" type="time" name="time_start" id="time_start" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    </div>
                    <div>
                        <input style="padding:5px" type="time" name="time_end" id="time_end" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    </div>
                    <div>
                        <select style="width:100%" id="train_id" name="train" class="js-example-basic-multiple-limit-train">
                            <option selected="selected">Train</option>
                            <?php foreach($all_train as $train):  ?>
                            <option value="<?=$train['id']?>"><?=$train['name']?></option>
                            <?php endforeach ?>
                        </select>
                        
                    </div>
                    
                        <input placeholder="price" type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    
                    
                        <input placeholder="quantity" type="number" name="qty" id="qty" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    
                    
                    <button data-modal-toggle="authentication-modal-add" type="submit" class="my-3 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">save</button>
                </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade myModaledit" id="exampleModaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New messaged</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="space-y-6" onsubmit="edit_row(event)">
                    <input type="hidden" id="id" name="id" />
                    <div>
                        <select style="width:100%" id="depart" name="depart" class="js-example-basic-multiple-limit-depart-edit">
                            <?php foreach($gares as $gare):  ?>
                                <option value="<?=$gare['id']?>"><?=$gare['name']?></option>
                            <?php endforeach ?>
                        </select>
                        
                    </div>
                    <div>
                        <select style="width:100%" id="arrivee" name="arrivee" class="js-example-basic-multiple-limit-arrivee-edit">
                            <?php foreach($gares as $gare):  ?>
                                <option value="<?=$gare['id']?>"><?=$gare['name']?></option>
                            <?php endforeach ?>
                        </select>
                       
                    </div>
                    <div>
                        <input name="date_voyege" id="date_voyege" type="date"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"/>
                    </div>
                    <div>
                        <input type="time" name="time_start" id="time_start" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    </div>
                    <div>
                        <input type="time" name="time_end" id="time_end" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    </div>
                    <div>
                        <select style="width:100%" id="train_id" name="train" class="js-example-basic-multiple-limit-train-edit">
                            <option selected="selected">Train</option>
                            <?php foreach($all_train as $train):  ?>
                            <option value="<?=$train['id']?>"><?=$train['name']?></option>
                            <?php endforeach ?>
                        </select>
                        
                    </div>
                    <div>
                        <input placeholder="price" type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    </div>
                    <div>
                        <input placeholder="quantity" type="number" name="qty" id="qty" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    </div>
                    
                    <button data-modal-toggle="authentication-modal" type="submit" class="my-3 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">save</button>
                </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Voyege -->

            <div class="table-responsive">
            <table id="exampless" class="table table-striped md:table-fixed" style="width:100%">
                <thead>
                <tr>
                    <th scope="col">dpt</th>
                    <th scope="col">arr</th>
                    <th scope="col">start</th>
                    <th scope="col">end</th>
                    <th scope="col">train</th>
                    <th scope="col">price</th>
                    <th scope="col">status</th>
                    <th scope="col">date</th>
                    <th scope="col">qty</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody class="my-table-body">
                    
                </tbody>
                <tfoot>
                <tr>
                    <th scope="col">dpt</th>
                    <th scope="col">arr</th>
                    <th scope="col">start</th>
                    <th scope="col">end</th>
                    <th scope="col">train</th>
                    <th scope="col">price</th>
                    <th scope="col">status</th>
                    <th scope="col">date</th>
                    <th scope="col">qty</th>
                    <th scope="col">Action</th>
                </tr>
                </tfoot>
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
        ////////////////////////////////////////////////////////////////////////
        //const editModal = new bootstrap.Modal('#edit-new-modal', {});
        send_data({},'read');
    function send_data(obj, type){
        var form = new FormData();
        for(key in obj){form.append(key,obj[key]);}
        //console.log(form)
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
        ajax.open('post','controller_voyege.php',true);
        ajax.send(form);
	  }
    function handle_result(result){
      var obj = JSON.parse(result);
      if(typeof obj == 'object'){
        if(obj.data_type == 'read'){
          let tbody = document.querySelector(".my-table-body");
          let str = "";
          if(typeof obj.data == 'object'){
            for (var i = 0; i < obj.data.length; i++) {
              let row = obj.data[i];
              str += `<tr>
                        <td>${row.departname}</td>
                        <td>${row.arrivee_name}</td>
                        <td>${row.time_start}</td>
                        <td>${row.time_end}</td>
                        <td>${row.train_name }</td>
                        <td>${row.price}</td>
                        <td>${row.disponible}</td>
                        
                        <td>${row.date_voyege}</td>
                        <td>${row.qty}</td>
              <td style="display:flex">
              <button 
              class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModaledit" data-bs-whatever="@fat"
              style="margin-right:5px" onclick="get_edit_row(${row.id});">
                <i class='bx bxs-edit-alt'></i>
              </button>
              <button style="margin-right:5px" onclick="drop_row(${row.id})"  class="btn btn-sm btn-danger"><i class='bx bx-x' ></i></button>
              </td>
                      </tr>`;
            }
            tbody.innerHTML = str;
          }else{str = "<tr><td>No records found!</td></tr>";}
          
        }else
        if(obj.data_type == 'save'){
          alert(obj.data);
          send_data({},'read');
        }else
        if(obj.data_type == 'edit')
        {
          alert(obj.data);
          send_data({},'read');
        }else
        if(obj.data_type == 'delete' || obj.data_type=="drope")
        {
          alert(obj.data);
          send_data({},'read');
        }else
        if(obj.data_type == 'get-edit-row')
        {

          let row = obj.data;
          
				 
				  if(typeof row == 'object'){
				
					let myModal = document.querySelector(".myModaledit");
					
					for (key in row){
						//document.querySelector(".js-edit-image").src = row['image'];
						let input = myModal.querySelector("#"+key);
						if(input != null)
						{
							if(key != "photo"){
								input.value = row[key];
              }
						}
					}
				}
        }
      }
	}
    /////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////
      function delete_row(id){
        if(!confirm("Are you sure you want to delete row number "+id+"?!")){
          return;
        }
       
		    send_data({id:id},'delete');
	    }
      function drop_row(id){
        if(!confirm("Are you sure you want to delete row number "+id+"?!")){
          return;
        }
        
		    send_data({id:id},'drope');
	    }
	function get_edit_row(id){
		send_data({id:id},'get-edit-row');
    
	}

    function add_row(e){
        e.preventDefault();
        //validate 
        let obj = {};
        let inputs = e.currentTarget.querySelectorAll("input,select");
        //console.log(inputs)
        for (var i = 0; i < inputs.length; i++) {
            obj[inputs[i].id] = inputs[i].value;
            inputs[i].value = "";
        }
        
        send_data(obj,'save');
       
	}
  function edit_row(e){
		e.preventDefault();
		let obj = {};
		let inputs = e.currentTarget.querySelectorAll("input,select");
		for (var i = 0; i < inputs.length; i++) {
				obj[inputs[i].id] = inputs[i].value;
				//console.log(inputs[i])
			obj['id'] = inputs[0].value;
		}
    //console.log(obj)
        
		send_data(obj,'edit');
		
	}
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script src="../path/to/flowbite/dist/flowbite.js"></script>
<script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="app.js"></script>

</body>

</html>