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
            <div class="grid  sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-3">
                <div class="one">
                    <header class=" pb-4 border-b-2 border-gray-100">
                        <h3 class="font-bold text-xl">Account</h3>
                        <div class="avatar w-[200px]   flex justify-between mt-4">
                            <div class="w-[80%] mx-auto text-center">
                                <span class="text-sm">Mugiwara</span>
                                <img 
                                src="https://image.shutterstock.com/image-photo/stock-photo-portrait-of-smiling-red-haired-millennial-man-looking-at-camera-sitting-in-caf-or-coffeeshop-250nw-1194497251.jpg" 
                                class="w-12 h-12 rounded-full mx-auto"/>
                            </div>
                            <div class="flex items-end">
                                <button class="h-11   hover:bg-blue-500 text-blue-700 font-semibold hover:text-white  py-1 px-4 mx-2 border border-blue-500 hover:border-transparent rounded">
                                    Upload 
                                </button>
                                <button class="h-11  hover:bg-red-600 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                    Remove
                                </button>
                            </div>
                        </div>
                    </header>
                    <section>
                        <form class="w-full max-w-lg">
                            <div class="flex flex-wrap -mx-3 mb-6">
                              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                  First Name
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Jane">
                                <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                              </div>
                              <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                  Last Name
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
                              </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                              <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                                  Password
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="password" placeholder="******************">
                                <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p>
                              </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-2">
                              <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                                  City
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="text" placeholder="Albuquerque">
                              </div>
                              <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                                  State
                                </label>
                                <div class="relative">
                                  <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                    <option>New Mexico</option>
                                    <option>Missouri</option>
                                    <option>Texas</option>
                                  </select>
                                  <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                  </div>
                                </div>
                              </div>
                              <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
                                  Zip
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-zip" type="text" placeholder="90210">
                              </div>
                            </div>
                          </form>
                    </section>
                </div>
                <div class="two mt-5">
                    <canvas id="myChartPPP"></canvas>
                </div>
            </div>
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
                              Order
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-3 text-left">
                              Ticket
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-3 text-left">
                              Price 
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="bg-gray-100 border-b">
                            <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900">1</td>
                            <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                              Mark
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                              Otto
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                              @mdo
                            </td>
                          </tr>
                          <tr class="bg-white border-b">
                            <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900">2</td>
                            <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                              Jacob
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                              Thornton
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                              @fat
                            </td>
                          </tr>
                          <tr class="bg-gray-100 border-b">
                            <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900">3</td>
                            <td colspan="2" class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap text-center">
                              Larry the Bird
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                              @twitter
                            </td>
                          </tr>
                          <tr class="bg-white border-b">
                            <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900">2</td>
                            <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                              Jacob
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                              Thornton
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                              @fat
                            </td>
                          </tr>
                          <tr class="bg-gray-100 border-b">
                            <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900">3</td>
                            <td colspan="2" class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap text-center">
                              Larry the Bird
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                              @twitter
                            </td>
                          </tr>
                          <tr class="bg-white border-b">
                            <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900">2</td>
                            <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                              Jacob
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                              Thornton
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                              @fat
                            </td>
                          </tr>
                          <tr class="bg-gray-100 border-b">
                            <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900">3</td>
                            <td colspan="2" class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap text-center">
                              Larry the Bird
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                              @twitter
                            </td>
                          </tr>
                          <tr class="bg-white border-b">
                            <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900">2</td>
                            <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                              Jacob
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                              Thornton
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                              @fat
                            </td>
                          </tr>
                          <tr class="bg-gray-100 border-b">
                            <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900">3</td>
                            <td colspan="2" class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap text-center">
                              Larry the Bird
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                              @twitter
                            </td>
                          </tr>
                          <tr class="bg-white border-b">
                            <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900">2</td>
                            <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                              Jacob
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                              Thornton
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                              @fat
                            </td>
                          </tr>
                          <tr class="bg-gray-100 border-b">
                            <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900">3</td>
                            <td colspan="2" class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap text-center">
                              Larry the Bird
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                              @twitter
                            </td>
                          </tr>
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
</script>
<script src="app.js"></script>
</body>

</html>