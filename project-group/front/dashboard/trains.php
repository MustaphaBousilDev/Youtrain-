
<?php 
require '../classes/init.php';
$user=new User();
$gare=new Gares();
$data_gare=$gare->get_gares();
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
<body class="bg-my-color-red fixed">

    <?php require 'sidebar.php' ?>
    <section class="home-section">
        <?php require 'navbar.php' ?>
        <div class="home-content p-8 bg-white">
                <!-- Modal toggle -->
<button data-modal-toggle="authentication-modal-add">Add</button>
<div style="z-index:100000;width:500px;top:50%;left:50%;transform:translate(-50%,-50%);padding:20px" 
    id="authentication-modal-add" tabindex="-1" aria-hidden="true" 
    class="fixed   hidden myModal
    overflow-x-hidden overflow-y-auto 
    md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-md md:h-auto">
        <!-- Modal content -->
        <div style="padding:20px" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal-add">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Sign in to our platform</h3>
                <form class="space-y-6" onsubmit="add_row(event)">
                    <div>
                        <label for="time_start"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">name trains</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    </div>
                    <div>
                        <label for="gare_id"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gare Depart</label>
                        <select id="gare_id" name="gare_id" class="js-example-basic-multiple-limit-depart">
                            <?php foreach($data_gare as $gare):  ?>
                                <option value="<?=$gare['id']?>"><?=$gare['name']?></option>
                            <?php endforeach ?>
                        </select>
                        <script>
                            $(".js-example-basic-multiple-limit-depart").select2({
                                maximumSelectionLength: 2
                            });
                        </script>
                    </div>
                    <button type="submit" class="my-3 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">save</button>
                </form>
            </div>
        </div>
    </div>
</div> 
<!-- Edit Voyege -->
<div style="z-index:100000;width:500px;top:50%;left:50%;transform:translate(-50%,-50%);padding:20px" 
    id="authentication-modal-edit" tabindex="-1" aria-hidden="true" 
    class="fixed   hidden myModal
    overflow-x-hidden overflow-y-auto 
    md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-md md:h-auto">
        <!-- Modal content -->
        <div style="padding:20px" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal-edit">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Sign in to our platform</h3>
                <form class="space-y-6" onsubmit="edit_row(event)">
                <input type="hidden" name="id" id="id"/>
                    <div>
                        <label for="time_start"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">name trains</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    </div>
                    <div>
                        <label for="gare_id"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gare</label>
                        <select id="gare_id" name="gare_id" class="js-example-basic-multiple-limit-depart-edit">
                            <?php foreach($data_gare as $gare):  ?>
                                <option value="<?=$gare['id']?>"><?=$gare['name']?></option>
                            <?php endforeach ?>
                        </select>
                        <script>
                            $(".js-example-basic-multiple-limit-depart-edit").select2({
                                maximumSelectionLength: 2
                            });
                        </script>
                    </div>
                    <button type="submit" class="my-3 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">save</button>
                </form>
            </div>
        </div>
    </div>
</div> 
            <table id="examples" class="table table-striped md:table-fixed " style="width:100%">
                <thead>
                <tr style="background-color:red;">
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">gare</th>
                    <th scope="col">date_created</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody class="my-table-body">
                    
                </tbody>
                <tfoot>
                <tr>
                <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">gare</th>
                    <th scope="col">date_created</th>
                    <th scope="col">Action</th>
                </tr>
                </tfoot>
            </table>
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
        ajax.open('post','controller_trains.php',true);
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
              str += `<tr style="width:20%;">
                        <td>${row.id}</td>
                        <td>${row.name}</td>
                        <td>${row.gare_id}</td>
                        <td>${row.date_created}</td>
                        
              <td style="display:flex;">
              <button style="margin-right:5px" onclick="get_edit_row(${row.id});"  class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="authentication-modal-edit">
                Edit
              </button>
              <button style="margin-right:5px" onclick="delete_row(${row.id})"  class="btn btn-sm btn-danger">Delete</button>
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
					
					let myModal = document.querySelector("#authentication-modal-edit");
					
					for (key in row){
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
				
			obj['id'] = inputs[0].value;
		}
        console.log(obj)
        //return 
        
		send_data(obj,'edit');
		
	}
    </script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script src="../path/to/flowbite/dist/flowbite.js"></script>
<script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>

   <script src="app.js"></script>
<script>
        $(".js-example-basic-multiple-limit").select2({
            maximumSelectionLength: 2
        });
</script>

</body>

</html>