<?php

if($_SERVER['REQUEST_METHOD']=="POST"){
    if(count($_POST) > 0){
        require '../classes/init.php';
        $user=new User();
        $errors=$user->signup($_POST);
    }
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- CSS only -->
    <!-- CSS only -->
    <!-- CSS only -->
    <link rel="stylesheet" href="output/output.css" />
    <link rel="stylesheet" href="css/main.css" />

    <title>train</title>
  </head>
  <body  class="flex justify-center items-center h-screen">
    <section  class="h-full gradient-form md:h-screen">
      <div  class="container py-6 px-6 h-full flex justify-center items-center">
        <div
        
          class="flex justify-center items-center flex-wrap g-6 text-gray-800"
        >
          <div class="xl:w-10/12">
            <div class="block bg-white shadow-lg rounded-lg">
              <div class="lg:flex lg:flex-wrap g-0">
                <div class="lg:w-7/12 px-4 md:px-0">
                  <div class="md:p-6 md:mx-6">
                    <div class="text-center">
                      <img
                        class="mx-auto w-48"
                        src="https://previews.123rf.com/images/alexwhite/alexwhite1612/alexwhite161200664/67847444-train-design-rond-ic%C3%B4ne-orange-orange.jpg"
                        alt="logo"
                      />
                      <h4 class="text-xl font-semibold mt-1 mb-3 pb-1">
                        We are The Lotus Team
                      </h4>
                    </div>
                    <?php if(isset($errors) && is_array($errors) && count($errors) > 0):?>
                                <div class="error">
                                    <?php foreach($errors as $error):?>
                                    <div style="color:red"><?=$error?><br></div>
                                    <?php endforeach;?>
                                </div>
                    <?php endif;?>
                    <form method="POST">
                      <p class="mb-4">Please login to your account</p>
                      <!-- here  first_name last_name -->
                      <!-- <div
                        class="flex flex-wrap justify-between"
                        style="gap: 12px"
                      > -->
                        <div class="mb-4">
                          <input
                            type="text"
                            name="name"
                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id="exampleFormControlInput1"
                            placeholder="name"
                          />
                        </div>
                        <div class="mb-4">
                          <input
                            type="text"
                            name="email"
                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id="exampleFormControlInput1"
                            placeholder="email"
                          />
                        </div>
                      <!-- </div> -->
                      <!-- here -->

                      <!-- <div class="flex flex-wrap"> -->
                        <div class="mb-4">
                          <input
                            name="password"
                            type="password"
                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id="exampleFormControlInput1"
                            placeholder="password"
                          />
                        </div>
                      <!-- </div> -->
                      <!-- <div
                        class="flex flex-wrap justify-between"
                        style="gap: 12px"
                      > -->
                        <div class="mb-4">
                          <input
                            name="password_confirm"
                            type="password"
                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id="exampleFormControlInput1"
                            placeholder="password_confirm"
                          />
                        </div>
                        

                      <div class="text-center pt-1 mb-12 pb-1">
                        <button
                          class="inline-block px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3"
                          type="submit"
                          data-mdb-ripple="true"
                          data-mdb-ripple-color="light"
                          style="
                            background: linear-gradient(
                              to right,
                              #ee7724,
                              #d8363a,
                              #dd3675,
                              #b44593
                            );
                          "
                        >
                          Log in
                        </button>
                        <a class="text-gray-500" href="#!">Forgot password?</a>
                      </div>
                      <div class="flex items-center justify-between pb-6">
                        <p class="mb-0 mr-2">Don't have an account?</p>
                        <button
                          type="button"
                          class="inline-block px-6 py-2 border-2 border-red-600 text-red-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                          data-mdb-ripple="true"
                          data-mdb-ripple-color="light"
                        >
                          <a href="login.php">Login</a>
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
                <div
                  class="lg:w-5/12 sm:hidden photo lg:flex items-center lg:rounded-r-lg rounded-b-lg lg:rounded-bl-none"
                  style="
                   
                    background-size: unset;
                    background-repeat: no-repeat;
                    background-position: center;
                    background-image: url('https://i.pinimg.com/564x/e7/e8/96/e7e896ddcda8d736041fb02e5535255e.jpg');
                  "

                >
                
                  <div class="text-white px-4 py-6 md:p-12 md:mx-6">
                    <h4 class="text-xl font-semibold mb-6">
                      We are more than just a company
                    </h4>
                    <p class="text-sm">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                      sed do eiusmod tempor incididunt ut labore et dolore magna
                      aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                      ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
  <!-- JavaScript Bundle with Popper -->
  <!-- JavaScript Bundle with Popper -->
  <script
    src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
    crossorigin="anonymous"
  ></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"
  ></script>
  <script src="script.js"></script>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"
    integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  ></script>
</html>