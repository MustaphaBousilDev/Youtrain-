
<?php 

require '../classes/init.php';
$user=new User();
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
<body class="bg-my-color-red fixed">

    <?php require 'sidebar.php' ?>
    <section class="home-section">
        <?php require 'navbar.php' ?>
        <div class="home-content p-8 bg-white">
                <!-- Modal toggle -->

<div class="modal fade myModal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="space-y-6" onsubmit="edit_row(event)">
            <input type="hidden" id="id" name="id" />
            <div>
                <img src="" class="js-edit-image mx-auto block" style="width:150px;height: 150px;object-fit: cover;border-radius:50%">
            </div>
            <div><input id="photo" onchange="display_edit_image(this.files[0])" type="file"></div>
            <script>
                function display_edit_image(file){
                    let allowed = ['jpg','jpeg','png'];
                    let ext = file.name.split(".").pop();
                    if(allowed.includes(ext.toLowerCase())){
                        document.querySelector('.js-edit-image').src = URL.createObjectURL(file);
                        image_added = true;
                    }else {alert("Only the following image types are allowed:"+ allowed.toString(", "));}
                }
            </script>
            <div>
                <label for="name"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="name" required>
            </div>
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="name@company.com" required>
            </div>
            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Send message</button>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- Main modal -->

            <table id="example" class="table table-striped md:table-fixed table-responsive" style="width:100%">
                <thead>
                <tr>
                    
                    <th scope="col">photo</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">disabled</th>
                    
                    <th scope="col">action</th>
                </tr>
                </thead>
                <tbody class="my-table-body">
                    
                </tbody>
                <tfoot>
                    <tr>
                   
                    <th scope="col">photo</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">disabled</th>
                    
                    <th scope="col">action</th>
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
        let image_added=false;
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
            ajax.open('post','controller_admin.php',true);
            ajax.send(form);
	    
        }
        ///////////////////////////////////////////////////////////////////////////////
        function handle_result(result){
            var obj = JSON.parse(result);
            if(typeof obj == 'object'){
                if(obj.data_type == 'read'){
                    console.log(obj)
                    let tbody = document.querySelector(".my-table-body");
                    let str = "";
                    if(typeof obj.data == 'object'){
                        for (var i = 0; i < obj.data.length; i++) {
                        let row = obj.data[i];
                        str += `<tr style="font-size:12px">
                                    
                                    <td><img class="rounded-circle" src="${row.photo}" style="width:25px;height:25px;object-fit: cover;cursor:pointer" /></td>
                                    <td>${row.name}</td>
                                    <td>${row.email}</td>
                                    <td style="text-align:center">${row.disabled}</td>
                                    
                        <td style="display:flex">
                        <button 
                        type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat"
                        style="margin-right:5px" onclick="get_edit_row(${row.id});">
                            Edit
                        </button>
                       
                        <button style="margin-right:5px" onclick="drop_row(${row.id})"  class="btn btn-sm btn-danger">Delete</button>
                        </td>
                                </tr>`;
                        }
                        tbody.innerHTML = str;
                    }else{str = "<tr><td>No records found!</td></tr>";}
                }else if(obj.data_type == 'save'){
                    alert(obj.data);
                    send_data({},'read');
                }else if(obj.data_type == 'edit'){
                    alert(obj.data);
                    send_data({},'read');
                }else if(obj.data_type == 'delete' || obj.data_type=="drope"){
                    alert(obj.data);
                    send_data({},'read');
                }else if(obj.data_type == 'get-edit-row'){
                    let row = obj.data;
                    //console.log(row)
                    if(typeof row == 'object'){
                        //console.log('is object')
                        let myModal = document.querySelector(".myModal");
                        for (key in row){
                            
                            if(key == "photo")
                                document.querySelector(".js-edit-image").src = row[key];
                            let input = myModal.querySelector("#"+key);
                            if(input != null){
                                if(key != "photo")
                                    input.value = row[key];
                            }
                        }
                    }
                }
            }
	    }
        /////////////////////////////////////////////////////////////////////////////////
        function delete_row(id){
            if(!confirm("Are you sure you want to delete row number "+id+"?!")){return;}
            send_data({id:id},'delete');
	    }
        /////////////////////////////////////////////////////////////////////////////////
        function drop_row(id){
            if(!confirm("Are you sure you want to delete row number "+id+"?!")){return;}
            send_data({id:id},'drope');
	    }
        /////////////////////////////////////////////////////////////////////////////////
        function get_edit_row(id){
            send_data({id:id},'get-edit-row');
        }
        /////////////////////////////////////////////////////////////////////////////////////
        function edit_row(e){
            e.preventDefault();
            let obj = {};
            let inputs = e.currentTarget.querySelectorAll("input");
            for (var i = 0; i < inputs.length; i++) {
                if(inputs[i].type == 'file' && image_added){
                    obj[inputs[i].id] = inputs[i].files[0];
                }else{
                    obj[inputs[i].id] = inputs[i].value;
                }
                obj['id'] = inputs[0].value;
            }
            image_added = false;
            console.log('edit')
            console.log(obj);
            send_data(obj,'edit');
        }
        ///////////////////////////////////////////////////////////////////////////////////////

    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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